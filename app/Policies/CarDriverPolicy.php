<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CarDriver;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarDriverPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the carDriver can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list cardrivers');
    }

    /**
     * Determine whether the carDriver can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function view(User $user, CarDriver $model)
    {
        return $user->hasPermissionTo('view cardrivers');
    }

    /**
     * Determine whether the carDriver can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cardrivers');
    }

    /**
     * Determine whether the carDriver can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function update(User $user, CarDriver $model)
    {
        return $user->hasPermissionTo('update cardrivers');
    }

    /**
     * Determine whether the carDriver can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function delete(User $user, CarDriver $model)
    {
        return $user->hasPermissionTo('delete cardrivers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete cardrivers');
    }

    /**
     * Determine whether the carDriver can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function restore(User $user, CarDriver $model)
    {
        return false;
    }

    /**
     * Determine whether the carDriver can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarDriver  $model
     * @return mixed
     */
    public function forceDelete(User $user, CarDriver $model)
    {
        return false;
    }
}
