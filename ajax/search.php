<?php
  header("Content-type:text/html;charset=utf8");

  require 'conn.php';

  $id=$_GET['id'];

  $sql="select * from link where id=$id";//根据id进行查询

  $result=mysql_query($sql);

  if (mysql_num_rows($result)>0) {

  	while ($row=mysql_fetch_assoc($result)) {

  		echo "<li>编号:".$row['id']."</li>";

  		echo "<li>网站名:".$row['name']."</li>";

  		echo "<li>url地址:".$row['url']."</li>";

  		echo "<li>介绍:".$row['intro']."</li>";
  	}

  }else{
    
  	echo "没有找到";
  }
?>