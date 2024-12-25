<?php 
			$date = date('d-F-Y g:i a');
			$nameOfDay = date('l', strtotime($date));
			?>
			<!-- Modal Send Request -->
  <div class="modal fade" id="sendrequest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-heart me-2 text-danger"> </i>Express Interest </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="div_saved_search">
          <ul class="list-unstyled">
            <li>
              <label for="interest-1" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="I am interested in your profile. Please Accept if you are interested." id="interest-1" checked>
                I am interested in your profile. Please Accept if you are interested. </label>
            </li>
            <li>
              <label for="interest-2" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="You are the kind of person we have been looking for. Please respond to proceed further." id="interest-2">
                You are the kind of person we have been looking for. Please respond to proceed further. </label>
            </li>
            <li>
              <label for="interest-3" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value=" We liked your profile and interested to take it forward. Please reply at the earliest." id="interest-3">
                We liked your profile and interested to take it forward. Please reply at the earliest. </label>
            </li>
            <li>
              <label for="interest-4" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further." id="interest-4">
                You seem to be the kind of person who suits our family. We would like to contact your parents to proceed further. </label>
            </li>
            <li>
              <label for="interest-5" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="You profile matches my sister's/brother's profile. Please 'Accept' if you are interested." id="interest-5">
                You profile matches my sister's/brother's profile. Please 'Accept' if you are interested. </label>
            </li>
            <li>
              <label for="interest-6" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="Our children's profile seems to match. Please reply to proceed further." id="interest-6">
                Our children's profile seems to match. Please reply to proceed further. </label>
            </li>
            <li>
              <label for="interest-7" class="gt-font-weight-500">
                <input name="exp_interest" class="radio-inline" type="radio" value="We find a good life partner in you for our friend. Please reply to proceed further." id="interest-7">
                We find a good life partner in you for our friend. Please reply to proceed further. </label>
            </li>
          </ul>
        </div>
        <div class="modal-footer btn_modal">
          <p class="footer-left text-danger">Date - <small><?php echo $nameOfDay . ' ' . $date; ?></small></p>
          <button type="button" class="btn btn-primary Send_Interest" data-myid="" data-viewed="">Send Interest</button>
          <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>