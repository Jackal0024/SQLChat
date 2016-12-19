<html>
    <head>
        <title>Chat-Error101</title>
    </head>
    <body>
        <h1>Chat</h1>
	<FONT color="red" size="5">Error</FONT><br>
<?php if($_GET['Error'] == 1) print '<FONT color="red">Plese input your id and password</FONT>'; ?>
<?php if($_GET['Error'] == 2) print '<FONT color="red">Not found id</FONT>'; ?>
<?php if($_GET['Error'] == 3) print '<FONT color="red">ID and Password is incorrect</FONT>'; ?>
	<form action="Login.html">
        <br><input type="submit" value="back">
        </form>
    </body>
</html>
