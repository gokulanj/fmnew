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
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
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
										<i class="ti ti-angle-down fa-fw" data-toggle="collapse" data-target="#demo"></i>
									</a>
								</li>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="demo">
                            
							<div id='external-events'>
								<h4>Draggable Events</h4>
								<div class='fc-event'>My Event 1</div>
								<div class='fc-event'>My Event 2</div>
								<div class='fc-event'>My Event 3</div>
								<div class='fc-event'>My Event 4</div>
								<div class='fc-event'>My Event 5</div>
								<p>
									<input type='checkbox' id='drop-remove' />
									<label for='drop-remove'>remove after drop</label>
								</p>
							</div>
							<div id='calendar'></div>
							
							
                            
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
	
	<link href='../bower_components/fullcalendar-scheduler-1.3.1/lib/fullcalendar.min.css' rel='stylesheet' />
	<link href='../bower_components/fullcalendar-scheduler-1.3.1/lib/fullcalendar.print.css' rel='stylesheet' media='print' />
	<link href='../bower_components/fullcalendar-scheduler-1.3.1/scheduler.min.css' rel='stylesheet' />
	<script src='../bower_components/fullcalendar-scheduler-1.3.1/lib/moment.min.js'></script>
	<script src='../bower_components/fullcalendar-scheduler-1.3.1/lib/jquery.min.js'></script>
	<script src='../bower_components/fullcalendar-scheduler-1.3.1/lib/jquery-ui.min.js'></script>
	<script src='../bower_components/fullcalendar-scheduler-1.3.1/lib/fullcalendar.min.js'></script>
	<script src='../bower_components/fullcalendar-scheduler-1.3.1/scheduler.min.js'></script>

</body>

</html>
