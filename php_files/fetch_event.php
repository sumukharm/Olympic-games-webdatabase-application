<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);
$sql = mysql_query("SELECT * FROM EVENT"); 
$i = 0;
// Establish the output variable
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<tr><th>EVENT_ID</th>';
	$dyn_table .= '<th>EVENT_NAME</th>';
	$dyn_table .= '<th>SPORT</th>';
	$dyn_table .= '<th>DATE</th>';
	$dyn_table .= '<th>TIME</th>';
	$dyn_table .= '<th>NO. OF ATHLETES</th>';
	$dyn_table .= '<th>REFEREE_ID</th>';
	$dyn_table .= '<th>VENUE_ID</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["EVENT_ID"];
    $member2_name = $row["EVENT_NAME"];
    $member3_name = $row["SPORT"];
    $member4_name = $row["DATE"];
    $member5_name = $row["TIME"];
    $member6_name = $row["NO_OF_PLAYERS"];
    $member7_name = $row["REF_ID"];
    $member8_name = $row["VEN_ID"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td>' . $member7_name . '</td>';
	$dyn_table .= '<td>' . $member8_name . '</td></tr>';

    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<body style="width:100%;height:100%;background-image:url('olympic_ee.png'); background-attachment:fixed;background-repeat:no-repeat;background-size:cover;opacity:0.9;">
<div>
<div style="background-color:#FFF;opacity:0.7;width:72%;color:green;">
 
<h3>Event Details</h3>
<?php echo $dyn_table; ?>
</div>
</div>
</body>
</html>
