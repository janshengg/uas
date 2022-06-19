<?php 

require 'functions.php';

$genreFilm = ["","Sports","TV Show","Movies","Kids","Anime","Fantasy","Action","Romance"];

if($_GET):
    $filmSearch = query("SELECT * FROM film where id = '$_GET[id]' ");
    $filmSearch = $filmSearch ? $filmSearch[0] : "";

    $anotherFilm = query("SELECT * FROM film where genre = $filmSearch[genre] and id != $_GET[id]");

else:
    header('Location: ');
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Nonton</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
    
    <!-- header -->
    <div class="top-header-area bg-danger" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="img/logo.png" width="150" height="50">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php?genre=1">Sports</a></li>
                                <li><a href="index.php?genre=2">TV Show</a></li>
                                <li><a href="index.php?genre=3">Movies</a></li>
                                <li><a href="index.php?genre=7">Action</a></li>
                                <li><a href="index.php?genre=4">Kids</a></li>
                                <li><a href="#">More ▼</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.php?genre=5">Anime</a>
                                        </li>
                                        <li>
                                            <a href="index.php?genre=6">Fantasy</a>
                                        </li>
                                        <li>
                                            <a href="index.php?genre=8">Romance</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For Movie: </h3>
                            <form action="search.php" method="get">
                                <input type="text" placeholder="Keywords" name="title">
                                <button type="submit">Search<i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150 bg-dark">
        <div class="container">

            <div class="row">
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="single-latest-news text-center bg-transparent shadow-none">
                        <a href="detail.php?id=<?= $filmSearch['id'] ?>">
                            <img src="<?= $filmSearch['image'] ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 mt-5">
                    <h3><span class="orange-text"><?= $filmSearch['title'] ?></span> </h3>
                    <a href="watch.php?id=<?= $filmSearch['id'] ?>" class="btn btn-danger text-white p-3 px-5 my-5" style="border-radius:30px">Mulai Nonton</a><br>
                    <div class="detail text-light">
                    <p class="text-light">Genre : <?= $genreFilm[$filmSearch['genre']] ?></p><hr>
                    <p class="text-light">Tanggal Rilis : <?= $filmSearch['release_date'] ?></p><hr>
                    <p class="text-light">Rating : <?= $filmSearch['vote_average'] ?></p><hr>
                    <p class="text-light">Jumlah Vote : <?= $filmSearch['vote_count'] ?></p><hr>
                    <p class="text-light">Deskripsi : <?= $filmSearch['description'] ?></p>
                    </div>
                    
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12 mb-4">
                    <h5>Tontonan yang Serupa -  "<?= $filmSearch['title'] ?>"</h5>
                </div>
                <?php foreach ($anotherFilm as $key => $value): ?>
                    <div class="col-sm-2">
                        <div class="single-latest-news text-center">
                            <a href="detail.php?id=<?= $value['id'] ?>">
                                <img src="<?= $value['image'] ?>" alt="">
                            </a>
                            <div class="news-text-box p-1 text-dark">
                                <p><a href="single-news.html" class="text-light"><?= $value['title'] ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- end latest news -->
    

    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>
</html>