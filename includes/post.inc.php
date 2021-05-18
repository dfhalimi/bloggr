<?php

require_once "dbh.inc.php";

if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM blog_posts WHERE id = $id;";
        $query = mysqli_query($conn, $sql);
}

if (isset($_REQUEST['update'])) {
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        $sql = "UPDATE blog_posts SET title = '$title', content = '$content' WHERE id = $id;";
        mysqli_query($conn, $sql);

        header("Location: index.php?info=updated");
        exit();
}

if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blog_posts WHERE id = $id;";
        $query = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
}

if (isset($_REQUEST['upvotes'])) {
        $postId = $_REQUEST['postId'];
        $user = $_REQUEST['user'];
        
        $sql = "SELECT * FROM upvotes WHERE postId = $postId AND user = '$user';";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
                $sql = "UPDATE blog_posts SET upvotes = upvotes - 1 WHERE id = $postId;";
                mysqli_query($conn, $sql);
                $sql = "DELETE FROM upvotes WHERE postId = $postId AND user = '$user';";
                mysqli_query($conn, $sql);

                header("Location: view.php?id=$id");
                exit();
        } else {
                $sql = "UPDATE blog_posts SET upvotes = upvotes + 1 WHERE id = $postId;";
                mysqli_query($conn, $sql);
                $sql = "INSERT INTO upvotes (postId, user) VALUES ('$postId', '$user');";
                mysqli_query($conn, $sql);

                header("Location: view.php?id=$id");
                exit();
        }
}