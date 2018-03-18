<div class="filter-segment">

    <a class="button-blue-border filter-toggle">filter</a>

    <div class="filter">

        <div class="f-wrap">

            <div class="f-type" data-filter-type="continent">
                <h4>continent</h4>
                <div class="arrow" id="toggle-continent"><span></span><span></span></div>
                <div class="options" id="options-continent">

                    <?php 

                        $continents = array( 'africa', 'asia', 'australia', 'europe', 'north america', 'south america' );

                        $length = count($continents);

                        for($x = 0; $x < $length; $x++) {
                          
                     ?>
                    <div>
                        <input type="checkbox" name="<?php echo $continents[$x]; ?>">
                        <label><?php echo $continents[$x]; ?></label>
                    </div>

                    <?php } ?>

                </div>
            </div>

            <div class="f-type" data-filter-type="location">
                <h4>location</h4>
                <div class="arrow" id="toggle-location"><span></span><span></span></div>
                <div class="options" id="options-location">

                    <?php 

                        $locations = array( 'city', 'coast', 'island', 'region' );

                        $length = count($locations);

                        for($x = 0; $x < $length; $x++) {
                          
                     ?>
                    <div>
                        <input type="checkbox" name="<?php echo $locations[$x]; ?>">
                        <label><?php echo $locations[$x]; ?></label>
                    </div>

                    <?php } ?>
                    
                </div>
            </div>

            <a href="destination.php" class="button-blue">apply</a>

        </div>
        

        <a class="cancel filter-toggle"><span></span><span></span></a>

    </div>


    <div class="tags">

        <!-- <div class="tag-close">
            <p>Asia</p>
            <div class="close-tag"><span></span><span></span></div>
        </div> -->
        
    </div>


</div>