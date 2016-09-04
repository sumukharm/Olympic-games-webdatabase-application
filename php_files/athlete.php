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
echo $_POST["ATHLETE_ID"]."<br>";
echo $_POST["ATHLETE_NAME"]."<br>";
echo $_POST["DOB"]."<br>";
echo $_POST["GENDER"]."<br>";
echo $_POST["CID"]."<br>";
echo $_POST["OID"]."<br>";
//echo $_POST["GOLD"]."<br>";
//echo $_POST["SILVER"]."<br>";
//echo $_POST["BRONZE"]."<br>";

$ATHLETE_ID=$_POST["ATHLETE_ID"];
$ATHLETE_NAME=$_POST["ATHLETE_NAME"];
$DOB=$_POST["DOB"];
$GENDER=$_POST["GENDER"];
$CID=$_POST["CID"];
$OID=$_POST["OID"];
$GOLD=0;
$SILVER=0;
$BRONZE=0;

$sql = "INSERT INTO ATHLETE VALUES('".$ATHLETE_ID."','".$ATHLETE_NAME."','".$GENDER."',".$GOLD.",".$SILVER.",".$BRONZE.",".$CID.",'".$OID."','".$DOB."')";
$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not insert into database: ' . mysql_error());
}
echo "Athlete table insertion successful\n";
mysql_close($connection);

?>

</body>
</html>
