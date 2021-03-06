<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>


<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/Home/css/general.css" rel="stylesheet">









<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>



<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<style type="text/css">
	body,.while-div{
		overflow: hidden;
	}
	.while-div{
		background-color: #efefef;
	}
	/*返回课程主页*/
	.back-course{
font-size: 12px;
background-color: #efefef;
	}
	/*上一课时 下一课时*/
	.prevLesson ,.nextLesson{
		
margin-left: 112px;
display: block;
background-color: #efefef;
	}
	
	.lessonTitle{
		
		color: #cccccc;
	}
	/*视频的div*/
	#videoArea{
		margin-left: 22px;
		width: 100%;
		min-height: 500px;
	}
	/*左侧区域*/
	.left-area{
		background-image: url("/Public/Home/images/courseLearn_bg.jpg");
	}
	/*右侧区域*/
	.right-area{
		
		height: 100%
	}
	/*右侧的头部课程信息*/
	.courseHead{
		color: #666;
		background-image: url("<?php echo ($courseData['large_picture']); ?>");
		background-repeat:no-repeat;
background-position:right;
		
	}
	/*我的笔记换行控制*/
	#my-note{
		height: 302px;
		overflow: auto;
	}
	#my-note li p{
		word-break:break-all;
		line-height: 28px;
		padding: 0px;
		margin: 0px;
	}
	
	</style>
</head>
<body>
	<!-- 整体 -->
	<div class="container-fluid while-div">
		<div class="row">
			<!-- 左侧视频区域 -->
			<div class="col-md-9 left-area">
				<!-- 上 -->
				<button type="button" class="btn btn-default btn-sm nextLesson">
					<span class="glyphicon glyphicon-chevron-up"></span>
				</button>
				<a class="btn btn-default btn-sm  back-course" href="<?php echo u('Home/Course/detail',array('id'=> $courseData['id']));?>">
					<span class="glyphicon glyphicon-arrow-left"></span>
					返回课程主页
				</a>
				<h4 class="lessonTitle text-center">当前播放：<?php echo ($lessonData["title"]); ?></h4>
				<!-- 中 -->
				<div id="videoArea"></div>
				<!-- 下 -->
				<button type="button" class="btn btn-default btn-sm prevLesson">
					<span class="glyphicon glyphicon glyphicon-chevron-down"></span>
				</button>
			</div>
			<!-- 右侧菜单区域 -->
			<div class="col-md-3 right-area">
				<!-- 课程信息区域 -->
				<div class="courseHead">
					<h3><?php echo ($courseData["title"]); ?></h3>
					<p>学员:&nbsp;<?php echo ($courseData['student_num']); ?></p>
					<p>发布者:&nbsp;<?php echo ($courseData['author']['nickname']); ?></p>
				</div>
				<!-- 导航区 -->
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" role="tab" data-toggle="tab">目录</a>
					</li>
					<li role="presentation">
						<a href="#profile" role="tab" data-toggle="tab">笔记</a>
					</li>
					<li role="presentation">
						<a href="#messages" role="tab" data-toggle="tab">讨论</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<ul class="list-group" style="margin-top:10px;">
							<?php if(is_array($courseData['lesson'])): $i = 0; $__LIST__ = $courseData['lesson'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">
									<a href="<?php echo u('Home/Course/detailLesson',array('id'=> $vo['id']));?>">课时<?php echo ($key+1); ?> :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["title"]); ?>
									</a>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div role="tabpanel" class="tab-pane" id="profile">
						<!-- 笔记的表单 -->
						<!--警告框-->
						<div id="errorMsg" style="display:none" class="alert alert-warning alert-dismissible" role="alert"></div>
						<form role="form" action="<?php echo u('Home/Course/addNote');?>" method="post" id="note-form" >
							<div class="form-group">
								<label for="mynote-content">我的笔记</label>
								<textarea  class="form-control" id="mynote-content" name="content" rows="5"  placeholder="记录你的想法"></textarea>
							</div>
							<!-- 隐藏的表单 -->
							<input type="hidden" name="lesson_id" value="<?php echo ($lessonData['id']); ?>">
							<input type="hidden" name="cid" value="<?php echo ($courseData['id']); ?>" >
							<button type="submit" class="btn btn-default pull-right">保存</button>
							<div class="clearfix"></div>
						</form>
						<!-- 笔记的表单结束 -->
						<!-- 笔记的列表 开始-->
						<ul class="list-group" id="my-note" style="margin-top:10px">
							<?php if(is_array($noteList)): $i = 0; $__LIST__ = $noteList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">
									<p><?php echo ($vo['content']); ?></p>
									<p>
										<span><?php echo (date('Y-m-d H:i:s',$vo['create_time'])); ?></span>
										<a href="javascript:void(0)" dt="<?php echo ($vo['content']); ?>" va="<?php echo ($vo['id']); ?>" class="deleHref">
											<span class="glyphicon glyphicon-trash"></span>
											删除
										</a>
									</p>
								</li><?php endforeach; endif; else: echo "" ;endif; ?>
							<li class="list-group-item">
								<a href="<?php echo u('Student/Note/listNote/',array('cid'=>$courseData['id'],'lesson_id'=>$lessonData['id']));?>">查看全部</a>
							</li>
						</ul>
						<!-- 笔记的列表 结束-->
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">讨论</div>
				</div>
				<!-- 目录内容区域 -->
			</div>
		</div>
		<!-- 模态 -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">操作确认：</h4>
					</div>
					<div class="modal-body">
						<p>你确定删除课程？</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="button" class="btn btn-primary" id="okBtn">确定</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.mo
  <!-- 模态结束 -->
	</div>
	<!-- 整体 -->
	<script type="text/javascript" src="/Public/static/cc/js/swfobject.js"></script>
	<script type="text/javascript">
var videoid = "<?php echo ($lessonData['video']['hash_id']); ?>";
var userid = "<?php echo ($spark_config['user_id']); ?>";
  //  功能：创建播放器flash，需传递所需参数，具体参数请参考api文档
  var swfobj=new SWFObject('http://union.bokecc.com/flash/player.swf', 'playerswf', '970', '500', '8');
  swfobj.addVariable( "userid" , userid);  //  partnerID,用户id
  swfobj.addVariable( "videoid" , videoid);  //  spark_videoid,视频所拥有的 api id
  swfobj.addVariable( "mode" , "api");  //  mode, 注意：必须填写，否则无法播放
  swfobj.addVariable( "autostart" , "false"); //  开始自动播放，true/false
  //swfobj.addVariable( "jscontrol" , "true");  //  开启js控制播放器，true/false
  
  swfobj.addParam('allowFullscreen','true');
  swfobj.addParam('allowScriptAccess','always');
  swfobj.addParam('wmode','transparent');
  swfobj.write('videoArea');
//  -------------------
//  调用者：flash
//  功能：播放器加载完毕时所调用函数
//  时间：2010-12-22
//  说明：用户可以加入相应逻辑
//  -------------------
  function on_spark_player_ready() {
    //alert("播放器加载完毕");
  }
  
//  -------------------
//  调用者：flash
//  功能：播放器开始播放时所调用函数
//  时间：2010-12-22
//  说明：用户可以加入相应逻辑
//  -------------------
  function on_spark_player_start() {
    //alert('开始播放');
  }
  
//  -------------------
//  调用者：flash
//  功能：播放器暂停时所调用函数
//  时间：2010-12-22
//  说明：用户可以加入相应逻辑
//  -------------------
  function on_spark_player_pause() {
    //alert('暂停播放');
  }
  
//  -------------------
//  调用者：flash
//  功能：播放器暂停后，继续播放时所调用函数
//  时间：2010-12-22
//  说明：用户可以加入相应逻辑
//  -------------------
  function on_spark_player_resume() {
    //alert('暂停后继续播放');
  }
  
//  -------------------
//  调用者：flash
//  功能：播放器播放停止时所调用函数
//  时间：2010-12-22
//  说明：用户可以加入相应逻辑
//  -------------------
  function on_spark_player_stop() {
    //alert('播放停止');
  }
  function player_play() { // 调用播放器开始播放函数
    document.getElementById("playerswf").spark_player_start();
  }
  function player_pause() { //  调用播放器暂停函数
    document.getElementById("playerswf").spark_player_pause();
  }
  function player_resume() { // 调用播放器恢复播放函数
    document.getElementById("playerswf").spark_player_resume();
  }
</script>
	<script type="text/javascript" src="/Public/static/Validform_v5.3.2/Validform_v5.3.2.js"></script>
	<script type="text/javascript">
	//格式化日期
	Date.prototype.format = function(format){ 
var o = { 
"M+" : this.getMonth()+1, //month 
"d+" : this.getDate(), //day 
"h+" : this.getHours(), //hour 
"m+" : this.getMinutes(), //minute 
"s+" : this.getSeconds(), //second 
"q+" : Math.floor((this.getMonth()+3)/3), //quarter 
"S" : this.getMilliseconds() //millisecond 
} 
if(/(y+)/.test(format)) { 
format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
} 
for(var k in o) { 
if(new RegExp("("+ k +")").test(format)) { 
format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
} 
} 
return format; 
} 
	//格式化日期
	
var demo = $("#note-form").Validform(
    {
      ajaxPost:true,
      tiptype:function(msg,o,cssctl){
      var objtip=$("#errorMsg");
      
      objtip.html(msg+'！1秒后自动关闭');
      
      objtip.show();
      //3秒后自动关闭
      setTimeout("$('#errorMsg').hide();",1000)
    },
    beforeSubmit:function(curform){
		//检查是否笔记是否为空
		
		if($("#mynote-content").val() == ''){
			//alert("笔记内容不可以为空");
			var objtip=$("#errorMsg");
      
      objtip.html('笔记内容不可以为空！1秒后自动关闭');
      
      objtip.show();
      //3秒后自动关闭
      setTimeout("$('#errorMsg').hide();",1000)
			return false;
		}
	},
      callback:function(data){
      	
      	//修改逻辑：插入一个。
      	var jsonObj = data[0];
      	//格式化时间
      	var d =new Date();
      	d.setTime(parseInt(jsonObj.create_time)*1000);
      	var temp = d.format("yyyy-MM-dd hh:mm:ss");
      	
      	
      	$("#my-note").prepend("<li class='list-group-item new'><p>"+jsonObj.content+"</p><p><span>"+temp+"</span><a dt='"+jsonObj.content+"'  va='"+jsonObj.id+"' class='deleHref' ><span class='glyphicon glyphicon-trash'></span>删除</a></p></li>");
      	//异步添加的a标签，要再执行一次绑定事件
      	//删除绑定事件
  $(".deleHref").bind('click',function(){
  	//alert($(this).html());
  	
  
    var url01 = "<?php echo u('Student/Note/deleteNote');?>";
    commonEvent($(this),'删除',url01);
  });
       //清空表单
       $("#mynote-content").val('');
       return;
     
      
       
      },
    });
	
	
</script>
	<script type="text/javascript">

  //删除绑定事件
  $(".deleHref").bind('click',function(){
  	//alert($(this).html());
  	
  
    var url = "<?php echo u('Student/Note/deleteNote');?>";
      var nid = $(this).attr('va');
      var deleLi = $(this).parent().parent();

      $.post(url,{nid:nid},function(result){

         alert(result.msg);

          //你点击的obj 是删除按钮，这里删除点击那个li标签

          deleLi.remove();
          //window.location.reload();
          //这里回调


      });
  });
	</script>
</body>
</html>