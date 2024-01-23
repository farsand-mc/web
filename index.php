<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;


ob_start();

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();
include("error.php");

include("config.php");
include("php/general.php");

A_Include("php/site.php");
A_Include("php/sanitize.php");
A_Include("php/db/database.php");
A_Include("php/db/memcache.php");
A_Include("frontend_resp.php");
include("variables.php");

$pages = [];

$router->set404(function () {
  header('HTTP/1.1 404 Not Found');
  DrawViewWithTemplate("404", "page");
});

$router->get('/', function () {
  DrawViewWithTemplate("home", "page");
});


include("routes_backend.php");
include("routes_frontend.php");

//echo "<pre>";
//print_r($router->afterRoutes["GET"]);
//echo "</pre>";
$router->run();
$output = ob_get_contents();
ob_end_clean();




echo $output;