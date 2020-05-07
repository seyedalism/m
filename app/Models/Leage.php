<?php namespace App\Models;

use App\Core\Model as Model;

class Leage extends Model
{
	protected $guarded = ['id'];
	protected $fields  = [
		'id' => 0,
		'name' => null,
		'start' => null,
		'end'     => null
	];
}