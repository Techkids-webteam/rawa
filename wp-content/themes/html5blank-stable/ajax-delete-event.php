<?php
	require_once('../../../wp-load.php');

	if(delete_event((int)$_POST['page_id'], $_POST['event'])){
		echo 'success';
	}
	else{
		echo 'forbidden';
	}
?>