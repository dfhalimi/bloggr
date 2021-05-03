<?php
    include_once "includes/post.inc.php";
    include_once "header.php";
?>


    <?php foreach($query as $q) {?>
        <div class="post">
            <h1><?php echo $q['title'];?></h1>
            <div class="post-info">
                <div class="profile-pic">
                    <a href="index.php"><img src="https://images.unsplash.com/photo-1494790108377-
                    be9c29b29330?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib
                    =rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="user"></a>
                </div>
                <div>
                    <p class="author-name"><a href="index.php"><?php echo $q['author'];?></a></p>
                    <p><?php echo $q['publishDate'];?></p>
                </div>
            </div>
            <?php if (isset($_SESSION['uid'])) {
                if ($_SESSION['uid'] == $q['author']) {?>
                <div class="post-btns">
                    <a href="edit.php?id=<?php echo $q['id'];?>" class="btn edit">Edit</a>

                    <form method="POST">
                        <input type="text" hidden name="id" value="<?php echo $q['id'];?>">
                        <button class="btn delete" name="delete">Delete</button>
                    </form>
                </div>
            <?php }
            } ?>
            <div class="main-img">
                <img src="images/<?php echo $q['image'];?>" alt="main image">
            </div>
            <p><?php echo $q['content'];?></p>
        </div>
    <?php }?>


<?php
    include_once "footer.php";
?>