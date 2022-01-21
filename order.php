<?php
session_start();
if($_SESSION['status']=='Seccess'){
  echo "";
}
else{
  header("location: userlogin.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Order items</title>
</head>
<body>
    <nav>
    <h1>Explore your needs! <font color=green;> <?=$_SESSION['user'];?> </font></h1>
    <div class="options">
    <a onclick=cart_show()  >Cart 🛒</a>
    <a href="logout.php">Logout</a>
    </div>

    </nav>

<!--------------------------------------------------------------------->
<div id="drop"> 
<div class="container" id="user" onclick=cart_hide()>
    <h2>Enter Your Details:</h2>
  <form action="" method="post">
    <div class="form-group ">
      <label for="name">Username:</label>
      <input  disabled type="text" class="form-control" id="name" placeholder="Enter username" value="<?php echo $_SESSION['user'];  ?>" name="uname" required >
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input disabled  type="password" class="form-control" id="pwd" placeholder="Enter password" value="<?php echo $_SESSION['password']; ?>" name="pswd" required >
    </div>
    <br>
  <h2>Buy the things you want!</h2>
    <div class="form-group">
      <label for="sell">Select category</label>
      <select class="form-control" name="type"  id="sell" >
        <option>Meat</option>
        <option>Egg</option>
        <option>Sliced</option>
        <option>Chicken</option>
      </select>
      <br>
    </div>
    <div class="form-group">
      <label for="qty">Quantity:</label>
      <input type="number" name="qty" class="form-control" id="qty" required>
    </div>
    <div class="form-group">
      <label for="add">Address:</label>
      <input type="text" name="add" class="form-control" id="add" required>
    </div>
    <br>
    <input class="btn btn-block btn-success" style="background-color:springgreen;"  type="submit" name="order" value="Order" onclick="show()">
   <br> <a href="./signup.php">New user?</a>
  </form>
</div>
</div>

<style>

    #drop{
        display: flex;
        top: -100%;
        z-index: 100;
    }
    #user{
        display: flex;
        flex-direction: column;
        position: absolute;
        height: 100vh;
        overflow: scroll;
        background: rgba(0,0,0,0.4);
        backdrop-filter: blur(10px);
        color: #fff;
        font-size: 20px;
        transition: .5s;
        z-index: 100;
        left: -100%;
        width: 50%;
        justify-content: center;
        align-items: center;
        
    }
    #user h2{
        font-size: 30px;
        font-weight: 900;
        color: #fff;
        text-shadow: 0 5px 4px black;
    }
    a{
        text-align: center;
        color: #fff;
        text-decoration: none;
        transition: .3s;
    }
    a:hover{
        color:#fff;
        text-decoration: none;
        letter-spacing: 2px;
    }
    #user input{
        background-color: rgba(255,255,255,0.6)
    }
    #user input:focus{
        background: #fff;
    }
</style>
</body>

<?php
$link = new mysqli("localhost","root",'',"poultry_db");
$uname="";
$pass="";

$amt="";
$avail="";
$pr=mysqli_query($link,"SELECT * from `price`");

while($row=mysqli_fetch_array($pr)){
    $chik=$row['chicken'];
    $mt=$row['meal'];
    $sl=$row['sliced'];
    $eg=$row['egg'];
}



$qry1=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='chicken';");
$qry2=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='meat';");
$qry3=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='sliced';");
$qry4=mysqli_query($link," SELECT `available` FROM `type` WHERE `item_name`='egg';");

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
if(isset($_POST['order'])){
  
    
    $query= mysqli_query($link, "SELECT * from `customer` where `username`='$_SESSION[user]' and `password`='$_SESSION[password]' ");

    while($row=mysqli_fetch_array($query)){
        $uname=$row['username'];
        $pass=$row['password'];
        $cid=$row['id'];

    }

               $qty=$_POST['qty'];
               if($_POST['type']== 'Chicken'){
                 $amt=$chik * $qty;
                 $avail=$chick - $qty;
                 $upd= mysqli_query($link,"UPDATE `type` SET `available`='$avail' where `item_id`=1 ");
               }
               if($_POST['type'] == 'Sliced'){
                 $amt=$sl * $qty;
                 $avail=$sliced - $qty;
                 $upd= mysqli_query($link,"UPDATE `type` SET `available`='$avail' where `item_id`=2 ");
               }
               if($_POST['type']== 'Meat'){
                 $amt=$mt * $qty;
                 $avail= $meat - $qty;
                 $upd= mysqli_query($link,"UPDATE `type` SET `available`='$avail' where `item_id`=3 ");
               }
               if($_POST['type']== 'Egg'){
                 $amt=$eg * $qty;
                 $avail=$egg - $qty;
                 $upd= mysqli_query($link,"UPDATE `type` SET `available`='$avail' where `item_id`=4 ");
               }
               echo "<b>Total amount = ". $amt . "</b>";
    $ins=mysqli_query($link, "INSERT INTO `order`(`order_id`, `cid`, `quantity`, `address`,`order_name`) 
    VALUES (NULL,'$cid','$qty','$_POST[add]','$_POST[type]')");
    $pri=mysqli_query($link,"INSERT INTO `payment`(`id`, `cname`, `type`, `quantity`, `amount`) 
    VALUES ('$cid','$uname','$_POST[type]','$qty','$amt')");

      ?>
      <script>
          window.location.href="order.php";
      </script>
      <?php
  

}
   
?>
    <!--------------------------------DROPDOWN---------------------------------->


<p>
    <?php

?>
</p>
    <br><br>
    <div class="container"  onclick=cart_hide() ondblclick="hidedrag()">
        <div class="imgholder" >
       <img onclick="dragdown()" src="./images/meatdec.jpg" alt="Meat" >
        <h3>Meat</h3>
        <h4><?php  echo "₹" . $mt ; ?></h4>
        <h5>Available: <?php echo $meat;?></h5>
        </div>
        <div class="imgholder">
       <img onclick="dragdown()"  src="./images/egg.jpg" alt="Egg">
        <h3>Egg</h3>
        <h4><?php  echo "₹" . $eg ; ?></h4>
        <h5>Available: <?php echo $egg;?></h5>
        </div>
        <div class="imgholder">
       <img onclick="dragdown()" src="./images/slice.jpg" alt="Sliced">
        <h3>Sliced</h3>
        <h4><?php  echo "₹" . $sl ; ?></h4>
        <h5>Available: <?php echo $sliced;?></h5>
        </div>
        <div class="imgholder">
      <img onclick="dragdown()" src="./images/chicken.jpg" alt="Chicken">
        <h3>Chicken</h3>
        <h4><?php  echo "₹" . $chik ; ?></h4>
        <h5>Available: <?php echo $chick;?></h5>
        </div>
    </div>
    <script>
        function dragdown(){
            document.getElementById('user').style.display='flex';
            document.getElementById('user').style.left='0';
            document.getElementById('user').style.transition='.5s';
        }
        function hidedrag(){
            document.getElementById('user').style.display='none';
            document.getElementById('user').style.left='-100%';
        }
    </script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');
        body{
            font-family: 'Outfit', sans-serif;
            overflow-y: scroll;
            margin: 0;
            border: 0;
            padding: 0;
            user-select: none;
            scroll-behavior: smooth;
        }
        .container{
            display: flex;
            width: 100%;
            max-height: 100vh;
            height: auto;
            justify-content: center;
            align-items: center;
            padding: 2% 2%;
            
        }
        h1{
            text-shadow: 0 4px 4px rgba(255,255,255,0.4);
            font-weight: 700;
            font-size: 25px;
        }
        .imgholder{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
      
        }
        .imgholder h3{
            font-size: 25px;
            font-weight: 700;
        }
        img{
            object-fit: cover;
            max-width: 300px;
            position: relative;
            border-radius: 5px;
            box-shadow: 0 0 10px 7px rgba(0,0,0,0.4);
            margin: 20px;
            padding: 5px;
            height: auto;
            width: auto;
            transform: scale(1);
            transition: .3s;
        }
        img:hover{
            transform: scale(1.1);
        }
        nav{
            display: flex;
            background: #000;
            color: #fff;
            align-items: baseline;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            margin: 0 auto;
        }
        .options{
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        a{
            text-decoration: none;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin: 0 20px;
        }
        nav h1{
            margin-left: 5%;
        }

        @media (max-width:1000px){
            .container{
                flex-direction: column;
                width: 100%;
                margin: 20px;
                justify-content: center;
                overflow-y: visible;
                height: auto;
            }
            img{
                margin: 5%;
                padding: 20px;
            }
            nav{
                z-index: 100;
            }
        }
        ::-webkit-scrollbar{
          display: none;
        }

        .cart_container{
          display: none;
          flex-direction: column;
          z-index: 100;
          position: absolute;
          top: 10%;
          right: 3%;
          background: linear-gradient(rgba(255,255,255,0.5),rgba(255,255,255,0.2));
          backdrop-filter: blur(10px);
          width: 40%;
          height: 100%;
          padding: 15px;
          border-radius: 20px;
          transition: .4s;
          max-height: 70vh;
          overflow: scroll;
        }
    </style>

<div class="cart_container" id="cart">

<?php


$link = new mysqli("localhost","root",'',"poultry_db");

$query = mysqli_query($link,"SELECT cid,`order_id`,`cname`,`order_name`,`quantity` from `order`, customer where  username='$_SESSION[user]' and `password`='$_SESSION[password]'  and cid=id ;");

echo "<center>";
echo "<table class='table' style='background:rgba(0,0,0,0.6);color:#fff;backdrop-filter:blur(20px);' border='5'>

<tr>
<th>Order ID</th>
<th>Customer name</th>  
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
    echo "</tr>";
    $count= $count+1;
}
$status= mysqli_query($link,"SELECT sum(amount) as `amount`,`status` from `payment` where `id`='$id'; ");
while($row=mysqli_fetch_array($status)){
$total=$row['amount'];
$sts=$row['status'];
}
echo "<div class='status'>";
echo "<h1>Total: ₹$total </h1>";
echo "<h2>$sts</h2>";
echo "</div>";

?>
</div>   
<script>
    function cart_show(){
            document.getElementById('cart').style.display='flex';
            document.getElementById('cart').style.right='0';
            document.getElementById('cart').style.transition='.5s';
        }
        function cart_hide(){
            document.getElementById('cart').style.display='none';
            document.getElementById('cart').style.right='0';
            document.getElementById('cart').style.transition='.5s';
        }

</script>
 
</body>
</html>