<?php

declare(strict_types=1);

namespace App\QueryHandlers\Enums;

use App\QueryHandlers\CompletedAtOrder;
use App\QueryHandlers\CreatedAtOrder;
use App\QueryHandlers\PriorityOrder;
use App\QueryHandlers\QueryHandler;

enum Orders: string
{
    case CreatedAt = 'created_at';
    case CompletedAt = 'completed_at';
    case Priority = 'priority';

    public function createOrder($direction): QueryHandler
    {
        return match ($this) {
            self::CreatedAt => new CreatedAtOrder($direction),
            self::CompletedAt => new CompletedAtOrder($direction),
            self::Priority => new PriorityOrder($direction),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
