// ddl/app/Policies/ClaimPolicy.php

<?php

namespace App\Policies;

use App\User;
use App\Claim;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClaimPolicy
{
	use HandlesAuthorization;

    /**
	* Determine whether the user can view any Claim.
	*
	* @param  \App\User  $user
	* @return mixed
	*/
    public function viewAny(User $user)
    {
        //
    }

    /**	
	* Determine whether the user can view the Claim.	
	*
	* @param  \App\User  $user
	* @param  \App\Claim  $claim
	* @return mixed
	*/
    public function view(User $user, Claim $claim)	
    {
	    //
    }

    /**
	* Determine whether the user can create claims.
	*
	* @param  \App\User  $user
	* @return mixed
	*/	
    public function create(User $user)
    {
	    //
    }

    /**
	* Determine whether the user can update the Claim
	*
	* @param  \App\User  $user
	* @param  \App\Claim  $claim
	* @return mixed
	*/
	public function update(User $user, Claim $claim)
     {
	   //
     }

    /**
	* Determine whether the user can delete the Claim.
	*
	* @param  \App\User  $user
	* @param  \App\Claim  $claim
	* @return mixed
	*/
    public function delete(User $user, Claim $claim)
    {
	    //
    }

    /**
	* Determine whether the user can restore the Claim.
	*
	* @param  \App\User  $user
	* @param  \App\Claim  $claim
	* @return mixed
	*/
    public function restore(User $user, Claim $claim)
    {
	  //
    }
    
    /**
     * Determine whether the user can permanently delete the Claim.
     *
     * @param  \App\User  $user
     * @param  \App\Claim  $claim
     * @return mixed
     */
    public function forceDelete(User $user, Claim $claim)
    {
        //
    }
}
