<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LogicException;

class CouldNotCompleteTask extends LogicException
{
    public static function because(string $message): static
    {
        return new static($message);
    }

    public function render(Request $request): false|JsonResponse
    {
        if ($request->expectsJson()) {
            return new JsonResponse(
                data:['message' => $this->message],
                status: 422
            );
        }

        return false;
    }
}
