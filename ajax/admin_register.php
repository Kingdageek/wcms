<?php
include_once "ajax_bootstrap.php";
include_once "../core/Admin.php";

$data = $_POST['data'];
$data = explode('/', $data);

$username = trim($data[0]);
$password = trim($data[1]);
$confirm_password = trim($data[2]);
// member id variable for test...
$mid = 2;

// Validate the items passed
if (empty($username) || empty($password) || empty($confirm_password)) {
    echo "empty";
} elseif ($password != $confirm_password) {
    echo "pdm";
} else {
    $admin = new Admin($username);
    if ($admin->checkIfUserExists()) {
        echo "aa";
    } else {
        $admin->createNewAdmin($password, $mid);
        echo "OK";
    }
}
