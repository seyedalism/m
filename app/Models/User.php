<?php namespace App\Models;

use App\Core\Model as Model;

class User extends Model
{
	protected $guarded = ['id'];
	protected $table   = 'users';
	protected $fields  = [
		'id' => 0,
		'username' => null,
		'password' => null,
		'name'     => null,
		'phone'    => null,
		'uniNum'   => null
	];

}