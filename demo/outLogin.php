<?php
 session_start();

 header("Content-type:text/html;charset=utf8");

 //退出登录,注销session

 if (isset($_SESSION['username'])) {
 	
 	unset($_SESSION['username']);//删除该session

 	header("location: login.php");//注销成功，重定向到登录界面
 }
?>