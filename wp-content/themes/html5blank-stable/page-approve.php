<?php
if(in_array( 'manager', (array) $current_user->roles ) || in_array( 'admin', (array) $current_user->roles )){
	header('Location: /home'); exit();
}
?>
<?php get_header(); ?>
<?php
  $querystr = "
            SELECT $wpdb->users.*
            FROM $wpdb->users, $wpdb->usermeta
            WHERE $wpdb->users.ID = $wpdb->usermeta.user_id

            AND $wpdb->postmeta.meta_key = 'description'
            AND $wpdb->postmeta.meta_value = 'value2'
            AND $wpdb->postmeta.meta_value = 'value1'
            // why doesn't this work?


            AND $wpdb->posts.post_status = 'publish'
            AND $wpdb->posts.post_type = 'post'
            ORDER BY $wpdb->posts.post_date DESC
                ";
?>
<?php get_footer(); ?>
