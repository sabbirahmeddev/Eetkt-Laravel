<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SocialLink;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialLinkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the socialLink can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list sociallinks');
    }

    /**
     * Determine whether the socialLink can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function view(User $user, SocialLink $model)
    {
        return $user->hasPermissionTo('view sociallinks');
    }

    /**
     * Determine whether the socialLink can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create sociallinks');
    }

    /**
     * Determine whether the socialLink can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function update(User $user, SocialLink $model)
    {
        return $user->hasPermissionTo('update sociallinks');
    }

    /**
     * Determine whether the socialLink can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function delete(User $user, SocialLink $model)
    {
        return $user->hasPermissionTo('delete sociallinks');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete sociallinks');
    }

    /**
     * Determine whether the socialLink can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function restore(User $user, SocialLink $model)
    {
        return false;
    }

    /**
     * Determine whether the socialLink can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SocialLink  $model
     * @return mixed
     */
    public function forceDelete(User $user, SocialLink $model)
    {
        return false;
    }
}
