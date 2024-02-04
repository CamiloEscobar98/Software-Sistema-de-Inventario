<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

use App\Enums\CountryEnum;
use App\Enums\ResponseEnum;

use App\Factories\CountryFactory;

use App\Repositories\CountryRepository;

/**
 * Class CountryService
 * @package App\Services
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CountryRepository $countryRepository
 * 
 */
class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Update a Country.
     * 
     * @param array $args
     *  
     * @return \App\Models\Country
     */
    public function update(array $args): \App\Models\Country
    {
        $item = null;

        try {

            $this->countryRepository->update($args[CountryEnum::Id], CountryFactory::update(
                $args[CountryEnum::Id],
                $args[CountryEnum::Name] ?? null,
                $args[CountryEnum::Slug] ?? null,
            ));

            $item = $this->countryRepository->find($args[CountryEnum::Id]);
        } catch (QueryException $qe) {
            Log::error("App/Services/CountryService/Update", print_r($qe));
        }

        return $item;
    }
}
