<?php
require 'connect.php';
$click=$_POST['id'];
$sqlr= "select p_click, p_score from url_links where id = '$click'";
$result=mysqli_query($con,$sqlr);
$row= mysqli_fetch_array($result);
$t=$row['p_click']+1;
$ts=$row['p_score']+1;
$sql="UPDATE url_links SET p_click='$t', p_score='$ts' WHERE id='$click'";
$res= mysqli_query($con, $sql) or die(mysqli_error($con));
echo '1';
?>