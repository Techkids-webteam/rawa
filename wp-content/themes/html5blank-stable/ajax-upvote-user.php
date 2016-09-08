<?php
	require_once('../../../wp-load.php');

	$current_user = wp_get_current_user();
	if(  !in_array( 'administrator', (array) $current_user->roles )){
		echo 'forbidden';
	  exit();
	}
	upvote_user((int)$_POST['user_id']);
	echo 'success';
?>