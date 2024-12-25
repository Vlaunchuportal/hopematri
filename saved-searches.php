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
$search = mysqli_query($conn, "select * from save_search where matri_id = '".$Hmatri_id."'");

?>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div class="">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <div class="profile_head">
            <h2 class="text-red">My Profile </h2>
            <p>This is your all profile detail which you added.You can view your all details and also can edit all your
              detail from here. </p>
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
            <div class="thumb_img">
              <?php echo  $profile_pic = profile_pic(1, $matri_id, $gender); ?>
              <a href="/view-profile.php" class="edit_img"><i class="fa fa-camera gt-margin-right-10"></i> Edit Profile Picture </a>
            </div>
            <div class="panel-grid">
              <ul>
                <li><a href="/inboxmessages.php"><i class="fa fa-paper-plane gt-margin-right-10"></i> Send Message </a></li>
                <li><a href="/my-photo.php"><i class="fa fa-picture-o gt-margin-right-10"></i> View Photoes </a></li>
              </ul>

            </div>
            <div class="panel-grid">
              <ul>
                <li class="text-center bg-red list-title"><i class="fa fa-envelope gt-margin-right-10"></i> MESSAGES
                </li>
                <li><a href="inboxmessages.php">Inbox <!--span class="badge"> 3</span--></a></li>
                <li><a href="inboxmessages.php">Sent <!--span class="badge"> 0</span--></a></li>
              </ul>

            </div>

            <div class="panel-grid">
              <ul>
                <li class="text-center bg-red list-title"> <i class="fa fa-star gt-margin-right-10"></i> Interest</li>
                <li><a href="exp-interest.php"> Received </a></li>
                <li><a href="exp-interest.php"> Sent </a></li>
              </ul>

            </div>
            <div class="panel-grid">
              <ul>
                <li class="text-center bg-red list-title"> <i class="fa fa-picture-o gt-margin-right-10"></i> Photo
                  Request </li>
                <li><a href="photo-request.php"> Received </a></li>
                <li><a href="photo-request.php"> Sent </a></li>
              </ul>

            </div>
          </div>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">
            <div class="alert alert-info" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fa fa-times-circle"></i>
              </button>
              <article>
                Edit your profile detail is very easy just click on the left pencil button ( <i
                  class="fa fa-pencil-square gt-margin-left-5 gt-margin-right-5 font-18"></i> ) on detail panel and here
                we go you can edit your profile detail and you can also edit your profile photo from here.
              </article>
            </div>
			<?php if(mysqli_num_rows($search) > 0){ ?>
            <div class="recent_log_actvity">
              <div class="row">
			  <?php foreach($search as $search_result){ ?>
                <div class=" col-lg-6 col-ms-6 col-sm-12">
                  <div class="recent_login">
                    <div class="user_info save_search">
                      <h3><?php echo $search_result['ss_name']; ?> <a class="item_delete" data-id="<?php echo $search_result['ss_id']; ?>" href="javascript:void(1);"><i class="fa fa-trash"></i></a></h3>
                      <p><i class="fa fa-calendar gt-margin-right-5"></i><?php echo $search_result['save_date']; ?> </p>
                     <a href="javascript:void(1);" data-id="<?php echo $search_result['ss_id']; ?>" class="btn btn-primary ">Search</a>
                    </div>
                  </div>
                </div>
			  <?php } ?>
              </div>
            </div>
			<?php }else{ ?>
            <div class="no-data">
              <img src="images/nodata-available.jpg " alt="#">
            </div>
			<?php } ?>
          </div>
    </div>

  </section>

  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <!-- Start Footer-->
  <?php require_once('footer.php'); ?>
  <script>
  $(document).ready(function(){
	  $('.item_delete').click(function(){
		 var id = $(this).attr('data-id');
			$.ajax({
          type: 'POST',
          url: 'ajax_files/delete_search.php',
          data : {id:id},
          cache: false,
          success: function(response) {
            console.log(response);
				alert("delete successfully");
				location.reload();
          }
        });
	  });
  });
  </script>
  
</body>

</html>