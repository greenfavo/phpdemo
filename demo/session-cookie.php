<?php
  session_start();

  header("Content-type:text/html;charset=utf8");

  require 'conn.php';

  if (isset($_POST['submit'])) {//如果点击了登录按钮

      if (isset($_SESSION['username'])) {//判断之前是否设置了session
            
            echo "欢迎你 ".$_SESSION['username'];

            echo "<a href='outLogin.php'>退出登录</a>";
      
      }else{

            $username=$_POST['username'];

            $password=$_POST['password'];

            $sql="select * from user where username='$username' and password='$password'";

            $result=mysql_query($sql);

            if ($result) {//如果用户名和密码匹配
                  
                  echo $username."登录成功";

                  echo "<a href='outLogin.php'>退出登录</a>";

                  $_SESSION['username']=$username;//将用户名存入session
                 
                  setcookie("username",$username,time()+60);//设置cookie

                  setcookie("password",$password,time()+60);//60s后过期

            }else{

            echo "用户名或密码错误";
         }  
      }	
   }
?>