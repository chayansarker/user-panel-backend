<?php

session_start();

include 'includes/display-errors.php';

require_once 'db/connection.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(isset($_POST['email']) && isset($_POST['password']) && ! empty($_POST['email'] && ! empty($_POST['password']))){
        
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string(md5($_POST['password']));

        $sql = 'select id, email, password, role from users where email="' . $email . '" and password="' . $password . '"';

        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                $user = $result->fetch_object();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_role'] = $user->role;

                header('Location: ' . ($user->role == 'admin' ? ($user->role . '/') : '') . 'dashboard.php');
            }else{
                header('Location: register.php');
            }
        }else{
            header('Location: register.php');
        }
    }
}

$mysqli->close();
?>