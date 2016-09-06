<?php
require_once('../../../wp-load.php');

$current_user = wp_get_current_user();
if(!in_array( 'manager', (array) $current_user->roles )){
	echo 'forbidden';
  exit();
}

approve_user_description((int)$_POST['user_id']);
echo 'success';
?>
