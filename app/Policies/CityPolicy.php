<?php

namespace App\Policies;

use App\Models\City;
use App\Models\UserMaster;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(UserMaster $userMaster)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserMaster $userMaster, City $city)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(UserMaster $userMaster)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserMaster $userMaster, City $city)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserMaster $userMaster, City $city)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserMaster $userMaster, City $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserMaster  $userMaster
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserMaster $userMaster, City $city)
    {
        //
    }
}
