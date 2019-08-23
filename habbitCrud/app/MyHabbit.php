<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyHabbit extends Model
{
	protected $table = 'my_habbits';
    protected $fillable = ['name'];
}
