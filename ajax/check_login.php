<?php
/**
 * Created by PhpStorm.
 * User: WIZZY
 * Date: 4/4/2018
 * Time: 1:34 PM
 */
include_once "ajax_bootstrap.php";
include_once "../core/Admin.php";

$data = explode("/", $_POST["data"]);
$username = $data[0];
$password = $data[1];


$admin = new Admin($username);
if ($admin->checkIfUserExists()) {
    if ($admin->checkIfPasswordMatches($password)) {
        echo "LOGGING IN...";
    }
}


