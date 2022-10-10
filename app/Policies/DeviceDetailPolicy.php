<?php

namespace App\Policies;

use App\Models\account;
use App\Models\deviceDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeviceDetailPolicy
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
     * @param  \App\Models\deviceDetail  $deviceDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(account $account, deviceDetail $deviceDetail)
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
     * @param  \App\Models\deviceDetail  $deviceDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(account $account, deviceDetail $deviceDetail)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\deviceDetail  $deviceDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(account $account, deviceDetail $deviceDetail)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\deviceDetail  $deviceDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(account $account, deviceDetail $deviceDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\account  $account
     * @param  \App\Models\deviceDetail  $deviceDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(account $account, deviceDetail $deviceDetail)
    {
        //
    }
}
