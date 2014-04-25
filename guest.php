<?php
header("Content-type: text/html; charset='utf-8'"); 
session_start();
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
//$conn = mysql_connect("SAE_MYSQL_HOST_M","SAE_MYSQL_USER"," SAE_MYSQL_PASS")or die('连接数据库失败');
$selected = mysql_select_db("SAE_MYSQL_DB",$link)or die('没有此人');
mysql_query("SET NAMES 'utf8'");
$sql = "select * from content ";
$result = mysql_query($sql,$link)or die('查不到');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>徐媛 · Cassie Xu</title>
<meta name="Description" content="徐媛（Cassie Xu）的个人网站。">
<meta name="keywords" content="徐媛,Cassie Xu">
<meta name="author" contect="Cassie Xu">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <p style="text-align:center;font-size:30px">访客留言记录</p>
    <?php 
	    while($row=mysql_fetch_array($result)){
	?>
	<span>guest name:</span>
	<span><?php echo stripslashes($row['name']);?></span>
	<br>
	<span>email:</span>
	<span><?php echo stripslashes($row['email']);?></span>
	<br>
	<span>message:</span>
	<span><?php echo stripslashes($row['message']);?></span>
	<br>
	<span>datetime:</span>
	<span><?php echo date( "Y-m-d   h:i:s ");?></span>
	<br>
	<br>
	<?php
	}
	?>
</body>
</html>