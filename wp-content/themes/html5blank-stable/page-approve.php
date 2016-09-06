<?php
if(!in_array( 'manager', (array) $current_user->roles )){
	header('Location: '.get_site_url()); exit();
}
?>
<?php get_header(); ?>
<section class="container">
  <h1>Xét duyệt thành tích</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>MSSV</th>
        <th>Họ và tên</th>
        <th>Thành tích</th>
        <th>Duyệt</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $querystr = "select $wpdb->users.*
      FROM $wpdb->users
      inner join $wpdb->usermeta AS wm1 ON $wpdb->users.ID = wm1.user_id and wm1.meta_key = 'description'
      inner join $wpdb->usermeta AS wm2 ON $wpdb->users.ID = wm2.user_id and wm2.meta_key = 'self_description'
      where wm1.meta_value not like wm2.meta_value";

      $app_users = $wpdb->get_results($querystr, OBJECT);
      foreach($app_users as $app_user):
    ?>
    <tr>
      <td><?php echo $app_user->user_login ?></td>
      <td><?php echo esc_html( get_user_meta($app_user->ID, 'nickname', true) ); ?></td>
      <td><?php echo nl2br(esc_html( get_user_meta($app_user->ID, 'self_description', true) )); ?></td>
      <td><button class="btn btn-success btn_approve_description" data-user-id="<?php echo $app_user->ID ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>

<script>
$('body').on('click', '.btn_approve_description', function(e){
  $(this).attr("disabled", "true");
  var that = this;
  $.ajax({
    url     : "<?php echo get_template_directory_uri(); ?>/ajax-approve-user-description.php",
    type    : "POST",
    data    : {'user_id' : $(this).attr('data-user-id')}
  })
  .done(function(result){
    if(result == 'success'){
      $(that).closest('tr').fadeOut(150);
    }
    else{
      alert('You do not have permission to do that!');
      $(this).attr("disabled", "false");
    }
  })
  .fail(function(err){
    alert('An error has occured while processing the request: ' + err);
    $(this).attr("disabled", "false");
  });
});
</script>

<?php get_footer(); ?>
