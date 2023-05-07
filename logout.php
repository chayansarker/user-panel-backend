<?php
session_start();
session_destroy();

include 'constants.php';

header('Location: ' . BASE_URL);