<?php

use App\Models\Enums\Priority;
use App\Models\Enums\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->index()->constrained();
            $table->foreignIdFor(Task::class)->nullable()->index()->constrained();
            $table->enum('status', Status::values())->index()->default('todo');
            $table->enum('priority', Priority::values())->index();
            $table->string('title')->fulltext();
            $table->text('description')->fulltext();
            $table->timestamp('created_at')->nullable()->index();
            $table->timestamp('completed_at')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
