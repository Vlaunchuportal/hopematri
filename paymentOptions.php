<!DOCTYPE html>
<html lang="en">
<?php 
  include_once 'dataconnection.php';
require_once('head.php');
$user_id = $_SESSION['user_id']; 
$matri_id = $_SESSION['matri_id']; 
?>
<style>
input#payButton {
    color: #fff;
    background-color: #de1c51;
    padding: 8px 10px;
    font-size: 16px;
    font-weight: 600;
    -ms-touch-action: manipulation;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    border: 1px solid transparent;
    border-radius: 4px;
    width: 100%;
}
</style>
  <body>
  <?php require_once('header.php'); 
  $plan_id = $_GET['pid'];
	/////////////////////////////////////////////////////////////////////////
	//////////////////////////// payment_method /////////////////////////////
	$razorpay_query = mysqli_query($conn, "select * from payment_method where pay_id='2'");
	$razorpay_result = mysqli_fetch_array($razorpay_query);
	
	/////////////////////////////////////////////////////////////////////////
	//////////////////////////// membership_plan /////////////////////////////
	$membership_query = mysqli_query($conn, "select * from membership_plan where plan_id='$plan_id'");
	$membership_result = mysqli_fetch_array($membership_query);
	
	/////////////////////////////////////////////////////////////////////////
	//////////////////////////// register /////////////////////////////
	$register_query = mysqli_query($conn, "select contact_no,email_id from register_new where matri_id='$matri_id'");
	$register_result = mysqli_fetch_array($register_query);

  ?>
    <!-- ICON LOADER END-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
				<h2 class="gt-text-orange text-center gt-margin-top-20">Payment Options</h2>
					<p class="text-center">Pay fast and securly with our multiple payment option.</p>
					<h4 class="pay_option">Select your payment options to pay</h4>	
                    
						<label for="gt-plan-5" class="col-lg-12 col-sm-12 gt-payment-opt">
                        <div class="row d-flex align-items-center justify-content-center">
							<div class="col-lg-9 col-sm-12">
								<h4>Pay using razorpay</h4>
								<p>
									Plan: 
                  					<span class="gt-text-orange">
                    					<?php echo $membership_result['plan_name']; ?>
                  					</span> , Amount: 
                  					<span class="gt-text-orange">
                    					<?php echo $membership_result['plan_amount']; ?>
                  					</span>
                				</p>
							</div>
							<div class="col-lg-3 col-sm-12">
							
								<form method="POST">
								<input type="submit" id="payButton" value="PAY NOW">
								</form>
							</div>
                            </div>
						</label>	
						<label for="gt-plan-5" class="col-lg-12 col-sm-12 gt-payment-opt">
							<div class="">
								<h4>Pay at Office</h4>
								<p class="gt-margin-top-20">
								  Bank Name :
								  <span class="gt-text-orange">
									<?php echo $razorpay_result['bank_name'];?>
								  </span>
								</p>
								<p>
								  Bank Account Type :
								  <span class="gt-text-orange">
									<?php echo $razorpay_result['bank_account_type'];?>
								  </span>
								</p>
								<p>
								  Bank Account Name :
								  <span class="gt-text-orange">
									<?php echo $razorpay_result['bank_account_name'];?>
								  </span>
								</p>
								<p>
								  Bank Account No :
								  <span class="gt-text-orange">
									<?php echo $razorpay_result['bank_account_no'];?>
								  </span>
								</p>
								<p>
								  Bank IFSC Code :
								  <span class="gt-text-orange">
									<?php echo $razorpay_result['bank_ifsc'];?>
								  </span>
								</p>
							</div>
						</label>
					  </div>
				  </div>
			  </div>


  <!-- Start Footer-->

	<script src="js-new/jquery.min.js"></script> 
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <script>
 
	$(document).ready(function() {
	
	$("#payButton").click(function(e) {
		e.preventDefault();
		var getAmount = "<?php echo ($membership_result['plan_amount']*100); ?>";
		var product_id =  "<?php echo $membership_result['plan_id'];?>";
		var product_name =  "<?php echo $membership_result['plan_name'];?>";
		var useremail =  "<?php echo $register_result['email_id']; ?>";
		var days =  "<?php echo $membership_result['plan_duration']; ?>";
		var plan_type =  "<?php echo $membership_result['plan_type']; ?>";
		
		var totalAmount = getAmount;
		
		var options = {
					"key": "rzp_test_kK17sPWJJVONaw", // your Razorpay Key Id
					"amount": totalAmount,
					"name": "Welcome to Hopematri.com",
					"description": product_name,
					"image": "img-new/logo.png",
					"handler": function (response){
					$.ajax({
							url: 'paymentConfirmation.php',
							type: 'post',
							//dataType: 'json',
							data: {
									razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id ,useremail : useremail, days:days, plan_type:plan_type,
								  }, 
							success: function (data) 
							{
								//window.location.href = 'success.php/?productCode='+ data.productCode +'&payId='+ data.paymentID +'&userEmail='+ data.userEmail +'';
							}
					     });
					},
					"theme": {
					"color": "#e47203"
							}
					};
 
		var rzp1 = new Razorpay(options);
		rzp1.open();
		//e.preventDefault();
});
 
});
</script>
  <?php require_once('footer.php'); ?>
</body>

</html>                                                                                                                             