<html>
    <head>
        <title>Chat-History</title>
    </head>
    <body>
	<h1>Chat-History</h1>
	<Form>
		<input type="submit" value="Refresh" >
	</Form>
	<div style="border-style: solid ; border-width: 1px;">
	<?php
		$dsn = 'mysql:dbname=ChatDBTest;host=127.0.0.1';
		$user = 'root';
		$pw = 'H@chiouji1';

		$sql = 'select * from ChatLog ORDER BY time';

		$dbh = new PDO($dsn,$user,$pw);
		$sth = $dbh->prepare($sql);
		$sth->execute();

		while(($buff = $sth->fetch()) !== false)
		{
			//var_dump($buff);
			print $buff['name']." ".$buff['text']." ".$buff['time'];
			print("<br>");
			print("<hr>");
		}
	?>
	</div>
	<Form>
		<input type="submit" value="Refresh" >
	</Form>
	<Form onClick="javascript:window.close();">
			<input type="submit" value="Close" >
		</Form>
	
    </body>
</html>
