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
$today_date= date('Y-m-d');

$sql = "select * from register_new where matri_id IN (select matri_id from payment_new where expiry_date >= '".$today_date."') and gender='$gender' and religion ='".$religion."' ORDER BY CASE WHEN sportlight = 'yes' THEN 0 WHEN sportlight = 'no' THEN 1 ELSE 2 END";
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
      <div class="">
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
            <div class="panel-grid one_way">
              <?php require_once("sidebar1.php"); ?>
            </div>
              <div class="grid_spotlight">
                <div class="spot-head">
                      <i class="fa fa-star gt-margin-right-10"></i>Spotlight Profile
                </div>
                <div class="spot-body">
                  No Data
                </div>
              </div>
          </div>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2 pagin_res">
            <div class="profile_head">
              <h2 class="text-red">Preferred Match </h2>
              <p>Preferred match is the profile show in perticular criteria at its best.its help you to find out your life partner easily.</p>
            </div>
			<div class="alert alert-info alert-warning" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
				<article>
					<h4 class=""> <i class="fa fa-star gt-text-blue gt-margin-right-10"> </i>Spotlight Profile</h4>
					<p>Blue color profile is are spotlight profile which was showing top of the search result.Its gives 10 times faster results.</p> 
					<p><strong style="color:#ff0000"><?php echo $count; ?></strong> Profiles found</p>
				</article>
			</div>
			<?php if($count > 0){
					foreach($query2 as $register_details) {
						if($register_details['sportlight']=='yes'){$sportlight = 'activ_user';}else{$sportlight = '';}
						$shortlist_query = shortlist($matri_id, $register_details['matri_id']); 
						$block_query = block($matri_id, $register_details['matri_id']);
						$exp_query = mysqli_query($conn, "select * from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$register_details['matri_id']."'");
			?>
			<div class="search_data">
            <div class="search_result_head <?php echo $sportlight; ?>">
              <a href="member-profile.php?id=<?php echo $register_details['matri_id']; ?>"><div class="row d-flex">
                <div class="col-lg-6 col-sm-12">
                  <h3><?php echo $register_details['f_name'].' '.$register_details['l_name']; ?> ( <?php echo $register_details['matri_id']; ?> )</h3>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <p> Register On: <?php echo $register_details['reg_date']; ?></p>
                </div>
              </div></a>
            </div>
            <div class="search_result_body">
              <a href="member-profile.php?id=<?php echo $register_details['matri_id']; ?>"><div class="row d-flex">
                <div class="col-lg-2 col-sm-12">
                  <div class="thumbnail gt-margin-bottom-0"> 
				  <?php echo $profile_pic = profile_pic(1, $register_details['matri_id'], $gender); ?>
				  <!--img src="./images/male.png" class="img-responsive gtFullWidth"--> 
				  </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                  <div class="search_result_list">
                    <ul>
                      <li>
                        <label>Age :</label>
                        <span><?php echo full_age($register_details['dob']); ?></span> </li>
                      <li>
                        <label>Religion :</label>
                        <span><?php echo religion_name($register_details['religion'])['religion_name']; ?></span> </li>
                      <li>
                        <label>Location :</label>
                        <span><?php echo location_details($register_details['country'], $register_details['city']); ?></span> </li>
                      <li>
                        <label>Mother Tongue :</label>
                        <span><?php echo mothertongue1($register_details['mother_tongue'])['mtongue_name']; ?></span> </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                  <div class="search_result_list">
                    <ul>
                      <li>
                        <label>Height :</label>
                        <span><?php echo height_calculate($register_details['height']); ?></span> </li>
                      <li>
                        <label>Caste :</label>
						<?php $religion_query = religion_query($register_details['matri_id'])['caste']; ?>
                        <span><?php echo caste1($religion_query)['caste_name']; ?></span> </li>
                      <li>
                        <label>Education :</label>
						<?php $education_query = education_query($register_details['matri_id'])['highest_edu']; ?>
                        <span><?php echo education1($education_query)['edu_name']; ?></span> </li>
                      <li>
                        <label>Occupation :</label>
						<?php $occupation_query = education_query($register_details['matri_id'])['occupation']; ?>
                        <span><?php echo occupation1($occupation_query)['ocp_name']; ?></span> </li>
                    </ul>
                  </div>
                </div>
              </div></a>
            </div>
            <div class="search_result_footer">
              <div class="row d-flex">
                <div class="col-lg-4 col-sm-12"> <a class="result_btn-w start_chat" href="javascript:void(0);" data-id="<?php echo $register_details['matri_id']; ?>" data-name="<?php echo $register_details['username'] . ' (' . $register_details['matri_id'].')'; ?>"> <i class="fa fa-envelope me-1"> </i> Send Message</a> </div>
                <div class="col-lg-8 col-sm-12 but_accepted_wrap"> 
					<?php foreach($exp_query as $exp_result){
						if($exp_result['receiver_response'] == 'Accept'){ ?>
						<a href="javascript:void(0);" class="result_btn-r"> Interest Accepted</a>
						<?php } else if($exp_result['receiver_response'] == 'Pending'){ ?>
							<a href="javascript:void(0);" class="result_btn-r btn-reminder btn gt-text-green" data-id="<?php echo $exp_result["id"]; ?>"><i class="fa fa-bell gt-margin-right-10"></i>Reminder</a>
						<?php }else{ ?>
							<a href="javascript:void(0);" class="result_btn-r interrest" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_details['matri_id']; ?>"> <i class="fa fa-heart-o me-1"> </i>Send Interest</a>
					<?php } } ?> 
					<a href="javascript:void(0);" class="result_btn-w blocklist" id="blocklist<?php echo $register_details['matri_id']; ?>" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_details['matri_id']; ?>"> <i class="fa fa-ban me-1"> </i><?php if(mysqli_num_rows($block_query) == 0){ echo"Add to Blocklist"; }else{ echo"Remove Blocklist"; } ?></a>
					<a href="javascript:void(0);" class="result_btn-w shortlist" id="shortlist<?php echo $register_details['matri_id']; ?>" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_details['matri_id']; ?>"> <i class="fa fa-sort me-1"> </i><?php if(mysqli_num_rows($shortlist_query) == 0){ echo"Add to Shortlist"; }else{ echo"Remove Shortlist"; } ?></a>
				</div>
              </div>
            </div>
          </div>
			<?php 
			}}else{ ?>
				<div class="no-data">
              <img src="images/nodata-available.jpg " alt="#">
            </div>
			<?php } ?>
			<?php if (ceil($count / $per_page) > 0): ?>
			<?php require('pagination.php'); ?>
			<?php endif; ?>
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