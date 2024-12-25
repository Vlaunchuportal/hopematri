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
?>
<style>
.gt-btn-orange {
    color: #fff;
    background-color: #de1c51;
    border-color: #de1c51;
    transition: all 0.3s ease-in-out;
}
.gt-margin-left-5 {
    margin-left: 5px;
}
</style>
<!-- End Header-->
<section class="my-profile pt-3 ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5 col-sm-12 mt-2">
       <?php include('search_sidebar.php'); ?>
      </div>
		<div class="col-lg-9 col-md-7 col-sm-12 mt-2 result_search">
		</div>
      </div>
    </div>
  </div>
</section>

<!-- Start Footer--> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Save Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="div_saved_search">
        <label><strong>Saved Search Name :</strong></label>
        <div class="form-row mt-1">
          <input type="text" name="txt_saved_search_name" id="txt_saved_search_name" class="form-control">
        </div>
      </div>
      <div class="modal-footer btn_modal">
        <button type="button" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php 
require_once('send_interest_modal.php');
?>
<script src="js-new/jquery.min.js"></script> 
<script src="js-new/bootstrap.bundle.min.js"></script> 
<script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
<?php 
require_once('footer.php'); 
require_once('events.php');
if($_GET['ss']){
	$select_query = mysqli_query($conn, "select * from save_search WHERE ss_id='".$_GET['ss']."'");
	$select_result = mysqli_fetch_array($select_query);
	$ss_fromage = $select_result['fromage'];
	$ss_toage = $select_result['toage'];
	$ss_from_height = $select_result['from_height'];
	$ss_to_height = $select_result['to_height'];
	$ss_marital_status = $select_result['marital_status'];
	$ss_religion = $select_result['religion'];
	$ss_caste = $select_result['caste'];
	$ss_mother_tongue = $select_result['mother_tongue'];
	$ss_country = $select_result['country'];
	$ss_state = $select_result['state'];
	$ss_city = $select_result['city'];
	$ss_education = $select_result['education'];
	$ss_with_photo = $select_result['with_photo'];
	$ss_occupation = $select_result['occupation'];
	$ss_annual_income = $select_result['annual_income'];
	$ss_diet = $select_result['diet'];
	$ss_drink = $select_result['drink'];
	$ss_smoking = $select_result['smoking'];
	$ss_complexion = $select_result['complexion'];
	$ss_bodytype = $select_result['bodytype'];
	$ss_star = $select_result['star'];
	$ss_manglik = $select_result['manglik'];
	$ss_keyword = $select_result['keyword'];
}
?>
<script>
$(document).ready(function(){
	var ss = '<?php echo $_GET['ss']; ?>';
	if(ss){
		var action = 'inner_search';
		var dataString = 'gender=' + '<?php echo $gender; ?>' + '&religion=' + '<?php echo $ss_religion; ?>' + '&action=' + action + '&age_from=' +'<?php echo $ss_fromage;?>' + '&age_to=' + '<?php echo $ss_toage; ?>' + '&caste' + '<?php echo $ss_caste; ?>'+ '&Hmatri_id=' + '<?php echo $Hmatri_id; ?>' + '&height_from=' + '<?php echo $ss_from_height; ?>' + '&height_to=' + '<?php echo $ss_to_height; ?>' + '&photo=' + '<?php echo $ss_with_photo; ?>' + '&education=' + '<?php echo $ss_education; ?>' + '&marital=' + '<?php echo $marital_status; ?>' + '&country=' + '<?php echo $ss_country; ?>' + '&state=' + '<?php echo $ss_state; ?>' + '&city=' + '<?php echo $ss_city; ?>' + '&star=' + '<?php echo $ss_star; ?>' + '&have_dosh=' + '' + '&physical' + '' + '&occupation=' + '<?php echo $ss_occupation; ?>' + '&=annual_income' + '<?php echo $ss_annual_income; ?>' + '&keyword=' + '<?php echo $ss_keyword; ?>';
	}else{
		var dataString = 'gender=' + '<?php echo $gender; ?>' + '&religion=' + '<?php echo $Hresult['religion']; ?>' + '&matri_id=' + '<?php echo $_SESSION['search_matri_id']; ?>' + '&action=' + '<?php echo $_SESSION['action']; ?>'+ '&age_from=' +'<?php echo $_SESSION['age_from'];?>' + '&age_to=' + '<?php echo $_SESSION['age_to']; ?>' + '&caste' + '<?php echo $_SESSION['caste']; ?>'+ '&Hmatri_id=' + '<?php echo $Hmatri_id; ?>' + '&height_from=' + '<?php echo $_SESSION['height_from']; ?>' + '&height_to=' + '<?php echo $_SESSION['height_to']; ?>' + '&photo=' + '<?php echo $_SESSION['photo']; ?>' + '&education=' + '<?php echo $_SESSION['education']; ?>' + '&marital=' + '<?php echo $_SESSION['marital']; ?>' + '&country=' + '<?php echo $_SESSION['country']; ?>' + '&state=' + '<?php echo $_SESSION['state']; ?>' + '&city=' + '<?php echo $_SESSION['city']; ?>' + '&star=' + '<?php echo $_SESSION['star']; ?>' + '&have_dosh=' + '<?php echo $_SESSION['have_dosh']; ?>' + '&physical' + '<?php echo $_SESSION['physical']; ?>' + '&occupation=' + '<?php echo $_SESSION['occupation']; ?>' + '&=annual_income' + '<?php echo $_SESSION['annual_income']; ?>' + '&keyword=' + '<?php echo $_SESSION['keyword']; ?>';
	}
	$('.clearmstatus').click(function(){
		$('.marital').prop('checked', false);
			$("#frm_filter").trigger('change');
	}); 
	
	$('.clearLatest').click(function(){
		$('.profile_latest').prop('checked', false);
			$("#frm_filter").trigger('change');
	}); 
	
	$('.clearprofile').click(function(){
		$('.profile').prop('checked', false);
			$("#frm_filter").trigger('change');
	}); 
	
	$('.clearAge').click(function(){
		$(".age_from").find("option:selected").prop('selected',false);
		$(".age_to").find("option:selected").prop('selected',false);
			$("#frm_filter").trigger('change');
	});
	
	$('.height_clear').click(function(){
		$('select[name="height_from"]').find("option:selected").prop('selected',false);
		$('select[name="height_to"]').find("option:selected").prop('selected',false);
			$("#frm_filter").trigger('change');
	});
	
	$('.cleareducation').click(function(){
		$('.education').prop('checked', false);
			$("#frm_filter").trigger('change');
	});
	
	$('.clearoccupation').click(function(){
		$('.occupation').prop('checked', false);
			$("#frm_filter").trigger('change');
	});
	
	$('.clearcountry').click(function(){
		$('.country').prop('checked', false);
			$("#frm_filter").trigger('change');
	});
	
	$('.result_search').on('click', '.page-numbers', function(event) {
		event.preventDefault();
		var action = 'inner_search';
      var page = $(this).attr('data-page');
      var dataString = 'page=' + page + '&action=' + action + '&Hmatri_id=' + '<?php echo $Hmatri_id; ?>' + '&gender=' + '<?php echo $gender; ?>' + '&religion=' + '<?php echo $Hresult['religion']; ?>';

      $.ajax({
			  type: 'POST',
			  url: 'ajax_files/search_result.php',
			  data: dataString,
			  cache: false,
			  beforeSend: function(){
				$(".result_search").html('<div id="loaderID" style="position:fixed; left:50%; top:50%; z-index:-1; opacity:0"><div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange"><font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font></div></div>');
				},
			  success: function(response) {
				//console.log(response);
				$('.result_search').html(response);
			  }
		});
      return false;
    });
	
	
	$("#frm_filter").on('change', function(){
		var marital = [];
		var education = [];
		var occupation = [];
		var country = [];
		var action = 'inner_search';
		
		$('.marital:checked').each(function() { marital.push(this.value); });
		$('.education:checked').each(function() { education.push(this.value); });
		$('.occupation:checked').each(function() { occupation.push(this.value); });
		$('.country:checked').each(function() { country.push(this.value); });
		if($('.profile').is(':checked')){
			var profile = $('.profile:checked').val();
		}else{
			var profile = '';
		}
		if($('.profile_latest').is(':checked')){
			var profile_latest = $('.profile_latest:checked').val();
		}else{
			var profile_latest ='';
		}

		var age_from = $(".age_from option:selected").val();
		var age_to = $(".age_to option:selected").val();
		var height_from = $(".height_from option:selected").val();
		var height_to = $(".height_to option:selected").val();

		var dataString = 'gender=' + '<?php echo $gender; ?>' + '&religion=' + '<?php echo $Hresult['religion']; ?>' + '&action=' +  action + '&age_from=' + age_from + '&age_to=' + age_to + '&caste' + '<?php echo $_SESSION['caste']; ?>'+ '&Hmatri_id=' + '<?php echo $Hmatri_id; ?>' + '&height_from=' + height_from + '&height_to=' + height_to + '&photo=' + profile + '&education=' + education + '&marital=' + marital + '&country=' + country + '&state=' + '<?php echo $_SESSION['state']; ?>' + '&city=' + '<?php echo $_SESSION['city']; ?>' + '&star=' + '<?php echo $_SESSION['star']; ?>' + '&have_dosh=' + '<?php echo $_SESSION['have_dosh']; ?>' + '&physical' + '<?php echo $_SESSION['physical']; ?>' + '&occupation=' + occupation + '&=annual_income' + '<?php echo $_SESSION['annual_income']; ?>' + '&keyword=' + '<?php echo $_SESSION['keyword']; ?>' + '&profile_latest=' + profile_latest;
		//console.log(dataString);
		$.ajax({
			  type: 'POST',
			  url: 'ajax_files/search_result.php',
			  data: dataString,
			  cache: false,
			  beforeSend: function(){
				$(".result_search").html('<div id="loaderID" style="position:fixed; left:50%; top:50%; z-index:-1; opacity:0"><div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange"><font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font></div></div>');
				},
			  success: function(response) {
				//console.log(response);
				$('.result_search').html(response);
			  }
			});
	});
	
		$.ajax({
			  type: 'POST',
			  url: 'ajax_files/search_result.php',
			  data: dataString,
			  cache: false,
			  beforeSend: function(){
				 $(".result_search").html('<div id="loaderID" style="position:fixed;  left:50%; top:50%; z-index:-1; opacity:0"><div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange"><font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font></div></div>');
			   },
			  success: function(response) {
				//console.log(response);
				$('.result_search').html(response);
			  }
			});
})
</script>
</body>
</html>