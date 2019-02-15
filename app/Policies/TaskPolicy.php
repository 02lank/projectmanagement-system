<?php

namespace App\Policies;

use App\Modules\Models\Account;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Account can view the task.
     *
     * @param  \App\Account  $Account
     * @param  \App\Task  $task
     * @return mixed
     */
    public function view(Account $account, Task $task)
    {
        //
    }

    /**
     * Determine whether the Account can create tasks.
     *
     * @param  \App\Account  $Account
     * @return mixed
     */
    public function create(Account $account)
    {
        //
    }

    /**
     * Determine whether the Account can update the task.
     *
     * @param  \App\Account  $Account
     * @param  \App\Task  $task
     * @return mixed
     */
    public function update(Account $account, Task $task)
    {
        //
    }

    /**
     * Determine whether the Account can delete the task.
     *
     * @param  \App\Account  $Account
     * @param  \App\Task  $task
     * @return mixed
     */
    public function delete(Account $Account, Task $task)
    {
        //
    }

    /**
     * Determine whether the Account can restore the task.
     *
     * @param  \App\Account  $Account
     * @param  \App\Task  $task
     * @return mixed
     */
    public function restore(Account $Account, Task $task)
    {
        //
    }

    /**
     * Determine whether the Account can permanently delete the task.
     *
     * @param  \App\Account  $Account
     * @param  \App\Task  $task
     * @return mixed
     */
    public function forceDelete(Account $Account, Task $task)
    {
        //
    }
}
