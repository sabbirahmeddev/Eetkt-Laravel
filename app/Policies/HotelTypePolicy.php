<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HotelType;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list hoteltypes');
    }

    /**
     * Determine whether the hotelType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function view(User $user, HotelType $model)
    {
        return $user->hasPermissionTo('view hoteltypes');
    }

    /**
     * Determine whether the hotelType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create hoteltypes');
    }

    /**
     * Determine whether the hotelType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function update(User $user, HotelType $model)
    {
        return $user->hasPermissionTo('update hoteltypes');
    }

    /**
     * Determine whether the hotelType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function delete(User $user, HotelType $model)
    {
        return $user->hasPermissionTo('delete hoteltypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete hoteltypes');
    }

    /**
     * Determine whether the hotelType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function restore(User $user, HotelType $model)
    {
        return false;
    }

    /**
     * Determine whether the hotelType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelType  $model
     * @return mixed
     */
    public function forceDelete(User $user, HotelType $model)
    {
        return false;
    }
}
