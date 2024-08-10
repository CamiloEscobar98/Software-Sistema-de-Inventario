<?php

namespace App\Services;

use Illuminate\Database\QueryException;

use App\Enums\CountryEnum;

use App\Factories\CountryFactory;
use App\Models\Country;
use App\Repositories\CountryRepository;

/**
 * Class CountryService
 * @package App\Services
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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
     * Create a Country
     * 
     * @param array $args
     * 
     * @return null|Country
     */
    public function create(array $args): ?Country
    {
        $item = null;
        try {
            $Item = $this->countryRepository->create(CountryFactory::create($args));
        } catch (QueryException $qe) {
            LoggerService::INSERT_LOG_ERROR(self::class, $qe->getMessage());
        }

        return $item;
    }

    /**
     * Update a Country.
     * 
     * @param int $id
     * @param array $args
     *  
     * @return null|Country
     */
    public function update(int $id, array $args): ?Country
    {
        $item = null;
        try {
            $this->countryRepository->update($id, CountryFactory::update($args));
            $item = $this->countryRepository->find($id);
        } catch (QueryException $qe) {
            LoggerService::INSERT_LOG_ERROR(self::class, $qe->getMessage());
        }
        return $item;
    }

    /**
     * Delete a Country
     * 
     * @param int $id
     * 
     * @return null|Country
     */
    public function delete(int $id): ?Country
    {
        $response = null;
        try {
            $response = $this->countryRepository->find($id);
            $this->countryRepository->delete($id);
        } catch (QueryException $qe) {
            $response = null;
            LoggerService::INSERT_LOG_ERROR(self::class, $qe->getMessage());
        }
        return $response;
    }
}
