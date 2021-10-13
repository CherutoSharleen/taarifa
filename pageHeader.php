
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>AppLand - App Landing Page Template</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assets/css/animate.css">
        
    <!--====== lineicons CSS ======-->
    <link rel="stylesheet" href="assets/css/lineicons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/search.css">
    <!--===Carrousel css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

     <link id="theme-style" rel="stylesheet" href="assets/css/theme-1.css">

      <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        
<link rel="stylesheet" href="carousel-02/css/owl.carousel.min.css">
    <link rel="stylesheet" href="carousel-02/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
        <link rel="stylesheet" href="carousel-02/css/style.css">

    
</head>

<body>
   

    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <!----STARRTTTT-->
                    

                                <!---END -->
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="pageHeader.php"> Feeds</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="categoriesIndex.php">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="savedFeeds.php?myid=<?php echo $_SESSION['userid']; ?>">Saved Feeds</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="library.php?myid=<?php echo $_SESSION['userid']; ?>">Suggestions</a>
                                    </li>
                                 <!--    <li class="nav-item">><a href="#">
                        <?php
                         if (!isset($_SESSION["userid"])) {
                            header("location: ../index.html");
                            
                         }
                        

                        ?>
                            <div>
                                <span class="far fa-user-circle"></span>
                            
                                <h4> Welcome <?php echo $_SESSION["user"]; ?></h4>
                            </div>  
                                
                            
                        </a>-->
                        
                        
                    </li>
                                   <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#screenshots">Screenshots</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#download">Contact</a>
                                    </li>-->
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
</header>
</body>
</html>