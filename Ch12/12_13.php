<?php
// use statements + namespace ...
class Book extends Model
{
 	public $table = ‘books’;
	public $fillable = [‘title’];

	public function setIsbnAttribute($isbn)
	{
		if (!strlen($isbn) == 10 || !strlen($isbn) == 13) {
			throw new InvalidIsbnLengthException();
		}
	}
}
