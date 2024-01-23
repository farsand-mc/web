<div class="navbar">
    <div class="navbar-cover">
        <div class="center">
            <img src="/public/img/logo.svg">
        </div>
    </div>
    <div class="navbar-pages">
        <div class="center">
            <?php
            $pages = [
                [
                    "displayname" => "Home",
                    "names" => "home",
                    "href" => "/",
                ],
                [
                    "displayname" => "About",
                    "names" => "about",
                    "href" => "/about",
                ],
                [
                    "displayname" => "Rules",
                    "names" => "rules",
                    "href" => "/rules",
                ],
                [
                    "displayname" => "News",
                    "names" => ["news", "newspost"],
                    "href" => "/news",
                ],
                [
                    "displayname" => "Staff",
                    "names" => "staff",
                    "href" => "/staff",
                ],
                [
                    "displayname" => "Contact",
                    "names" => "contact",
                    "href" => "/contact",
                ],
            ];
            foreach ($pages as $item) {
                $active = false;
                if (!is_array($item['names'])) {
                    if ($item['names'] == page) {
                        $active = true;
                    }
                } else {
                    foreach ($item['names'] as $name) {
                        if ($name == page) {
                            $active = true;
                        }
                    }
                }
                ?>
            <a class="navbar-page <?= $active ? "navbar-page-active" : "" ?>" href="<?= $item['href'] ?>">
                <p><?= $item['displayname'] ?></p>
            </a>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<?= $page; ?>
<div class="footer">
    <div class="center">
        <div class="left">
            <p>(C) FARSAND 2023</p>
            <a href="https://github.com/farsand-mc">We're Open Source!</a>
        </div>
        <div class="right">
            <a href="https://bsky.app"><img src="https://cdn.simpleicons.org/bluesky/white" /></a>
            <a href="https://github.com/farsand-mc"><img src="https://cdn.simpleicons.org/github/white" /></a>
        </div>
    </div>
</div>
<script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
<script>
kofiWidgetOverlay.draw('farsand', {
    'type': 'floating-chat',
    'floating-chat.donateButton.text': 'Support Us',
    'floating-chat.donateButton.background-color': '#384052',
    'floating-chat.donateButton.text-color': '#fff'
});
</script>
<style>
.floatingchat-container-wrap * {
    z-index: 4 !important;
}

.floatingchat-container-wrap {
    z-index: 4 !important;
}
</style>