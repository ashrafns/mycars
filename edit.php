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
                    <h2 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Edit Blog Detail</h2>
                </div>
                <div class="col-sm-6 text-center text-md-right">
                    <div class="d-inline-flex pt-2">
                        <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                        <h4 class="m-0 text-white px-2">/</h4>
                        <h4 class="m-0 text-white">Edie Blog Detail</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Blog Detail Start -->
        <div class="container py-5 px-2 bg-white">
            <div class="row px-4">
                <div class="col-12">
                    <form action="" method="post">
                        <img class="img-fluid mb-4" src="img/<?php echo $row['postImg'] ?>" alt="Image">
                        <button name="edit" style="margin-left: 100px; border: none; "><svg xmlns="http://www.w3.org/2000/svg"
                                width="30" height="30" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                <path d="M11 2H9v3h2V2Z" />
                                <path
                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                            </svg></button>
                        <input class="mb-3 font-weight-bold" name="subject" value="<?php echo $row['postTitle']; ?>"
                            style="border: none; text-align:center;"></input>
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
                        </div>
                        <textarea class="form-control" rows="8" name="message" id="message" placeholder="Sub Message"
                            data-validation-required-message="Please enter your message"><?php echo $row['postCont']; ?></textarea>

                        <input class="mb-3 font-weight-bold" name="subTitle" style="border: none; text-align:center;"
                            value="<?php echo $row['subTitle']; ?>"></input>
                        <!-- <img class="w-50 float-left mr-4 mb-3" src="img/<?php echo $row['postImg'] ?>" alt="Image"> -->
                        <textarea class="form-control" rows="15" name="subPostCont" id="message" placeholder="Sub Message"
                            data-validation-required-message="Please enter your message"><?php echo $row['subPostCont']; ?></textarea>
                    </form>
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
                <button type="button" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i>
                    Previous</button>
                <button type="button" class="btn btn-outline-primary">Next<i
                        class="fa fa-angle-right ml-2"></i></button>
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
            <!-- </div> -->
        </div>
            </div>
            <div class="col-12">
                <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="url" class="form-control" id="website">
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Leave Comment" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <!-- </div> -->
        </div>
        <!-- Blog Detail End -->

        <?php
        if (isset($_POST['edit'])) {
            echo "hi";
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $subPostCont = $_POST['subPostCont'];
            $subTitle = $_POST['subTitle'];

            // // Get the image data from the uploaded file
            // $ImageName = $_FILES["image"]["name"];
            // $imageTmp = $_FILES["image"]["tmp_name"];

            // $Image = rand(0, 1000) . "ـ" . $ImageName;
            // move_uploaded_file($imageTmp, "./img/" . $Image);

            // // Execute the INSERT query to add the image data to a table
            $sql = "UPDATE `posts` SET 
            `postCont` = '$message',
            `subPostCont` = '$subPostCont',
            `postTitle` = '$subject',
            `subTitle` = '$subTitle' where `posts`.`postID`= $postID";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: single.php?id=$postID");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        include_once('footer.php');
        ?>