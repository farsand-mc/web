<?php
Meta::$title = "FARSAND / About";
Meta::$description = null;
?>
<div class="page-header">
    <div class="center">
        <h1>Learn all about FARSAND</h1>
    </div>
</div>
<div class="page center">
    <div class="split">
        <div class="text">
            <h1>About</h1>
            <p>About</p>
        </div>
        <div class="right">
            <h1>Staff</h1>
            <?php
            $staff = [];
            function Staff($mc_username, $username, $role) {
                return [
                    "mc_username" => $mc_username,
                    "username" => $username,
                    "role" => $role
                ];
            }
            $staff[] = Staff("Tanza3D", "Tanza", "Owner");
            $staff[] = Staff("Banfish", "Dragonick", "Builder");
            $staff[] = Staff("retiutheproto", "Retiu", "Moderator");
            foreach($staff as $member) {
                ?>
                <div class="staff-item">
                    <img src="https://mc-heads.net/avatar/<?= $member['mc_username'] ?>/8">
                    <div class="staff-item-texts">
                        <h1><?= $member['mc_username'] ?> <light>(<?= $member['username'] ?>)</light></h1>
                        <p><?= $member['role'] ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
