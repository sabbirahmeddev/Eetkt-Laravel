<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobSubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobSubCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the jobSubCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list jobsubcategories');
    }

    /**
     * Determine whether the jobSubCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function view(User $user, JobSubCategory $model)
    {
        return $user->hasPermissionTo('view jobsubcategories');
    }

    /**
     * Determine whether the jobSubCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create jobsubcategories');
    }

    /**
     * Determine whether the jobSubCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function update(User $user, JobSubCategory $model)
    {
        return $user->hasPermissionTo('update jobsubcategories');
    }

    /**
     * Determine whether the jobSubCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function delete(User $user, JobSubCategory $model)
    {
        return $user->hasPermissionTo('delete jobsubcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete jobsubcategories');
    }

    /**
     * Determine whether the jobSubCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function restore(User $user, JobSubCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the jobSubCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\JobSubCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, JobSubCategory $model)
    {
        return false;
    }
}
