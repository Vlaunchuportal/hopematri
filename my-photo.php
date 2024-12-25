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
	<!-- End Header-->
	<section class="my-profile pt-3 p-5 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
					<div class="profile_head">
						<h2 class="text-red">Upload & Profile Picture Settings</h2>
						<p>Here is your option to set your profile pictures and other pictures.Remember upload profile picture gives you 10 times better respose.So do it now if you didnt. </p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-5 col-sm-12 mt-2">
						<?php
						require_once('sidebar.php');
						?>
					</div>
					<div class="col-lg-9 col-md-7 col-sm-12 mt-2">

						<!-- <div class="no-data">
              <img src="images/nodata-available.jpg " alt="#">
            </div> -->
						<div class="my_photo_grid">
							<div class="my_photo_head">
								<h4>Change Or Upload Profile Picture</h4>
							</div>
							<div class="my_photo_body">
								<h3>Photo Privacy Status:-</h3>
								<a href="/settings.php?photoVisiblity" class="btn btn-primary">SET PHOTO PRIVACY</a>
								<div class="change_img mt-3">
									<div class="row">
										<div class="col-lg-5 col-md-12 col-sm-12">
											<div class="change_img_grid text-center">
												<?php
												$profile_pic = profile_pic(1, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<!--img src="images/user-img.jpg"-->
												<a class="btn btn-blue mt-3 profile" href="#" data-id="1">Change Profile Picture</a>
												<a class="btn btn-primary mt-3 Delprofile" href="#" data-id="1" data-del="<?php echo $matri_id; ?>"> Delete Profile Picture</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="my_photo_grid mt-4">
							<div class="my_photo_head">
								<h4>Upload More Photoes</h4>
							</div>
							<div class="my_photo_body">
								<div class="change_img ">
									<div class="row">
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<div class="change_img_grid text-center">
												<!--img src="images/user-img.jpg"-->
												<?php
												$profile_pic = profile_pic(2, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<a class="btn btn-blue mt-3 profile" href="#" data-id="2">Edit Photo 2</a>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<div class="change_img_grid text-center">
												<!--img src="images/user-img.jpg"-->
												<?php
												$profile_pic = profile_pic(3, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<a class="btn btn-blue mt-3 profile" href="#" data-id="3">Edit Photo 3</a>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<div class="change_img_grid text-center">
												<!--img src="images/user-img.jpg"-->
												<?php
												$profile_pic = profile_pic(4, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<a class="btn btn-blue mt-3 profile" data-id="4" href="#">Edit Photo 4</a>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<div class="change_img_grid text-center">
												<!--img src="images/user-img.jpg"-->
												<?php
												$profile_pic = profile_pic(5, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<a class="btn btn-blue mt-3 profile" href="#" data-id="5">Edit Photo 5</a>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<div class="change_img_grid text-center">
												<!--img src="images/user-img.jpg"-->
												<?php
												$profile_pic = profile_pic(6, $matri_id, $_SESSION['gender']);
												echo $profile_pic;
												?>
												<a class="btn btn-blue mt-3 profile" href="#" data-id="6">Edit Photo 6</a>
											</div>
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
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Profile Picture</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<p>Select image and then click on submit button to upload image</p>
					<div class="change_img_grid text-center">
						<!--form method="post" name="photo" id="gallery"-->
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="galleryy">
							<img src="img/male.png" id="photo_prev">
							<input type="file" name="photo" id="photo" onchange="readURL1(this);">
							<input type="hidden" name="matri_id" value="<?php echo $matri_id; ?>">
							<input type="hidden" name="id" id="photo_id">
							<!--a class="btn btn-blue mt-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Select Image</a-->
							<button type="submit" class="btn btn-primary mt-3" name="gallery_submit" id="gallery_submit">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js-new/jquery.min.js"></script>
	<script src="js-new/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
	<!-- Start Footer-->
	<?php require_once('footer.php'); ?>
	<script>
	$('.profile').click(function(){	
		$('#exampleModal').modal('show');
		var id = $(this).attr('data-id');
		$('#photo_id').val(id);
		$('#photo').attr('name','photo'+id);
		var photo = $('.photo'+id).attr('src');
		$('#photo_prev').attr('src',photo);
	});

		  function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_prev')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	$(document).ready(function(){
		$('#gallery_submit').click(function(event){
			event.preventDefault();
			var form = $("#galleryy");
			var formData = new FormData($("#galleryy")[0]);
			$.ajax({
                     url: 'ajax_files/gallery.php',
                     method: "post",
                     data: formData,
                     contentType: false,
                     processData: false,
                    success: function(data){
						alert(data);
						//console.log(data);
						location.reload();
						
                    }
            });
		});
		$('.Delprofile').click(function(event){
			event.preventDefault();
			var del = $(this).attr('data-del');
			var answer = confirm ("Are you sure");
			if (answer){
				$.ajax({
					type: 'POST',
					url: 'ajax_files/profile_delete.php',
					data: {del:del},
					cache: false,
					success: function(response) {
						alert(response);
						//console.log(response);
						location.reload();
					}
				});
			}
		});
	});
	</script>
</body>

</html>