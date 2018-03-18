        <?php   /* //////   USER | PAGE   ////// */

        $action   = $_REQUEST[ 'action' ];

        if ( isset( $action ) ) {

            if ( $action == 'register' ) {
                $name    = $_REQUEST[ 'name' ];
                $email   = $_REQUEST[ 'email' ];
            } 

            $username = $_REQUEST[ 'username' ];
            $password = $_REQUEST[ 'password' ];

            $conn = new mysqli( "localhost", "root", "root", "goxplore" );

            $verify = "
            SELECT name, acc_type  
            FROM users 
            WHERE username = '". $username ."' 
            AND password = '". $password ."'
            ";

            $result = $conn->query( $verify );

            if ( $result->num_rows > 0 ) {
                while ( $row = $result->fetch_assoc() ) {
                    $name = ucwords( $row['name'] );
                    $acc_type = $row['acc_type'];

                    $access  = true;
                    $register = false;
                    $session = false;
                }
            }  else {
                $access = false;

                if ( $action == 'register' ) {

                    $session = false;
                    $register = true;
                } else {

                    $session = false;
                    $register = false;
                }
                
            }

            if ( $register ) {

                $acc_type = 1;
                $date = date( 'Y-m-d h:i:s' );

                $new_user = "
                INSERT INTO users ( name, email, username, password, acc_type, date_join ) 
                VALUES ( '$name', '$email', '$username', '$password', '$acc_type', '$date' )";

                if ( $conn->query( $new_user ) ) {
                    $access = true;
                } else {
                    $access = false;
                }

            }

        }

        /* PAGE TITLE */
        $title = 'admin';

        /* HAS HERO/NO-HERO */
        $hero = 'system';

        ?>        

        <?php include 'include/core/header.php'; ?>

        
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main style="text-align: center;">

            <?php

            if ( $session ) {
                $access = true;
            }


            if ( $access || $register ) {

                if ( !$session || $register ) {

                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $_SESSION["name"]     = ucwords( $name );
                    $_SESSION["account"]  = $acc_type;
                }

                if ( $acc_type == 3 ) {
                    $acc_name = 'admin';
                } else if ( $acc_type == 2 ) {
                    $acc_name = 'editor';
                } else {
                    $acc_name = $username;
                }

                if ( $acc_type == 1 ) { // USER

                    include 'include/users/casual.php';

                } else if ( $acc_type == 2 ) { // EDITOR

                    include 'include/users/editor.php';

                } else if ( $acc_type == 3 ) { // ADMIN

                    include 'include/users/admin.php';

                }

                ?>

                <a class="button-blue log-out">log out</a>

                <?php

            } else {

            ?>

            <article class="page-intro">
                <h1>ohhh dear</h1>
                <p>You couldn't log in :(</p>
            </article>

            <?php

            ?>
            <a href="login.php" class="button-blue">try again</a>

            <?php } ?>

        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/no-footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>