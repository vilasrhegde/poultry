
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Sign Up</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="username" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" name="uname" placeholder="Create Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Create password">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="num">Phone:</label>
      <input type="number" class="form-control" id="num" name="phone" placeholder="Enter Phone No.">
    </div>
    <div class="form-group">
      <label for="add">Address:</label>
      <input type="text" class="form-control" id="add" name="address" placeholder="Address">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Sign up"></input>
    <a href="userlogin.php" style="position: relative;margin:30px;">Login</a>
<br><br><br><br><hr>
  </form>


</div>

</body>
<?php
$link = new mysqli("localhost","root",'','poultry_db');

if(isset($_POST['submit'])){
    $query= mysqli_query($link,"INSERT INTO `customer`(`id`,`cname`,`username`,`password`,`email`,`phone`,`address`) 
    VALUES (NULL,'$_POST[username]','$_POST[uname]','$_POST[password]','$_POST[email]',$_POST[phone],'$_POST[address]');");
    

    ?>
<script>
  window.location.href="userlogin.php";
</script>


<?php
}









?>
</html>
