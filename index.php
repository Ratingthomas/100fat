<?php
    include 'routing.php';    
    $route = new Route();
    
    $route->add("/","routes/home.php");
    $route->add("/home","routes/home.php");
    $route->add("/app/huis1","routes/app/huis1.php");
    
    $route->notFound("404.php");

?>