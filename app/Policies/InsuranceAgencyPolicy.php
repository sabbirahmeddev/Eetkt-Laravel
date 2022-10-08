<?php

namespace App\Policies;

use App\Models\User;
use App\Models\InsuranceAgency;
use Illuminate\Auth\Access\HandlesAuthorization;

class InsuranceAgencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the insuranceAgency can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list insuranceagencies');
    }

    /**
     * Determine whether the insuranceAgency can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function view(User $user, InsuranceAgency $model)
    {
        return $user->hasPermissionTo('view insuranceagencies');
    }

    /**
     * Determine whether the insuranceAgency can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create insuranceagencies');
    }

    /**
     * Determine whether the insuranceAgency can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function update(User $user, InsuranceAgency $model)
    {
        return $user->hasPermissionTo('update insuranceagencies');
    }

    /**
     * Determine whether the insuranceAgency can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function delete(User $user, InsuranceAgency $model)
    {
        return $user->hasPermissionTo('delete insuranceagencies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete insuranceagencies');
    }

    /**
     * Determine whether the insuranceAgency can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function restore(User $user, InsuranceAgency $model)
    {
        return false;
    }

    /**
     * Determine whether the insuranceAgency can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InsuranceAgency  $model
     * @return mixed
     */
    public function forceDelete(User $user, InsuranceAgency $model)
    {
        return false;
    }
}
