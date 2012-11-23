<?php

$link = mysql_connect('localhost', 'root', 'aMUSEment2');

if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$db = mysql_select_db('digitalu', $link);

if (!$db) {
	die('Can\'t use db : ' . mysql_error());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add a team</title>
    </head>
    <body>
    	

    </body>
</html>