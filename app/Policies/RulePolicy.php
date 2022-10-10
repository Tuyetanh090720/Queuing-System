<?php

namespace App\Policies;

use App\Models\account;
use App\Models\rule;
use Illuminate\Auth\Access\HandlesAuthorization;

class RulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(account $account)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\rule  $rule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(account $account, rule $rule)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(account $account)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\rule  $rule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(account $account, rule $rule)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\rule  $rule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(account $account, rule $rule)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\rule  $rule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(account $account, rule $rule)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\rule  $rule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(account $account, rule $rule)
    {
        //
    }
}
