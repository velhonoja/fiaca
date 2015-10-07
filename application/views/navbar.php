<!--

Navbar from bootstrap.

For howto use, see: 
http://getbootstrap.com/components/#navbar

-->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#foo" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>


<div class="collapse navbar-collapse" id="foo">

<ul class="nav nav-tabs">
		<li>
			<?php echo anchor("welcome", "Dashboard"); ?>
		</li>
		<li>
			<?php echo anchor("eventManager", "Manage events"); ?>
		</li>
		<li>
			<?php echo anchor("eventTypeManager", "Manage event types"); ?>
		</li>
		<li>
			<?php echo anchor("areaManager", "Manage areas"); ?>
		</li>
		<li>
			<?php echo anchor("UserManager", "Manage users"); ?>
		</li>
		
		
		<!-- doing nothing, just added because looks c00l.. -->
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
		
		
		<!-- doing nothing, just added because looks c00l.. -->
		<li class="dropdown pull-right">
			 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings or something?<strong class="caret"></strong></a>
			<ul class="dropdown-menu">
				<li>
					<a href="#">Action</a>
				</li>
				<li>
					<a href="#">Another action</a>
				</li>
				<li>
					<a href="#">Something else here</a>
				</li>
				<li class="divider">
				</li>
				<li>
					<a href="#">Separated link</a>
				</li>
			</ul>
		</li>
		
		
		
		
</ul>
    
    
    </div>

</nav>