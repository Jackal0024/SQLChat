<?php
	if($_GET['text'] == '')
	{
		$data = urlencode($_GET['name']);
		header('Location:./Chat.php?name='.$data);
		exit();
	}
	$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';
	
	$text = mb_strcut($_GET['text'],0,255);

	$que = "insert into ChatLog values('".$_GET['name']."','".$text."','".date('Y-m-d H:i:s')."')";
	$sql = $que;

	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();

	$data = urlencode($_GET['name']);
	header('Location:./Chat.php?name='.$data);


