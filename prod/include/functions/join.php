<?php

include 'connection.php';

$name    = $_REQUEST["name"];
$email   = $_REQUEST["email"];


$verify = "
SELECT email 
FROM newsletter
WHERE email = '". $email ."'
";

$result = $conn->query($verify);
if ($result->num_rows > 0) {
    $attempt = false;
} else {
    $attempt = true;
}

if ( $attempt ) {

    $values = "
        INSERT INTO newsletter ( name, email ) 
        VALUES ( '$name', '$email' )";


    if ( $conn->query($values) ) {
        echo 'success';
    } else {
    	echo "unknown error";
    }

} else {
	echo "error";
}

?>