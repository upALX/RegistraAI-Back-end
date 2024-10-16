<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;

class UpdateTaskMutation
{
    public function __invoke($_, array $args)
    {
        $task = Task::find($args['id']);

        if ($task) {
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
