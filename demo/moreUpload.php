<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>多文件上传</title>
</head>
<body>
	<h2>多文件上传演示</h2>

	<form action="" method="post" enctype="multipart/form-data" >

	    <input type="file" name="upfile[]" multiple/><br>

		<button type="submit" name="upload">上传</button>

	</form>
	<?php
	    require 'conn.php';//引入数据库连接文件
	    // 文件上传处理
	    if (isset($_POST['upload'])) {
	    	//getcwd()获取当前目录路径
	    	$upload_dir=getcwd()."\\uploads\\";
	    	if (!is_dir($upload_dir)) {
	    		//不存在则创建目录
	    		mkdir($upload_dir);
	    	}
	    	for ($i=0; $i <count($_FILES['upfile']['name']) ; $i++) { 
	    	 	//截取文件扩展名
	    	 	$filename[$i]=$_FILES['upfile']['name'][$i];//原文件名

	    	 	$fileExt[$i]=strtolower(trim(strrchr($filename[$i], "."),0));
                //判断文件类型
                if (strpos(' .png.jpg.jpeg.gif.docx.doc.xls.xlsx.pptx.ppt.pdf', $fileExt[$i])!=false) {
                   //文件重命名
	                $newfilename[$i]=(time()+$i).$fileExt[$i];
	               //文件路径
		    	    $newfilepath[$i]=$upload_dir.$newfilename[$i];
			    	//如果临时文件存在表示上传成功，移动文件到目标目录
			    	if (file_exists($_FILES['upfile']['tmp_name'][$i])) {

			    	 	move_uploaded_file($_FILES['upfile']['tmp_name'][$i],$newfilepath[$i] );
			    	 	
			    	 	$filepath[$i]="uploads/".$newfilename[$i];//相对路径
			    	 	//将路径存入数据库
			    	 	savefile($filename[$i],$filepath[$i]);
			    	}
                }else{
                	echo "不支持此类型上传！";               
                }
	    	}

	    	// 显示文件连接
	    	$result=mysql_query("select * from file",$conn);

	    	while ($row=mysql_fetch_assoc($result)) {

	    		if ($row['filename']<>"") {//如果文件名不为空

                   echo "<li><a href='".$row['filepath']."'/>".$row['filename']."</a></li>";
	    		}
	    	}

	    }

	    function savefile($filename,$filepath){	

	    	$sql="insert into file (filename,filepath) values ('$filename','$filepath')";
	    	
	    	mysql_query($sql) or die("执行失败！");
	    }
	?>
</body>
</html