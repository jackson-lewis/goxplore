<?php

$page = basename($_SERVER['PHP_SELF']);
$page = str_replace(".php","", $page );

if ( $page !== 'login' ) {

	session_start();

	if ( isset( $_SESSION['username'] ) ) {

	    $username = $_SESSION['username'];
	    $password = $_SESSION['password'];
	    $name     = $_SESSION['name'];
	    $acc_type = $_SESSION['account'];
	    
	    $session = true;

	}
}

?>