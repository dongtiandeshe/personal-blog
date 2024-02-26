<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博客</title>
</head>
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
        <form action="" method="POST">
            <?php 
                $bid = $_GET['bid'];
                $sql = "SELECT * FROM  blog WHERE  blogid='$bid'";
                $result = $db_link ->query($sql);
                $blog = mysqli_fetch_assoc($result);
            ?>
            <div class="title">
                <?php echo  $blog["blogtitle"]    ?>      
            </div>
            <div class="date">
                发表于：<?php echo  $blog["blogdate"]   ?><br>
                更新于：<?php echo  $blog["blogupdate"]   ?>
            </div>
            <div class="content">
                <?php echo  $blog["blogcontent"]    ?>
            </div>
            <button class="btn"><a href="<?php echo "update.php?bid=".$bid ?>">修改博客</a></button>
            <input type="submit" value="删除该博客" name="del" class="btn">      
        </form>
    </div>

    <?php 
        if(isset($_POST["del"])){
            $blogid = (int)$bid;
            $sql = "DELETE  FROM  blog WHERE  blogid=$bid";
            mysqli_query($db_link,$sql);
            mysqli_close($db_link);
            echo "<script>location.href='index.php'</script>";
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
        font-size: 20px;
    }
    .btn{
        height: 40px;
        width: 100px;
        margin-left: 80%;
        margin-bottom: 30px;
        border: 1px solid gray;
        background-color: rgba(107, 169, 231, 0.787);
        border-radius: 5px;
        
    }
    .btn a{
        background-color: rgba(107, 169, 231, 0);
        text-decoration: none;
        color: black;
    }
    form {
        height: 100%;
        width: 80%;
        margin: 50px auto;
        background-color:white;
    }
    .title {
        margin-left: 20px;
        font-size: 50px;
        background-color: white;
    }
    .date{
        margin-left: 20px;
        color: gray;
        background-color: white;
    }
    .content{
        font-size: 30px;
        height: 100%;
        width: 90%;
        margin: 20px auto;
        background-color: white;
    }
    .top a{
        background-color: black;
        float: right;
        text-decoration: none;
        color: white;
    }
    .up{
        display:block;
        color: black;
        text-decoration: none;
        height: 40px;
        width: 100px;
        line-height: 40px;
        margin-left: 80%;
        margin-bottom: 30px;
        border: 1px solid gray;
        background-color: rgba(107, 169, 231, 0.787);
        border-radius: 5px;
    }
</style>
</html>