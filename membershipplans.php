<!DOCTYPE HTML>
<html>
<?php
require_once('head.php');
?>
<style>
#chkplan{ display:none; }
</style>
<body>
<?php 
require_once('header.php');
//require_once('function.php');
$member_query = mysqli_query($conn, "select * from membership_plan where status='APPROVED'");
?>
  <!-- End Header-->
  <section class="membership_plans pt-3 pb-3 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <h2 class="text-center text-red">Membership Plans</h2>
          <p class="text-center">Select from our multiple membership plan and find your best life partner with
            membership benefits.</p>
          <div class="row">
		  <?php foreach($member_query as $member_result){ ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="grid-plan" onclick="getselected(<?php echo $member_result['plan_id']; ?>);">
                <div class="plan-header">
                  <i class="fa fa-certificate"></i>
                  <h4 class="mt-3">
                    <input type="radio" id="gt-plan-<?php echo $member_result['plan_id']; ?>" name="plan" class="Table_Details" onchange="getselected(<?php echo $member_result['plan_id']; ?>);">
                    <span class="gt-margin-left-10" id="planname<?php echo $member_result['plan_id']; ?>">
                      <?php echo $member_result['plan_name']; ?></span>
                  </h4>
                  <div class="gt-plan-price mt-4">
                    <h4 id="planamount<?php echo $member_result['plan_id']; ?>">
                      Rs. <?php echo $member_result['plan_amount']; ?> </h4>
                  </div>
                </div>
                <div class="well">
                  <div class="gt-plan-body">
                    <ul class="gt-plan-desc">
                      <li>
                        <h3>Duration</h3>
                        <h5 id="planduration<?php echo $member_result['plan_id']; ?>"><?php echo $member_result['plan_duration']; ?></h5>
                      </li>

                      <li>
                        <h3>Messages</h3>
                        <h5><?php echo $member_result['plan_msg']; ?></h5>
                      </li>
                      <li>
                        <h3>SMS</h3>
                        <h5><?php echo $member_result['plan_sms']; ?></h5>
                      </li>
                      <li>
                        <h3>Contact Views</h3>
                        <h5><?php echo $member_result['plan_contacts']; ?> </h5>
                      </li>
                      <li>
                        <h3>Live Chat</h3>
                        <h5><?php echo $member_result['chat']; ?> </h5>
                      </li>
                      <li>
                        <h3>Profile Views</h3>
                        <h5><?php echo $member_result['profile']; ?> </h5>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="gt-plan-footer hidden-xs hidden-sm hidden-md">
                  <i class="fa fa-shopping-cart gt-margin-right-10"></i> <?php if($member_result['plan_name']=='Free'){ echo "Contact to admin";} else { echo "Select";}?>
                </div>
              </div>
            </div>
		  <?php } ?>
          </div>
          <div class="row">
                <div class="gt-panel gt-Membership-plan mt-4 box" id="chkplan">
                    <div class="gt-panel-head gt-bg-green">You Have Selected</div>
                      <div class="gt-panel-body pt-4">
                        <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4>Plan Name</h4>
                                    <h5 class="gt-text-orange" id="dis_plan_name">Gold Membership </h5>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4>Duration</h4>
                                    <h5 class="gt-text-orange" id="dis_plan_duaration"> 60 Days </h5>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <h4 class="mt-4"> Total  Amount  :- <span class="textblue" id="dis_plan_amount"> Rs. 200 </span> </h4>
                                </div>
                            </div>
                            
                             <div class="row text-center">
                                 <a href="paymentOptions.php?pid=28" id="checkout" class="btn btn-blue">
                                    <i class="gi gi-cart gt-margin-right-10 font-12"></i>Checkout
                                </a>
                              </div>
                            
                          <div class="row text-right">
                              <div class="col-xs-16">
                                  <p>Including 14.5% Service Tax </p>
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
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
   <?php
require_once('footer.php');
?>
<script>
function getselected(planid){
			$('#chkplan').show();
			$('html, body').animate({scrollTop:$('.box').position().top}, 'slow');
				var planname=$('#planname'+planid).html();
				var planduration=$('#planduration'+planid).html();
				var planamount=$('#planamount'+planid).html();
			    var plantype=$('#plantype'+planid).html();
				$('#dis_plan_name').html('');
				$('#dis_plan_name').html(planname);
				$('#dis_plan_duaration').html('');
				$('#dis_plan_duaration').html(planduration);
				$('#dis_plan_amount').html('');
				$('#dis_plan_amount').html(planamount);
				$('#dis_plan_type').html('');
				$('#dis_plan_type').html(plantype);
				$('a#checkout').attr("href", 'paymentOptions.php?pid='+planid);
			}
</script>
</body>

</html>