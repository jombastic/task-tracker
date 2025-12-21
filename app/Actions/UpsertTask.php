<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Contracts\Auth\Authenticatable;

class UpsertTask
{
    public function handle(array $data, Authenticatable $user, ?Task $task = null): Task
    {
        $data['is_recurring'] = (bool) ($data['is_recurring'] ?? false);

        if (! $data['is_recurring']) {
            $data['recurrence_type'] = null;
            $data['last_generated_at'] = null;
        }

        if ($task) {
            $task->update($data);
            return $task;
        }

        return $user->tasks()->create($data);
    }
}
