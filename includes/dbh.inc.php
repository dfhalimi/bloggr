<?php

    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "bloggr";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM blog_posts;";
    $query = mysqli_query($conn, $sql);