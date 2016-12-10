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
	
	<style>
		
		/*  bhoechie tab */
		div.bhoechie-tab-container{
		  z-index: 10;
		  background-color: #ffffff;
		  padding: 0 !important;
		  border-radius: 4px;
		  -moz-border-radius: 4px;
		  border:1px solid #ddd;
		  margin-top: 20px;
		  margin-left: 50px;
		  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		  box-shadow: 0 6px 12px rgba(0,0,0,.175);
		  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		  background-clip: padding-box;
		  opacity: 0.97;
		  filter: alpha(opacity=97);
		}
		div.bhoechie-tab-menu{
		  padding-right: 0;
		  padding-left: 0;
		  padding-bottom: 0;
		}
		div.bhoechie-tab-menu div.list-group{
		  margin-bottom: 0;
		}
		div.bhoechie-tab-menu div.list-group>a{
		  margin-bottom: 0;
		}
		div.bhoechie-tab-menu div.list-group>a .glyphicon,
		div.bhoechie-tab-menu div.list-group>a .fa {
		  color: #5A55A3;
		}
		div.bhoechie-tab-menu div.list-group>a:first-child{
		  border-top-right-radius: 0;
		  -moz-border-top-right-radius: 0;
		}
		div.bhoechie-tab-menu div.list-group>a:last-child{
		  border-bottom-right-radius: 0;
		  -moz-border-bottom-right-radius: 0;
		}
		div.bhoechie-tab-menu div.list-group>a.active,
		div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
		div.bhoechie-tab-menu div.list-group>a.active .fa{
		  background-color: #5A55A3;
		  background-image: #5A55A3;
		  color: #ffffff;
		}
		div.bhoechie-tab-menu div.list-group>a.active:after{
		  content: '';
		  position: absolute;
		  left: 100%;
		  top: 50%;
		  margin-top: -13px;
		  border-left: 0;
		  border-bottom: 13px solid transparent;
		  border-top: 13px solid transparent;
		  border-left: 10px solid #5A55A3;
		}

		div.bhoechie-tab-content{
		  background-color: #ffffff;
		  /* border: 1px solid #eeeeee; */
		  padding-left: 20px;
		  padding-top: 10px;
		}

		div.bhoechie-tab div.bhoechie-tab-content:not(.active){
		  display: none;
		}
	</style>
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
                <div class="col-lg-12">
                    <h1 class="page-header">Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Main Heading
							
							<ul class="list-inline panel-actions">
								<li>
									<a href="#" class="panelMaxMin">
										<i class="ti ti-fullscreen fa-fw"></i>
									</a>
									<a href="#" class="">
										<i class="ti ti-angle-down fa-fw" data-toggle="collapse" data-target="#reports"></i>
									</a>
								</li>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="reports">
                            
							
							
							
							
							
								<div class="row">
									<div class="col-md-11 bhoechie-tab-container">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
										  <div class="list-group">
											<a href="#" class="list-group-item active text-center">
											 <i class="ti ti-receipt"></i><br/>Pending Work Orders
											</a>
											<a href="#" class="list-group-item text-center">
											  <i class="ti ti-receipt"></i><br/>Reports 1
											</a>
											<a href="#" class="list-group-item text-center">
											  <i class="ti ti-receipt"></i><br/>Reports 2
											</a>
											<a href="#" class="list-group-item text-center">
											  <i class="ti ti-receipt"></i><br/>Reports 3
											</a>
											<a href="#" class="list-group-item text-center">
											  <i class="ti ti-receipt"></i><br/>Reports 4
											</a>
										  </div>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
											<!-- flight section -->
											<div class="bhoechie-tab-content active">
												<center>
													<div style="width: 100%">
														<canvas id="canvas"></canvas>
													</div>
													<button id="randomizeData">Randomize Data</button>
												</center>
											</div>
											<!-- train section -->
											<div class="bhoechie-tab-content">
												<center>
													<div id="canvas-holder" style="width:75%">
														<canvas id="chart-area" />
													</div>
													<button id="randomizeData">Randomize Data</button>
													<button id="addDataset">Add Dataset</button>
													<button id="removeDataset">Remove Dataset</button>
													<button id="addData">Add Data</button>
													<button id="removeData">Remove Data</button>
												</center>
											</div>
								
											<!-- hotel search -->
											<div class="bhoechie-tab-content">
												<center>
												  <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
												  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
												  <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
												</center>
											</div>
											<div class="bhoechie-tab-content">
												<center>
												  <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
												  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
												  <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
												</center>
											</div>
											<div class="bhoechie-tab-content">
												<center>
												  <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
												  <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
												  <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
												</center>
											</div>
										</div>
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
			
			
			 <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pie Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Multiple Axes Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-multi"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Moving Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
            </div>
            <!-- /.row -->
			
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("scripts.php"); ?>
	<script type="text/javascript" src="../js/reports.js"></script>
	
	<script src="../bower_components/Chart.js-master/dist/Chart.bundle.js"></script>
	
	
	
	<!-- Flot Charts JavaScript -->
    <script src="../bower_components/flot/excanvas.min.js"></script>
    <script src="../bower_components/flot/jquery.flot.js"></script>
    <script src="../bower_components/flot/jquery.flot.pie.js"></script>
    <script src="../bower_components/flot/jquery.flot.resize.js"></script>
    <script src="../bower_components/flot/jquery.flot.time.js"></script>
    <script src="../bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../js/flot-data.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</body>

</html>
