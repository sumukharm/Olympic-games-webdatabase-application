<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);
$sql = mysql_query("SELECT * FROM COUNTRY ORDER BY TOTAL_GOLD DESC,TOTAL_SILVER DESC,TOTAL_BRONZE DESC"); 
$i = 0;
// Establish the output variable
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<tr><th>COUNTRY_ID</th>';
	$dyn_table .= '<th>NAME</th>';
	$dyn_table .= '<th>ABBR</th>';
	$dyn_table .= '<th>GOLD</th>';
	$dyn_table .= '<th>SILVER</th>';
	$dyn_table .= '<th>BRONZE</th>';
	$dyn_table .= '<th>TOTAL</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["COUNTRY_ID"];
    $member2_name = $row["NAME"];
    $member3_name = $row["ABBR"];
    $member4_name = $row["TOTAL_GOLD"];
    $member5_name = $row["TOTAL_SILVER"];
    $member6_name = $row["TOTAL_BRONZE"];
    $member7_name = $row["TOTAL_MEDALS"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td>' . $member7_name . '</td></tr>';

    $i++;
}
$dyn_table .= '</tr></table>';
?>
<html>
<body style="width:100%;height:100%;background-image:url('olympic_c.jpg');background-attachment:fixed;background-repeat:no-repeat; background-attachment:fixed; background-size:cover;opacity:0.9;">
<div >
<div style="background-color:#FFF;opacity:0.9;width:60%;color:green;">

<h3>Country Details</h3>
<?php echo $dyn_table; ?>
</div>
</div>
</body>
</html>
