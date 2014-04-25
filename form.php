<?php
include 'removexss.php';
$checkHtml = new check();

$name = $_POST['name'];
$email = $_POST['email'];
$message=$_POST['message'];

$a = '<input type="text" name="username" value="kaizhu"> 如果用户输入 /><script>alert(document.cookie)</script>';

//$b = $checkHtml->checkhtml($a);
//echo $b;

$name = $checkHtml->checkhtml($name);
$message = $checkHtml->checkhtml($message);

if(!$name ||!$email ||!$message)
{
echo "请输入完整";
exit;
}

$name = addslashes($name);
$email = addslashes($email);
$message = addslashes($message);
// $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
// //$conn = mysql_connect ("SAE_MYSQL_HOST_M","SAE_MYSQL_USER","SAE_MYSQL_PASS")or die('连接数据库失败');
// $selected = mysql_select_db("SAE_MYSQL_DB",$link)or die('连接数据库失败!!');
// mysql_query("SET NAMES 'utf8'");	
// $sql = "insert into content values('".$name."','".$email."','".$message."')";
// $result = mysql_query($sql,$link)or die('查不到');

$message = '姓名:' . $name . '内容:' . $message . '邮箱地址:' . $email;
 $mail = new SaeMail();
    //$mail->setAttach( array("my_photo.jpg" => "照片的二进制数据" ));
    $mail->quickSend( 
        "xuyuan923@163.com",
        "来自cassiexu.sinaapp.com的邮件" ,
         $message,
        "xuyuan923@163.com",
        "09230827" 
    );

    // $mail->clean(); 
    // // 重用此对象
    // $mail->quickSend(
    //     $email,
    //     "来自cassiexu.sinaapp.com的邮件" ,
    //     $message,
    //     "xuyuan923@163.com",
    //     "09230827" ,
    //     "smtp.unknown.com" ,
    //     25
    // ); // 指定smtp和端口
?>
