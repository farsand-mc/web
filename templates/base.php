<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="/frontend/css/main.css?v=6">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <?php
    $has_description = true;
    $has_image = true;

    if (Meta::$description == null)
        $has_description = false;
    if (Meta::$banner == null)
        $has_image = false;

    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>


    <meta property="og:type" content="website" />

    <title><?= Meta::$title ?></title>
    <meta property="og:title" content="<?= Meta::$title ?>" />
    <meta property="twitter:title" content="<?= Meta::$title ?>" />
    <meta name="title" content="<?= Meta::$title ?>" />

    <meta property="og:url" content="<?= $actual_link ?>" />
    <meta property="twitter:url" content="<?= $actual_link ?>" />
    <?php
    if ($has_description) {
        ?>
        <meta property="og:description" content="<?= Meta::$description ?>" />
        <meta name="description" content="<?= Meta::$description ?>" />
        <meta property="twitter:description" content="<?= Meta::$description ?>" />
    <? } ?>

    <?php
    if ($has_image) {
        ?>
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:image" content="<?= Meta::$banner ?>" />
        <meta property="og:image" content="<?= Meta::$banner ?>" />

    <? } ?>
</head>

<body>
    <div class="content">
        <?= $html; ?>
    </div>
</body>


<script rel="preload" src="/frontend/js/main.js" type="module"></script>

</html>