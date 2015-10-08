<?php
  require 'conn.php';//数据库连接信息

  $sInput=trim($_GET['sBus']);

  $sResult="";//用来保存提示结果

  //查询以sInput开头的信息
  $sql="select routename from route where routename like '$sInput%'  limit 10";

  $result=mysql_query($sql);

  while ($row=mysql_fetch_assoc($result)) {
  	
  	$sResult=$sResult.$row['routename'].",";//将每条提示结果用,分开,JSON数据格式

  }
 
  if (strlen($sResult)>0) {

  		$sResult=substr($sResult, 0,-1);//去掉最后的,号
  }

  echo $sResult;//输出所有提示结果
?>