<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;
use Illuminate\Support\Str;

class UpdateTaskMutation
{
    public function __invoke($_, array $args)
    {
        if (!Str::isUuid($args['id'])) {
            return [
                'success' => false,
                'message' => 'ID must be a valid UUID.',
                'task' => null,
            ];
        }

        $task = Task::find($args['id']);

        if (!$task) {
            return [
                'success' => false,
                'message' => 'Task not found.',
                'task' => null,
            ];
        }

        $task->update([
            'title' => $args['title'] ?? $task->title,
            'description' => $args['description'] ?? $task->description,
            'status' => $args['status'] ?? $task->status,
        ]);

        return [
            'success' => true,
            'message' => 'Task updated successfully.',
            'task' => $task,
        ];
    }
}
