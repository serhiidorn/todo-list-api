<?php

declare(strict_types=1);

namespace App\QueryHandlers\Enums;

use App\QueryHandlers\DescriptionFilter;
use App\QueryHandlers\QueryHandler;
use App\QueryHandlers\PriorityFilter;
use App\QueryHandlers\StatusFilter;
use App\QueryHandlers\TitleFilter;

enum Filters: string
{
    case Status = 'status';
    case Priority = 'priority';
    case Title = 'title';
    case Description = 'description';

    public function createFilter($value): QueryHandler
    {
        return match ($this) {
            self::Status => new StatusFilter($value),
            self::Priority => new PriorityFilter($value),
            self::Title => new TitleFilter($value),
            self::Description => new DescriptionFilter($value),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
