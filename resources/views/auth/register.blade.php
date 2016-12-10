<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>
	<script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js" type="text/javascript"></script>
	
<script src="https://raw.githubusercontent.com/moment/moment/develop/min/moment-with-locales.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js "type="text/javascript"></script>
<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />

        <?php include("pages\styles.php");
		  
	$state = null;
	$region = null;
	 if(@$_GET){
	echo $_GET['region'];
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
		#page-wrapper {
			margin-left:0px;
		}
	</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">
		
			
			
			
			
        </nav>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				  <form id="signup" method="post" action="signup_message">
				  {!! csrf_field() !!}
                    <h1 class="page-header">Customer Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Customer Details
						</div>
						<div class="panel-body">
							
							<form role="form">
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12 ">
											<div class="col-lg-3">
												<label class="f-w-5">First Name</label>
												<input type="text" name="customer_first_name" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Last Name</label>
												<input type="text" name="customer_last_name" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Address(Line 1)</label>
												<input type="text" name="Address" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Street Name</label>
												<input type="text" name="street" class="form-control">
											</div>
										</div>	
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">	
												<label class="f-w-5">Locality</label>
												<input type="text" name="locality" class="form-control">
												
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Country</label>
												
												<select id="country_id" name="country" class="form-control input pass">
													<option value="">Select Country</option>
													@foreach ($countryList as $country)
													<option value="{!! $country->country_id!!}">{{ $country->country_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">State</label>
												<select id="state_id" name="state" class="form-control input pass">
													<option value="">Select state</option>
													@foreach ($state_list as $state)
													<option value="{!! $state->state_id!!}">{{ $state->state_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Region</label>
												<select id="region_id" name="region" class="form-control input pass">
													<option value="">Select region</option>
													@foreach ($region_list as $region)
													<option value="{!! $region->region_id!!}">{{ $region->region_name}}</option>
													@endforeach
												</select>
											</div>																	
											<div class="col-lg-3">	
												<label class="f-w-5">City</label>
												<select id="city_id" name="city" class="form-control input pass">
													<option value="">Select city</option>
													@foreach ($city_list as $city)
													<option value="{!! $city->city_id!!}">{{ $city->city_name}}</option>
													@endforeach
												</select>
											</div>
										</div>	
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<label class="f-w-5">Zip Code</label>
												<input type="text" name="Zipcode" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Mobile Number</label>
												<input type="text"  name="customer_mobile"  class="form-control">
											</div>
											
											<div class="col-lg-3">	
												<label class="f-w-5">Service Type</label>												
												<select id="service" name="service" class="form-control input pass">
													<option value="">Select service</option>
													@foreach ($service_list as $service)
													<option value="{!! $service->service_id!!}">{{ $service->service_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Service Description</label>
												<input type="text" name="complaint_desc" class="form-control">
											</div>
										</div>
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<label class="f-w-5">Email Address</label>
												<input type="text" name="customer_email" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Mode of Commnication</label>
												<select class="form-control input pass" name="mode_of_communication" title="Select Mode of Commnication" data-width="100%">
												  <option data-tokens="ketchup mustard">Mobile</option>
												  <option data-tokens="mustard">Mail</option>
												  
												</select>
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Date & Time</label>
												<div class='input-group date' id='complaint_date'>
													<input type='text' name="complaint_date" class="form-control" />
													<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
													</span>
												</div>
											</div>
											
											<!--<div class="col-lg-3">
												<div class="text-center">
													already have an account? <a href="login.php" id="login_id">login</a>
												</div>
											</div>-->
										</div>
									</div>	
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<button type="submit" class="btn btn-primary">Register</button>
											</div>
										</div>
									</div>	
								</div>
							</form>
								
						</div>		
					</div>
				</div>		
				
			</div>
        
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script>
	        
			$(document).ready(function($){
				 $("#complaint_date").datetimepicker({
					 format: 'YYYY-MM-DD HH:MM',
				 });   
			
			
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
