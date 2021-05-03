<?php

require_once "dbh.inc.php";

if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];

        $sql = "SELECT * FROM blog_posts WHERE id = $id;";
        $query = mysqli_query($conn, $sql);
}

if (isset($_REQUEST["update"])) {
        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];

        $sql = "UPDATE blog_posts SET title = '$title', content = '$content' WHERE id = $id;";
        mysqli_query($conn, $sql);

        header("Location: index.php?info=updated");
        exit();
}

if (isset($_REQUEST["delete"])) {
        $id = $_REQUEST["id"];

        $sql = "DELETE FROM blog_posts WHERE id = $id;";
        $query = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
}