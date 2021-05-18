<?php
    include_once "header.php";
?>

<?php
    require_once "includes/dbh.inc.php";

    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM blog_posts WHERE title LIKE '%$search%' OR 
        content LIKE '%$search%' OR author LIKE '%$search%' OR publishDate LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "<h1 class='posts-overview'>Search Results for: ".$_POST['search']." </h1>";

        if ($queryResult == 1) {
            echo "<h2 style='text-align: center'>There is 1 result!</h2>";
        }

        if ($queryResult > 1) {
            echo "<h2 style='text-align: center'>There are ".$queryResult." results!</h2>";
        }

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='post'>
                    <h1>".$row['title']."</h1>
                    <div class='post-info'>
                    <div class='profile-pic'>
                        <a href='user.php?user=".$row['author']."'>";
                $sqlUser = "SELECT * FROM users WHERE usersUid = '$row[author]';";
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
                echo "</a>        
                    </div>
                    <div>
                        <p class='author-name'><a href='user.php?user=".$row['author']."'>".$row['author']."</a></p>
                        <p>".$row['publishDate']."</p>
                    </div>
                    </div>
                    <div class='main-img'>
                    <img src='images/".$row['image']."' alt='main image'>
                    </div>
                    <p class='content-js'>".nl2br($row['content'])."</p>
                    <div class='post-end'>
                        <a href='view.php?id=".$row['id']."' class='btn read-more'>Read More</a>
                        <div class='post-stats'>
                            <div>
                                <span><i class='fas fa-arrow-up'></i></span>
                                <span>".$row['upvotes']."</span>
                            </div>
                            <div>
                                <span><i class='fas fa-comment'></i></span>
                                <span>".$row['comments']."</span>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<h2 style='text-align: center'>There are no results matching your search!</h2>";
        }
    }
?>

<?php
    include_once "footer.php";
?>