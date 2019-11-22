<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Определяем, может ли данный пользователь удалить данную задачу.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function removeTask(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
