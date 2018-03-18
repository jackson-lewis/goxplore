        <?php   /* //////   HOME | PAGE   ////// */

            /* PAGE TITLE */
            $title = 'Home of Exploration';

            /* HAS HERO/NO-HERO */
            $hero = 'master';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>

            <div class="hero">
                <div class="parallax">

            <?php 

            $sql = "SELECT name, location  
            FROM heros 
            ORDER BY RAND() LIMIT 4";

            $i = 4;

            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                // TAKE DATABASE TABLE ROWS AND ASSIGN NEW VARIABLES
                $name  = $row['name'];
                $location  = $row['location'];

                $name_url = str_replace(" ","-", $name );
                $caption = $name . ', ' . $location;

            ?>
            
                    <img class="ani-reg-<?php echo $i; ?>" src="assets/heros/<?php echo $name_url; ?>.jpg" alt="<?php echo $caption; ?>" data-position="<?php echo $i; ?>">

            <?php $i--; }} ?>

                </div>
                <div class="dual-heading" id="heading-parallax">
                    <h3>It's time to</h3>
                    <h1>explore</h1>
                </div>
                <span class="caption"><?php echo $caption; ?></span>
                <div class="prompt">
                    <span></span>
                </div>
            </div>

            

            <div class="container">
            
                <article class="page-intro">
                    <p>In a world where it is becoming easier than ever to explore, we are here to help you decide on your next trip of a lifetime...</p>
                </article>
                
                <section class="showcase">
                    <div class="dual-heading">
                        <h3>Most Popular</h3>
                        <h2>destinations</h2>
                    </div>
                    
                    <div class="segment">

                        <?php 

                        $sql2 = "SELECT des_id, name, description 
                        FROM destinations
                        ORDER BY name 
                        LIMIT 6
                        ";

                        $result = $conn->query($sql2);
                        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                            // TAKE DATABASE TABLE ROWS AND ASSIGN NEW VARIABLES
                            $id  = $row['des_id'];
                            $name  = $row['name'];
                            $desc  = $row['description'];

                            $name_url = str_replace(" ","-", $name );

                            include 'include/components/item-reg.php';

                        }} ?>

                    </div>
                    
                </section>

                <section class="showcase">
                    <div class="dual-heading">
                        <h3>Hottest</h3>
                        <h2>experiences</h2>
                    </div>
                    
                    <div class="segment">

                        <?php 

                        $query = "
                        SELECT video.vid_id, video.video_time, experiences.exp_name, destinations.name 

                        FROM video
                            INNER JOIN experiences
                                ON video.vid_id = experiences.vid_id

                            INNER JOIN destinations
                                ON video.des_id = destinations.des_id

                        AND NOT video.video_type = 0 

                        LIMIT 6";

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                            $id           = $row['vid_id'];
                            $time         = $row['video_time'];
                            $destination  = $row['name'];
                            $name          = $row['exp_name'];

                            $page = false;

                            include 'include/components/item-vid.php';

                        }} ?>

                    </div>
                    
                </section>


                <?php include 'include/components/getinspired.php'; ?>

                <?php include 'include/components/newsletter.php'; ?>

                <?php include 'include/components/adventure.php'; ?>

            </div>
            
            
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/half-footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>