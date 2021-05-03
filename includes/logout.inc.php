<?php

if ($_REQUEST['info'] == "accountdeleted") {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php?info=accountdeleted");
    exit();
}
else {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();
}