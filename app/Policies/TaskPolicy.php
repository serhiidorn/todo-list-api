<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function manage(User $user, Task $task): bool
    {
        return $task->owner()->is($user);
    }
}
