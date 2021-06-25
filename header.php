<?php
require 'connect.php';
session_start();
//echo $_SESSION['name'];
?>

 <html> 
         <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
         <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
    <body style="padding-bottom: 40px;">
        <!-- Header -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">      
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <?php
                    
                    if(!isset($_SESSION['name'])){
                    ?>
                    <a class="navbar-brand" href="index.php">WEBPAGE RANKER</a>
                    <?php
                    }
                    else{
                    ?>
                    <a class="navbar-brand" href="admin.php">Hello<?php echo ' '; echo $_SESSION['name'];?></a>
                    <?php
                    }
                    ?>
                </div>
                <?php
                    
                    if(!isset($_SESSION['name'])){
                    ?>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="signup.php"> Sign Up</a></li>
                        <li><a href="login.php"> Login</a></li>
                    </ul>
                </div>
                <?php
                    }
                    else{
                ?>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="addLink.php">Add Link</a></li>
                        <li><a href="suggestor.php">Suggestor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <?php
                    }?>
            </div>
        </div>
     </body>
 </html>
 