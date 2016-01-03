<?php echo doctype("html5"); ?>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    	<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
    	
    	 <!-- jQuery -->
    	 <script type='text/javascript' src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.js"></script>
    	 
    	<!-- Twitter Bootstrap -->
    	<?php echo link_tag('vendor/bootstrap/dist/css/bootstrap.css'); ?>
   	<script type='text/javascript' src="<?php echo base_url(); ?>vendor/bootstrap/dist/js/bootstrap.js"></script>

   	
   		<!-- jQuery UI with Bootstrap theme -->
   		<script type='text/javascript' src="<?php echo base_url(); ?>vendor/jquery-ui/jquery-ui.js"></script>
		<script type='text/javascript' src="<?php echo base_url(); ?>vendor/jquery-ui/ui/i18n/datepicker-fi.js"></script>

   		
    	<?php echo link_tag('vendor/jquery-ui/themes/smoothness/jquery-ui.css'); ?>
    	<?php echo link_tag('vendor/jquery-ui-bootstrap/jquery.ui.theme.css'); ?>

    	 
    	 
        <?php echo link_tag('css/default.css'); ?>
        
        <title>Fiaca</title>
    </head>
    <body>
        