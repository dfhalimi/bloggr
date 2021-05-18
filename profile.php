<?php
    include_once "includes/profile.inc.php";
    include_once "header.php";
?>

    <?php 
    if (isset($_SESSION['uid'])) {
        foreach ($query as $q) {
            if ($_SESSION['uid'] == $q['usersUid']) {
    ?>
        <div class="form">
            <div>Hello there <?php echo $q['usersUid'];?>!</div>
                <div class="profile-row row-center">
                    <?php
                        $sqlImg = "SELECT * FROM profileimg WHERE usersId = '$q[usersId]';";
                        $resultImg = mysqli_query($conn, $sqlImg);
                        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                            echo "<div class='profile-pic'>";
                            if ($rowImg['status'] == 0) {
                                echo "<img src='images/profile".$q['usersId'].".jpg?'".mt_rand().">";
                            } else {
                                echo "<img src='images/profiledefault.jpg'>";
                            }
                            echo "</div>";
                        }
                    ?>
                </div>
                <form action='includes/profile.inc.php' method='POST' enctype='multipart/form-data'>
                    <input type="text" hidden name="user" value="<?php echo $q['usersUid'];?>">
                    <input type="text" hidden name="id" value="<?php echo $q['usersId'];?>">
                    <input type='file' name='file'>
                    <button type='submit' name='image-submit'>Upload Image</button>
                </form>
                <div class="profile-row">
                    <p>Username:</p>
                    <p><strong><?php echo $q['usersUid']?></strong></p>
                </div>
                <div class="profile-row">
                    <p>Email:</p>
                    <p><strong><?php echo $q['usersEmail']?></strong></p>
                </div>
                <div class="post-btns">
                    <form method="POST">
                        <input type="text" hidden name="id" value="<?php echo $q['usersId'];?>">
                        <button class="btn delete" name="delete">Delete Account</button>
                    </form>
                </div>
        </div>
    <?php
            } else {
                header("Location: index.php");
                exit(); 
            } 
        } 
    } else {
        header("Location: index.php");
        exit();
    }
    ?>

<?php
    include_once "footer.php";
?>