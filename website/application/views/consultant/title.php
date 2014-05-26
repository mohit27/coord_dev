	<!-- Title and login section -->
	<div>
		<div style="list-style-type:none;float:right">
			<a href="#" style="border-left-width:0;padding-left:8px;padding-right:8px;"><?php echo $user['firstname']." ".$user['surname']; ?></a>|
			<a href="/" style="border-left-width:0;padding-left:8px;padding-right:8px;">Logout</a>
<!--
			|
			<a href="#" style="border-left-width:0;padding-left:8px;padding-right:8px;">Help</a></li>
-->
		</div>
		<h2>COORD Personal Assistant</h2>
	</div>

	<!-- Navigation section -->
    <div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="/consultant/home">Dashboard</a></li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacts <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/consultant/clients?group=All&content=All">All</a></li>
								<li><a href="/consultant/clients?group=Clients&content=All">Clients</a></li>
								<li><a href="/consultant/clients?group=Consultants&content=All">Consultants</a></li>
							</ul>
						</li>
<!-- TODO: Stock Control
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">All</a></li>
								<li><a href="#">Sachets</a></li>
								<li><a href="#">Cartons</a></li>
								<li><a href="#">Meals</a></li>
							</ul>
						</li>
-->		  
<!-- TODO: Accounts
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">All</a></li>
								<li><a href="#">Sales</a></li>
								<li><a href="#">Purchases</a></li>
							</ul>
						</li>
-->
<!-- TODO: Appointments
						<li class="active"><a href="#">Appointments</a></li>
-->						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/consultant/settings">General Settings</a></li>
							</ul>
						</li>
		
					</ul>
				</div>
			</div>
		</div>
    </div>

