<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HotelService;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotelService can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list hotelservices');
    }

    /**
     * Determine whether the hotelService can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function view(User $user, HotelService $model)
    {
        return $user->hasPermissionTo('view hotelservices');
    }

    /**
     * Determine whether the hotelService can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create hotelservices');
    }

    /**
     * Determine whether the hotelService can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function update(User $user, HotelService $model)
    {
        return $user->hasPermissionTo('update hotelservices');
    }

    /**
     * Determine whether the hotelService can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function delete(User $user, HotelService $model)
    {
        return $user->hasPermissionTo('delete hotelservices');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete hotelservices');
    }

    /**
     * Determine whether the hotelService can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function restore(User $user, HotelService $model)
    {
        return false;
    }

    /**
     * Determine whether the hotelService can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\HotelService  $model
     * @return mixed
     */
    public function forceDelete(User $user, HotelService $model)
    {
        return false;
    }
}
