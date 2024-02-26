<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首页</title>
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
    .pic{
        height: 500px;
        width: 100%;
        background-color: bisque;
    }
    img{
        width: 100%;
        height: 100%;
    }
    .blog{
        height: 150px;
        width: 80%;
        background-color: white;
        margin: 20px auto;
        /* border: 1px solid white; */
        box-shadow:  5px 5px 10px rgb(187, 183, 183);
    }
    .title{
        font-size: 25px;
        background-color: white;
        margin-bottom: 20px;
        text-align: center;
    }
    .content{
        line-height: 40px;
        text-indent: 30px;
        font-size: 15px;
        background-color: white;
         /* 将 对象作为弹性盒模型显示 */
        display:-webkit-box;
        /* 当多行文本超出限制后 ellipsis 是省略号*/
        text-overflow: ellipsis;
        /* 超出部分隐藏 */
        overflow: hidden;
        /* 设置显示多少行 */
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    .bloglist a{
        text-decoration: none;
        color: black;
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
            <a href="user.php" style="float:left ;"><?php echo $_SESSION["username"]; ?></a>
            <a href="logout.php">注销</a>
            <a href="published.php">发表博文</a>
        </div>
        <div class="pic">
            <img src="https://tse1-mm.cn.bing.net/th/id/R-C.2827a96e4679d4d5905a161ebaad7c20?rik=S2a3br3eBdGvNg&riu=http%3a%2f%2fimg.ewebweb.com%2fuploads%2f20190403%2f15%2f1554278373-tRzFZhblrn.jpg&ehk=R%2bH9rj7rA1kAG2buPLtkUAEqH8AXgi9Fc8H85lKEgiA%3d&risl=&pid=ImgRaw&r=0" alt="" srcset="">
        </div>
        <div class="bloglist" >
            <?php
                $username = $_SESSION["username"];
                $sql = "SELECT userid FROM  user WHERE  username='$username'";
                $result = $db_link ->query($sql);
                $uesrid = mysqli_fetch_assoc($result);
                $uid = (int)$uesrid["userid"];
                $sql1 = "SELECT * from blog WHERE uid = '$uid'";
                $result1 = $db_link ->query($sql1);
                $title = array();
                $content = array();
                $blogid = array();
                while($res = mysqli_fetch_array($result1)){
                    array_push($title,$res["blogtitle"]);
                    array_push($content,$res["blogcontent"]);
                    array_push($blogid,$res["blogid"]);
                }
                $count = count($title);
                for ($i=0; $i < $count; $i++) {    ?>
                <a href="<?php echo "blog.php?bid=".$blogid[$i] ?>">
                    <div class="blog" onclick="goto()">
                        <?php 
                            echo "<div class='title'>".$title[$i]."</div>";
                            echo "<div class='content'>$content[$i]</div>";
                        ?>
                    </div> 
                </a>     
            <?php    }      ?>                  
            </div>
        </div>
    </div>
</body>
</html>