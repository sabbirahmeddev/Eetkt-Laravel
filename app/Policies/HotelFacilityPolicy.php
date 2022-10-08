<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HotelFacility;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelFacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelFacility can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list hotelfacilities');
    }

    /**
     * Determine whether the hotelFacility can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function view(User $user, HotelFacility $model)
    {
        return $user->hasPermissionTo('view hotelfacilities');
    }

    /**
     * Determine whether the hotelFacility can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create hotelfacilities');
    }

    /**
     * Determine whether the hotelFacility can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function update(User $user, HotelFacility $model)
    {
        return $user->hasPermissionTo('update hotelfacilities');
    }

    /**
     * Determine whether the hotelFacility can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function delete(User $user, HotelFacility $model)
    {
        return $user->hasPermissionTo('delete hotelfacilities');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete hotelfacilities');
    }

    /**
     * Determine whether the hotelFacility can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function restore(User $user, HotelFacility $model)
    {
        return false;
    }

    /**
     * Determine whether the hotelFacility can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelFacility  $model
     * @return mixed
     */
    public function forceDelete(User $user, HotelFacility $model)
    {
        return false;
    }
}
