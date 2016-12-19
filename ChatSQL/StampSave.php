<?php
	$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';

	$text = "<img src = ".$_GET['text'].">";
	$que = "insert into ChatLog values('".$_GET['name']."','".$text."','".date('Y-m-d H:i:s')."')";
	$sql = $que;

	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();

	$data = urlencode($_GET['name']);
	header('Location:./Chat.php?name='.$data);


