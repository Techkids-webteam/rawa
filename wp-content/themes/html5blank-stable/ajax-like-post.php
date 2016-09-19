<?php
	require_once('../../../wp-load.php');
	if(like_post((int)$_POST['post_id'])){
		echo 'success';
	}
	else{
		echo 'forbidden';
	}
?>
