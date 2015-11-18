<!DOCTYPE html>
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>数据库错误 - Powered by Smuradio</title>
    <link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/library/bootstrap/public/sticky-footer.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>数据库错误！<h1>
      </div>数据库发生严重错误！为了您的数据安全，Smuradio已经终止您的请求。请将以下信息提交给开发者：<br>
      <?php
      echo urldecode($_GET["message"]);
      ?>
    </div>
    <div class="footer">
      <div class="container">
        <p class="text-muted">睿欧科技有限公司</p>
      </div>
    </div>
</body></html>