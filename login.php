
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form action="" method="post">
  <div class="form-group col-sm-4">
  <h2>Enter Admin Details:</h2>
    </div>
    <div class="form-group col-sm-4">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter admin name" name="name">
    </div>
    <div class="form-group col-sm-4">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter admin password" name="pswd">
    </div>
    <div class="form-group col-sm-4">
    <input type="submit" name="submit" class="btn btn-primary" value="Submit"></input>      
  </div>
  </form>
  <?php


$uname='admin';
$pass='admin';

if(isset($_POST['submit'])){
    if($_POST['name']===$uname && $_POST['pswd']===$pass){
        header("Location: admin.php");
    }
    else{
        echo "<b>Wrong entry!</b>";
    }
}


?>
</div>
<style>
  *{
    margin: 0;
    padding: 0;
  }
  body{
    background: #555;
    display: flex;
    justify-content: center;
    align-items: center ;
    color: #fff;
  }
</style>
</body>
</html>
