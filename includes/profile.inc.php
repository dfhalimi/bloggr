<?php
include_once 'dbh.inc.php';

if (isset($_REQUEST['user'])) {
        $user = $_REQUEST['user'];

        $sql = "SELECT * FROM users WHERE usersUid = '$user';";
        $query = mysqli_query($conn, $sql);
}

if (isset($_POST['image-submit'])) {
    $user = $_POST['user'];
    $id = $_POST['id'];
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = '../images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET status = 0 WHERE usersId = '$id';";
                $result = mysqli_query($conn, $sql);
                header("Location: ../profile.php?user=$user&upload=success&id=$id");
            } else {
                header("Location: ../profile.php?user=$user&upload=toobig");
            }
        } else {
           header("Location: ../profile.php?user=$user&upload=error");
        }
    } else {
        header("Location: ../profile.php?user=$user&upload=invalidfiletype");
    }
}

if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM users WHERE usersId = $id;";
        $query = mysqli_query($conn, $sql);

        header("Location: includes/logout.inc.php?info=accountdeleted");
        exit();
}