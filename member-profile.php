<!DOCTYPE HTML>
<html>
<?php
require_once('head.php');
?>

<body>
  <?php
  require_once('header.php');
  require_once('auth.php');
  //require_once('function.php');
  $member_id =  $_GET['id'];
  $basic_query = basic_query($member_id);
  $physical_query = physical_query($member_id);
  $religion_query = religion_query($member_id);
  $education_query = education_query($member_id);
  $mothertongue_result = mothertongue1($basic_query['mother_tongue']);
  $basic_details = basic_details($member_id);
  $about_result = about($member_id);
  $family_query = family_query($member_id);
  $community_query = community_query($member_id);
  $habits_query = habits_query($member_id);

  $pr_basic_query = mysqli_query($conn, "select * from pr_basic_pref where user_id='" . $matri_id . "'");
  $pr_basic_result = mysqli_fetch_array($pr_basic_query);

  $pr_education_query = mysqli_query($conn, "select * from pr_education where user_id='" . $matri_id . "'");
  $pr_education_result = mysqli_fetch_array($pr_education_query);

  $pr_location_query = mysqli_query($conn, "select * from pr_location where user_id='" . $matri_id . "'");
  $pr_location_result = mysqli_fetch_array($pr_location_query);

  $pr_spiritual_query = mysqli_query($conn, "select * from pr_spiritual where user_id='" . $matri_id . "'");
  $pr_spiritual_result = mysqli_fetch_array($pr_spiritual_query);

  $date = date('d-F-Y g:i a');
  $nameOfDay = date('l', strtotime($date));


  $i = 0;
  $pheight = $age = $marital_status_val = $mother_tongue_val = $habits_val = $smoke_var = $drink_var = $phy_var = $edu_val = $income_val = $emp_in_val = $occup_val = $rel_var = $caste_val = $country_val = $state_val = $city_val = $moonsign_val = $star_val = '';
  
  if ($basic_query['height'] >= $pr_basic_result['height'] && $basic_query['height'] <= $pr_basic_result['to_height']) {
    $i++;
    $pheight = 1;
  }

  if ($basic_query['age'] >= $pr_basic_result['age'] && $basic_query['age'] <= $pr_basic_result['to_age']) {
    $i++;
    $age = 1;
  }

  $marital_status = explode(", ", $pr_basic_result['marrital_status']);
  if (in_array($basic_details['marital_status'], $marital_status)) {
    $i++;
    $marital_status_val = 1;
  }
  
   $mother_tongue = explode(", ", $pr_spiritual_result['mother_tongue']);
  if (in_array($basic_query['mother_tongue'], $mother_tongue)) {
    $i++;
    $mother_tongue_val = 1;
  }

$part_diet = explode(", ", $pr_basic_result['eating_habits']);
if (in_array($habits_query['diet_Habits'], $part_diet)) {
    $i++;
    $habits_val = 1;
  }

if($habits_query['smoke_habits']== $pr_basic_result['smoking_habits']){
	$i++;
    $smoke_var = 1;
}

if($habits_query['drinking_habits']== $pr_basic_result['drink_habits']){
	$i++;
    $drink_var = 1;
}

if($physical_query['physicalStatus']== $pr_basic_result['physical_status']){
	$i++;
    $phy_var = 1;
}

$part_edu = explode(", ", $pr_education_result['education']);
if (in_array($education_query['highest_edu'], $part_edu)) {
    $i++;
    $edu_val = 1;
}

$part_income = explode(", ", $pr_education_result['annual_income']);
if (in_array($education_query['annual_income'], $part_income)) {
    $i++;
    $income_val = 1;
}

$part_emp_in = explode(", ", $pr_education_result['employed_in']);
if (in_array($education_query['employed_in'], $part_income)) {
    $i++;
    $emp_in_val = 1;
}

$part_occup = explode(", ", $pr_education_result['occupation']);
if (in_array($education_query['occupation'], $part_occup)) {
    $i++;
    $occup_val = 1;
}

if($basic_query['religion'] == $pr_spiritual_result['religion']){
	$i++;
    $rel_var = 1;
}

$part_caste = explode(", ", $pr_spiritual_result['caste']);
if (in_array($religion_query['caste'], $part_caste)) {
    $i++;
    $caste_val = 1;
}

$part_country = explode(", ", $pr_location_result['country']);
if (in_array($basic_query['country'], $part_country)) {
    $i++;
    $country_val = 1;
}

$part_state = explode(", ", $pr_location_result['state']);
if (in_array($basic_query['state'], $part_state)) {
    $i++;
    $state_val = 1;
}

$part_city = explode(", ", $pr_location_result['city']);
if (in_array($basic_query['city'], $part_city)) {
    $i++;
    $city_val = 1;
}

$part_moonsign = explode(", ", $pr_spiritual_result['moonsign']);
if (in_array($community_query['moonsign'], $part_moonsign)) {
    $i++;
    $moonsign_val = 1;
}

$part_star = explode(", ", $pr_spiritual_result['star']);
if (in_array($community_query['star'], $part_star)) {
    $i++;
    $star_val = 1;
}


  if ($_GET['id']) {
    $who_viewed_select = mysqli_query($conn, "SELECT * FROM view_my_profile WHERE matri_id ='" . $matri_id . "' and viewed_member_id='" . $member_id . "'") or die(mysqli_error($conn));
    $who_viewed_row = mysqli_num_rows($who_viewed_select);
    if ($who_viewed_row == 0) {
      $who_viewed_insert = mysqli_query($conn, "insert into view_my_profile(matri_id , viewed_member_id, viewed_date) values('" . $matri_id . "', '" . $member_id . "', '" . date('Y-m-d') . "')") or die(mysqli_error($conn));
      echo $id =  mysqli_insert_id($conn);
    }
    $shortlist_query = shortlist($matri_id, $member_id);
    $block_query = block($matri_id, $member_id);
  } else {
    echo "<script>alert($mess); window.location='$url';</script>";
  }

	$exp_query = mysqli_query($conn, "select id, receiver_id from expressinterest where receiver_id = '".$member_id."'"); 
	$exp_result = mysqli_fetch_array($exp_query);
  ?>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div>
        <h2 class="member_name"><?php echo $member_id . ' - ' . $basic_query['f_name'] . ' ' . $basic_query['l_name']; ?></h2>
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
            <div class="thumb_img">
              <?php if (isset($_GET["id"])) { ?>
                <a href="javascript:void(0);" class="photoModal" data-id="<?= $_GET["id"]; ?>" data-action="view">
                  <?php
                  $sql = "select * from gallery where matri_id = '" . $_GET["id"] . "'";
                  $query = mysqli_query($conn, $sql);
                  $data = mysqli_fetch_assoc($query);
                  // echo $data["msg_status"];
                  $profile_pic = "";
                  if ($data["msg_status"] == "off") {
                    $profile_pic = profile_pic(1, $member_id, $gender);
                  } else {
                    $user_query = mysqli_query($conn, "select * from register_new where matri_id = '" . $_GET["id"] . "'");
                    $user_data = mysqli_fetch_assoc($user_query);

                    $img_status = "";
                    if ($user_data["gender"] == "Male") {
                      $img_status = "my_account/profile_password/images/photo-protected-male.png";
                    } else {
                      $img_status = "my_account/profile_password/images/photo-protected-female.png";
                    }
                    $profile_pic =  "<img src='" . $img_status . "' />";
                  }
                  ?>

                  <?php echo $profile_pic; ?>
                </a>
              <?php } ?>
              <span class="gtMemAlbum"> 1 </span>
            </div>
            <div class="panel-grid">
              <ul>
                <li><a href="comp-register.php?view_id=<?php echo $_GET["id"]; ?>">Complaint Admin <span class="badge"> 0</span> </a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">


            <!--View Profile-->
            <div class="profile_actvity">
              <div class="profile_title">
                <div class="row">
                  <h2><i class="fa fa-file"></i> Basic Details</h2>
                </div>
              </div>
              <div class="profile_body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-row mt-2 profile_detail">
                      <label>User Name :</label>
                      <span><?php echo $basic_query['f_name'] . ' ' . $basic_query['l_name']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Mobile No :</label>
                      <span><?php echo $basic_query['contact_no']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Date Of Birth :</label>
                      <span><?php echo $basic_query['dob']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Mother Tongue :</label>
                      <span><?php echo $mothertongue_result['mtongue_name']; ?></span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-row mt-2 profile_detail">
                      <label>Email :</label>
                      <span><?php echo $basic_query['email_id']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Gender :</label>
                      <span><?php echo $basic_query['gender']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Marital Status :</label>
                      <span><?php echo $basic_details['marital_status']; ?></span>
                    </div>
                    <div class="form-row mt-2 profile_detail">
                      <label>Profile Created By :</label>
                      <span><?php echo $basic_query['profile_created_by']; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="profile_actvity">
              <div class="profile_title">
                <div class="row">
                  <h2><i class="fa fa-star"></i> About Me </h2>
                </div>
              </div>
              <div class="profile_body">
                <p><?php echo $about_result['about_me']; ?></p>
              </div>
              
            </div>
            <div class="row profile_flags">
                      <div class="col-md-12 ">
                      <a href="#"><i class="fa fa-flag red" aria-hidden="true"></i></i><sup>3</sup></a>
                      <a href="#"><i class="fa fa-flag green" aria-hidden="true"></i></i><sup>5</sup></a>
                      </div>
              </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-12 col-sm-12">
            <div class="member_info">
              <ul>
				<?php if($exp_result['receiver_id'] == $member_id){ ?>
					<li> <a href="javascript:void(0);" class="btn-reminder" data-id="<?php echo $exp_result['id'];?>"> <i class="fa fa-bell me-2"></i> Send Reminder</a></li>
				<?php }else{ ?>
					<li> <a href="#" data-bs-toggle="modal" data-bs-target="#sendrequest"> <i class="fa fa-star me-2"></i> Send Express Interest</a></li>
				<?php } ?>
                <li> <a href="#" class="contact_details" data-viewid="<?php echo $member_id; ?>" data-myid="<?php echo $matri_id; ?>"> <i class="fa fa-phone me-2"></i> View Contact Details </a></li>
                <li> <a href="#" class="personal_message start_chat" data-id="<?php echo $member_id; ?>" data-name="<?php echo $basic_query['f_name'] . ' ' . $basic_query['l_name'] . ' (' . $member_id.')'; ?>"> <i class="fa fa-envelope me-2"></i> Send Personal Message</a></li>
                <li> 
					<a href="javascript:void(0);" class="blocklist" id="blocklist<?php echo $member_id; ?>" data-viewid="<?php echo $member_id; ?>" data-myid="<?php echo $matri_id; ?>"> <i class="fa fa-ban me-2"></i> 
						<?php if (mysqli_num_rows($block_query) == 0) { echo "Add to Blocklist"; } else { echo "Remove Blocklist"; } ?>
					</a>
				</li>
                <li> 
					<a href="javascript:void(0);" class="shortlist" id="shortlist<?php echo $member_id; ?>" data-viewid="<?php echo $member_id; ?>" data-myid="<?php echo $matri_id; ?>"> <i class="fa fa-sort me-2"> </i> 
						<?php if (mysqli_num_rows($shortlist_query) == 0) { echo "Add to Shortlist"; } else { echo "Remove Shortlist"; } ?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="like_btn" id="like_btn"><i class="fa fa-thumbs-up" aria-hidden="true"></i><sup>1</sup>Like</a>
				</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-star" aria-hidden="true"></i> Physical Attributes </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Height :</label>
                  <span><?php echo $basic_query['height']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Body type :</label>
                  <span><?php echo $physical_query['bodytype']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Physical Status :</label>
                  <span><?php echo $physical_query['physicalStatus']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Weight :</label>
                  <span><?php echo $physical_query['weight'] . ' KG'; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> Complexion :</label>
                  <span><?php echo $physical_query['complexion']; ?> </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-book" aria-hidden="true"></i> Religion Information </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Religion :</label>
                  <span><?php echo religion_name($basic_query['religion'])['religion_name']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Sub Caste :</label>
                  <span><?php echo $religion_query['subcaste']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Subcategory/Caste :</label>
				   <span><?php echo caste1($religion_query['caste'])['caste_name']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-university" aria-hidden="true"></i> Education / Profession Information </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Highest Education :</label>
                  <span><?php echo education1($education_query['highest_edu'])['edu_name']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Employed in :</label>
                  <span><?php echo $education_query['employed_in']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Annual Income :</label>
                  <span><?php echo $education_query['annual_income']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Additional Degree :</label>
                  <span><?php echo education1($education_query['additional_degree'])['edu_name']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> Occupation :</label>
                  <span><?php echo occupation1($education_query['occupation'])['ocp_name']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-users" aria-hidden="true"> </i> Family Details </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Family Type : </label>
                  <span><?php echo $family_query['family_type']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Family Value :</label>
                  <span><?php echo $family_query['family_value']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Mother Occupation :</label>
                  <span><?php echo $family_query['mother_occupation']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Married Brothers :</label>
                  <span><?php echo $family_query['married_brothers']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Married Sisters :</label>
                  <span><?php echo $family_query['married_sisters']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Family Status :</label>
                  <span><?php echo $family_query['family_status']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> Father Occupation :</label>
                  <span><?php echo $family_query['father_occupation']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> No. of Brothers :</label>
                  <span><?php echo $family_query['no_of_brothers']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> No. of Sisters :</label>
                  <span><?php echo $family_query['no_of_sisters']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-book" aria-hidden="true"></i> Community Specific Requirements </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Have Dosh?:</label>
                  <span><?php echo $community_query['have_dosh']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Moonsign(Raasi) :</label>
                  <span><?php echo $community_query['moonsign']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Birth Time :</label>
                  <span><?php echo $community_query['birth_time']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Dosh Type :</label>
                  <span><?php echo $community_query['dosh_type']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Star :</label>
                  <span><?php echo $community_query['star']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Birth Place :</label>
                  <span><?php echo $community_query['birth_place']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-map-marker" aria-hidden="true"></i> Location Information </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Country Living In :</label>
                  <span><?php echo specificCountrySql($basic_query['country'])['country_name']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>City Living In :</label>
                  <span><?php echo city_name($basic_query['city'])['city_name']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>State Living In :</label>
                  <span><?php echo state_name($basic_query['state'])['state_name']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-star" aria-hidden="true"></i> Habits And Hobbies </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Diet Habits :</label>
                  <span><?php echo $habits_query['diet_Habits']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Smoke Habits : </label>
                  <span><?php echo $habits_query['smoke_habits']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label>Language Known :</label>
                  <span><?php echo $habits_query['language_known']; ?></span>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-row mt-2 profile_detail">
                  <label>Drinking Habits :</label>
                  <span><?php echo $habits_query['drinking_habits']; ?></span>
                </div>
                <div class="form-row mt-2 profile_detail">
                  <label> Hobby :</label>
                  <span><?php echo $habits_query['hobby']; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="profile_actvity">
          <div class="profile_title">
            <div class="row">
              <h2><i class="fa fa-map-marker" aria-hidden="true"></i> Facebook vouch </h2>
            </div>
          </div>
          <div class="profile_body">
            <div class="row">
              <div class="owl-carousel owl-theme">
	  <?php 
	  $fb_vouchs = mysqli_query($conn, "select * from fb_vouch where matri_id='".$matri_id."'");
		foreach($fb_vouchs as $fb_vouch){ 
	  ?>
        <div class="item featured_info"> 
			<!--a href="#"-->
				<div class="thumb_img mb-3">
					<a href="<?php echo $fb_vouch['fb_link']; ?>"><img src="<?php echo $fb_vouch['fb_pic']; ?>"></a>
				</div>
				<h4><a href=""><?php echo $fb_vouch['fb_name']; ?></a></h4>
				<a href="<?php echo $fb_vouch['fb_link']; ?>"><span class="gt-btn-round "> <b>View Profile</b> <i class="fa fa-angle-right"></i> </span></a>
		</div>
	  <?php } ?>
      </div>
            </div>
          </div>
        </div>
        <div class="partner_grid">
          <h4><i class="fa fa-heart me-2" aria-hidden="true"></i> Partner Preference </h4>
        </div>
        <div class="col-lg-12 col-sm-12">
          <div class="row">
            <div class="col-lg-2 col-sm-12">
              <div class="thumb_img">
                <?php
                $profile_pic = profile_pic(1, $matri_id, $_SESSION['gender']);
                echo $profile_pic;
                ?>
              </div>
            </div>
            <div class="col-lg-8 col-sm-12">
              <h4 class="profile_matches"> Your profile matches with <b> 13 / 19 </b> of <b class="gt-text-orange"> test's</b> preferences!</h4>
            </div>
            <div class="col-lg-2 col-sm-12">
              <div class="thumb_img">
                <?php
                $profile_pic = profile_pic(1, $member_id, $gender);
                echo $profile_pic;
                ?>
                <span class="gtMemAlbum"> 1 </span>
              </div>
            </div>
          </div>
        </div>
        <div class="partner_preference">
          <div class="partner_head">
            <h3> <i class="fa fa-file me-2 gt-text-orange"> </i>Basic Preferences </h3>
          </div>
          <div class="partner_body">
            <div class="row d-flex">
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Marital Status :</strong></label>
                    <span><?php echo $pr_basic_result['marrital_status']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($marital_status_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Height :</strong></label>
                    <span><?php echo height_calculate($pr_basic_result['height']); ?> To <?php echo height_calculate($pr_basic_result['to_height']); ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($pheight){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Smoking Habits :</strong></label>
                    <span><?php echo $pr_basic_result['smoking_habits']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($smoke_var){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Physical status :</strong></label>
                    <span><?php echo $pr_basic_result['physical_status']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($phy_var){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Age :</strong></label>
                    <span><?php echo $pr_basic_result['age'] . 'Years'; ?> To <?php echo $pr_basic_result['to_age'] . 'Years'; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($age){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Eating Habits :</strong></label>
                    <span><?php echo $pr_basic_result['eating_habits']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($habits_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Drinking Habits :</strong></label>
                    <span><?php echo $pr_basic_result['drink_habits']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($drink_var){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="partner_preference">
          <div class="partner_head">
            <h3><i class="fa fa-university me-2 gt-text-orange"> </i>Education / Profession Preference </h3>
          </div>
          <div class="partner_body">
            <div class="row d-flex">
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Education :</strong></label>
                    <span><?php echo education1($pr_education_result['education'])['edu_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($edu_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Employed in :</strong></label>
                    <span><?php echo $pr_education_result['employed_in']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($emp_in_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Annual Income:</strong></label>
                    <span><?php echo $pr_education_result['annual_income']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($income_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Occupation :</strong></label>
                    <span><?php echo occupation1($pr_education_result['occupation'])['ocp_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($occup_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="partner_preference">
          <div class="partner_head">
            <h3><i class="fa fa-book me-2 gt-text-orange"> </i>Spiritual/ Community specific preferences</h3>
          </div>
          <div class="partner_body">
            <div class="row d-flex">
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Religion :</strong></label>
                    <span><?php echo religion_name($pr_spiritual_result['religion'])['religion_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($rel_var){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Manglik :</strong></label>
                    <span></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($marital_status_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Mother Tongue :</strong></label>
                    <span><?php echo mothertongue1($pr_spiritual_result['mother_tongue'])['mtongue_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($mother_tongue_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Subcategory/Caste :</strong></label>
                    <span><?php echo caste1($pr_spiritual_result['caste'])['caste_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($caste_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>Moonsign (Raasi) :</strong></label>
                    <span><?php echo $pr_spiritual_result['moonsign']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($moonsign_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="partner_preference">
          <div class="partner_head">
            <h3><i class="fa fa-map-marker me-2 gt-text-orange"></i> Location Preference</h3>
          </div>
          <div class="partner_body">
            <div class="row d-flex">
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>Country :</strong></label>
                    <span><?php echo specificCountrySql($pr_location_result['country'])['country_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($country_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                  <li>
                    <label><strong>City :</strong></label>
                    <span><?php echo city_name($pr_location_result['city'])['city_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($city_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-sm-12">
                <ul>
                  <li>
                    <label><strong>State :</strong></label>
                    <span><?php echo state_name($pr_location_result['state'])['state_name']; ?></span>
                    <div class="check-circle gt-pref-match" style=""> <?php if($state_val){ ?><i class="fa fa-check"><?php }else{ ?><i class="fa fa-check gt-text-white"> </i><?php } ?> </i> </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
require_once('send_interest_modal.php');
?>
  <?php include("my_account/profile_password/view_photo_modal.php"); ?>
  <?php include("my_account/profile_password/view_protected_modal.php");?>
 
  <div id="show_req_modal"></div>
  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/owl.carousel.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <!-- Start Footer-->
  <?php 
	require_once('footer.php');
	require_once('events.php'); 
	?>
  <?php if(isset($_SESSION["previous"])){ ?>
    <script>
    $(window).on('load', function() {
      $(".photoModal").click();
    });
    </script>
  <?php } ?> 
  <script>

    $(document).ready(function() {
		
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
	
      $('.contact_details').click(function() {
        var myid = $(this).attr('data-myid');
        var viewid = $(this).attr('data-viewid');
        $.ajax({
          type: 'POST',
          url: 'ajax_files/contact_details.php',
          data: {myid:myid, viewid: viewid},
          cache: false,
          success: function(response) {
            //console.log(response);
          }
        });
      });
	  
	  
    });

    /******************Start View Photo Request******************/
    $('.photoModal').click(function() {
      let action = $(this).data("action");
      let id = $(this).data("id");
      $.ajax({
        url: '/my_account/profile_password/get_photo.php',
        method: 'post',
        data: {
          action: action,
          id: id
        },
        success: function(data) {
          $("#photoModal").html(data);
          $("#photoModal").modal("show");
          //  console.log(data);
        }
      });
    });


    $(document).on('click', '.send_request', function(e) {
      e.preventDefault();
      let logged_in = $(this).data("userid");
      let member_id = $(this).data("member");
      let msg = $("input[name='msg']:checked").val();
      $.ajax({
        url: '/my_account/profile_password/process/insert_view_photo_req.php',
        type: 'POST',
        data: {
          req_id: logged_in,
          to_req_id: member_id,
          msg: msg
        },
        success: function(data) {
            alert("Your Request has been Sent to the member Successful.(Note : Your Request password will be sent to your email after your receiver responded.) ");
        }
      });
    });

    $(document).on('click', '#have_pass', function(e) {
      $("#photoModal").modal('hide');
      $("#photoViewModal").modal('show');
    });

    $(document).on('click', '#dont_have', function(e) {
      $("#photoViewModal").modal('hide');
      $("#photoModal").modal('show');
    });

    // if($.trim($("#show_req_modal").html()) !=''){
    //   $("#reqPhotoModal").modal('show');
    // }

     //$("#reqPhotoModal").modal('show');
    $(document).on('click', '#submit_pass', function(e) {
      e.preventDefault();
      let pass = $("#pass").val();
      $.ajax({
        url: '/my_account/profile_password/process/check_password_match.php',
        type: 'POST',
        data: {
          id: "<?= $_GET["id"]; ?>",
          pass: pass,
          msg_status: "off"
        },
        success: function(data) {
         // console.log(data);
          if(data == 0){
            alert("Given Passowrd is wrong.");
          }else{ 
            location.reload(true);
          }
        }
      });
    });

  </script>
</body>

</html>