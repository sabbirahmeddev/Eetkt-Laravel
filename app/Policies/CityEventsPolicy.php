<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CityEvents;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityEventsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cityEvents can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allcityevents');
    }

    /**
     * Determine whether the cityEvents can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function view(User $user, CityEvents $model)
    {
        return $user->hasPermissionTo('view allcityevents');
    }

    /**
     * Determine whether the cityEvents can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allcityevents');
    }

    /**
     * Determine whether the cityEvents can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function update(User $user, CityEvents $model)
    {
        return $user->hasPermissionTo('update allcityevents');
    }

    /**
     * Determine whether the cityEvents can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function delete(User $user, CityEvents $model)
    {
        return $user->hasPermissionTo('delete allcityevents');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allcityevents');
    }

    /**
     * Determine whether the cityEvents can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function restore(User $user, CityEvents $model)
    {
        return false;
    }

    /**
     * Determine whether the cityEvents can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityEvents  $model
     * @return mixed
     */
    public function forceDelete(User $user, CityEvents $model)
    {
        return false;
    }
}
