<?php
$link=new mysqli("localhost","root","","poultry_farm");
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Prices</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br>
<form class="container" method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Chicekn</label>
    <input name="chicken" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter required quantity" required value="0">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Meat</label>
    <input name="meat" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter required quantity"  required value="0">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Egg</label>
    <input name="egg" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter required quantity" required value="0">
  </div>
  <br>
  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
</body>

<?php

if(isset($_POST['update'])){

    $query=mysqli_query($link,"UPDATE `price` SET `price`='$_POST[chicken]' WHERE pid=1");
    $query2=mysqli_query($link,"UPDATE `price` SET `price`='$_POST[meat]' WHERE pid=2");
    $query3=mysqli_query($link,"UPDATE `price` SET `price`='$_POST[egg]' WHERE pid=3");

    header("location: admin.php");
}

?>
</html>