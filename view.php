<?php
    include_once "includes/post.inc.php";
    include_once "header.php";
?>

    
    <?php foreach($query as $q) {?>
        <div class="post">
            <h1><?php echo $q['title'];?></h1>
            <div class="post-info">
                <div class="profile-pic">
                    <a href="user.php?user=<?php echo $q['author'];?>">
                        <?php
                            $sqlUser = "SELECT * FROM users WHERE usersUid = '$q[author]';";
                            $queryUser = mysqli_query($conn, $sqlUser);
                            foreach ($queryUser as $qUser) {
                                $sqlImg = "SELECT * FROM profileimg WHERE usersId = '$qUser[usersId]';";
                                $resultImg = mysqli_query($conn, $sqlImg);
                                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                                    if ($rowImg['status'] == 0) {
                                        echo "<img src='images/profile".$qUser['usersId'].".jpg?'".mt_rand().">";
                                    } else {
                                        echo "<img src='images/profiledefault.jpg'>";
                                    }
                                }
                            }
                        ?>
                    </a>
                </div>
                <div>
                    <p class="author-name"><a href="user.php?user=<?php echo $q['author'];?>"><?php echo $q['author'];?></a></p>
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
            <p><?php echo nl2br($q['content']);?></p>
            <?php if (isset($_SESSION['uid'])) {?>
                <form method="POST">
                    <input type="text" hidden name="postId" value="<?php echo $q['id'];?>">
                    <input type="text" hidden name="user" value="<?php echo $_SESSION['uid'];?>">
                    <button name="upvotes" class="upvotes-btn"><i class="fas fa-arrow-up"></i> </button>
                    <span class="post-stats"><?php echo $q['upvotes'];?></span>
                    <span><i class="fas fa-comment"></i></span>
                    <span class="post-stats"><?php echo $q['comments'];?></span>
                </form>
            <?php } else {?>
                <form method="POST">
                    <span><i class="fas fa-arrow-up"></i></span>
                    <span class="post-stats"><?php echo $q['upvotes'];?></span>
                    <span><i class="fas fa-comment"></i></span>
                    <span class="post-stats"><?php echo $q['comments'];?></span>
                    <p><em>Log in to upvote posts.</em></p>
                </form>
            <?php }?>
        </div>

        <?php include_once "comments.php";?>
    <?php }?>


<?php
    include_once "footer.php";
?>