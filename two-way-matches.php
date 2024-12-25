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
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////  partner details Query //////////////////////////////////////////////////////////
	
	$pr_basic_query = mysqli_query($conn, "select * from pr_basic_pref where user_id = '".$matri_id."'");
	$pr_basic_result = mysqli_fetch_array($pr_basic_query);
	
	$pr_education_query = mysqli_query($conn, "select * from pr_education where user_id = '".$matri_id."'");
	$pr_education_result = mysqli_fetch_array($pr_education_query);
	
	$pr_location_query = mysqli_query($conn, "select * from pr_location where user_id = '".$matri_id."'");
	$pr_location_result = mysqli_fetch_array($pr_location_query);
	
	$pr_spiritual_query = mysqli_query($conn, "select * from pr_spiritual where user_id = '".$matri_id."'");
	$pr_spiritual_result = mysqli_fetch_array($pr_spiritual_query);
	
	$pr_marital_status = "'" . str_replace(",", "','", $pr_basic_result['marrital_status']) . "'";
	
	$pr_highest_edu = "'" . str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_education_result['education']))."'";
	$pr_occupation = "'" . str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_education_result['occupation']))."'";
	$pr_employed_in = "'" . str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_education_result['employed_in']))."'";
	$pr_annual_income = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_education_result['annual_income']))."'"; 
	
	$pr_moonsign = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_spiritual_result['moonsign']))."'";
	$pr_star = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_spiritual_result['star']))."'";
	
	$pr_country_val = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_location_result['country']))."'";
	$pr_state_val = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_location_result['state']))."'";
	$pr_city_val = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $pr_location_result['city']))."'";

	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////// main details query /////////////////////////////////////////////////////////////
	
	$register_query = mysqli_query($conn, "select country, state, city from register_new where matri_id = '".$matri_id."'");
	$register_result = mysqli_fetch_array($register_query);
	
	$basic_query = mysqli_query($conn, "select marital_status from basic_details where user_id = '".$matri_id."'");
	$basic_result = mysqli_fetch_array($basic_query);
	
	$education_query = mysqli_query($conn, "select highest_edu, additional_degree, employed_in, occupation, annual_income from education_profession_information where user_id = '".$matri_id."'");
	$education_result = mysqli_fetch_array($education_query);
	
	$religion_query = mysqli_query($conn, "select caste from religion_information where user_id = '".$matri_id."'");
	$religion_result = mysqli_fetch_array($religion_query);
	
	$comm_specific_query = mysqli_query($conn, "select have_dosh, dosh_type, moonsign, star  from comm_specific_req where user_id = '".$matri_id."'");
	$comm_specific_result = mysqli_fetch_array($comm_specific_query);
	
	$habits_query = mysqli_query($conn, "select diet_Habits, drinking_habits, smoke_habits, language_known, hobby from habits_and_hobbies where user_id = '".$matri_id."'");
	$habits_result = mysqli_fetch_array($habits_query);
	
	$physical_query = mysqli_query($conn, "select weight, bodytype, complexion, physicalStatus  from physical_attributes where user_id = '".$matri_id."'");
	$physical_result = mysqli_fetch_array($physical_query);
	
	$country = $register_result['country'];
	$state = $register_result['state'];
	$city = $register_result['city'];
	
	$marital_status = $basic_result['marital_status'];
	
	$highest_edu = $education_result['highest_edu'];
	$additional_degree = $education_result['additional_degree'];
	$employed_in = $education_result['employed_in'];
	$occupation = $education_result['occupation'];
	$annual_income = $education_result['annual_income'];
	
	$caste = $religion_result['caste'];
	
	$have_dosh = $comm_specific_result['have_dosh'];
	$dosh_type = $comm_specific_result['dosh_type']; // not used
	$dosh_type = "'".str_replace(",","','", preg_replace('/\s*,\s*/', ',', $dosh_type))."'"; // not used
	$moonsign = $comm_specific_result['moonsign'];
	$star = $comm_specific_result['star'];
	
	$diet_Habits = $habits_result['diet_Habits'];
	$drinking_habits = $habits_result['drinking_habits'];
	$smoke_habits = $habits_result['smoke_habits'];
	$language_known = $habits_result['language_known'];
	$hobby = $habits_result['hobby'];
	
	$weight = $physical_result['weight'];
	$bodytype = $physical_result['bodytype'];
	$complexion = $physical_result['complexion'];
	$physicalStatus	 = $physical_result['physicalStatus'];
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////// end main details query ///////////////////////////////////////////////////////

		if($pr_education_result['education']){ 
			$pr_highest_value = "highest_edu IN (".$pr_highest_edu.")"; 
		}else{ 
			$pr_highest_value =""; 
		}
		if($pr_education_result['occupation']){ 
			$pr_occupation_value = "and occupation IN (".$pr_occupation.")"; 
		}else{ 
			$pr_occupation_value =""; 
		}
		if($pr_education_result['employed_in']){ 
			$pr_employed_value = "and employed_in IN (".$pr_employed_in.")"; 
		}else{ 
			$pr_employed_value =""; 
		}
		if($pr_education_result['annual_income']){ 
			$pr_annual_value = "and annual_income IN (".$pr_annual_income.")"; 
		}else{ 
			$pr_annual_value =""; 
		}
		
		if($pr_spiritual_result['have_dosh']){ 
			$pr_have_dosh = "have_dosh ='".$pr_spiritual_result['have_dosh']."'"; 
		}else{ 
			$pr_have_dosh =''; 
		}
		
		if($pr_spiritual_result['dosh_type']){ 
			$pr_dosh_type = "and dosh_type REGEXP '".$pr_spiritual_result['dosh_type']."'"; //not used
		}else{ 
			$pr_dosh_type =''; 
		}
		
		if($pr_spiritual_result['moonsign']){ 
			$pr_moonsign_value = "and moonsign IN (".$pr_moonsign.")"; 
		}else{ 
			$pr_moonsign_value =''; 
		}
		
		if($pr_spiritual_result['star']){ 
			$pr_star_value = "and star IN(".$pr_star.")"; 
		}else{ 
			$pr_star_value =''; 
		}
		
		if($pr_basic_result['eating_habits']){ 
			$pr_eating_habits = "diet_Habits = '".$pr_basic_result['eating_habits']."'"; 
		}else{ 
			$pr_eating_habits =''; 
		}
		if($pr_basic_result['drink_habits']){ 
			$pr_drinking_habits = "and drinking_habits = '".$pr_basic_result['drink_habits']."'"; 
		}else{ 
			$pr_drinking_habits =''; 
		}
		if($pr_basic_result['smoking_habits']){ 
			$pr_smoke_habits = "and smoke_habits = '".$pr_basic_result['smoking_habits']."'"; 
		}else{ 
			$pr_smoke_habits =''; 
		}

		if($pr_spiritual_result['mother_tongue']){ 
			$pr_mother_tongue = "and mother_tongue = '".$pr_spiritual_result['mother_tongue']."'"; // not use
		}else{ 
			$pr_mother_tongue = '';
		}
		
		if($pr_location_result['country']){ $pr_country = "and country IN (".$pr_country_val.")"; }else{ $pr_country = '';}
		if($pr_location_result['state']){ $pr_state = "and state IN (".$pr_state_val.")"; }else{ $pr_state = '';}
		if($pr_location_result['city']){ $pr_city = "and city IN (".$pr_city_val.")"; }else{ $pr_city = '';}
		
		if($pr_basic_result['age']){ 
			$age = "and age between '".$pr_basic_result['age']."' AND '".$pr_basic_result['to_age']."'"; 
		}else{ 
			$age = '';
		}
		if($pr_basic_result['height']){ 
			$height = "and height between '".$pr_basic_result['height']."' AND '".$pr_basic_result['to_height']."'"; 
		}else{ 
			$height = '';
		}
	
	$query1 = "select * from register_new where religion='$religion' and gender='$gender' and matri_id IN (select user_id from pr_spiritual where FIND_IN_SET ('$have_dosh',have_dosh) and FIND_IN_SET('$star',star) and FIND_IN_SET('$caste',caste) and user_id IN (select user_id from pr_location where FIND_IN_SET('$country',country) and FIND_IN_SET('$state',state) and FIND_IN_SET('$city',city) and user_id IN (select user_id from pr_education where FIND_IN_SET('$highest_edu',education) and FIND_IN_SET('$occupation',occupation) and FIND_IN_SET('$employed_in',employed_in) and FIND_IN_SET('$annual_income',annual_income) and user_id IN (select user_id from pr_basic_pref where FIND_IN_SET('$marital_status',marrital_status) and FIND_IN_SET('$diet_Habits',eating_habits) and FIND_IN_SET('$smoke_habits',smoking_habits) and FIND_IN_SET('$drinking_habits',drink_habits) and FIND_IN_SET('$physicalStatus',physical_status) and user_id IN (SELECT user_id FROM education_profession_information WHERE $pr_highest_value $pr_occupation_value $pr_employed_value $pr_annual_value and user_id IN (select user_id from religion_information where caste ='".$pr_spiritual_result['caste']."' and user_id IN (select user_id from comm_specific_req where $pr_have_dosh $pr_moonsign_value $pr_star_value and user_id IN(select user_id from habits_and_hobbies where $pr_eating_habits $pr_drinking_habits $pr_smoke_habits and user_id IN(select user_id from physical_attributes where physicalStatus = '".$pr_basic_result['physical_status']."' and user_id IN(SELECT user_id FROM basic_details WHERE marital_status IN (".$pr_marital_status.") )))))))))) $pr_country $pr_state $pr_city $age $height ORDER BY CASE WHEN sportlight = 'yes' THEN 0 WHEN sportlight = 'no' THEN 1 ELSE 2 END";
	$register_new = mysqli_query($conn, $query1);


?>

<body>
<?php require_once('header.php'); ?>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div class="">
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
            <div class="panel-grid one_way">
              <?php
			  require_once("sidebar1.php");
			  ?>
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
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">
            <div class="profile_head">
              <h2 class="text-red">Two Way Match </h2>
              <p>Two way match is the profile show in perticular criteria at its best.its help you to find out your life partner easily.</p>
            </div>
			<div class="alert alert-info alert-warning" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
				<article>
					<h4 class=""> <i class="fa fa-star gt-text-blue gt-margin-right-10"> </i>Spotlight Profile</h4>
					<p>Blue color profile is are spotlight profile which was showing top of the search result.Its gives 10 times faster results.</p> 
					<p><strong style="color:#ff0000"><?php echo mysqli_num_rows($register_new); ?></strong> Profiles found</p>
				</article>
			</div>
			<?php if(mysqli_num_rows($register_new)>0){ ?> 
			<?php foreach($register_new as $register_details) {
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
			<?php } } else{ ?>
			 <div class="no-data">
              <img src="images/nodata-available.jpg " alt="#">
            </div>
			<?php } ?>
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
</body>

</html>