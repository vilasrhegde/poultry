<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choose items & Quantity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>

<div class="container" id="login" >
  <h2>Enter Your Details:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="name">Username:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter username" name="uname" value=<?php echo "" ?>>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value=<?php echo "" ?>>
    </div>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-block" style="background: #222;" value="Order"></input>
    <br>
  </form>
</div>

<br>
  <div class="container">
  <h2>Buy the things you want!</h2>
  <br>
  <form method="post" action="">
  <div class="form-group">
      <label for="sell">Select category</label>
      <select class="form-control" name="type" id="sell" >
        <option>Meat</option>
        <option>Egg</option>
        <option>Sliced</option>
        <option>Chicken</option>
      </select>
      <br>
    </div>
    <div class="form-group">
      <label for="qty">Quantity:</label>
      <input type="number" name="qty" class="form-control" id="qty">
    </div>
    <div class="form-group">
      <label for="add">Address:</label>
      <input type="text" name="add" class="form-control" id="add">
    </div>
    <br>
    <input class="btn btn-block btn-success"  type="button" name="order" value="Order" onclick="show()">
  </form>
</div>
<style>
    #login{
        display: none;
        position: relative;
        background: #888;
        padding:10px 30px;
        color: #222;
        font-size: 20px;
        border-radius: 5px;
        
    }
    #login h2{
        font-size: 30px;
        font-weight: 900;
        color: #fff;
    }
    #login input{
        background: rgba(255,255,255,0.8);
    }
</style>
<script>
    function show(){
        document.getElementById('login').style.display='block';
    }
</script>
</body>

<?php
$link = new mysqli("localhost","root",'',"poultry_db");
$uname="";
$pass="";

$pr=mysqli_query($link,"SELECT * from price");

while($row=mysqli_fetch_array($pr)){
  $chik=$row['chicken'];
  $mt=$row['meal'];
  $sl=$row['sliced'];
  $eg=$row['egg'];
}

if(isset($_POST['order'])){
  $amt=0;
  $qty=$_POST['qty'];
  if($_POST['type']==='chicken'){
    $amt=$chik * $qty;
  }
  if($_POST['type']==='sliced'){
    $amt=$sl * $qty;
  }
  if($_POST['type']==='meat'){
    $amt=$mt * $qty;
  }
  if($_POST['type']==='egg'){
    $amt=$eg * $qty;
  }
}

if(isset($_POST['submit'])){

    $query= mysqli_query($link, "SELECT * from `customer` where `username`='$_POST[uname]' ");

    while($row=mysqli_fetch_array($query)){
        $uname=$row['username'];
        $pass=$row['password'];
        $cid=$row['id'];

    }

    if($uname===$_POST['uname'] && $pass===$_POST['pswd']){
  
            $ins=mysqli_query($link, "INSERT INTO `order`(`order_id`, `cid`, `quantity`, `address`, `order_name`,`amount`) 
            VALUES (NULL,'$cid','$_POST[qty]','$_POST[add]','$_POST[type]','$amt')");
?>

<script>
    window.location.href="order.php";
</script>

<?php
    }
    else{
        echo "<center>Wrong Password or Username!</cenetr>";
    }
}
?>
</html>
