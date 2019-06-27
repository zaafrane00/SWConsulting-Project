<?php

namespace App\Policies;

use App\User;
use App\Pays;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaysPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pays.
     *
     * @param  \App\User  $user
     * @param  \App\Pays  $pays
     * @return mixed
     */
    public function view(User $user, Pays $pays)
    {
        //
    }

    /**
     * Determine whether the user can create pays.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $userConncter =Auth::user();
      
     return Auth::user()->id===13 ;
 
    }

    /**
     * Determine whether the user can update the pays.
     *
     * @param  \App\User  $user
     * @param  \App\Pays  $pays
     * @return mixed
     */
    public function update(User $user, Pays $pays)
    {
        $userConncter =Auth::user();
    
        return true;
    }

    /**
     * Determine whether the user can delete the pays.
     *
     * @param  \App\User  $user
     * @param  \App\Pays  $pays
     * @return mixed
     */
    public function delete(User $user, Pays $pays)
    {
        //
    }

    /**
     * Determine whether the user can restore the pays.
     *
     * @param  \App\User  $user
     * @param  \App\Pays  $pays
     * @return mixed
     */
    public function restore(User $user, Pays $pays)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pays.
     *
     * @param  \App\User  $user
     * @param  \App\Pays  $pays
     * @return mixed
     */
    public function forceDelete(User $user, Pays $pays)
    {
        //
    }
}
