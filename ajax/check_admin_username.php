<?php
include_once "ajax_bootstrap.php";
include_once "../core/Admin.php";

$username = $_POST['username'];
$admin = new Admin($username);

if ($admin->checkIfUserExists()) {
    echo "ae";
}