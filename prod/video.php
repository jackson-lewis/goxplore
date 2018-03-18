        <?php   /* //////   VIDEO | PAGE   ////// */


            /* PAGE TITLE */
            $title = 'Video';

            /* HAS HERO/NO-HERO */
            $hero = 'basic';

        ?>        

        <?php include 'include/core/header.php'; ?>

        <main>

            <article class="page-intro">
                <h1>video</h1>
                <p>In a world where it is becoming easier than ever to explore, we serve the most important information to help you decide on your next destination.</p>
            </article>

            <?php 

                $locations = array( 
                    array( 'City', 'breaks' ),
                    array( 'Coastal', 'views' ),
                    array( 'Region', 'expeditions' ),
                    array( 'Island', 'escapes' ),

                    array( 'Historical', 'attractions' ),
                    array( 'Modern', 'attractions' ),
                    array( 'Natural', 'landscapes' ),
                    array( 'Time to', 'relax' )
                );

                $length = count($locations);

                for( $x = 0; $x < $length; $x++ ) {
                  
             ?>

            <section class="video-categories">
                <div class="dual-heading">
                    <h3><?php echo $locations[$x][0]; ?></h3>
                    <h2><?php echo $locations[$x][1]; ?></h2>
                </div>

                
                <div class="segment">

                    <?php 

                        if ( $x < 4 ) {

                            $type = $x + 1;

                            $query = "
                            SELECT destinations.name, video.vid_id, video.video_time

                            FROM destinations
                                INNER JOIN video
                                    ON destinations.des_id = video.des_id

                            WHERE destinations.loc_type = ". $type ." 

                            AND NOT video.video_type = 1  

                            AND NOT video.video_type = 2  

                            AND NOT video.video_type = 3  
                            
                            LIMIT 6";

                            $variation = true;

                        } else {

                            $type = $x - 3;

                            $query = "
                            SELECT video.vid_id, video.video_time, experiences.exp_name, destinations.name 

                            FROM video
                                INNER JOIN experiences
                                    ON video.vid_id = experiences.vid_id

                                INNER JOIN destinations
                                    ON video.des_id = destinations.des_id

                            WHERE experiences.exp_type = " . $type . " 

                            AND NOT video.video_type = 0 

                            LIMIT 6";

                            $variation = false;

                        }

                        $result = $conn->query($query);
                        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                            $id    = $row['vid_id'];
                            $time  = $row['video_time'];
                            $name         = $row['name'];
                            $destination  = $name;

                            if ( $variation ) {
                                $type = 'destination';
                            } else {
                                $name      = $row['exp_name'];
                            }
                            $page = false;

                            include 'include/components/item-vid.php';

                        }} ?>

                </div>
                
            </section>

            <?php } ?>

        </main>

		<?php include 'include/core/footer.php'; ?>