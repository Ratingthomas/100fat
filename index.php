<?php
    include 'routing.php';    
    $route = new Route();
    
    $route->add("/","routes/home.php");
    $route->add("/home","routes/home.php");
    $route->add("/credits","routes/credits.php");
    $route->add("/app/huis1","routes/app/huis1.php");
    $route->add("/app/huis2","routes/app/huis2.php");
    
    $route->add("/demo/getting-started","routes/demo/demo1.php");
    $route->add("/demo/verdwijnen","routes/demo/demo2.php");
    
    $route->notFound("404.php");

?>