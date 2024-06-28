<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Enums\Priority;
use App\Models\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'task_id',
        'status',
        'priority',
        'title',
        'description',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => Status::class,
            'priority' => Priority::class,
            'completed_at' => 'datetime',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subtasks(): HasMany
    {
        return $this->hasMany(self::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'task_id');
    }

    public function hasUncompletedSubtasks(): bool
    {
        return $this->subtasks()->whereStatus(Status::TODO)->exists();
    }

    public function isCompleted(): bool
    {
        return $this->status === Status::DONE;
    }

    public function complete(): bool
    {
        $this->status = Status::DONE;

        $this->completed_at = now();

        return $this->save();
    }
}
