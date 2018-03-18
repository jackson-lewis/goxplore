        <?php   /* //////   GET INSPIRED | PAGE   ////// */

            /* PAGE TITLE */
            $title = 'Get Inspired';

            /* HAS HERO/NO-HERO */
            $hero = 'reg';

        ?>        

        <?php include 'include/core/header.php'; # INCLUDES THE 'HEADER.PHP' FILE ?>
        
        <?php # ////////////  PAGE CONTENT  //////////// ?>

        <main>

            
            
            <div class="hero">
                <div class="parallax ani-inspired"><img src="assets/heros/get-inspired.jpg" alt="Hero"></div>
                <div class="dual-heading" id="heading-parallax">
                    <h3>Get</h3>
                    <h1>inspired</h1>
                </div>
                <span class="caption">straight road, somewhere</span>
            </div>
            
            <div class="container">
                <article class="inspired">
                    <p>When you’re a kid smitten with the solar system, gravity sucks – all those planets to explore and no way to get there!</p>
                    <img src="assets/inspired/grand-canyon.jpg" alt="Grand Canyon">
                    <h3>Inspiration</h3>
                    <p>While intergalactic travel may be a while off yet, we’ve rounded up some of the best out-of-this-world adventures – right here on Earth – for kids captivated by the cosmos. No jetpack required.</p>
                    <p>Home to the most volcanoes in the solar system and with an average temperature of 460°C, Venus is a fascinating but forever off-limits planet. Kids can get a taste of all things Venus on Hawai’i’s Big Island, where one of the world’s most active volcanoes – Kilauea – has been continuously erupting since 1983.</p>
                </article>

                <div class="explore">
                    <h2>explore</h2>
                    <div class="video-container">
                        <div class="video-player">
                            <iframe src="https://www.youtube.com/embed/4O01bqZfczI" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <p data-player="caption">Why travel?</p>
                    </div>
                </div>

                <?php include 'include/components/adventure.php'; ?>
            </div>
            
        </main>

        <?php # ////////////  PAGE CONTENT END  //////////// ?>

		<?php include 'include/core/footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>