            <?php

			$self_page = basename($_SERVER['PHP_SELF']);

			$block_sidebar = "select to_id from block_profile where from_id ='$matri_id'";

			$block_sidebar_result = mysqli_query($conn, $block_sidebar) or die(mysqli_error($conn));

			

			$shortlist_sidebar = "select to_id from shortlist where from_id ='".$matri_id."'";

			$shortlist_sidebar_result = mysqli_query($conn, $shortlist_sidebar) or die(mysqli_error($conn));

			

			$view_profile_sidebar = "select matri_id from view_my_profile where viewed_member_id ='".$matri_id."'";

			$view_profile_sidebar_result = mysqli_query($conn, $view_profile_sidebar) or die(mysqli_error($conn));

			

			$i_visited_sidebar = "select viewed_member_id from view_my_profile where matri_id ='".$matri_id."'";

			$i_visited_sidebar_result = mysqli_query($conn, $i_visited_sidebar) or die(mysqli_error($conn));

			

			$contact_checker_sidebar = "select to_id from contact_checker where my_id ='".$matri_id."'";

			$contact_checker_sidebar_result = mysqli_query($conn, $contact_checker_sidebar) or die(mysqli_error($conn));

			

			$view_photo_request_sidebar = "SELECT id FROM view_photo_request WHERE to_req_id = '$matri_id'";

			$view_photo_request_sidebar_result = mysqli_query($conn, $view_photo_request_sidebar) or die(mysqli_error($conn));

			

			$incoming_msg_id_sidebar = mysqli_query($conn, "select msg_id from messages where msg_id IN (SELECT max(msg_id) as msg_id FROM messages where to_id ='".$matri_id."' GROUP BY from_id HAVING COUNT(from_id) > 1)");

			$outgoing_msg_id_sidebar = mysqli_query($conn, "select msg_id from messages where msg_id IN (SELECT max(msg_id) as msg_id FROM messages where from_id ='".$matri_id."' GROUP BY to_id HAVING COUNT(to_id) > 1)");

			

			?>

			<div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title">MESSAGES</li>

                <li><a href="inboxmessages.php">Inbox <span class="badge"> <?php echo mysqli_num_rows($incoming_msg_id_sidebar);?></span></a></li>

                <li><a href="inboxmessages.php">Outbox <span class="badge"> <?php echo mysqli_num_rows($outgoing_msg_id_sidebar);?></span></a></li>

              </ul>



            </div>

            <div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title">MY PROFILE</li>

                <li><a href="view-profile.php"> Edit profile </a></li>

                <li><a href="my-photo.php"> Manage Photoes </a></li>

              </ul>



            </div>

            <div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title"> PROFILE DETAILS </li>

                <li><a href="exp-interest.php"> Express Interest Received <span class="badge"><?php echo mysqli_num_rows($shortlist_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='shortlisted-members.php'){echo'active';}?>"><a href="shortlisted-members.php"> My Shortlist Profile <span class="badge"> <?php echo mysqli_num_rows($shortlist_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='blocklisted-members.php'){echo'active';}?>"><a href="blocklisted-members.php"> My Blocklist Profile <span class="badge"> <?php echo mysqli_num_rows($block_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='member-visited-me.php'){echo'active';}?>"><a href="member-visited-me.php"> My Profile Viewd By <span class="badge"> <?php echo mysqli_num_rows($view_profile_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='i-visited-members.php'){echo'active';}?>"><a href="i-visited-members.php"> I Visited Profile <span class="badge"> <?php echo mysqli_num_rows($i_visited_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='who-watch-mobileno.php'){echo'active';}?>"><a href="who-watch-mobileno.php"> Mobile numbers viewed by me <span class="badge"> <?php echo mysqli_num_rows($contact_checker_sidebar_result);?></span> </a></li>

                <li class="<?php if($self_page=='photo-request.php'){echo'active';}?>"><a href="photo-request.php"> Photo Password Request Received <span class="badge"> <?php echo mysqli_num_rows($view_photo_request_sidebar_result);?></span> </a></li>

              </ul>



            </div>

            <!--div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title"> Complaint </li>

                <li><a href="comp-register.php"> Complaint Admin <span class="badge">5</span> </a></li>

              </ul>

            </div-->