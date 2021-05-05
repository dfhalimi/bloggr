<?php
  include_once "header.php";
?>

    <?php
        if (isset($_SESSION["uid"])) {
    ?>
      <div class="form">
        <form action="includes/create.inc.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="title" placeholder="Blog Title">
          <input type="file" name="image">
          <textarea name="content" placeholder="Your text here..."></textarea>
          <input type="hidden" name="author" value="<?php echo $_SESSION['uid']?>">
          <button type="submit" name="new_post" class="btn">Add Post</button>
        </form>
      </div>
    <?php
        } else {
            header("Location: index.php");
            exit();
        }
    ?>
<?php
  include_once "footer.php";
?>