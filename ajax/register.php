<?php 
  header("Content-type:text/html;charset=utf8");

  require 'conn.php';

  $username=$_POST['username'];

  $act=$_POST['act'];//操作标志

  isRegister($act,$username);

  insert($act,$username);

  //判断用户名是否被注册
  function isRegister($act,$username){ 
    if ($act=="find-name") {
  		
  		$sql="select * from user where username='$username'";

  		$result=mysql_query($sql);

  		if (mysql_num_rows($result)==0) {

  			echo "用户名可用";

  		}else{
  			echo "此用户名已被注册";
  		}
  	}	
  }

  //提交后将注册信息保存到数据库
  function insert($act,$username){
  	if ($act=="reg") {

        $password=$_POST['password'];

        $result=mysql_query("select * from user where username='$username'");

        if (mysql_num_rows($result)==0) {//不存在则注册

  		  	$sql="insert into user (username,password) values ('$username','$password')";
  				
  			  mysql_query($sql);
        }
        //保证username有值
        // $result=mysql_query("select * from user where username='$username'");

        // $row=mysql_fetch_assoc($result);

		    // echo $row['username']." 注册成功";
        echo $username."注册成功";
        
   }
 }


?>