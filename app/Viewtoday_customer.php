<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewtoday_customer extends Model
{
	protected $table = 'fm_cust_complaints';	
	 protected $fillable = [
        'firstname', 'lastname',
    ];
	
	//protected $primaryKey = 'complaint_id';	
	public $timestamps = false;
    //
}
class Country extends Model{
	protected $table = 'fm_country';
}
