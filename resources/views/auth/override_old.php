<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>
	
    <?php include("pages\styles.php");
		  
	$state = null;
	$region = null;
	 if(@$_GET){
	//echo $_GET['region'];
	if(isset($_GET['state'])){
		$state = $_GET['state'];
	}
	if(isset($_GET['region'])){
		$region = $_GET['region'];
	 //echo $state,'.... above post';
	}
}
	?>
	
	


	
	<style>
		::selection {
  background-color: #b5e2e7;
}

::-moz-selection {
  background-color: #8ac7d8;
}

#page-wrapper {
 /* background: #3CC;*/
}

.container {
  display: -webkit-flex;
  display: flex;
  height: 100%;
}

.logbox {
  padding: 10px;
  margin: 50px auto;
  width: 420px;
  background-color: #fff;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
}


h1 {
  text-align: center;
  font-size: 175%;
  color: #757575;
  font-weight: 300;
}

h1, input {
  font-family: "Open Sans", Helvetica, sans-serif;
}

.input {
  width: 75%;
  height: 50px;
  display: block;
  margin: 0 auto 15px;
  padding: 0 15px;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
.input:focus {
  outline: none;
  border-bottom-color: #3CC !important;
}
.input:hover {
  border-bottom-color: #dcdcdc;
}
.input:invalid {
  box-shadow: none;
}

.pass:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 1000px white inset;
}
.signBtn, .registerBtn {
	margin: 30px 5px;
}

.signupbox .registerBtn {
	    margin: 30px auto;
    display: block;
}

.inputButton {
  position: relative;
  width: 40%;
  height: 35px;
  
  
  color: white;
  background-color: #3CC;
  border: none;
  -webkit-box-shadow: 0 5px 0 #2CADAD;
  -moz-box-shadow: 0 5px 0 #2CADAD;
  box-shadow: 0 5px 0 #2CADAD;
}
.inputButton:hover {
  top: 2px;
  -webkit-box-shadow: 0 3px 0 #2CADAD;
  -moz-box-shadow: 0 3px 0 #2CADAD;
  box-shadow: 0 3px 0 #2CADAD;
}
.inputButton:active {
  top: 5px;
  box-shadow: none;
}
.inputButton:focus {
  outline: none;
}
@media (min-width: 768px) {
	#page-wrapper {
		margin: 0 0 0 0px !important; 
	}
}
.colorgraph {
  height: 2px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

#signup .bootstrap-select, #datetimepicker1{
	margin:15px 15px 15px 50px;
}

#datetimepicker1 {
	width:300px;
}

#datetimepicker1 input {
	padding:20px 15px;
	color:#B9A5A5;
}

#signup .bootstrap-select .btn-default{
	color:#B9A5A5;
}
#signup .bootstrap-select .btn{
	padding:12px;
}


	</style>
	
	<script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js" type="text/javascript"></script>
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top nav-custom" role="navigation" style="margin-bottom: 0">
            <?php include("pages\header.php"); ?>
			
             <div class="navbar-header">
				<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				<a class="navbar-brand" href="#">
					
				</a>
			</div>
			
        </nav>
		
        <div id="page-wrapper">
            
			
			  
			<div class="col-md-12">
				<div class="logbox signupbox">
				  <form id="overrideregister" method="post" action="override">
				  {!! csrf_field() !!}
					<h1>Complaint Details</h1>
					<hr class="colorgraph">
					<input type="hidden" name="complaint_id" value="{!! $customer->complaint_id!!}"/>
					<input value="{!! $customer->customer_name!!}" name="customer_name" type="text" placeholder="First Name" autofocus="autofocus" required="required" class="input pass selectEmpBtn"/>
					
					<input name="customer_mobile" value="{!! $customer->customer_mobile!!}" type="text" placeholder="Phone Number"  required="required" class="input pass"/>
					<input name="customer_email" value="{!! $customer->customer_email!!}"  type="email" placeholder="Email address" class="input pass"/>
					
					
					<div class="form-group">
					  <select id="country_id" name="country" class="country_id form-control input pass">
						<option value="">Select Country</option>
						@foreach ($countryList as $country)
						<option value="{!! $country->country_id!!}">{{ $country->country_name}}</option>
						@endforeach
					</select>
					</div>
					<div class="form-group">
					  <select id="state_id" name="state" class="form-control input pass">
						<option value="">Select state</option>
						@foreach ($state_list as $state)
						<option value="{!! $state->state_id!!}">{{ $state->state_name}}</option>
						@endforeach
					</select>
					</div>
					<!--<div class="form-group" id="state">
							{!! Form::label('state_id','Select a state') !!}
							{!! Form::select('state_id', $state_list, null, ['class' => 'form-control']) !!}
					</div>-->
					<div class="form-group">
					  <select id="region_id" name="region" class="form-control input pass">
						<option value="">Select region</option>
						@foreach ($region_list as $region)
						<option value="{!! $region->region_id!!}">{{ $region->region_name}}</option>
						@endforeach
					</select>
					</div>
					<!--<div class="form-group" id="region_id">
							{!! Form::label('region_id','Select a region') !!}
							{!! Form::select('region_id', $region_list, null, ['class' => 'form-control']) !!}
					</div>-->
					<div class="form-group">
					  <select id="city_id" name="city" class="form-control input pass">
						<option value="">Select city</option>
						@foreach ($city_list as $city)
						<option value="{!! $city->city_id!!}">{{ $city->city_name}}</option>
						@endforeach
					</select>
					</div>
					<input name="Address"  value="{!! $customer->address!!}" type="text" placeholder="Address"  required="required" class="input pass"/>
					<!--<div class="form-group" id="city_id">
							{!! Form::label('city_id','Select a city') !!}
							{!! Form::select('city_id', $city_list, null, ['class' => 'form-control']) !!}
					</div>-->
					<div class="form-group">
					  <select id="service_id" name="service" class="form-control input pass">
						<option value="">Select service</option>
						@foreach ($service_list as $service)
						<option value="{!! $service->service_id!!}">{{ $service->service_name}}</option>
						@endforeach
					</select>
					</div>
					<input name="complaint_desc" value="{!! $customer->complaint_desc!!}"  type="text" placeholder="Complaint Description"  required="required" class="input pass"/>
					<input name="Zipcode"  value="{!! $customer->zipcode!!}" type="text" placeholder="Zip Code"  required="required" class="input pass"/>
					<div>
					<select class="form-control input pass" id="communication" data-width="300px" name="communication">
					  <option data-tokens="">Select Mode of Commnication</option>
					  <option data-tokens="mobile">Mobile</option>
					  <option data-tokens="mail">Mail</option>					  
					</select>
					</div>
					<div class="form-group">
									
                        {!! Form::text('complaint_date', '', ["placeholder" => "Date",'id' => 'complaint_date','value'=> '$customer->complaint_date','class'=>'input pass']) !!}     
					</div>
					<div class="form-group">
						<!--select id="employee_id" name="employee_id" class="form-control input pass">
							<option value="">Select Employee</option>
							@foreach ($emp_list as $emp)
							<option value="{!! $emp->emp_id!!}">{{ $emp->emp_name}}</option>
							@endforeach
						</select-->

						<input type="hidden" name="employee_id" id="employee_id"/>
						<input type="text" name="employee_name" id="employee_name" class="input pass" 
								value="{!! $customer->employee_name !!}"/>
					</div>
					
					<div class='form-group'>
					<!--<textarea name="user[password2]" placeholder="Service Details" required="required" class="input pass"/>-->
					
					<input type="submit" value="Save Changes" class="inputButton registerBtn"/>
					 
				  </form>
				</div>
			   
				
			</div>
			
			
			
			
        </div>
        <!-- /#page-wrapper -->
 
    </div>
    <!-- /#wrapper -->
    <script>
			
			//alert('<?php echo $customer->country_id; ?>');
			//alert('<?php echo $customer->country_id; ?>');		
			
			
			$('#country_id').val('<?php echo $customer->country_id; ?>');			
			$('#state_id').val('<?php echo $customer->state_id; ?>');
			$('#region_id').val('<?php echo $customer->regional_id; ?>');
			$('#city_id').val('<?php echo $customer->city_id; ?>');
			$('#service_id').val('<?php echo $customer->service_id; ?>');
			$('#communication').val('<?php echo $customer->communication; ?>');
			$('#employee_id').val('<?php echo $customer->employee_id; ?>');
			
			$(document).ready(function($){
				//alert('hi');
				$( "#complaint_date" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:'yy-mm-dd',
				});
				
				$('.selectEmpBtn').click(function(){					
					//alert('hi');
					window.open( "empList", "myWindow", 
					"status = 1, height = 700, width = 900, resizable = 0" );
				});
				
			
				function myPopup2() {
					window.open( "http://www.google.com/", "myWindow", 
					"status = 1, height = 300, width = 300, resizable = 0" )
				}
				
					
				
				
				//state change
				$("#state_id").change(function(){
					
					state=$('#state_id').val();
					region_id=$('#region_id').val();			
										
					$.get("{{ url('/api/dropdown_state')}}",{ option: state },
					function(data) {
						
						$('#region_id').empty();
						//$('#region_id').find('option').remove().end();
						//$('#region_id').append('<select name="region" class="form-control	" >');
						$.each(data, function(key, element) {		
						$('#region_id').append('<option value="' + key +'">' + element + '</option>');
						});
					});
				});
					//region change
				$("#region_id").change(function(){
					$.get("{{ url('/api/dropdown_region')}}",{ option: $(this).val() },
					function(data) {
						
						$('#city_id').empty();
						$.each(data, function(key, element) {
							
						//$('#region_id').append("" + element + "");
						$('#city_id').append('<option value="' + key +'">' + element + '</option>');
						});
					});
				});
			});
				
	</script>
    
    <?php include("pages\scripts.php"); ?>

	
	
	
</body>

</html>
