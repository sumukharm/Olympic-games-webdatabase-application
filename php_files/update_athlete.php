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
echo $_POST["A_ID"]."<br>";
echo $_POST["G"]."<br>";
echo $_POST["S"]."<br>";
echo $_POST["B"]."<br>";

$A_ID=$_POST["A_ID"]; 
$G=$_POST["G"];
$S=$_POST["S"];
$B=$_POST["B"];

$sql = "UPDATE ATHLETE SET GOLD=GOLD+".$G.",SILVER=SILVER+".$S.",BRONZE=BRONZE+".$B." WHERE ATHLETE_ID='".$A_ID."'";

$sqm = "UPDATE COUNTRY SET TOTAL_GOLD=TOTAL_GOLD+".$G.",TOTAL_SILVER=TOTAL_SILVER+".$S.",TOTAL_BRONZE=TOTAL_BRONZE+".$B.",TOTAL_MEDALS=TOTAL_MEDALS+".$G."+".$S."+".$B." WHERE COUNTRY_ID = (SELECT CID FROM ATHLETE WHERE ATHLETE_ID='".$A_ID."')";

$retval = mysql_query( $sql, $connection );
$retvam = mysql_query( $sqm, $connection );

if(! $retval )
{
  die('Could not update the athlete database: ' . mysql_error());
}
echo "Athlete table updation successful\n";

if(! $retvam )
{
  die('Could not update the country database: ' . mysql_error());
}



mysql_close($connection);

?>

</body>
</html>
