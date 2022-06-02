
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
</head>
<body>

<div class="container">
  <br><br><br><br>
  <form action="" method="post">
            <div class="row">
                <div class="col-md-11 mt-60 mx-md-auto">
                    <div class="login-box bg-white pl-lg-5 pl-0">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-6">
                                <div class="form-wrap bg-white">
                                    <h4 class="btm-sep pb-3 mb-5">Login</h4>
                                    <form class="form" method="post" action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-email"></span>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group position-relative">
                                                    <span class="zmdi zmdi-key"></span>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-12 text-lg-right">
                                                <a href="#" class="c-black">Forgot password ?</a>
                                            </div>
                                            <div class="col-12 mt-30">
                                                <button type="submit" id="submit" name="signin" class="btn btn-lg btn-custom btn-dark btn-block">Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content text-center">
                                    <div class="border-bottom pb-5 mb-5">
                                        <h3 class="c-black">First time here?</h3>
                                        <a href="signup.php" class="btn btn-custom">Sign up</a>
                                    </div>
                                    <a href="order.php">
                                    <h5 class="c-black mb-4 mt-n1">Buy now</h5>
                                    <h2><i class="zmdi zmdi-shopping-basket"></i></h2>
                                    </a>
                                    <!-- <div class="socials">
                                        <a href="#" class="zmdi zmdi-facebook"></a>
                                        <a href="#" class="zmdi zmdi-twitter"></a>
                                        <a href="#" class="zmdi zmdi-google"></a>
                                        <a href="#" class="zmdi zmdi-instagram"></a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </form>

</div>


<?php

if(isset($_POST['signin'])){

include('dbcon.php');
$dbpass = mysqli_query($link,"SELECT `password`,username from customer where email='$_POST[email]' ");
$hpass=mysqli_fetch_array($dbpass);
if(password_verify($_POST['password'],$hpass['password'])){
$_SESSION['email']=$_POST['email'];
$_SESSION['password']=$hpass['password'];
$_SESSION['user']=$hpass['username'];

$query = mysqli_query($link,"SELECT `cid`,`order_id`,`username` as `cname`,`order_name`,`quantity` from `order`, customer where email='$_POST[email]' and `password`='$hpass[password]' and `cid`=`id`  ;");
if((mysqli_num_rows($query)>0)){
echo "<center>";
echo "<table class='table container' style='background:rgba(0,0,0,0.6);color:#fff;backdrop-filter:blur(20px);' border='5'>

<tr>
<th>Order ID</th>  
<th>Name</th>
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
    // echo "<td>"; echo $row["status"]; echo "</td>";
    echo "</tr>";
    $count= $count+1;
}
$status= mysqli_query($link,"SELECT sum(amount) as `amount`,`status` from `payment` where `id`='$id'; ");
while($row=mysqli_fetch_array($status)){
$total=$row['amount'];
$sts=$row['status'];
}
echo "<div class='status'>";
echo "<h1 x>Total: ₹$total </h1>";
echo "<h2>$sts</h2>";
echo "</div>";
}//numrows
else{
  echo "<br><br><h3 style='text-align:center;color:#62C7F1;font-weight:700;text-shadow:0 0 5px #444;'>Your cart is empty!</h3>";
}
}//if password_verify
else{
  echo "<br><br><h3 style='text-align:center;color:#fff;font-weight:700;text-shadow:0 0 5px #444;'>Try again!</h3>";
}//else
}//isset(login)




?>
<style>
  body{
background-image: -webkit-gradient(linear, left top, right top, from(#4e63d7), to(#76bfe9)) !important;
    background-image: linear-gradient(to right, #4e63d7 0%, #76bfe9 100%) !important;
    margin-top:20px;}

/* ===== LOGIN PAGE ===== */
.login-box {
  -webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
          box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

@media (min-width: 992px) {
  .login-box {
    margin: 40px 0;
  }
}

.login-box .form-wrap {
  padding: 30px 25px;
  border-radius: 10px;
  -webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
          box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
}

@media (min-width: 768px) {
  .login-box .form-wrap {
    padding: 45px;
  }
}

@media (min-width: 992px) {
  .login-box .form-wrap {
    margin-top: -40px;
    margin-bottom: -40px;
    padding: 60px;
  }
}

.login-box .socials a {
  -webkit-box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
          box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
}

.login-section {
  position: relative;
  z-index: 0;
}

.login-section::after {
  position: absolute;
  content: '';
  right: 0;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0.15;
  z-index: -1;
  background-image: url(../img/shapes/login-wave2.svg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: top right;
  -webkit-animation-duration: 3s;
          animation-duration: 3s;
  -webkit-animation-direction: alternate;
          animation-direction: alternate;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-name: pulse;
          animation-name: pulse;
}

.login-section::before {
  position: absolute;
  content: '';
  opacity: 0.10;
  right: 0;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background-image: url(../img/shapes/login-wave1.svg);
  background-size: cover;
  background-position: top right;
  -webkit-animation-duration: 6s;
          animation-duration: 6s;
  -webkit-animation-direction: alternate;
          animation-direction: alternate;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-name: pulse;
          animation-name: pulse;
}

.login-section .content {
  padding: 45px;
}

.form-group .zmdi {
    position: absolute;
    z-index: 1;
    color: #fff;
    background-color: #4e63d7;
    border-radius: 5px;
    height: 100%;
    width: 45px;
    text-align: center;
    font-size: 20px;
    padding-top: 13px;
}

.form-group input[type='text'], .form-group input[type='email'], .form-group input[type='password'] {
    padding-left: 60px;
}

.form-control {
    border: 1px solid #e1e1e1;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 5px;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    background-color: #fff;
    color: #858585;
    font-weight: 400;
    position: relative;
}






.login-box .socials a {
    -webkit-box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.12);
}
.socials a {
    width: 35px;
    height: 35px;
    background-color: #6893e1;
    border-radius: 50%;
    -webkit-box-shadow: 0 3px 2px 0 #516cd9;
    box-shadow: 0 3px 2px 0 #516cd9;
    text-align: center;
    color: #fff;
    padding-top: 10px;
    font-size: 16px;
    margin-right: 10px;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
    
    
    
</style>

</body>
</html>
