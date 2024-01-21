<?php
	// Start sessions
	session_start();

	$_SESSION  = array();

	// Destroy all session related to user
	session_destroy();
	$_SESSION['loggedin'] = false;

	// Redirect to login page
	header('location: ../index');
	exit;
?>