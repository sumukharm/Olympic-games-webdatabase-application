<!DOCTYPE html>
<html>
<body>
<?php
$connection =mysql_connect('localhost','root','linux');
if(!$connection){
	die("Database connection failed" . mysql_error());
}
else
{
	echo "successfully connected <br>";
}
$select_db=mysql_select_db('OLYMPIC_GAMES');
if(!$select_db){
	die ("database selection failed".mysql_error());
}
else
{
	echo "successfully selected <br>";
}

echo "<br><br>";
echo $_POST["VENUE_ID"]."<br>";
echo $_POST["VENUE_NAME"]."<br>";
echo $_POST["VENUE_ADDRESS"]."<br>";

$OFFICIAL_ID=$_POST["VENUE_ID"];
$OFFICIAL_NAME=$_POST["VENUE_NAME"];
$EXPERIENCE=$_POST["VENUE_ADDRESS"];

$sql = "INSERT INTO VENUE VALUES('".$OFFICIAL_ID."','".$OFFICIAL_NAME."','".$EXPERIENCE."')";
$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not insert into database: ' . mysql_error());
}
echo "Official table insertion successful\n";
mysql_close($connection);

?>

</body>
</html>
