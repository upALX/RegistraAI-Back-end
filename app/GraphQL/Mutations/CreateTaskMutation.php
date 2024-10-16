<?php

namespace App\GraphQL\Mutations;

use App\Jobs\SendTaskMailJob; 
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use GraphQL\Error\Error;

class CreateTaskMutation
{
    public function __invoke($_, array $args, $context)
    {
        $user = Auth::user();
        if (!$user) {
            throw new Error('User must be auth.');
        }

        $task = Task::create([
            'title' => $args['title'],
            'description' => $args['description'],
            'user_id' => $user->id,
        ]);

        (new SendTaskMailJob($task))->dispatch();

        return [
            'success' => true,
            'message' => 'Tarefa criada com sucesso.',
            'task' => $task,
        ];
    }
}
