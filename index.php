<?php 
    include_once "bootstrap.php";
    include_once "views/partials/header.html.php";    
    if (!isLoggedIn()) {
        displayPage("login");
    } else {
        $username = $_SESSION['username'];
        include_once "views/partials/navbar.html.php";
        $url = $_GET['page'] ?? '';     
        displayPage($url);
    }
    include_once "views/partials/footer.html.php"; 
?>