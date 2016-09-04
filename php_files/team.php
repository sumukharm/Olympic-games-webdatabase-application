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
echo $_POST["EID"]."<br>";
//echo $_POST["EVENT_NAME"]."<br>";
//echo $_POST["DATE"]."<br>";
//echo $_POST["TIME"]."<br>";
//echo $_POST["NO_OF_PLAYERS"]."<br>";
echo $_POST["G"]."<br>";
echo $_POST["S"]."<br>";
echo $_POST["B"]."<br>";

$EID=$_POST["EID"];
//$EVENT_NAME=$_POST["EVENT_NAME"];
//$DATE=$_POST["DATE"];
//$TIME=$_POST["TIME"];
//$NO_OF_PLAYERS=$_POST["NO_OF_PLAYERS"];
$G=$_POST["G"];
$S=$_POST["S"];
$B=$_POST["B"];
//$G_ID=0;
//$S_ID=0;
//$B_ID=0;

//$sql = "INSERT INTO EVENT VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";

/*$sql = "INSERT INTO EVENT (EVENT_ID,EVENT_NAME,DATE,TIME,NO_OF_PLAYERS,SPORT,REF_ID,VEN_ID) VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";*/

//UPDATE COUNTRY SET TOTAL_GOLD=TOTAL_GOLD+1 WHERE COUNTRY_ID=1;

$sql = "UPDATE COUNTRY SET TOTAL_GOLD=TOTAL_GOLD+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID=".$G."";
$sqm = "UPDATE COUNTRY SET TOTAL_SILVER=TOTAL_SILVER+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID=".$S."";
$sqn = "UPDATE COUNTRY SET TOTAL_BRONZE=TOTAL_BRONZE+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID=".$B."";

//UPDATE ATHLETE SET GOLD=GOLD+1 WHERE CID=1;
//AND ATHLETE_ID IN (SELECT ATH_ID FROM PATICIPATION WHERE EV_ID=

$sqp = "UPDATE ATHLETE SET GOLD=GOLD+1 WHERE CID=".$G." AND ATHLETE_ID IN (SELECT ATH_ID FROM PARTICIPATION WHERE EV_ID='".$EID."')";
$sqr = "UPDATE ATHLETE SET SILVER=SILVER+1 WHERE CID=".$S." AND ATHLETE_ID IN (SELECT ATH_ID FROM PARTICIPATION WHERE EV_ID='".$EID."')";
$sqs = "UPDATE ATHLETE SET BRONZE=BRONZE+1 WHERE CID=".$B." AND ATHLETE_ID IN (SELECT ATH_ID FROM PARTICIPATION WHERE EV_ID='".$EID."')";

$retval1 = mysql_query( $sql, $connection );
$retval2 = mysql_query( $sqm, $connection );
$retval3 = mysql_query( $sqn, $connection );
$retval4 = mysql_query( $sqp, $connection );
$retval5 = mysql_query( $sqr, $connection );
$retval6 = mysql_query( $sqs, $connection );

if(! $retval1 )
{
  die('Could not update into database: ' . mysql_error());
}
echo "Team event table updation successful\n";
mysql_close($connection);

?>

</body>
</html>
