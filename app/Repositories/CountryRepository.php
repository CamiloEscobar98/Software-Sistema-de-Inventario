<?php

namespace App\Repositories;

use App\Enums\CityEnum;
use App\Repositories\AbstractRepository;

use App\Models\Country;

use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;

/**
 * Class CountryRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Country $model
 */
class CountryRepository extends AbstractRepository
{
    private $selectDefault = ['*'];

    public function __construct(Country $model)
    {
        $this->model = $model;

        $this->selectDefault = array_merge(getSelectColumnsByTable(CountryEnum::Fields, CountryEnum::Table), $this->selectDefault);
    }

    public function search($select = [], $params = [], $with = [])
    {
        $select = empty($select) ? $this->selectDefault : $select;

        $query = $this->model->query();

        $query->select($select);

        if (isset($params[CountryEnum::Name]) && $params[CountryEnum::Name]) {
            $query->byName($params[CountryEnum::Name]);
        }

        if (isset($params[CountryEnum::Slug]) && $params[CountryEnum::Slug]) {
            $query->bySlug($params[CountryEnum::Slug]);
        }

        if (isset($with) && $with) {
            $query->with($with);
        }

        return $query->get();
    }
}
