<?php

namespace App\Repositories;

use App\Enums\CityEnum;
use App\Repositories\AbstractRepository;

use App\Models\Country;

use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CountryRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property Country $model
 */
class CountryRepository extends AbstractRepository
{
    private $selectDefault = ['*'];

    public function __construct(Country $model)
    {
        $this->model = $model;

        $this->selectDefault = array_merge(getSelectColumnsByTable(CountryEnum::FIELDS, CountryEnum::TABLE), $this->selectDefault);
    }

    /**
     * Create a new Country
     * 
     * @param array $data
     * 
     * @return Country
     */
    public function create(array $data): Country
    {
        return parent::create($data);
    }

    /**
     * Update a Country
     * 
     * @param  $id
     * @param array $data
     * 
     * @return Country
     */
    public function update($id, array $data): Country
    {
        return parent::update($id, $data);
    }

    /**
     * Search the Countries
     * 
     * @param array $select
     * @param array $params
     * @param array $with
     * 
     * @return Collection
     */
    public function search(array $select = [], array $params = [], array $with = [])
    {
        $select = empty($select) ? $this->selectDefault : $select;

        $query = $this->model->query();

        $query->select($select);

        if (isset($params[CountryEnum::NAME]) && $params[CountryEnum::NAME]) {
            $query->byName($params[CountryEnum::NAME]);
        }

        if (isset($params[CountryEnum::SLUG]) && $params[CountryEnum::SLUG]) {
            $query->bySlug($params[CountryEnum::SLUG]);
        }

        if (isset($with) && $with) {
            $query->with($with);
        }

        return $query->get();
    }
}
