<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CarBrand;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarBrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the carBrand can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list carbrands');
    }

    /**
     * Determine whether the carBrand can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function view(User $user, CarBrand $model)
    {
        return $user->hasPermissionTo('view carbrands');
    }

    /**
     * Determine whether the carBrand can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create carbrands');
    }

    /**
     * Determine whether the carBrand can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function update(User $user, CarBrand $model)
    {
        return $user->hasPermissionTo('update carbrands');
    }

    /**
     * Determine whether the carBrand can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function delete(User $user, CarBrand $model)
    {
        return $user->hasPermissionTo('delete carbrands');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete carbrands');
    }

    /**
     * Determine whether the carBrand can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function restore(User $user, CarBrand $model)
    {
        return false;
    }

    /**
     * Determine whether the carBrand can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CarBrand  $model
     * @return mixed
     */
    public function forceDelete(User $user, CarBrand $model)
    {
        return false;
    }
}
