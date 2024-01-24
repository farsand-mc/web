<?php
function BasePage($name)
{
    DrawViewWithTemplate($name, "page");
}
function Page($name)
{
    return function () use ($name) {
        Site::$am_frontend = true;
        BasePage($name);
    };
}


$router->get('/home', Page("home"));
$router->get('/news', Page("news"));

$router->get('/about', Page("about"));
$router->get('/rules', Page("rules"));
$router->get('/contact', Page("contact"));


$router->get('/news/{id}', function ($id) {
    DrawViewWithTemplate("newspost", "page", $id);
});