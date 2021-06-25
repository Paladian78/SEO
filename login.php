<?php
include 'header.php';
?>
<html>
    <body>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <div><?php 
                                if(isset($_GET['error'])==true){
                                    echo '<font color=red><p align="center">Invalid user and password</p></font>';
                                }
                                ?></div>
                                <p class="text-warning">Login to make a search<p>
                                <form role="form"  method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="e-mail" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a  href="signup.php">Register</a></p></div>
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
.cont{
    
}
</style>
<script>
    <?php
require 'connect.php';
$email=$_POST['e-mail'];
$pass=$_POST['password'];
$password= md5($pass);
$select="SELECT email,password,name FROM users";
$selectr= mysqli_query($con, $select) or die(mysqli_error($con));
$flag=false;
while ($row = mysqli_fetch_array($selectr)) {
    if($row['email']==$email && $row['password']==$password){
        $_SESSION['name']=$row['name'];
        $flag=true;
        break;
    }
}
if($flag==true){
    header("Location:http://localhost/Php/admin.php");
}
else{
    header('location: login.php ? error=1');
}
?>

</script>