<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class PriorityOrder extends QueryHandler
{
    public function handle(Builder $query, Closure $next): Builder
    {
        $query->orderBy('priority', $this->value);

        return $next($query);
    }
}
