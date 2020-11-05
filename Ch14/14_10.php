<?php

$usersAddr = User::with(‘address’) //join on address relation
		  ->where('is_active', true) //returns QueryBuilder object
		  ->where('age', '>', $startingAge)        
    		  ->where('gender', $gender)
		  ->where(function ($query) use ($request) {
			$query->whereHas('posts', function ($query) use 
				($request) { 
					$query->where('is_published', $published);
				});
			})
		  ->get()    //fetches result and returns a Collection
		  ->address; //grabs the ‘address’ relation--included via 
				  //the call to with() in the first line

