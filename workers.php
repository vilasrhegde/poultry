<?php
$link = new mysqli("localhost","root","","poultry_db");
$wrk=mysqli_query($link,"SELECT * from worker");

echo "<center>";
echo "<table class='table' border='5'>

<tr>
<th>#</th>
<th>Name</th>  
<th>Type</th>
</tr>";
echo "</center>";
while($w=mysqli_fetch_array($wrk)){
  echo "<tr>";
  echo "<td>"; echo $w["worker_id"]; echo "</td>";
  echo "<td>"; echo $w["wname"]; echo "</td>";
  echo "<td>"; echo $w["type"]; echo "</td>";
  echo "</tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Workers details</title>
</head>
<body>
    
</body>
</html>