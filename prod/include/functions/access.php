<?php

$action = $_REQUEST["a"];
$q 		= $_REQUEST["q"];

$types  = array( 'update-destination', 'update-hero', 'manage-user' );

$conn = new mysqli("localhost", "root", "root", "goxplore");




if ( $action == $types[0] ) {

	$statement = "
	SELECT destinations.des_id, destinations.name, destinations.country, destinations.continent, destinations.loc_type, destinations.description, video.video_url, video.video_time, experiences.exp_type, experiences.exp_name, experiences.exp_description 

    FROM destinations
        INNER JOIN video
            ON destinations.des_id = video.des_id

        INNER JOIN experiences
            ON destinations.des_id = experiences.des_id

    WHERE destinations.des_id = " . $q;



} else if ( $action == $types[1] ) {

	$statement = "
	SELECT her_id, name, location  
	FROM heros 
	WHERE her_id = '". $q ."'";

} else {

	$statement = "
	SELECT use_id, name, email, username, password, acc_type, date_join 
	FROM users 
	WHERE use_id = '". $q ."'";

}



 
$result = $conn->query( $statement );

$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>