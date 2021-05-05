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
            <div>Hello there <?php echo $q['usersUid'];?></div>
            <form method="GET">
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
            </form>
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