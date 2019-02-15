<?php

namespace App\Policies;

use App\Modules\Account\Models\Account;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the Account can view the team.
     *
     * @param  \App\Account  $Account
     * @param  \App\Team  $team
     * @return mixed
     */
    public function view(Account $Account, Team $team)
    {
        return $team->account_id == $account->account_id;
    }

    /**
     * Determine whether the Account can create teams.
     *
     * @param  \App\Account  $Account
     * @return mixed
     */
    public function create(Account $Account)
    {
        //
    }

    /**
     * Determine whether the Account can update the team.
     *
     * @param  \App\Account  $Account
     * @param  \App\Team  $team
     * @return mixed
     */
    public function update(Account $Account, Team $team)
    {
        //
    }

    /**
     * Determine whether the Account can delete the team.
     *
     * @param  \App\Account  $Account
     * @param  \App\Team  $team
     * @return mixed
     */
    public function delete(Account $Account, Team $team)
    {
        //
    }

    /**
     * Determine whether the Account can restore the team.
     *
     * @param  \App\Account  $Account
     * @param  \App\Team  $team
     * @return mixed
     */
    public function restore(Account $Account, Team $team)
    {
        //
    }

    /**
     * Determine whether the Account can permanently delete the team.
     *
     * @param  \App\Account  $Account
     * @param  \App\Team  $team
     * @return mixed
     */
    public function forceDelete(Account $Account, Team $team)
    {
        //
    }
}
