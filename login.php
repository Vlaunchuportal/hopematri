<!DOCTYPE HTML>
<html>

<?php 
require_once('head.php');
?>

<body>
<?php require_once('header.php'); 
if(isset($_SESSION['username']) || (trim($_SESSION['user_id']) != ''))
	 {
               echo "<script>window.location='myhome.php'</script>";
     }
?>
  <!-- End Header-->
<section class=" pt-5 pb-5 ">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
<div class="login-box">
<h2 class="text-center">LOGIN</h2>
<p class="text-center">And search your life partner</p>
<form method="post" name="login_form" id="login_form">
  <div class="form-row">
    <label>User Id / Email Id</label>
    <input type="text" name="email" class="form-control" placeholder="Enter Your Email Id" required>
  </div>
  <div class="form-row mt-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
  </div>
  <div class="form-row form-sm remember_text mt-3">
    <input class="form-check-input" type="checkbox" value="">
    <label class="form-check-label">Keep me logged in</label>
  </div>
  <div class="form-row form-sm forgot_text mt-3">
   <a href="#">Forgot Password ?</a>
  </div>
  <div class="form-row mt-3">
    <button type="submit" class="btn btn-blue" id="login"> Login </button>
  </div>
  <div class="form-row mt-3">
    <button type="submit" class="btn btn-primary"> Resend Email Verification </button>
  </div>
</form>
</div>
</div>

</div>

</div>

</section>
 
  <!-- Start Footer-->

<script src="js-new/jquery.min.js"></script> 
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <script>
 $(document).ready(function(){
    // Submit form data via Ajax
    $("#login").click(function(e){
        e.preventDefault();
		console.log($('#login_form').serialize());
        $.ajax({
            type: 'GET',
            url: 'ajax_files/login.php',
            data: $('#login_form').serialize(),
            cache: false,
            success: function(response){
				console.log(response);
				 if(response=='correct'){
					window.location.href = "/myhome.php";
				}else{
					alert(response);
				}
            }
        });
    });
});
  </script>
 <?php require_once('footer.php'); ?>
</body>

</html>