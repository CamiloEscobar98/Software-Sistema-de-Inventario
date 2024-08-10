<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Language;

/**
 * Class LanguageRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property Language $model
 */
class LanguageRepository extends AbstractRepository
{
    public function __construct(Language $model)
    {
        $this->model = $model;
    }
}
