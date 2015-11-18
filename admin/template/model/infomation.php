<br>
<br>
<?php
$sql = DB_Select("setting");
$query = DB_query($sql,$con);
while($row=DB_Fetch_Array($query)){
  $notice = urldecode($row["notice"]);
  echo '<div class="alert alert-info"><font color="#000000">';
  echo "<strong>通知：</strong>".$notice."</font></div>";
  break;
}
?>
<div id="off" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">系统设置</h3>
      </div>
      <div class="modal-body">
投稿开关：
<form name="formoff" action="command/setting.php" method="post">
  <input type="hidden" name="mod" value="permission">
<?php
$sql = DB_Select("setting");
$query = DB_Query($sql,$con);
//修改检测状态方法 
while($row = DB_Fetch_Array($query)){
   $submitstate = $row['permission'];
   break;
}
if($submitstate == 0){
  echo '<label class="radio-inline"><input type="radio" name="off" value="1">打开</label>
        <label class="radio-inline"><input type="radio" name="off" value="0" checked>关闭</label>';
}else{
  echo '<label class="radio-inline"><input type="radio" name="off" value="1" checked>打开</label>
        <label class="radio-inline"><input type="radio" name="off" value="0">关闭</label>';
}
?>
	<input type="submit" name="Submit" class="btn btn-success" value="提交" />
      </form>
	  <hr>
	  通知修改：
	  <form id="form1" name="form1" action="command/setting.php" method="post">
<textarea class="form-control" name="message" rows="3"><?php echo $notice;?></textarea>
<input type="hidden" name="mod" value="notice">
<input type="submit" name="Submit" class="btn btn-success" value="提交" />
</form>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
		      </div>
</div>
      </div>
    </div>
  </div>

<!--搜索框-->
<div id="today" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">点播搜索</h3>
      </div>
      <div class="modal-body">
<form action="index.php?mode=search" method="post" enctype="multipart/form-data">
  <input type="date" name="date">
	          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
<input type="submit" name="submit" class="btn btn-success" value="查询" />
</div>
</form>
      </div>
    </div>
  </div>
</div>
<?php
$sql = DB_Select("setting");
$query = DB_Query($sql,$con);
while($row = DB_Fetch_Array($query)){
    echo '<div class="alert alert-success">上次清理数据库时间：'.$row["cleantime"].'</div>';
    break;
}
?>