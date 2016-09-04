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
//echo $_POST["EVENT_NAME"]."<br>";
//echo $_POST["DATE"]."<br>";
//echo $_POST["TIME"]."<br>";
//echo $_POST["NO_OF_PLAYERS"]."<br>";
echo $_POST["GA"]."<br>";
echo $_POST["SA"]."<br>";
echo $_POST["BA"]."<br>";

$EVENT_ID=$_POST["EVENT_ID"];
//$EVENT_NAME=$_POST["EVENT_NAME"];
//$DATE=$_POST["DATE"];
//$TIME=$_POST["TIME"];
//$NO_OF_PLAYERS=$_POST["NO_OF_PLAYERS"];
$BA=$_POST["BA"];
$SA=$_POST["SA"];
$GA=$_POST["GA"];
//$G_ID=0;

//$sql = "INSERT INTO EVENT VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";

$sql = "UPDATE EVENT SET G_ID='".$GA."',S_ID='".$SA."',B_ID='".$BA."' WHERE EVENT_ID='".$EVENT_ID."'";

//$sql = "INSERT INTO EVENT (EVENT_ID,EVENT_NAME,DATE,TIME,NO_OF_PLAYERS,SPORT,REF_ID,VEN_ID) VALUES('".$EVENT_ID."','".$EVENT_NAME."','".$DATE."','".$TIME."',".$NO_OF_PLAYERS.",'".$SPORT."','".$REF_ID."','".$VEN_ID."')";
$retval = mysql_query( $sql, $connection );

//UPDATE ATHLETE SET GOLD=GOLD+1,SILVER=SILVER+1,BRONZE=BRONZE+1 WHERE ATHLETE_ID='A1';

$sqm = "UPDATE ATHLETE SET GOLD=GOLD+1 WHERE ATHLETE_ID='".$GA."'";
$sqn = "UPDATE ATHLETE SET SILVER=SILVER+1 WHERE ATHLETE_ID='".$SA."'";
$sqr = "UPDATE ATHLETE SET BRONZE=BRONZE+1 WHERE ATHLETE_ID='".$BA."'";

if(! $retval )
{
  die('Could not update the event: ' . mysql_error());
}

$retval1 = mysql_query( $sqm, $connection );
$retval2 = mysql_query( $sqn, $connection );
$retval3 = mysql_query( $sqr, $connection );

//UPDATE COUNTRY SET TOTAL_GOLD=TOTAL_GOLD+1 WHERE COUNTRY_ID = (SELECT CID FROM ATHLETE WHERE ATHLETE_ID='A1');
$sqa = "UPDATE COUNTRY SET TOTAL_GOLD=TOTAL_GOLD+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID = (SELECT CID FROM ATHLETE WHERE ATHLETE_ID='".$GA."')";
$sqb = "UPDATE COUNTRY SET TOTAL_SILVER=TOTAL_SILVER+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID = (SELECT CID FROM ATHLETE WHERE ATHLETE_ID='".$SA."')";
$sqc = "UPDATE COUNTRY SET TOTAL_BRONZE=TOTAL_BRONZE+1,TOTAL_MEDALS=TOTAL_MEDALS+1 WHERE COUNTRY_ID = (SELECT CID FROM ATHLETE WHERE ATHLETE_ID='".$BA."')";

$retval4 = mysql_query( $sqa, $connection );
$retval5 = mysql_query( $sqb, $connection );
$retval6 = mysql_query( $sqc, $connection );

echo "Event table updation successful\n";
mysql_close($connection);

?>

</body>
</html>
