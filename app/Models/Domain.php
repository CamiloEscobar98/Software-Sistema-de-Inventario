<?php

namespace App\Models;

use App\Enums\DomainEnum;
use Stancl\Tenancy\Database\Models\Domain as BaseDomain;

class Domain extends BaseDomain
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DomainEnum::Table;
}
