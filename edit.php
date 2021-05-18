<?php
    include_once "includes/post.inc.php";
    include_once "header.php";
?>

    <?php //The user can only access this page if he is logged in AND is the author of the post
    if (isset($_SESSION['uid'])) {
        foreach ($query as $q) {
            if ($_SESSION['uid'] == $q['author']) {
    ?>
        <div class="form">
            <form method="GET">
                <input type="text" hidden name="id" value="<?php echo $q['id'];?>">
                <input type="text" name="title" placeholder="Blog Title" 
                value="<?php echo $q['title'];?>">
                <textarea name="content"><?php echo nl2br($q['content']);?></textarea>
                <button name="update" class="btn edit">Update</button>
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