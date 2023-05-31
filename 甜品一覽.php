<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Catorce Dessart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Kelly - v4.7.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="index.php" class="logo" style="font-family: Dancing Script ">
                <font color="black">Catorce Dessart</font>
            </a>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="index.php">首頁</a></li>
                    <li><a class="active" href="甜品一覽.php">甜品一覽</a></li>
                    <li><a href="員工管理.php">員工管理</a></li>
                    <li><a href="甜點食譜.php">甜點食譜</a></li>
                    <li><a href="門市據點.php">門市據點</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

        <style>
            input[type=text] {
                border: none;
                border-bottom: 2px solid green;
            }

            select {
                border: none;
                border-bottom: 2px solid green;
            }
        </style>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <?php
                $searchtxt = $_GET['searchtxt'];
                ?>
                <div class="section-title">
                    <h2>甜品一覽</h2>

                    <div align=center style="padding-bottom:30px;">
                        <form method=get action="甜品一覽.php">
                            <select name="searchtxt">
                                <option selected value="<?php echo $_GET['searchtxt']; ?>"><?php echo $_GET['searchtxt']; ?></option>
                                <option value="">所有分店</option>
                                <option value="中正店">中正店</option>
                                <option value="輔大店">輔大店</option>
                                <option value="板橋店">板橋店</option>
                            </select>
                            <input type=submit value="分店查詢">
                        </form>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters" bg-light>
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".蛋糕">Cake</li>
                            <li data-filter=".布丁">Pudding</li>
                            <li data-filter=".餅乾">Cookie</li>
                            <li data-filter=".塔">Tart</li>
                        </ul>
                    </div>

                    <div align=right style="padding-bottom:30px;">
                        <form method=get onClick="submit()">
                            <h6>價格
                                <?php if ($_GET['sltsort2'] == 'asc') { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-up" style="color:00E3E3"></i><input name="sltsort2" value="desc" hidden></a>
                                <?php } elseif ($_GET['sltsort2'] == 'desc') { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-down" style="color:00E3E3"></i><input name="sltsort2" value="asc" hidden></a>
                                <?php } else { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-down-up" style="color:00E3E3"></i><input name="sltsort2" value="asc" hidden></a>
                                <?php } ?>
                                <input name="sortname" type="hidden" value="price">
                                <input name="searchtxt" type="hidden" value="<?php echo $searchtxt; ?>">
                            </h6>
                        </form>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


                    <?php
                    $link = mysqli_connect('localhost', 'root', '12345678', 'dessertshop');
                    $place = " and S_NAME = '" . $searchtxt . "'";

                    $sortname = $_GET['sortname'];
                    $sltsort = $_GET['sltsort2'];

                    if (empty($searchtxt)) {
                        if (isset($sltsort)) {
                            $sql  = "select * from dessert order by " . $sortname . " " . $sltsort;
                        } else {
                            $sql = "select * from dessert";
                        }
                    } else {
                        if (isset($sltsort)) {
                            $sql  = "select * from dessert, product, shop where dessert.D_NAME = product.D_NAME and product.S_ID = shop.S_ID" . $place . " order by " . $sortname . " " . $sltsort;
                        } else {
                            $sql = "select * from dessert, product, shop where dessert.D_NAME = product.D_NAME and product.S_ID = shop.S_ID" . $place;
                        }
                    }

                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo
                        "<div class='col-lg-4 col-md-6 portfolio-item " . $row['category'] . "'>
                        <div class='portfolio-wrap'>
                            <img src='assets/img/portfolio/" . $row['D_NAME'] . ".jpg' class='img-fluid' >
                            <div class='portfolio-info'>
                                <h4>" . $row['D_NAME'] . "</h4>
                                <p>價格: " . $row['price'] . "元</p>
                                <div class='portfolio-links'>
                                    <a href='assets/img/portfolio/" . $row['D_NAME'] . ".jpg' data-gallery='portfolioGallery' class='portfolio-lightbox' title='<b>" . $row['D_NAME'] . "</b> <br> 價格:" . $row['price'] . "元" . "'><i class='bx bx-plus'></i></a>

                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                2022 © Catorce Dessart
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>