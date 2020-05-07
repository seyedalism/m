<?php namespace App\Models;

use App\Core\Model as Model;

class leage_question extends Model
{
	protected $primary_key = null;
	protected $guarded = [];
	protected $table   = "leage_question";
	protected $fields  = [
		'lid' => 0,
		'qid' => 0
	];

}