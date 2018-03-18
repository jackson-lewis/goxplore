<!--   ////   JACKSON LEWIS COPYRIGHT 2018 - GOXPLORE - v1.1   ////   -->

<?php include 'include/functions/session.php'; ?>

<!DOCTYPE html> 

<html lang="en-gb">
    
    <head>
        
        <!-- TITLE -->
        <title><?php echo $title . ' | Goxplore'; ?></title>
        
        <!-- META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="<?php echo 'assets/icons'; ?>">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <!-- JAVASCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/script.js"></script>
        
        
    </head>
    
    <body data-hero="<?php echo $hero; ?>" data-page="<?php echo $title; ?>">

        <?php  include_once 'include/functions/connection.php'; ?>
        
        <header>
            
            <!-- LOGO -->
            <div class="logo">
                <a href="index.php">
                    <img src="assets/branding/logo-white.png" alt="Logo" class="image-1">
                    <img src="assets/branding/logo-colour.png" alt="Logo" class="image-2">
                </a>
            </div>
            
            <nav>
                
                <!-- SEARCH -->
                <div class="search-icon" id="search-toggle">
                    <img src="assets/icons/search-icon-white.png" alt="Search" class="image-1">
                    <img src="assets/icons/search-icon-colour.png" alt="Search" class="image-2">

                    <!-- CLOSE -->
                    <div class="close">
                        <div class="cross1"></div>
                        <div class="cross2"></div>
                    </div>
                </div>

                <?php

                if ( !isset( $query ) ) {
                    $query = 'Search...';
                }

                ?>

                <!-- SEARCH BAR -->
                <div class="search-container">
                    <form class="search" action="search.php" method="post">
                        <input type="text" name="search" placeholder="<?php echo $query; ?>">
                        <input type="submit" name="search-submit">
                    </form>
                    <!-- <p id="res-count"></p> -->
                </div>
                
                <!-- HAMBURGER -->
				<div class="hamburger" id="nav-toggle">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
                
                <!-- NAV -->
                <ul id="nav">
					<li role="presentation"><a href="index.php">home</a></li>
					<li role="presentation"><a href="destinations.php">destinations</a></li>
                    <li role="presentation"><a href="video.php">video</a></li>
                    <li role="presentation"><a href="get-inspired.php">get inspired</a></li>

                    <?php

                        if ( $session || $access ) {
                            $link = 'user';
                            $display = $name;
                            $display = explode( ' ', $display );
                            $display = $display[0];
                        } else {
                            $link = 'login';
                            $display = 'log in';
                        }

                    ?>


                    <li role="presentation"><a href="<?php echo $link; ?>.php" class="login-link"><?php echo $display; ?></a></li>


				</ul>
                
            </nav>
            
        </header>
        