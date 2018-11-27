<?php
include_once "core/Admin.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $admin = new Admin($username);
    $data = $admin->login($password);
}
include_once "views/login.html.php";