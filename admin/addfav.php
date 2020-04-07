<?php
    include '../lib/lib.php';
	session_start();
	$_SESSION['curUser']->userAddFavContact($_GET["idByContact"]);
	header("Location: index.php");
	