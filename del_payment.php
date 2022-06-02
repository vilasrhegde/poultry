<?php
include('dbcon.php');
$id=$_GET['id'];
$pid=$_GET['pid'];
$check=mysqli_query($link,"DELETE from `payment` where pid='$pid'");

?>
<script>
    window.location.href="edit.php?id=<?=$id;?>";
</script>

<?php
?>