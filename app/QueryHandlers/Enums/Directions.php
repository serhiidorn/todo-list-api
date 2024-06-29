<?php

declare(strict_types=1);

namespace App\QueryHandlers\Enums;

enum Directions: string
{
    case Asc = 'asc';
    case Desc = 'desc';
}
