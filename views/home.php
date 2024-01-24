<?php
Meta::$title = "FARSAND / The evolutionary Minecraft Survival server";
Meta::$description = "FARSAND is a Minecraft survival server, starting on beta 1.4, and upgrading one version (e.g. b1.4, b1.5, b1.6) every single month until we reach the latest release!";
Meta::$banner = "https://dev.farsand.com/public/img/backdrop.png";
?>
<div class="page-header">
    <div class="center">
        <h1>Welcome to the website for <strong>FARSAND</strong>, the evolutionary Minecraft server. Starting from b1.4,
            we’ll be updating one version every month until we reach the latest version available!</h1>
    </div>
</div>
<div class="page center">
    <div class="split">
        <div class="text">
            <h1>Getting Started</h1>
            <p>We recommend using MultiMC, though you can also do the following in other launchers! To start with, add
                the following line to your JVM arguments to fix skins: </p>
            <pre>-Dhttp.proxyHost=glide.farsand.com</pre>
            <p>We roll our own <a href="https://github.com/farsand-mc/glide">custom proxy called Glide</a>, though you can also choose to go with betacraft.uk if you choose to.</p>
            <p>Next, create an instance and make sure to run <strong><?= VERSION ?></strong>, else you won’t be able to connect!
                After joining. use /register and input a nice password, and you’re good to go! Make sure to check
                upstairs in the spawn house and have fun!</p>

            <p><strong>Make sure to <a href="/rules">read the rules</a></strong> and if you have any questions, feel free to contact us through our Discord server or our email <strong>support@farsand.com</strong></p>

            <h1>Support & Suggestions</h1>
            <p>Need help? Got a cool idea? Feel free to contact us anytime through the Discord Server, or email us
                directly at admin@farsand.com!</p>
        </div>
        <div class="right">
            <div class="home-button-collage">
                <a class="home-button home-discord" href="https://discord.gg/gdzGYdwgwm">
                    <p>join our</p>
                    <h1>Discord Community</h1>
                </a>
                <a class="home-button" href="/rules">
                       Server Rules
                    </a>
                <div class="home-button-row">
                    <a class="home-button" href="/about">
                        About server
                    </a>
                    <a class="home-button" href="https://ko-fi.com/farsand">
                        Support on ko-fi
                    </a>
                </div>
            </div>
            <h1>News</h1>
            <?php
            A_Include("php/news.php");
            $posts = News\GetMany(0, 3);
            foreach ($posts as $post) {

                $sentence = explode(PHP_EOL, $post['PostData'])[0];
                ?>
                <a class="news-item-small" href="/news/<?= $post['InternalName'] ?>">
                    <img
                        src="https://raw.githubusercontent.com/Tanza3D/farsand-news/main/<?= $post['InternalName'] ?>/cover.png">
                    <div class="news-item-text">
                        <h1><?= $post['Name']; ?></h1>
                        <p><?= $sentence ?></p>

                        <small><?= date('d F Y', strtotime($post['ReleaseDate'])) ?></small>
                    </div>
                </a>
                <?php
            }

            ?>
        </div>
    </div>
</div>
