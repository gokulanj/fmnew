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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		
			<?php include("header.php"); ?>
			
			<?php include("sidebar.php"); ?>
			
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
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
												<label class="f-w-5">Name</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Address</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Line 1</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Line 2</label>
												<input type="text" class="form-control">
											</div>
										</div>	
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">	
												<label class="f-w-5">Country</label>
												
												<select class="form-control">
												  <option value="volvo">Volvo</option>
												  <option value="saab">Saab</option>
												  <option value="mercedes">Mercedes</option>
												  <option value="audi">Audi</option>
												</select>
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">State</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Region</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">City</label>
												<input type="text" class="form-control">
											</div>
											
											
											
										</div>	
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<label class="f-w-5">Mobile Number</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Email</label>
												<input type="email" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Requirement</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">	
												<label class="f-w-5">Service</label>
												
												<select class="form-control">
												  <option value="volvo">Volvo</option>
												  <option value="saab">Saab</option>
												  <option value="mercedes">Mercedes</option>
												  <option value="audi">Audi</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row mT-10">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<label class="f-w-5">Start Date</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">End Date</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">Start Time</label>
												<input type="text" class="form-control">
											</div>
											<div class="col-lg-3">
												<label class="f-w-5">End Time</label>
												<input type="text" class="form-control">
											</div>
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

    <?php include("scripts.php"); ?>

</body>

</html>
