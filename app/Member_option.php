<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member_option extends Model
{
	protected $dates = ['deleted_at'];
}
