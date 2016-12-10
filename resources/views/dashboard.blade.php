<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>

    <?php include("pages/styles.php"); ?>	
    	
	
	
	<?php include("pages\scripts.php"); ?>	
	<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
    <script src="../bower_components/Chart.js-master/dist/Chart.bundle.js"></script>	
	<!--<script src="http://maps.googleapis.com/maps/api/js"></script>-->	
	<script type="text/javascript" src="../js/dashboard.js"></script>
	<script type="text/javascript" src="../js/test.js"></script>
	
</head>
<body>
        <!-- Navigation -->
        <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">		
			<?php include("pages/header.php"); ?>			
        </nav>       
		<?php include("pages/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="row">
            
            <div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
            @if (session('customer_upstatus'))
                <div class="alert alert-success">
                <a class="close" title="" aria-label="close" data-dismiss="alert" href="#" data-original-title="close">×</a>
                    {{ session('customer_upstatus') }}
                </div>
            @endif
            @if (session('customer_update'))
                <div class="alert alert-success">
                <a class="close" title="" aria-label="close" data-dismiss="alert" href="#" data-original-title="close">×</a>
                    {{ session('customer_update') }}
                </div>
            @endif
            @if (session('customer_notassgin'))
                <div class="alert alert-danger">
                <a class="close" title="" aria-label="close" data-dismiss="alert" href="#" data-original-title="close">×</a>
                    {{ session('customer_notassgin') }}
                </div>
            @endif
            @if ($errors->has())
                <div class="alert alert-danger">
                <a class="close" title="" aria-label="close" data-dismiss="alert" href="#" data-original-title="close">×</a>
                @foreach ($errors->all() as $error)
                {{ $error }}<br>        
                @endforeach
                </div>
            @endif      
              </div>
                    
                            
            </div>			
			
			
			
			<div class="row dash-prog-row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25">
										<span id="dashboardtoday_percentage"></span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="dashboardtoday_task"></div>
                                    <div>Today Task!</div>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer" id="today_views">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 green">
										<span id="weeklycustm"></span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="weeklycustms"></div>
                                    <div>Weekly Tasks!</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer" id="weekend_view">
                                <span class="pull-left" >View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 orange">
										<span id="monthly"></span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="monthlys"></div>
                                    <div>Monthly Tasks!</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer" id="monthly_view">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        <style>
						#today_view {
						color: #337ab7;
						cursor: pointer;
						text-decoration: none;
						}
						#today_views {
						color: #337ab7;
						cursor: pointer;
						text-decoration: none;
						}
						#weekend_view {
						color: #337ab7;
						cursor: pointer;
						text-decoration: none;
						}
						#monthly_view {
						color: #337ab7;
						cursor: pointer;
						text-decoration: none;
						}
						</style>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 dark">
										<span id="pending"></span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id = "pendings"></div>
                                    <div>Pending!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" id="pending_view">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>                
            </div>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Main Heading
							
							<ul class="list-inline panel-actions ">
								<li open="search-dash" close="create-dash">
									<!--<a href="javascript:void(0);" class="createJob jobManipulation" open="search-dash" close="create-dash">
										<span class="label label-info" open="search-dash" close="create-dash">
											Create Order <i class="ti ti-plus fa-fw"></i>
										</span>
									</a>-->
									<!--mounica------------code-->
									
									<!--<button name="del_btn" class="multi_sel_del" >Delete</button>-->
									
								
									<a href="javascript:void(0);"  class="multi_sel_del">
										<span class="label label-info ">Delete 
										<i class="ti-trash mar-top-20px init-tooltip"></i>
									</a>
                                   
									
									
									<a href="javascript:void(0);" data-toggle="modal"  data-target="#myModal" data-whatever="@mdo" 
									data-toggle="tooltip" title="Create Work Order" >
										<span class="label label-info ">Add New 
										<i class="ti-clipboard mar-top-20px init-tooltip"></i>
									</a>	
								 
									
									<a href="javascript:void(0);" class="searchJob jobManipulation" open="create-dash" close="search-dash">
										<span class="label label-info ">Search <i class="ti ti-search fa-fw"></i></span>
									</a>
									<a href="#" class="panelMaxMin">
										<i class="ti ti-fullscreen fa-fw"></i>
									</a>
									<a href="#" class="">
										<i class="ti ti-angle-down fa-fw" data-toggle="collapse" data-target="#demo"></i>
									</a>
								</li>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="row">
                        <div class="panel-body" id="demo">                            
							<div class="row pad-15px  search-dash">
								<div class="col-lg-12">
									<form role="form">
										<div class="col-lg-4 form-group">
											<label>Track Work Order</label>
											<select class="selectpicker" name="track_order" id="track_order" data-width="100%">
											  <option value="">Select</option>
											    @foreach ($track_order as $track_orders)
                                                <option value="{!! $track_orders->complaint_code!!}">{{ $track_orders->complaint_code}}</option>
                                                @endforeach
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Service Category</label>
											<select class="selectpicker" id="service" name="service" data-width="100%">
                                                <option value="">Service Category</option>
                                                @foreach ($service_list as $service)
                                                <option value="{!! $service->service_id!!}">{{ $service->service_name}}</option>
                                                @endforeach
                                            </select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Work Order Status</label>
											<select class="selectpicker" name="order_status" id="order_status" data-width="100%">
											  <option value="">Select</option>
											  <option value="assigned">Auto Assigned</option>
											  <option value="unassigned">Un Assigned</option>
											  <option value="inprogress">In Progress</option>
											  <option value="completed">Completed</option>
                                              <option value="pending">Pending</option>
											  <option value="follow-up">Follow-up</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>State</label>
											<select name="select_state" id="select_state" class="selectpicker" data-width="100%">
												 <option value="">Select state</option>
                                                @foreach ($state_list as $state)
                                                <option value="{!! $state->state_id!!}">{{ $state->state_name}}</option>
                                                @endforeach
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Assigned To</label>
											<select class="selectpicker" name="select_assign" id="select_assign" data-width="100%">
											    <option value="">Select Assigned</option>   
                                                @foreach ($emp_list as $emp_lists)
                                                 <option value="{{ $emp_lists->emp_id }}">{{ $emp_lists->emp_name }}</option>
                                                @endforeach                                             
											</select>
										</div>
										<div class="col-lg-4 form-group">	
                                            <input type="hidden" name="search" value="1" />										
											<button type="button" class="btn btn-primary btn-sm mar-top-25px searchBtn">Search</button>
                                            
										</div>
									</form>
								    <!--<img src="images\resetbutton.jpg" alt="Reset" class="resetBtn" id="resetBtn" height="30" width="60">-->
									
								</div>
							</div>
                            	
							<div class="board">
								
								<div class="board-inner">
									<ul class="nav nav-tabs" id="myTab">
										<div class="liner"></div>
										<li class="active">
											<a href="#home" id="home_all" data-toggle="tab" title="All Records">
												<span class="round-tabs five">
													 <i class="ti ti-menu-alt"></i>
												</span> 
											</a>
										</li>

										<li>
											<a href="#un-assigned" id="unass_select" data-toggle="tab" title="Un Assigned">
												<span class="round-tabs five">
													<i class="glyphicon glyphicon-user">
														<i class="fa fa-question fa-quetion-cust" aria-hidden="true"></i>
													</i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#auto-assigned" id="autos-assignsed" data-toggle="tab" title="Auto Assigned">
												<span class="round-tabs assigned five">
													 <i class="glyphicon glyphicon-user"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#manual-assigned" data-toggle="tab" title="Manual Assigned">
												<span class="round-tabs five">
													 <i class="ti ti-target"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#in-progress" data-toggle="tab" id="in-progressactive" title="In-Progress">
												<span class="round-tabs five progress-spin-sp">
													<i class="fa fa-cog fa-spin cust-spin progress-spin"></i>	
												</span> 
											</a>
										</li>
										<li>
											<a href="#cancelled" data-toggle="tab" id="custom_cancelled" title="Cancelled">
												<span class="round-tabs five">
													<i class="fa fa-times"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#pending" data-toggle="tab" title="Pending">
												<span class="round-tabs five">
												  <i class="glyphicon ti-more"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#parked" data-toggle="tab" title="Parked">
												<span class="round-tabs five">
												  <i class="ti ti-control-pause" aria-hidden="true"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#follow-up" data-toggle="tab" title="Follow-up">
												<span class="round-tabs five">
												  <i class="glyphicon ti ti-back-left"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#completed" data-toggle="tab" title="Completed">
												<span class="round-tabs five">
												  <i class="glyphicon glyphicon-ok"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#closed" data-toggle="tab" title="Closed">
												<span class="round-tabs five">
												  <i class="fa fa-tasks"></i>
												</span> 
											</a>
										</li>	
									</ul>
								</div>

								<div class="tab-content" id="complaintsData">
									<div class="tab-pane fade in active" id="home">
										<table id="complaintsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											<!-- mounica-->
										<!--	<th><a href=my.js>Tick</a></th>
												<th>
													<i class="ti fa fa-square-o check-box-machine" ></i>
												</th> -->
												<th><input name="select_all" value="1" type="checkbox"></th>
                                                <th>Status</th>
                                                <th>Client Name</th>
                                                <th>Description</th>
                                                <th>Service Request</th>
                                                <th>State</th>
                                                <th>Job ID</th>
                                                <th>Vendors</th>                                                
                                                <th>Job Status</th>														
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="complaintsTableBody" class="filter_assign">
                                            @foreach ($customerList as $customer)
                                                <tr class="odd gradeX" data_status = "{{$customer->status}}">
												<!-- mounica-->
												<!--<td>
												<form action="#" method="post">
												<i class="ti fa fa-square-o indiv-list-chk-bok"></i>
												</td>
													</form>
													-->
													<td>
														<input name="select_all" value="2" type="checkbox" class="sub_chk"  data-id="{{$customer->complaint_id}}"></input>
													<!--	<input type="hidden" name="delete_customer" id="delete_customer{!!$customer->complaint_id!!}" value="{!!$customer->complaint_id!!}" />-->
													</td>
												
                                                <td>
                                                @if ($customer->status == 'unassigned')
                                                <span class="label label-default" style="text-transform: capitalize;">{{$customer->status}}</span>
                                                @elseif ($customer->status == 'inprogress')
                                                <span class="label label-primary" style="text-transform: capitalize; background-color: orange;">
                                                In Progress </span>
                                                @elseif ($customer->status == 'cancelled')
                                                <span class="label label-danger" style="text-transform: capitalize;">
                                                Cancelled </span>
												//@elseif ($customer->status == 'pending')
                                                <span class="label label-danger" style="text-transform: capitalize;">
                                                pending </span>
                                                @else
                                                <span class="label label-info" style="text-transform: capitalize;">{{$customer->status}}</span>
                                                @endif
                                                </td>
                                                <td>{{ $customer->customer_name}}</td>
                                                <td>{{ $customer->complaint_desc}}</td>
                                                <td>{{ $customer->service_name}}</td>
                                                <td>{{ $customer->state_name}}</td>
                                                <td class="jobId">{{ $customer->complaint_code}}</td>
                                                <td>
                                                    @if ($customer->status == 'unassigned')
												<select class="selectpicker" id="select_vender" name="select_vender" multiple data-size="5" data-live-search="true">
                                                      <option value="">Select Vendors</option>
                                                      <optgroup label="Vendor 1">
                                                       @foreach ($emp_list as $emp_lists)
                                                       <option value="{{ $emp_lists->emp_id }}">{{ $emp_lists->emp_name }}</option>
                                                       @endforeach
                                                      </optgroup>                                                      
                                                    </select>                                                                                    
                                                    @else
                                                    <a class="user-{{ $customer->emp_id}} ven-profile active" href="javascript:void(0);" data-placement="left"  data-toggle="popover" data-container="body" data-original-title="" title="">													
                                                   <img src="../dist/images/user/04.jpg" class="img-circle " alt="User"> 
                                                   {{ $customer->employee_name }}
                                                    </a>                                                   
                                                <i class="ti-settings init-tooltip pull-right" onclick="emp_load('{!!$customer->complaint_id!!}');" data-target="#employee_assign" data-toggle="modal" title="Add or Reassign" style="cursor:pointer;"></i>
                                                 
                                                  @endif
                                                </td>
                                                <td>
                                                    <ul class="task-list" style="list-style: none outside none;">
                                                        <li>                                                       
                                                          <p class="pos-relative table-progress-bar"><span class="label label-info">20%</span></p>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" 
                                                                aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                                                    <span class="sr-only">20% Complete</span>
                                                                </div>
                                                            </div>
                                                            
                                                        </li>
                                                        
                                                    </ul>
                                                </td>	
                                                <td style="text-align: center;">
                                                    <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                    
                                                        
                                                        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="dropdown-menu slidedown action-dash" style="left: 0;">
            <li style="margin-bottom: 5px;">
                <button type="button" data-toggle="modal" id="passtomap{!!$customer->complaint_id!!}"  data-target="#exampleModal{!!$customer->complaint_id!!}" data-whatever="@" class="btn btn-outline btn-primary">
                    <i class="ti-eye"></i>
                </button>
                <!--<script>
				$(function() {
					$('#exampleModal{!!$customer->complaint_id!!}').on('show.bs.modal', function (event) {
						//alert('{{$customer->complaint_id}}');
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						setTimeout(function(){ $(".loaderParent").addClass("hide");$(".dash-ind-job-stat").removeClass("hide"); }, 3000);
						var modal = $(this)
						modal.find('.modal-title').text('Work progress for ' + '{{ $customer->customer_name}}')
						//modal.find('.modal-body input').val(recipient)
					});
					
					$('#passtomap{!!$customer->complaint_id!!}').on('click', function(){
						var customid = '{{ $customer->complaint_id}}';	
						$('#directions_mapping{{ $customer->complaint_id}}').empty();
						$('#itineraryDiv{{ $customer->complaint_id}}').empty();				
						$.get("{{ url('/api/map_directions')}}",{ custm_id: customid },
						function(data) {				
							$('#directions_mapping{{ $customer->complaint_id}}').append(data);
							$('#itineraryDiv{{ $customer->complaint_id}}').hide();
							});
					});
				} );	
				</script>-->
            </li>
            <li style="margin-bottom: 5px;">
            <a href="/api/overrideregister?customer_id={!!$customer->complaint_id!!}" class="btn btn-outline btn-success" style="padding:6px;">
              <i class="ti-pencil"></i></a>
            </li>
            <li>
            <input type="hidden" name="delete_customer" id="delete_customer{!!$customer->complaint_id!!}" value="{!!$customer->complaint_id!!}" />
            <button type="button" onclick="config_delete({!!$customer->complaint_id!!});" class="btn btn-outline btn-danger"><i class="ti-trash"></i></button>
            <script>
			function config_delete(delet_id){
				//alert(delet_id);
				if (confirm('Are you sure you want to delete?')) {			
						$.get("{{ url('/api/delete_cusid')}}",{ cust_id: delet_id },
						function(data) {				
							if(data =='1'){
								alert('Your Track Work Order has been deleted!');
								location.reload();
							}
							});
					}
			}
			
			/*function config_multi_delete(delet_id){
				alert(delet_id);
				if (confirm('Are you sure you want to delete?')) {			
						$.get("{{ url('/api/mul_delete_cusid')}}",{ complaint_id: delet_id },
						function(data) {				
							if(data =='1'){
								alert('Your Track Work Order has been deleted!');
								location.reload();
							}
							});
					}
			}*/
			
			</script>
            </li>                                                             
            
            
            </ul>
                                                        </div>
                                                    </div>
                                                </td>                                            
                                                </tr>
                                                <div id="popover-content" class="hide">                                            
                                                <div class="user-{{ $customer->emp_id}}">
                                                    <div class="row">
                                                        <div class="col-md-12" style="padding-left:0px; padding-right:0px;">
                                                            <div>
                                                                <div class="col-md-12" style="padding-left:0px; padding-right:0px;">
                                                                    <div class="col-md-12" style="padding-left:0px; padding-right:0px;">
                                                                        <h2 class="well profile">{{ $customer->emp_name }}</h2>
                                                                        <p><strong>About: </strong> {{$customer->emp_about}}. </p>
                                                                        <p><strong>Email Id: </strong> {{$customer->emp_email}}. </p>
                                                                        <p><strong>Phone Number: </strong> {{$customer->emp_mobile}}. </p>
                                                                        <p><strong>Skills: </strong>
                                                                            
                                                                            <span class="tags">{{$customer->service_name}}</span>
                                                                            <span class="tags">Electrician</span>
                                                                            <span class="tags">Carpenter</span>
                                                                        </p>
                                                                    </div>             
                                                                    <div class="col-md-12" style="padding-left:0px; padding-right:0px;">
                                                                        <figure>
                                                                            <img src="../dist/images/user/04.jpg" alt="" class="img-circle img-responsive">
                                                                            <figcaption class="ratings">
                                                                                <p>Ratings
                                                                                <a href="#">
                                                                                    <span class="fa fa-star"></span>
                                                                                </a>
                                                                                <a href="#">
                                                                                    <span class="fa fa-star"></span>
                                                                                </a>
                                                                                <a href="#">
                                                                                    <span class="fa fa-star"></span>
                                                                                </a>
                                                                                <a href="#">
                                                                                    <span class="fa fa-star"></span>
                                                                                </a>
                                                                                <a href="#">
                                                                                     <span class="fa fa-star-o"></span>
                                                                                </a> 
                                                                                </p>
                                                                            </figcaption>
                                                                        </figure>
                                                                    </div>
                                                                    <div class="col-md-12 divider " style="padding-left:0px; padding-right:0px;">
                                                                        
                                                                        <div class="row rating-desc mar-top-25px">
                                                                            <div class="col-md-3 text-left">
                                                                                <span class="glyphicon glyphicon-star"></span>5
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <div class="progress progress-striped">
                                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                                        <span class="sr-only">80%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 5 -->
                                                                            <div class="col-md-3 text-left">
                                                                                <span class="glyphicon glyphicon-star"></span>4
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                                        <span class="sr-only">60%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 4 -->
                                                                            <div class="col-md-3 text-left">
                                                                                <span class="glyphicon glyphicon-star"></span>3
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                                                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                                        <span class="sr-only">40%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 3 -->
                                                                            <div class="col-md-3 text-left">
                                                                                <span class="glyphicon glyphicon-star"></span>2
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                                                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                                        <span class="sr-only">20%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 2 -->
                                                                            <div class="col-md-3 text-left">
                                                                                <span class="glyphicon glyphicon-star"></span>1
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                                                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                                                                        <span class="sr-only">15%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 1 -->
                                                                        </div>
                                                                        <!-- end row -->		
                                                                    </div>
                                                                </div>            
                                                            
                                                            </div>                 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Employee tracking details start -->
                                            <div class="modal fade" id="exampleModal{!!$customer->complaint_id!!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" style="text-transform: capitalize;" id="exampleModalLabel">New message</h4>
		  </div>
		  <div class="modal-body">
			
			<div class="loaderParent" style="position:relative;width:100%;height:100px;">
				<div class="loader">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			
			<div class="hide row dash-ind-job-stat">
                @if ($customer->status == 'unassigned')
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $customer->customer_name}}
                        </div>
                        <div class="panel-body panel-body-custom">  
                        Customer isn't assigned vendors                        
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Work Progress ({{ $customer->customer_name}})
                        </div>
                        <div class="panel-body panel-body-custom">
                            <ul class="task-list">
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;{{ $customer->emp_name }}
									</a>
									
									<em>- Vendor Id : {{ $customer->emp_id }}</em>
									<p>Work Type 1 <span class="label label-danger">23%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
											<span class="sr-only">23% Complete</span>
										</div>
									</div>
									
								</li>								
							</ul>
                        </div>
                        <!--<div class="panel-footer">
                            Panel Footer
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Track Sales Rep 
                        </div>
                        <div class="panel-body panel-body-custom">
                        <span id="directions_mapping{{ $customer->complaint_id}}"></span>
                        <?php //include("directions_mapping.php"); ?>
                        </div> 
                        <!--<div class="panel-footer">
                            Panel Footer
                        </div>-->
                    </div>
                </div>
				
				<div class="col-lg-12">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge">
										<a class="user-a active" data-toggle="dropdown" href="#">													
											<img src="../dist/images/user/04.jpg" class="img-circle  mCS_img_loaded" alt="User">
										</a>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning">
										<a class="user-a active" data-toggle="dropdown" href="#">													
											<img src="../dist/images/user/04.jpg" class="img-circle  mCS_img_loaded" alt="User">
										</a>
									
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            <p>Lorem ipsum dolor sit amet eaque facere.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
										<a class="user-a active" data-toggle="dropdown" href="#">													
											<img src="../dist/images/user/04.jpg" class="img-circle  mCS_img_loaded" alt="User">
										</a>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet!</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge info">
										<a class="user-a active" data-toggle="dropdown" href="#">													
											<img src="../dist/images/user/04.jpg" class="img-circle  mCS_img_loaded" alt="User">
										</a>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success">
										<a class="user-a active" data-toggle="dropdown" href="#">													
											<img src="../dist/images/user/04.jpg" class="img-circle  mCS_img_loaded" alt="User">
										</a>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
						<div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
				</div>
				@endif
            </div>

			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>
    <!-- Employee tracking details  -->
	
    
									
                                            @endforeach
                                            </tbody>
											
                                            </table>
											
											
                                            <div class="job-completed-statement-content hide">
                                                <div class="well well-sm">
                                                    Reason for cancelled
                                                </div>
                                            </div>
                                            
                                            <div class="job-completed-rating-content hide">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="well well-sm">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-6 text-center">
                                                                    <h1 class="rating-num">
                                                                        4.0</h1>
                                                                    <div class="rating">
                                                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                                                        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                                                        </span><span class="glyphicon glyphicon-star-empty"></span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="glyphicon glyphicon-user"></span>1,050,008 total
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </div>
									
									
									<div class="tab-pane fade" id="complaintsunassign"></div>
									<div class="tab-pane fade" id="complaints_assign"></div>

									<div class="tab-pane fade" id="manuual-assign">
									  <h3 class="head text-center">manual-assigned data list should display here</h3>
                                    </div>

									<div class="tab-pane fade" id="complaints_inprogress"></div>
                                    <div class="tab-pane fade" id="complaints_cancelled"></div>
                                    <div class="tab-pane fade" id="complaints_today"></div>
                                    <div class="tab-pane fade" id="complaints_week"></div>
                                    <div class="tab-pane fade" id="complaints_monthly"></div>								
                                    <div class="tab-pane fade" id="complaints_pending">
										pending data list should display here
									</div>	
									<div class="tab-pane fade" id="parked">
										parked data list should display here
									</div>
									<div class="tab-pane fade" id="follow-up">
										follow-up data list should display here
									</div>
									<div class="tab-pane fade" id="completed">
										completed data list should display here
									</div>
									<div class="tab-pane fade" id="closed">
										closed data list should display here
									</div>
									
									<div class="clearfix"></div>
								</div>

							</div>
							

                   
							
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
				</div>
                
            </div>
            <!-- /.row -->
			
			<div class="row">
				<!-- /.col-lg-6 -->
                <!--<div class="col-lg-6">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Main Heading
							<ul class="list-inline panel-actions">
								<li>
									<a href="#" class="panelMaxMin">
										<i class="ti ti-fullscreen fa-fw"></i>
									</a>
									<a href="#" class="">
										<i class="ti ti-angle-down fa-fw" data-toggle="collapse" data-target="#demo"></i>
									</a>
								</li>
							</ul>	
                        </div>-->
                        <!-- /.panel-heading -->
                        <!--<div class="panel-body">
							<div id="canvas-holder" style="width:100%">
								<canvas id="chart-area" />
							</div>
							<!--<button id="randomizeData">Randomize Data</button>
							<button id="addDataset">Add Dataset</button>
							<button id="removeDataset">Remove Dataset</button>
							<button id="addData">Add Data</button>
							<button id="removeData">Remove Data</button>-->
							
                       <!-- </div>-->
                        <!-- /.panel-body -->
                    </div>
                    
				</div>
                <!-- /.col-lg-6 -->			
						
				<!-- /.col-lg-6 -->
                <div class="col-lg-6">
					<div class="panel panel-default">
                       <!-- <div class="panel-heading">
                            Main Heading
							<ul class="list-inline panel-actions">
								<li>
									<a href="#" class="panelMaxMin">
										<i class="ti ti-fullscreen fa-fw"></i>
									</a>
									<a href="#" class="">
										<i class="ti ti-angle-down fa-fw" data-toggle="collapse" data-target="#demo"></i>
									</a>
								</li>
							</ul>	
                        </div>-->
                        <!-- /.panel-heading -->
                        <!--<div class="panel-body">
							<div id="morris-donut-chart"></div>
							
                        </div>
                        <!-- /.panel-body -->
                   <!-- </div>-->
                    
				</div>
                <!-- /.col-lg-6 -->
			</div>
		
			
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<!--<script>
	 function emp_load(assgin_complatid){
		 //alert(assgin_complatid);
		 $.get("{{ url('/api/employee_assign')}}",{ 'assgin_complatid': assgin_complatid },function(data) { 
		    $('#employee_showdetails').empty();          
			$('#employee_showdetails').append(data);
		 });
	 } 
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
	 </script>-->
    <!-- Employee assign -->        
<div id="employee_assign" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">All Active Employee</h4>
		  </div>
		  <div class="modal-body">
				<span id="employee_showdetails"></span>			
		  </div>
		  
		</div>

	  </div>
	</div>
<!-- Employee assign -->
	

	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Customer Details</h4>
		  </div>
		  <div class="modal-body">
			
			<div class="row pad-15px create-dash">
				<div class="col-lg-12">
                <form id="signup" method="post" action="signup_message">
				  {!! csrf_field() !!}
					<form role="form">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  Profile
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						  <div class="panel-body">
							<div class="row mar-bot-10px">
								<div class="col-lg-4">
									<label class="f-w-5">First Name</label>
									<input type="text" name="customer_first_name" class="form-control">
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">Middle Name</label>
									<input type="text" class="form-control">
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">Last Name</label>
									<input type="text" name="customer_last_name" class="form-control">
								</div>
							</div>
							
						  </div>
						</div>
					  </div>
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
						  <h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  Contact
							</a>
						  </h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						  <div class="panel-body">
							<div class="row mar-bot-10px">
								<div class="col-lg-4">	
									<label class="f-w-5">Address(Line 1)</label>
									<input type="text" name="Address" class="form-control">
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">Address(Line 2)</label>
									<input type="text" name="Address2" class="form-control">
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">Street Name</label>
									<input type="text" name="street" class="form-control">
								</div>
							</div>
							<div class="row mar-bot-10px">
								<div class="col-lg-4">	
									<label class="f-w-5">Locality</label>
									<input type="text" name="locality" class="form-control">
									
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">Country</label>
									
								<select id="country_id" name="country" class="form-control input pass">
                                    <option value="">Select Country</option>
                                    @foreach ($countryList as $country)
                                    <option value="{!! $country->country_id!!}">{{ $country->country_name}}</option>
                                    @endforeach
                                </select>
								</div>
								<div class="col-lg-4">	
									<label class="f-w-5">State</label>
								<select id="state_id" name="state" class="form-control input pass">
                                    <option value="">Select State</option>
                                    @foreach ($state_list as $state)
                                    <option value="{!! $state->state_id!!}">{{ $state->state_name}}</option>
                                    @endforeach
                                </select>
								</div>
							</div>
							<div class="row mar-bot-10px">
								
							
								<div class="col-lg-4">	
									<label class="f-w-5">City</label>
                                <select id="city_id" name="city" class="form-control input pass">
                                    <option value="">Select City</option>
                                    @foreach ($city_list as $city)
                                    <option value="{!! $city->city_id!!}">{{ $city->city_name}}</option>
                                    @endforeach
                                </select>
								</div>
								<div class="col-lg-4">
									<label class="f-w-5">Zip Code</label>
									<input type="text" name="Zipcode" class="form-control">
								</div>
								<div class="col-lg-4">
									<label class="f-w-5">Mobile Number</label>
									<input type="text" name="customer_mobile" value="" class="form-control">
								</div>
								<div class="col-lg-4">
									<label class="f-w-5">Email Address</label>
									<input type="text" name="customer_email" value="" class="form-control">
								</div>
							</div>
							<div class="row mar-bot-10px">
								<div class="col-lg-4">
									<label class="f-w-5">Mode of Commnication</label>
							<select class="form-control input pass" name="mode_of_communication" title="Select Mode of Commnication" data-width="100%">
									  <option data-tokens="ketchup mustard">Mobile</option>
									  <option data-tokens="mustard">Mail</option>									  
							</select>
								</div>
							
						  </div>
						</div>
					  </div>					  
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
						  <h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							  Service schedule
							</a>
						  </h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						  <div class="panel-body">
							<div class="row mar-bot-10px">
								<div class="col-lg-4 ">
									<label>Service Category</label>
								<select id="service" name="service" class="form-control input pass">
                                    <option value="">Service Category</option>
                                    @foreach ($service_list as $service)
                                    <option value="{!! $service->service_id!!}">{{ $service->service_name}}</option>
                                    @endforeach
                                </select>
								</div>
								<div class="col-lg-4 ">
									<label>Facility</label>
								<select class="selectpicker" name="facility" data-width="100%" data-size="5" multiple >
                                  <option value="">Select Facility</option>
								  <option value="School">School</option>
								  <option value="Office Space">Office Space</option>
								  <option value="Residence">Residence</option>
								  <option value="Shops">Shops</option>
								  <option value="Multi-storey">Multi-storey</option>
								  <option value="Showrooms">Showrooms</option>
								  
								</select>
								</div>
						<div class="row mar-bot-10px">	
							<div class="col-lg-4 form-group">
								<label>Appointment</label>
								<div class='input-group date' id='startdate'>
									<input type='text' name="complaint_dates" id="complaint_dates" class="form-control" value="" />
                                    <input type='hidden' name="appointment_date" id="appointment_date" class="form-control" value="" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>

							</div>
							<div class="col-lg-4 form-group" style="display:none;">
								<label>End Date</label>
								<div class='input-group date' id='enddate'>
                                	<input type="text" name="complaint_date" value="" class="form-control">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
								<div class="col-lg-4 form-group">
									<label>Service Description</label>
									<textarea class="form-control" name="complaint_desc" rows="3"></textarea>
								</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
						<strong>Warning!</strong> Indicates a warning that might need attention.
					</div>
				</div>
			</div>
            <div class="modal-footer">
			<button type="submit" class="btn btn-primary" id="register_submit">Submit</button>
		    </div>
            </form>
							
		  </div>
		  
		</div>

	  </div>
	</div>
    


    <script>	
	
	$(document).ready(function($){		
					
			$('#input-group-addon').on('click', function(){
				var datetime = $('#complaint_dates').val();
				$('#complaint_date').val(datetime);
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
	
			$.get("{{ url('/api/pending')}}",{ 'today': 1 },function(data) {          
					var pers = Math.round(data) + '%';
					$('#pending').append(pers);
					$('#pendings').append(data);
				});	
				
			$('.searchBtn').click(function(){	
						
				var service = $("#service").val();
				var select_state = $("#select_state").val();				
				var track_order = $("#track_order").val();
				var order_status = $("#order_status").val();
				var select_assign = $("#select_assign").val();
				//alert(select_assign);
				$('#home').empty();
				$.get("{{ url('/api/activedashboard')}}",{ 'service': service,'select_state':select_state,'track_order':track_order,'order_status':order_status,'select_assign':select_assign },function(data) {					
					$('#home').addClass('in active');               
					$('#home').append(data);
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});								
				
			});	
			$('#home_all').click(function(){
				  
				  var service = $("#service").val();
				var select_state = $("#select_state").val();				
				var track_order = $("#track_order").val();
				var order_status = $("#order_status").val();
				var select_assign = $("#select_assign").val();
				//alert(select_assign);
				$('#home').empty();
				$.get("{{ url('/api/activedashboard')}}",{ 'service': service,'select_state':select_state,'track_order':track_order,'order_status':order_status,'select_assign':select_assign },function(data) {					
					$('#home').addClass('in active');               
					$('#home').append(data);
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});	
			 });

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
			
			
		$('#unass_select').click(function(){
				//alert(status);
				var cst_sta = 'unassigned';
				$('#complaintsunassign').empty();
				$.get("{{ url('/api/unassigned')}}",{ 'custom_status': cst_sta },function(data) {
					$('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').addClass('in active'); 
					$('#complaintsunassign').append(data);
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});
				
			});	
		$('#autos-assignsed').click(function(){
				//alert(status);
				var cstassign = 'assigned';
				$('#complaints_assign').empty();
				$.get("{{ url('/api/assigned')}}",{ 'custom_assign': cstassign },function(data) {      
					$('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').addClass('in active');        
					$('#complaints_assign').append(data);
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});
				
			});	
		$('#in-progressactive').click(function(){
				//alert(status);
				var inprogr = 'inprogress';
				$('#complaints_inprogress').empty();
				$.get("{{ url('/api/inprogress')}}",{ 'custom_inpro': inprogr },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').addClass('in active');      
					$('#complaints_inprogress').append(data);
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});
				
			});	
		$('#custom_cancelled').click(function(){
				//alert(status);
				var cancle = 'cancelled';
				$('#complaints_cancelled').empty();
				$.get("{{ url('/api/cus_cancel')}}",{ 'custom_cancle': cancle },function(data) {
					$('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').addClass('in active');       
					$('#complaints_cancelled').append(data);
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();					
				});
				
			});	
			
		$('#today_view').click(function(){
				//alert(status);
				$('#complaints_today').empty();
				$.get("{{ url('/api/viewtoday')}}",{ 'custom_day': 1 },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').addClass('in active');      
					$('#complaints_today').append(data);
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
					
				});
				
			});	
		$('#today_views').click(function(){
				//alert(status);
				$('#complaints_today').empty();
				$.get("{{ url('/api/viewtoday')}}",{ 'custom_day': 1 },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').addClass('in active');      
					$('#complaints_today').append(data);
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
					
				});
				
			});		
		$('#weekend_view').click(function(){
				//alert(status);
				$('#complaints_week').empty();
				$.get("{{ url('/api/viewweekend')}}",{ 'custom_day': 1 },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').addClass('in active');      
					$('#complaints_week').append(data);
					$('#complaints_monthly').removeClass('in active');      
					$('#complaints_monthly').empty();
				});				
			});		
			
			$('#monthly_view').click(function(){
				//alert(status);
				$('#complaints_monthly').empty();
				$.get("{{ url('/api/viewmonthly')}}",{ 'custom_day': 1 },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').addClass('in active');      
					$('#complaints_monthly').append(data);
				});				
			});	

			$('#pending_view').click(function(){
				$('#complaints_pending').empty();
				$.get("{{ url('/api/viewpending')}}",{ 'custom_day': 1  },function(data) { 
				    $('#home').removeClass('in active');        
					$('#home').empty();  
					$('#complaintsunassign').removeClass('in active'); 
					$('#complaintsunassign').empty();
					$('#complaints_assign').removeClass('in active');        
					$('#complaints_assign').empty();
					$('#complaints_inprogress').removeClass('in active');      
					$('#complaints_inprogress').empty();
					$('#complaints_cancelled').removeClass('in active');       
					$('#complaints_cancelled').empty();
					$('#complaints_today').removeClass('in active');      
					$('#complaints_today').empty();
					$('#complaints_week').removeClass('in active');      
					$('#complaints_week').empty();
					$('#complaints_monthly').addClass('in active');      
					$('#complaints_monthly').append(data);
				});				
			});	
				
		});	
			
			
			$('.multi_sel_del').on('click', function(e) { 
						var allVals = [];  
							$(".sub_chk:checked").each(function() {  
								allVals.push($(this).attr('data-id'));
								//alert();
							});  
					//alert(allVals.length); return false;  
							if(allVals.length <=0)  
							{  
								alert("Please select row.");  
							}  
							else {  
								//$("#loading").show(); 
								WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";  
								var check = confirm(WRN_PROFILE_DELETE);  
								if(check == true){  
									var join_selected_values = allVals.join(",");
									$.get("{{ url('/api/delete_cusids')}}", { cust_id: join_selected_values },
									function(data) {                
										if(data =='1'){
											alert('Your Track Work Order has been deleted!');
											//location.reload();
											$('table#complaintsTable tr.selected').remove();
										}
									});
								  //$.each(allVals, function( index, value ) {
									  
								  //});                        
								}  
							}  
						});
			
	</script>
	</div>
    
	
	
</body>

</html>
