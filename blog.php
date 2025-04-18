<?php
include_once('header.php');
include_once('side.php');
include_once('nav.php');
?>

<!-- Page Header Start -->
<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-sm-6 text-center text-md-left">
            <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">My Blog</h1>
        </div>
        <div class="col-sm-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white">My Blog</h4>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog List Start -->
<div class="container bg-white pt-5">
    <?php
    $sql = "SELECT * FROM `posts`";
    $resalt = mysqli_query($conn, $sql);
    if ($resalt->num_rows > 0) {
        while ($rows = $resalt->fetch_assoc()) {
            $postID =  $rows['postID'];
    ?>
    <div class="row blog-item px-3 pb-5">
        <div class="col-md-5">
            <img class="img-fluid mb-4 mb-md-0" src="img/<?php echo $rows['postImg'] ?>" alt="Image">
        </div>
        <div class="col-md-7">
            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold" style="text-align: center;">
                <?php echo $rows['postTitle'] ?></h3>
            <div class="d-flex mb-3">
                <small class="mr-2"><i class="fa fa-calendar-alt"></i>
                    <?php
                            $str =  $rows['postTime'];
                            $new_str = substr($str, 0, 16);
                            echo $new_str;
                            ?>
                </small>
                <small class="mr-2"><i class="fa fa-folder"></i>MY CARS</small>
                <?php
                        $sqlX = "SELECT COUNT(*) AS `x` FROM `comment` WHERE `comment`.`post_id` = $postID";
                        $resX = mysqli_query($conn, $sqlX);
                        if ($resX->num_rows > 0) {
                            while ($rowx = $resX->fetch_assoc()) {
                        ?>
                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> <?php echo $rowx['x']; ?> Comments</small>
                <?php
                            }
                        }
                        ?>
                <!-- <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small> -->
            </div>
            <p style="text-align: center; display: block; width: 400px; overflow: hidden; white-space: nowrap;
                text-overflow: ellipsis;">
                <?php echo $rows['postCont'] ?>
            </p>
            <a class="btn btn-link p-0" href="single.php?id=<?php echo $rows['postID'] ?>">Read More <i
                    class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <?php }
    } ?>
    <!-- <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-2.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-3.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-4.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-5.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-6.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div> -->
    <div class="row px-3 pb-5">
        <nav aria-label="Page navigation">
            <ul class="pagination m-0 mx-3">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Blog List End -->


<?php
include_once('footer.php');
?>