<!DOCTYPE HTML>

<html>
<?php
require_once('head.php');
?>
<body>
  <?php
  
  require_once('header.php');
  //require_once('function.php');
  $end = date('Y', strtotime('-12 years'));
  
	$freligion_query = mysqli_query($conn, "select religion_id from religion");
	$Featured = array();
	foreach($freligion_query as $freligion_result){
		$fregister_query = mysqli_query($conn, "select distinct religion, username, matri_id from register_new where religion = '".$freligion_result['religion_id']."'");
		$fregister_result = mysqli_fetch_assoc($fregister_query);
		if(!empty($fregister_result)){
			$fbasic_query = mysqli_query($conn, "select user_id from basic_details where user_id = (select user_id from physical_attributes where user_id = (select user_id from religion_information where user_id = (select user_id from education_profession_information where user_id = (select user_id from about_me where user_id = (select user_id from family_details where user_id = (select user_id from comm_specific_req where user_id = (select user_id from habits_and_hobbies where user_id = (select user_id from pr_basic_pref where user_id = (select user_id from pr_education where user_id = (select user_id from pr_location where user_id = (select user_id from pr_spiritual where user_id = '".$fregister_result['matri_id']."')))))))))))");
			$Featured[] = mysqli_fetch_assoc($fbasic_query);
		}
	}
	$Featured = array_filter($Featured);
	$banner_lists = mysqli_query($conn, "select banner from banner where religion='".$banner_religion."' and status='Approved'");
  ?>
  <div id="carouselExampleSlidesOnly" class="carousel slide <?php if (isset($_SESSION['username'])) {echo 'indexSlider'; } ?>" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="row d-flex ">
        <div class="<?php if ($_SESSION['username'] == '') { echo 'col-lg-8 col-md-12'; } else { echo 'col-lg-12 col-md-12'; } ?> col-sm-12 slidr_inner">
		 <?php
		 $isFirst = true;
		 if($banner_lists){
			 foreach($banner_lists as $banner_list){ ?>        
				 <div class="carousel-item <?php if($isFirst=='true'){ echo 'active';}?>"> <img src="<?php echo'img/banners/'.$banner_list['banner'];?>" class="d-block w-100" alt="#"> </div>
			 <?php $isFirst = false; }
		 }else{ ?>
			<div class="carousel-item active"> <img src="images/banner-1.jpg" class="d-block w-100" alt="#"> </div>
			<div class="carousel-item"> <img src="images/banner-2.jpg" class="d-block w-100" alt="#"> </div>
			<div class="carousel-item"> <img src="images/banner-3.jpg" class="d-block w-100" alt="#"> </div>
		 <?php } ?>
          <ul class="caption_text">
            <li><a class="me-4" href="#"><i class="fa fa-check-square-o"></i> 100% Verified Profiles</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Best Matching Profiles</a></li>
          </ul>
        </div>
        <?php if ($_SESSION['username'] == '') { ?>
          <div class="col-lg-4 banner_form_wrap col-md-12 col-sm-12">
            <div class="form_grid">
              <div class="form_head"><i class="fa fa-pencil"></i> REGISTER NOW</div>
              <div class="form_wrap">
                <form method="post" name="register" id="register">
                  <div class="form-row mb-2"> <span><i class="fa fa-envelope fa-fw"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email id" required>
                  </div>
                  <div class="form-row mb-2"> <span><i class="fa fa-key"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required>
                  </div>
                  <div class="form-row mb-2"> <span><i class="fa fa-key"></i></span>
                    <input type="password" name="cpassword" class="form-control" data-rule-equalTo="#password" placeholder="Enter Your Confirm Password" required>
                  </div>
                  <div class="form-row mb-2 form-sm"> <span><i class="fa fa-users fa-fw"></i></span>
                    <select class="form-select" name="profile" required>
                      <option value="">Profile Created By</option>
                      <option value="Self">Self</option>
                      <option value="Parents">Parents</option>
                      <option value="Guardian">Guardian</option>
                      <option value="Friends">Friends</option>
                      <option value="Sibling">Sibling</option>
                      <option value="Relatives">Relatives</option>
                    </select>
                  </div>
                  <div class="form-row mb-2 l-row form-sm"> <span><i class="fa fa-intersex"></i></span>
                    <select class="form-select" name="gender" required>
                      <option value="">Select Gender</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                    </select>
                  </div>
                  <div class="form-row mb-2 form-sm"> <span><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-row mb-2 l-row form-sm  "> <span><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-row mb-2 form-sm form-xs day_sl"> <span><i class="fa fa-calendar fa-fw"></i></span>
                    <select class="form-select" name="day" required>
                      <option value="">Day</option>
                      <?php foreach(range(01, 31) as $day){ ?> 
                      <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
					  <?php } ?>
                    </select>
                  </div>
                  <div class="form-row mb-2 form-sm no-icon form-xs">
                    <select name="month" class="form-select" required>
                      <option value="">Month</option>
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                  </div>
                  <div class="form-row mb-2 form-sm form-xs no-icon year_sl">
                    <select name="year" class="form-select" required>
                      <option value="">Year</option>
                      <?php
                      for ($x = $end; $x >= 1924; $x--) { ?>
                        <option value='<?php echo $x; ?>'> <?php echo $x; ?></option>
                      <?php }  ?>
                    </select>
                  </div>
                  <div class="form-row mb-2"> <span><i class="fa fa-book fa-fw"></i></span>
                    <select name="religion" class="form-select" required>
                      <option value="">Select Your Religion</option>
                      <?php
                      foreach (religion() as $religions) {
                        echo '<option value="' . $religions['religion_id'] . '">' . $religions['religion_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-row mb-2  form-sm"> <span><i class="fa fa-globe fa-fw"></i></span>
                    <select name="mother_tongue" class="form-select" required>
                      <option value="">Mother Tongue</option>
                      <?php
                      foreach (mothertongue() as $mothertongue) {
                        echo '<option value="' . $mothertongue['mtongue_id'] . '">' . $mothertongue['mtongue_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-row mb-2 l-row form-sm"> <span><i class="fa fa-globe fa-fw"></i></span>
                    <select name="country" class="form-select" id="country" required>
                      <option value="">Country</option>
                      <?php
                      foreach (country() as $countries) {
                        echo '<option value="' . $countries['country_id'] . '">' . $countries['country_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-row mb-2  form-sm"> <span><i class="fa fa-globe fa-fw"></i></span>
                    <select name="state" class="form-select state" required>
                      <option value="">State</option>
                    </select>
                  </div>
                  <div class="form-row mb-2 l-row form-sm"> <span><i class="fa fa-globe fa-fw"></i></span>
                    <select name="city" class="form-select city" required>
                      <option value="">City</option>
                    </select>
                  </div>
                  <div class="form-row mb-2 no-icon form_select">
                    <select name="height" class="form-select" required>
                      <option value="">Select height</option>
                      <?php
                      foreach (height() as $key => $data) {
                        echo '<option value="' . $key . '">' . $data . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-row mb-2  form-sm  row_phone "> <span><i class="fa fa-phone fa-fw"></i></span>
				 
                    <select name="number_code" class="form-select" required>
					<?php foreach(countryCode1() as $mobile_code1){ ?>
						<option value="<?php echo $mobile_code1; ?>" <?php if($mobile_code1=='+91'){ echo'selected';}?>><?php echo $mobile_code1; ?></option>
					<?php } ?>
                    </select>
                  </div>
                  <div class="form-row mb-2 l-row form-sm no-icon row_number">
                    <input name="mobile" type="number" class="form-control" placeholder="Enter Your 10 Digit No" required>
                  </div>
                  <div class="form-row mb-3 remember_text">
                    <input class="form-check-input" name="accept" type="checkbox" value="yes" required>
                    <label class="form-check-label">I accept <a href="/terms-and-conditions" target="_blank">terms &amp; conditions</a> and <a href="/privacy-policy" target="_blank">privacy policy</a></label>
                  </div>
                  <div class="form-row mb-2 text-center">
                    <button type="submit" class="btn btn-blue" name="reg_sub" id="reg_sub"><i class="fa fa-pencil hidden-sm hidden-xs"></i> Register Now </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- End Banner-->

  <section class="sec_welcome pt-5 text-center">
    <div class="container">
      <div class="row">
        <H2 class="textblue">Welcome to Hopematri.com</H2>
        <p class="text-Grey indexContent mb-0">Best matrimony service provider in India.We find the best perfect life

          partner for you.join us now and <br>
          find your life partner from our thousand’s of verified profiles.</p>
        <div class="gt-hearts">
          <div class="gt-hearts-group"> <i class="fa fa-heart font-20 heart gt-text-orange"></i> <i class="fa fa-heart font-38 heart gt-text-orange"></i> <i class="fa fa-heart font-20 heart gt-text-orange"></i> </div>
        </div>
        <div class="row mt-1">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="welcom_box"> <i class="fa fa-star index-color-1 gt-index-icon-font mb-2"></i>
              <h2 class="fs-4 gt-font-weight-600 mb-2">Success Story</h2>
              <p>Hundred's of successful member found their soulmates with us.</p>
              <a class="gt-text-Grey gt-font-weight-500" href="#">View Success Stories <i class="fa fa-caret-right gt-margin-left-10"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="welcom_box"> <i class="fa fa-users index-color-2 gt-index-icon-font mb-2"></i>
              <h2 class="fs-4 gt-font-weight-600 mb-2">Verified Members</h2>
              <p>Thousands of verified member profile so our members find perfect partner without any concern.</p>
              <a class="gt-text-Grey gt-font-weight-500" href="#">View Profiles Now <i class="fa fa-caret-right gt-margin-left-10"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="welcom_box"> <i class="fa fa-search index-color-1 gt-index-icon-font mb-2"></i>
              <h2 class="fs-4 gt-font-weight-600 mb-2">Search Options</h2>
              <p>Multiple search options to find partner who know you better.</p>
              <a class="gt-text-Grey gt-font-weight-500" href="#">Search Now <i class="fa fa-caret-right gt-margin-left-10"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="welcom_box"> <i class="fa fa-list-ol index-color-2 gt-index-icon-font mb-2"></i>
              <h2 class="fs-4 gt-font-weight-600 mb-2">Matching Profiles</h2>
              <p>With our auto match profile you can see members which was suits you best and get married.</p>
              <a class="gt-text-Grey gt-font-weight-500" href="#">View Matches Now <i class="fa fa-caret-right gt-margin-left-10"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- End Welcome Section-->

  <section class="featured-grooms p-5 bg-lgtGrey mt-5 text-center section-text">
    <div class="container">
      <div class="row">
        <h2>Featured Grooms </h2>
        <p>This is our featured grooms section you can contact register and contact them now.</p>
        <div class="gt-hearts">
          <div class="gt-hearts-group"> <i class="fa fa-heart font-20 heart heart_blue"></i> <i class="fa fa-heart font-38 heart heart_blue"></i> <i class="fa fa-heart font-20 heart heart_blue"></i> </div>
        </div>
      </div>
	  <?php if(!empty($Featured)){ ?>
      <div class="owl-carousel owl-theme">
	  <?php 
		foreach($Featured as $featured1){ 
			$fregister_query1 = mysqli_query($conn, "select * from register_new where matri_id = '".$featured1['user_id']."'");
			$fregister_result1 = mysqli_fetch_assoc($fregister_query1);
	  ?>
        <div class="item featured_info"> 
			<!--a href="#"-->
				<div class="thumb_img mb-3">
					<!--<a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $fregister_result1['matri_id'], $fregister_result1['gender']); ?></a>-->
					<a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $fregister_result1['matri_id'], $fregister_result1['gender']); ?></a>
				</div>
				<h4><a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><?php echo $fregister_result1['username']; ?> </a></h4>
				<p><?php echo short_age($fregister_result1['dob']); ?> Years, <?php echo height_calculate($fregister_result1['height']); ?></p>
				<p><?php echo location_details($fregister_result1['country'], $fregister_result1['city']); ?></p>
				<a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><span class="gt-btn-round "> <b>View Profile</b> <i class="fa fa-angle-right"></i> </span></a>
				<?php if ($_SESSION['username'] != '') { ?>
				<div class="social_link_featured">
					  <?php 
					  $fb_url = $url.'/facebook.php?post_id=HM2';
					  $red_uri = $url.'/facebook.php';
					  echo '<a target="_blank" href="http://www.facebook.com/dialog/send?app_id=2381077941906210&amp;link='.$fb_url.'&amp;redirect_uri='.$url.'"><?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
						<svg width="50px" height="50px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="24" cy="24" r="20" fill="#3B5998"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M29.315 16.9578C28.6917 16.8331 27.8498 16.74 27.3204 16.74C25.8867 16.74 25.7936 17.3633 25.7936 18.3607V20.1361H29.3774L29.065 23.8137H25.7936V35H21.3063V23.8137H19V20.1361H21.3063V17.8613C21.3063 14.7453 22.7708 13 26.4477 13C27.7252 13 28.6602 13.187 29.8753 13.4363L29.315 16.9578Z" fill="white"/>
						</svg></a>'; ?>
				</div>
				<?php } ?>

			<!--/a--> 
		</div>
	  <?php } ?>
      </div>
	  <?php }else{ ?>
        <div class="data_item">
            <img src="images/nodata-available.jpg" alt="#">
        </div>
	 <?php } ?>
    </div>
  </section>

  <!-- Start Footer-->


  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/owl.carousel.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <?php
  require_once('footer.php');
  ?>
  <script>
    $(document).ready(function(e) {
      // Submit form data via Ajax
      $("#reg_sub").click(function(e) {
        e.preventDefault();
        var form = $("#register");
        if (form.valid() === true) {
          $.ajax({
            type: 'GET',
            url: 'register.php',
            data: $('#register').serialize(),
            cache: false,
            success: function(response) {
             alert(response);
			 location.reload();
			 // console.log(response);
            }
          });
        }
      });

      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          600: {
            items: 3,
            nav: false
          },
          1000: {
            items: 5,
            nav: false,
            loop: false,
            margin: 20
          }
        }
      });

      $('#country').change(function() {
        var country = $('#country option:selected').val();
        $.ajax({
          type: 'GET',
          url: 'ajax_files/state.php',
          data: { country: country },
          cache: false,
          success: function(response) {
            //console.log(response);
            $('.state').find('option').remove().end().append(response);
          }
        });
      });

      $('.state').change(function() {
        var state = $('.state option:selected').val();
        $.ajax({
          type: 'GET',
          url: 'ajax_files/city.php',
          data: { state: state},
          cache: false,
          success: function(response) {
           // console.log(response);
            $('.city').find('option').remove().end().append(response);
          }
        });
      });
    });
  </script>
 
</body>

</html>