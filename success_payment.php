<!DOCTYPE html>
<html lang="en">
<?php 
  include_once 'dataconnection.php';
require_once('head.php');
$user_id = $_SESSION['user_id']; 
$matri_id = $_SESSION['matri_id']; 
?>
  <body>
  <?php require_once('header.php'); ?>
    <!-- ICON LOADER END-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                	<div class="alert alert-success clearfix" role="alert">
                        <h2 class="text-center">Congratulations !</h2>
                        <h5 class="text-center">
                            you are our paid member now you can access our paid membership benifits now.
                        </h5>
                        <div class="col-xxl-16 col-xl-16 text-center gt-margin-top-20 gt-margin-bottom-20">
                            <a href="myHome.php" class="btn gt-btn-green gt-btn-xxl">
                                Go To Home
                            </a>
                        </div>    
                    </div>
                    <div class="col-xxl-12 col-xxl-offset-2 col-xl-12 col-xl-offset-2 col-xs-16 well well-sm flat">
                        <div class="col-xxl-8 col-xl-8">
                            <h3 class="gt-text-orange">Your Selected Plan</h3>
                            <h4><?php echo $getnew_data->p_plan;?></h4>
                        </div>
                        <div class="col-xxl-8 col-xl-8">
                            <h3 class="gt-text-orange">Duration</h3>
                            <h4><?php echo $getnew_data->plan_duration.' Days';?></h4>
                        </div>
                    </div>
    			</div>	
			</div>
		<div>
	</div>


  <!-- Start Footer-->

	<script src="js-new/jquery.min.js"></script> 
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <?php require_once('footer.php'); ?>
</body>

</html>                                                                                                                             