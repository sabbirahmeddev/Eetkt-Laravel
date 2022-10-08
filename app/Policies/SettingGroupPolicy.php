<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SettingGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the settingGroup can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list settinggroups');
    }

    /**
     * Determine whether the settingGroup can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function view(User $user, SettingGroup $model)
    {
        return $user->hasPermissionTo('view settinggroups');
    }

    /**
     * Determine whether the settingGroup can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create settinggroups');
    }

    /**
     * Determine whether the settingGroup can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function update(User $user, SettingGroup $model)
    {
        return $user->hasPermissionTo('update settinggroups');
    }

    /**
     * Determine whether the settingGroup can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function delete(User $user, SettingGroup $model)
    {
        return $user->hasPermissionTo('delete settinggroups');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete settinggroups');
    }

    /**
     * Determine whether the settingGroup can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function restore(User $user, SettingGroup $model)
    {
        return false;
    }

    /**
     * Determine whether the settingGroup can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\SettingGroup  $model
     * @return mixed
     */
    public function forceDelete(User $user, SettingGroup $model)
    {
        return false;
    }
}
