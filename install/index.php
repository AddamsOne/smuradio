<?php
include("../package/system/messagebox/messagebox.php");
if(is_file("../config/install.lock")){
	System_messagebox("安装程序已经被锁定，请删除config文件夹下的安装锁定程序！","message","/");
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>安装 - Powered by Smuradio</title>
    <link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/library/bootstrap/public/signin.css" rel="stylesheet">
  </head>
  <body>
      <form class="form-signin" action="install.php" method="post">
        <h2 class="form-signin-heading">安装您的Smuradio</h2>
        <label class="sr-only">项目名称</label>
        <input type="name" name="projectname" class="form-control" placeholder="项目名称" required="" autofocus="">
        <label class="sr-only">Mysql服务器地址</label>
        <input type="name" name="dbhost" class="form-control" placeholder="Mysql服务器地址">
        <label class="sr-only">Mysql用户名</label>
        <input type="name" name="dbuser" class="form-control" placeholder="Mysql用户名" required="">
        <label class="sr-only">Mysql密码</label>
        <input type="password" name="dbpasswd" class="form-control" placeholder="Mysql密码" required="">
        <label class="sr-only">Mysql数据库名</label>
        <input type="name" name="dbname" class="form-control" placeholder="Mysql数据库名" required="">
        <label class="sr-only">管理员用户名</label>
        <input type="name" name="adminuser" class="form-control" placeholder="管理员用户名" required="">
        <label class="sr-only">管理员密码</label>
        <input type="password" name="adminpasswd" class="form-control" placeholder="管理员密码" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">开始安装</button>
      </form>
    </div>
</body></html>