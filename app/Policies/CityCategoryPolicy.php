<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CityCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cityCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list citycategories');
    }

    /**
     * Determine whether the cityCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function view(User $user, CityCategory $model)
    {
        return $user->hasPermissionTo('view citycategories');
    }

    /**
     * Determine whether the cityCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create citycategories');
    }

    /**
     * Determine whether the cityCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function update(User $user, CityCategory $model)
    {
        return $user->hasPermissionTo('update citycategories');
    }

    /**
     * Determine whether the cityCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function delete(User $user, CityCategory $model)
    {
        return $user->hasPermissionTo('delete citycategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete citycategories');
    }

    /**
     * Determine whether the cityCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function restore(User $user, CityCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the cityCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CityCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, CityCategory $model)
    {
        return false;
    }
}
