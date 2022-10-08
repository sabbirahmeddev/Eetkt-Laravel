<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobcategories');
    }

    /**
     * Determine whether the jobCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function view(User $user, JobCategory $model)
    {
        return $user->hasPermissionTo('view jobcategories');
    }

    /**
     * Determine whether the jobCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobcategories');
    }

    /**
     * Determine whether the jobCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function update(User $user, JobCategory $model)
    {
        return $user->hasPermissionTo('update jobcategories');
    }

    /**
     * Determine whether the jobCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function delete(User $user, JobCategory $model)
    {
        return $user->hasPermissionTo('delete jobcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobcategories');
    }

    /**
     * Determine whether the jobCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function restore(User $user, JobCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the jobCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobCategory $model)
    {
        return false;
    }
}
