<?php
session_start();
if( $_SESSION['user']=='admin'){
    echo "";
}
else{
    header("location: index.php");
}
$link=new mysqli("localhost","root","","poultry_farm");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>
<body>
<?php
include('navbar.php');
?>

<table class="table" id="order_tb">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Price id</th>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Address</th> 
       <th scope="col">Date</th>

    </tr>
  </thead>
  <tbody>
    <?php

        $q1=mysqli_query($link,"SELECT * from orders");
        while($row=mysqli_fetch_array($q1)){
            echo "<tr>";
           echo "<td>"; echo $row["order_id"]; echo "</td>";
           echo "<td>"; echo $row["cid"]; echo "</td>";  
           echo "<td>"; echo $row["pid"]; echo "</td>";
           echo "<td>"; echo $row["order_type"]; echo "</td>";
           echo "<td>"; echo $row["quantity"]; echo "</td>";
           echo "<td>"; echo $row["address"]; echo "</td>";
           echo "<td>"; echo $row["order_date"]; echo "</td>";
           echo "</tr>";

        }
    ?>
  </tbody>
</table>

<br><br>

<table class="table table-dark" id="order_tb">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Price id</th>
      <th scope="col">Amount</th>
       <th scope="col">Date</th>

    </tr>
  </thead>
  <tbody>
    <?php

        $q1=mysqli_query($link,"SELECT * from payment");
        while($row=mysqli_fetch_array($q1)){
            echo "<tr>";
           echo "<td>"; echo $row["c_id"]; echo "</td>";  
           echo "<td>"; echo $row["p_id"]; echo "</td>";
           echo "<td>"; echo $row["amount"]; echo "</td>";
           echo "<td>"; echo $row["p_date"]; echo "</td>";
           echo "</tr>";
        }
    ?>
  </tbody>
</table>



</body>
</html>