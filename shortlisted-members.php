<!DOCTYPE HTML>
<html>
<?php require_once('head.php'); ?>
<body>
<?php 
require_once('header.php'); 
require_once('auth.php');

$religion = $_SESSION['religion'];

$sql = "select * from register_new where matri_id IN (select to_id from shortlist where from_id ='".$matri_id."') and gender='$gender' and religion ='".$religion."' ORDER BY CASE WHEN sportlight = 'yes' THEN 0 WHEN sportlight = 'no' THEN 1 ELSE 2 END";
$query1 = mysqli_query($conn, $sql);

$per_page =10;//define how many games for a page
$count = mysqli_num_rows($query1);
$pages = ceil($count/$per_page);
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start    = ($page - 1) * $per_page;
$sql     = $sql." LIMIT $start,$per_page";
$query2 = mysqli_query($conn,$sql);
?>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <div class="profile_head">
            <h2 class="text-red">Shortlisted Member Profile </h2>
            <p>You can check all of your shortlisted members list here. </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
			<?php include('sidebar.php'); ?>
          </div>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2 pagin_res">
            <div class="alert alert-info alert-warning" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
			  <article>
				<h4 class=""> <i class="fa fa-star gt-text-blue gt-margin-right-10"> </i>Spotlight Profile</h4>
				<p>Blue color profile is are spotlight profile which was showing top of the search result.Its gives 10 times faster results.</p> 
				<p><strong style="color:#ff0000"><?php echo $count; ?></strong> Profiles found</p>
				<!--a data-bs-toggle="modal" data-bs-target="#exampleModal"class="btn btn-blue"> Add To Saved Search </a--> </article>
			</div>
			<?php 
			if($count>0){
				 foreach($query2 as $register_details) {
					 if($register_details['sportlight']=='yes'){$sportlight = 'activ_user';}else{$sportlight = '';}
						$shortlist_query = shortlist($matri_id, $register_details['matri_id']); 
						$block_query = block($matri_id, $register_details['matri_id']);
						$exp_query = mysqli_query($conn, "select * from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$register_details['matri_id']."'");
					
						require('search_data.php');
				} 
			} else { ?>
				<div class="no-data">
				  <img src="images/nodata-available.jpg " alt="#">
				</div>
			<?php } ?>
			<?php if (ceil($count / $per_page) > 0): ?>
			<?php require('pagination.php'); ?>
			<?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
require_once('send_interest_modal.php');
?>
  <!-- Start Footer-->
  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <?php 
  require_once('footer.php'); 
  require_once('events.php'); 
  ?>
<script>
$('.pagin_res').on('click', '.page-numbers', function() {
	var page = $(this).attr('data-page');
	 window.location.href = '?page='+page;
});
</script>
</body>

</html>