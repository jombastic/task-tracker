<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->date('due_date')->nullable();

            // Recurrence (scoped-down)
            $table->boolean('is_recurring')->default(false);
            $table->enum('recurrence_type', ['daily', 'weekly'])->nullable();
            $table->date('last_generated_at')->nullable();

            $table->timestamps();

            // Performance indexes
            $table->index(['user_id', 'completed_at']);
            $table->index(['user_id', 'due_date']);
            $table->index(['is_recurring', 'recurrence_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
