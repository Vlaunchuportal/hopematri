<!DOCTYPE HTML>

<html>
<?php
require_once('head.php');
?>
<body>
  <?php
  require_once('header.php');
  require_once('auth.php');
  ?>

  <!-- End Header-->

  <section class="my-profile pt-3 p-5 ">

    <div class="container">

      <div class="">

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

              <!--img src="images/female.png" alt="#"-->

              <a href="my-photo.php" class="edit_img"><i class="fa fa-camera gt-margin-right-10"></i> Edit Profile Picture </a>

            </div>

            <div class="panel-grid">

              <ul>

                <li><a href="inboxmessages.php"><i class="fa fa-paper-plane gt-margin-right-10"></i> Send Message </a></li>

                <li><a href="my-photo.php"><i class="fa fa-picture-o gt-margin-right-10"></i> View Photoes </a></li>

              </ul>

            </div>

            <div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title"><i class="fa fa-envelope gt-margin-right-10"></i> MESSAGES

                </li>

                <li><a href="inboxmessages.php">Inbox <!--span class="badge"> 3</span--></a></li>

                <li><a href="inboxmessages.php">Sent <!--span class="badge"> 0</span--></a></li>

              </ul>

            </div>

            <div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title"> <i class="fa fa-star gt-margin-right-10"></i> Interest</li>

                <li><a href="exp-interest.php"> Received </a></li>

                <li><a href="exp-interest.php"> Sent </a></li>

              </ul>

            </div>

            <div class="panel-grid">

              <ul>

                <li class="text-center bg-red list-title"> <i class="fa fa-picture-o gt-margin-right-10"></i> Photo

                  Request </li>

                <li><a href="photo-request.php"> Received </a></li>

                <li><a href="photo-request.php"> Sent </a></li>

              </ul>

            </div>

          </div>

          <div class="col-lg-9 col-md-7 col-sm-12 mt-2">

            <div class="alert alert-info" role="alert">

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <i class="fa fa-times-circle"></i>

              </button>

              <article>

                Edit your profile detail is very easy just click on the left pencil button ( <i class="fa fa-pencil-square gt-margin-left-5 gt-margin-right-5 font-18"></i> ) on detail panel and here

                we go you can edit your profile detail and you can also edit your profile photo from here.

              </article>

            </div>

            <div class="message" id="edit_msg">

              <div class="loading">Loading...</div>

              <div class="success_msg">Your Profile Edit Successfully.</div>

            </div>

            <!--View Profile-->

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-file"></i> Basic Details</h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="#" data-action="basicDetails"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-star"></i> About Me </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="#" data-action="aboutMe"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-book"></i> Religion Information </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="religionInformation"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-university"></i> Education / Profession Information </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="education"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-star"></i> Physical Attributes </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="physicalAttributes"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-star"></i> Habits And Hobbies </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="habitsAndHobbies"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-users"> </i> Family Details </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="familyDetails"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-map-marker"></i> Location Information </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="locationInformation"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <?php
            $userData = userDataSql();
            $religion = $userData["religion"];
            $arrSpecficId = array(37, 45);
            if (in_array($religion, $arrSpecficId)) {
            ?>
              <div class="profile_actvity">

                <div class="profile_title">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12">

                      <h2><i class="fa fa-book"></i> Community Specific Requirements </h2>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">

                      <a class="edit_btn float-end" href="javascript:void(0);" data-action="communityRequirements"> <i class="fa fa-pencil"></i> EDIT </a>

                    </div>

                  </div>

                </div>

                <div class="profile_body">

                </div>

              </div>
            <?php } ?>



            <div class="partner_grid">

              <h4><i class="fa fa-heart gt-margin-right-10"></i> Partner Preference </h4>



            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-file"></i> Basic Preferences </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="prBasicPreferences"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>



            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-university"></i> Education / Profession Information </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="prEducation"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>



            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-book"></i> Spiritual/Community specific preferences </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="prSpiritual"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-map-marker"></i> Location Preference </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="prLocationPreference"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

            <div class="profile_actvity">

              <div class="profile_title">

                <div class="row">

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <h2><i class="fa fa-star"></i> Partner Expectation </h2>

                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">

                    <a class="edit_btn float-end" href="javascript:void(0);" data-action="prExpectation"> <i class="fa fa-pencil"></i> EDIT </a>

                  </div>

                </div>

              </div>

              <div class="profile_body">

              </div>

            </div>

          </div>

        </div>



  </section>

  <script src="js-new/jquery.min.js"></script>

  <!-- Start Footer-->

  <?php require_once('footer.php'); ?>

  <script>
    $(".edit_btn").each(function() {

      let action = $(this).data("action");

      let activeSelector = $(this).closest(".profile_actvity").find(".profile_body");

      if (typeof action !== "undefined") {

        $.ajax({

          url: '/my_account/edit_profile/viewDetalis.php',

          method: 'post',

          data: "action=" + action,

          success: function(data) {

            activeSelector.html(data);

          }

        });

      }

    });



    $(".edit_btn").click(function(e) {

      e.preventDefault()

      let btn = $(this);

      let activeSelector = $(this).closest(".profile_actvity").find(".profile_body");

      let formData = $(this).closest(".profile_actvity").find('form').serialize();

      let action = $(this).data("action");

      // console.log(formData);

      if (btn.text().trim().toLowerCase() == "edit") {

        $(".loading").show();

        $.ajax({

          url: '/my_account/edit_profile/getSpecficForm.php',

          method: 'post',

          data: formData + "&action=" + action,

          success: function(data) {

            // setTimeout(function() {

            $(".loading").hide();

            // }, 1000);

            btn.html('<i class="fa fa-pencil" aria-hidden="true"></i> Submit');

            activeSelector.html(data);

            // var country = $('#country option:selected').val();

            // var state = $('.state option:selected').val();

            // countriesAjax(country);

            // cityAjax(state);

          }

        });

        // console.log("if");

      } else {



        $.ajax({

          url: '/my_account/edit_profile/update.php',

          method: 'post',

          data: formData + "&action=" + action,

          success: function(data) {

            //console.log(data);

            $(".success_msg").show();

            setTimeout(function() {

              $(".success_msg").hide();

            }, 1000);

            $.ajax({

              url: '/my_account/edit_profile/viewDetalis.php',

              method: 'post',

              data: "&action=" + action,

              success: function(data) {

                btn.html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');

                activeSelector.html(data);

              }

            });

          }

        });





      }



    });



    $(document).on('change', '#country', function() {

      var country = $('#country option:selected').val();

      countriesAjax(country);

    });


    function countriesAjax(country) {

      $('.city').html('<option value="">City</option>');

      $.ajax({

        type: 'GET',

        url: 'ajax_files/state.php',

        data: {

          country: country

        },

        cache: false,

        success: function(response) {

          $('.state').find('option').remove().end().append(response);

        }

      });

    }



    $(document).on('change', '.state', function() {

      var state = $('.state option:selected').val();

      cityAjax(state);

    });



    function cityAjax(state) {

      $.ajax({

        type: 'GET',

        url: 'ajax_files/city.php',

        data: {

          state: state

        },

        cache: false,

        success: function(response) {

         // console.log(response);

          $('.city').find('option').remove().end().append(response);

        }

      });

    }


    /******************Muliple Selected Location for Partner***************/
    $(document).on('change', '.prCountry', function() {

      var country = $(".prCountry").chosen().val();
      multipleCountriesAjax(country);

    });

    function multipleCountriesAjax(country) {

      $('.city').html('<option value="">City</option>');

      $.ajax({

        type: 'post',

        url: 'ajax_files/multiple_state.php',

        data: {

          country: country

        },
        dataType: "json",

        success: function(response) {

          if (response.length === 0) {
            $(".prState").html(null);
            var ChosenInputValue = $('.chosen-choices input').val();
            $(".prState").trigger("chosen:updated");
            $('.chosen-choices input').val(ChosenInputValue);
          } else {
            $(".prState").html(null);
            $.each(response, function(index, el) {
              $(".prState").append("<option value=" + el.key + ">" + el.value + "</option>");
              var ChosenInputValue = $('.chosen-choices input').val();
              $(".prState").trigger("chosen:updated");
              $('.chosen-choices input').val(ChosenInputValue);
            });
          }

        }

      });

    }

    $(document).on('change', '.prState', function() {

      var state = $('.prState').chosen().val();

      multipleCityAjax(state);

    });



    function multipleCityAjax(state) {

      $.ajax({

        type: 'post',

        url: 'ajax_files/multiple_city.php',

        data: {

          state: state

        },

        dataType: "json",

        success: function(response) {

          //console.log(response);

          if (response.length === 0) {
            $(".prcity").html(null);
            var ChosenInputValue = $('.chosen-choices input').val();
            $(".prcity").trigger("chosen:updated");
            $('.chosen-choices input').val(ChosenInputValue);
          } else {
            $(".prcity").html(null);
            $.each(response, function(index, el) {
              $(".prcity").append("<option value=" + el.key + ">" + el.value + "</option>");
              var ChosenInputValue = $('.chosen-choices input').val();
              $(".prcity").trigger("chosen:updated");
              $('.chosen-choices input').val(ChosenInputValue);
            });
          }

        }

      });

    }
  </script>

  <script src="js-new/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>

</body>



</html>