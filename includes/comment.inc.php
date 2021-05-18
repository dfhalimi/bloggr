<?php

require_once "dbh.inc.php";
require_once "functions.inc.php";

if (isset($_REQUEST['id'])) {
    $postId = $_REQUEST['id'];

    $sql = "SELECT * FROM comments WHERE postId = $postId ORDER BY id DESC;";
    $query = mysqli_query($conn, $sql);
}

if (isset($_REQUEST['comment'])) {
    $postId = $_REQUEST['postId'];
    $user = $_REQUEST['user'];
    $content = $_REQUEST['content'];
    $publishDate = date("y-m-d");

    if (emptyInputComment($content) !== false) {
        header("Location: view.php?id=$postId&error=emptyinput");
        exit();
    }

    $sql = "INSERT INTO comments (postId, user, content, publishDate) VALUES ($postId, '$user', '$content', '$publishDate');";
    mysqli_query($conn, $sql);
    $sql = "UPDATE blog_posts SET comments = comments + 1 WHERE id = $postId;";
    mysqli_query($conn, $sql);
}

if (isset($_REQUEST['delete-comment'])) {
        $id = $_REQUEST['id'];
        $postId = $_REQUEST['postId'];

        $sql = "DELETE FROM comments WHERE id = $id;";
        mysqli_query($conn, $sql);
        $sql = "UPDATE blog_posts SET comments = comments - 1 WHERE id = $postId;";
        mysqli_query($conn, $sql);

        header("Location: view.php?id=$postId&comments=deleted");
        exit();
}