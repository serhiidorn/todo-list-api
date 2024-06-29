<?php

declare(strict_types=1);

namespace App\QueryHandlers;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class TitleFilter extends QueryHandler
{
    public function handle(Builder $query, Closure $next): Builder
    {
        $query->whereFullText('title', $this->value)->toRawSql();

        return $next($query);
    }
}
