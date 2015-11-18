#smuradio Api信息
***
#目录信息
* /api/command(前端ajax请求api)
* /api/windowsphone(Windows Phone客户端特别api)
* /api/admin_control(后台操作api)
#请求操作
##点歌信息查询
地址：/api/command/index.php

方法：Get

返回：json

请求该api将返回点歌信息，每条点歌信息包含以下字段：
[
   {
   "info":"0",//此条点歌的状态,0为未播放，1为无法播放，2为已播放
   "songtitle":"8080080",//歌曲名
   "songcover":"http://",//专辑图地址
   "songurl":"http://",//歌曲地址
   "user":"测试用户",//点歌人信息
   "to":"测试用户",//赠送对象信息
   "message"："asdfghjkl"//最想说的话信息
   }
]

##通知、系统状态查询
地址：/api/command/message.php

方法：Get

返回：json

请求该api将返回系统通知，状态以及失物招领信息。字段信息如下：
* permission（是否允许点歌）
* notice(通知信息)
* cleantime(已播出数据清理时间)
* lostandfound(失物招领信息)

例子：
{
   "projcetname":"",项目名称
   "permission":"0",//是否允许点歌
   "notice":"notice",//通知信息
   "cleantime":"",//已播出数据清理时间
   "lostandfound":[]//失物招领信息(数组)
}

##提交点歌接口
地址：/api/command/update.php 

方法：Post

返回：字符串

该api需要提交以下字段
                                                                                                                                                                                                                                                                                                                                                             * mod(提交模式，点歌信息为“requestmusicpost”，失物招领模式为“LostandfoundPost”)
* user(点歌人)
* songid(网易云音乐歌曲id，失物招领模式无需输入)
* to(想送给的人)
* message(想说的话)
* option(选择何时播出，失物招领模式无需输入)
* time(播出时间,请根据格式：YYYY/MM/DD输入。失物招领模式无需输入)
* tel(失物招领电话号码)

返回信息为一个数组：
{"message":""}
