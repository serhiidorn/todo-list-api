<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Task;
use App\QueryHandlers\Enums\Directions;
use App\QueryHandlers\Enums\Filters;
use App\QueryHandlers\Enums\Orders;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Pipeline;

class GetFilteredTasks
{
    public function handle(int $userId, ?array $queryFilters = null, ?array $queryOrders = null): Collection
    {
        $orders = collect($queryOrders)
            ->map(fn ($direction, $order) => Orders::tryFrom($order)?->createOrder(
                Directions::tryFrom($direction)?->value ?? 'asc'
            ))
            ->whereNotNull()
            ->all();

        $filters = collect($queryFilters)
            ->map(fn ($value, $name) => Filters::tryFrom($name)?->createFilter($value))
            ->whereNotNull()
            ->all();

        $query = Task::whereUserId($userId)->with('descendants');

        return Pipeline::send($query)
            ->through([...$filters, ...$orders])
            ->thenReturn()
            ->get();
    }
}
