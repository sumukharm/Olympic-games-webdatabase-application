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
echo $_POST["COUNTRY_ID"]."<br>";
echo $_POST["NAME"]."<br>";
echo $_POST["ABBR"]."<br>";
//echo $_POST["TOTAL_GOLD"]."<br>";
//echo $_POST["TOTAL_SILVER"]."<br>";
//echo $_POST["TOTAL_BRONZE"]."<br>";
//echo $_POST["TOTAL_MEDALS"]."<br>";

$COUNTRY_ID=$_POST["COUNTRY_ID"];
$NAME=$_POST["NAME"];
$ABBR=$_POST["ABBR"];
$TOTAL_GOLD=0;//$_POST["TOTAL_GOLD"];
$TOTAL_SILVER=0;//$_POST["TOTAL_SILVER"];
$TOTAL_BRONZE=0;//$_POST["TOTAL_BRONZE"];
$TOTAL_MEDALS=0;//$_POST["TOTAL_MEDALS"];

$sql = "INSERT INTO COUNTRY VALUES(".$COUNTRY_ID.",'".$NAME."','".$ABBR."',".$TOTAL_GOLD.",".$TOTAL_SILVER.",".$TOTAL_BRONZE.",".$TOTAL_MEDALS.")";
$retval = mysql_query( $sql, $connection );

if(! $retval )
{
  die('Could not insert into database: ' . mysql_error());
}
echo "Country table insertion successful\n";
mysql_close($connection);

?>

</body>
</html>
