<!--

Navbar from bootstrap.

For howto use, see: 
http://getbootstrap.com/components/#navbar

-->

<ul class="nav nav-tabs">
		<li>
			<?php echo anchor("welcome", "Dashboard"); ?>
		</li>
		<li>
			<?php echo anchor("eventTypeManager", "Manage event types"); ?>
		</li>
		<li>
			<a href="#">Manage areas</a>
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