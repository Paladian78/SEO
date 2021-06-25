<?php
include 'header.php';
if(!isset($_SESSION['name'])){
header('location: index.php');
exit;
}
?>
<html>
    <body>
        <div id="content" style="min-height: 500px;">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-4 col-md-offset-4">
                       
                        <div class="panel panel-primary"  >
                            <div class="panel-heading" style="text-align: center">
                                <h4>ENTER LINK</h4>
                            </div>
                            <div class="panel-body" style="text-align: center">
                                <form role="form" method="POST" >
                                  
                                    <p>Paste URL here</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Link" name="link" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Description" name="description" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Inbound" name="inbound" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Outbound" name="outbound" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
                                </form>
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

require 'connect.php';
$name= mysqli_real_escape_string($con,$_POST['name']);
$url=mysqli_real_escape_string($con,$_POST['link']);
$title=mysqli_real_escape_string($con,$_POST['title']);
$description=mysqli_real_escape_string($con,$_POST['description']);
$inbound=mysqli_real_escape_string($con,$_POST['inbound']);
$outbound=mysqli_real_escape_string($con,$_POST['outbound']);
$p_score=$inbound+$outbound;
$insert="insert into url_links(name, url,title,description,p_score,inbound,outbound) values ('$name','$url','$title','$description','$p_score','$inbound','$outbound')";
$result=mysqli_query($con,$insert) or die(mysqli_error($con));
if(!empty($result))
       {
           header('location: addlink.php');
       }
?>
</script>
