<?php
include('dbcon.php');
date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$id =$_GET["id"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
</head>
<body>
<div class="container">
<a id="exit" href="admin.php">Exit</a>
<br><br>
<h1>Payment history </h1>
<?php

$sql = mysqli_query($link,"SELECT * from payment where id='$id'");
$count=0;
if(mysqli_num_rows($sql)>0){
echo "<table class='table  container' border='5'>

<tr>
<th>#</th>
<th>Payment ID</th>  
<th>Name</th>
<th>Type</th>
<th>Quantity</th> 
<th>Amount</th> 
<th>Status</th> 
<th>Delete</th>
</tr>";

while($row=mysqli_fetch_array($sql)){
  $count++;

  echo "<tr>";
    echo "<td>"; echo $count; echo "</td>";
    echo "<td>"; echo $row["pid"]; echo "</td>";
    echo "<td>"; echo $row["cname"]; echo "</td>";
    echo "<td>"; echo $row["type"]; echo "</td>";
    echo "<td>"; echo $row["quantity"]; echo "</td>";
    echo "<td>"; echo $row["amount"]; echo "</td>";


    echo "<td>"; ?>
  <a href="set_payment.php?pid=<?php echo $row["pid"]; ?>&id=<?=$id;?>">
    <button type="text/javascript" class="btn 
    <?php if($row['status']=="Paid"){
      echo "btn-success";
    }   
    else{
      echo 'btn-warning';
    }
    ?>">
    <?=$row['status'];?></button>
  </a> 
    <?php echo "</td>";

echo "<td>"; ?>
<a href="del_payment.php?pid=<?php echo $row["pid"]; ?>&id=<?=$id;?>">
  <button type="text/javascript" class="btn btn-danger">Delete</button>
</a> 
  <?php echo "</td>";



    echo "</tr>";



}
$sqll = mysqli_query($link,"SELECT sum(amount) as due from payment where id='$id' and `status`='Not Paid' ");
$s=mysqli_fetch_array($sqll);

?>
<h3>Total Dues = ₹<?=$s['due']?>.00</h3>
<?php
}//check rows
else{
  ?>
<h3>No records found for this user.</h3>
<?php
}
?>
</div>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
table{
  box-shadow: 0 0 6px 2px #999;
}
h1{
  text-shadow: 0 5px 5px #777;
}
#exit{
  text-decoration: none;
  color: #fff;
  background: #000;
  padding: 5px 10px;
  border-radius: 5px;
  position: absolute;
  right: 2%;
  top: 5%;
}
</style>
</body>

<?php
  


?>
</html>
