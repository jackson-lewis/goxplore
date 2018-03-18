        <?php   /* //////   DESTINATION | PAGE   ////// */


            $des_id = $_REQUEST['id'];

            /* PAGE TITLE */
            $title = $des_id;

            /* HAS MASTER-HERO/NO-HERO */
            $hero = 'reg';

        ?>        



        <?php 

        include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE 

        $sql = "
        SELECT destinations.des_id, destinations.name, destinations.country, destinations.description, video.video_url

        FROM destinations
            INNER JOIN video
                ON destinations.des_id = video.des_id

        WHERE destinations.des_id = " . $des_id . " LIMIT 1";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

            // TAKE DATABASE TABLE ROWS AND ASSIGN NEW VARIABLES
            $id     = $row['des_id'];
            $destination  = ucwords( $row['name'] );
            $country  = $row['country'];
            $desc  = $row['description'];

            $caption = $destination . ', ' . $country;

            $name_url = str_replace(" ","-", $destination );

            $url  = $row['video_url'];

        ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>
            
            <div class="hero">
                <div class="parallax"><img class="ani-reg-1" src="assets/destinations/<?php echo $destination; ?>/hero/<?php echo $name_url; ?>.jpg" alt="Hero"></div>
                <div class="dual-heading" id="heading-parallax">
                    <h3>Welcome to</h3>
                    <h1 data-title="<?php echo $destination; ?>"><?php echo $destination; ?></h1>
                </div>
                <span class="caption"><?php echo $caption; ?></span>
            </div>
            
            <div class="container">
                <article class="page-intro">
                    <p><?php echo $desc; ?></p>
                </article>

                <div class="video-container">
                    <div class="video-player">
                        <iframe src="https://www.youtube.com/embed/<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <p data-player="caption">See <span><?php echo $destination; ?></span> in all its glory</p>
                </div>

                <?php }} ?>
                

                

                <div class="dual-heading">
                    <h3>Top</h3>
                    <h2>experiences</h2>
                </div>

                <div class="segment">

                    <?php 

                    $sql2 = "
                    SELECT video.vid_id, video.video_type, video.video_time, experiences.exp_name, experiences.position 

                    FROM video
                        INNER JOIN experiences
                            ON video.vid_id = experiences.vid_id

                    WHERE video.des_id = " . $des_id . " LIMIT 3";

                    $i = 1;

                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                        $id        = $row['vid_id'];
                        $name      = $row['exp_name'];
                        $exp_pos   = $row['position'];

                        $vid_type  = $row['video_type'];
                        $time  = $row['video_time'];

                        $type = 'experience';

                        $page = true;


                        include 'include/components/item-vid.php';

                        $i++;

                    ?>

                    <?php }} ?>

                </div>
                
            </div>
            
            
            
        </main>

        

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

        <?php include 'include/core/footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>