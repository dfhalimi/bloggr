<?php
    include_once "includes/user.inc.php";
    include_once "header.php";
?>

    <?php
    if (isset($_REQUEST['user'])) {
        foreach ($query as $q) {
    ?>
      <div class="post">
        <h1 class="posts-overview"><?php echo $q['author'];?>'s Posts</h1>
        <h1><?php echo $q['title'];?></h1>
        <div class="post-info">
          <div class="profile-pic">
            <a href="user.php?user=<?php echo $q['author'];?>"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxw
            aG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="user"></a>
          </div>
          <div>
            <p class="author-name"><a href="user.php?user=<?php echo $q['author'];?>"><?php echo $q['author'];?></a></p>
            <p><?php echo $q['publishDate'];?></p>
          </div>
        </div>
        <div class="main-img">
          <img src="images/<?php echo $q['image'];?>" alt="main image">
        </div>
        <p class="content-js"><?php echo $q['content'];?></p>
        <a href="view.php?id=<?php echo $q['id'];?>" class="btn read-more">Read More</a>
      </div>
    <?php
        }
    }
    ?>

<?php
    include_once "footer.php";
?>