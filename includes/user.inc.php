<?php

require_once "dbh.inc.php";

if (isset($_REQUEST['user'])) {
    $user = $_REQUEST['user'];

    $sql = "SELECT * FROM blog_posts WHERE author = '$user' ORDER BY id DESC;";
    $query = mysqli_query($conn, $sql);
}