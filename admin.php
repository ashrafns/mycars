<?php
ob_start(); // تفعيل إخراج المخزن المؤقت
session_start(); // تفعيل الجلسة
include_once('header.php');
include_once('side.php');
include_once('nav.php');
if (isset($_SESSION["id"])) {

    if (isset($_POST['submit'])) {
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $subPostCont = $_POST['subPostCont'];
        $subTitle = $_POST['subTitle'];

        // Get the image data from the uploaded file
        $ImageName = $_FILES["image"]["name"];
        $imageTmp = $_FILES["image"]["tmp_name"];

        $Image = rand(0, 1000) . "ـ" . $ImageName;
        move_uploaded_file($imageTmp, "./img/" . $Image);

        // Execute the INSERT query to add the image data to a table
        $sql = "INSERT INTO `posts` (`postID`, `postImg`, `postCont`, `subPostCont`, `postTitle`, `subTitle`, `postTime`) VALUES
     (NULL, '$Image', '$message', '$subPostCont', '$subject', '$subTitle', current_timestamp());";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if (isset($_POST['Update'])) {
        $pro_user = $_POST['pro_user'];
        $BIO = $_POST['BIO'];
        $twiiter = $_POST['twiiter'];
        $facebook = $_POST['facebook'];
        $linkedin = $_POST['linkedin'];
        $instgram = $_POST['instgram'];

        // Get the image data from the uploaded file
        $ImageName = $_FILES["pro_img"]["name"];
        if (!empty($ImageName)) {
            $imageTmp = $_FILES["pro_img"]["tmp_name"];
            $Image = rand(0, 1000) . "ـ" . $ImageName;
            move_uploaded_file($imageTmp, "./img/" . $Image);

            // Execute the INSERT query to add the image data to a table
            $sqlP = "UPDATE `user` SET 
            `userImg` = '$Image',
            `userName` = '$pro_user',
            `userBaio` = '$BIO',
            `twiiter` = '$twiiter',
            `facebook` = '$facebook',
            `linkedin` = '$linkedin',
            `instgram` = '$instgram'
            WHERE `user`.`id` = 1";
            if (mysqli_query($conn, $sqlP)) {
                echo "Updated successfully";
            } else {
                echo "Error: " . $sqlP . "<br>" . mysqli_error($conn);
            }
        } else {
            $sqlP = "UPDATE `user` SET 
            `userName` = '$pro_user',
            `userBaio` = '$BIO',
            `twiiter` = '$twiiter',
            `facebook` = '$facebook',
            `linkedin` = '$linkedin',
            `instgram` = '$instgram'
            WHERE `user`.`id` = 1";
            if (mysqli_query($conn, $sqlP)) {
                echo "Updated successfully";
            } else {
                echo "Error: " . $sqlP . "<br>" . mysqli_error($conn);
            }
        }
        header("refresh:0; url=admin.php");
    }
    $sql = "SELECT * FROM `user`";
    $res = mysqli_query($conn, $sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
?>
            <form method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <input type="file" class="form-control" id="img" name="pro_img" value="<?php echo $row['userImg'] ?>"
                        data-validation-required-message="Please enter your name" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="pro_user" id="subject" value="<?php echo $row['userName'] ?>"
                        required="required" data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea class="form-control" rows="8" name="BIO" id="message" placeholder="<?php echo $row['userBaio'] ?>"
                        required="required"
                        data-validation-required-message="Please enter your message"><?php echo $row['userBaio'] ?></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="twiiter" id="subject" value="<?php echo $row['twiiter'] ?>"
                        data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"><i class="fab fa-twitter"></i></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="facebook" id="subject" value="<?php echo $row['facebook'] ?>"
                        data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"><i class="fab fa-facebook-f"></i></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="linkedin" id="subject" value="<?php echo $row['linkedin'] ?>"
                        data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"><i class="fab fa-linkedin-in"></i></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="instgram" id="subject" value="<?php echo $row['instgram'] ?>"
                        data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"><i class="fab fa-instagram"></i></p>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="Update" id="sendMessageButton">Update</button>
                </div>
            </form>


            <!-- Page Header Start -->
            <!-- <div class="container py-5 px-2 bg-primary">
                <div class="row py-5 px-4">
                    <div class="col-sm-6 text-center text-md-left">
                        <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Contact Me</h1>
                    </div>
                    <div class="col-sm-6 text-center text-md-right">
                        <div class="d-inline-flex pt-2">
                            <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                            <h4 class="m-0 text-white px-2">/</h4>
                            <h4 class="m-0 text-white">Contact Me</h4>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="container bg-white pt-5">
                <div class="row px-3 pb-2">
                    <div class="col-sm-4 text-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Address</h4>
                        <input value="<?php echo $row['address'] ?>" style="border: none; text-align:center;"></input>
                    </div>
                    <div class="col-sm-4 text-center mb-3">
                        <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Phone</h4>
                        <input value="<?php echo $row['phone'] ?>" style="border: none; text-align:center;"></input>
                        <p></p>
                    </div>
                    <div class="col-sm-4 text-center mb-3">
                        <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                        <h4 class="font-weight-bold">Email</h4>
                        <input value="<?php echo $row['email'] ?>" style="border: none; text-align:center;"></input>
                    </div>
                </div>
        <?php }
    } else {
        echo "Error: " . $sqluser . "<br>" . mysqli_error($conn);
    } ?>
        <div class="col-md-12 pb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form method="post" enctype="multipart/form-data">
                    <div class="control-group">
                        <input type="file" class="form-control" id="img" name="image" placeholder="Your Title"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Tiltle"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="8" name="message" id="message" placeholder="Message"
                            required="required" data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" name="subTitle" id="subTitle" placeholder="Sub Tiltle"
                            data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="8" name="subPostCont" id="message" placeholder="Sub Message"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit" name="submit" id="sendMessageButton">Uplode</button>
                    </div>
                </form>
            </div>
        </div>
            </div>
            <!-- Contact End -->

        <?php
    } else {
        echo '<div style="width: 100%; height: 79vh;">you are not allwed to see this page ...</div>';
        header("refresh:2; url=login.php");
    }
    include_once('footer.php');
        ?>