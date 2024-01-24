<?php
A_Include("php/news.php");
$id = $args[0];
$post = News\GetOne($id);

$post['PostData'] = str_replace("(assets/", "(https://raw.githubusercontent.com/Tanza3D/farsand-news/main/" . $post['InternalName'] . "/assets/", $post['PostData']);

Meta::$title = "FARSAND / " . $post['Name'];


$sentence = explode(PHP_EOL, $post['PostData'])[0];
Meta::$description = $sentence;
Meta::$banner = "https://raw.githubusercontent.com/farsand-mc/news/main/" . $post['InternalName']  . "/cover.png";


$Parsedown = new Parsedown();
?>

<div class="news-header-outer">
<div class="news-header">
    <img src="https://raw.githubusercontent.com/Tanza3D/farsand-news/main/<?= $post['InternalName'] ?>/cover.png">
</div>
</div>
<div class="page-header news-text-header">
    <div class="center">
        <h1><?= $post['Name']; ?></h1>
        <p><?= date('d F Y',strtotime($post['ReleaseDate'])) ?></p>
    </div>
</div>
<div class="page center center-small">
    <div class="text">
        <?= $Parsedown->text($post['PostData']); ?>
    </div>
</div>