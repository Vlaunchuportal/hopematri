<!DOCTYPE HTML>
<html>

<?php
require_once('head.php');
?>

<body>
  <?php
  require_once('header.php');
  require_once('auth.php');
  $current_status_query = mysqli_query($conn, "select photo_view_status,photo1 from gallery where matri_id='".$matri_id."'");
  $current_status_result = mysqli_fetch_array($current_status_query);
  ?>
  <?php if($current_status_result['photo_view_status'] == 2){echo'<style>#Paid_Members{display:none;}</style>'; $status_msg = "Visible To Paid Members"; } ?>
  <?php if($current_status_result['photo_view_status'] == 1){echo'<style>#All_Members{display:none;}</style>'; $status_msg = "Visible To All Members"; } ?>
  <?php if($current_status_result['photo_view_status'] == 0){echo'<style>#Hidden_All{display:none;}</style>'; $status_msg = "Hidden For All";} ?>
  <!-- End Header-->
  <section class="page-success pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <h2> All Settings </h2>
          <p>Here is all of your settings you can set your privacy as you want. </p>
          <div class="row mt-4">

            <div class="tabing_grid search_tabing">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link <?php if (isset($_GET['photoVisiblity'])) { echo "active"; } ?>" data-bs-toggle="tab" href="#home"><i class="fa fa-photo ">
                    </i> Photo Privacy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if (isset($_GET['blacklist'])) { echo "active"; } ?>" data-bs-toggle="tab" href="#menu1"><i class="fa fa-user-times "></i> Blacklist</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if (isset($_GET['contactview'])) { echo "active"; } ?>" data-bs-toggle="tab" href="#menu2"> <i class="fa fa-phone ">
                    </i> Contact show setting</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if (isset($_GET['changepass'])) { echo "active"; } ?>" data-bs-toggle="tab" href="#menu3"><i class="fa fa-cog">
                    </i> Change Password</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane <?php if (isset($_GET['photoVisiblity'])) { echo "active"; } else { echo "fade"; } ?> ps-4"><br>
                  <h3>Photo Privacy Setting</h3>
				<?php //if(!empty($photo1)){ ?>
				<p class="bd-b">You can set you photo privacy from here,so can manage who can see your photos. </p>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-row mt-3">
                        <label>Current Status : </label>
                        <p style="color:#a94442;"><i class="fa fa-eye me-2" aria-hidden="true"></i> <span class="status_msg"><?php echo $status_msg;?></span>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12"> 
                      <div class="form-row mt-3">
                        <a class="btn btn-primary" href="#"><i class="fa fa-pencil me-2" aria-hidden="true"> </i>Edit</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-row mt-3">
                    <a class="btn btn-blue current_status" id="Paid_Members" href="javascript:void(0);" data-id="<?php echo $Hmatri_id; ?>" data-value="2" ><i class="fa fa-eye me-2" aria-hidden="true"> </i>Visible To Paid Members</a>
				   
                    <a class="btn btn-blue current_status" id="All_Members" href="javascript:void(0);" data-id="<?php echo $Hmatri_id; ?>" data-value="1"><i class="fa fa-eye me-2" aria-hidden="true"> </i>Visible To All Members</a>
					
                    <a class="btn btn-blue ms-2 mob_btn-sp current_status" id="Hidden_All" href="javascript:void(0);" data-id="<?php echo $Hmatri_id; ?>" data-value="0"> <i class="fa fa-eye-slash me-2"> </i>Hidden For All </a>
                  </div>
                  <div class="form-row mt-3">
                    <a class="btn btn-primary" href="javascript:void(0);" id="change_password_head"> Change Password for protect photo</a>
                    <span>or</span>
                    <a class="btn btn-primary ms-2 mob_btn-sp" id="removePassword" href="javascript:void(0);"> Remove Password from protect photo</a>
                  </div>
                  <form id="set_password_form">
                    <div class="set_photo_grid">
                      <div class="form-row mt-3">
                        <input type="text" class="form-control" placeholder="Set Password Photo" id="set_password_input" name="password">
                        <span id="error_set_password_input"></span>
                      </div>
                      <div class="form-row mt-3">
                        <input type="submit" name="set_photo_pass" id="set_photo_pass_btn" value="Submit" class="btn btn-blue">
                      </div>
                    </div>
                  </form>
				<?php /*}else{ echo'<p class="bd-b">You can set Photos. <a href="/my-photo.php">Click here</a> </p>';} */?>
                </div>
                <div id="menu1" class="container tab-pane <?php if (isset($_GET['blacklist'])) {echo "active";} else {echo "fade";} ?> ps-4"><br>
                  <h3>Blocked Members List</h3>
                  <p class="bd-b">You can see all blocked members list here and you also can block directly from here. </p>
                  <form>
                    <div class="set_photo_grid">
                      <div class="form-row mt-3 row_block">
                        <label>Enter User Id Or Email Id</label>
                        <input type="text" class="form-control" placeholder="Enter User ID or Email Id">
                        <span class="block-btn">
                          <button class="btn btn-primary" type="submit" name="block_sub" value="block_sub">
                            <i class="fa fa-user-times me-2">
                            </i>Block
                          </button>
                        </span>
                      </div>
                    </div>
                    <div class="form-row mt-2">
                      <p style="font-size: 18px; font-weight: 500;">No Data Available </p>
                    </div>
                  </form>
                </div>
                <div id="menu2" class="container tab-pane <?php if (isset($_GET['contactview'])) { echo "active"; } else { echo "fade"; } ?> ps-4"><br>
                  <h3>Contact show setting</h3>
                  <p class="bd-b">Contact show setting option gives you access to set privacy for your contact detail. </p>
                  <form>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-row mt-3">
                          <label>Current Status : </label>
                          <p style="color:#a94442;"><i class="fa fa-eye me-2"></i> Show To Express Interest Accepted Paid Member</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-row mt-3">
                          <a class="btn btn-primary" href="#"><i class="fa fa-pencil me-2"> </i>Edit</a>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mt-3">
                      <a class="btn btn-blue" href="#"><i class="fa fa-eye me-2"> </i>Show To Express Interest Accepted Paid Member</a>
                      <a class="btn btn-blue ms-2 mob_btn-sp" href="#"><i class="fa fa-eye me-2"> </i> Show To Paid Members</a>
                    </div>
                  </form>
                </div>
                <div id="menu3" class="container tab-pane <?php if (isset($_GET['changepass'])) { echo "active"; } else { echo "fade"; } ?> ps-4 change_pass"><br>
                  <h3>Change Password </h3>
                  <p class="bd-b">Have any privacy concern ? You can easily change your accoupt password from here. </p>
                  <form id="change_pass" name="change_pass">
                    <div class="set_photo_grid">
                      <div class="form-row mt-3">
                        <label>Enter Old Password</label>
                        <input type="hidden" name="matri_id" class="form-control" value="<?php echo $_SESSION['matri_id']; ?>">
                        <input type="password" name="opassword" class="form-control" required>
                      </div>
                      <div class="form-row mt-3">
                        <label>Enter New Password</label>
                        <input type="password" name="npassword" class="form-control" id="npassword" required>
                      </div>
                      <div class="form-row mt-3">
                        <label>Confirm New Password</label>
                        <input type="password" name="cpassword" class="form-control" data-rule-equalTo="#npassword" required>
                      </div>
                      <div class="form-row mt-3">
                        <input type="submit" value="Save Changes" name="pass_change" class="btn btn-blue pass_change">
                      </div>
                    </div>
                  </form>
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

  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <!-- Start Footer-->
  <?php require_once('footer.php'); ?>
  <script>
    $(document).ready(function() {
      $('.pass_change').click(function(e) {
        e.preventDefault();
        var form = $("#change_pass");
        if (form.valid() === true) {
          $.ajax({
            type: 'GET',
            url: 'ajax_files/pass_change.php',
            data: $('#change_pass').serialize(),
            cache: false,
            success: function(response) {
              console.log(response);
              alert(response);
            }
          });
        }
      });
    });

    /************************Start Set Password***************************/
    var valid = false;

    function check_set_password_input() {
      var set_password_input = jQuery("#set_password_input").val();
      if (set_password_input.trim() == "") {
        jQuery("#error_set_password_input").html("<b class='text-danger'>This field is required.</b>");
        valid = false;
      } else {
        jQuery("#error_set_password_input").html("");
        valid = true;
      }
    }

    jQuery("#set_password_input").on("keyup", function() {
      check_set_password_input();
    });

    $('#set_photo_pass_btn').click(function(e) {
      e.preventDefault();
      check_set_password_input();
      if (valid == true) {
        $.ajax({
          method: 'post',
          url: 'my_account/profile_password/update.php',
          data: $('#set_password_form').serialize() + "&action=" + "updatePassword",
          success: function(response) {
            $('#set_password_form')[0].reset();
            alert(response);
          }
        });
      }
    });

    $('#removePassword').click(function(e) {
      $.ajax({
        method: 'post',
        url: 'my_account/profile_password/update.php',
        data: "action=" + "removePassword",
        success: function(response) {
          alert(response);
        }
      });
    });

    $('#change_password_head').click(function(e) {
      $("#set_password_form").stop().slideToggle("slow");
    });
    /************************End Set Password***************************/
	
	 $('.current_status').click(function(e) {
      e.preventDefault();
	  var current_status = $(this).attr("data-value");
	  var matri_id = $(this).attr("data-id");
        $.ajax({
          method: 'post',
          url: 'ajax_files/current_status.php',
          data: {current_status:current_status,matri_id:matri_id},
          success: function(response) {
            console.log(response);
			if(response==1){
				if(current_status == 0){
					$('.status_msg').text('Hidden For All');
					$('#Hidden_All').hide();
					$('#All_Members').show();
					$('#Paid_Members').show();
				}
				if(current_status == 1){
					$('.status_msg').text('Visible To All Members');
					$('#All_Members').hide();
					$('#Hidden_All').show();
					$('#Paid_Members').show();
				}
				if(current_status == 2){
					$('.status_msg').text('Visible To Paid Members');
					$('#Paid_Members').hide();
					$('#Hidden_All').show();
					$('#All_Members').show();
				}
			}
            //alert(response);
          }
        });
    });
	/************************End Current photo Status***************************/
  </script>
</body>

</html>