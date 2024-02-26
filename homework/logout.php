<?php
header('Contet-type:text/html; charset=utf-8');
//注销后的操作
session_start();
//清楚session
$username = $_SESSION['username']; //用于后面的提示信息
$_SESSION = array();
session_destroy();
//提示信息
echo "期待下次登录,".$username.'<br>';
echo "<a href='login.html'>重新登录</a>";
header("Location: login.php");
?>
