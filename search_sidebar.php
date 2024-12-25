<div class="panel-grid">
          <ul>
            <li class="text-center bg-red list-title"> <i class="fa fa-filter me-1"> </i>Refine Search <i class="fa fa-caret-down ms-1"></i></li>
          </ul>
        </div>
		<form method="post" name="frm_filter" id="frm_filter">
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Latest Register Profile</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearLatest" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_list">
              <label for="f-1">
                <input type="radio" name="profile_latest" class="profile_latest" value="1">
                <span>Today Register Profile </span> </label>
            </div>
            <div class="refine_list">
              <label for="f-2">
                <input type="radio" name="profile_latest" class="profile_latest" value="3">
                <span>Last Three Days Register Profile </span> </label>
            </div>
            <div class="refine_list">
              <label for="f-3">
                <input type="radio" name="profile_latest" class="profile_latest" value="7">
                <span>Last Week Register Profile </span> </label>
            </div>
            <div class="refine_list">
              <label for="f-4">
                <input type="radio" name="profile_latest" class="profile_latest" value="30">
                <span>Last Month Register Profile </span> </label>
            </div>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Profile Type</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearprofile" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_list">
              <label for="f-1">
                <input type="radio" name="profile" class="profile" value="yes" <?php if($_SESSION['photo'] == 'yes'){echo'checked';}?>>
                <span>With Photo</span> </label>
            </div>
            <div class="refine_list">
              <label for="f-3">
                <input type="radio" name="profile" class="profile" value="">
                <span>Does not matter</span> </label>
            </div>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Marital Status</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearmstatus" href="javascript:void(1);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_list">
              <label for="f-1">
                <input type="checkbox" name="marital" class="marital" value="Never Married" <?php if($_SESSION['marital'] == 'Never Married'){echo'checked';}?>>
                <span>Never Married </span> </label>
            </div>
            <div class="refine_list">
              <label for="f-2">
                <input type="checkbox" name="marital" class="marital" value="Widow" <?php if($_SESSION['marital'] == 'Widow'){echo'checked';}?>>
                <span>Widower</span> </label>
            </div>
            <div class="refine_list">
              <label for="f-3">
                <input type="checkbox" name="marital" class="marital" value="Divorced" <?php if($_SESSION['marital'] == 'Divorced'){echo'checked';}?>>
                <span>Divorced</span> </label>
            </div>
            <div class="refine_list">
              <label for="f-4">
                <input type="checkbox" name="marital" class="marital" value="Awaiting Divorce" <?php if($_SESSION['marital'] == 'Awaiting Divorce'){echo'checked';}?>>
                <span>Awaiting Divorce</span> </label>
            </div>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Age</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearAge" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="form-row">
              <select class="form-select age_from" name="age_from">
                <option value="">From </option>
                <?php foreach(age() as $age){ ?>
                    <option value="<?php echo $age; ?>" <?php if($age == $_SESSION['age_from']){echo 'selected';} ?>><?php echo $age; ?></option>
				<?php } ?>
              </select>
            </div>
            <div class="form-row to"> TO </div>
            <div class="form-row">
              <select class="form-select age_to" name="age_to"> 
                <option value="">To</option>
				<?php foreach(age() as $age){ ?>
                    <option value="<?php echo $age; ?>" <?php if($age == $_SESSION['age_to']){echo 'selected';} ?>><?php echo $age; ?></option>
				<?php } ?>
              </select>
            </div>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Height</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear height_clear" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="form-row">
              <select class="form-select height_from" name="height_from">
                <option value="">From</option>
                <?php
					foreach(height() as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php if($key == $_SESSION['height_from']){echo 'selected';}?>><?php echo $value; ?></option>
					<?php }
				?>
              </select>
            </div>
            <div class="form-row to"> TO </div>
            <div class="form-row"> 
              <select class="form-select height_to" name="height_to">
                <option value="">To</option>
				<?php
					foreach(height() as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php if($key == $_SESSION['height_to']){ echo 'selected'; }?>><?php echo $value; ?></option>
					<?php } ?>
              </select>
            </div>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Education</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear cleareducation" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_search">
              <input class="search form-control" placeholder="Search">
            </div>
			<?php foreach(education() as $education){ ?>
				<div class="refine_list">
					<label for="f-1">
						<input type="checkbox" name="education" class="education" value="<?php echo $education['edu_id']; ?>" <?php if($education['edu_id'] == $_SESSION['education']){echo'checked';}?>>
					<span><?php echo $education['edu_name']; ?></span> </label>
				</div>
			<?php } ?>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Occupation</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearoccupation" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_search">
              <input class="search form-control" placeholder="Search">
            </div>
			<?php foreach(occupation() as $occupations){ ?>
				<div class="refine_list">
					<label for="f-1">
						<input type="checkbox" name="occupation" class="occupation" value="<?php echo $occupations['ocp_id']; ?>" <?php if($occupations['ocp_id'] == $_SESSION['occupation']){echo'checked';}?>>
						<span><?php echo $occupations['ocp_name']; ?></span> 
					</label>
				</div>
			<?php } ?>
          </div>
        </div>
        <!-- Refine Left -->
        <div class="refine_grid">
          <div class="refine_top">
            <div class="row">
              <div class="col-lg-8 col-sm-12">
                <h3>Country Living In</h3>
              </div>
              <div class="col-lg-4 col-sm-12"><a class="clear clearcountry" href="javascript:void(0);"><i class="fa fa-times-circle"></i> Clear</a></div>
            </div>
          </div>
          <div class="refine_body">
            <div class="refine_search">
              <input class="search form-control" placeholder="Search">
            </div> 
			<?php foreach(country() as $counties){ ?>
				<div class="refine_list">
					<label for="f-1">
					<input type="checkbox" name="country" class="country" value="<?php echo $counties['country_id']; ?>" <?php if($counties['country_id'] == $_SESSION['country']){echo'checked';}?>>
					<span><?php echo $counties['country_name']; ?></span> </label>
				</div>
			<?php } ?>
          </div>
        </div>
		</form>