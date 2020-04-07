<?php
    include '../lib/lib.php';
	session_start();
	$_SESSION['curUser']->userDelFavContact($_GET["idByContact"]);
	header("Location: fav.php");
?>