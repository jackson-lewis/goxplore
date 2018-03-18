            <div class="social-media">
        		<a title="Twitter"><img src="assets/icons/social-media/twitter.png" alt="Twitter"></a>
        		<a title="Facebook"><img src="assets/icons/social-media/facebook.png" alt="Facebook"></a>
        		<a title="Instagram"><img src="assets/icons/social-media/instagram.png" alt="Instagram"></a>
        		<a title="Pinterest"><img src="assets/icons/social-media/pinterest.png" alt="Pinterest"></a>
        	</div>
        	<ul class="links">
        		<li><a>about us</a></li>
        		<li><a>contact us</a></li>
        		<li><a>t's &amp; c's</a></li>
        		<li><a>privacy policy</a></li>
        		<li><a href="video.php">video</a></li>
        		<li><a href="destinations.php">destinations</a></li>
        		<li><a href="get-inspired.php">get inspired</a></li>

                <?php

                    if ( $session ) {
                        $link = 'user';
                        $display = 'View account';
                    } else {
                        $link = 'login';
                        $display = 'log in';
                    }

                ?>

        		<li><a href="<?php echo $link; ?>.php"><?php echo $display; ?></a></li>
        	</ul>
            <img src="assets/branding/icon-colour.png" alt="Icon" class="icon">
        	<small>&copy; 2018 - All rights reserved.</small>
