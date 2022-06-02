<?php
include('dbcon.php');
mysqli_select_db($link, "poultry_db") or die(mysqli_error($link));
$id=$_GET["id"];
mysqli_query($link, "DELETE from `customer` where `id`=$id");
?>

<script type="text/javascript">
    window.location="admin.php";
</script>

