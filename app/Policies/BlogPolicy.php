<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the blog can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list blogs');
    }

    /**
     * Determine whether the blog can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function view(User $user, Blog $model)
    {
        return $user->hasPermissionTo('view blogs');
    }

    /**
     * Determine whether the blog can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create blogs');
    }

    /**
     * Determine whether the blog can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function update(User $user, Blog $model)
    {
        return $user->hasPermissionTo('update blogs');
    }

    /**
     * Determine whether the blog can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function delete(User $user, Blog $model)
    {
        return $user->hasPermissionTo('delete blogs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete blogs');
    }

    /**
     * Determine whether the blog can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function restore(User $user, Blog $model)
    {
        return false;
    }

    /**
     * Determine whether the blog can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Blog  $model
     * @return mixed
     */
    public function forceDelete(User $user, Blog $model)
    {
        return false;
    }
}
