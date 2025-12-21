<?php

namespace App\Services;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RecurringTaskGenerator
{
    public function generateForDate(Carbon $date): int
    {
        $date = $date->startOfDay();

        $recurringTasks = Task::recurring()
            ->whereNotNull('recurrence_type')
            ->get();

        if ($recurringTasks->isEmpty()) {
            return 0;
        }

        $rows = [];
        $updatedTaskIds = [];

        foreach ($recurringTasks as $template) {
            if (! $this->shouldGenerate($template, $date)) {
                continue;
            }

            $exists = Task::query()
                ->where('user_id', $template->user_id)
                ->where('title', $template->title)
                ->whereDate('due_date', $date)
                ->exists();

            if ($exists) {
                continue;
            }

            $rows[] = [
                'user_id' => $template->user_id,
                'category_id' => $template->category_id,
                'title' => $template->title,
                'description' => $template->description,
                'due_date' => $date,
                'completed_at' => null,
                'is_recurring' => false,
                'created_at' => now(),
                'updated_at' => now()
            ];

            $updatedTaskIds[] = $template->id;
        }

        if (empty($rows)) {
            return 0;
        }

        DB::transaction(function () use ($rows, $updatedTaskIds, $date) {
            Task::insert($rows);

            Task::whereIn('id', $updatedTaskIds)
                ->update(['last_generated_at' => $date]);
        });

        return count($rows);
    }

    private function shouldGenerate(Task $task, Carbon $date): bool
    {
        if (is_null($task->last_generated_at)) {
            return true;
        }

        // The 'lt' method checks if last_generated_at is less than $date (i.e., the previous generation is before $date)
        // The 'lte' method checks if last_generated_at plus one week is less than or equal to $date
        return match ($task->recurrence_type) {
            'daily' => $task->last_generated_at->lt($date), // Returns true if last_generated_at < $date
            'weekly' => $task->last_generated_at->copy()->addWeek()->lte($date), // Returns true if (last_generated_at + 1 week) <= $date
            default => false
        };
    }
}
