<?php

include 'connection.php';

$video     = $_REQUEST["v"];
$username  = $_REQUEST["u"];
$comment   = $_REQUEST["c"];


$verify = "
SELECT use_id 
FROM users
WHERE username = '". $username ."'";

$result = $conn->query($verify);
if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { 
    $user = $row['use_id'];
}}

$add = $conn->prepare ( "
    INSERT INTO comments ( vid_id, use_id, comment ) 
    VALUES ( ?, ?, ? )" );

$add->bind_param( "iis", $video, $user, $comment );

$add->execute();

if ( $add ) {
    echo '<li class="comment-item">
            <h5>' . $username . '</h5>
            <p>' . $comment . '</p>
        </li>';
} else {
	echo 'error';
}

?>