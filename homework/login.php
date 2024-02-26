<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
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
    button{
        height: 50px;
        width: 400px;
        margin-top: 50px;
        border: 1px solid gray;
        border-radius: 5px;
        background-color: rgba(30, 117, 205, 0.787);
    }
</style>
<body>
    <!-- 个人博客 -->
    <!-- 用户登录 -->
    <!-- 用户注册 -->
    <!-- 发表博客 -->
    <!-- 更新博客 -->
    <!-- 删除博客 -->
    <div class="login">
        <div class="top">
            个人博客
            <a href="register.php">注册</a>
        </div>
        <div class="form">
            <span>登录到您的账号</span>
            <form action="" method="post">
                <input type="text" name="username" placeholder="请输入用户名">
                <input type="password" name="password" id="" placeholder="请输入密码">
                <input type="submit" name="login" value="登录" style="background-color:rgba(30, 117, 205, 0.787) ;">
            </form>
        </div>
    </div>
    <?php
    require "dbconnection.php";
    header('Content-Type:text/html;charset=utf-8');
    session_start();
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            // echo $username.$password;
            if(($username == '') || ($password == '')){
                //若为空则视为未填写返回login.html页面
                echo "<script>alert('用户名或密码不能为空')</script>";
                echo "<script>location.href='login.php'</script>";
                exit;
            }else{
                //若不为空则判断和账号密码是否存在于数据库中
                $sql = "select * from user where username = '$username'"; //构造查询账号密码语句
                $result = $db_link ->query($sql);
                $row = mysqli_fetch_assoc($result); 
                    if(($username != $row['username']) || ($password != $row['userpassword'])){
                    //账号密码错误的情况下 同样和空处理一样
                    echo "<script>alert('用户名或密码错误')</script>";
                    echo "<script>location.href='login.php'</script>";
                    exit;
                }elseif($password==$row['userpassword']){
                    //用户名和密码都正确，将用户名信息存到Session中
                    $_SESSION['username'] = $username;
                    echo "<script>alert('登录成功!')</script>";
                    echo "<script>location.href='index.php'</script>";
                }
        }
    }
        
    ?>
   

</body>

</html>