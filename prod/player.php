        <?php   /* //////   PLAYER | PAGE   ////// */


            $video = $_REQUEST['id'];
            $type = $_REQUEST['type'];


            /* PAGE TITLE */
            $title = 'Player';

            /* HAS HERO/NO-HERO */
            $hero = 'player';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>

        <?php

        if ( $type == 'destination' ) {

            $sql = "
            SELECT destinations.des_id, destinations.name, destinations.description, destinations.loc_type, video.video_url

            FROM destinations
                INNER JOIN video
                    ON destinations.des_id = video.des_id

            WHERE video.vid_id = " . $video . " LIMIT 1";

        } else {

            $parent = "
            SELECT des_id, name 

            FROM destinations

            WHERE destinations.des_id = " . $video . "";

            $sql = "
            SELECT video.video_url, experiences.des_id, experiences.exp_name, experiences.exp_description

            FROM video
                INNER JOIN experiences
                    ON video.vid_id = experiences.vid_id

            WHERE video.vid_id = " . $video . " LIMIT 1";

        }


        $result = $conn->query($sql);
        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

            if ( $type == 'destination' ) {

                $id  = $row['des_id'];
                $_name  = ucwords( $row['name'] );
                $continent  = $row['continent'];
                $desc  = $row['description'];
                $loc_type  = $row['loc_type'];

                $url  = $row['video_url'];

            } else {

                $id  = $row['des_id'];
                $_name  = ucwords( $row['exp_name'] );
                $desc  = $row['exp_description'];

                $url  = $row['video_url'];

            }
            

        ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>

            <article class="page-intro">
                <h1><?php echo $_name; ?></h1>
            </article>

            <section class="player-left-col">
                <div class="video-container">
                    <div class="video-player">
                        <iframe src="https://www.youtube.com/embed/<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="video-details">
                        <p data-player="desc"><span>Uploaded</span><?php echo $desc; ?></p>

                        <?php }} ?>

                        
                    </div>

                    <?php

                    $loc = "
                    SELECT destinations.des_id, destinations.name 

                    FROM destinations
                        INNER JOIN video
                            ON destinations.des_id = video.des_id

                    WHERE video.vid_id = " . $video . " LIMIT 1";

                    $result = $conn->query($loc);
                    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                        $des_name  = $row['name'];
                        $des_id    = $row['des_id'];

                    ?>

                    <div class="link-dest">
                        <p>Learn more about what you can get up to in...</p>
                        <a href="destination.php?id=<?php echo $des_id; ?>" class="button-blue"><?php echo $des_name; ?></a>
                    </div>

                    <?php }} ?>

                </div>

            </section>

            <section class="player-lower-col">
                <div class="comments">
                    <h2>comments</h2>
                    <ul class="comments-wrap">

                        <?php

                        $get = "
                        SELECT users.username, comments.comment 

                        FROM users
                            INNER JOIN comments
                                ON users.use_id = comments.use_id

                        WHERE comments.vid_id = " . $video;

                        $result = $conn->query($get);
                        if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                            $user     = $row['username'];
                            $comment  = $row['comment'];

                        ?>

                        <li class="comment-item">
                            <h5><?php echo $user ?></h5>
                            <p><?php echo $comment ?></p>
                        </li>

                        <?php }} else { 

                        ?>

                        <li class="comment-item" id="placehold">
                            <p>Be the first to comment on <span><?php echo $_name; ?></span></p>
                        </li>

                        <?php } ?>
                    </ul>

                    <?php if ( $session ) { ?>

                    <form class="add-comment" data-video="<?php echo $video; ?>" data-user="<?php echo $username; ?>">
                        <textarea placeholder="Add Comment"></textarea>
                        <input type="submit" value="add" class="button-blue" id="add"></input>
                    </form>

                    <?php } else { ?>

                    <a href="login.php" class="login-prompt">Log in to add comments</a>

                    <?php } ?>
                </div>

                <section class="playlist">
                    <h3>More of <span style="text-transform: capitalize;"><?php echo $des_name; ?></span></h3>

                    
                    <div class="segment">

                        <?php 

                            $playlist = "
                                SELECT video.vid_id, video.video_time, video.video_type, experiences.exp_name, destinations.name 

                                FROM video
                                    INNER JOIN experiences
                                        ON video.vid_id = experiences.vid_id

                                    INNER JOIN destinations
                                        ON video.des_id = destinations.des_id

                                WHERE video.des_id = " . $id . " 

                                AND NOT video.vid_id = " . $video;

                            $result = $conn->query($playlist);
                            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                                $id           = $row['vid_id'];
                                $time         = $row['video_time'];
                                $vid_type     = $row['video_type'];

                                $name         = $row['exp_name'];

                                $destination  = $row['name'];


                                if ( $vid_type == 0 ) {
                                    $type = 'destination';
                                } else {
                                    $type = 'experience';
                                }

                                $page = false;

                                include 'include/components/item-vid.php';

                            }} ?>

                    </div>
                    
                </section>
            
            </section>

            

            


            
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>