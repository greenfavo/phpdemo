<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>session与cookie实现用户登录</title>
	<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>    
</head>
<body>
	<form method="post" action="session-cookie.php">
		
		用户名:<input type="text" id="username" name="username"/><br/>

		密码:<input type="password" id="password" name="password"/><br/>

		<input type="submit" name="submit" value="登录" /><br>

	</form>

	<?php

      //判断是否有cookie

      ob_start();//打开缓冲区

      if (isset($_COOKIE['username'])&&isset($_COOKIE['password'])) {?>
      	
          <script type="text/javascript">
            $(function() {//如果有cookie就直接填充到表单，自动登录
            	
            	$("#username").val("<?php echo $_COOKIE['username']; ?>");

            	$("#password").val("<?php echo $_COOKIE['password'];?>");

            });
          </script>

      <?php }
	?>
</body>
</html>