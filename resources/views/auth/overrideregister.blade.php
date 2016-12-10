<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>

    <?php include("pages/styles.php"); 		  
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
		#page-wrapper {
			margin-left:0px;
		}
	</style>
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <!-- Navigation -->
        <div class="row">

        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">		
			<?php include("pages/header.php"); ?>			
        </nav>
       
        </div>
		<div class="row">
            <div class="col-lg-12">
            @if (session('select_emp'))
                <div class="alert alert-danger">
                <a class="close" title="" aria-label="close" data-dismiss="alert" href="#" data-original-title="close">×</a>
                    {{ session('select_emp') }}
                </div>
            @endif
            </div>
        </div>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				  <form id="overrideregister" method="post" action="override">
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
									<div class="row mar-bot-10px">
										<input type="hidden" name="complaint_id" value="{!! $customer->complaint_id!!}"/>
										<div class="col-lg-12 ">
											<div class="col-lg-3">
												<label class="f-w-5">First Name</label>
												<input type="text" name="customer_first_name"  
												value="{!! $customer->customer_first_name!!}" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Last Name</label>
												<input type="text" name="customer_last_name" 
												value="{!! $customer->customer_last_name!!}"  class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Address(Line 1)</label>
												<input type="text" name="Address" value="{!! $customer->address!!}"class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Address(Line 2)</label>
												<input type="text" name="address2" value="{!! $customer->address2!!}" class="form-control">
											</div>
										</div>	
									</div>
									<div class="row mar-bot-10px">
										<div class="col-lg-12">
                                        	<div class="col-lg-3">	
												<label class="f-w-5">Street Name</label>
												<input type="text" name="street" value="{!! $customer->street!!}" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Locality</label>
												<input type="text" name="locality" value="{!! $customer->street!!}"  class="form-control">
												
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
										</div>	
									</div>
									<div class="row mar-bot-10px">
										<div class="col-lg-12">
                                       		<div class="col-lg-3">	
												<label class="f-w-5">City</label>
												<select id="city_id" name="city" class="form-control input pass">
													<option value="">Select city</option>
													@foreach ($city_list as $city)
													<option value="{!! $city->city_id!!}">{{ $city->city_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Zip Code</label>
												<input type="text" name="Zipcode" value="{!! $customer->zipcode!!}" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Mobile Number</label>
												<input type="text"  name="customer_mobile" value="{!! $customer->customer_mobile!!}"  class="form-control">
											</div>
											
											<div class="col-lg-3">	
												<label class="f-w-5">Service Category</label>												
												<select id="service_id" name="service_id" class="form-control input pass">
													<option value="">Select service</option>
													@foreach ($service_list as $service)
													<option value="{!! $service->service_id!!}">{{ $service->service_name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row mar-bot-10px">
										<div class="col-lg-12">
                                        	<div class="col-lg-3">
                                                <label>Facility</label>
                                                <select class="selectpicker" name="facility" id="facility" data-width="100%" data-size="5" multiple >
                                                  <option value="">Select Facility</option>
                                                  <option value="School">School</option>
                                                  <option value="Office Space">Office Space</option>
                                                  <option value="Residence">Residence</option>
                                                  <option value="Shops">Shops</option>
                                                  <option value="Multi-storey">Multi-storey</option>
                                                  <option value="Showrooms">Showrooms</option>
                                                  
                                                </select>
                                            </div>
                                        	<div class="col-lg-3">	
												<label class="f-w-5">Service Description</label>
												<input type="text" name="complaint_desc" value="{!! $customer->complaint_desc!!}" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Email Address</label>
												<input type="text" name="customer_email" value="{!! $customer->customer_email!!}" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Mode of Commnication</label>
												<select class="form-control input pass" id="mode_of_communication" name="mode_of_communication" title="Select Mode of Commnication" data-width="100%">
												  <option data-tokens="">Select</option>
                                                  <option data-tokens="ketchup mustard">Mobile</option>
												  <option data-tokens="mustard">Mail</option>
												  
												</select>
											</div>
											<div class="col-lg-3 form-group">
												<label class="f-w-5">Date & Time</label>
                                                <div class='input-group date' id='startdate'>
                                                    <input type='text' name="complaint_dates" id="complaint_dates"  class="form-control" placeholder="{!! $customer->complaint_date!!}" />
                                                    <input type='hidden' name="appointment_date" id="appointment_date" class="form-control" value="" />
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
											<div class="col-lg-3">
												<label class="f-w-5">Employee Name</label>
												<input type="hidden" name="employee_id" value="{!! $customer->employee_id!!}"   
												id="employee_id"/>	
												<table>
													<tr>
														<td	width="80%">
															<input type="text" name="employee_name" readonly="true"
																id="employee_name" class="form-control"
																value="{!! $customer->employee_name !!}"/>
														</td>
                                                        <td>
														<div title="Create Work Order" id="emp_select" data-whatever="@mdo" data-target="#employee_details" data-toggle="modal" class="ti-clipboard pull-right font-s-20px mar-top-20px cursor-pointer init-tooltip selectEmpBtn btn btn-primary" style="margin-left: 8px; margin-top:0px;"> Select</div>
														</td>
													</tr>
												</table>
											</div>
											
										</div>
									</div>	
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<input type="submit" value="Save Changes" class="registerBtn btn btn-success"/>
					 
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
<div id="employee_details" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">All Active Employee</h4>
		  </div>
		  <div class="modal-body">
			
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <i class="fa fa fa-list-alt fa-fw"></i> All Active Employee
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover complaintsTable" 
										id="complaintsTable">
										<thead>
											<tr>
												<th>Select</th>
												<th>EmpId</th>
												<th>EmpName</th>							
												<th>EmpCity</th>
												<th>AssignedCount</th>	
												<th>ViewAppointments</th>
											</tr>
										</thead>
										<tbody id="complaintsTableBody">
											@foreach ($empList as $emp)
												<tr class="odd gradeX">
													<td>                                                    
                                       <input type="checkbox" onclick="assign_empid('{!! $emp->emp_id !!}')" id="selectedID{!! $emp->emp_id !!}" value="{!! $emp->emp_id !!}" class="checkBx">
                                       <input type="hidden" id="selectedname{!! $emp->emp_id !!}" value="{!! $emp->emp_name !!}" >
                                                    </td>
													<td>{{ $emp->emp_id}}</td>
													<td>{{ $emp->emp_name}}</td>
													<td>{{ $emp->emp_city}}</td>
													<td>{{ $emp->count}}</td>	
													<td><font color='blue'><span id="viewAp" 
													onclick="viewAppoints({!! $emp->emp_id !!})"><a>View</a></span></font>
                                                    <script>
													function assign_empid(){
														
													}
													$(document).ready(function($){		
														$('#selectedID{!! $emp->emp_id !!}').on('click', function(){
														if(this.checked){					
														if (confirm('Conform to this assgin vendors!')) {	
															var select_vendor = $('#selectedID{!! $emp->emp_id !!}').val();
															var select_vendorname = $('#selectedname{!! $emp->emp_id !!}').val();
															$('#employee_id').val(select_vendor);
															$('#employee_name').val(select_vendorname);					
															alert("Vendor has been assgin to this customer !");
															
														}
														} else {
															alert('Uncheck the employee. Plaese select any vendors')	
														}
														});	
														
													});
													</script>
                                                    </td>
												</tr>
											@endforeach										
										</tbody>
									</table>
								
								<div>
								<!--<input type="hidden" name="selectedEmp" value="" id="selectedEmp"/>
								<input type="button" value="Select" class="selectBtn btn btn-primary"/>
								-->	
								</div>
                            </div>
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
					<div class="panel panel-default" id="appointmentsDiv">
                        <div class="panel-heading">
                           <i class="fa fa fa-list-alt fa-fw"></i> Assigned Complaints List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">                           
							
                            <div class="dataTable_wrapper" id="appointmentsDiv">
								<table class="table table-striped table-bordered table-hover complaintsTable" 
									id="complaintsTable">
									<thead>
										<tr>
											<th>Job Id</th>
											<th>Name</th>
											<th>Assigned Time</th>
											<th>Assigned To</th>
											<th>Status</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody id="appointmentsTableBody">							
									</tbody>
								</table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
					
					
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
							
		  </div>
		  
		</div>

	  </div>
	</div>

    <script>
	$(function () {
                $('#datetimepicker4').datetimepicker();
    });
	$(document).ready(function($){
	        $('#country_id').val('<?php echo $customer->country_id; ?>');			
			$('#state_id').val('<?php echo $customer->state_id; ?>');
			//$('#region_id').val('<?php echo $customer->regional_id; ?>');
			$('#city_id').val('<?php echo $customer->city_id; ?>');
			$('#service_id').val('<?php echo $customer->service_id; ?>');
			$('#communication').val('<?php echo $customer->communication; ?>');
			$('#employee_id').val('<?php echo $customer->employee_id; ?>');
			$('#facility').val('<?php echo $customer->facility; ?>');
			$('#mode_of_communication').val('<?php echo $customer->mode_of_communication; ?>');
			var startdates = $('#complaint_dates').val('<?php echo $customer->complaint_date; ?>');
			$('#input-group-addon').on('click', function(){
				var datetime = $('#complaint_dates').val(startdates);
				$('#appointment_date').val(datetime);
			});
			$.get("{{ url('/api/today_count')}}",{ 'today': 1 },function(data) {          
					$('#today_task').append(data);
					$('#dashboardtoday_task').append(data);
					$('#topcounts').append(data);
					var pers = Math.round(data) + '%';
					$('#dashboardtoday_percentage').append(pers);
				});	
			$.get("{{ url('/api/weekend')}}",{ 'today': 1 },function(data) {          
					var pers = Math.round(data) + '%';
					$('#weeklycustm').append(pers);
					$('#weeklycustms').append(data);
				});	
			$.get("{{ url('/api/monthly')}}",{ 'today': 1 },function(data) {          
					var pers = Math.round(data) + '%';
					$('#monthly').append(pers);
					$('#monthlys').append(data);
				});	
		
			function viewAppoints(empid){
				
				$('#appointmentsTableBody').empty();
				$('#appointmentsDiv').show();
				//alert(empid);
				$.get("{{ url('/api/viewAppointments')}}",{ 'empid': empid },function(data) {
						//alert(data);
						
						reload_override_table(data);
				});		
						
			}
			function reload_override_table(data){				
					$.each(data, function(key, element) {					
						var str = '<tr class="odd gradeX">\
										<td>'+element["complaint_code"]+'</td>\
										<td>'+element["customer_name"]+'</td>\
										<td>'+element["complaint_date"]+'</td>\
										<td>'+element["employee_name"]+'</td>\
										<td>'+element["status"]+'</td>\
										<td class="center"><div class="desc">'+element["complaint_desc"]+'</div></td>\
									</tr>';
						
						$('#appointmentsTableBody').append(str);			
					
					});
										
					
			}
			$(document).ready(function($){
			/*$('.selectEmpBtn').click(function(){					
					//alert('hi');
					window.open( "empList", "myWindow", 
					"status = 1, height = 700, width = 900, resizable = 0" );
				});*/
				
			//Country Change
			$('#country_id').on('change', function(){
			country=$('#country_id').val();
				
			$.get("{{ url('/api/dropdown_country')}}",{ option: country },
			function(data) {				
				$('#state_id').empty();
				//$('#region_id').find('option').remove().end();
				$('#state_id').append('<option value="">Select State</option>');
				$.each(data, function(key, element) {		
				$('#state_id').append('<option value="' + key +'">' + element + '</option>');
				});
				});			
			});
			//state change
			$('#state_id').on('change', function(){				
			state=$('#state_id').val();				
			$.get("{{ url('/api/dropdown_city')}}",{ option: state },
			function(data) {				
				$('#city_id').empty();
				//$('#region_id').find('option').remove().end();
				//$('#region_id').append('<select name="region" class="form-control	" >');
				$('#city_id').append('<option value="">Select City</option>');
				$.each(data, function(key, element) {		
				$('#city_id').append('<option value="' + key +'">' + element + '</option>');
				});
				
				});
			});
			
				
		});
	});			
	</script>
    <?php include("pages\scripts.php"); ?>
    <script type="text/javascript" src="../js/dashboard.js"></script>	
</body>

</html>
