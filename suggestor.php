<?php
include 'header.php';
if(!isset($_SESSION['name'])){
header('location: index.php');
exit;
}
?>
<html>
    <body>
        <div id="content"">
            <div  id="login-panel">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-4 col-md-offset-4">
                        <div class="panel panel-primary"  >
                            <div class="panel-heading" style="text-align: center">
                                <h4>SUGGESTER</h4>
                            </div>
                            <div class="panel-body" style="text-align: center">
                                <form role="form"  method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="SEARCH" name="link" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Search</button><br><br>
                                </form>
                                
            <?php
if(!empty($_POST)){
    $link=$_POST['link'];    
$s="SELECT url,inbound,outbound,description FROM url_links WHERE url='$link'";
$test= mysqli_query($con, $s) or die('<h2>SORRRYY!! LINK NOT FOUND</h2>');      
if($sr= mysqli_fetch_array($test)){
    echo "<h4>INBOUND : ".$sr['inbound']."</h4><br>";
    echo "<h4>OUTBOUND : ".$sr['outbound']."</h4><br>";
    if(abs($sr['inbound']-$sr['outbound'])<=10){
        echo "Your website has a balance between inbound and outbound tactics<br>If you wish to explore other options. Here are some advantages of each"
        . "<br>Outbound is a better short-term solution with higher long-term costs, while inbound marketing tends to be the better long-term solution with its own set of associated investment costs";
    }
    else{
        if(max($sr['inbound'],$sr['outbound'])==$sr['inbound']){
            echo "Your website follows inbound tactics";
        }
        else{
            echo "Your website follows inbound tactics";
        }
    }
}
else{
    echo"<h2>SORRRYY!! LINK NOT FOUND</h2>";
}
}
?>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        
        
        </div>
    </body>
</html>
<?php
include 'footer.php';
?>
<style>
    body{
	background-image: url("http://localhost/Php/img/seo3.jpg");
	background-size: cover;
}
</style>

<script>
<?php

$link=$_POST['link'];    
$s="SELECT url,inbound,outbound,description FROM url_links WHERE url='$link'";
$test= mysqli_query($con, $select) or die('<h2>SORRRYY!! LINK NOT FOUND</h2>');
$t=false;
if($sr= mysqli_fetch_array($test)){
    $t=true;
    header('location: login.php ? temp=1');
}
?>
    </script>
