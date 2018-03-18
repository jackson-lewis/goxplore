<?php   /* //////   UPDATE | PAGE   ////// */

    /* PAGE TITLE */
    $title = 'update';

    /* HAS MASTER-HERO/NO-HERO */
    $hero = 'system';

include 'include/core/header.php'; ?>

<main>

<?php

$action       = $_REQUEST["form_type"];
$selection    = array( 'add-destination', 'update-destination', 'add-hero', 'update-hero', 'manage-user' );


if ( $action == $selection[0] || $action == $selection[1] ) { // ADD/UPDATE DESTINATIONS

    $id                 = $_REQUEST["id"];
    $name               = $_REQUEST["name"];
    $country            = $_REQUEST["country"];
    $continent          = $_REQUEST["continent"];
    $description        = addslashes( $_REQUEST["description"] );
    $loc_type           = $_REQUEST["loc_type"];

    $video              = $_REQUEST["video"];
    $video_time         = $_REQUEST["video_time"];
        
    $exp_name_1         = $_REQUEST["exp_name_1"];
    $exp_desc_1         = addslashes( $_REQUEST["exp_desc_1"] );
    $exp_type_1         = $_REQUEST["exp_loc_type_1"];
    $exp_vid_id_1       = $_REQUEST["exp_video_1"];
    $exp_vid_time_1     = $_REQUEST["exp_video_time_1"];
    $exp_pos_1          = 1;

    $exp_name_2         = $_REQUEST["exp_name_2"];
    $exp_desc_2         = addslashes( $_REQUEST["exp_desc_2"] );
    $exp_type_2         = $_REQUEST["exp_loc_type_2"];
    $exp_vid_id_2       = $_REQUEST["exp_video_2"];
    $exp_vid_time_2     = $_REQUEST["exp_video_time_2"];
    $exp_pos_2          = 2;

    $exp_name_3         = $_REQUEST["exp_name_3"];
    $exp_desc_3         = addslashes( $_REQUEST["exp_desc_3"] );
    $exp_type_3         = $_REQUEST["exp_loc_type_3"];
    $exp_vid_id_3       = $_REQUEST["exp_video_3"];
    $exp_vid_time_3     = $_REQUEST["exp_video_time_3"];
    $exp_pos_3          = 3;


    if ( $action == $selection[0] ) { 
        $get_name = "
        SELECT name 
        FROM destinations
        WHERE name = ". $name;

        $result = $conn->query($get_name);
        if ($result->num_rows > 0) {
            $verify = false;
        } else {
            $verify = true;
        }
    }    
    if ( $action == $selection[1] ) { $verify = true; }     


    if ( $verify ) {

        if ( $action == $selection[0] ) {

            $basics = "
            INSERT INTO destinations (name, country, continent, loc_type, description) 
            VALUES ( '$name', '$country', '$continent', '$loc_type', '$description' )";

        } else {

            $basics = "
            UPDATE destinations 
            SET name = '$name',
                country = '$country',
                continent = '$continent',
                loc_type = '$loc_type',
                description = '$description'
                WHERE des_id = " . $id;
        }

        if ( $conn->query($basics) ) {
            $b = true;

            $get_id = "SELECT des_id 
            FROM destinations  
            WHERE name = '". $name ."'";

            $result = $conn->query($get_id);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 
                $id  = $row['des_id'];
            }}

        } else { $b = false; }

        if ( $action == $selection[0] ) {

            $video = "
            INSERT INTO video ( des_id, video_type, video_url, video_time ) 
            VALUES  ( '$id', '0', '$video', '$video_time' ), 
                    ( '$id', '$exp_pos_1', '$exp_vid_id_1', '$exp_vid_time_1' ),
                    ( '$id', '$exp_pos_2', '$exp_vid_id_2', '$exp_vid_time_2' ),  
                    ( '$id', '$exp_pos_3', '$exp_vid_id_3', '$exp_vid_time_3' )
            ";

        } else {

            $get_vid_ids = "SELECT vid_id 
            FROM video  
            WHERE des_id = ". $id;

            $i = 0;

            $result = $conn->query($get_vid_ids);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                if ( $i == 0 ) {
                    $v_0  = $row['vid_id'];
                } else if ( $i == 1 ) {
                    $v_1  = $row['vid_id'];
                } else if ( $i == 2 ) {
                    $v_2  = $row['vid_id'];
                } else if ( $i == 3 ) {
                    $v_3  = $row['vid_id'];
                }
                
                $i++;
            }}

            $video = "
            UPDATE video SET 
                video_url = CASE vid_id 
                    WHEN '$v_0' THEN '$video' 
                    WHEN '$v_1' THEN '$exp_vid_id_1' 
                    WHEN '$v_2' THEN '$exp_vid_id_2' 
                    WHEN '$v_3' THEN '$exp_vid_id_3' 
                    ELSE video_url  
                    END, 
                video_time = CASE vid_id 
                    WHEN '$v_0' THEN '$video_time' 
                    WHEN '$v_1' THEN '$exp_vid_time_1' 
                    WHEN '$v_2' THEN '$exp_vid_time_2' 
                    WHEN '$v_3' THEN '$exp_vid_time_3' 
                    ELSE video_time 
                    END 
            WHERE des_id = ". $id;

        }

        if ( $conn->query($video) ) {
            $v = true;

            if ( $action == $selection[0] ) {

                $get_vid_id = "SELECT vid_id 
                FROM video  
                WHERE des_id = ". $id ."
                AND NOT video_type = 0
                ";

                $i = 0;

                $result = $conn->query($get_vid_id);
                if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                    if      ( $i == 0 ) { $exp_vid_id_1  = $row['vid_id']; }
                    else if ( $i == 1 ) { $exp_vid_id_2  = $row['vid_id']; }
                    else if ( $i == 2 ) { $exp_vid_id_3  = $row['vid_id']; }
                    $i++;
                }}
            }

        } else { $v = false; }

        if ( $action == $selection[0] ) {

            $experiences = "
            INSERT INTO experiences (des_id, vid_id, exp_type, exp_name, position, exp_description) 
            VALUES  ( '$id', '$exp_vid_id_1', '$exp_type_1', '$exp_name_1', '$exp_pos_1', '$exp_desc_1' ), 
                    ( '$id', '$exp_vid_id_2', '$exp_type_2', '$exp_name_2', '$exp_pos_2', '$exp_desc_2' ), 
                    ( '$id', '$exp_vid_id_3', '$exp_type_3', '$exp_name_3', '$exp_pos_3', '$exp_desc_3' )
            ";

        } else {

            $get_exp_ids = "SELECT exp_id 
            FROM experiences 
            WHERE des_id = ". $id;

            $i = 0;

            $result = $conn->query($get_exp_ids);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 

                if      ( $i == 0 ) { $e_1  = $row['exp_id']; }
                else if ( $i == 1 ) { $e_2  = $row['exp_id']; }
                else if ( $i == 2 ) { $e_3  = $row['exp_id']; }
                $i++;
            }}

            $experiences = "
            UPDATE experiences SET 
                exp_type = CASE exp_id 
                    WHEN '$e_1' THEN '$exp_type_1' 
                    WHEN '$e_2' THEN '$exp_type_2' 
                    WHEN '$e_3' THEN '$exp_type_3' 
                    ELSE exp_type  
                    END, 
                exp_name = CASE exp_id 
                    WHEN '$e_1' THEN '$exp_name_1' 
                    WHEN '$e_2' THEN '$exp_name_2' 
                    WHEN '$e_3' THEN '$exp_name_3' 
                    ELSE exp_name 
                    END, 
                exp_description = CASE exp_id 
                    WHEN '$e_1' THEN '$exp_desc_1' 
                    WHEN '$e_2' THEN '$exp_desc_2' 
                    WHEN '$e_3' THEN '$exp_desc_3' 
                    ELSE exp_description 
                    END 
            WHERE des_id = ". $id;

        }

        if ( $conn->query($experiences) ) {
            $e = true;
        } else {
            $e = false;
        }

        if ( $action == $selection[0] ) {

            mkdir('assets/destinations/'. $name .'', 0777, true);

            mkdir('assets/destinations/'. $name .'/hero', 0777, true);
            mkdir('assets/destinations/'. $name .'/experiences', 0777, true);
            $f = true;

        } else { $f = true; }

        if ( $b && $v && $e && $f ) {
            $conclusion = true;
        } else {
            $conclusion = false;
        }

    }

    if ( $action == $selection[0] ) {
        $action_message = 'added this destination';
    } else {
        $action_message = 'updated this destination';
    }
    $output = $name . ', ' . $country;

} else if ( $action == $selection[2] || $action == $selection[3] ) { // ADD/UPDATE HERO

    $id         = $_REQUEST["id"];
    $name       = $_REQUEST["name"];
    $location   = $_REQUEST["location"];


    if ( $action == $selection[2] ) {

        $get_name = "
        SELECT name 
        FROM heros
        WHERE name = '$name'";

        $result = $conn->query($get_name);
        if ($result->num_rows > 0) {
            $verify = false;
        } else {
            $verify = true;
        }

    } else { $verify = true; }


    if ( $verify ) {

        if ( $action == $selection[2] ) {

            $statement = "
            INSERT INTO heros ( name, location ) 
            VALUES ( '$name', '$location' )";

        } else {

            $statement = "
            UPDATE heros 
            SET name = '". $name ."', 
                location = '". $location ."'
            WHERE her_id = " . $id;

        }

        if ( $conn->query($statement) ) {
            $a = true;
        } else {
            $a = false;
        }

        if ( $a ) {
            $conclusion = true;
        } else {
            $conclusion = false;
        }

    }


    if ( $action == $selection[2] ) {
        $action_message = 'added this hero';
    } else {
        $action_message = 'updated this hero';
    }
    $output = $name . ', ' . $location;

} else if ( $action == $selection[4] ) { // MANAGE USERS

    $id                 = $_REQUEST["id"];
    $name               = $_REQUEST["name"];
    $username           = $_REQUEST["username"];
    $email              = $_REQUEST["email"];
    $password           = $_REQUEST["password"];
    $acc_type           = $_REQUEST["acc_type"];

    $get_name = "
    SELECT username 
    FROM users
    WHERE username = '". $username ."'
    ";

    $result = $conn->query($get_name);
    if ($result->num_rows > 0) {
        $verify = true;
    } else {
        $verify = false;
    }

    if ( $verify ) {

        $statement = "
        UPDATE users
        SET name = '". $name ."',
            username = '". $username ."',
            email = '". $email ."',
            password = '". $password ."',
            acc_type = '". $acc_type ."'
        WHERE use_id = " . $id;

        if ( $conn->query($statement) ) {
            $conclusion = true;
        } else {
            $conclusion = false;
        }

    }

    $action_message = 'updated this users details';
    $output = $username;

}


if ( $conclusion ) {
    $conclusion = array( 'passed', 'Successfully' );
} else {
    $conclusion = array( 'failed', 'Unsuccessfully' );
}


?>


<article class="page-intro">
    <h1>action <span><?php echo $conclusion[0]; ?></span></h1>
</article>

<p class="output"><?php echo $output; ?></p>

<p><?php echo $conclusion[1]; ?> <?php echo $action_message; ?> to GOXPLORE</p>

<?php
if ( $action == $selection[0] && $conclusion[0] == 'passed' || 
     $action == $selection[1] && $conclusion[0] == 'passed' ) {
    ?>
    <p>ID number: <b><?php echo $id; ?></b></p>
    <a href="destination.php?id=<?php echo $id; ?>" class="button-blue"><?php echo $name; ?></a>
    <p></p>
    <?php
}
?>


<a href="user.php" class="button-blue">back to admin</a>

<?php include 'include/core/no-footer.php'; # INCLUDES THE 'FOOTER.PHP' FILE ?>