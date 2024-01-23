<?php
namespace News {
    use Database;

    function GetMany($offset = 0, $limit = 20, $rep = false)
    {
        $posts = Database\Connection::execSelect("SELECT Name, ReleaseDate, InternalName, PostData FROM News ORDER BY ReleaseDate DESC LIMIT ? OFFSET ?", "ii", [$limit, $offset]);
        $anylost = false;
        foreach($posts as $post) {
            if($post['PostData'] == null) {
                $anylost = true;
                $post['PostData'] = file_get_contents("https://raw.githubusercontent.com/Tanza3D/farsand-news/main/".$post['InternalName']."/index.md");
                Database\Connection::execOperation("UPDATE `News` SET `PostData` = ? WHERE `InternalName` = ?", "ss", [$post['PostData'], $post['InternalName']]);
            }
        }
        if($anylost == true && $rep == false) {
            return GetMany($offset, $limit, true);
        }
        return $posts;
    }
    function GetOne($key) {
        $posts = Database\Connection::execSelect("SELECT * FROM News WHERE `InternalName` = ?", "s", [$key]);
        return $posts[0];
    }
}