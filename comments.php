<?php 
    include_once "includes/comment.inc.php";
?>

<section class="comments">
    <?php if (isset($_SESSION['uid'])) {?>
        <h2>Write a comment!</h2>
        <?php
            if (isset($_GET['error']) && $_GET['error'] == "emptyinput") {
                echo "<p class='error'>Fill in all fields!</p>";
            }

            if (isset($_GET['comments']) && $_GET['comments'] == "deleted") {
                echo "<p class='error'>Comment has been deleted</p>";
            }
        ?>
        <form method="POST">
            <input type="text" hidden name="postId" value="<?php echo $_REQUEST['id'];?>">
            <input type="text" hidden name="user" value="<?php echo $_SESSION['uid'];?>">
            <textarea name="content" placeholder="Write a comment..."></textarea>
            <button name="comment">Post Comment</button>
        </form>
        <hr>
    <?php } else {?>
        <h2>You need to be logged in to write comments</h2>
    <?php }
        foreach($query as $q) {
    ?>
        <div class="comment">
            <p><a href="user.php?user=<?php echo $q['user'];?>"><strong><?php echo $q['user'];?></strong></a></p>
            <p class="comment-date"><?php echo $q['publishDate'];?></p>
            <p class="comment-content"><?php echo nl2br($q['content']);?></p>
            <?php if (isset($_SESSION['uid']) && $_SESSION['uid'] == $q['user']) {?>
                <form method="POST">
                    <input type="text" hidden name="id" value="<?php echo $q['id'];?>">
                    <input type="text" hidden name="postId" value="<?php echo $_REQUEST['id'];?>">
                    <button name="delete-comment" class="icons-btn"><i class="fas fa-trash-alt"></i></button>
                </form>
            <?php }?>
        </div>
    <?php }?>
</section>