<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
    
<form method="post" class="d-flex justify-content-center" action="">
  <div class="form-row align-items-center">
    <div class="col-md-5 my-1">
      <label class="sr-only" for="inlineFormInputName">Name</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="email" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
      </div>
    </div>
    <div class="col-md-5 my-1">
      <label class="sr-only" for="inlineFormInputGroupUsername">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="password" name="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="Password">
      </div>
    </div>
    <div class="col-auto my-1">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php

include('dbcon.php');
if(isset($_POST['submit'])){
$dbpass = mysqli_query($link,"SELECT `password`,`username`,`id` from customer where email='$_POST[email]' ");
while($row=mysqli_fetch_array($dbpass)){
    $pass=$row['password'];
    $user=$row['username'];
    $id=$row['id'];
}
if(password_verify($_POST['password'],$pass)){


$query = mysqli_query($link,"SELECT * from `order`,`payment` where `cid`='$id' and id=cid ");

echo "<center>";
echo "<table class='table' >

<tr>
<th>Order ID</th>
<th>Address</th>  
<th>Type</th>
<th>Quantity</th> 
<th>Amount(₹)</th>
<th>Status</th>
</tr>";
echo "</center>";

$count=0;
while($row=mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td>"; echo $row["order_id"]; echo "</td>";
    echo "<td>"; echo $row["address"]; echo "</td>";
    echo "<td>"; echo $row["order_name"]; echo "</td>";
    echo "<td>"; echo $row["quantity"]; echo "</td>";
    echo "<td>"; echo $row["amount"]; echo "</td>";
    echo "<td>"; echo $row["status"]; echo "</td>";
    echo "</tr>";
    $count= $count+1;
}
$status= mysqli_query($link,"SELECT sum(amount) as `amount` from `payment` where `id`='$id' and `status`='Not Paid' ");
while($row=mysqli_fetch_array($status)){
$total=$row['amount'];
}
echo "<div class='status'>";
echo "<h1>Total Due : ₹$total </h1>";
echo "</div>";

}//pass verify
else{
    echo "<h2>Password doesn't matched!</h2>";
}
}//isset submit
?>

</div>   
</body>
</html>
