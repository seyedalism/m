<?php namespace App\Models;

use App\Core\Model as Model;

class Question extends Model
{
	protected $guarded = [];
	protected $table   = 'questions';
	protected $fields  = [
		'id'       => 0,
		'question' => null,
		'one'      => null,
		'tow'      => null,
		'three'    => null,
		'four'     => null,
		'point'    => null,
		'answer'   => null
	];

}