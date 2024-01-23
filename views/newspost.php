<?php
A_Include("php/news.php");
$id = $args[0];
$post = News\GetOne($id);

$post['PostData'] = str_replace("(assets/", "(https://raw.githubusercontent.com/Tanza3D/farsand-news/main/" . $post['InternalName'] . "/assets/", $post['PostData']);


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