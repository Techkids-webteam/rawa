<?php
if(!in_array( 'manager', (array) $current_user->roles )){
	header('Location: '.get_site_url()); exit();
}
?>
<?php get_header(); ?>
<section class="container" style="margin-top: 20px;">
  <div class="row">
  <div class="col-xs-12 approve-page-wrapper" >
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Danh sách sự kiện</a></li>
    <li role="presentation"><a href="#user_list" aria-controls="profile" role="tab" data-toggle="tab">Danh sách sinh viên chờ xét duyệt</a></li>
    <li role="presentation"><a href="#user_approved" aria-controls="profile" role="tab" data-toggle="tab">Danh sách sinh viên đã duyệt</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="events">
            <form id="add_form">
              <div class="form-group clearfix" style="margin-top: 20px;">
                <label for="event" class="col-md-3 col-sm-4 control-label">Tên sự kiện - giải thưởng</label>
                <div class="col-md-9 col-sm-8">
                  <input type="text" class="form-control" name="event" id="event" required>
                </div>
              </div>
              <p class="form-group col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-4">
                  <input type="submit" class="btn btn-primary" value="Thêm" name="add" id="add_more"  />
              </p>
              <div class="row">
                <div class="col-xs-12">
                  <div class="page-heading">
                    <h1>Danh sách sự kiện - giải thưởng</h1>
                  </div>
                  <table  class="table table-striped" id="list_event">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tên Sự kiện - Giải thưởng</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $id = get_the_ID();
                      $events = get_post_meta($id, 'events', true);
                      if($events)
                      foreach ($events as $event) {
                        echo "<tr><td></td><td>{$event}</td><td><button type='button' class='btn btn-danger btn-delete-event' data-event ='{$event}'>Xóa</button></td></tr>";
                      }
                    ?>
                    </tbody>
                  </table>
                 </div>

              </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="user_list">
      <div class="row">
        <div class="col-md-12">
          <h1>Xét duyệt thành tích</h1>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>MSSV</th>
                <th>Họ và tên</th>
                <th>Thành tích</th>
                <th>Duyệt</th>
                <th>Hủy</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $args = array(
                'role__not_in' => array('Pending'),
                'meta_key' => 'need_approval',
                'meta_value' => true
              );
              $app_users = get_users( $args );
              // $querystr = "select $wpdb->users.*
              // FROM $wpdb->users
              // inner join $wpdb->usermeta AS wm1 ON $wpdb->users.ID = wm1.user_id and wm1.meta_key = 'description'
              // inner join $wpdb->usermeta AS wm2 ON $wpdb->users.ID = wm2.user_id and wm2.meta_key = 'self_description'
              // where wm1.meta_value not like wm2.meta_value";
              //
              // $app_users = $wpdb->get_results($querystr, OBJECT);
              foreach($app_users as $app_user):
            ?>
            <tr>
              <td><?php echo $app_user->user_login; ?></td>
              <td><?php echo esc_html( get_user_meta($app_user->ID, 'nickname', true) ); ?></td>
              <td>
              <?php 
                $awards = get_user_meta($app_user->ID, 'awards', true);
                if($awards) foreach ($awards as $award) {
                  echo $award;
                  echo "<br>";
                }

              ?>
                
              </td>
              <td class="approve_button_container"><button class="btn btn-success btn_approve_description" data-user-id="<?php echo $app_user->ID ?>"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
              <td><button class="btn btn-danger btn_approve_cancel" data-user-id="<?php echo $app_user->ID ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="user_approved">
      <div class="row">
        <div class="col-md-12">
          <h1>Đã duyệt</h1>
          <table class="table table-striped" id="approved_table">
            <thead>
              <tr>
                <th>MSSV</th>
                <th>Họ và tên</th>
                <th>Thành tích</th>
                <th>Hủy</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $args = array(
                'role__not_in' => array('Pending'),
                'meta_key' => 'approved',
                'meta_value' => true
              );
              $app_users = get_users( $args );
              // $querystr = "select $wpdb->users.*
              // FROM $wpdb->users
              // inner join $wpdb->usermeta AS wm1 ON $wpdb->users.ID = wm1.user_id and wm1.meta_key = 'description'
              // inner join $wpdb->usermeta AS wm2 ON $wpdb->users.ID = wm2.user_id and wm2.meta_key = 'self_description'
              // where wm1.meta_value not like wm2.meta_value";
              //
              // $app_users = $wpdb->get_results($querystr, OBJECT);
              foreach($app_users as $app_user):
            ?>
            <tr>
              <td><?php echo $app_user->user_login; ?></td>
              <td><?php echo esc_html( get_user_meta($app_user->ID, 'nickname', true) ); ?></td>
              <td>
                
              <?php 
                $awards = get_user_meta($app_user->ID, 'awards', true);
                if($awards) foreach ($awards as $award) {
                  echo $award;
                  echo "<br>";
                }

              ?>
              </td>
              <td><button class="btn btn-danger btn_approve_cancel" data-user-id="<?php echo $app_user->ID ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
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
      $(that).closest('tr').detach().appendTo('#approved_table tbody').find("td.approve_button_container").remove();
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

$('body').on('click', '.btn_approve_cancel', function(){
  var that = this;
  $.ajax({
    url     : "<?php echo get_template_directory_uri(); ?>/ajax-remove-user-approve.php",
    type    : "POST",
    data    : {'user_id' : $(this).attr('data-user-id')}
  })
  .done(function(result){
    if(result == 'success'){
      $(that).closest('tr').detach()
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
 
})


$('body').on('submit', '#add_form', function (e) {
    e.preventDefault();
    var text = $('#event').val();
    $.ajax({
      url     : "<?php echo get_template_directory_uri(); ?>/ajax-add-event.php",
      type    : "POST",
      data    : {
                  'page_id' : <?php the_ID();?>,
                  'event'   : $('#event').val()  
                }

    })
    .done(function(res){
      console.log(res);
      if(res == 'success'){
        $('#event').val('');
        $('#list_event').append('<tr><td></td><td>' + text + '</td><td><button type="button" class="btn btn-danger">Xóa</button></td></tr>');
      }
    })
    .fail(function(err){
      console.log(err);
    })
    
})

$('body').on('click', '.btn-delete-event', function(){
  var that = this;
    $.ajax({
      url     : "<?php echo get_template_directory_uri(); ?>/ajax-delete-event.php",
      type    : "POST",
      data    : {
                  'page_id' : <?php the_ID();?>,
                  'event'   : $(this).attr('data-event')  
                }

    })
    .done(function(res){
      if(res === 'success' ){
        $(that).closest('tr').detach();
      }
    })
    .fail(function(err) {
        console.log(err)
    })
  
})

</script>

<?php get_footer(); ?>
