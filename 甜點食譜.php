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
                    <li><a href="甜品一覽.php">甜品一覽</a></li>
                    <li><a href="員工管理.php">員工管理</a></li>
                    <li><a class="active" href="甜點食譜.php">甜點食譜</a></li>
                    <li><a href="門市據點.php">門市據點</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>甜點食譜</h2>

                    <div align=right style="padding-bottom:30px;">
                        <form method=get onClick="submit()">
                            <h6>總含糖量
                                <?php if ($_GET['sltsort2'] == 'asc') { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-up" style="color:00E3E3"></i><input name="sltsort2" value="desc" hidden></a>
                                <?php } elseif ($_GET['sltsort2'] == 'desc') { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-down" style="color:00E3E3"></i><input name="sltsort2" value="asc" hidden></a>
                                <?php } else { ?>
                                    <a href="javascript:;"><i class="bi bi-arrow-down-up" style="color:00E3E3"></i><input name="sltsort2" value="asc" hidden></a>
                                <?php } ?>
                                <input name="sortname" type="hidden" value="totalsugar">
                            </h6>
                        </form>
                    </div>
                </div>

                <?php
                $D_NAME = array();
                $ingredient = array();
                $i = 0;
                $sortname = $_GET['sortname'];
                $sltsort = $_GET['sltsort2'];

                $link = mysqli_connect('localhost', 'root', '12345678', 'dessertshop');
                if (isset($sortname)) {
                    $sql  = "select D_NAME, sum(weight) as totalsugar from recipe where ingredient like '%糖%' group by D_NAME order by totalsugar " . $sltsort;
                } else {
                    $sql  = "select D_NAME from recipe group by D_NAME";
                }

                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    while (isset($D_NAME[$i])) {
                        $i++;
                    }
                    $D_NAME[$i] = $row['D_NAME'];
                }

                for ($j = 0; $j < 12; $j++) {
                    $x = 0;
                    $sql2  = "select ingredient from recipe where D_NAME = '$D_NAME[$j]'";
                    $result2 = mysqli_query($link, $sql2);
                    while ($row = mysqli_fetch_assoc($result2)) {
                        while (isset($ingredient[$j][$x])) {
                            $x++;
                        }
                        $ingredient[$j][$x] = $row['ingredient'];
                    }
                }

                ?>

                <table class="table table-bordered table-striped">
                    <tr class="table-success text-center">
                        <th>甜點名稱</th>
                        <th colspan="8">成分</th>
                    </tr>

                    <?php
                    for ($j = 0; $j < 12; $j++) {
                        echo
                        "<tr>
                            <td>$D_NAME[$j]</td>
                            <td>" . $ingredient[$j][0] . "</td>
                            <td>" . $ingredient[$j][1] . "</td>
                            <td>" . $ingredient[$j][2] . "</td>
                            <td>" . $ingredient[$j][3] . "</td>
                            <td>" . $ingredient[$j][4] . "</td>
                            <td>" . $ingredient[$j][5] . "</td>
                            <td>" . $ingredient[$j][6] . "</td>
                            <td>" . $ingredient[$j][7] . "</td>
                        </tr>";
                    }

                    ?>
                </table><br>

            </div>
        </section><!-- End Services Section -->

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