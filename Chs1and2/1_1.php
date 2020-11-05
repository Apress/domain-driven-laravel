<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public $table = ‘customers’;
	protected $fillable = [‘name’, ‘phone’, ‘phone_type'];
}
