<?php
	require_once('../../../wp-load.php');

	if(add_event((int)$_POST['page_id'], $_POST['event'])){
		echo 'success';
	}
	else{
		echo 'forbidden';
	}
?>