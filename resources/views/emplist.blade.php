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
	<script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js" type="text/javascript"></script>

</head>

<body>

    <div id="wrapper">        
		<nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">
        <div id="page-wrapper" class="without-sidebar">
            
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
													<td><input type="checkbox" 
													id="selectedID{!! $emp->emp_id !!}" 
													value="{!! $emp->emp_id !!}#{!! $emp->emp_name !!}" 
													class="checkBx"></td>
													<td>{{ $emp->emp_id}}</td>
													<td>{{ $emp->emp_name}}</td>
													<td>{{ $emp->emp_city}}</td>
													<td>{{ $emp->count}}</td>	
													<td><font color='blue'><span id="viewAp" 
													onclick="viewAppoints({!! $emp->emp_id !!})"><a>View</a></span></font></td>
												</tr>
											@endforeach										
										</tbody>
									</table>
								
								<div>
								<input type="hidden" name="selectedEmp" value="" id="selectedEmp"/>
								<input type="button" value="Select" class="selectBtn btn btn-primary"/>
									
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<script>
	
		$('#appointmentsDiv').hide();
		
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
			
					
			$('.selectBtn').click(function(){
				
				var selectedEmp = $('#selectedEmp').val();
				if(selectedEmp==null || selectedEmp==""){
					alert('Please select atleast One Employee');
				}else{
					var vals = selectedEmp.split("#");
					//alert(selectedEmp+"--"+vals[0]+"--"+vals[1]);
					$('#employee_id',window.opener.document).val(vals[0]);	
					$('#employee_name',window.opener.document).val(vals[1]);					
					window.close();
				}
					
			});
			
			$('.checkBx').change(function(){
				//alert('hi');				
				if(this.checked){
					var abc = $(this).closest(".checkBx").attr("id");
					$('.checkBx').prop({checked:false});
					document.getElementById(abc).checked = true;
					$('#selectedEmp').val(this.value);
				}else{
					$('#selectedEmp').val("");
				}				
			});
			
					
			$("#searchCompDate").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat:'yy-mm-dd',
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
