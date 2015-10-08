<?php
    session_start();

    require 'conn.php';

  	$id=$_GET['id'];//微博ID

  	$sql="select * from praise where id=$id";

  	if (empty($_SESSION['id'.$id])) {//如果该微博session为空，即第一次点赞
  		//不要用$_SESSION['id'.$id]==""作为判断条件，会抛出未定义的提示

	    $result=mysql_query($sql);

	    $row=mysql_fetch_assoc($result);

	    $praise=$row['praise']+1;//点赞数量加1
	  	
	  	$sql="update praise set praise=$praise where id=$id";

	  	mysql_query($sql);

	  	echo $praise;

	  	$_SESSION['id'.$id]=$id;//点赞过后设置该微博的session

  	}else{//不是第一次点赞

  		echo "nofirst";

  	}

?>