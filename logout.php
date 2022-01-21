<?php


session_start();

// if(isset($_SESSION['user_id']))
// {
//     unset($_SESSION['user_id']);
// }
unset($_SESSION["No user"]);
session_unset();
session_destroy();
header("Location: userlogin.php");
die;





?>