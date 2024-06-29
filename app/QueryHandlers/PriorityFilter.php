<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class PriorityFilter extends QueryHandler
{
    public function handle(Builder $query, Closure $next): Builder
    {
        $query->where('priority', $this->value);

        return $next($query);
    }
}
