<?php
  
  session_start();

  header("Content-type:text/html;charset=utf8");

  if (isset($_SESSION['username'])) {
  	
  	$user=$_SESSION['username'];

  	echo $user."欢迎再次访问";
  
  }else{

  	echo "你还没有登录";

  	header("location: login.php");//重定向到登录界面
  }

?>