

            <article class="page-intro">
                <h1><?php echo $acc_name; ?></h1>
                <p>Welcome, <span><?php echo $name; ?></span></p>
            </article>

            <ul class="admin-nav">
                <li data-function="1">add destination</li>
                <li data-function="2">update destination</li>
                <li data-function="3">add hero</li>
                <li data-function="4">update hero</li>
            </ul>
            
            <section data-form="add-destination">

                <div class="dual-heading">
                    <h3>Add</h3>
                    <h2>destination</h2>
                </div>

                <form action="update.php" method="post" class="wrap">
                    <input name="form_type" value="add-destination" type="text" style="display: none">

                    <div class="wrap">

                        <h3>Details</h3>
                        <div class="c--3">
                            <input id="name" name="name" type="text" placeholder="Name">
                            <input id="country" name="country" type="text" placeholder="Country">
                            <input id="continent" name="continent" type="text" placeholder="Continent">
                        </div>
                        <div class="c--3">
                            <textarea id="description" name="description" type="text" placeholder="Description" rows="6"></textarea>
                            <div class="drop-down">
                                <label>Location</label>
                                <select id="loc_type" name="loc_type">
                                    <option value="0">Select</option>
                                    <option value="1">City</option>
                                    <option value="2">Coast</option>
                                    <option value="3">Region</option>
                                    <option value="4">Island</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="c--2 center">
                        <h3>Video</h3>
                        <input id="video" name="video" type="text" placeholder="Video ID">
                        <input id="video_time" name="video_time" type="time" placeholder="Video Time">
                    </div>

                    <div class="wrap">
                        <h3>Experiences</h3>

                        <?php for ( $i = 0; $i < 3; $i++ ) { $pos = $i + 1; ?>

                        <div class="c--2">
                            <h5>Experience <?php echo $pos; ?></h5>
                            <input id="exp_name_<?php echo $pos; ?>" name="exp_name_<?php echo $pos; ?>" type="text" placeholder="Name">
                            <textarea id="exp_desc_<?php echo $pos; ?>" name="exp_desc_<?php echo $pos; ?>" type="text" placeholder="Description" rows="6"></textarea>
                            <input id="exp_video_<?php echo $pos; ?>" name="exp_video_<?php echo $pos; ?>" type="text" placeholder="Video ID">
                            <input id="exp_video_time_<?php echo $pos; ?>" name="exp_video_time_<?php echo $pos; ?>" type="time" placeholder="Video Time">
                            <div class="drop-down">
                                <label>Type</label>
                                <select id="exp_loc_type_<?php echo $pos; ?>" name="exp_loc_type_<?php echo $pos; ?>">
                                    <option value="0">Select</option>
                                    <option value="1">Historic</option>
                                    <option value="2">Modern</option>
                                    <option value="3">Natural</option>
                                    <option value="4">Relaxation</option>
                                </select>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                
                    <input class="button-blue" id="submit" type="submit" value="add destination">
                </form>

            </section>

            <section data-form="update-destination">

                <div class="dual-heading">
                    <h3>Update</h3>
                    <h2>destination</h2>
                </div>

                <form data-form="update-destination" class="selector update">
                    <div class="drop-down">
                        <select name="destination_select" id="destination_select">
                            <option value="">-- --</option>
                            <?php

                            $select_destination = "
                            SELECT des_id, name 
                            FROM destinations
                            ";

                            $result = $conn->query($select_destination);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    $id = $row['des_id'];
                                    $name = ucwords( $row['name'] );

                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php }} ?>
                            
                        </select>
                    </div>
                    <input class="button-blue" type="submit" value="select">
                </form>

                <form class="wrap" action="update.php" method="post">
                    <input name="form_type" value="update-destination" type="text" style="display: none">
                    <input name="id" id="destination_id" value="id" style="display: none">

                    <p class="selection"><span id="d_before"></span><span id="d_choice"></span></p>

                    <div class="wrap">

                        <h3>Details</h3>
                        <div class="c--3">
                            <input id="u_name" name="name" type="text" placeholder="Name">
                            <input id="u_country" name="country" type="text" placeholder="Country">
                            <input id="u_continent" name="continent" type="text" placeholder="Continent">
                        </div>
                        <div class="c--3">
                            <textarea id="u_desc" name="description" type="text" placeholder="Description" rows="6"></textarea>
                            <div class="drop-down">
                                <label>Location</label>
                                <select id="u_loc_type" name="loc_type">
                                    <option value="0">Select</option>
                                    <option value="1">City</option>
                                    <option value="2">Coast</option>
                                    <option value="3">Region</option>
                                    <option value="4">Island</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="c--2 center">
                        <h3>Video</h3>
                        <input id="u_video_url" name="video" type="text" placeholder="Video ID">
                        <input id="u_video_time" name="video_time" type="time" placeholder="Video Time">
                    </div>

                    <div class="wrap">
                        <h3>Experiences</h3>

                        <?php for ( $i = 0; $i < 3; $i++ ) { $pos = $i + 1; ?>

                        <div class="c--2">
                            <h5>Experience <?php echo $pos; ?></h5>
                            <input id="u_exp_name_<?php echo $pos; ?>" name="exp_name_<?php echo $pos; ?>" type="text" placeholder="Name">
                            <textarea id="u_exp_desc_<?php echo $pos; ?>" name="exp_desc_<?php echo $pos; ?>" type="text" placeholder="Description" rows="6"></textarea>
                            <input id="u_exp_video_<?php echo $pos; ?>" name="exp_video_<?php echo $pos; ?>" type="text" placeholder="Video ID">
                            <input id="u_exp_video_time_<?php echo $pos; ?>" name="exp_video_time_<?php echo $pos; ?>" type="time" placeholder="Video Time">
                            <div class="drop-down">
                                <label>Type</label>
                                <select id="u_exp_loc_type_<?php echo $pos; ?>" name="exp_loc_type_<?php echo $pos; ?>">
                                    <option value="0">Select</option>
                                    <option value="1">Historic</option>
                                    <option value="2">Modern</option>
                                    <option value="3">Natural</option>
                                    <option value="4">Relaxation</option>
                                </select>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                
                    <input class="button-blue" type="submit" value="update">
                </form>

            </section>

            <section data-form="add-hero">

                <div class="dual-heading">
                    <h3>Add</h3>
                    <h2>hero</h2>
                </div>

                <form action="update.php" method="post">
                    <input name="form_type" value="add-hero" type="text" style="display: none">

                    <input name="name" type="text" placeholder="Name">
                    <input name="location" type="text" placeholder="Location">
                    
                    <input class="button-blue" type="submit" value="add hero">
                    <p id="demo"></p>
                </form>

            </section>

            <section data-form="update-hero">

                <div class="dual-heading">
                    <h3>Update</h3>
                    <h2>hero</h2>
                </div>

                <form data-form="update-hero" class="selector update">
                    <div class="drop-down">
                        <select name="select">
                            <option value="">-- --</option>
                            <?php

                            $select_hero = "
                            SELECT her_id, name 
                            FROM heros
                            ";

                            $result = $conn->query($select_hero);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    $id = $row['her_id'];
                                    $name = ucwords( $row['name'] );

                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php }} ?>
                            
                        </select>
                    </div>
                    <input class="button-blue" type="submit" value="select">
                </form>

                <form action="update.php" method="post">
                    <input name="form_type" value="update-hero" style="display: none">
                    <input name="id" id="hero_id" value="id" style="display: none">

                    <p class="selection"><span id="h_before"></span><span id="h_choice"></span></p>

                    <input name="name" type="text" value="Name" id="h_name">
                    <input name="location" type="text" value="Location" id="h_location">
                    
                    <input class="button-blue" type="submit" value="update">
                </form>

            </section>
            