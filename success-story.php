<!DOCTYPE HTML>
<html>

<?php 
require_once('head.php');
?>

<body>
<?php require_once('header.php'); ?>
  <!-- End Header-->
  <section class="page-success pt-3 p-5 ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
         <h2 class="text-center"> <i class="fa fa-heart gt-margin-right-10 gt-text-orange"></i> Happy Marriages</h2>
         <p class="text-center">Check it out our success stories who found their life partner here. </p>
         <div class="tabing_grid">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#home">Success Stories</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Post your success story</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div id="home" class="container tab-pane active p-4"><br>
    <h3 class="text-center">Success Story </h3>
    <p class="text-center">Some of our happily married couples story</p>
  </div>
  <div id="menu1" class="container tab-pane fade p-4"><br>
    <h3 class="text-center">Post Success Story </h3>
    <p class="text-center">Post your success story here</p>   
    <form>
      <div class="form-row form-tab mt-4">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Bride Id <span>*</span></label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <input type="text" class="form-control" placeholder="Enter Bride Id">
      </div>
        </div>
        </div>
      <div class="form-row form-tab mt-3">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Bride Name <span>*</span></label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <input type="text" class="form-control" placeholder="Enter Bride Name">
      </div>
        </div>
        </div>
      <div class="form-row form-tab mt-3">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Groom Id <span>*</span></label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <input type="text" class="form-control" placeholder="Enter Groom Id">
      </div>
        </div>
        </div>
      <div class="form-row form-tab mt-3">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Groom Name <span>*</span></label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <input type="text" class="form-control" placeholder="Enter Groom Name">
      </div>
        </div>
        </div>
      <div class="form-row form-tab mt-3">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Engagement Date <span>*</span> </label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Day</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Month</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Year</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
        </div>
      </div>
        </div>
        </div>
      <div class="form-row form-tab mt-3">
        <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12">
        <label>Marriage Date <span>*</span> </label>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Day</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Month</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Year</option>
              <option value="Self">1</option>
              <option value="Parents">2</option>
            </select>
          </div>
        </div>
      </div>
        </div>
        </div>
        <div class="form-row form-tab mt-3">
          <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
          <label>Upload Photo <span>*</span></label>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <input class="form-control" type="file" id="formFile">
        </div>
          </div>
          </div>
        <div class="form-row form-tab mt-3">
          <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
          <label>Address</label>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <textarea class="form-control" ></textarea>
        </div>
          </div>
          </div>
        <div class="form-row form-tab mt-3">
          <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
          <label>Country Living In <span>*</span></label>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <select class="form-select" aria-label="Default select example">
            <option selected="">Select Your Country</option>
            <option value="Self">1</option>
            <option value="Parents">2</option>
          </select>
        </div>
          </div>
          </div>
        <div class="form-row form-tab mt-3">
          <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
          <label>Success Story <span>*</span></label>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <textarea class="form-control" ></textarea>
        </div>
          </div>
          </div>
        <div class="form-row form-tab mt-3">
          <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12">
         
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <button type="submit" class="btn btn-primary"> Submit</button>
        </div>
          </div>
          </div>
 
    </form>
    <div class="text-center grid-topic mt-4">
      <h4>Which topics you can write as your success story </h4>
      <ul>
        <li>- How you create your id and how you became our user.</li>
        <li>- how you think that your perfect and process further.    </li>
        <li>- How you you contact your partner </li>
        <li>- what do you think about our website and experience.    </li>
      </ul>
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

  <!-- Start Footer-->
<?php require_once('footer.php'); ?>
  <script src="js-new/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c39c442009.js" crossorigin="anonymous"></script>
</body>

</html>