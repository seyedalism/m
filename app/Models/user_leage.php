<?php namespace App\Models;

use App\Core\Model as Model;

class user_leage extends Model
{
	protected $primary_key = null;
	protected $guarded = [];
	protected $table   = "user_leage";
	protected $fields  = [
		'userid' => 0,
		'leageid' => 0,
		'norm' => 0
	];

}