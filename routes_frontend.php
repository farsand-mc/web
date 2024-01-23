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
function LoginPage($name)
{
    return function () use ($name) {
        Site::$am_frontend = true;
        if (requireLogin())
            BasePage($name);
    };
}


$router->get('/home', Page("home"));
$router->get('/news', Page("news"));


$router->get('/news/{id}', function ($id) {
    DrawViewWithTemplate("newspost", "page", $id);
});