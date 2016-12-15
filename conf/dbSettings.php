<?php
	require_once('database.php');
	$ftp = array(
		'username' => 'tm@tp2.whcb.co.za',
		'password' =>'0717253112',
		'dirctory' => 'public_html/tp2.whcb.co.za/'
		);
	//tp2.whcb.co.za
	//server ip v 149.202.195.2
	 $liveDatabase = array(
		'server' =>'cpanel.whcb.co.za',
		'username' => 'pixpijma_berka',
		'password' =>'Brk1991@',
		'dbname' =>'pixpijma_android'
	);

	$localDatabase = array(
		'server' =>'127.0.0.2',
		'username' => 'root',
		'password' =>'',
		'dbname' =>'riki-tours'
	);

	$db = new mysql_database(
			$localDatabase['server'],
			$localDatabase['username'],
			$localDatabase['password'],
			$localDatabase['dbname']);

