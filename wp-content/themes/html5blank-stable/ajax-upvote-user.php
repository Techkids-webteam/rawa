<?php
	require_once('../../../wp-load.php');
	if(upvote_user((int)$_POST['user_id'])){
		echo 'success';
	}
	else{
		echo 'forbidden';
	}
?>
