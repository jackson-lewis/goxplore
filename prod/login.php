<?php   /* //////   LOGIN | PAGE   ////// */

            /* PAGE TITLE */
            $title = 'Log In';

            /* HAS HERO/NO-HERO */
            $hero = 'login';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>
            
            <div class="login hero">
                <div class="parallax ani-reg"><img src="assets/heros/pyramids.jpg" alt="Hero"></div>

                <div class="dual-heading">
                    <h3>Join our</h3>
                    <h1>community</h1>
                </div>

                

                <form class="form-login" action="user.php" method="post">
                    <input name="action" value="login" style="display: none">

                	<input type="name" name="username" placeholder="Username" autofocus>
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" placeholder="Submit" class="button-white"><br>
                    <a class="reg-link register-toggle">register</a>
                </form>



                <span class="caption">pyramids, egypt</span>

            </div>

            <div class="reg-wrap">
                <div class="register">
                    <h3>Register</h3>
                    <form class="form-register" action="user.php" method="post">
                        <input name="action" value="register" style="display: none">

                        <input type="name" name="name" placeholder="Name">
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password" id="p_1">
                        <input type="password" name="confirm" placeholder="Confirm Password" id="p_2">
                        <div class="select">
                            <input type="checkbox" name="newsletter"><label>Join our newsletter?</label>
                        </div>
                        <input type="submit" name="join" value="Join" class="button-blue">
                    </form>
                </div>
                <a class="cancel register-toggle"><span></span><span></span></a>
            </div>


            
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/no-footer.php'; # INCLUDES THE 'NO-FOOTER.PHP' FILE ?>