<!DOCTYPE HTML>
<html>
<?php
require_once('head.php');
?>

<body>
  <?php require_once('header.php');
  require_once('auth.php');
  ?>
  <!-- End Header-->
  <section class="my-profile pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <div class="profile_head">
            <h2 class="text-red">Photo Password Request </h2>
            <p>With this tabs(photo req sent and photo req received) you can check all your photo req send and received. </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
            <?php
            include_once("sidebar.php");
            ?>
          </div>
          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">
            <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
              <article>
                <h4 class=""> <i class="fa fa-cog gt-text-blue gt-margin-right-10 fa-spin"> </i> Photo Privacy</h4>
                <p>You can set you photo privacy with our settings tab. </p>
                <a href="#" class="btn btn-danger">Change Photo Settings <i class="fa fa-caret-right gt-margin-right-10"> </i> </a>
              </article>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="exp_tabing">
                  <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-inbox me-2"> </i> Photo Request Received <span class="badge ms-2">0</span> </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-paper-plane me-2"> </i> Photo Request Sent <span class="badge ms-2">0</span></button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div id="pagination_data_rec"> </div>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div id="pagination_data_sent"> </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Received Pending </h2>
                  <p>Here you can see your all express interest which you received from members and waiting for response from you. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Received Accepted </h2>
                  <p>Here you can see your all express interest which you received from members and accepted by you. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Received Rejected</h2>
                  <p>Here you can see your all express interest which you received from members and rejected by you. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile1" role="tabpanel" aria-labelledby="v-pills-profile-tab1">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Sent Accepted</h2>
                  <p>Here you can see your all express interest which you send to members.and with left side panel you can access other particluar express interest. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
              <div class="tab-pane fade" id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages-tab2">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Sent Rejected</h2>
                  <p>Here you can see your all express interest which you send and rejcted by members. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
              <div class="tab-pane fade" id="v-pills-settings3" role="tabpanel" aria-labelledby="v-pills-settings-tab3">
                <div class="profile_head">
                  <h2 class="text-red">Express Interest Sent Pending </h2>
                  <p>Here you can see your all express interest which you sent to members and not yet responded. </p>
                </div>
                <div class="no-data"> <img src="images/nodata-available.jpg " alt="#"> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Start Footer-->
  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <?php include("my_account/profile_password/accept_modal.php"); ?>
  <?php require_once('footer.php'); ?>
  <script>
    load_data();
    load_data_sent();

    function count() {
      let home_tab_count = $("#photo_req_rec").text();
      $("#pills-home-tab").find("span").text(home_tab_count);

      let profile_tab_count = $("#photo_req_sent").text();
      $("#pills-profile-tab").find("span").text(profile_tab_count);

    }

    function load_data(page) {
      $.ajax({
        url: "/my_account/profile_password/process/req_rec_pagination.php",
        method: "POST",
        data: {
          page: page
        },
        success: function(data) {
          $('#pagination_data_rec').html(data);
          count();
        }
      })
    }

    function load_data_sent(page) {
      $.ajax({
        url: "/my_account/profile_password/process/req_sent_pagination.php",
        method: "POST",
        data: {
          page: page
        },
        success: function(data) {
          $('#pagination_data_sent').html(data);
          count();
        }
      })
    }

    $(document).on('click', '.pagination_rec', function() {
      var page = $(this).attr("id");
      load_data(page);
    });

    $(document).on('click', '.pagination_sent', function() {
      var page = $(this).attr("id");
      load_data_sent(page);
    });

    $(document).on('click', '.single_delete', function() {
      let id = $(this).data("id");
      let action = $(this).data("action");
      let selector = jQuery(this).closest('#' + id + '').parent(".tab_head");
      $.ajax({
        url: "/my_account/profile_password/process/req_single_delete.php",
        type: "POST",
        data: {
          action: action,
          id: id
        },
        success: function(data) {
          $('#' + id + '').css('background-color', '#ccc');
          $('#' + id + '').fadeOut('slow');
          let length = selector.find(".send_tab").length;
          $('#' + id + '').remove();
          load_data();
          load_data_sent();
          count();
          let count_selector = length - 1;
          if (count_selector == 0) {
            selector.html('<div class="no-data1 mt-3"><div class="thumbnail"><img src="img/nodata-available.jpg" class="img-fluid"></div></div>');
          }

        }
      });
    });

    $(document).on('click', '.accept_rec', function() {
      let id = $(this).data("id");
      $("#user_id").val(id);
      $("#recModal").modal("show");
    });

    /************************Start Set Password***************************/
    var valid = false;

    function check_set_password_input() {
      var set_password_input = jQuery("#set_password_input").val();
      if (set_password_input.trim() == "") {
        jQuery("#error_set_password_input").html("<b class='text-danger'>This field is required.</b>");
        valid = false;
      } else {
        jQuery("#error_set_password_input").html("");
        valid = true;
      }
    }

    jQuery("#set_password_input").on("keyup", function() {
      check_set_password_input();
    });

    $(document).on('click', '#send_Pass', function(e) {
      e.preventDefault();
      check_set_password_input();
      if (valid == true) {

        $.ajax({
          method: 'post',
          url: 'my_account/profile_password/process/req_accept.php',
          data: $('#send_pass_form').serialize(),
          success: function(response) {
            console.log(response);
            if (response == 1) {
              $('#send_pass_form')[0].reset();
              jQuery("#error_set_password_input").html("");
              alert("Your Photo Password has been successfully sent to requester's email id.");
              location.reload(true);
              //$("#recModal").modal("hide");
            } else {
              jQuery("#error_set_password_input").html("<b class='text-danger'>Please enter your correct password.</b>");
            }
          }
        });
      }
    });

    $(document).on('click', '.send_msg', function() {
      let id = $(this).data("id");
      $(".start_chat").each(function() {
        let all_id = $(this).data("id");
        if (all_id == id) {
          $(this).trigger("click");
        }
      });
    });
  </script>
</body>

</html>