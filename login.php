<?php
ob_start(); // تفعيل إخراج المخزن المؤقت
session_start(); // تفعيل الجلسة
include_once('header.php');
include_once('side.php');
include_once('nav.php');

if (isset($_POST['submit'])) {
    $mail = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user`";
    $res = mysqli_query($conn, $sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($row['email'] = $mail && $row['password'] = $password) {
            $_SESSION["id"] = $row['id'];
            echo "welcome MR " .  $row['userName'];
            ".";
            header("refresh:2; url=admin.php?id=" . $_SESSION["id"]);
        } else {
            echo "mail is not correct ";
        }
    }
}

?>

<form action="" method="post" class="text-center mb-6" style="margin-top: 150px !important;">
    <h1 class="font-weight-bold">Login Page</h1>
    <div class="control-group text-center mb-3">
        <input class="form-control" placeholder="Write Your Email" type="email" name="email" id="">
    </div>
    <div class="control-group text-center mb-3">
        <input class="form-control" placeholder="Write Your Password" type="password" name="password" id="">
    </div>
    <div class="control-group text-center mb-3">
        <input class="form-control btn btn-primary" placeholder="" type="submit" name="submit">
    </div>

</form>
<div style="width: 100%; height: 40vh;">

</div>

<?php
include_once('footer.php');
?>