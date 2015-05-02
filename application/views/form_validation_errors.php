<?php

$errors = validation_errors(); 

if( $errors ){
	echo '<div class="alert alert-danger" role="alert">'.$errors.'</div>';
}


