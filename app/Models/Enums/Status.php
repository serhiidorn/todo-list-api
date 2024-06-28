<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum Status: string
{
    case TODO = 'todo';
    case DONE = 'done';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
