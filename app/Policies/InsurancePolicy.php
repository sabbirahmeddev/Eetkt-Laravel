<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Insurance;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsurancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the insurance can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list insurances');
    }

    /**
     * Determine whether the insurance can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function view(User $user, Insurance $model)
    {
        return $user->hasPermissionTo('view insurances');
    }

    /**
     * Determine whether the insurance can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create insurances');
    }

    /**
     * Determine whether the insurance can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function update(User $user, Insurance $model)
    {
        return $user->hasPermissionTo('update insurances');
    }

    /**
     * Determine whether the insurance can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function delete(User $user, Insurance $model)
    {
        return $user->hasPermissionTo('delete insurances');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete insurances');
    }

    /**
     * Determine whether the insurance can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function restore(User $user, Insurance $model)
    {
        return false;
    }

    /**
     * Determine whether the insurance can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Insurance  $model
     * @return mixed
     */
    public function forceDelete(User $user, Insurance $model)
    {
        return false;
    }
}
