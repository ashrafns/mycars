<?php
include_once('header.php');
include_once('side.php');
include_once('nav.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $Message = $_POST['message'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    $to = "ashrafns@gmail.com";
    $subject = $subject;
    $message = $Message;
    $headers = "From: " . $email;

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}

?>

<!-- Page Header Start -->
<div class="container py-5 px-2 bg-primary">
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
</div>
<!-- Page Header End -->
<?php
$sql = "SELECT * FROM `user`";
$res = mysqli_query($conn, $sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
?>
        <!-- Contact Start -->
        <div class="container bg-white pt-5">
            <div class="row px-3 pb-2">
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Address</h4>
                    <p><?php echo $row['address'] ?></p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Phone</h4>
                    <p><?php echo $row['phone'] ?></p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Email</h4>
                    <p><?php echo $row['email'] ?></p>
                </div>
            </div>
    <?php }
}
    ?>
    <div class="col-md-12 pb-5">
        <div class="contact-form">
            <div id="success"></div>
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
                <div class="control-group">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required="required"
                        data-validation-required-message="Please enter your name" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="required"
                        data-validation-required-message="Please enter your email" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="required"
                        data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea class="form-control" rows="8" name="message" placeholder="Message" required="required"
                        data-validation-required-message="Please enter your message"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <button class="btn btn-primary" name="submit" type="submit" id="sendMessageButton">Send
                        Message</button>
                </div>
            </form>
        </div>
    </div>
        </div>
        <!-- Contact End -->


        <?php
        include_once('footer.php');
        ?>