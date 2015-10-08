<?php
  //设置时区为中国时区
  date_default_timezone_set('Asia/Shanghai'); 
  //连接数据库服务器
  $conn=mysql_connect("localhost","root","");
  //设置数据库字符集
  mysql_query("set names 'utf8'");
  //连接数据库
  mysql_select_db("phpdemo",$conn);
?>