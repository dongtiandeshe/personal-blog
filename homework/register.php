<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
</head>
<body>
<div class="register">
        <div class="top">
            个人博客
            <a href="login.php">登录</a>
        </div>
        <div class="form">
            <span>开始体验吧</span>
            <form action="" method="post">
                <input type="text" name="username" placeholder="请输入用户名">
                <input type="password" name="password" id="" placeholder="请输入密码">
                <input type="submit" name="register" value="注册" style="background-color:rgba(30, 117, 205, 0.787) ;">
            </form>
        </div>
    </div>
    <?php
    require "dbconnection.php";
    header('Content-type:text/html;charset=utf-8');
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select username from user where username = '$username'";
        $result = mysqli_query($db_link,$sql);
        $row = mysqli_fetch_assoc($result);
        //判断用户名和密码是否为空
        if(($username == '') || ($password == '')){
            echo "<script>alert('用户名或密码为空')</script>";
        }else{
        //判断用户名是否存在
            if($username == $row['username']){
                echo "<script>alert('用户名.$username.已经存在!请重新注册')</script>";
            
            }else{
                //用户名不存在 将注册的账号密码加入数据库
                $sql_insert = "insert into user(username,userpassword) values('$username','$password')";
                mysqli_query($db_link,$sql_insert);
                echo "<script>alert('注册成功，去登录吧!')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        }
    }
    
    ?>
   
</body>
<style>
    *{
        margin: 0px;
        padding: 0px;
        background-color: rgb(246, 246, 246);
    }
    .top{
        height: 50px;
        background-color: black;
        color: white;
        line-height: 50px;
        text-indent: 20px;
    }
    .top a{
        background-color: black;
        float: right;
        text-decoration: none;
        color: white;
    }
    .form{
        position: absolute;
        height: 500px;
        width: 400px;
        top: 50%;
        left: 50%;
        margin-left: -200px;
        margin-top: -250px;
        /* background-color: rgb(91, 136, 174); */
    }
    .form span{
        display: block;
        font-size: 30px;
        text-align: center;
        /* margin-bottom: 20px; */
    }
    .form input{
        height: 50px;
        width: 400px;
        margin-top: 50px;
        border: 1px solid gray;
        background-color: white;
        border-radius: 5px;
    }
</style>
</html>