<?php
session_start();
include "includes/display-errors.php";
require_once 'db/connection.php';
require_once 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $validationErrors = [];

    if(! isset($_POST['full_name']) || empty($_POST['full_name'])) {
        $validationErrors['full_name'] = 'The name field is required.';
    }

    if(! isset($_FILES['photo']) || empty($_FILES['photo']) || ! file_exists($_FILES["photo"]["tmp_name"])){
        $validationErrors['photo'] = 'The photo field is required.';
    }else{
        //echo '<pre>';print_r($_FILES['photo']);exit();
        $fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);
        $width = $fileinfo[0] ?? null;
        $height = $fileinfo[1] ?? null;

        // Get image file extension
        $fileExtension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
        //echo $fileinfo;exit;

        if (! in_array($fileExtension, $allowedfileExtensionsImg)) {
            $validationErrors['photo'] = 'The photo extension is invalid.';
        }    // Validate image file size
        else if (($_FILES["photo"]["size"] > 2000000)) { // 2MB
            $validationErrors['photo'] = 'The photo size not greater than 2MB.';
        }    // Validate image file dimension
        else if ($width > 300 || $height > 200) {
            $validationErrors['photo'] = 'The photo dimension is invalid.';
        }
    }

    if(! isset($_POST['department']) || empty($_POST['department'])){
        $validationErrors['department'] = 'The photo field is required.';
    }

    if(! isset($_POST['contact_no']) || empty($_POST['contact_no'])){
        $validationErrors['contact_no'] = 'The contact number field is required.';
    }

    if(! isset($_POST['email']) || empty($_POST['email'])){
        $validationErrors['email'] = 'The email field is required.';
    }else{
        if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $validationErrors['email'] = 'The email format is invalid.';
        }

        $checkEmailIsExistSql = 'select email from users where email="' . $_POST['email'] . '"';
        $checkEmailIsExist = $mysqli->query($checkEmailIsExistSql)->fetch_object();
        if($checkEmailIsExist){
            $validationErrors['email'] = 'The email already been taken.';
        }
    }

    if(! isset($_POST['home_district']) || empty($_POST['home_district'])){
        $validationErrors['home_district'] = 'The home district field is required.';
    }

    if(! isset($_POST['occupation']) || empty($_POST['occupation'])){
        $validationErrors['occupation'] = 'The occupation field is required.';
    }

    if(! isset($_POST['designation']) || empty($_POST['designation'])){
        $validationErrors['designation'] = 'The designation field is required.';
    }

    if(! isset($_POST['blood_group']) || empty($_POST['blood_group'])){
        $validationErrors['blood_group'] = 'The blood group field is required.';
    }

    if(! isset($_POST['permanent_address']) || empty($_POST['permanent_address'])){
        $validationErrors['permanent_address'] = 'The permanent address field is required.';
    }

    if(! isset($_POST['present_address']) || empty($_POST['present_address'])){
        $validationErrors['present_address'] = 'The present address field is required.';
    }

    if(! isset($_POST['password']) || empty($_POST['password'])){
        $validationErrors['password'] = 'The password field is required.';
    }

    if(! isset($_POST['confirm_password']) || empty($_POST['confirm_password'])){
        $validationErrors['confirm_password'] = 'The confirm password field is required.';
    }

    if(isset($_POST['password']) && isset($_POST['confirm_password']) && ! empty($_POST['password']) && ! empty($_POST['confirm_password']) && $_POST['password'] != $_POST['confirm_password']){
        $validationErrors['password'] = 'The password confirmation field does not match.';
    }

    if(count($validationErrors)){
        $_SESSION['validationErrors'] = $validationErrors;
        header('location: register.php');
    }

    //echo '<pre>';print_r($_FILES);exit;
    $fullName = isset($_POST['full_name']) ? $mysqli->real_escape_string($_POST['full_name']) : null;
    $department = isset($_POST['department']) ? $mysqli->real_escape_string($_POST['department']) : null;
    $contactNo = isset($_POST['contact_no']) ? $mysqli->real_escape_string($_POST['contact_no']) : null;
    $email = isset($_POST['email']) ? $mysqli->real_escape_string($_POST['email']) : null;
    $homeDistrict = isset($_POST['home_district']) ? $mysqli->real_escape_string($_POST['home_district']) : null;
    $occupation = isset($_POST['occupation']) ? $mysqli->real_escape_string($_POST['occupation']) : null;
    $designation = isset($_POST['designation']) ? $mysqli->real_escape_string($_POST['designation']) : null;
    $bloodGroup = isset($_POST['blood_group']) ? $mysqli->real_escape_string($_POST['blood_group']) : null;
    $permanentAddress = isset($_POST['permanent_address']) ? $mysqli->real_escape_string($_POST['permanent_address']) : null;
    $presentAddress = isset($_POST['present_address']) ? $mysqli->real_escape_string($_POST['present_address']) : null;
    $password = isset($_POST['password']) ? $mysqli->real_escape_string(md5($_POST['password'])) : null;

    $sql = 'insert into users (full_name, department, contact_no, email, home_district, occupation, designation, blood_group, permanent_address, present_address, password, created_at, updated_at) 
    values ("' . $fullName . '", "' . $department . '", "' . $contactNo . '", "' . $email . '", "' . $homeDistrict . '", "' . $occupation . '", "' . $designation . '", "' . $bloodGroup . '", "' . $permanentAddress . '", "' . $presentAddress . '", "' . $password . '", "' . date('Y-m-d H:i:s') . '", "' . date('Y-m-d H:i:s') . '")';
    //print_r($sql);exit;

    if($mysqli->query($sql)){
        if(isset($_FILES['photo'])){

            // get details of the uploaded file 
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $fileName = $_FILES['photo']['name'];
            //$fileSize = $_FILES['uploadedFile']['size'];
            $exploded = explode(".", $fileName);
            $fileExtension = strtolower(end($exploded));

            $targetDir = 'uploads/';
            $lastInsertId = $mysqli->insert_id;
            $newFileName = $targetDir . $lastInsertId . '.' . $fileExtension;

            if (in_array($fileExtension, $allowedfileExtensionsImg) && move_uploaded_file($fileTmpPath, $newFileName)) {
                $sql = 'update users set photo="' . $newFileName . '" where id=' . $lastInsertId;
                $user = $mysqli->query($sql);
            }
        }

        header('location: dashboard.php');
    }

    $mysqli->close();
}
?>