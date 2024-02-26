<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户页面</title>
</head>
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
        font-size: 20px;
    }
    .top a{
        background-color: black;
        float: right;
        text-decoration: none;
        color: white;
    }
    .user{
        height: 678px;
        width: 100%;
        background-image:url(https://tse1-mm.cn.bing.net/th/id/R-C.2827a96e4679d4d5905a161ebaad7c20?rik=S2a3br3eBdGvNg&riu=http%3a%2f%2fimg.ewebweb.com%2fuploads%2f20190403%2f15%2f1554278373-tRzFZhblrn.jpg&ehk=R%2bH9rj7rA1kAG2buPLtkUAEqH8AXgi9Fc8H85lKEgiA%3d&risl=&pid=ImgRaw&r=0) ;
        background-repeat: no-repeat;
        background-size:100% 100%;
    }
    form{
        /* padding-top: 20px ; */
        position: absolute;
        top: 20%;
        left: 50%;
        margin-left: -200px;
        height: 400px;
        width: 400px;
        background-color: rgba(255, 255, 255,0.8);
        box-shadow:  5px 5px 10px rgb(184, 184, 184);
    }
    span{
        background-color: rgba(255, 255, 255,0);
        font-size: 20px;
        margin-left: 20px;
    }
    input{
        height: 40px;
        width: 200px;
        margin: 30px;
        border-radius: 10px;
        font-size: 15px;
    }
    .btn{
        display: block;
        margin: 20px auto;
        height: 50px;
        width: 100px;
        border: none;
        background-color: rgb(54, 191, 201);
    }
</style>
<body>
<?php
        require "dbconnection.php";
        if (!isset($_SESSION)){
            session_start();
        } 
    ?>
<div class="index">
        <div class="top">
            <?php echo $_SESSION["username"] ?>
            <a href="index.php">首页</a>
        </div>
        <div class="user">           
            <form action="" method="post">
                <span>用户名：</span><input type="text" name="username" value="<?php echo $_SESSION["username"] ?>" ><br>
                <span>密&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="password" id="" placeholder="请输入新密码">
                <input class="btn" type="submit" name="user" value="修改" >
            </form>           
        </div>     
    </div>
    <?php
        if(isset($_POST["user"])){
            $username = $_POST["username"];
            $passwd = $_POST["password"];
            if ($passwd == '') {
                echo "<script>alert('密码不能为空')</script>";
                echo "<script>location.href='user.php'</script>";
            }else{
                $sql = "UPDATE user SET userpassword=$passwd WHERE username='$username'";
                mysqli_query($db_link,$sql);
                // mysqli_close($db_link);
                echo "<script>location.href='index.php'</script>";
            }
        }
    ?>
</body>
</html>