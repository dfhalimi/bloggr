<?php

require_once "dbh.inc.php";

if (isset($_REQUEST["user"])) {
        $user = $_REQUEST["user"];

        $sql = "SELECT * FROM users WHERE usersUid = '$user';";
        $query = mysqli_query($conn, $sql);
}

if (isset($_REQUEST["delete"])) {
        $id = $_REQUEST["id"];

        $sql = "DELETE FROM users WHERE usersId = $id;";
        $query = mysqli_query($conn, $sql);

        header("Location: includes/logout.inc.php?info=accountdeleted");
        exit();
}