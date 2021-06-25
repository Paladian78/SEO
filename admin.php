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
                    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" >
                            <div class="panel-heading" style="text-align: center" id="pc">
                                <h4>SEARCH BAR</h4>
                            </div>
                            <div class="panel-body" style="text-align: center" id="corn">
                                <form role="form"  method="POST">
                                    <div class="form-group">
                                        <input class="form-control" style="border-radius: 25px;" placeholder="Search" name="data"  required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php

if(!empty($_POST)){
$name1 = $_POST['data'];
$sql = "select * from url_links where name Like '%$name1%' or title Like '%$name1%' order by p_score desc";
$result=mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
   $temparray =[];
    while($row = mysqli_fetch_assoc($result)) {
      $data['url']=$row['url'];
      $data['name']=$row['name'];
      $data['description']=$row['description'];
      $data['title']=$row['title'];
      $data['p_click']=$row['p_click'];
      $data['p_visit']=$row['p_visit'];
      $data['id']=$row['id'];
      $data['p_score']=$row['p_score'];
      $temparray[] = $data;    
    
}

$table ='';
 foreach($temparray as $val)
 {
   $page_visit = $val['p_visit'] + 1;
   $id = $val['id'];

  $sql="UPDATE `url_links` SET `p_visit`= $page_visit  WHERE `id`= $id";
  mysqli_query($con,$sql);
$table .= '<hr><a href="javascript:void(0);" onclick="pageclick('.$val['id'].')"><p>'. $val['url'] .'</p></a>
<input type="hidden" id="'. $val['id'] .'" value="'. $val['url'] .'" />
<a style= "font-size: 20px;"href="javascript:void(0);" onclick="pageclick('.$val['id'].')"  >'.$val['name'].'|  ' .$val['title'].'</a> <p>'. $val['description'].'.....</p><br>';
 }
echo $table;
}

}

?>

<script>
function pageclick(id)
{

  var url = $("#"+ id).val();
 $.ajax({

type:'post',
data:{'id':id},
url:'incclick.php',
success:function(result){
   window.open(url,'_blank');
}

});

}

</script>
                    </div>
                </div>
            </div>
        </div>
            </div>
       </div>
    </body>
</html>
<style>
    #pc{
        background-color: #1b6d85;
    }
#corn{
        overflow:hidden;
        background-color: whitesmoke;
    }
    body{
	background-image: url("http://localhost/Php/img/seo3.jpg");
	background-size: cover;
}
</style>

<?php
include 'footer.php';
?>