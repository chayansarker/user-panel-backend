<?php

session_start();

include '../constants.php';
include '../helper.php';
include '../db/connection.php';
require_once '../config/config.php';

if(! checkUserIsLoggedIn()){
    header('Location: ' . BASE_URL);
}

if(! isset($_GET['id']) || empty($_GET['id']) || $_GET['id'] == null){
    header('location: ' . BASE_URL . '/admin/users.php');
}

//echo '<pre>';print_r($_FILES);exit;

$sql = "select * from users where id=" . $_GET['id'];
$user = $mysqli->query($sql)->fetch_object();

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

$sql = 'update users set full_name="' . $fullName . '", department="' . $department . '", contact_no="' . $contactNo . '", email="' . $email . '", home_district="' . $homeDistrict . '", occupation="' . $occupation . '", designation="' . $designation . '", blood_group="' . $bloodGroup . '", present_address="' . $presentAddress . '", permanent_address="' . $permanentAddress . '" where id=' . $user->id . ';';
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
        //$lastInsertId = $mysqli->insert_id;
        $newFileName = $targetDir . $user->id . '.' . $fileExtension;

        if (in_array($fileExtension, $allowedfileExtensionsImg) && move_uploaded_file($fileTmpPath, '../' . $newFileName)) {
            $sql = 'update users set photo="' . $newFileName . '" where id=' . $user->id;
            //unlink($user->photo);
            //echo '<pre>';print_r($sql);exit;
            $user = $mysqli->query($sql);
        }
    }
}

header('location: ' . BASE_URL . '/admin/users-edit.php?id=' . $user->id);
