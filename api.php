<?php
require_once('includes/php/core.php');

if (empty($_POST['name'])) {
    $name = 'Anon';
} else {
    $name = $_POST['name'];
}

if (empty($_POST['text'])) {
    header("Location: https://board.pomf.se");
} else {
    MakePost($name, $_POST['text']);
}
