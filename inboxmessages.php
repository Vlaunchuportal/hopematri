<!DOCTYPE HTML>
<html>
<?php 
require_once('head.php');
?>

<body>
<?php
require_once('header.php'); 
require_once('auth.php');
$religion = $_SESSION['religion'];
/* $read = $_GET['read'];
$_GET['read'] = 'unread';
if($_GET['read'] == 'read'){
	$msg_status = "and status = 0";
}
if($_GET['read'] == 'unread'){
	$msg_status = "and status = 1";
} */
	$messages_query = mysqli_query($conn, "select * from messages where msg_id IN (SELECT max(msg_id) as msg_id FROM messages where outgoing_msg_id ='".$matri_id."' GROUP BY incoming_msg_id HAVING COUNT(incoming_msg_id) > 1)");
	
?>
<link href='https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- End Header-->
<section class="my-profile pt-3 p-5 ">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        <div class="profile_head">
          <h2 class="text-red">Message - Inbox</h2>
          <p>You can see all of your inbox messages here.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
          <div class="panel-grid">
            <ul>
              <li class="text-center bg-red list-title"><i class="fa fa-envelope "></i> Send Message</li>
              <li><a href="#">Inbox <span class="badge"><?php echo mysqli_num_rows($messages_query); ?></span></a></li>
              <li><a href="#">Important <span class="badge"> <?php foreach($messages_query as $count1){ if($count1['msg_imp_status']=='yes'){ echo count($count1['msg_imp_status']); } } ?></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-7 col-sm-12 mt-2">
          <div class="inbox_head">
            <div class="row">
              <div class="col-lg-6 col-sm-12">
                <!--div class="grid_inbox">
                  <input type="checkbox" class="all_mark">
                </div-->
                <!--div class="grid_inbox">
                  <ul>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> Select <i class="fa fa-angle-down ms-1"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Read</a></li>
                        <li><a class="dropdown-item" href="#">Unreaded</a></li>
                        <li><a class="dropdown-item" href="#">All</a></li>
                      </ul>
                    </li>
                  </ul>
                </div-->
                <div class="grid_inbox">
                  <ul>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> Action <i class="fa fa-angle-down ms-1"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item Important" href="javascript:void(0)">Mark As Important</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)">Delete</a></li>
                      </ul>
                    </li>
                  </ul>
                </div
            >
              </div>
              <!--div class="col-lg-6 col-sm-12">
                <div class="inbox_head_right">
                  <!--div class="input-group">
                    <input type="text" class="gt-form-control flat search" placeholder="Search Message By Matri Id">
                    <span class="input-group-btn">
                    <button class="btn btn-default gt-btn-lg flat" type="button"><i class="fa fa-search"></i></button>
                    </span> </div>
                </div>
              </div-->
            </div>
          </div>
          <div class="inbox_body inbox_body_table">
            <div class="table-responsive">
              <table id="aero" class="table_inbox display table table-striped table-bordered  nowrap ui celled responsive page_table" style=" ">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?php 
				if($messages_query){
				foreach($messages_query as $messages){
					$query = register_details($religion, $messages['incoming_msg_id'], $gender);
					$result = mysqli_fetch_array($query);				
				?>
                  <tr>
                    <td><input type="checkbox" name="mark[]" class="mark" value="<?php echo $messages['msg_id'];?>">
                      <span class="imp_msg" data-msgid="<?php echo $messages['msg_id'];?>"><i class="fa fa-star <?php if($messages['msg_imp_status'] == 'yes'){ echo'gt-text-blue '; }?>ms-2"></i></span></td>
                    <td class="start_chat" data-id="<?php echo $messages['incoming_msg_id'];?>" data-name="<?php echo $result['username'];?> (<?php echo $messages['incoming_msg_id'];?>)"><?php echo $messages['incoming_msg_id'];?></td>
                    <td class="start_chat" data-id="<?php echo $messages['incoming_msg_id'];?>" data-name="<?php echo $result['username'];?> (<?php echo $messages['incoming_msg_id'];?>)" style="text-align:right"><?php echo $messages['timestamp'];?></td>
                  </tr>
				<?php } } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Start Footer--> 
<script src="js-new/jquery.min.js"></script> 
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <?php require_once('footer.php'); ?>
  <script>
  $(document).ready(function(){
	  $('#aero').DataTable({
			language: { searchPlaceholder: "Search Matri Id" }
		});
		
		$('.Important').click(function(){
        var val = [];
        $('.mark:checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
		// var important = $('.mark:checked').map(function() {return this.value;}).get().join(',');
		// console.log(important);
		 $.ajax({
          type: 'POST',
		  dataType: "json",
          url: 'ajax_files/imp_msg1.php',
          data: {msgid:val},
          cache: false,
          success: function(response) {
				alert("Your messages important action complete successfully.");
				location.reload();
			}
        });
      });
		
	 $('.imp_msg').click(function() {
		 let el = this;
        var msgid = $(this).attr('data-msgid');
       $.ajax({
          type: 'POST',
          url: 'ajax_files/imp_msg.php',
          data: {msgid:msgid},
          cache: false,
          success: function(response) {
            console.log(response);
			if(response == 1){
				console.log('yes');
				alert("Your messages important action complete successfully.");
				$(el).children('i').addClass("gt-text-blue");
			}else{
				console.log('no');
				alert("Your messages important action complete successfully.");
				$(el).children('i').removeClass("gt-text-blue");
			}
          }
        });
      }); 
  });
  </script>
</body>
</html>