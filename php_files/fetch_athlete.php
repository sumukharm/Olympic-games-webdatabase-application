<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);
$sql = mysql_query("SELECT * FROM ATHLETE"); 
$i = 0;
// Establish the output variable
//<!--style="color:green;"-->
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<tr><th>ATHLETE_ID</th>';
	$dyn_table .= '<th>ATHLETE_NAME</th>';
	$dyn_table .= '<th>GENDER</th>';
	$dyn_table .= '<th>DOB</th>';
	$dyn_table .= '<th>COUNTRY_ID</th>';
	$dyn_table .= '<th>OFFICIAL_ID</th>';
	$dyn_table .= '<th>GOLD</th>';
	$dyn_table .= '<th>SILVER</th>';
	$dyn_table .= '<th>BRONZE</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["ATHLETE_ID"];
    $member2_name = $row["ATHLETE_NAME"];
    $member3_name = $row["GENDER"];
    $member4_name = $row["DOB"];
    $member5_name = $row["CID"];
    $member6_name = $row["OID"];
    $member7_name = $row["GOLD"];
    $member8_name = $row["SILVER"];
    $member9_name = $row["BRONZE"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td>' . $member7_name . '</td>';
	$dyn_table .= '<td>' . $member8_name . '</td>';
	$dyn_table .= '<td>' . $member9_name . '</td></tr>';

    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<!-- comment -->
<body style= "width:100%;height:100%;background-image:url('olympic1.jpg');background-attachment:fixed;background-repeat:no-repeat;background-size:cover;opacity:0.9;">
<div>
<div style="background-color:#FFF;opacity:0.8;width:80%;color:green;">
 
<h3>Athlete Details</h3>
<?php echo $dyn_table; ?>
</div>
</div>
</body>
</html>
