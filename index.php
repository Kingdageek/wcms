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

    function displayPage($url)
    {
        $url = htmlspecialchars($url, ENT_QUOTES,  'UTF-8');
        $routes = require_once "routes.php";
        if (array_key_exists($url, $routes)) {
            include_once $routes[$url];
        } else {
            echo "Page not found! I want to believe you're not messing with my url on purpose Zig!";
        }
    }
    include_once "views/partials/footer.html.php"; 
?>