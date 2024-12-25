<div class="search_data">
            <div class="search_result_head <?php echo $sportlight; ?>">
              <a href="member-profile.php?id=<?php echo $register_details['matri_id']; ?>"><div class="row d-flex">
                <div class="col-lg-6 col-sm-12">
                  <h3><?php echo $register_details['username']; ?> ( <?php echo $register_details['matri_id']; ?> )</h3>
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
				    <?php foreach($exp_query as $exp_result){ ?>
					<?php if($exp_result['receiver_response'] == 'Accept'){ ?>
						<a href="javascript:void(0);" class="result_btn-r"> Interest Accepted</a>
					<?php }else if($exp_result['receiver_response'] == 'Pending'){ ?>
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