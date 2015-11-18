<?php
include("class_include.php");
if(isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(isset($_COOKIE['login'])){
    header('location:/admin/');
    exit();
  }
  $username=md5($username);
  $password=md5($password);
  $sql = DB_Select("adminuser",array("usermd5"=>"='".$username."'"));
  $query = DB_Query($sql,$con);
  while($row=DB_Fetch_Array($query)){
    if($password == $row["password"]){
        setcookie('login',$row["user"],time()+86400,"/");
        header('location:/admin/');
        exit();
    }else{
        $message = '您的密码输入错误，请重新输入！'; 
        break;
    }
  }
}
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/library/bootstrap/public/signin.css" rel="stylesheet">
    <title>登录 - '.Project_Name.' Powered by Smuradio</title>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">'.Project_Name.'管理用户登录</h2>';
      if(isset($message)){
        echo '<div class="alert alert-danger" role="alert">';
        echo $message;
        echo '</div>';
      }
echo '
        <input type="text" name="username" class="form-control" placeholder="用户名" required="" autofocus="">
        <input type="password" name="password" class="form-control" placeholder="密码" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>
    </div>
    <div class="footer">
      <div class="container2">
        <p class="text-muted">睿欧科技有限公司</p>
      </div>
    </div>
  </body>
</html>';
