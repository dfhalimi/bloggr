<?php
  include_once "includes/dbh.inc.php";
  include_once "header.php";
?>
      <?php
        if (isset($_REQUEST['info'])) {
      ?>
        <?php if ($_REQUEST['info'] == "added") {?>
          <div class="alert alert-success" role="alert">
            Post has been added successfully
          </div>
        <?php } else if ($_REQUEST['info'] == "updated") {?>
          <div class="alert alert-success" role="alert">
            Post has been updated successfully
          </div>
        <?php } else if ($_REQUEST['info'] == "deleted") {?>
          <div class="alert alert-danger" role="alert">
            Post has been deleted successfully
          </div>
        <?php } else if ($_REQUEST['info'] == "accountdeleted") {?>
          <div class="alert alert-danger" role="alert">
            Account has been deleted
          </div>
        <?php }?>
      <?php }?>
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
        <div class="main-img">
          <img src="images/<?php echo $q['image'];?>" alt="main image">
        </div>
        <p class="content-js"><?php echo nl2br($q['content']);?></p>
        <div class="post-end">
          <a href="view.php?id=<?php echo $q['id'];?>" class="btn read-more">Read More</a>
          <div class="post-stats">
            <div>
              <span><i class="fas fa-arrow-up"></i></span>
              <span><?php echo $q['upvotes'];?></span>
            </div>
            <div>
              <span><i class="fas fa-comment"></i></span>
              <span><?php echo $q['comments'];?></span>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
<?php
  include_once "footer.php";
?>