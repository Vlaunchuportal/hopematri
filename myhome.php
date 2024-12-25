<!DOCTYPE HTML>

<html>



<?php require_once('head.php'); ?>



<body>

<?php 

require_once('header.php');

//require_once('function.php');

require_once('auth.php');

$religion = $_SESSION['religion'];

include_once('religionSubTiltequotes.php');

///////////////////////////////////////////////////////////////////////////////////////

//////////////////////////// Upcoming Event /////////////////////////////////////////

$event_results = mysqli_query($conn, "SELECT event_name, prayer_date, time FROM upcoming_prayer WHERE religion='$religion' and status='APPROVED'");



///////////////////////////////////////////////////////////////////////////////////////

//////////////////////////// Quotes /////////////////////////////////////////

$quotes_results = mysqli_query($conn, "SELECT quotes_title, quotes_message, quotes_person_name FROM quotes_marriage WHERE religion='$religion' and status='APPROVED'");



///////////////////////////////////////////////////////////////////////////////////////

//////////////////////////// Subtitle quotes /////////////////////////////////////////

$data = religion_based($religion);



$recently_visit = mysqli_query($conn, "select * from view_my_profile where matri_id='".$matri_id."' ORDER BY id DESC limit 5");



if(isset($_POST['search'])){

	$_SESSION['search_matri_id'] = $_POST['matri_id'];

	$_SESSION['action'] = 'matri_id_search';

	 echo "<script>window.location='search_result.php'</script>";

}



$freligion_query = mysqli_query($conn, "select religion_id from religion");

	$Featured = array();

	foreach($freligion_query as $freligion_result){

		$fregister_query = mysqli_query($conn, "select distinct religion, username, matri_id from register_new where gender = '".$gender."' and religion = '".$freligion_result['religion_id']."'");

		$fregister_result = mysqli_fetch_assoc($fregister_query);

		if(!empty($fregister_result)){

			$fbasic_query = mysqli_query($conn, "select user_id from basic_details where user_id = (select user_id from physical_attributes where user_id = (select user_id from religion_information where user_id = (select user_id from education_profession_information where user_id = (select user_id from about_me where user_id = (select user_id from family_details where user_id = (select user_id from comm_specific_req where user_id = (select user_id from habits_and_hobbies where user_id = (select user_id from pr_basic_pref where user_id = (select user_id from pr_education where user_id = (select user_id from pr_location where user_id = (select user_id from pr_spiritual where user_id = '".$fregister_result['matri_id']."')))))))))))");

			$Featured[] = mysqli_fetch_assoc($fbasic_query);

		}

	}

	$Featured = array_filter($Featured);

 ?>

  <!-- End Header-->

  <section class="my-profile pt-3 p-5 ">

    <div class="container">

      <div class="row">

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

			<?php 

			$profile_pic = profile_pic(1, $matri_id, $_SESSION['gender']);

			echo $profile_pic;

			?>

              <a href="my-photo.php" class="edit_img"><i class="fa fa-camera gt-margin-right-10"></i> Edit Profile Picture </a>

            </div>

			 <?php require_once('sidebar.php'); ?>

          </div>

          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">

            <div class="recent_login">

              <div class="row">

                <div class="col-lg-6 col-ms-6 col-sm-12">

                  <div class="user_info">

                    <h3><?php echo $data[0]; ?> <span><?php echo $_SESSION['username']; ?>( <?php echo $Hresult['matri_id']; ?> )</span></h3> 

					<h4 class="religion_book"><strong><?php echo $data[1]; ?></strong></h4>

                    <p> Tip : insert all details which can help you to find perfect life partner</p>

                    <div class="com_pro">

                      <a href="view-profile.php"> Complete Your Profile <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a>

                    </div>

                  </div>

                  <div class="user_info">

                    <h3>Search By Id</span></h3>

					<form method="post" name="search_id" id="search_id">

                    <div class="form-row mt-3">

                      <input type="text" class="form-control" id="matri_id" name="matri_id" placeholder="Enter matri id to search">

                    </div>

                    <div class="form-row mt-3">

                      <button type="submit" id="search" name="search" class="btn btn-primary"> Search Now</button>

                    </div>

					</form>

                  </div>

                </div>

                <div class="col-lg-6 col-ms-6 col-sm-12"> 

                  <div class="user_info ">

                    <h3>RECENT LOGIN </span></h3>

                    <span class="bd"></span>

                    <div class="owl-carousel owl-carousel1 owl-theme">

					<?php foreach(recent_login($religion, $Hresult['matri_id'], $gender) as $recent_login){ ?>

					<?php 

					$exp_query = mysqli_query($conn, "select id, receiver_id, receiver_response from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$recent_login['matri_id']."'");

					$exp_result = mysqli_fetch_array($exp_query);

					?>

                      <div class="item featured_info login_recent">

                          <div class="thumb_img mb-3">

                            <a href="member-profile.php?id=<?php echo $recent_login['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $recent_login['matri_id'], $gender); ?></a>

                          </div>

                          <div class="login_info">

                            <h4><a href="member-profile.php?id=<?php echo $recent_login['matri_id']; ?>"><?php echo $recent_login['f_name'].' '.$recent_login['l_name']; ?> (<?php echo $recent_login['matri_id']; ?>)</a></h4>

							<p><?php echo short_age($recent_login['dob']); ?> Years, <?php echo height_calculate($recent_login['height']); ?></p>

                            <p> <?php echo location_details($recent_login['country'], $recent_login['city']); ?></p>

							<?php if($exp_result['receiver_id'] == $recent_login['matri_id']){ ?>

							<?php if($exp_result['receiver_response'] == 'Accept'){ ?>

								<a href="javascript:void(0);" class="btn btn-accept"><i class="fa fa-check gt-margin-right-10"></i> Interest Accepted</a>

							<?php }else{?> 

								<button class="btn btn-send-request btn-reminder" data-id="<?php echo $exp_result['id']; ?>"> <i class="fa fa-bell"></i> Send Reminder </button>

							<?php } ?> 

								

							<?php }else{  ?>

								<button class="btn btn-send-request interrest" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $recent_login['matri_id']; ?>"> <i class="fa fa-heart-o"></i> Send Interest </button>

							<?php } ?>

                          </div>

                        

                      </div>

					  <?php } ?>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="recent_log_actvity">

              <div class="row">

                <div class=" col-lg-7 col-ms-6 col-sm-12">

                  <div class="recent_login">

                    <div class="user_info">

                      <div class="owl-carousel owl-carousel1 owl-theme">

					  <?php foreach($quotes_results as $quotes_result){ ?>

                        <div class="item featured_info login_recent">

                          <h3><i class="fa fa-heart-o"></i> <?php echo $quotes_result['quotes_title']; ?></h3>

                          <p> <?php echo $quotes_result['quotes_message']; ?></p>

                        </div>

					  <?php } ?>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="col-lg-5 col-ms-6 col-sm-12">

                  <div class="recent_login">

                    <div class="user_info">

                      <h3>Upcoming Event</span></h3>

                      <div class="owl-carousel owl-carousel3 owl-theme">

					  <?php

					  foreach($event_results as $event_result){

						  $timestamp = strtotime($event_result['prayer_date']);

					  ?>

                        <div class="item featured_info login_recent text-center">

                        <div class="user_data ">

                          <h4><?php echo $event_result['event_name'];?></h4>

                          <div class="data_date"><h5><?php echo date("d", $timestamp); ?><span>th</span></h5></div>

                          <div class="data_day"> <p><?php echo date('F', $timestamp).' '.date('Y', $timestamp).', '.date('l', $timestamp); ?></p>

                          </div>

                        </div>

                        </div>

						<?php } ?>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="recent_actvity">

              <div class="cont_grid">

                <div class="cont_head">

                  <h3>RECENTLY JOINED </h3>

                </div>

                <div class="cont_body">

				<?php if(recent_joined($religion, $Hresult['matri_id'], $gender)){ ?>

                 <div class="recenly_joind recent_login">

                  <div class="owl-carousel owl-carousel2 owl-theme">

				  <?php foreach(recent_joined($religion, $Hresult['matri_id'], $gender) as $recent_joined){  ?>

				  <?php

					$exp_query = mysqli_query($conn, "select id, receiver_id, receiver_response from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$recent_joined['matri_id']."'");

					$exp_result = mysqli_fetch_array($exp_query);

				  ?>

                    <div class="item featured_info text-center">

                      <div class="thumb_img mb-3">

                        <a href="member-profile.php?id=<?php echo $recent_joined['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $recent_joined['matri_id'], $gender); ?></a>

                      </div>

                      <h4><a href="member-profile.php?id=<?php echo $recent_joined['matri_id']; ?>"><?php echo $recent_joined['f_name'].' '. $recent_joined['l_name'];?> ( <?php echo $recent_joined['matri_id']; ?>)</a></h4>

					  <p><?php echo short_age($recent_joined['dob']); ?> Years, <?php echo height_calculate($recent_joined['height']); ?></p>

                      <p> <?php echo location_details($recent_joined['country'], $recent_joined['city']); ?> </p>

					  <?php if($exp_result['receiver_id'] == $recent_joined['matri_id']){ ?>

					  <?php if($exp_result['receiver_response'] == 'Accept'){ ?>

						<button class="btn btn-accept" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $recent_joined['matri_id']; ?>"><i class="fa fa-check gt-margin-right-10"></i> Interest Accepted </button>

					  <?php }else{ ?>

						<button class="btn btn-send-request btn-reminder" data-id="<?php echo $exp_result['id']; ?>"> <i class="fa fa-bell" aria-hidden="true"></i> Send Reminder </button>

					  <?php } ?>

					  <?php }else{ ?>

						  <button class="btn btn-send-request interrest" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_detail['matri_id']; ?>"> <i class="fa fa-heart-o" aria-hidden="true"></i> Send Interest </button>

					  <?php } ?>

                    </div>

				  <?php } ?>

                  </div>

                 </div>

				 <?php } else{ ?>

					<div class="data_item">

						<img src="images/nodata-available.jpg" alt="#">

					</div>

				 <?php } ?>

                </div>

              </div>

            </div>

            <div class="recent_actvity">

				<div class="cont_grid">

					<div class="cont_head"><h3>FEATURED PROFILES </h3></div>

					<div class="cont_body">

				<?php if(!empty($Featured)){ ?>

                 <div class="recenly_joind recent_login">

                  <div class="owl-carousel owl-carousel2 owl-theme">

					<?php 

						foreach($Featured as $featured1){ 

							$fregister_query1 = mysqli_query($conn, "select * from register_new where matri_id = '".$featured1['user_id']."'");

							$fregister_result1 = mysqli_fetch_assoc($fregister_query1);

							

							$exp_query = mysqli_query($conn, "select id, receiver_id, receiver_response from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$fregister_result1['matri_id']."'");

							$exp_result = mysqli_fetch_array($exp_query);

					?>

                    <div class="item featured_info text-center"> 

						<div class="thumb_img mb-3">

							<a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $fregister_result1['matri_id'], $fregister_result1['gender']); ?></a>

						</div>

						<h4><a href="member-profile.php?id=<?php echo $fregister_result1['matri_id']; ?>"><?php echo $fregister_result1['username'];?> ( <?php echo $fregister_result1['matri_id']; ?>)</a></h4>

						<p><?php echo short_age($fregister_result1['dob']); ?> Years, <?php echo height_calculate($fregister_result1['height']); ?></p>

						<p><?php echo location_details($fregister_result1['country'], $fregister_result1['city']); ?></p>

						<?php if($exp_result['receiver_id'] == $fregister_result1['matri_id']){ ?>

						<?php if($exp_result['receiver_response'] == 'Accept'){ ?>

							<button class="btn btn-accept" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $fregister_result1['matri_id']; ?>"><i class="fa fa-check gt-margin-right-10"></i> Interest Accepted </button>

						<?php }else{ ?>

							<button class="btn btn-send-request btn-reminder" data-id="<?php echo $exp_result['id']; ?>"> <i class="fa fa-bell" aria-hidden="true"></i> Send Reminder </button>

						<?php } ?>

						<?php } else{ ?>

							<button class="btn btn-send-request interrest" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $fregister_result1['matri_id']; ?>"> <i class="fa fa-heart-o" aria-hidden="true"></i> Send Interest </button>

						<?php } ?>

					</div>

				  <?php } ?>

                  </div>

                 </div>

				 <?php } else{ ?>

					<div class="data_item">

						<img src="images/nodata-available.jpg" alt="#">

					</div>

				 <?php } ?>

                </div>

              </div>

            </div>

            <!--div class="recent_actvity">

              <div class="cont_grid">

                <div class="cont_head">

                  <h3>MY MATCHES</h3>

                </div>

                <div class="cont_body">

                  <div class="data_item">

                    <img src="images/nodata-available.jpg" alt="#">

                  </div>

                </div>

              </div>

            </div-->

            <div class="recent_actvity">

              <div class="cont_grid">

                <div class="cont_head">

                  <h3>Recently Visited </h3>

                </div>

                <div class="cont_body">

				<?php if($recently_visit){ ?>

					<div class="recenly_joind recent_login">

                  <div class="owl-carousel owl-carousel2 owl-theme">

				  <?php 

				  foreach($recently_visit as $recently_visits){

					  $register_details = register_details($religion, $recently_visits['viewed_member_id'], $gender);

					  foreach($register_details as $register_detail){

						 

						$exp_query = mysqli_query($conn, "select id, receiver_id, receiver_response from expressinterest WHERE sender_id = '".$matri_id."' and receiver_id = '".$register_detail['matri_id']."'"); 

						$exp_result = mysqli_fetch_array($exp_query);

					  ?>

                    <div class="item featured_info text-center">

                      <div class="thumb_img mb-3">

                        <a href="member-profile.php?id=<?php echo $register_detail['matri_id']; ?>"><?php echo $profile_pic = profile_pic(1, $recently_visits['viewed_member_id'], $gender); ?></a>

                      </div>

                      <h4><a href="member-profile.php?id=<?php echo $register_detail['matri_id']; ?>"><?php echo $register_detail['f_name'].' '. $register_detail['l_name'];?> ( <?php echo $register_detail['matri_id']; ?>)</a></h4>

                      <p><?php echo short_age($register_detail['dob']); ?> Years, <?php echo height_calculate($register_detail['height']); ?></p>

                      <p> <?php echo location_details($register_detail['country'], $register_detail['city']); ?> </p>

					<?php if($exp_result['receiver_id'] == $register_detail['matri_id']){ ?>

					<?php if($exp_result['receiver_response'] == 'Accept'){ ?>

						<button class="btn btn-accept" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_detail['matri_id']; ?>"><i class="fa fa-check gt-margin-right-10"></i> Interest Accepted </button>

					<?php }else{ ?> 

						<button class="btn btn-send-request btn-reminder" data-id="<?php echo $exp_result['id']; ?>" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_detail['matri_id']; ?>"> <i class="fa fa-bell" aria-hidden="true"></i> Send Reminder </button>

					<?php } ?>

					<?php } else{ ?>

						<button class="btn btn-send-request interrest" data-myid="<?php echo $matri_id; ?>" data-viewid="<?php echo $register_detail['matri_id']; ?>"> <i class="fa fa-heart-o" aria-hidden="true"></i> Send Interest </button>

					<?php } ?>

                    </div>

				  <?php } } ?>

                  </div>

                 </div>

				<?php } else{ ?>

                  <div class="data_item">

                    <img src="images/nodata-available.jpg" alt="#">

                  </div>

				<?php } ?>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>



  </section>



  <script src="js-new/jquery.min.js"></script>

  <script src="js-new/owl.carousel.js"></script>

  <script src="js-new/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>

  <script>

    $(document).ready(function () {

      $('.owl-carousel1').owlCarousel({

        loop: true,

        margin: 10,

        dots: false,

        autoplay: true,

        responsiveClass: true,

        responsive: {

          0: { items: 1, nav: true },

          600: { items: 1, nav: true },

          1000: { items: 1, nav: true }

        }

      });



      $('.owl-carousel2').owlCarousel({

        loop: true,

        margin: 10,

        dots: false,

        autoplay: true,

        responsiveClass: true,

        responsive: {

          0: { items: 1, nav: true },

          600: { items: 2, nav: true },

          1000: { items: 4, nav: true}

        }

      });

	  

      $('.owl-carousel3').owlCarousel({

        loop: true,

        margin: 10,

        dots: false,

        autoplay: true,

        responsiveClass: true,

        responsive: {

          0: { items: 2, nav: true },

          600: { items: 2, nav: true },

          1000: { items: 2, nav: true }

        }

      });

	  

    });

  </script>

	<?php 

	require_once('send_interest_modal.php');

	?>

    <!-- Start Footer-->

	<?php 

		require_once('footer.php');   

		require_once('events.php');  

	?>

</body>



</html>