<!DOCTYPE html>
<html>
<body>

<?php
$age=array("Peter"=>"39","Ben"=>"37","Joe"=>"35");
ksort($age);

foreach($age as $x=>$x_value)
    {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
    }
?>

</body>
</html>
