<?php

namespace App\Policies;

use App\Modules\Account\Models\Account;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Account can view the project.
     *
     * @param  \App\Account  $Account
     * @param  \App\Project  $project
     * @return mixed
     */
    public function view(Account $account, Project $project)
    {
        return $project->account_id == $account->account_id;
    }

    /**
     * Determine whether the Account can create projects.
     *
     * @param  \App\Account  $Account
     * @return mixed
     */
    public function create(Account $Account)
    {
        //
    }

    /**
     * Determine whether the Account can update the project.
     *
     * @param  \App\Account  $Account
     * @param  \App\Project  $project
     * @return mixed
     */
    public function update(Account $Account, Project $project)
    {
        //
    }

    /**
     * Determine whether the Account can delete the project.
     *
     * @param  \App\Account  $Account
     * @param  \App\Project  $project
     * @return mixed
     */
    public function delete(Account $Account, Project $project)
    {
        //
    }

    /**
     * Determine whether the Account can restore the project.
     *
     * @param  \App\Account  $Account
     * @param  \App\Project  $project
     * @return mixed
     */
    public function restore(Account $Account, Project $project)
    {
        //
    }

    /**
     * Determine whether the Account can permanently delete the project.
     *
     * @param  \App\Account  $Account
     * @param  \App\Project  $project
     * @return mixed
     */
    public function forceDelete(Account $Account, Project $project)
    {
        //
    }
}
