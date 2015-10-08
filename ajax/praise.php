<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>无刷新微博点赞</title>

	<style type="text/css">
    
    ul.weibo{
    	list-style: none;

    	width: 1000px;

    	margin: 10px auto;
    }

    li{
    	margin: 20px 0;

    	padding: 20px 20px;

    	border: 1px solid #ccc;
    }
	</style>

</head>
<body>
	
	<ul class="weibo">
        <?php

         require 'conn.php';

         $sql="select * from praise order by id desc";

         $result=mysql_query($sql);

         if (mysql_num_rows($result)>0) {
  	 	
	  	 	while ($row=mysql_fetch_assoc($result)) {
	  	?> 	    
	  	 	    <li>

		  	 	    <?php echo $row['content'];?>
		  	 	   
		  	 	    <a href=""
		  	 	    class="praise" id="<?php echo $row['id']?>">赞
		  	 	    </a>

 		  	 	    <span><?php echo $row['praise'];?></span>

	  	 	    </li>
        <?php }
	  	 }
        ?>
	</ul>
    <p class="msg"></p>
    <script src="jquery.min.js"></script>

	<script type="text/javascript">
       $(".praise").click(function(event){

       	  event.preventDefault();//阻止默认事件，防止点击a标签刷新页面

       	  var id=$(this).attr("id");

          //jquery里的$(this)在ajax里获取不到，作用域改变了，要提前保存
       	  var self=$(this);

       	  $.get('handle-praise.php',{id:id}, function(data) {

       	  	if (data=="nofirst") {

       	  		alert("这条微博你已经点过赞了");
       	  	}else{

       	  	   self.next("span").text(data);
       	  	}

       	  });

       });
	</script>
</body>
</html>