<?php
include_once "bootstrap.php";
include_once "core/Admin.php";
include_once "views/partials/header.html.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $admin = new Admin($username);
    $data = $admin->login($password);
}
include_once "views/login.html.php";
include_once "views/partials/footer.html.php";
