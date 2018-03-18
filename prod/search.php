        <?php   /* //////   SEARCH | PAGE   ////// */


            $query = $_POST['search'];


            /* PAGE TITLE */
            $title = $query;

            /* HAS HERO/NO-HERO */
            $hero = 'basic';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>

            <div class="segment">
                
                <?php // include 'include/components/filter.php'; ?>

                <ul class="results">

                    <div class="definer">
                        <h1>destinations</h1>
                        <p id="des-counter"></p>
                    </div>
                    
                        
                    <?php

                    if      ( $query == 'city' ) { $query = 1; }
                    else if ( $query == 'coast' ) { $query = 2; }
                    else if ( $query == 'region' ) { $query = 3; }
                    else if ( $query == 'island' ) { $query = 4; } 
                    else {
                        $query;
                    }
                
                    // SELECT ALL MOVIES WITH CATEGORY
                    $sql = "
                    SELECT des_id, name, description
                    FROM destinations 
                    WHERE 
                    (name LIKE '%" . $query . "%' OR 
                    country LIKE '%" . $query . "%' OR 
                    continent LIKE '%" . $query . "%' OR
                    loc_type LIKE '%" . $query . "%')";


                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                        // TAKE DATABASE TABLE ROWS AND ASSIGN NEW VARIABLES
                        $id  = $row['des_id'];
                        $name  = $row['name'];
                        $desc  = $row['description'];

                        $name_url = str_replace(" ","-", $name );

                        
                        include 'include/components/item-sea.php';

                    }}

                    ?>

                    

                </ul>

                <div class="results">

                    <div class="definer">
                        <h1>videos</h1>
                        <p id="vid-counter"></p>
                    </div>
                    
                    <?php
                
                    // SELECT ALL MOVIES WITH CATEGORY
                    $query = "
                    SELECT video.vid_id, video.video_time, experiences.exp_name, destinations.name 

                    FROM video
                        INNER JOIN experiences
                            ON video.vid_id = experiences.vid_id

                        INNER JOIN destinations
                            ON video.des_id = destinations.des_id

                    WHERE 
                    (experiences.exp_name LIKE '%" . $query . "%' OR 
                     destinations.name LIKE '%" . $query . "%' OR 
                     destinations.country LIKE '%" . $query . "%' OR 
                     destinations.continent LIKE '%" . $query . "%' OR
                     destinations.loc_type LIKE '%" . $query . "%' 
                    )"; 

                    ;


                    $result = $conn->query($query);
                    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                        // TAKE DATABASE TABLE ROWS AND ASSIGN NEW VARIABLES
                        $id    = $row['vid_id'];
                        $time  = $row['video_time'];
                        $name         = $row['exp_name'];
                        $destination  = $row['name'];

                        $page = false;
                        
                        include 'include/components/item-vid.php';

                    }}

                    ?>
                    
                </div>

            </div>
            
            
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>