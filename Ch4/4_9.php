<?php

/**
 * Determine whether the user can update the Claim
 *
 * @param  \App\User  $user
 * @param  \App\Claim  $claim
 * @return mixed
 */
 public function update(User $user, Claim $claim)
 {
	switch ($user->role) {
		case ‘Administrator’:
		case ‘Provider’:
			return true;
			break;
		case ‘Office_Assistant’:
			$employeeManager = (new EmployeeManager());
			$providerOffice = $employeeManager->
				findRegistrationFor($user);
			if ($claim->provider === $providerOffice->provider) {
				return true;
			}
			Return false;
			break;
	     default: 
			return false;
	}
 }
