<?php
ob_start(); // تفعيل إخراج المخزن المؤقت
session_start(); // تفعيل الجلسة
include_once('header.php');
include_once('side.php');
include_once('nav.php');
$postID = $_GET['id'];
if (isset($_SESSION["id"])) {
    $_SESSION["id"];
}


$sql = "SELECT * FROM `posts` where `posts`.`postID`= $postID";
$res = mysqli_query($conn, $sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
?>

<!-- Page Header Start -->
<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-sm-6 text-center text-md-left">
            <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Blog Detail</h1>
        </div>
        <div class="col-sm-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="index.php">Home</a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white">Blog Detail</h4>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Start -->
<div class="container py-5 px-2 bg-white">
    <div class="row px-4">
        <div class="col-12">

            <img class="img-fluid mb-4" src="img/<?php echo $row['postImg'] ?>" alt="Image">
            <?php if (isset($_SESSION["id"])) { ?>
            <a href="edit.php?id=<?php echo $row['postID'] ?>" style="margin-left: 100px;"><svg
                    xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></a>
            <?php } ?>
            <h2 class="mb-3 font-weight-bold" style="text-align: right;"><?php echo $row['postTitle']; ?></h2>
            <div class="d-flex">
                <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i>
                    <?php
                            $str =  $row['postTime'];
                            $new_str = substr($str, 0, 16);
                            echo $new_str;
                            ?>
                </p>
                <p class="mr-3 text-muted"><i class="fa fa-folder"></i>MY CARS</p>
                <?php
                        $sqlX = "SELECT COUNT(*) AS `x` FROM `comment` WHERE `comment`.`post_id` = $postID";
                        $resX = mysqli_query($conn, $sqlX);
                        if ($resX->num_rows > 0) {
                            while ($rowx = $resX->fetch_assoc()) {
                        ?>
                <p class="mr-3 text-muted"> <i class="fa fa-comments"></i> <?php echo $rowx['x']; ?> Comments</p>
                <?php
                            }
                        }
                        ?>
                <!-- <p class="mr-3 text-muted"><i class="fa fa-comments"></i> 15 Comments</p> -->
            </div>
            <p style="text-align: right;"><?php echo $row['postCont']; ?></p>
            <h3 class="mb-3 font-weight-bold" style="text-align: right; direction: rtl;">
                <?php echo $row['subTitle']; ?></h3>
            <!-- <img class="w-50 float-left mr-4 mb-3" src="img/<?php echo $row['postImg'] ?>" alt="Image"> -->
            <p style="text-align: right;"><?php echo $row['subPostCont']; ?></p>
        </div>
        <?php }
} ?>
        <!-- <div class="col-12 py-4">
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
            <a href="" class="btn btn-sm btn-outline-primary mb-1">Lorem</a>
        </div> -->
        <div class="col-12 py-4">
            <div class="btn-group btn-group-lg w-100">
                <button type="button" class="btn btn-outline-primary" onclick="Previous()"><i
                        class="fa fa-angle-left mr-2"></i>
                    Previous</button>
                <button type="button" class="btn btn-outline-primary" onclick="next()">Next<i
                        class=" fa fa-angle-right ml-2"></i></button>
            </div>
        </div>
        <div class="col-12 py-4">
            <?php
            $sqlX = "SELECT COUNT(*) AS `x` FROM `comment` WHERE `comment`.`post_id` = $postID";
            $resX = mysqli_query($conn, $sqlX);
            if ($resX->num_rows > 0) {
                while ($rowx = $resX->fetch_assoc()) {
            ?>
            <h3 class="mb-4 font-weight-bold"><?php echo $rowx['x']; ?> Comments</h3>
            <?php
                }
            }
            ?>

            <?php
            $sql = "SELECT * FROM `comment` where `comment`.`post_id`= $postID";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
            ?>

            <div class="media mb-4">
                <img src="img/default-user-profile.jpg" alt="Image" class="mr-3 mt-1 rounded-circle"
                    style="width:60px;">
                <div class="media-body">
                    <h4><?php echo $row['comment_name'] ?> <small>At-<i><?php echo $row['COM_time'] ?></i></small></h4>
                    <p><?php echo $row['comment_msg'] ?></p>
                    <button class="btn btn-sm btn-light">Reply</button>
                </div>
            </div>
            <?php }
            } ?>
            <!-- <div class="media mb-4">
                <img src="img/user.jpg" alt="Image" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                <div class="media-body">
                    <h4>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <button class="btn btn-sm btn-light">Reply</button>
                    <div class="media mt-4">
                        <img src="img/user.jpg" alt="Image" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                        <div class="media-body">
                            <h4>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
    <?php
            if (isset($_POST['LeaveComment'])) {
                $comment_name = $_POST['comment_name'];
                $comment_mail = $_POST['comment_mail'];
                $comment_Website = $_POST['comment_Website'];
                $comment_msg = $_POST['comment_msg'];
                $sqlC = "INSERT INTO `comment` (`id`, `post_id`, `comment_name`, `comment_msg`, `comment_mail`, `comment_Website`) 
        VALUES (NULL,'$postID', '$comment_name', '$comment_msg', '$comment_mail', '$comment_Website')";
                if (mysqli_query($conn, $sqlC)) {
                    echo "New record created successfully";
                    header("Location: single.php?id=$postID");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            ?>
    <div class="col-12">
        <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
        <form action="single.php?id=<?php echo $postID ?>" method="POST">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" name="comment_name">
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" name="comment_mail">
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="comment_Website" class="form-control" name="website">
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea name="comment_msg" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="LeaveComment" value="Leave Comment" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<script>
function next() {
    window.location.href = "single.php?id=<?php echo $postID + 1 ?>";
}

function Previous() {
    window.location.href = "single.php?id=<?php echo $postID - 1 ?>";
}
</script>
<!-- Blog Detail End -->
<?php
        include_once('footer.php');
        ?>