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
echo $_POST["EVENT_ID"]."<br>";
echo $_POST["EVENT_NAME"]."<br>";
echo $_POST["DATE"]."<br>";
echo $_POST["TIME"]."<br>";
echo $_POST["NO_OF_PLAYERS"]."<br>";
echo $_POST["SPORT"]."<br>";
echo $_POST["VEN_ID"]."<br>";
echo $_POST["REF_ID"]."<br>";

$EVENT_ID=$_POST["EVENT_ID"];
$EVENT_NAME=$_POST["EVENT_NAME"];
$DATE=$_POST["DATE"];
$TIME=$_POST["TIME"];
$NO_OF_PLAYERS=$_POST["NO_OF_PLAYERS"];
$SPORT=$_POST["SPORT"];
$VEN_ID=$_POST["VEN_ID"];
$REF_ID=$_POST["REF_ID"];
$G_ID=0;
$S_ID=0;
$B_ID=0;

//$sql = "INSERT INTO EVENT VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";

$sql = "INSERT INTO EVENT (EVENT_ID,EVENT_NAME,DATE,TIME,NO_OF_PLAYERS,SPORT,REF_ID,VEN_ID) VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";
$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not insert into database: ' . mysql_error());
}
echo "Event table insertion successful\n";
mysql_close($connection);

?>

</body>
</html>
