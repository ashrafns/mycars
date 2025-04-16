<?php
include_once('header.php');
include_once('side.php');
include_once('nav.php');

?>
<!-- Carousel Start -->
<div class="container p-0">
    <div class="carousel slide" data-ride="carousel" data-wrap="true">
        <div class="carousel-inner" id="blog-carousel">
            <?php
      $sql = "SELECT * FROM `posts`";
      $resalt = mysqli_query($conn, $sql);
      if ($resalt->num_rows > 0) {
        while ($rows = $resalt->fetch_assoc()) {
          $postID =  $rows['postID'];
      ?>
            <div class="carousel-item active slide">
                <img class="w-100" style="height: 400px !important;" src="img/<?php echo $rows['postImg'] ?>"
                    alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h2 class="mb-3 text-white font-weight-bold"><?php echo $rows['postTitle'] ?></h2>
                    <div class="d-flex text-white">
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
                        <small class="mr-2"> <i class="fa fa-comments"></i> <?php echo $rowx['x']; ?> Comments</small>
                        <?php
                  }
                }
                ?>
                    </div>
                    <a href="single.php?id=<?php echo $rows['postID'] ?>" class="btn btn-lg btn-outline-light mt-4">Read
                        More</a>
                </div>
            </div>
            <?php }
      } ?>
        </div>

        <!-- <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a> -->
    </div>
</div>

<!-- Carousel End -->

<!-- سكربت jQuery لتحقيق وظيفة العرض التلقائي للشرائح -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#blog-carousel .slide:gt(0)").hide();
    setInterval(function() {
        $('#blog-carousel .slide:first')
            .fadeOut(500)
            .next()
            .fadeIn(500)
            .end()
            .appendTo('#blog-carousel');
    }, 3000);
});
</script>

<!-- product section -->
<section class="product_section ">
    <div class="container">
        <div class="product_heading">
            <h2>
                Top Rating
            </h2>
        </div>
        <div class="product_container">
            <?php
      $sql = "SELECT * FROM `posts`";
      $res = mysqli_query($conn, $sql);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $postID =  $row['postID'];

      ?>
            <div class="box">
                <div class="box-content">
                    <div class="img-box">
                        <img src="img/<?php echo $row['postImg'] ?>" alt="">
                    </div>
                    <div class="detail-box">
                        <div class="text ">
                            <h5 style="text-align: center;">
                                <?php echo $row['postTitle']; ?>
                            </h5>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i>
                                    <?php
                      $str =  $row['postTime'];
                      $new_str = substr($str, 0, 16);
                      echo $new_str;
                      ?>
                                </small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i>MY CARS</small>
                                <?php
                    $sqlX = "SELECT COUNT(*) AS `x` FROM `comment` WHERE `comment`.`post_id` = $postID";
                    $resX = mysqli_query($conn, $sqlX);
                    if ($resX->num_rows > 0) {
                      while ($rowx = $resX->fetch_assoc()) {
                    ?>
                                <small class="mr-2 text-muted"> <i class="fa fa-comments"></i>
                                    <?php echo $rowx['x']; ?>
                                    Comments</small>
                                <?php
                      }
                    }
                    ?>
                            </div>
                        </div>
                        <div class="like">
                            <input type="hidden" value="<?php echo $row['postID'] ?>">
                        </div>
                    </div>
                </div>
                <div class="btn-box">
                    <a href="single.php?id=<?php echo $row['postID'] ?>">
                        Read More
                    </a>
                </div>
            </div>
            <?php }
      } ?>
        </div>
    </div>
</section>
<!-- end product section -->

<?php
include_once('footer.php');
?>