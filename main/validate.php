<?php
    include '../lib/lib.php';
	$curDb = new db ();
	$curDb -> sqlQueryValidateEnter($_POST["loginByUser"], md5($_POST["pswByUser"]));