<?php

use App\Jobs\SendTaskMailJob; 
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CreateTaskMutation
{
    public function __invoke($_, array $args, $context)
    {
        // Verifica se o usuário está autenticado
        $user = Auth::user();
        if (!$user) {
            return [
                'success' => false,
                'message' => 'User must be authenticated to create a task.',
            ];
        }

        // Cria a tarefa
        $task = Task::create([
            'title' => $args['title'],
            'description' => $args['description'],
            'user_id' => $user->id,
        ]);

        // Dispara o job para enviar o email
        (new SendTaskMailJob($task))->dispatch();

        return [
            'success' => true,
            'message' => 'Task created successfully.',
            'task' => $task,
        ];
    }
}
