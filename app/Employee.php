<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'fm_employee';	
	protected $primaryKey = 'emp_id';
	
	    public $timestamps = false;
    //
}

