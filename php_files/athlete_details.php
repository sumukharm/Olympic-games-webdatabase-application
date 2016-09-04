<?php
// Include database connection
include_once 'connect_to_mysql.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'linux';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
// SQL query to interact with info from our database
mysql_select_db('OLYMPIC_GAMES',$conn);

$A_ID=$_POST["A_ID"];

$sqli = mysql_query("SELECT *,(GOLD+SILVER+BRONZE) AS TOTAL,NAME FROM ATHLETE,COUNTRY WHERE COUNTRY_ID=CID AND ATHLETE_ID='".$A_ID."'"); 

$i = 0;
// Establish the output variable
$dyn_table1 = '<table border="5" cellpadding="5">';

	$dyn_table1 .= '<tr><th>ATHLETE_ID</th>';
	$dyn_table1 .= '<th>ATHLETE_NAME</th>';
	$dyn_table1 .= '<th>GENDER</th>';
	$dyn_table1 .= '<th>DOB</th>';
	$dyn_table1 .= '<th>COUNTRY_ID</th>';
	$dyn_table1 .= '<th>COUNTRY_NAME</th>';
	$dyn_table1 .= '<th>OFFICIAL_ID</th>';	
	$dyn_table1 .= '<th>GOLD</th>';
	$dyn_table1 .= '<th>SILVER</th>';
	$dyn_table1 .= '<th>BRONZE</th>';
	$dyn_table1 .= '<th>TOTAL</th></tr>';

while($row1 = mysql_fetch_array($sqli)){ 
    
    $id1 = $row1["id1"];
    $member11_name = $row1["ATHLETE_ID"];
    $member12_name = $row1["ATHLETE_NAME"];
    $member13_name = $row1["GENDER"];
    $member14_name = $row1["DOB"];
    $member15_name = $row1["CID"];
    $member16_name = $row1["NAME"];
    $member17_name = $row1["OID"];
    $member18_name = $row1["GOLD"];
    $member19_name = $row1["SILVER"];
    $member20_name = $row1["BRONZE"];
    $member21_name = $row1["TOTAL"];
   
        $dyn_table1 .= '<tr><td>' . $member11_name . '</td>';
	$dyn_table1 .= '<td>' . $member12_name . '</td>';
	$dyn_table1 .= '<td>' . $member13_name . '</td>';
	$dyn_table1 .= '<td>' . $member14_name . '</td>';
	$dyn_table1 .= '<td>' . $member15_name . '</td>';
	$dyn_table1 .= '<td>' . $member16_name . '</td>';
	$dyn_table1 .= '<td>' . $member17_name . '</td>';
	$dyn_table1 .= '<td>' . $member18_name . '</td>';
	$dyn_table1 .= '<td>' . $member19_name . '</td>';
	$dyn_table1 .= '<td>' . $member20_name . '</td>';
	$dyn_table1 .= '<td>' . $member21_name . '</td></tr>';

    $i++;
}
$dyn_table1 .= '</tr></table>';

$sql = mysql_query("SELECT EVENT_ID,SPORT,EVENT_NAME,DATE,TIME,VENUE_NAME FROM ATHLETE,PARTICIPATION,EVENT,COUNTRY,VENUE WHERE CID=COUNTRY_ID AND EV_ID=EVENT_ID AND ATH_ID=ATHLETE_ID AND G_ID=ATHLETE_ID AND VENUE_ID=VEN_ID AND ATHLETE_ID='".$A_ID."'"); 

$sqm = mysql_query("SELECT EVENT_ID,SPORT,EVENT_NAME,DATE,TIME,VENUE_NAME FROM ATHLETE,PARTICIPATION,EVENT,COUNTRY,VENUE WHERE CID=COUNTRY_ID AND EV_ID=EVENT_ID AND ATH_ID=ATHLETE_ID AND S_ID=ATHLETE_ID AND VENUE_ID=VEN_ID AND ATHLETE_ID='".$A_ID."'"); 

$sqn = mysql_query("SELECT EVENT_ID,SPORT,EVENT_NAME,DATE,TIME,VENUE_NAME FROM ATHLETE,PARTICIPATION,EVENT,COUNTRY,VENUE WHERE CID=COUNTRY_ID AND EV_ID=EVENT_ID AND ATH_ID=ATHLETE_ID AND B_ID=ATHLETE_ID AND VENUE_ID=VEN_ID AND ATHLETE_ID='".$A_ID."'"); 

$sqo = mysql_query("SELECT EVENT_ID,SPORT,EVENT_NAME,DATE,TIME,VENUE_NAME FROM ATHLETE,PARTICIPATION,EVENT,COUNTRY,VENUE WHERE CID=COUNTRY_ID AND ATH_ID=ATHLETE_ID AND EV_ID=EVENT_ID AND VENUE_ID=VEN_ID AND ATHLETE_ID='".$A_ID."' AND ((G_ID<>ATHLETE_ID AND S_ID<>ATHLETE_ID AND B_ID<>ATHLETE_ID) OR (G_ID IS NULL AND S_ID IS NULL AND B_ID IS NULL))"); 

$i = 0;
// Establish the output variable
$dyn_table = '<table border="5" cellpadding="5">';

	$dyn_table .= '<th>EVENT_ID</th>';
	$dyn_table .= '<th>SPORT</th>';	
	$dyn_table .= '<th>EVENT_NAME</th>';
	$dyn_table .= '<th>DATE</th>';
	$dyn_table .= '<th>TIME</th>';
	$dyn_table .= '<th>VENUE_NAME</th>';
	$dyn_table .= '<th>MEDAL</th></tr>';

while($row = mysql_fetch_array($sql)){ 
    
    $id = $row["id"];
    $member1_name = $row["EVENT_ID"];
    $member2_name = $row["SPORT"];
    $member3_name = $row["EVENT_NAME"];
    $member4_name = $row["DATE"];
    $member5_name = $row["TIME"];
    $member6_name = $row["VENUE_NAME"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td> GOLD </td></tr>';

    $i++;
}

while($row = mysql_fetch_array($sqm)){ 
    
    $id = $row["id"];
    $member1_name = $row["EVENT_ID"];
    $member2_name = $row["SPORT"];
    $member3_name = $row["EVENT_NAME"];
    $member4_name = $row["DATE"];
    $member5_name = $row["TIME"];
    $member6_name = $row["VENUE_NAME"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td> SILVER </td></tr>';

    $i++;
}

while($row = mysql_fetch_array($sqn)){ 
    
    $id = $row["id"];
    $member1_name = $row["EVENT_ID"];
    $member2_name = $row["SPORT"];
    $member3_name = $row["EVENT_NAME"];
    $member4_name = $row["DATE"];
    $member5_name = $row["TIME"];
    $member6_name = $row["VENUE_NAME"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td> BRONZE </td></tr>';

    $i++;
}

while($row = mysql_fetch_array($sqo)){ 
    
    $id = $row["id"];
    $member1_name = $row["EVENT_ID"];
    $member2_name = $row["SPORT"];
    $member3_name = $row["EVENT_NAME"];
    $member4_name = $row["DATE"];
    $member5_name = $row["TIME"];
    $member6_name = $row["VENUE_NAME"];
   
        $dyn_table .= '<tr><td>' . $member1_name . '</td>';
	$dyn_table .= '<td>' . $member2_name . '</td>';
	$dyn_table .= '<td>' . $member3_name . '</td>';
	$dyn_table .= '<td>' . $member4_name . '</td>';
	$dyn_table .= '<td>' . $member5_name . '</td>';
	$dyn_table .= '<td>' . $member6_name . '</td>';
	$dyn_table .= '<td>      -     </td></tr>';

    $i++;
}

$dyn_table .= '</tr></table>';
?>
<html>
<body style="width:100%;height:100%;background-image:url('olympic1.jpg');background-attachment:fixed;background-repeat:no-repeat;background-size:cover;opacity:0.9;">
<div >
<div style="background-color:#FFF;opacity:0.7;width:100%;color:green;">
 
<h3>Athlete Details</h3>
<?php echo $dyn_table1; ?>
<h3>Athlete Participation Details</h3>
<?php echo $dyn_table; ?>
</body>
</html>
