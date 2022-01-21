<?php
$link = new mysqli("localhost","root",'',"poultry_db");

$qry1=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='chicken';");
$qry2=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='meat';");
$qry3=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='sliced';");
$qry4=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='egg';");

$pr=mysqli_query($link,"SELECT * FROM `price`");

while($row=mysqli_fetch_array($qry1)){
  if($row['available']>=0){
    $chick=$row['available'];
  }else{
    $chick=0;
  }
}
while($row=mysqli_fetch_array($qry2)){
  if($row['available']>=0){
    $meat=$row['available'];
  }else{
    $meat=0;
  }
}
while($row=mysqli_fetch_array($qry3)){
  if($row['available']>=0){
    $sliced=$row['available'];
  }else{
    $sliced=0;
  }

}
while($row=mysqli_fetch_array($qry4)){
  if($row['available']>=0){
    $egg=$row['available'];
  }else{
    $egg=0;
  }
}

while($row=mysqli_fetch_array($pr)){
  if($row['chicken']>=0){
    $ch=$row['chicken'];
  }
  else{
    $ch=0;
  }
  if($row['meal']>=0){
    $me=$row['meal'];
  }
  else{
    $me=0;
  }
  if($row['sliced']>=0){
    $sl=$row['sliced'];
  }
  else{
    $sl=0;
  }
  if($row['egg']>=0){
    $eg=$row['egg'];
  }
  else{
    $eg=0;
  }
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hi, Admin!</title>
</head>
<body>
  <nav>
  <a href="index.html"><h3>Welcome back : )</h3></a>
  <div class="tags">
  <a href="#view">Customers</a>
  <a href="workers.php">Workers</a>
  </div>

  </nav>
    <!-- <div id="top"><a href="#bottom">Bottom</a></div> -->

<div class="container"  >
  <h2>Enter Workers Details:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Workor's name" name="wname" required >
    </div>
    <br>
    <div class="form-group">
      <label for="ty">Type:</label>
      <input type="text" class="form-control" id="ty" placeholder="Enter Role" name="role" required> 
    </div>
    <br>
    <input type="submit" name="worker" class="btn btn-primary btn-block" style="background: #222;" value="Submit"></input>
    <br>
  </form>
</div>
<br>
<div class="container"  >
  <h2>Update Stocks:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="chick">For Chicken:</label>
      <input type="number" class="form-control" id="chick" placeholder="Enter quantity" name="chicken" value=<?php echo $chick ?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="sliced">For Sliced:</label>
      <input type="number" class="form-control" id="sliced" placeholder="Enter quantity" name="sliced" value=<?php echo $sliced ?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="meat">For Meat:</label>
      <input type="number" class="form-control" id="meat" placeholder="Enter quantity" name="meat" value=<?php echo $meat ?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="egg">For Egg:</label>
      <input type="number" class="form-control" id="egg" placeholder="Enter quantity" name="egg" value=<?php echo $egg ?>>
    </div>
    <br>
    <br>
    <input type="submit" name="update" class="btn btn-primary btn-block" style="background: #222;" value="Update"></input>
    <br>
  </form>
</div>
<br>
<div class="container"  >
  <h2>Update Prices:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="chick">For Chicken:</label>
      <input type="number" class="form-control" id="chick" placeholder="Enter Price per item" name="chicken" value=<?php echo $ch; ?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="sliced">For Sliced:</label>
      <input type="number" class="form-control" id="sliced" placeholder="Enter Price per item" name="sliced" value=<?php echo $sl; ?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="meat">For Meat:</label>
      <input type="number" class="form-control" id="meat" placeholder="Enter Price per item" name="meat" value=<?php echo $me ;?>>
    </div>
    <br>
    <div class="form-group ">
      <label for="egg">For Egg:</label>
      <input type="number" class="form-control" id="egg" placeholder="Enter Price per item" name="egg" value=<?php echo $eg ;?>>
    </div>
    <br>
    <br>
    <input type="submit" name="rate" class="btn btn-primary btn-block" style="background: #222;" value="Update  "></input>
    <br>
  </form>
</div>
<br>
<div id="view">

</div>

<?php
$link = new mysqli("localhost","root",'',"poultry_db");

if(isset($_POST['update'])){
    $upd=mysqli_query($link,"UPDATE `type` SET `available`='$_POST[chicken]' where `item_id`=1 ");
    $upd1=mysqli_query($link,"UPDATE `type` SET `available`='$_POST[sliced]' where `item_id`=2 ");
    $upd2=mysqli_query($link,"UPDATE `type` SET `available`='$_POST[meat]' where `item_id`=3 ");
    $upd3=mysqli_query($link,"UPDATE `type` SET `available`='$_POST[egg]' where `item_id`=4 ");    

    ?>
    <script>
        window.location.href="admin.php";
        </script>
    <?php
}

if(isset($_POST['worker'])){
        $wrk=mysqli_query($link,"INSERT INTO `worker`(`worker_id`, `wname`, `type`) VALUES (NULL,'$_POST[wname]','$_POST[role]');");
        header("Location: admin.php");
}

if(isset($_POST['rate'])){
    $ins=mysqli_query($link,"UPDATE `price` SET `chicken`='$_POST[chicken]',`meal`='$_POST[meat]',`sliced`='$_POST[sliced]',`egg`='$_POST[egg]' WHERE `id`=1");   
    ?>
    <script>
        window.location.href="admin.php";
        </script>
    <?php

}



$link = new mysqli("localhost","root",'',"poultry_db");
$query = mysqli_query($link,"SELECT * from `customer`");

echo "<center>";
echo "<table class='table' border='5'>

<tr>
<th>#</th>
<th>Customer name</th>  
<th>Username</th>
<th>Password</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Area</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
echo "</center>";

$count=0;

while($row=mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td>"; echo $row["id"]; echo "</td>";
    echo "<td>"; echo $row["cname"]; echo "</td>";
    echo "<td>"; echo $row["username"]; echo "</td>";
    echo "<td>"; echo $row["password"]; echo "</td>";
    echo "<td>"; echo $row["email"]; echo "</td>";
    echo "<td>"; echo $row["phone"]; echo "</td>";
    echo "<td>"; echo $row["address"]; echo "</td>";
    echo "<td>"; echo $row["area"]; echo "</td>";
    echo "<td>"; echo $row["date"]; echo "</td>";

    echo "<td>"; ?><a href="edit.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-success">Edit</button></a> <?php echo "</td>";
    echo "<td>"; ?><a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="text/javascript" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

    echo "</tr>";
    $count= $count+1;
}


?>
<!-- <div id="bottom"><a href="#top">Top</a></div> -->

<style>
    body{
        scroll-behavior: smooth;
    }
    #top,#bottom {
        position: absolute;
        right: 10px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #444;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    a{
        color: #fff;
        text-decoration: none;
    }
    a:hover{
        text-decoration: none;
        color: #fff;
    }
    nav{
        display: flex;
        align-items: center;
        justify-content:space-between;
        background: #222;
        color:silver;
        padding: 0 10px;
        position: fixed;
        width: 100%;
    }
    .tags{
      display: flex;
      justify-content: space-between;
    }
    nav a {
        font-size: 15px;
        margin-left: 20px;
        color: #fff;
    }
    h3{
      color: #888;
    }
</style>
</body>

</html>