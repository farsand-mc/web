<?php
function DrawError($title, $message)
{
    ?>
    <div class="page-container-inner">
        <div class="panel">
            <h1>System Error</h1>
            <div class="divider"></div>
            <h1><?= $title ?></h1>
            <p><?= $message ?></p>
        </div>
    </div>
    <?php
}
function DrawWithTemplate($page, $template, $name = "", ...$args)
{
    define("page", $name);
    Site::$am_frontend = true;
    ob_start();

    include("templates/" . $template . ".php");
    $html = ob_get_contents();
    ob_end_clean();
    include("templates/base.php");
}
function DrawViewWithTemplate($name, $template, ...$args)
{
    Site::$am_frontend = true;
    ob_start();
    try {
        include "views/" . $name . ".php";
    } catch (Exception $e) {
        echo "There was an internal error rendering this page : " . $e->getMessage();
    }
    $page = ob_get_contents();
    ob_end_clean();
    DrawWithTemplate($page, $template, $name, $args);
}


function checkPermRequirement($perm) {
    // hi! you might be wondering why unlike the login check we do this on views instead of at router level
    // it's because if we do it at router level, we have to jump out of drawing the template
    // and that way things go sad :( 
    $hasPerm = false;
    $hasPerm = true;
    if ($hasPerm) {
        return true;
    }
    if(Site::$am_frontend == true) {
        DrawError("Not permit", "No permission");
    } else {
        echo json_encode([
            "error" => "no_permission"
        ]);
    }
    return false;
}