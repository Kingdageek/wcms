<?php 
	include_once "bootstrap.php";
    if (!isLoggedIn()) redirect("login.php");
    $username = $_SESSION['username'];
    include_once "views/partials/header.html.php";
    include_once "views/partials/navbar.html.php";

    // $url = $_SERVER['REQUEST_URI'];
    $url = $_GET['page'] ?? '';
    displayPage($url);

    // echo '<br>';
    // var_dump(explode('/', ltrim(parse_url($url, PHP_URL_PATH), '/')));

    // function displayPage($url)
    // {
    //     $url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    //     $parsed_url = explode('/', ltrim(parse_url($url, PHP_URL_PATH), '/'));
    //     $url = $parsed_url[1];
    //     $routes = require_once "routes.php";
    //     //echo $routes[$url];
    //     var_dump($routes);
    //     if (array_key_exists($url, $routes)) {
    //         include_once $routes[$url];
    //     } else {
    //         echo "Page not found! I want to believe you're not messing with my url on purpose Zig!";
    //     }
    // }

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


?>
<div id="playground">
    
</div>

<?php include_once "views/partials/footer.html.php"; ?>
<!-- <script>
    $(function() {
        $(document).ajaxStart(function() {
            $('.ajload').fadeIn();
        });
        $(document).ajaxComplete(function() {
            $('.ajload').fadeOut();
        });
    })
</script> -->