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
echo $_POST["REFEREE_ID"]."<br>";
echo $_POST["REFEREE_NAME"]."<br>";
echo $_POST["EXPERIENCE"]."<br>";
echo $_POST["DOB"]."<br>";

$OFFICIAL_ID=$_POST["REFEREE_ID"];
$OFFICIAL_NAME=$_POST["REFEREE_NAME"];
$EXPERIENCE=$_POST["EXPERIENCE"];
$DOB=$_POST["DOB"];

$sql = "INSERT INTO REFEREE VALUES('".$OFFICIAL_ID."','".$OFFICIAL_NAME."',".$EXPERIENCE.",'".$DOB."')";
$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not insert into database: ' . mysql_error());
}
echo "Referee table insertion successful\n";
mysql_close($connection);

?>

</body>
</html>
