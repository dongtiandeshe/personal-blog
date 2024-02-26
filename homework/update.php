<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    form{
        width: 80%;
        height: 100%;
        margin: 20px auto;
        background-color: white;
        box-shadow: 5px 5px 10px rgb(201, 191, 191);
    }
    span{
        display: block;
        font-size: 30px;
        background-color: white;
        margin: 20px;
    }
    .intitle{
        height:50px;
        width: 400px;
        margin-left: 20px;
        font-size: 20px;
        border: none;
    }
    .incontent{
        display: block;
        height: 500px;
        width: 80%;
        margin-left: 20px;
        resize: none;
        font-size: 30px;
        line-height: 1.5;
        /* margin: 0px auto; */
    }
    .btn{
        height: 50px;
        width: 100px;
        margin: 20px;
        border: 1px solid gray;
        background-color: rgba(30, 117, 205, 0.787);
        border-radius: 5px;
    }
</style>
<body>
<?php
        require "dbconnection.php";
        if (!isset($_SESSION)){
            session_start();
        } 
    ?>
    <div class="publish">
        <div class="top">
        <a href="user.php" style="float:left ;"><?php echo $_SESSION["username"]; ?></a>
        <a href="index.php">首页</a>
        </div>
        <form action="" method="post">
            <span class="title">标题</span>
            <input type="text" name="title" class="intitle">
            <span class="content">内容</span>
            <textarea rows="5" cols="20" class="incontent" name="content"></textarea>
            <input type="submit" value="修改" class="btn" name="update">
        </form>
    </div>
    <?php 
    
    if (isset($_POST["update"])) {
        if ($_POST["title"]=="") {
            echo "<script>alert('标题不能为空')</script>";
        }else{
            $title = $_POST["title"];
            $content = $_POST["content"];
            $bid = $_GET['bid'];
            $blogupdate = date("Y-m-d");
            $sql = "UPDATE blog SET blogupdate='$blogupdate',blogtitle='$title',blogcontent='$content' WHERE blogid='$bid'";
            mysqli_query($db_link,$sql);
            mysqli_close($db_link);
            echo "<script>alert('修改成功，返回首页')</script>";
            echo "<script>location.href='index.php'</script>";
        }
        
    }
        
    ?>
</body>
</html>