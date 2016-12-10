<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - </title>

    <?php include("styles.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">
		
			<?php include("header.php"); ?>
			
			
			
        </nav>
		<?php include("sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Dashboard</h1>
                </div>
				<div class="col-lg-6">
					<i class="ti-clipboard pull-right font-s-20px mar-top-20px cursor-pointer init-tooltip"  
					data-toggle="modal"  data-target="#myModal" data-whatever="@mdo" 
					data-toggle="tooltip" title="Create Work Order"></i>
				</div>
                
            </div>
			
			
			
			
			<div class="row dash-prog-row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25">
										<span>50%</span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Today Task!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 green">
										<span>50%</span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Weekly Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 orange">
										<span>50%</span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>Monthly Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="c100 p25 dark">
										<span>50%</span>
										<div class="slice">
											<div class="bar"></div>
											<div class="fill"></div>
										</div>
									</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Pending!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
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
                        <div class="panel-body pad-0px" id="demo">
                            
							
							<div class="row pad-15px  search-dash">
								<div class="col-lg-12">
									<form role="form">
										<div class="col-lg-4 form-group">
											<label>Track Work Order</label>
											<select class="selectpicker" data-width="100%">
											  <option>Select</option>
											  <option>W0123423</option>
											  <option>W0123426</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Service Category</label>
											<select class="selectpicker" data-width="100%">
												<option>Select</option>
											  <option>Plumbing</option>
											  <option>Electrical</option>
											  <option>Home Appliances</option>
											  <option>Automobile</option>
											  <option>Home Appliances</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Work Order Status</label>
											<select class="selectpicker" data-width="100%">
												<option>Select</option>
											  <option>Submitted</option>
											  <option>New</option>
											  <option>Assigned</option>
											  <option>Pending</option>
											  <option>Follow-up</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>State</label>
											<select class="selectpicker" data-width="100%">
												<option>Select</option>
												<option>TamilNadu</option>
												<option>Kerala</option>
												<option>Mumbai</option>
												<option>Karnataka</option>
												<option>Delhi</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											<label>Assigned To</label>
											<select class="selectpicker" data-width="100%">
												<option>Select</option>
											  <option>Shanu</option>
											  <option>Bernald</option>
											  <option>Sathwik</option>
											  <option>Jay</option>
											</select>
										</div>
										<div class="col-lg-4 form-group">
											
											<button type="button" class="btn btn-primary btn-sm mar-top-25px" >Search</button>
										</div>
									</form>
								
									
								</div>
							</div>
							
							
							
							
							
							
										
							<div class="board">
								
								<div class="board-inner">
									<ul class="nav nav-tabs" id="myTab">
										<div class="liner"></div>
										<li class="active">
											<a href="#home" data-toggle="tab" title="All Records">
												<span class="round-tabs one">
													 <i class="ti ti-menu-alt"></i>
												</span> 
											</a>
										</li>

										<li>
											<a href="#un-assigned" data-toggle="tab" title="Un Assigned">
												<span class="round-tabs two">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#auto-assigned" data-toggle="tab" title="Auto Assigned">
												<span class="round-tabs assigned">
													 <i class="glyphicon glyphicon-gift"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#manual-assigned" data-toggle="tab" title="Manual Assigned">
												<span class="round-tabs three">
													 <i class="glyphicon glyphicon-gift"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#in-progress" data-toggle="tab" title="In-Progress">
												<span class="round-tabs four">
													<i class="glyphicon glyphicon-comment"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#cancelled" data-toggle="tab" title="Cancelled">
												<span class="round-tabs four">
													<i class="glyphicon glyphicon-comment"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#pending" data-toggle="tab" title="Pending">
												<span class="round-tabs five">
												  <i class="glyphicon glyphicon-ok"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#parked" data-toggle="tab" title="Parked">
												<span class="round-tabs five">
												  <i class="glyphicon glyphicon-ok"></i>
												</span> 
											</a>
										</li>
										<li>
											<a href="#follow-up" data-toggle="tab" title="Follow-up">
												<span class="round-tabs five">
												  <i class="glyphicon glyphicon-ok"></i>
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
												  <i class="glyphicon glyphicon-ok"></i>
												</span> 
											</a>
										</li>	
									</ul>
								</div>

								<div class="tab-content">
									<div class="tab-pane fade in active" id="home">
														
										<?php include("allRecords.php"); ?>
									</div>
									
									
									<div class="tab-pane fade" id="un-assigned">
									  <h3 class="head text-center">un-assigned data list should display here</h3>
									  
									  
									</div>

									<div class="tab-pane fade" id="auto-assigned">
									  <h3 class="head text-center">auto-assigned data list should display here</h3>
									  
									</div>

									<div class="tab-pane fade" id="manuual-assign">
									  <h3 class="head text-center">manual-assigned data list should display here</h3>
									  
									</div>

									<div class="tab-pane fade" id="in-progress">
										in-progress data list should display here
									</div>
									
									<div class="tab-pane fade" id="cancelled">
										cancelled data list should display here
									</div>

									<div class="tab-pane fade" id="pending">
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
                <div class="col-lg-6">
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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div id="canvas-holder" style="width:100%">
								<canvas id="chart-area" />
							</div>
							<!--<button id="randomizeData">Randomize Data</button>
							<button id="addDataset">Add Dataset</button>
							<button id="removeDataset">Remove Dataset</button>
							<button id="addData">Add Data</button>
							<button id="removeData">Remove Data</button>-->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
				</div>
                <!-- /.col-lg-6 -->
				
				<!-- /.col-lg-6 -->
                <div class="col-lg-6">
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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div id="morris-donut-chart"></div>
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
				</div>
                <!-- /.col-lg-6 -->
			</div>
		
			
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("scripts.php"); ?>
	
	<script src="../bower_components/Chart.js-master/dist/Chart.bundle.js"></script>
	
	<!--<script src="http://maps.googleapis.com/maps/api/js"></script>-->
	
	<script type="text/javascript" src="../js/dashboard.js"></script>
	
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">New message</h4>
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
                
                
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Work Progress
                        </div>
                        <div class="panel-body panel-body-custom">
                            <ul class="task-list">
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;Mark
									</a>
									
									<em>- Vendor Id : vend1220</em>
									<p>Work Type 1 <span class="label label-danger">23%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
											<span class="sr-only">23% Complete</span>
										</div>
									</div>
									
								</li>
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;Mark
									</a><em>- Vendor Id : vend1225</em>
									<p>Work Type 2 <span class="label label-success">80%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
									
								</li>
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;Mark
									</a><em>- Vendor Id : vend1260</em>
									<p>Work Type 3 <span class="label label-success">100%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
											<span class="sr-only">Success</span>
										</div>
									</div>
									
								</li>
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;Mark
									</a><em>- Vendor Id : vend12020</em>
									<p>Work Type 4<span class="label label-warning">45%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
											<span class="sr-only">45% Complete</span>
										</div>
									</div>
									
								</li>
								<li>
									<a class="user-a active" data-toggle="dropdown" href="#">													
										<img src="../dist/images/user/04.jpg" class="img-circle " alt="User" />&nbsp;&nbsp;Mark
									</a><em>- Vendor Id : vend1220</em>
									<p>Work Type 5 <span class="label label-danger">10%</span></p>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
											<span class="sr-only">10% Complete</span>
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
                            <div id="googleMap" style="width:100%;height:380px;"></div>
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
				
            </div>
			
			
			 
			
			
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
		  </div>
		</div>
	  </div>
	</div>

	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Modal Header</h4>
		  </div>
		  <div class="modal-body">
			
			<div class="row pad-15px create-dash">
				<div class="col-lg-12">
					<form role="form">
						<div class="row mar-bot-10px">
							<div class="col-lg-4">
								<label class="f-w-5">First Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-lg-4">	
								<label class="f-w-5">Last Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-lg-4">	
								<label class="f-w-5">Address(Line 1)</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row mar-bot-10px">
							<div class="col-lg-4">	
								<label class="f-w-5">Address(Line 2)</label>
								<input type="text" class="form-control">
							</div>
						
							<div class="col-lg-4">	
								<label class="f-w-5">Street Name</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-lg-4">	
								<label class="f-w-5">Locality</label>
								<input type="text" class="form-control">
								
							</div>
						</div>
						<div class="row mar-bot-10px">
							<div class="col-lg-4">	
								<label class="f-w-5">Country</label>
								
								<select class="selectpicker" title="Select Country" data-size="5" data-live-search="true" data-width="100%">
								  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
								  <option data-tokens="mustard">Burger, Shake and a Smile</option>
								  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
								</select>
							</div>
							<div class="col-lg-4">	
								<label class="f-w-5">State</label>
								<select class="selectpicker" title="Select State" data-size="5" data-live-search="true" data-width="100%">
								  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
								  <option data-tokens="mustard">Burger, Shake and a Smile</option>
								  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
								</select>
							</div>
						
							<div class="col-lg-4">	
								<label class="f-w-5">City</label>
								<select class="selectpicker" title="Select City" data-size="5" data-live-search="true" data-width="100%">
								  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
								  <option data-tokens="mustard">Burger, Shake and a Smile</option>
								  <option data-tokens="frosting">Sugar, Spice and all things nice</option>
								</select>
							</div>
						</div>
						<div class="row mar-bot-10px">
							<div class="col-lg-4">
								<label class="f-w-5">Zip Code</label>
								<input type="text" class="form-control">
							</div>
							<div class="col-lg-4">
								<label class="f-w-5">Mobile Number</label>
								<input type="email" class="form-control">
							</div>
							<div class="col-lg-4">
								<label class="f-w-5">Email Address</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="row mar-bot-10px">
							<div class="col-lg-4">
								<label class="f-w-5">Mode of Commnication</label>
								<select class="selectpicker" title="Select Mode of Commnication" data-width="100%">
								  <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
								  <option data-tokens="mustard">Burger, Shake and a Smile</option>
								  
								</select>
							</div>
							
							<div class="col-lg-4 ">
								<label>Service Category</label>
								<select class="selectpicker" data-width="100%" data-size="5" multiple>
									<option>Plumbing</option>
									<option>Electrical</option>
									<option>Home Appliances</option>
									<option>Automobile</option>
									<option>Home Appliances</option>388

								</select>
							</div>
							<div class="col-lg-4 ">
								<label>Facility</label>
								<select class="selectpicker" data-width="100%" data-size="5" multiple >
								  <option>School</option>
								  <option>Office Space</option>
								  <option>Residence</option>
								  <option>Shops</option>
								  <option>Multi-storey</option>
								  <option>Showrooms</option>
								  
								</select>
							</div>
						</div>
						<div class="row mar-bot-10px">	
							<div class="col-lg-4 form-group">
								<label>Start Date</label>
								<div class='input-group date' id='startdate'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>

							</div>
							<div class="col-lg-4 form-group">
								<label>End Date</label>
								<div class='input-group date' id='enddate'>
									<input type='text' class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-lg-4 form-group">
								<label>Service Description</label>
								<textarea class="form-control" rows="3"></textarea>
							</div>
						</div>	
					</form>
				
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
						<strong>Warning!</strong> Indicates a warning that might need attention.
					</div>
				</div>
			</div>
							
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary btn-sm" >Search</button>
		  </div>
		</div>

	  </div>
	</div>
	
</body>

</html>
