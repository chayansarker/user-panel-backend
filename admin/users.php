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
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

            <div class="card">
                <div class="card-header">
                    <h2>Users</h2>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = 'select * from users where role="user" and deleted_at is null';
                                    $result = $mysqli->query($sql);
                                    $users = $result->fetch_all(MYSQLI_ASSOC);
                                    //echo '<pre>';print_r($users);
                                    foreach($users as $user){
                                    ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['full_name']; ?></td>
                                    <td>
                                        <img src="../<?php echo $user['photo']; ?>" width="50" />
                                    </td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="users-edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                                        <a class="btn btn-danger" href="users-delete.php?id=<?php echo $user['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

        </main>

<?php
include BASE_PATH . '/includes/admin/footer.php';