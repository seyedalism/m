<?php namespace App\Models;

use App\Core\Model as Model;

class Book extends Model
{
    protected $guarded = [];
    protected $fields  = [
        'id' => 0,
        'name' => null,
        'desc' => null
    ];
}