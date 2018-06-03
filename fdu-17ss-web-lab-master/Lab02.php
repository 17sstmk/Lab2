<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
 
<body>
<!--获取表单数据的两种方法-->
<!--post-->
<form method="post" action="Lab02.php" name="form1">
 <table border="1" width="400" cellpadding="0" cellspacing="0">
 <tr>
  <td height="30"> 用户名:<input name="txtName" type="text" size="12">
  密码:<input name="txtPsd" type="password" size="12">
  <input type="submit" name="SubmitBtn" value="提交">
  </td>
 </tr>
 </table>
</form><br/>
 
<!--get URL的长度需要限定在1M范围内，否则会截取-->
<!--可以使用urlencode与urldecode对URL进行编解码-->
<form method="get" action="8.3.php" name="form2">
 <table border="1" width="400" cellpadding="0" cellspacing="0">
 <tr>
  <td width="400" height="30"> 订单号:<input name="txtFrame" type="text" size="12">
  <input type="submit" name="SubmitBtn">
  </td>
 </tr>
 </table>
</form>
 
<!--在Web页面中嵌入PHP脚本-->
<?php
  $strTxt = '男';
?>
<input type="text" value="<?php echo "strTxt"; ?>">
 
</body>
 
<?php
  echo '用户名: '.$_POST["txtName"]." 密码：".$_POST['txtPsd'];
  echo '订单号:'.$_GET["txtFrame"];
?>
 
</html>
