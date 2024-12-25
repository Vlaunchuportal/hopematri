<!DOCTYPE HTML>
<html>

<?php 
require_once('head.php');
?>
<style>
select option:disabled {
    color: #ddd;
}
</style>
<body>
<?php 
require_once('header.php'); 
//require_once('function.php');
$castes = caste($Hresult['religion']);
//print_r($_SESSION);
/******************* Quick Search **************************/
if(isset($_POST['quick_search'])){
	unset($_SESSION['search_matri_id']);

	$_SESSION['action'] = 'quick_search';
	$_SESSION['age_from'] = $_POST['age_from'];
	$_SESSION['age_to'] = $_POST['age_to'];
	$_SESSION['caste'] = $_POST['caste'];
	echo "<script>window.location='search_result.php'</script>";
}
/******************* Basic Search **************************/
if(isset($_POST['basic_btn'])){
	unset($_SESSION['search_matri_id']);

	$_SESSION['action'] = 'basic_search';
	$_SESSION['age_from'] = $_POST['age_from'];
	$_SESSION['age_to'] = $_POST['age_to'];
	$_SESSION['height_from'] = $_POST['height_from'];
	$_SESSION['height_to'] = $_POST['height_to'];
	$_SESSION['marital'] = $_POST['marital'];
	$_SESSION['caste'] = $_POST['caste'];
	$_SESSION['country'] = $_POST['country'];
	$_SESSION['state'] = $_POST['state'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['education'] = $_POST['education'];
	$_SESSION['photo'] = $_POST['photo'];
	
	echo "<script>window.location='search_result.php'</script>";
}
/******************* Advanced Search **************************/
if(isset($_POST['advanced_btn'])){
	unset($_SESSION['search_matri_id']);

	$_SESSION['action'] = 'advanced_search';
	$_SESSION['age_from'] = $_POST['age_from'];
	$_SESSION['age_to'] = $_POST['age_to'];
	$_SESSION['height_from'] = $_POST['height_from'];
	$_SESSION['height_to'] = $_POST['height_to'];
	$_SESSION['marital'] = $_POST['marital'];
	$_SESSION['physical'] = $_POST['physical'];
	$_SESSION['caste'] = $_POST['caste'];
	$_SESSION['country'] = $_POST['country'];
	$_SESSION['state'] = $_POST['state'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['education'] = $_POST['education'];
	$_SESSION['occupation'] = $_POST['occupation'];
	$_SESSION['annual_income'] = $_POST['annual_income'];
	$_SESSION['star'] = $_POST['star'];
	$_SESSION['have_dosh'] = $_POST['have_dosh'];
	
	echo "<script>window.location='search_result.php'</script>";
}
/******************* Keyword Search **************************/
if(isset($_POST['keyword_btn'])){
	unset($_SESSION['search_matri_id']);
	
	$_SESSION['action'] = 'keyword_search';
	$_SESSION['keyword'] = $_POST['keyword'];
	$_SESSION['photo'] = $_POST['photo'];
	echo "<script>window.location='search_result.php'</script>";
}
/******************* Location Search **************************/
if(isset($_POST['location_btn'])){
	unset($_SESSION['search_matri_id']);
	
	$_SESSION['action'] = 'location_search';
	$_SESSION['country'] = $_POST['country'];
	$_SESSION['state'] = $_POST['state'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['photo'] = $_POST['photo'];
	echo "<script>window.location='search_result.php'</script>";
}
/******************* Occupation Search **************************/
if(isset($_POST['occ_search'])){
	unset($_SESSION['search_matri_id']);
	
	$_SESSION['action'] = 'occ_search';
	$_SESSION['education'] = $_POST['education'];
	$_SESSION['occupation'] = $_POST['occupation'];
	$_SESSION['income'] = $_POST['income'];
	echo "<script>window.location='search_result.php'</script>";
}
if(isset($_POST['search'])){
	$_SESSION['search_matri_id'] = $_POST['matri_id'];
	$_SESSION['action'] = 'matri_id_search';
	 echo "<script>window.location='search_result.php'</script>";
}
?>
  <!-- End Header-->
  <section class="page-success pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
         <h2 > Search Options </h2>
         <p >Search perfect partner with our multiple search options which help you to find out perfect partner for life. </p>
        <div class="row mt-4">
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="tabing_grid search_tabing">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['quick'])){echo "active";}?>" data-bs-toggle="tab" href="#home">Quick Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['basic'])){echo "active";}?>" data-bs-toggle="tab" href="#menu1">Basic Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['advanced'])){echo "active";}?>" data-bs-toggle="tab" href="#menu2">Advanced Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['keyword'])){echo "active";}?>" data-bs-toggle="tab" href="#menu3">Keyword Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['location'])){echo "active";}?>" data-bs-toggle="tab" href="#menu4">location Search</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($_GET['occupation'])){echo "active";}?>" data-bs-toggle="tab" href="#menu5">Occupation Search</a>
                </li>
              </ul>
              
              <!-- Tab panes --> 
              <div class="tab-content">
                <div id="home" class="container tab-pane <?php if(isset($_GET['quick'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3>Quick Search</h3>
                  <?php include_once('my_account/search/quick_search.php'); ?>
                </div>
                <div id="menu1" class="container tab-pane <?php if(isset($_GET['basic'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3 >Basic Search</h3>
					<?php include_once('my_account/search/basic_search.php'); ?>
                  </div>
                <div id="menu2" class="container tab-pane <?php if(isset($_GET['advanced'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3 >Advanced Search</h3>
					<?php include_once('my_account/search/advanced_search.php'); ?>
                  </div>
                <div id="menu3" class="container tab-pane <?php if(isset($_GET['keyword'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3>Keyword Search</h3>
					<?php include_once('my_account/search/keyword_search.php'); ?>
                  </div>
                <div id="menu4" class="container tab-pane <?php if(isset($_GET['location'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3>Location Search</h3>
					<?php include_once('my_account/search/location_search.php'); ?>
                  </div>
                <div id="menu5" class="container tab-pane <?php if(isset($_GET['occupation'])){echo "active";} else{ echo"fade"; } ?> ps-4"><br>
                  <h3>Occupation Search</h3>
					<?php include_once('my_account/search/occupation_search.php'); ?>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 ml-lg-2 col-md-12 col-sm-12">
            <div class="searh_by_id">
              <div class="search_head">
                Search By Id
              </div>
              <div class="seach_body">
				<form method="post" name="search_id" id="search_id"> 
                <div class="form-row">
                  <label>Enter Matri Id:</label>
                  <input type="text" name="matri_id" class="form-control" >
                  <p class="mt-2">Example - MT123456 </p>
                </div>
                <div class="form-row text-center">
				  <!--button type="submit" id="search" name="search" class="btn btn-primary"> Search Now</button-->
                  <input type="submit" name="search" value="Search Now" class="btn btn-blue">
                </div>
				</form>
              </div>
            </div>
          </div>
        </div>
</div>
          
         </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="saved_serach" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Save Search </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="div_saved_search">
			<form name="saved_search_form" id="saved_search_form" method="post" action="">
        		<div class="modal-body" id="div_saved_search">
            		<div class="col-xs-16">  
                        <label>Saved Search Name :</label> 
            			<input type="text" name="txt_saved_search_name" id="txt_saved_search_name" class="form-control">
            			<input type="hidden" name="matri_id_search" id="matri_id_search" value="<?php echo $Hmatri_id; ?>" class="form-control">
            		</div>
                    <div class="clearfix"></div>
				</div>
        				
        		<div class="modal-body col-xs-16" id="div_success" style="display: none;"></div>
            </form>
        </div>
        <div class="modal-footer btn_modal">
          <button type="button" class="btn btn-primary saved_serach_btn" data-search-name="">Submit</button>
          <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js-new/jquery.min.js"></script>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
  <!-- Start Footer--><?php require_once('footer.php'); ?>
  
  <script>
      window.$(document).ready(function () {
        window.$(".chosen").chosen();
    });
    window.$('select').chosen({ width: '100%' });
	
  $(document).ready(function(e) {
	$('.quick_saved_search').click(function() { $("#saved_serach").modal('show'); $('.saved_serach_btn').attr('data-search-name','quick');});
	$('.basic_saved_search').click(function() { $("#saved_serach").modal('show');  $('.saved_serach_btn').attr('data-search-name','basic');});
	$('.keyword_saved_search').click(function() { $("#saved_serach").modal('show'); $('.saved_serach_btn').attr('data-search-name','keyword'); });
	$('.location_saved_search').click(function() { $("#saved_serach").modal('show'); $('.saved_serach_btn').attr('data-search-name','location');});
	$('.occupation_saved_search').click(function() { $("#saved_serach").modal('show'); $('.saved_serach_btn').attr('data-search-name','occupation');});
	$('.advanced_saved_search').click(function() { $("#saved_serach").modal('show'); $('.saved_serach_btn').attr('data-search-name','advanced');});
	
	$('.saved_serach_btn').click(function() {
		var txt_saved_search_name = $("#txt_saved_search_name").val();
		var matri_id_search = $("#matri_id_search").val();
		var data_search_name = $(".saved_serach_btn").attr('data-search-name');
		if(txt_saved_search_name==''){
			alert('Please fill up the saved search name.');
		}else{
			$.ajax({
          type: 'POST',
          url: 'ajax_files/saved_search.php',
          data : $('#'+data_search_name).serialize()+"&txt_saved_search_name="+txt_saved_search_name+"&matri_id_search="+matri_id_search,
          cache: false,
          success: function(response) {
            console.log(response);
          }
        });
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
			$(".state").trigger("chosen:updated");
          }
        });
      });
	  
	  $('.state').change(function() {
        var state = $('.state option:selected').val();
        $.ajax({
          type: 'GET',
          url: 'ajax_files/city.php',
          data: {
            state: state
          },
          cache: false,
          success: function(response) {
            //console.log(response);
            $('.city').find('option').remove().end().append(response);
			$(".city").trigger("chosen:updated");
          }
        });
      });
    });
  </script>
</body>
</html>