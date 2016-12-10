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
                                       <input type="checkbox" onclick="assgin_emp_comid('{!! $emp->emp_id !!}','<?php echo $assgin_complatid; ?>','{{ $emp->emp_name}}');" id="selectedID{!! $emp->emp_id !!}" value="{!! $emp->emp_id !!}" class="checkBx">
                                       <input type="hidden" id="selectedname{!! $emp->emp_id !!}" value="{!! $emp->emp_name !!}" >
                                                    </td>
													<td>{{ $emp->emp_id}}</td>
													<td>{{ $emp->emp_name}}</td>
													<td>{{ $emp->emp_city}}</td>
													<td>{{ $emp->count}}</td>	
													<td><font color='blue'><span id="viewAp" 
													onclick="viewAppoints({!! $emp->emp_id !!})"><a>View</a></span></font>
                                                    <script>
													function assgin_emp_comid(emp_id, emp_name, compl_id){														
														//alert(emp_id);alert(compl_id);alert(emp_name);														
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