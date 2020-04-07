<?php
    include '../lib/lib.php';
	session_start();
	$_SESSION['curUser']->sqlQueryUpdateFavContacts();
	$_SESSION = array();
	header("Location: ../main/index.php");
?>