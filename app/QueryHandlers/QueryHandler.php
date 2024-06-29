<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryHandler
{
    public function __construct(protected $value)
    {
    }

    abstract public function handle(Builder $query, Closure $next): Builder;
}
