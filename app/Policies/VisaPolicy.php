<?php

namespace App\Policies;

use App\Models\Visa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the visa can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list visas');
    }

    /**
     * Determine whether the visa can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function view(User $user, Visa $model)
    {
        return $user->hasPermissionTo('view visas');
    }

    /**
     * Determine whether the visa can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create visas');
    }

    /**
     * Determine whether the visa can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function update(User $user, Visa $model)
    {
        return $user->hasPermissionTo('update visas');
    }

    /**
     * Determine whether the visa can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function delete(User $user, Visa $model)
    {
        return $user->hasPermissionTo('delete visas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete visas');
    }

    /**
     * Determine whether the visa can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function restore(User $user, Visa $model)
    {
        return false;
    }

    /**
     * Determine whether the visa can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visa  $model
     * @return mixed
     */
    public function forceDelete(User $user, Visa $model)
    {
        return false;
    }
}
