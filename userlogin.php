
<?php 
session_start();
$total="";
$sts="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="bgimg">
    <img  src="./images/cock.jpg"> 
    </div>
<style>
    .bgimg{
        position: fixed;
        top: 0;
        right: 0;
        z-index: -1;
        width: 100vw;
        height: 100vh;
        display: block;
        min-width: 100%;        
        opacity: 1;
        transition: .3s;
    }
    .bgimg:hover{
        opacity: 0.8;
    }
    .bgimg img{
        position: absolute;
        width: 100%;
        height: 100% ;
        z-index: -1;
        object-fit: cover;
    }
    body{
        color:#fff
    }
    #order{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 4% 1%;
        float: left;
        background: red;
        color: #fff;
        font-size: 30px;
        box-shadow: 10px  15px 8px rgba(0,0,0,0.3);
        text-decoration: none;
        transition: .5s;
        height: 100vh;
        position: absolute;
    }
    #order:hover{
        padding:4% 6%;
    }
    .status{
      width: fit-content;
      background: rgba(0,0,0,0.7);
      padding: 10px 50px;
      backdrop-filter: blur(5px);
      border-radius: 5px;
      margin: 10px;
    }
    .container{
      background: rgba(0,0,0,0.4);color:#fff;padding:30px;margin:0 auto;border-radius:5px;backdrop-filter:blur(3px);z-index:1;
    }
    @media(max-width:900px){
      #cont{
        width: 100%;
        margin: 0;
      }
      #order{
        padding: 0;
        width: 100%;
        height: fit-content;
        z-index: 3;
      }
    }

</style>

<a href="order.php"  id="order">Order now!</a>
<div id="cont" class="container col-md-4">
    <br><br>
  <h2>Enter Customer Details:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="name">Username:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter username" name="uname" required >
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit"></input>
    <a  href="signup.php" style="position: relative;margin:30px;color:#fff;">Sign up</a>
    <a href="index.html" style="position: relative;margin:30px;color:#fff;">Home</a>
  </form>
</div>


<br><br><br>
<?php

if(isset($_POST['submit'])){

$link = new mysqli("localhost","root",'',"poultry_db");
$check=mysqli_query($link,"SELECT count(*) as count from customer where username='$_POST[uname]' and `password`='$_POST[pswd]' ");
// $query= mysqli_query($link,"SELECT * from order");
$var=mysqli_fetch_array($check);
$num=$var['count'];
if($num>0){
$_SESSION['status']='Seccess';
$_SESSION['user']=$_POST['uname'];
$_SESSION['password']=$_POST['pswd'];
$query = mysqli_query($link,"SELECT cid,`order_id`,`cname`,`order_name`,`quantity` from `order`, customer where username='$_POST[uname]' and `password`='$_POST[pswd]' and cid=id ;");

echo "<center>";
echo "<table class='table' style='background:rgba(0,0,0,0.6);color:#fff;backdrop-filter:blur(20px);' border='5'>

<tr>
<th>Order ID</th>
<th>Customer name</th>  
<th>Type</th>
<th>Quantity</th> 
</tr>";
echo "</center>";

$count=0;
$id=0;
while($row=mysqli_fetch_array($query))
{
    echo "<tr>";
    $id=$row['cid'];
    echo "<td>"; echo $row["order_id"]; echo "</td>";
    echo "<td>"; echo $row["cname"]; echo "</td>";
    echo "<td>"; echo $row["order_name"]; echo "</td>";
    echo "<td>"; echo $row["quantity"]; echo "</td>";
    echo "</tr>";
    $count= $count+1;
}
$status= mysqli_query($link,"SELECT sum(amount) as `amount`,`status` from `payment` where `id`='$id'; ");
while($row=mysqli_fetch_array($status)){
$total=$row['amount'];
$sts=$row['status'];
}
echo "<div class='status'>";
echo "<h1>Total: ₹$total </h1>";
echo "<h2>$sts</h2>";
echo "</div>";

}
else{
  echo "<center>Enter correct Username and Password!</center>";
}
}




?>


</body>
</html>
