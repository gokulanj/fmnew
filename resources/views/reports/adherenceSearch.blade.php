

<div class="row">
	<!--<diV class="download-list">
		<button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i></button>
		<button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i></button>
		<button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i></button>
		<button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i></button>	
	</div>-->
	
	<div class="btn-group pull-right download-list" >
		<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
			<i class="ti ti-download"></i>
		</button>
		<ul class="dropdown-menu slidedown">
			<li>
				<a href="#" id="agentAdherence_pdf">
					<i class="fa fa-file-pdf-o fa-fw"></i> PDF
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-file-excel-o fa-fw"></i> XLS
				</a>
			</li>
			<li>
				<a href="#" id="aarPrint">
					<i class="fa fa-print fa-fw"></i> PRINT
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-area-chart fa-fw"></i> CHART
				</a>
			</li>
			
		</ul>
	</div>	
	
</div>
							

<div class="alert search-box">
	<div class="row mar-bot-10px">
		<div class="col-lg-3">
			<label class="f-w-5">Department Name</label>
			
			
			<select id="tokens" class="selectpicker form-control show-menu-arrow " multiple	title="Select Department" data-size="5" data-live-search="true">
					
				@foreach ($service as $services) 	
                <option data-tokens="{{ $services->service_id }}">{{ $services->service_name }}</option>
                @endforeach
			</select>
		</div>
		<div class="col-lg-3">	
			<label class="f-w-5">Agent Name</label>			
			<select id="tokens" class="selectpicker form-control show-menu-arrow " multiple title="Select Agent" data-size="5" data-live-search="true">
				@foreach ($empname as $empnames) 	
                <option data-tokens="{{ $empnames->emp_id }}">{{ $empnames->emp_name }}</option>
                @endforeach
			</select>
			
		</div>
		<div class="col-lg-2">	
			<label class="f-w-5">From Date</label>
			
			<div class='input-group date' id='reportFromdate'>
				<input type='text' class="form-control" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="col-lg-2">	
			<label class="f-w-5">To Date</label>
			
			<div class='input-group date' id='reportEnddate'>
				<input type='text' class="form-control" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="col-lg-2">	
			<label class="f-w-5 hide mar-top-25px"> </label>
			
			<button type="button" class="btn btn-primary btn-sm mar-top-25px">Search</button>
			
		</div>
		
	</div>
</div>