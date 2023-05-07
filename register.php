<?php
include 'helper.php';
include 'includes/header.php';
?>

<!--**********************************
              Signup
 ***********************************-->
 <div class="g-signup-form-area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">

        <div class="g-signup-main">
          <div class="text-center">
            <h4 class="text-white">Registration Form</h4>
          </div>

          <?php
          //include 'includes/validation-errors.php';
          ?>

          <form action="post-register.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="name_of_mate">Name 0f Mate</label>
                <input class="form-control" type="text" name="full_name" id="name_of_mate" placeholder="Name Of Mate" >
                <?php echo displayValidationError('full_name'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="photo_of_mate">Photograph of Mate</label>
                <input type="file" name="photo" class="form-control" id="photo_of_mate">
                <?php echo displayValidationError('photo'); ?>
              </div>
              <div class="form-group col-md-12 mb-3">
                <label class="text-white" for="name_of_department">Name Of Department</label>
                <select class="form-select" aria-label="Default select example" id="name_of_department" name="department">
                  <option selected value="">Select Department</option>
                  <?php
                  include 'config/departments.php';
                  foreach($departments as $key => $value){
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value ?></option>
                    <?php
                  }
                  ?>
                </select>
                <?php echo displayValidationError('department'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="contact_number">Contact Number</label>
                <input class="form-control" type="number" name="contact_no" id="contact_number" placeholder="Contact number"
                       >
                <?php echo displayValidationError('contact_no'); ?>
              </div
              >
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="email_address">Email Address</label>
                <input class="form-control" type="email" name="email" id="email_address"
                       placeholder="Email Address" >
                <?php echo displayValidationError('email'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="home_district">Home District</label>
                <input class="form-control" type="text" name="home_district" id="home_district"
                       placeholder="Home District" >
                <?php echo displayValidationError('home_district'); ?>
              </div>


              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="occupation">Occupation</label>
                <input class="form-control" type="text" name="occupation" id="occupation"
                       placeholder="Occupation" >
                <?php echo displayValidationError('occupation'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="designation">Designation</label>
                <input class="form-control" type="text" name="designation" id="designation"
                       placeholder="Designation" >
                <?php echo displayValidationError('designation'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="blood_group">Blood Group</label>
                <select class="form-select" aria-label="Default select example" id="blood_group" name="blood_group">
                  <?php
                  include 'config/blood-groups.php';
                  foreach($bloodGroups as $key => $value){
                  ?>
                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                  <?php
                  }
                  ?>
                </select>
                <?php echo displayValidationError('blood_group'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="permanent_address">Permanent Address</label>
                <textarea class="form-control" name="permanent_address" id="permanent_address" cols="30" rows="4"></textarea>
                <?php echo displayValidationError('permanent_address'); ?>
              </div>
              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="present_address">Present Address</label>
                <textarea class="form-control" name="present_address" id="present_address" cols="30" rows="4"></textarea>
                <?php echo displayValidationError('present_address'); ?>
              </div>

              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password"
                       placeholder="Password" >
                <?php echo displayValidationError('password'); ?>
              </div>

              <div class="form-group col-md-6 mb-3">
                <label class="text-white" for="confirm_password">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password"
                       placeholder="Confirm Password" >
                <?php echo displayValidationError('confirm_password'); ?>
              </div>

            </div>
            <div class="text-center">

              <button type="submit" class="btn btn-success w-50">Submit</button>
            </div>
          </form>

        </div>

      </div>

    </div>
  </div>
</div>

<?php

clearValidationErrorsFromSession();

include 'includes/footer.php';