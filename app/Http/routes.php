<?php
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return Redirect::to('dashboard');
    //return view('welcome');
});

// User signup start
Route::post('auth/signup', function(){
    $rules = array(
        'name'             => 'required|max:255',                        // just a normal required validation
        'email'            => 'required|email|unique:users|max:255',     // required and must be unique in the ducks table
        'password'         => 'required|min:8',
        'password_confirm' => 'required|same:password|min:8'           // required and has to match the password field
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
        // get the error messages from the validator
        $messages = $validator->messages();
        // redirect our user back to the form with the errors from the validator
        return Redirect::to('auth/signup')->withErrors($validator);
    } else {
        $insertData = array(
        "name"    =>    Input::get("name"),
        "email"    =>    Input::get("email"),
        "password"    =>    Hash::make(Input::get('password'))
        );         
        DB::table('users')->Insert($insertData);    
        return Redirect::to('auth/signup')->with('register_succ', 'Signup has been create a successfully!');
    }
});

Route::get('auth/signup', function(){
    return View::make('auth/singup');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('api/auth/logout',function(){
	return Redirect::to('auth/logout');
});


//Route::get('logout', [ 'uses' => 'Auth\AuthController@getLogout', 'as' => 'logout' ]);

//Route::get('logout', AuthController@getLogout);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');

// loading dropdown values from db while loading the page 
Route::get('auth/register',function(){
   // $countries = \DB::table('fm_country')->lists('country_name', 'country_id');
	$countryList = App\Country::all(['country_id', 'country_name']);
	
	//$countryList = ['' => 'Select Country'] + $countries;
	$state_list = App\State::all('state_name', 'state_id');
	$region_list = App\Region::all('region_name', 'region_id');
	$city_list = App\Cities::all('city_name', 'city_id');
	$service_list = App\Services::all('service_name', 'service_id');
	//echo array($countries);
	//return view('auth/register')->with('countries', $countries)->with('state',$state_list)->with('city',$city_list)->with('region',$region_list);
	return View::make('auth/register', compact('countryList','state_list','region_list','city_list','service_list'));
}); 

Route::get('/api/overrideregister',function(){
   // $countries = \DB::table('fm_country')->lists('country_name', 'country_id');
   
    $complaint_id = Input::get('customer_id');		
	$emp_id = Input::get('employee_id');
	$empList = DB::table('fm_employee')
				->leftJoin('fm_cust_complaints', 'fm_employee.emp_id', '=', 'fm_cust_complaints.employee_id')
				->leftJoin('fm_cities', 'fm_cities.city_id', '=', 'fm_employee.emp_city')
				->select('emp_id','emp_name','fm_cities.city_name as emp_city', DB::raw('count(fm_cust_complaints.employee_id) as count'))
				->groupBy('emp_id')
				->get();
	if($emp_id =='0'){
	return redirect('auth/overrideregister')->with('select_emp', 'Please select any employee to assign!');	
	} else {
    $customer = App\Customers::where('complaint_id','=',$complaint_id)->first();
	$emp_list = App\Employee::all('emp_id','emp_name');
	}
	$countryList = App\Country::all(['country_id', 'country_name']);
	
	//echo $complaint_id;
	//$countryList = ['' => 'Select Country'] + $countries;
	$state_list = App\State::all('state_name', 'state_id');
	$region_list = App\Region::all('region_name', 'region_id');
	$city_list = App\Cities::all('city_name', 'city_id');
	$service_list = App\Services::all('service_name', 'service_id');	
	return view('auth/overrideregister', compact('customer','emp_list','empList','countryList','state_list','region_list','city_list','service_list'));
});

Route::get('/api/employee_assign',function(){
   // $countries = \DB::table('fm_country')->lists('country_name', 'country_id');
    $assgin_complatid =  Input::get('assgin_complatid');
    $complaint_id = Input::get('customer_id');		
	$emp_id = Input::get('employee_id');
	$empList = DB::table('fm_employee')
				->leftJoin('fm_cust_complaints', 'fm_employee.emp_id', '=', 'fm_cust_complaints.employee_id')
				->leftJoin('fm_cities', 'fm_cities.city_id', '=', 'fm_employee.emp_city')
				->select('emp_id','emp_name','fm_cities.city_name as emp_city', DB::raw('count(fm_cust_complaints.employee_id) as count'))
				->groupBy('emp_id')
				->get();
	if($emp_id =='0'){
	return redirect('auth/employee_assign')->with('select_emp', 'Please select any employee to assign!');	
	} else {
    $customer = App\Customers::where('complaint_id','=',$complaint_id)->first();
	$emp_list = App\Employee::all('emp_id','emp_name');
	}
	$countryList = App\Country::all(['country_id', 'country_name']);
	
	//echo $complaint_id;
	//$countryList = ['' => 'Select Country'] + $countries;
	$state_list = App\State::all('state_name', 'state_id');
	$region_list = App\Region::all('region_name', 'region_id');
	$city_list = App\Cities::all('city_name', 'city_id');
	$service_list = App\Services::all('service_name', 'service_id');	
	return view('auth/employee_assign', compact('customer','assgin_complatid','emp_list','empList','countryList','state_list','region_list','city_list','service_list'));
});


Route::post('/api/overrideregister',function(){
   // $countries = \DB::table('fm_country')->lists('country_name', 'country_id');
    //$complaint_id = Input::get('customer_id');
	
    $customer = App\Customers::where('complaint_id','=',$complaint_id)->first();
	$countryList = App\Country::all(['country_id', 'country_name']);

	//$countryList = ['' => 'Select Country'] + $countries;
	$state_list = App\State::all('state_name', 'state_id');
	$region_list = App\Region::all('region_name', 'region_id');
	$city_list = App\Cities::all('city_name', 'city_id');
	$service_list = App\Services::all('service_name', 'service_id');
	//echo array($countries);
	//return view('auth/register')->with('countries', $countries)->with('state',$state_list)->with('city',$city_list)->with('region',$region_list);
	return View::make('auth/overrideregister', compact('customer','countryList','state_list','region_list','city_list','service_list'));
});


// Dropdown changing values for country
$country_id='';		
Route::get('/api/dropdown_country', function(){	
	$country_id = Input::get('option');
	$country = \DB::table('fm_country')->where('country_id',$country_id)->pluck('country_id');
	Session::set('country_id', $country_id);

	$region_filter = DB::table('fm_states')->where('country_id',$country)->lists('state_name', 'state_id');
	return $region_filter;
});
// dropdown changing values for state

$state_id='';		
Route::get('/api/dropdown_city', function(){	
	$state_id = Input::get('option');
	$state = \DB::table('fm_states')->where('state_id',$state_id)->pluck('state_id');
	Session::set('state_id', $state_id);

	$region_filter = DB::table('fm_cities')->where('state_id',$state)->lists('city_name', 'city_id');
	return $region_filter;
});

// Delete the customer id
$cust_id='';		
Route::get('/api/delete_cusid', function(){	
	$cust_id = Input::get('cust_id');
	DB::table('fm_cust_complaints')->where('complaint_id', '=', $cust_id)->delete();
	//DB::table('fm_cust_complaints')->where('complaint_id',$cust_id)->delete();
	$cust_id_delete =1;
	return $cust_id_delete;
});

// Multi Delete the using Job id

/*$cust_id='';        
Route::get('/api/delete_cusids', function(){    
    $cust_id = Input::get('cust_id');
   $sel =	DB::table('fm_cust_complaints')->where('complaint_id', '=', $cust_id );
	//echo $sel;
	//$upd =  DB::table('fm_cust_complaints')->where('complaint_code','=',$sel)->update('flag1',' =', 1);
	 //$cust_id_delete =1;
    //return $upd;
});*/


//Route::post('auth/signup_message', array('uses'=>'Auth\AuthController@postSignup'));

Route::get('dashboard', function(){
	if(Auth::guest()){
		return Redirect::to('auth/login');
	}else{		
		// loading dropdown values from db while loading the page	
		
		
		$countryList = App\Country::all(['country_id', 'country_name']);
	
		//$countryList = ['' => 'Select Country'] + $countries;
		$state_list = App\State::all('state_name', 'state_id');
		$region_list = App\Region::all('region_name', 'region_id');
		$city_list = App\Cities::all('city_name', 'city_id');
		$service_list = App\Services::all('service_name', 'service_id');
		
		$track_order = DB::table('fm_cust_complaints')					
				->orderBy('complaint_date', 'desc')
				->get();	
				
		$emp_list = App\Employee::all('emp_id','emp_name');
		
						
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')					
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_latitude','fm_employee.emp_longitude' )		
				->get();
						
		return view('dashboard',compact('customerList','emp_list','countryList','state_list','region_list','city_list','service_list','track_order'));
	}	
});


Route::get('api/activedashboard', function(){
		$emp_list = App\Employee::all('emp_id','emp_name');
		// loading dropdown values from db while loading the page	
		//$option = Input::get('option');
		$track_order = Input::get('track_order');
		$service = Input::get('service');
		$order_status = Input::get('order_status');		
		$select_state = Input::get('select_state');	
			
		$select_assign = Input::get('select_assign');
		
		if($track_order !='' && $service =='' && $order_status =='' && $select_state =='' && $select_assign ==''){
			$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order !='' && $service !='' && $order_status =='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order !='' && $service !='' && $order_status !='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order !='' && $service !='' && $order_status !='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status =='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status !='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status !='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status !='' && $select_state !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		}
		else if($track_order =='' && $service =='' && $order_status !='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service =='' && $order_status !='' && $select_state !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service =='' && $order_status =='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status =='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status =='' && $select_state !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $order_status =='' && $select_state =='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $select_state !='' && $order_status =='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else if($track_order =='' && $service !='' && $select_state !='' && $order_status !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order =='' && $service =='' && $order_status =='' && $select_state =='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order =='' && $service =='' && $order_status !='' && $select_state =='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order =='' && $service =='' && $order_status !='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order !='' && $service =='' && $order_status !='' && $select_state =='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();	
		} else if($track_order !='' && $service =='' && $order_status =='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order !='' && $service =='' && $order_status !='' && $select_state !='' && $select_assign ==''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.complaint_code', '=', Input::get('track_order'))
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		} else if($track_order =='' && $service =='' && $order_status =='' && $select_state !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();													
		} else if($track_order !='' && $service !='' && $select_state !='' && $order_status !='' && $select_assign !=''){
		//return $whereStr;
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')
				
				->where('fm_cust_complaints.service_id', '=', Input::get('service') )
				->where('fm_cust_complaints.state_id', '=', Input::get('select_state') )
				->where('fm_cust_complaints.status', '=', Input::get('order_status') )
				->where('fm_employee.emp_id', '=', Input::get('select_assign') )
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')
				->get();
		
		} else {
			$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_employee.emp_name','fm_employee.emp_id','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')		
				->get();
				
		}	
				
		
		return view('allrecords',compact('customerList','emp_list'));
});

Route::get('/api/viewAppointments', function(){
	$customerList = App\Customers::where('employee_id',Input::get('empid'))->get();
	return $customerList;
});


Route::get('api/empList', function(){
	
	//$empList = App\Employee::all();		
	
	$empList = DB::table('fm_employee')
				->leftJoin('fm_cust_complaints', 'fm_employee.emp_id', '=', 'fm_cust_complaints.employee_id')
				->leftJoin('fm_cities', 'fm_cities.city_id', '=', 'fm_employee.emp_city')
				->select('emp_id','emp_name','fm_cities.city_name as emp_city', DB::raw('count(fm_cust_complaints.employee_id) as count'))
				->groupBy('emp_id')
				->get();
	
		
	return view('emplist',compact('empList'));
	
});



Route::get('home', function(){
	if(Auth::guest()){
		return Redirect::to('auth/login');
	}else{
		$countryList = App\Country::all(['country_id', 'country_name']);
	
		//$countryList = ['' => 'Select Country'] + $countries;
		$state_list = App\State::all('state_name', 'state_id');
		$region_list = App\Region::all('region_name', 'region_id');
		$city_list = App\Cities::all('city_name', 'city_id');
		$service_list = App\Services::all('service_name', 'service_id');
		
		$track_order = DB::table('fm_cust_complaints')					
				->orderBy('complaint_date', 'desc')
				->get();	
		$emp_list = App\Employee::all('emp_id','emp_name');
						
		$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')					
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')		
				->get();
						
		return view('dashboard',compact('customerList','emp_list','countryList','state_list','region_list','city_list','service_list','track_order'));
	}	
});
// Work Order insert database start
Route::get('workorder', function(){
	
		$customerList = App\Customers::all();		
		
		return view('dashboard',compact('customerList'));
	
});
// Work Order insert database End
function randomKey($length) {
    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
	$key="";
    for($i=0; $i < $length; $i++) {
        $key .= $pool[mt_rand(0, count($pool) - 1)];
    }
    return $key;
}
// it is for getting miles of employee 
function employeedistance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

function getAddress($address,$state,$zipcode,$country){
	$countryName = DB::table('fm_country')->where('country_id',$country)->first()->country_name;
	$stateName = DB::table('fm_states')->where('state_id',$state)->first()->state_name;
	$address=$address .','.$stateName .' '. $zipcode .','.$countryName;
	return $address;
}

// Today Customer Complaint count and view
Route::get('/api/today_count', function(){		
	$results = DB::select('select count(complaint_id) as todaytotal from `fm_cust_complaints` where `complaint_date` BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)');
	return $results[0]->todaytotal;	
});

Route::get('/api/viewtoday', function(){		
	$customerList = DB::select('
	select fm_cust_complaints.*,fm_services.service_name,fm_states.state_name,fm_employee.emp_name,fm_employee.emp_id,fm_employee.emp_about,fm_employee.emp_email, fm_employee.emp_mobile from fm_cust_complaints left Join fm_services ON (fm_cust_complaints.service_id = fm_services.service_id) left Join fm_states ON (fm_cust_complaints.state_id = fm_states.state_id) left Join fm_employee ON (fm_cust_complaints.employee_id = fm_employee.emp_id) where fm_cust_complaints.complaint_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)');
	
	$emp_list = App\Employee::all('emp_id','emp_name');
	return view('todayrecords',compact('customerList','emp_list'));
});
// Today Customer Complaint count and view
// Weekend Customer Complaint count and view
Route::get('/api/weekend', function(){	
	$results = DB::select('select count(complaint_id) as week from `fm_cust_complaints` where `complaint_date` BETWEEN DATE_ADD(CURDATE(), INTERVAL 1-DAYOFWEEK(CURDATE()) DAY) AND DATE_ADD(CURDATE(), INTERVAL 7-DAYOFWEEK(CURDATE()) DAY)');
	return $results[0]->week;
});

Route::get('/api/viewweekend', function(){		
	$customerList = DB::select('
	select fm_cust_complaints.*,fm_services.service_name,fm_states.state_name,fm_employee.emp_name,fm_employee.emp_id,fm_employee.emp_about,fm_employee.emp_email, fm_employee.emp_mobile from fm_cust_complaints left Join fm_services ON (fm_cust_complaints.service_id = fm_services.service_id) left Join fm_states ON (fm_cust_complaints.state_id = fm_states.state_id) left Join fm_employee ON (fm_cust_complaints.employee_id = fm_employee.emp_id) where fm_cust_complaints.complaint_date BETWEEN DATE_ADD(CURDATE(), INTERVAL 1-DAYOFWEEK(CURDATE()) DAY) AND DATE_ADD(CURDATE(), INTERVAL 7-DAYOFWEEK(CURDATE()) DAY)');
	
	$emp_list = App\Employee::all('emp_id','emp_name');
	return view('todayrecords',compact('customerList','emp_list'));
});
// Weekend Customer Complaint count and view
// Monthly Customer Complaint count and view
Route::get('/api/monthly', function(){	
	$results = DB::select('SELECT COUNT(complaint_id) AS month FROM `fm_cust_complaints` WHERE complaint_date BETWEEN DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) AND LAST_DAY(NOW())');
	return $results[0]->month;
});

Route::get('/api/viewmonthly', function(){		
	$customerList = DB::select('
	select fm_cust_complaints.*,fm_services.service_name,fm_states.state_name,fm_employee.emp_name,fm_employee.emp_id,fm_employee.emp_about,fm_employee.emp_email, fm_employee.emp_mobile from fm_cust_complaints left Join fm_services ON (fm_cust_complaints.service_id = fm_services.service_id) left Join fm_states ON (fm_cust_complaints.state_id = fm_states.state_id) left Join fm_employee ON (fm_cust_complaints.employee_id = fm_employee.emp_id) where fm_cust_complaints.complaint_date BETWEEN DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) AND LAST_DAY(NOW())');
	
	$emp_list = App\Employee::all('emp_id','emp_name');
	return view('todayrecords',compact('customerList','emp_list'));
});

// Pending Customer Complaint count and view
Route::get('/api/pending', function(){    
    $results = DB::select('SELECT COUNT(complaint_id) AS pending FROM `fm_cust_complaints` WHERE status="pending" ');
    return $results[0]->pending;
});

Route::get('/api/viewpending', function(){        
    $customerList = DB::select('
    select fm_cust_complaints.*,fm_services.service_name,fm_states.state_name,fm_employee.emp_name,fm_employee.emp_id,fm_employee.emp_about,fm_employee.emp_email, fm_employee.emp_mobile from fm_cust_complaints left Join fm_services ON (fm_cust_complaints.service_id = fm_services.service_id) left Join fm_states ON (fm_cust_complaints.state_id = fm_states.state_id) left Join fm_employee ON (fm_cust_complaints.employee_id = fm_employee.emp_id) 
	where fm_cust_complaints.status ="pending"');
    
    $emp_list = App\Employee::all('emp_id','emp_name');
    return view('todayrecords',compact('customerList','emp_list'));
});
// Pending Customer Complaint count and view

// Monthly Customer Complaint count and view
Route::get('/api/map_directions', function(){	

	$custm_id = Input::get('custm_id');
	
	$mapping = DB::table('fm_cust_complaints')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')					
				->select('fm_cust_complaints.complaint_id','fm_cust_complaints.latitude','fm_cust_complaints.longitude','fm_employee.emp_latitude','fm_employee.emp_longitude')	
				->where('fm_cust_complaints.complaint_id', '=', Input::get('custm_id') )	
				->get();
				
	return view('directions_mapping',compact('mapping'));	
});


// it is for getting longitude and latitude 
function long_latt_value($address){
	//$url = 'http://maps.google.com/maps/api/geocode/json?address=' . $vendor_address . '&sensor=false';
	$value = str_replace(' ', "+", $address);
	
	$url1 = 'http://maps.google.com/maps/api/geocode/json?address=' . $value . '&sensor=false';

	$geocode = file_get_contents($url1);

	$output = json_decode($geocode, true);
	$latitude = $output['results'][0]['geometry']['location']['lat'];
	$longitude = $output['results'][0]['geometry']['location']['lng'];
	
	return array($latitude,$longitude);
}

Route::post('signup_message',function(){	
   
	$customer = new App\Customers;
	$rules = array(
        'customer_first_name' => 'required',                        // just a normal required validation
        'customer_email'      => 'required|email',     // required and must be unique in the ducks table
		'street'         => 'required',
		'locality'         => 'required',
		'mode_of_communication'         => 'required',
		'customer_mobile'         => 'required',
		'country'         => 'required',
		'state'         => 'required',
		'city'         => 'required',
		'complaint_desc'         => 'required',
		'service'         => 'required',
        'Address'         => 'required',
        'Zipcode' => 'required'           // required and has to match the password field
    );

    // do the validation ----------------------------------
    // validate against the inputs from our form
    $validator = Validator::make(Input::all(), $rules);
	 if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('dashboard')->withErrors($validator);

    } else {
	$date1 = Input::get("appointment_date");
	$date2 = date('Y-m-d H:i', strtotime($date1));
	//$date3 = date('Y-m-d H:i A', strtotime($date2));
	$customer->customer_first_name = Input::get("customer_first_name");
	$customer->customer_last_name = Input::get("customer_last_name");
	$customer_name = Input::get("customer_first_name");
	$customer_name .= " ";
	$customer_name .= Input::get("customer_last_name");
	$customer->customer_name = $customer_name;
	$customer->street = Input::get("street");
	$customer->locality = Input::get("locality");
	$customer->mode_of_communication = Input::get("mode_of_communication");
	$customer->customer_mobile = Input::get("customer_mobile");
	$customer->customer_email = Input::get("customer_email");
	$customer->country_id = Input::get("country");
	$customer->state_id = Input::get("state");	
	$customer->city_id = Input::get("city");
	$customer->complaint_desc = Input::get("complaint_desc");
	$customer->complaint_date = $date2;
	$customer->address = Input::get("Address");
	$customer->address2 = Input::get("Address2");
	$customer->zipcode = Input::get("Zipcode");
	$customer->facility = Input::get("facility");
	$customer->service_id = Input::get("service");
	$customer->status = 'unassigned';
	$customer->save();
	$insertedId=$customer->id;
	$code=randomKey(5);
	$cust_address=getAddress($customer->address,$customer->state_id,$customer->zipcode,$customer->country_id);

	$values=long_latt_value($cust_address);
	$latitude_cust_from=$values[0];
	$longitude_cust_from=$values[1];
	//echo $latitude_cust_from;
	//echo $longitude_cust_from;
	
	//updating latitude and longitude to customer
	\DB::table('fm_cust_complaints')
            ->where('complaint_id', $insertedId)
            ->update(['latitude' => $latitude_cust_from,'longitude'=>$longitude_cust_from]);
	
	//employee fetching query based on parameters from customer complaint
	$employees='';
	$employees=\DB::table('fm_employee')
	->where('emp_state' , $customer->state_id)
    //->where('emp_region', $customer->regional_id)
	->where('emp_city', $customer->city_id)
	->where('emp_specialization', $customer->service_id)->get();
	
	//assign employee to customer based on his geo locations
	$persons = array();
	foreach ($employees as $employee)
	{
		$range=employeedistance($latitude_cust_from,$longitude_cust_from,$employee->emp_latitude,$employee->emp_longitude,'K');
		$persons[$employee->emp_id] = $range; 
	}
	$assign_id='';
	$count=count($employees);
	foreach ($employees as $employee)
	{
		$min = min($persons);
		if ($persons[$employee->emp_id] == $min){
			$assign_id=$employee->emp_id;
		}
	}
	
	if ($count > 0 ) //employee returns more than one record
	{
		//echo $code;
		\DB::table('fm_cust_complaints')
            ->where('complaint_id', $insertedId)
            ->update(['complaint_code' => $code,'employee_id'=>$assign_id,'employee_name'=>$employee->emp_name,'status'=>'assigned']);
	}else
	{
		//echo 'ok';
		\DB::table('fm_cust_complaints')
            ->where('complaint_id', $insertedId)
            ->update(['complaint_code' => $code]);
	}		
	//echo 'Your compliant code ';
	//echo $code;
	//return "Your complaint saved scuccessfully";
	return redirect('dashboard')->with('customer_upstatus', 'Your compliant code <strong>( '.$code.' )</strong> Your complaint saved scuccessfully!');
	}
});


Route::post('api/override',function(){	
	
	$customer = new App\Customers;
	$emp_id = Input::get("employee_id");
	$date1 = Input::get("appointment_date");
	$date2 = date('Y-m-d H:i', strtotime($date1));	
	if($emp_id !='') {
		$customer_name = Input::get("customer_first_name");
		$customer_name .= " ";
		$customer_name .= Input::get("customer_last_name");
	 	\DB::table('fm_cust_complaints')
		->where('complaint_id', Input::get("complaint_id"))
		->update([
		'customer_first_name' => Input::get("customer_first_name"),
		'customer_last_name' => Input::get("customer_last_name"),
		'customer_name' => $customer_name,
		'street' => Input::get("street"),
		'locality' => Input::get("locality"),
		'mode_of_communication' => Input::get("mode_of_communication"),
		'customer_mobile' => Input::get("customer_mobile"),
		'customer_email' => Input::get("customer_email"),
		'country_id' => Input::get("country"),
		'state_id' => Input::get("state"),
		'regional_id' => Input::get("region_id"),
		'city_id' => Input::get("city"),
		'complaint_desc' => Input::get("complaint_desc"),
		'complaint_date' => $date2,
		'address' => Input::get("Address"),
		'address2' => Input::get("address2"),
		'zipcode' => Input::get("Zipcode"),
		'service_id' => Input::get("service_id"),	
		'employee_id' => Input::get("employee_id"),
		'employee_name' => Input::get("employee_name"),
		'status'=>'assigned'
		]);
	return Redirect::to('dashboard')->with('customer_update', 'Vendor has been assgin to this customer !');	
	} else {	
	$customer_name = Input::get("customer_first_name");
		$customer_name .= " ";
		$customer_name .= Input::get("customer_last_name");
	 	\DB::table('fm_cust_complaints')
		->where('complaint_id', Input::get("complaint_id"))
		->update([
		'customer_first_name' => Input::get("customer_first_name"),
		'customer_last_name' => Input::get("customer_last_name"),
		'customer_name' => $customer_name,
		'street' => Input::get("street"),
		'locality' => Input::get("locality"),
		'mode_of_communication' => Input::get("mode_of_communication"),
		'customer_mobile' => Input::get("customer_mobile"),
		'customer_email' => Input::get("customer_email"),
		'country_id' => Input::get("country"),
		'state_id' => Input::get("state"),
		'regional_id' => Input::get("region_id"),
		'city_id' => Input::get("city"),
		'complaint_desc' => Input::get("complaint_desc"),
		//'last_modified_date' => Input::get("complaint_date"),
		'address' => Input::get("Address"),
		'address2' => Input::get("address2"),
		'zipcode' => Input::get("Zipcode"),
		'service_id' => Input::get("service_id")
		]);
	return Redirect::to('dashboard')->with('customer_notassgin', 'Your customer compliant update. Plaese select any vendors and assgin!');
	}
	
});

Route::get('/api/unassigned',function(){	
	$emp_list = App\Employee::all('emp_id','emp_name');
	$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')	
				->where('fm_cust_complaints.status', '=', Input::get('custom_status') )	
				->get();			
	
		return view('allrecords',compact('customerList','emp_list'));
});

Route::get('/api/assigned',function(){	
	$emp_list = App\Employee::all('emp_id','emp_name');
	$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_employee.emp_name','fm_employee.emp_id','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')	
				->where('fm_cust_complaints.status', '=', Input::get('custom_assign') )	
				->get();			
	
		return view('allrecords',compact('customerList','emp_list'));
});

Route::get('/api/inprogress',function(){	
	$emp_list = App\Employee::all('emp_id','emp_name');
	$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_about','fm_employee.emp_name','fm_employee.emp_id','fm_employee.emp_email','fm_employee.emp_mobile')	
				->where('fm_cust_complaints.status', '=', Input::get('custom_inpro'))	
				//-> and fm_cust_complaints.flag1=0
				->get();			
	
		return view('allrecords',compact('customerList','emp_list'));
});

Route::get('/api/cus_cancel',function(){	
	$emp_list = App\Employee::all('emp_id','emp_name');
	$customerList = DB::table('fm_cust_complaints')
				->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_cust_complaints.state_id', '=', 'fm_states.state_id')
				->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				
				->select('fm_cust_complaints.*','fm_services.service_name','fm_states.state_name','fm_employee.emp_name','fm_employee.emp_about','fm_employee.emp_email','fm_employee.emp_mobile')	
				->where('fm_cust_complaints.status', '=', Input::get('custom_cancle'))	
				->get();			
	
		return view('allrecords',compact('customerList','emp_list'));
});


Route::post('customer_update',function(){
	echo 'Ok';
});

Route::get('/reports',function(){
	if(Auth::guest()){
		return Redirect::to('auth/login');
	}else{
	$empname = App\Employee::all('emp_id','emp_name');	
	
	$service = DB::table('fm_services')
				->select('service_id', 'service_name')
				->where('status', 'active')
				->get();
				
	$emp_list = DB::table('fm_employee')
				//->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_employee.emp_state', '=', 'fm_states.state_id')
				//->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_employee.*', 'fm_states.state_name')	
				->get();	
	$empoutOf = DB::table('fm_employee')
				//->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_employee.emp_state', '=', 'fm_states.state_id')
				//->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_employee.*', 'fm_states.state_name')	
				->get();	
	$agentstat = DB::table('fm_employee')
				//->leftJoin('fm_services', 'fm_cust_complaints.service_id', '=', 'fm_services.service_id')
				->leftJoin('fm_states', 'fm_employee.emp_state', '=', 'fm_states.state_id')
				//->leftJoin('fm_employee', 'fm_cust_complaints.employee_id', '=', 'fm_employee.emp_id')	
				//->orderBy('fm_cust_complaints.complaint_date', 'desc')	
				->select('fm_employee.*', 'fm_states.state_name')	
				->get();							
	return View::make('reports/reports',compact('emp_list','empoutOf','agentstat','empname','service'));
	}
});


