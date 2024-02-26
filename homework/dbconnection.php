<?php  

$server = "localhost";
$db_username = "root";
$db_passwd = "";
$dbname = "php";
$db_link =  mysqli_connect($server,$db_username,$db_passwd,$dbname);
    //连接失败
    if(!$db_link){
        die("Can't connect to MySQL Server.Errorcode:" . mysqli_connect_error());
    }
     //设置数据库编码
    mysqli_query($db_link,"SET NAMES 'utf8'"); 
