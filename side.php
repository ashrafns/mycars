<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post_db";
// CZueSw6XHcal
// mycarsw1_qwe

// $servername = "sql12.freesqldatabase.com:3306";
// $username = "sql12773468";
// $password = "7mPPhBuEb2";
// $dbname = "sql12773468";

// $servername = "198.45.114.194";
// $username = "mycarsw1_qwe";
// $password = "CZueSw6XHcal";
// $dbname = "mycarsw1_qwe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$sql = "SELECT * FROM `user`";
$res = mysqli_query($conn, $sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $img = "$row[userImg]";
?>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3"
                    src="img/<?php echo $row['userImg'] ?>" alt="Image">
                <h1 class="font-weight-bold"><?php echo $row['userName'] ?></h1>
                <p class="mb-4">
                    <?php echo $row['userBaio'] ?>
                </p>
                <div class="d-flex justify-content-center mb-5">
                    <a class="btn btn-outline-primary mr-2" href="<?php echo $row['twiiter'] ?>"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="<?php echo $row['facebook'] ?>"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="<?php echo $row['linkedin'] ?>"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="<?php echo $row['instgram'] ?>"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a>
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <?php }
} ?>