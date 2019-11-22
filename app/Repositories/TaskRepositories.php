<?php


namespace App\Repositories;

use App\Models\User;

class TaskRepositories
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */

    public function forUser(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc')
            ->get();
    }

}
