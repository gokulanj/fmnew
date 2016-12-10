<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>

	<?php include("pages\styles.php"); ?>
	
	<script src="js\jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js\jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js\jquery-ui-custom.min.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">
		
			<?php include("pages\header.php"); ?>
			
        </nav>
		
        <div id="page-wrapper" class="without-sidebar">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Regional Manager</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				{!! csrf_field() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <i class="fa fa fa-list-alt fa-fw"></i> All Active Jobs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">							
								<div>
									<table class="table">
										<tr>
											<td><b>Complaint Code</b></td>
											<td><input type="text" name="searchCompCode" id="searchCompCode" class="form-control"/></td>
											<td width="20%"></td>
											<td><label>Complaint Date</label></td>											
											<td>
											<div class='input-group date' id='searchCompDate'>
												<input type='text' name="searchCompDate" class="form-control" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
											</td>
										</tr>
										<tr>
											<td></td>	
											<td></td>
											<td></td>
											<td>
												<img src="images\resetbutton.jpg" alt="Reset" class="resetBtn" 
												id="resetBtn" height="30" width="60">
											
												<img src="images\Searchbutton.jpg" alt="Search" class="searchBtn" 
												id="searchBtn" height="30" width="120">
											<td>
										</tr>
									</table>
								</div>
							
								<div id="complaintsData">
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
										<tbody id="complaintsTableBody">
											@foreach ($customerList as $customer)
												<tr class="odd gradeX">
													<td><a href="/api/overrideregister?customer_id={!!$customer->complaint_id!!}" class="editBtn">{{ $customer->complaint_code}}</a></td>
													<td>{{ $customer->customer_name}}</td>
													<td>{{ $customer->complaint_date}}</td>
													<td>{{ $customer->employee_name}}</td>
													<td>{{ $customer->status}}</td>
													<td class="center"><div class="desc">{{ $customer->complaint_desc}}</div></td>
												</tr>
											@endforeach										
										</tbody>
									</table>
								</div>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<script>
		$(document).ready(function($){		
					
			$("#searchCompDate").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:'yy-mm-dd',
					});
					
			function reload_override_table(data){				
				
				$.each(data, function(key, element) {					
				
					var str = '<tr class="odd gradeX">\
									<td><a href="/api/overrideregister?customer_id='+element["complaint_id"]+'"\ class="editBtn">'+element["complaint_code"]+'</a></td>\
									<td>'+element["customer_name"]+'</td>\
									<td>'+element["complaint_date"]+'</td>\
									<td>'+element["employee_name"]+'</td>\
									<td>'+element["status"]+'</td>\
									<td class="center"><div class="desc">'+element["complaint_desc"]+'</div></td>\
								</tr>';
					
					$('#complaintsTableBody').append(str);			
				
				});
									
				
			}
			
			$('.searchBtn').click(function(){	
				//alert('hi');		
				var searchCompCode = $("#searchCompCode").val();
				var searchCompDate = $("#searchCompDate").val();				
			
				$('#complaintsTableBody').empty();
			
				$.get("{{ url('/api/activedashboard')}}",{ 'searchCompCode': searchCompCode,'searchCompDate':searchCompDate },function(data) {
					//alert(data);
					reload_override_table(data);
				});						
				
			});	

			$('.resetBtn').click(function(){
				$("#searchCompCode").val('');
				$("#searchCompDate").val('');
				
				$('#complaintsTableBody').empty();
			
				$.get("{{ url('/api/activedashboard')}}",{ 'searchCompCode': '','searchCompDate':'' },function(data) {
					//alert(data);
					reload_override_table(data);
				});					
				
			});
			
			
		});
	</script>
	
	
    <?php include("pages\scripts.php"); ?>

</body>

</html>
