<?php
require_once('settings.php');
require_once('db.php');

function MakePost($name, $title, $text): void
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

    header("Location: https://board.pomf.se");
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

        print '<blockquote><b>ID:</b> '.$row['id'].'<br><b>Time:</b> '.$sane_time.'<br><b>Name:</b>
        '.$row['name'].'</blockquote><pre>'.$row['text'].'</pre><br>';
    }
}
