<?php
if($_GET['id'] == '' || $_GET['password'] == '')
{
	header('Location:./Error.php?Error=1');
	exit();
}

$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';

	$sql = 'select loginid,password,dispname from User ';
try{
	$dbh = new PDO($dsn,$user,$pw);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->beginTransaction();
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$dbh->commit();
}
catch(PDOException $e)
{
	$dbh->rollbak();
}

	while(($buff = $sth->fetch()) !== false)
	{
		var_dump($buff["loginid"] == $_GET['id']);
		if($buff["loginid"] == $_GET['id'])
		{
			if($buff["password"] == $_GET['password'])
			{
				header('Location:./Chat.php?name='.$buff["dispname"]);
				exit();
			}
			else
			{
				header('Location:./Error.php?Error=3');
				exit();
			}
		}
	}
	header('Location:./Error.php?Error=2');
	exit();
