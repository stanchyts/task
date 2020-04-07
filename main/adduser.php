<?php
    include '../lib/lib.php';
	$curDb = new db ();
	if (($_FILES["photoByUser"]["type"]=="image/gif") or ($_FILES["photoByUser"]["type"]=="image/jpeg") or ($_FILES["photoByUser"]["type"]=="image/png")) {
	    $curDb->sqlQueryAddNewUser($_POST["loginByUser"],md5($_POST["pswByUser"]),$_FILES["photoByUser"]["name"], $_FILES["photoByUser"]["tmp_name"]);
	}
	else {
		header("Location: registration.php?errType=1&loginByUser=".$_POST["loginByUser"]);
	}