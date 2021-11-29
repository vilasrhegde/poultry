<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hi, User!</title>
</head>
<body>
    <h1>Welcome back : )</h1>
<?php
$link = new mysqli("localhost","root",'',"poultry_db");

$query = mysqli_query($link,"SELECT * from `customer` where ");

echo "<center>";
echo "<table class='table' border='5'>

<tr>
<th>#</th>
<th>Customer name</th>  
<th>username</th>
<th>Password</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Area</th>
<th>Date</th>
</tr>";
echo "</center>";

$count=0;
while($row=mysqli_fetch_array($query))
{
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
</body>
</html>