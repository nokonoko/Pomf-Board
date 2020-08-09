<?php
require_once('includes/php/core.php');

//TODO: Make this better, but really it's your shit. URL paths are nice
//Have an idea how you want to structure your API paths

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    //Get request for fetching new posts
    AjaxPosts($_GET['post'] ?? 0);
} else {

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

}