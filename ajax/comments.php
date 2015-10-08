<?php
  
  require 'conn.php';

  $act=$_REQUEST['act'];//获取act变量的值

  if ($act=="load") {//如果是请求载入评论
  	
  	$result=mysql_query("select * from comments order by id desc limit 3");

  	if (mysql_num_rows($result)>0) {
  		
  		while ($row=mysql_fetch_assoc($result)) {
  			
  			echo "<div class='commentlist'>".$row['author']." 发表于 ".$row['date']."<br/><br/>".$row['content']."</div>";
  		
  		}
  	}else{

  		echo "<p class='msg'>目前还没有用户评论！</p>";
  	}
  }

  if ($act=="add") {
  	
  	$author=$_POST['author'];

  	$email=$_POST['email'];

  	$content=$_POST['content'];

  	$date=date("Y-m-d H:i:s");

  	$sql="insert into comments (author,email,content,date) values ('$author','$email','$content','$date')";

  	if (mysql_query($sql)) {
  		
  		echo 1;//如果插入成功，则输出1给客户端
  	}

  }
?>