
<?php

session_start();
if($_SESSION['user_id']!=0){
  echo "";
}
else{
  header("location: index.php");
}
$pr_chicken="";
$pr_meat="";
$pr_egg="";

$link=new mysqli("localhost","root","","poultry_farm");

$chik=mysqli_query($link,"SELECT * from `price` where pid=1 ");
$eg=mysqli_query($link,"SELECT * from `price` where  pid=3");
$mt=mysqli_query($link,"SELECT * from `price` where  pid=2 ");

while($row=mysqli_fetch_array($chik)){
  $pr_chicken=$row['price'];
  $pid_chicken=$row['pid'];
}
while($row=mysqli_fetch_array($eg)){
  $pr_egg=$row['price'];
  $pid_egg=$row['pid'];
}
while($row=mysqli_fetch_array($mt)){
  $pr_meat=$row['price'];
  $pid_meat=$row['pid'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Order Page</title>
</head>
<body onbeforeunload ="con();" >
<br><br><br><br><br><br>
<form class="container" method="post" action="">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" disabled name="email"  class="form-control-plaintext" id="staticEmail" value="<?=$_SESSION['email'] ;?>">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text" name="name" disabled class="form-control-plaintext"  id="inputPassword" placeholder="Username" value="<?=$_SESSION['user']; ?>">
    </div>
  </div>
  <br>
  <div class="form-group row">
  <label for="type" class="col-sm-2 col-form-label">Order type</label>
  <div class="col-sm-4">
  <select class="form-control col-sm-2" name="type"  id="sell" >
        <option>Meat</option>
        <option>Egg</option>
        <option>Chicken</option>
    </select>
    <br>
  </div>    
  <div class="form-group row">
    <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
    <div class="col-sm-10">
      <input type="number" name="qty"  value="0" class="form-control" id="qty" placeholder="Quantity" required>
      <br>
    </div>
    <div class="form-group row">
    <label for="address" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control" id="address" placeholder="Address"  value="<?= $_SESSION['address']; ?>" required>
      <br>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-sm-12">
      <input style="width:100%;" type="submit" name="submit" class="btn btn-outline-primary " value="SUBMIT" />
  </div>    
  </div>

  <div class="form-group row">
  <div class="col-sm-12">
    <br>
      <input style="width:100%;" type="submit" name="logout" class="btn btn-danger " value="LOGOUT" />
  </div>    
  </div>
  </div>
</form>
</body>
<?php
$pid=0;
$amount=0;
$date=date("Y/m/d");
if(isset($_POST['submit'])){
  if($_POST['type']=='Chicken'){
    $pid=1;
    $amount=$_POST['qty'] * $pr_chicken;
  }
  else if($_POST['type']=='Egg'){
    $pid=3;
    $amount=$_POST['qty'] * $pr_egg;
  }
  else if($_POST['type']=='Meat'){
    $pid=2;
    $amount=$_POST['qty'] * $pr_meat;
  }


  
  $order_query="INSERT INTO `orders`(`order_id` ,`cid`, `pid`, `order_type`, `quantity`, `address`) 
  VALUES (NULL,'$_SESSION[user_id]','$pid','$_POST[type]','$_POST[qty]','$_POST[address]')";

  $payment_query="INSERT INTO `payment`(`p_id`, `c_id`, `amount`) 
  VALUES (NULL, '$_SESSION[user_id]', '$amount') ";

$sql1 = mysqli_query($link,$order_query);
$sql2 = mysqli_query($link,$payment_query);

?>
<script>
window.location.href='order.php';
</script>  
<?php
}




if(isset($_POST['logout'])){
  session_unset();
session_destroy();

header("location:index.php");
}


?>

<script type="text/javascript">
function con() {
    var answer = confirm("Do you want to logout?")
    if (answer){
        session_unset();
session_destroy();

header("location:index.php");
    }
    else{
        window.location = "order.php";
    }
}
</script>
</html>