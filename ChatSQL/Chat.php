<html>
<head>
<title>Chat</title>
</head>

<body>
<Form action="Save.php">
<?php
	 print $_GET['name'];
 ?>
	<input type="hidden" name="name" value="<?php print $_GET['name']; ?>">
	<input type="text" name="text">
	<input type="submit" value="Write">
</Form>
<Form action="StampSave.php">
<?php
	$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';

	$sql = 'select count(filename) from StampMaster';

	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();

	($buff = $sth->fetch());
	$maxcount = $buff[0];

	$sql = 'select filename from StampMaster';

	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();
	for($i = 0; $i < $maxcount; $i++)
	{
		$buff = $sth->fetch();
		$buuton[] = $buff['filename'];
?>
		<input type="hidden" name="name" value="<?php print $_GET['name']; ?>">
		<input type="hidden" name="text" value="<?php print $buuton[$i]?>">
		<input type="image" src= "<?php print $buuton[$i]?>" alt="送信する">
<?php  }?>
</Form>

<hr>
<Form action = "./Chat.php?name="<?php print $_GET['name']?> >
	<input type="hidden" name="name"value="<?php print $_GET['name']; ?>">
	<input type="submit" value="Refresh" >
</Form>

<div style="border-style: solid ; border-width: 1px;">
<?php
	$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';

	$sql = 'select * from ChatLog ORDER BY time DESC';

	$dbh = new PDO($dsn,$user,$pw);
	$sth = $dbh->prepare($sql);
	$sth->execute();

	while(($buff = $sth->fetch()) !== false)
	{	
		print $buff['name']." ".$buff['text']." ".$buff['time'];
		print("<br>");
		print("<hr>");
	}
?>
</div>
<hr>
<form action="Login.html">
	<A HREF="History.php" TARGET="_blank" >History</A>
	<input type="submit" value="Logout" >
</form>
</body>
</html>

