<?php
require_once('includes/php/core.php');

if (empty($_POST['name'])) {
    $name = 'Anon';
} else {
    $name = $_POST['name'];
}

if (empty($_POST['text'])) {
    header("Location: " . $_SERVER['REQUEST_SCHEME'] . "://" . HOST_NAME);
} else {
    MakePost($name, $_POST['text']);
}
