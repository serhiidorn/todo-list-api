<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum Priority: int
{
    case LOWEST = 1;
    case LOW = 2;
    case MEDIUM = 3;
    case HIGH = 4;
    case HIGHEST = 5;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
