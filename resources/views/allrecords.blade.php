<table id="complaintsTable" class="table table-striped table-bordered table-editable" cellspacing="0" width="100%">
<thead>
    <tr>
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
<tbody>
@foreach ($customerList as $customer)
<tr class="odd gradeX">
<td>
@if ($customer->status == 'unassigned')
<span class="label label-default">{{$customer->status}}</span>
@elseif ($customer->status == 'inprogress')
<span class="label label-primary" style="background-color: orange;">In Progress </span>
@elseif ($customer->status == 'cancelled')
<span class="label label-danger" style="text-transform: capitalize;">
Cancelled </span>
@else
<span class="label label-info">{{$customer->status}}</span>
@endif
</td>
<td>{{ $customer->customer_name}}</td>
<td>{{ $customer->complaint_desc}}</td>
<td>{{ $customer->service_name}}</td>
<td>{{ $customer->state_name}}</td>
<td>{{ $customer->complaint_code}}</td>
<td>
@if ($customer->status == 'unassigned')
<div class="btn-group bootstrap-select show-tick" style="width: 100%;">
<button data-toggle="dropdown" class="btn dropdown-toggle btn-default" type="button" title="Nothing selected"><span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
<div class="dropdown-menu open"><div class="bs-searchbox">
<input type="text" autocomplete="off" class="form-control">
</div>
<ul role="menu" class="dropdown-menu inner">
<li data-optgroup="1" class="dropdown-header ">
<span class="text">Vendor 1</span>
</li>
@foreach ($emp_list as $emp_lists)
<li data-optgroup="1" data-original-index="0">
<a data-tokens="null" style="" class="opt  " tabindex="0">
<span class="text">{{ $emp_lists->emp_name }}</span>
<span class="glyphicon glyphicon-ok check-mark"></span>
</a>
</li>
@endforeach
</ul>
</div>
<select class="selectpicker" id="select_vender" name="select_vender" multiple data-size="5" data-live-search="true">
                                                      <option value="">Select Vendors</option>
                                                      <optgroup label="Vendor 1">
                                                       @foreach ($emp_list as $emp_lists)
                                                       <option value="{{ $emp_lists->emp_id }}">{{ $emp_lists->emp_name }}</option>
                                                       @endforeach
                                                      </optgroup>                                                      
                                                    </select>
                                                    </div>		                                                    
@else
<a class="user-{{ $customer->employee_id}} ven-profile active" href="javascript:void(0);" data-placement="left"  data-toggle="popover" data-container="body" data-original-title="" title="">													
<img src="../dist/images/user/04.jpg" class="img-circle " alt="User"> {{ $customer->employee_name }}
</a><i class="ti-settings init-tooltip pull-right" onclick="emp_load('{!!$customer->complaint_id!!}');" data-target="#employee_assign" data-toggle="modal" title="Add or Reassign" style="cursor:pointer;"></i>
@endif
</td>
<td>
<ul class="task-list">
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
<button type="button" data-toggle="modal" onclick="passtomaps({!!$customer->complaint_id!!});"  data-target="#exampleModal{!!$customer->complaint_id!!}" data-whatever="@" class="btn btn-outline btn-primary">
                    <i class="ti-eye"></i>
                </button>
                <script>
				function passtomaps(custid){
					//alert(custid);
					$('#directions_mapping'+custid).empty();
					$('#itineraryDiv'+custid).empty();	
					$.get("{{ url('/api/map_directions')}}",{ custm_id: custid },
						function(data) {				
							$('#directions_mapping'+custid).append(data);
							$('#itineraryDiv'+custid).hide();
					});
					
				}
				$(function() {
					$('#exampleModal{!!$customer->complaint_id!!}').on('show.bs.modal', function (event) {
						//alert('{{$customer->complaint_id}}');
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						setTimeout(function(){ $(".loaderParent_hide").empty();$(".dash-ind-job-stat").removeClass("hide");$(".dash-ind-job-stat").addClass("show"); }, 3000);
						var modal = $(this)
						modal.find('.modal-title').text('Work progress for ' + '{{ $customer->customer_name}}')
						modal.find('.modal-body input').val(recipient)
					});
					
				} );	
				</script>
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
			</script>
</li>                                                             


</ul>
</div>
</div>
</td>                                            
</tr>
<div id="popover-content" class="hide">                                            
<div class="">
<div class="row">
<div class="col-md-12" style="padding-left:0px; padding-right:0px;">
<div>
<div class="col-md-12" style="padding-left:0px; padding-right:0px;">
<div class="col-md-12" style="padding-left:0px; padding-right:0px;">
<h2 class="well profile">{{ $customer->employee_name }}</h2>
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
			<h4 class="modal-title" style="text-transform: capitalize;" id="exampleModalLabel">Work progress for {{ $customer->customer_name}}</h4>
		  </div>
		  <div class="modal-body">
			
			<div class="loaderParent" style="display:none;position:relative;width:100%;height:100px;">
				<div class="loader">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			
			<div class="show row dash-ind-job-stat">
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
                @elseif ($customer->status == 'assigned')
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
                @elseif ($customer->status == 'inprogress')                 
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