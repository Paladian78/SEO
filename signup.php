<?php
include 'header.php';
?>
<html>
    
    <body>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <h2 style="text-align: center; "><b>SIGN UP</b></h2>
                        <form  method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="e-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" required>
                            </div>
                            <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top: 75px"><br></div>

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
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['e-mail']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password= md5($password);
$contact=mysqli_real_escape_string($con,$_POST['contact']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$insert="insert into users(name, email , password , contact , address , city) values ('$name','$email','$password','$contact','$address','$city')";
$result=mysqli_query($con,$insert) or die(mysqli_error($con));
if(!empty($result))
       {
           header("Location:http://localhost/Php/login.php");
       }
?>

</script>
