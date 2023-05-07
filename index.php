<?php
session_start();

include 'helper.php';

if(checkUserIsLoggedIn()){
    header('Location: ' . ($_SESSION['user_role'] == 'admin' ? ($_SESSION['user_role'] . '/') : null) . 'dashboard.php');
}

include 'includes/header.php';
?>
<!--**********************************
              Signup
 ***********************************-->
 <div class="g-signup-form-area">
    <div class="container">
        <div class="row">

            <div class="col-md-4 mx-auto">

                <div class="g-signup-main">
                    <div class="text-center">
                        <h4 class="text-white">Login</h4>
                    </div>
                    <form action="post-login.php" method="post">

                        <div class="form-group mb-3">
                            <label class="text-white" for="user_email">User Name (Email Address)</label>
                            <input class="form-control" type="text" name="email" id="user_email" placeholder="User Name(Email Address)"
                                   required value="developer.chayansarker+1@gmail.com">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-white" for="user_password">Password</label>
                            <input class="form-control" type="password" name="password" id="user_password" placeholder="Password" required value="1234">
                        </div
                        >

                        <div class="d-flex gap-2 mt-4">
                            <a role="button" href="register.php" class="btn btn-secondary w-100">Register</a>
                            <button type="submit" class="btn btn-success w-100">Login</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </div>
</div>

<?php
include 'includes/footer.php';