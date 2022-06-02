<?php
include('dbcon.php');
$id=$_GET['id'];
$pid=$_GET['pid'];
$check=mysqli_query($link,"SELECT `status` from payment where pid='$pid'");
$arr=mysqli_fetch_array($check);
$status=$arr['status'];
if($status=="Paid"){
    $update_status1=mysqli_query($link,"UPDATE payment set status ='Not Paid' where pid = '$pid' ");

}
else{
$update_status=mysqli_query($link,"UPDATE payment set status ='Paid' where pid = '$pid' ");
}

?>
<script>
    window.location.href="edit.php?id=<?=$id;?>";
</script>

<?php
?>