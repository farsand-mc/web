<div class="center page">
    <?php
    A_Include("php/news.php");
    $offset = 0;
    if ($_GET['offset'] != null) {
        $offset = $_GET['offset'];
    }
    $posts = News\GetMany($offset);

    if (count($posts) == 0) {
        echo "No posts :(";
        return;
    }

    foreach ($posts as $post) {

        $sentence = explode(PHP_EOL, $post['PostData'])[0];
        ?>
    <a class="news-item-big" href="/news/<?= $post['InternalName'] ?>">
        <img src="https://raw.githubusercontent.com/Tanza3D/farsand-news/main/<?= $post['InternalName'] ?>/cover.png">
        <div class="news-item-text">
        <h1><?= $post['Name']; ?></h1>
        <small><?= date('d F Y',strtotime($post['ReleaseDate'])) ?></small>
        <p><?= $sentence ?></p>
        </div>
    </a>
    <?php
    }

    if (count($posts) == 20) {
        ?>
    <a href="/news?offset=<?= $offset + 20 ?>">Next Page</a>
    <?php
    }
    ?>
</div>