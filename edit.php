<?php
$link = new mysqli("localhost","root",'',"poultry_db");
date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$id =$_GET["id"];
$name="";
$amount="";
$staus="";
$type="";
$res = mysqli_query($link, "SELECT id,cname,sum(amount) as amount,`status`,type from payment where `id`=$id");

while($row=mysqli_fetch_array($res))
{
    $name=$row['cname'];
    $amount=$row['amount'];
    $staus=$row['status'];
    $type=$row['type'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="form-group">
    <form action="" method="post">
        <h1 style="text-align: center;font-weight:900;">Edit entries:</h1>
      <br>
   
      <div class="col-sm-12">
      <label for="firstname">Name:</label>
      <input disabled type="text" class="form-control" id="firstname" placeholder="Enter First name" name="firstname" value="<?php echo
      $name ?>">
      </div>  <br>
      <div class="col-sm-12">
      <label for="type">Type:</label>
      <input required type="text" class="form-control" id="type" placeholder="Enter Order Type" name="type" value="<?php echo
      $type ?>">
      </div>  <br>
      <div class="col-sm-12">
      <label for="amount">Amount:</label>
      <input required type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount" value="<?php echo
      $amount ?>">
      </div>  <br>
      <div class="col-sm-12">
      <label for="status">Status:</label>
      <input required type="text" class="form-control" id="status" placeholder="Enter Status" name="status" value="<?php echo
      $staus ?>"><br>
      </div>  <br>

      <input type="submit" name="update" class="btn btn-block btn-warning" value="Update">
    </form>
</div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
</style>
</body>
<?php

if(isset($_POST["update"]))
{
    
     $update=mysqli_query($link,"UPDATE `payment` set `status` = '$_POST[status]', `amount`= '$_POST[amount]' where `id`='$id' and `type`='$_POST[type]' ");
?>
<script type="text/javascript">
window.location="admin.php";

</script>

<?php
}

?>
</html>
