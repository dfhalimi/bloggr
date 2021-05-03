<?php

require_once "dbh.inc.php";
require_once "functions.inc.php";

if(isset($_POST["new_post"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $publishDate = date("y-m-d");

    $target = "../images/".basename($_FILES['image']['name']);

    $image = $_FILES["image"]['name'];

    $sql = "INSERT INTO blog_posts (title, content, author, publishDate, image) VALUES ('$title',' $content', '$author', '$publishDate', '$image');";
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        header("Location: ../index.php?info=added?msg=successful");
        exit();
    }
    else {
        header("Location: ../index.php?info=added?msg=failed");
        exit();
    }
}
else {
    header("location: ../index.php");
    exit();  
}