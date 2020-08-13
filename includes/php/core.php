<?php
require_once('settings.php');
require_once('db.php');

function MakePost(string $name, string $text): void
{
    global $db;

    //Remove HTML n shit from name
    $sane_name = substr(strip_tags($name), 0, 50);

    //Remove HTML n shit from text
    $sane_text = substr(strip_tags($text), 0, 1000);

    //Prepare for insert
    $q = $db->prepare('INSERT INTO posts (name, text, time)
		VALUES (:name, :text, :time)');

    //Insert values into DB
    $q->execute([
    'name' => $sane_name,
    'text' => $sane_text,
    'time' => time(),
    ]);

    header("Location: " . $_SERVER['REQUEST_SCHEME'] . "://" . HOST_NAME);
}

function GetPost(): void
{
    global $db;

    $q = $db->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT :limit');
    $q->bindValue(':limit', MAX_POSTS_SHOWN, PDO::PARAM_STR);
    $q->execute();

    while ($row = $q->fetch(PDO::FETCH_ASSOC)) {

        //Convert timestamp to something readable
        $time = $row['time'];
        $timeraw = new DateTime("@$time");
        $sane_time = $timeraw->format('c');

        print '<blockquote><b>Post:</b> '.$row['id'].'<br><b>Time:</b> '.$sane_time.'<br><b>Name:</b>
        '.$row['name'].'</blockquote><pre>'.$row['text'].'</pre><br>';
    }
}

function AjaxPosts($latest = 0): void
{
    global $db;
    $latest = strip_tags($latest);
    $q = $db->prepare('SELECT * FROM posts WHERE id > :latest ORDER BY id DESC LIMIT :limit');
    $q->bindValue(':latest', $latest, PDO::PARAM_STR);
    $q->bindValue(':limit', MAX_POSTS_SHOWN, PDO::PARAM_STR);
    $q->execute();
    $posts = $q->fetchAll(PDO::FETCH_ASSOC);
    foreach ($posts as &$row) {
        $time = $row['time'];
        $timeraw = new DateTime("@$time");
        $row['time'] = $timeraw->format('c');
    }
    unset($row);
    print json_encode($posts);
}

function UploadFile($file): void
{
}
