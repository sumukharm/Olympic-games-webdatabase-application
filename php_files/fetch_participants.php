<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);

$E_ID=$_POST["E_ID"];

$sql = mysql_query("SELECT DISTINCT ATHLETE_ID,ATHLETE_NAME,GENDER,NAME,SPORT,EVENT_NAME FROM ATHLETE,PARTICIPATION,EVENT,COUNTRY WHERE CID=COUNTRY_ID AND ATH_ID=ATHLETE_ID AND EV_ID=EVENT_ID AND EV_ID='".$E_ID."'"); 
$i = 0;
// Establish the output variable
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<tr><th>ATHLETE_ID</th>';
	$dyn_table .= '<th>ATHLETE_NAME</th>';
	$dyn_table .= '<th>GENDER</th>';
	$dyn_table .= '<th>COUNTRY</th>';
	$dyn_table .= '<th>SPORT</th>';	
	$dyn_table .= '<th>EVENT_NAME</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["ATHLETE_ID"];
    $member2_name = $row["ATHLETE_NAME"];
    $member3_name = $row["GENDER"];
    $member4_name = $row["NAME"];
    $member5_name = $row["SPORT"];
    $member6_name = $row["EVENT_NAME"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td></tr>';

    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<body style="width:100%;height:100%;background-image:url('olympic1.jpg'); background-attachment:fixed;background-repeat:no-repeat;background-size:cover;opacity:0.9;">
<div >
<div style="background-color:#FFF;opacity:0.8;width:72%;color:green;">
 
<h3>Participant Details</h3>
<?php echo $dyn_table; ?>
</body>
</html>
