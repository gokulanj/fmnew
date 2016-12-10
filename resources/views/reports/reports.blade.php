<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fieldmappe - Agent Adherence Reports</title>

    <?php include("pages/styles.php"); ?>
	
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
	<link href="../dist/css/reports.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0">		
			<?php include("pages/header.php"); ?>		
        </nav>
		<?php include("pages/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agent Adherence Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
				<div class="col-lg-12">
                    
					<ul class="adherenceTab nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#agentAdherence">Agent Adherence</a></li>
					  <li><a data-toggle="tab" href="#menu1">Out Of Adherence</a></li>
					  <li><a data-toggle="tab" href="#menu2">Agent Status Reports</a></li>
					</ul>

					<div class="tab-content">					
						<div id="agentAdherence" class="tab-pane fade in active">
							@include('reports.adherenceSearch')
							@include('reports.agentAdherence')
						</div>
                        
						<div id="menu1" class="tab-pane fade">
							@include('reports.adherenceSearch')
                            @include('reports.outOfAdherence')
						</div>
                        
						<div id="menu2" class="tab-pane fade">
							@include('reports.adherenceSearch')
                            @include('reports.agentStatusAdherence')
						</div>
					</div>			
					
                </div>
                <!-- /.col-lg-12 -->
			</div>			
		</div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include("pages/scripts.php"); ?>
    <script src="../js/reports.js"></script>
    <script src="../bower_components/Chart.js-master/dist/Chart.bundle.js"></script>    
	<link href="../css/datatables.css" type="text/css" rel="stylesheet">
    <link href="../css/buttons.dataTables.min.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/datatables.js"></script>
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="../js/buttons.flash.min.js"></script>
    <script src="../js/jszip.min.js"></script>
    <script src="../js/pdfmake.min.js"></script>  
    <script src="../js/vfs_fonts.js"></script> 
    <script src="../js/buttons.html5.min.js"></script> 
    <script src="../js/buttons.print.min.js"></script> 
	
	

</body>
</html>