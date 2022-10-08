<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DestinationBlog;
use Illuminate\Auth\Access\HandlesAuthorization;

class DestinationBlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the destinationBlog can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list destinationblogs');
    }

    /**
     * Determine whether the destinationBlog can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function view(User $user, DestinationBlog $model)
    {
        return $user->hasPermissionTo('view destinationblogs');
    }

    /**
     * Determine whether the destinationBlog can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create destinationblogs');
    }

    /**
     * Determine whether the destinationBlog can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function update(User $user, DestinationBlog $model)
    {
        return $user->hasPermissionTo('update destinationblogs');
    }

    /**
     * Determine whether the destinationBlog can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function delete(User $user, DestinationBlog $model)
    {
        return $user->hasPermissionTo('delete destinationblogs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete destinationblogs');
    }

    /**
     * Determine whether the destinationBlog can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function restore(User $user, DestinationBlog $model)
    {
        return false;
    }

    /**
     * Determine whether the destinationBlog can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DestinationBlog  $model
     * @return mixed
     */
    public function forceDelete(User $user, DestinationBlog $model)
    {
        return false;
    }
}
