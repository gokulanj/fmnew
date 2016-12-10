 <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/dashboard">
    <!--<img src="../dist/images/logo1.png">-->
    </a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right ">
	<li class="dropdown">
		<a class="dropdown-toggle top-left-links" data-toggle="dropdown" href="#">
			<i class="ti ti-bell fa-fw "></i> 
			<span class="badge badge-deeporange" id="topcounts"></span>
		</a>
		<ul class="dropdown-menu dropdown-alerts notification">
			<li>
				<a href="#" id="today_view">
					<div>
						<i class="fa fa-comment fa-fw today-task"></i> Today Task
						<span class="pull-right text-muted small today-task-span" id="today_task"></span>
					</div>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="#">
					<div>
						<i class="fa fa-twitter fa-fw new-task"></i> 3 New Tasks
						<span class="pull-right text-muted small new-task-span">12 minutes ago</span>
					</div>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="#">
					<div>
						<i class="fa fa-envelope fa-fw message"></i> Message
						<span class="pull-right text-muted small message-span">4 minutes ago</span>
					</div>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="#">
					<div>
						<i class="fa fa-tasks fa-fw cancel"></i> Cancelled New Task
						<span class="pull-right text-muted small cancel-span">4 minutes ago</span>
					</div>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="#">
					<div>
						<i class="fa fa-upload fa-fw reassigned"></i> Reassigned Task
						<span class="pull-right text-muted small reassigned-span">4 minutes ago</span>
					</div>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a class="text-center" href="#">
					<p>See All Alerts &nbsp;<i class="ti ti-arrow-circle-right fw"></i></p>
					
				</a>
			</li>
		</ul>
		<!-- /.dropdown-alerts -->
	</li>
	<li class="dropdown">
	
		<a class="dropdown-toggle header-dropdown-toggle top-left-links user-a" data-toggle="dropdown" href="#">
			<!--<i class="ti ti-user fa-fw"></i>--> 
			<img src="../dist/images/user/04.jpg" class='img-circle '  width="50" height="50" alt="User">
			
		</a>
		<ul class="dropdown-menu dropdown-user">
			<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
			</li>
			<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
			</li>
			<li class="divider"></li>
			<li><a href="auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
		</ul>
		<!-- /.dropdown-user -->
	</li>
	<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->



