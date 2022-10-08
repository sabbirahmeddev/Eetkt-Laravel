<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class HotelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the hotel can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list hotels');
    }

    /**
     * Determine whether the hotel can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function view(User $user, Hotel $model)
    {
        return $user->hasPermissionTo('view hotels');
    }

    /**
     * Determine whether the hotel can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create hotels');
    }

    /**
     * Determine whether the hotel can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function update(User $user, Hotel $model)
    {
        return $user->hasPermissionTo('update hotels');
    }

    /**
     * Determine whether the hotel can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function delete(User $user, Hotel $model)
    {
        return $user->hasPermissionTo('delete hotels');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete hotels');
    }

    /**
     * Determine whether the hotel can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function restore(User $user, Hotel $model)
    {
        return false;
    }

    /**
     * Determine whether the hotel can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Hotel  $model
     * @return mixed
     */
    public function forceDelete(User $user, Hotel $model)
    {
        return false;
    }
}
