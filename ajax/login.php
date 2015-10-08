<?php
 require 'conn.php';

 $username=$_POST['username'];

 $password=$_POST['password'];

 $sql="select * from user where username='$username' and password='$password'";

 $result=mysql_query($sql);

 if (mysql_num_rows($result)== 0) {

 	echo "用户名或密码错误，登录失败";

 }else{

    echo "登录成功，欢迎你".$username;

 }
?>