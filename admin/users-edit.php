<?php
session_start();

include '../constants.php';
include '../helper.php';
include '../db/connection.php';

if(! checkUserIsLoggedIn()){
    header('Location: ' . BASE_URL);
}

include BASE_PATH . '/includes/display-errors.php';
require BASE_PATH . '/includes/admin/header.php';

if(! isset($_GET['id']) || empty($_GET['id']) || $_GET['id'] == null){
    header('location: ' . BASE_URL . '/admin/users.php');
}

$sql = "select * from users where id=" . $_GET['id'];
$user = $mysqli->query($sql)->fetch_object();
//echo '<pre>';print_r($user);exit;
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Form title</h2>
            </div>
            <div class="card-body">
                <form action="users-update.php?id=<?php echo $user->id ?? null; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="name_of_mate">Name 0f Mate</label>
                            <input class="form-control" type="text" name="full_name" id="name_of_mate" placeholder="Name Of Mate" value="<?php echo $user->full_name ?? null; ?>">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="photo_of_mate">Photograph of Mate</label>
                            <input type="file" name="photo" class="form-control" id="photo_of_mate">
                            <img src="../<?php echo $user->photo; ?>" width="200" />

                            <!--                 Display Cropped Image -->
                            <img id="cropped-image" src="" style="display:none;">

                            <!-- Display Cropped Image Filename -->
                            <!--                <input id="cropped-image-filename" type="text" readonly>-->


                            <!-- Modal -->
                            <div class="modal" id="crop-modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Crop Image</h2>
                                    </div>
                                    <div class="modal-body">
                                        <div id="cropper-container">
                                            <img id="cropper-image" src="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="crop-confirm" class="btn">Confirm Crop</button>
                                    </div>
                                </div>
                            </div>



                            <!--                <input class="form-control" type="file" id="photo_of_mate" name="photo_of_mate" accept="image/jpeg,image/png" onchange="validateImage(this)">-->
                            <!--                <small class="text-danger error" id="error"></small>-->
                            <!--                <input class="form-control" type="file" name=""  placeholder="Name Of Mate" required>-->
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label class="text-white" for="name_of_department">Name Of Department</label>
                            <select class="form-select" aria-label="Default select example" id="name_of_department" name="department">
                                <option value="">Select Department</option>
                                <?php
                                include '../config/departments.php';
                                foreach($departments as $key => $value){
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php echo ($user->department ?? null) == $key ? ' selected' : null; ?>><?php echo $value ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="contact_number">Contact Number</label>
                            <input class="form-control" type="number" name="contact_no" id="contact_number" placeholder="Contact number" value="<?php echo $user->contact_no ?? null; ?>"
                            >
                        </div
                        >
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="email_address">Email Address</label>
                            <input class="form-control" type="email" name="email" id="email_address"
                                   placeholder="Email Address" value="<?php echo $user->email ?? null; ?>" >
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="home_district">Home District</label>
                            <input class="form-control" type="text" name="home_district" id="home_district"
                                   placeholder="Home District" value="<?php echo $user->home_district ?? null;?>" >
                        </div>


                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="occupation">Occupation</label>
                            <input class="form-control" type="text" name="occupation" id="occupation"
                                   placeholder="Occupation" value="<?php echo $user->occupation ?? null; ?>" >
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="designation">Designation</label>
                            <input class="form-control" type="text" name="designation" id="designation"
                                   placeholder="Designation" value="<?php echo $user->designation ?? null; ?>" >
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="blood_group">Blood Group</label>
                            <select class="form-select" aria-label="Default select example" id="blood_group" name="blood_group">
                                <?php
                                include '../config/blood-groups.php';
                                foreach($bloodGroups as $key => $value){
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php ($user->blood_group ?? null) == $key ? ' selected' : null; ?>><?php echo $value; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="permanent_address">Permanent Address</label>
                            <textarea class="form-control" name="permanent_address" id="permanent_address" cols="30" rows="4"><?php echo $user->permanent_address ?? null; ?></textarea>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="text-white" for="present_address">Present Address</label>
                            <textarea class="form-control" name="present_address" id="present_address" cols="30" rows="4"><?php echo $user->present_address ?? null; ?></textarea>
                        </div>

                    </div>
                    <div class="text-center">

                        <button type="submit" class="btn btn-success w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

<?php
include BASE_PATH . '/includes/admin/footer.php';