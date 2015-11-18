<?php
include("class_include.php");
?>
<div class="modal fade" id="audiomodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">播放音乐</h4>
      </div>
      <div class="modal-body">
        <audio id="musicplayer" controls="controls">您的浏览器不支持 audio 标签。</audio>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
function musicplay(srcs){
  $('#audiomodel').modal('show');
  var musicplayer = document.getElementById("musicplayer");
  musicplayer.src=srcs;
}
</script>
<div>
<?php
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
if(!isset($mode)){
  $today = date("m-d",time());
}else if($mode == "search"){
 	$arr = split('-' , $_POST['date']);
  $today = $arr[1].'-'.$arr[2]; 
}
if(!isset($today)){
 $sql = DB_Select("ticket_view");
}else{
	$sql = DB_Select("ticket_view",array('time' => "='".$today."'"));
}
$query = DB_Query($sql,$con);
$sql = DB_Select("songtable");
$Songtable = DB_Query($sql,$con);
while($rowsongtable = DB_Fetch_Array($Songtable)){
  $songtablearr[$rowsongtable['sid']] = array("songtitle" => urldecode($rowsongtable["songtitle"]),"songcover" => $rowsongtable["songcover"],"songurl" => $rowsongtable["songurl"]);
}
while($row = DB_Fetch_Array($query)){
	frame($row["id"],$row["info"],$row["uptime"],$row["time"],$row["option"],$row["songid"],$row["user"],$row["to"],$row["message"],$row["ip"],$mode,$songtablearr);
}
?>
<form name="change" action="command/items.php" method="post">
    <input type="hidden" name="id">
    <input type="hidden" name="mod">
    <input type="hidden" name="location" value="<?php echo $mode?>">
</form>
<script>
function changeform(ids,mode){
  document.change.id.value=ids;
  document.change.mod.value=mode;
  document.change.submit();
}
</script>
</div>
</div>
<hr>
</div>
</div>
</div>
    </div>
<?php
include("template/foot.htm");
?>