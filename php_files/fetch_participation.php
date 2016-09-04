<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);
$sql = mysql_query("SELECT * FROM PARTICIPATION"); 
$i = 0;
// Establish the output variable
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<tr><th>ATHLETE_ID</th>';
	$dyn_table .= '<th>EVENT_ID</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["ATH_ID"];
    $member2_name = $row["EV_ID"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td></tr>';

    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<body style="width:100%;height:100%;background-image:url('olympic_pp.png');background-attachment:fixed ;background-repeat:no-repeat;background-size:cover;opacity:0.9;">
<div >
<div style="background-color:#FFF;opacity:0.5;width:18%;color:green;">

<h3>Participation Details</h3>
<?php echo $dyn_table; ?>
</div>
</div>
</body>
</html>	
