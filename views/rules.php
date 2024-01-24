<?php
Meta::$title = "FARSAND / Rules";
Meta::$description = null;

$rules = [
    "<strong>Do not grief or troll other players or their property, even if it's unclaimed.</strong> TNT and creepers are disabled here for that reason!",
    "<strong>Cheats and hacks aren't allowed on this server.</strong> Exploits are not allowed if they affect the experience of other users or the operation of the server itself. Mob farms are allowed; this rule only covers unintended or unofficial game features.",
    "<strong>Please be kind and tolerant.</strong> Everyone has feelings, please stop and think about how you intend to make someone feel before you say something to them. <strong>Transphobia, homophobia, racism, xenophobia, and any kind of intolerance is strictly forbidden.</strong>",
    "<strong>Keep it \"safe for work\" and PG.</strong> Please don't discuss sexual, graphic, or traumatic topics - these things may have their place, but they aren't appropriate for this server.",
    "<strong>Try your best to maintain a positive environment in the server for all players.</strong> Some swearing is fine, but insults towards people are disallowed. If someone is breaking any of these rules, report them with /report-player and we'll be on it.",
];
$guidelines = [
    "This isn't a PvP or competitive server. Feel free to share resources and collaborate, and please don't gang up on people or take from them. However, please don't feel like you're required by anyone to give up resources, and please don't beg if someone doesn't want to give up something.",

    "Something not being officially \"claimed\" doesn't mean you have free reign to destroy or intrude on it, doing that deliberately is unkind and will only create conflict. Claims are limited for new players, so some may not have any choice but to leave some areas unclaimed.",
    
    "If you find yourself feeling immensely frustrated with the game at any point, please consider taking a break, even a short one, to cool off. Report players if any rules have been broken, or message a moderator if any unintended feature has caused you frustration, before doing so. Taking a break isn't running away, it just helps you reflect and come back with a renewed interest."
];
?>
<div class="page center center-small">
    <div class="text">
        <h1>Server Rules</h1>
        <?
        $x = 0;
        foreach ($rules as $rule) {

            ?>
            <div class="rule">
                <div class="rule-num">
                    <?= $x ?>
                </div>
                <div class="rule-text">
                    <?= $rule ?>
                </div>
            </div>
            <?
            $x++;
        }
        ?>
        <h1>Guidelines</h1>
        <?
        $x = 0;
        foreach ($guidelines as $rule) {

            ?>
            <div class="guideline">
                <div class="rule-text">
                    <?= $rule ?>
                </div>
            </div>
            <?
            $x++;
        }
        ?>
        <p class="questions">Any questions? <a href="/contact">Contact us.</a></p>
    </div>
</div>