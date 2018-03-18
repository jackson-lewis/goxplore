        <?php   /* //////   DESTINATION | PAGE   ////// */

            /* PAGE TITLE */
            $title = 'Destinations';

            /* HAS HERO/NO-HERO */
            $hero = 'basic';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>

            <article class="page-intro">
                <h1>destinations</h1>
                <p>In a world where it is becoming easier than ever to explore, we serve the most important information to help you decide on your next destination.</p>
            </article>

            <div class="segment">
            
                <?php // include 'include/components/filter.php'; ?>

                <ul class="results">
                        
                    <?php 

                    $sql = "SELECT des_id, name, description 
                    FROM destinations
                    ORDER BY name
                    ";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                        $id  = $row['des_id'];
                        $name  = $row['name'];
                        $desc  = $row['description'];

                        $name_url = str_replace(" ","-", $name );

                        include 'include/components/item-sea.php';

                    }} ?>

                </ul>

            </div>
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>