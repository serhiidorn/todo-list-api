<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class CompletedAtOrder extends QueryHandler
{
    public function handle(Builder $query, Closure $next): Builder
    {
        $query->orderBy('completed_at', $this->value);

        return $next($query);
    }
}
