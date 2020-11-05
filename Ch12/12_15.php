<?php

namespace App\Models;

use App\ValueObjects\ISBN;

class Book extends Model
{
 	public $table = ‘books’;
	public $fillable = [‘title’, ‘isbn’];

	public function isbn()
	{
		return $this->hasOne(ISBN::class);
	}
}
