<?php

session_start();

include '../constants.php';
include '../helper.php';
include '../db/connection.php';

//include '../includes/display-errors.php';

if(! checkUserIsLoggedIn()){
    header('Location: ' . BASE_URL);
}

if(! isset($_GET['id']) || empty($_GET['id']) || $_GET['id'] == null){
    header('location: ' . BASE_URL . '/admin/users.php');
}

//echo '<pre>';print_r($_POST);exit;

$sql = 'update users set deleted_at="' . date('Y-m-d H:i:s') . '" where id=' . $_GET['id'];
$user = $mysqli->query($sql);

header('location: ' . BASE_URL . '/admin/users.php?id=' . $user->id);
