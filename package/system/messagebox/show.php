<?php
$mod=$_GET["mod"];
$echo=$_GET["echo"];
$url=$_GET["url"];
if($url==""){
  $url="/";
}
$srcup='<link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/library/jquery/jquery.min.js"></script>
<script src="/library/bootstrap/js/bootstrap.min.js"></script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
<div class="modal-dialog">
<div class="modal-content">';
$srcjs='<script language="javascript">
      $(\'#myModal\').modal({keyboard: false});
      $(\'#myModal\').modal(\'show\');
      $(\'input\').keyup(function (event) {
          if (event.keyCode == "13") {
              window.location.href="'.$url.'"
              return false;
          }
      });
      </script>';
switch($mod){
  case "success":
    echo '<title>操作成功 - Powered by Smuadio</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    echo $srcup;
    echo '<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">操作成功</h4>
          </div>
          <div class="modal-body">';
    echo $echo;
    echo '</div>
          <div class="modal-footer">
            <a href="'.$url.'" class="btn btn-primary">确定</a>
          </div>
        </div>
        </div>
        </div>
        </div>';
    echo $srcjs;
    break;
   case "message":
    echo '<title>提示 - Powered by Powered by Smuadio</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    echo $srcup;
    echo '<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">提示</h4>
          </div>
          <div class="modal-body">';
    echo $echo;
    echo '</div>
          <div class="modal-footer">
            <a href="'.$url.'" class="btn btn-primary">确定</a>
          </div>
        </div>
        </div>
        </div>
        </div>';
    echo $srcjs;
    break;
 default:
     echo '<!DOCTYPE html>
    <html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>非法操作 - Powered by Powered by Smuadio</title>
    <link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/library/bootstrap/public/sticky-footer.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>非法操作！<h1>
      </div>
    </div>
    <div class="footer">
      <div class="container">
        <p class="text-muted">睿欧科技有限公司</p>
      </div>
    </div>
  </body>
 </html>';
    break;
}