<?php
function frame($id,$info,$uptime,$time,$option,$songid,$user,$to,$message,$ip,$mod,$musicarray){
	    echo '<div class="anime img-thumbnail" id="anime">';
    echo '状态：';
    switch($info){
    	case "0":
    		echo '<span class="label label-default">未播放</span>';
    		break;
    	case "1":
    		echo '<span class="label label-success">已播放</span>';
    		break;
    	case "2":
    		echo '<span class="label label-danger">无法播放</span>';
    		break;
    }
        echo "<br><br>
        提交时间：".urldecode($uptime)."<br><br>
        希望播放的时间：".str_replace('-', '月', urldecode($time))."日 ".urldecode($option)."<br><br>
        歌曲名：<a href=\"javascript:musicplay('".$musicarray[$songid]["songurl"]."');\">".$musicarray[$songid]["songtitle"]."</a><br><br>
        点歌人：".urldecode($user)."<br><br>
        送给：".urldecode($to)."<br><br>
        留言：".urldecode($message)."<br><br>
        投稿者ip：".urldecode($ip)."</a><hr>";
        echo 
        '<button onclick="javascript:changeform(\''.$id.'\',\'played\')" class="btn btn-success"  />标记为已播放</button>
        <div class="dropdown btn-group">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  更多操作
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#" onclick="changeform(\''.$id.'\',\'backplay\')">标记为未播放</a></li>
    <li><a href="#" onclick="changeform(\''.$id.'\',\'unplay\')">标记为无法播放</a></li>
    <li><a href="#" onclick="changeform(\''.$id.'\',\'delete\')">直接删除</a></li>
  </ul>
</div>
</div>
<br><br>';
}