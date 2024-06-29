<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class DescriptionFilter extends QueryHandler
{
    public function handle(Builder $query, Closure $next): Builder
    {
        $query->whereFullText('description', $this->value);

        return $next($query);
    }
}
