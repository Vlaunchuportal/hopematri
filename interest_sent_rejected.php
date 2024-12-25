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
$exp_send_query = mysqli_query($conn,"select * from expressinterest WHERE sender_id = '".$matri_id."' and receiver_response = 'Reject'");
?>
<style>
    .but_accepted_wrap {display: flex; align-items: center; justify-content: space-between; }

                                  .gt-exp-main .gt-exp-strip {
                                    padding: 10px 14px;
                                    background: #EFEFEF;
                                    width: 100%;
                                    border-radius: 3px;
                                    border: 1px solid #E0E0E0;
                                    box-shadow: 0px 2px 1px 0px #BFBFBF;
                                    margin-bottom: 15px;
                                    display: flex;
                                    align-items: center;
                                  }

                                  .gt-exp-main a.gt-text-green:hover,
                                  .gt-exp-main a.gt-text-green:focus {
                                    color: #336601;
                                  }

                                  .deletewrap_bottom {
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                  }

                                  .gt-exp-main a.gt-text-green {
                                    color: #632d8b;
                                  }

                                  a.gt-text-black h4 {
                                    font-size: 18px;
                                  }

                                  .right_user_dis .gt-margin-top-10 {
                                    font-weight: 600;
                                    font-size: 15px;
                                  }

    .gt-text-orange { color: #de1c51; font-size: 14px;}

                                  .btn {
                                    display: inline-block;
                                    padding: 6px 12px;
                                    margin-bottom: 0;
                                    font-size: 14px;
                                    font-weight: normal;
                                    line-height: 1.42857143;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    -ms-touch-action: manipulation;
                                    touch-action: manipulation;
                                    cursor: pointer;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    background-image: none;
                                    border: 1px solid transparent;
                                    border-radius: 4px;
                                  }

    .gt-interest-rec img {max-height: 130px; width: 100%;}

    .gt-interest-rec { background: #FBFBFB; width: 100%; float: left; border-radius: 3px; border: 1px solid #E0E0E0; box-shadow: 0px 2px 1px 0px #BFBFBF; padding: 10px 18px; margin-bottom: 15px; }

    .gt-margin-right-10 { margin-right: 10px; }

    .outgoing .details p { background: #333; color: #fff; border-radius: 18px 18px 0 18px; }
                                </style>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="row">
          <div class="d-flex align-items-start grid-exp-interest">
			<?php require_once('exp-sidebar.php'); ?>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Sent Rejected</h2>
                  <p>Here you can see your all express interest which you send and rejcted by members.</p>
                </div> 
                <div class="exp_tabing">
                <div class="tab-content" id="pills-tabContent">
					<?php if(mysqli_num_rows($exp_send_query)) { ?>
					<!--div class="gt-exp-strip gt-margin-top-15 tab_head">
                            <label class="col-lg-1 col-xs-2" for="exp-rec-all-1">
								<input type="checkbox" name="select_all_send">
                            </label>
                            <div class="col-lg-3 col-md-5 col-xs-6">
                                <a class="btn btn-danger gt-cursor" id="mul_del"><i class="fa fa-trash gt-margin-right-10"></i>Delete</a>
                            </div>
                    </div-->
					<?php foreach($exp_send_query as $exp_send_result){ 
						$query = register_details($religion, $exp_send_result['receiver_id'], $gender);
						$register_details = mysqli_fetch_array($query);
					?>
					<div class="no-data1 mt-3">
                              <div class="gt-interest-rec send_tab" id="<?php echo $exp_send_result["id"]; ?>">
                                <!--div class="col-xxl-16 col-xl-16 col-sm-16 col-md-16 col-lg-16 hidden-xs hidden-sm hidden-md">
                                  <div class="row">
                                    <label class="col-lg-8 col-md-16 col-xxl-16 col-xl-8 col-xs-16 col-sm-16 gt-margin-bottom-0">
                                      <input type="checkbox" name="single_check_send[]" class="single_check_send" value="<?php echo $exp_send_result["id"]; ?>">
                                    </label>
                                  </div>
                                </div-->
                                <div class="user_img_expwrap row">
                                  <div class="user_img_exp col-lg-2">
                                    <a href="/member-profile.php?id=<?php echo $exp_send_result['receiver_id']; ?>">
                                      <?php  echo $profile_pic = profile_pic(1, $exp_send_result['receiver_id'], $gender); ?>
                                    </a>
                                  </div>
                                  <div class="right_user_dis col-lg-10">
                                    <div class="row">
                                      <div class="col-lg-6 text-center">
                                        <a href="/member-profile.php?id=<?php echo $exp_send_result['receiver_id']; ?>" class="gt-text-black">
                                          <h4 class=""><?php echo $register_details['username'].' ('.$register_details['matri_id'].')'; ?></h4>
                                        </a>
                                      </div>
                                      <div class="col-lg-6 text-center">
                                        <label class="gt-margin-top-10"><?php echo $exp_send_result['sent_date']; ?></label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xxl-16 mt-3 col-xl-16 col-md-16 col-lg-16 col-sm-16">
                                        <h5 class="gt-text-orange">
                                          <i class="fa fa-paper-plane gt-margin-right-10"></i> Express Interest Sent
                                        </h5>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-xxl-16 col-xl-16 col-md-16 col-lg-16 col-sm-16">
                                        <p class="gt-margin-top-0"><?php echo $exp_send_result['message']; ?></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-xxl-16 col-lg-16 col-xs-16 col-sm-16 col-md-16">
                                  <div class="deletewrap_bottom">
                                    <div class="text-center gt-margin-top-10">
                                      <a class="btn gt-text-green send_msg start_chat" data-id="<?php echo $exp_send_result['receiver_id']; ?>" data-name="<?php echo $register_details['username'].' ('.$register_details['matri_id'].')'; ?>"><i class="fa fa-envelope gt-margin-right-10"></i> Send Message</a>
                                    </div>
                                    <div class="col-lg-4 pull-right but_accepted_wrap gt-margin-top-10">
									  <a href="javascript:void(0);" class="gt-text-green"><i class="fa fa-bell gt-margin-right-10"></i>Reminder</a>
                                      <a href="javascript:void(0);" class="btn btn-danger gt-cursor single_deltet_send" data-id="<?php echo $exp_send_result["id"]; ?>">
                                        <i class="fa fa-trash gt-margin-right-10"></i>Delete
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
					<?php } }else{ ?>
                    <div class="no-data mt-3">
                      <img src="images/nodata-available.jpg " alt="#">
                    </div>
					<?php } ?>
                </div>
              </div>
              </div>
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
  <?php require_once('footer.php'); ?>
 <script>
	$(document).ready(function(){
		
		$('.single_deltet_send').click(function(){
			var id  = $(this).attr('data-id');
				$.ajax({
					type: 'POST',
					url: 'ajax_files/Expinterest_delete.php',
					data: {id:id},
					cache: false,
					success: function(response) {
						alert("delete successfully");
						location.reload();
					}
				});
		});
		
		
		$('.single_accept_send').click(function(){
			var id  = $(this).attr('data-id');
			var senderID  = $(this).attr('data-senderID');
			var name  = $(this).attr('data-name');
			var email  = $(this).attr('data-email');
			var action  = 'Accept';
				$.ajax({
					type: 'POST',
					url: 'ajax_files/Expinterest_action.php',
					data: {id:id, action:action, name:name, email:email, senderID:senderID},
					cache: false,
					success: function(response) {
						alert("Accepted successfully");
						location.reload();
					}
				});
		});
		
		$('.single_decline_send').click(function(){
			var id  = $(this).attr('data-id');
			var senderID  = $(this).attr('data-senderID');
			var name  = $(this).attr('data-name');
			var email  = $(this).attr('data-email');
			var action  = 'Reject';
				$.ajax({
					type: 'POST',
					url: 'ajax_files/Expinterest_action.php',
					data: {id:id, action:action, name:name, email:email, senderID:senderID},
					cache: false,
					success: function(response) {
						alert("Rejected successfully");
						location.reload();
					}
				});
		});
	});		
  </script>
</body>

</html>
