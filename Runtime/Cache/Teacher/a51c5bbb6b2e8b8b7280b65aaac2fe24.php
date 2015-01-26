<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">



<!--基础样式-->
<link rel="stylesheet" type="text/css" href="/Public/Teacher/css/base.css">

<!--自定义样式-->


	<style type="text/css">

	/*模态外边框的样式*/

	.modal-style{
		/*opacity: 0.5;*/
	 background:#000;
    opacity: 0.5;
    filter: progid:DXImageTransform.Microsoft.alpha(opacity=50); 
	}
	</style>




<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



</head>
<body>

	<div class="wrap">
		


	<!-- 头部 -->
	<!-- 导航条
================================================== -->


<nav class="navbar navbar-inverse mynav" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">万工课堂教师后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?> ><a href="<?php echo u('Teacher/Index/index');?>">首页</a></li>
        <li <?php if(CONTROLLER_NAME == 'Course'): ?>class="active"<?php endif; ?>><a href="<?php echo u('Teacher/Course/index');?>">课程</a></li>

         <li <?php if(CONTROLLER_NAME == 'Daily'): ?>class="active"<?php endif; ?>><a href="<?php echo u('Teacher/Daily/index');?>">日记</a></li>



        
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_username();?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           <!--  <li><a href="<?php echo u('User/updateNickName');?>">帐号管理</a></li>
            <li><a href="#">个人资料</a></li>
            <li><a href="#">消息中心</a></li>
            <li class="divider"></li> -->
            <li><a href="<?php echo u('Student/MyClass/index');?>">退出教师后台</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<!-- /头部 -->
	
	<!-- 主体 -->
	
	<div class="container-fluid">
		<div class="row">
			<!--主体部分 左右分栏-->
			<div class="col-md-3 sideBar">
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/index');?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							返回列表
						</a>
					</li>

				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/editor',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							基本信息
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/setPicture',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							课程图片
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/videos',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							视频列表
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/lessons',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							课时列表
						</a>
					</li>
					
				</ul>
			</div>
			<!-- 右侧 -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">

						<div class="btn-group pull-right">
							<!-- 
							<a class="btn btn-default" href="<?php echo u('Teacher/Course/addVideo',array('id'=>$courseData['id']));?>">上传视频</a>
						-->
						<!-- 上传使用弹窗形式 -->

						<button type="button" class="btn btn-default" id="upBtn01" >上传视频</button>

					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">

					<!--表格区域-->
					<table class="table table-hover">
						<tr>
							<th >
								<input type="checkbox" />
							</th>
							<th>视频标题</th>
							
							<th>视频HEX码</th>
							<th>发布者</th>
							<th>创建时间</th>
							<th>状态</th>
							<th>操作</th>

						</tr>
						<?php if(is_array($videoList)): $i = 0; $__LIST__ = $videoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td >

									<input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>" />
								</td>
								<td><?php echo ($vo['title']); ?></td>
								
								<td style="font-size:10px"><?php echo ($vo['hash_id']); ?></td>
								<td><?php echo ($vo['author']['nickname']); ?></td>
								<td><?php echo (date("Y-h-d h:i:s",$vo['create_time'])); ?></td>
								<td><?php echo getDataStatus($vo['status']);?></td>
								<td>

									<a href="javascript:void(0)" class="editorBtn01" va="<?php echo ($vo['id']); ?>" >编辑</a>
									<a href="javascript:void(0)" class="refuseBtn01" va="<?php echo ($vo['id']); ?>">
										<?php if($vo['status'] == 0): ?>启用
											<?php else: ?>
											禁用<?php endif; ?>
									</a>
									<a href="javascript:void(0)" class="deleteBtn01" va="<?php echo ($vo['id']); ?>">删除</a>

								</td>

							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<!--分页-->
					<nav class="mypage">
						<ul class="pagination pagination-sm pull-right"><?php echo ($page); ?></ul>
					</nav>
				</div>
				<div class="panel-footer text-center">
					提示：视频上传需要转码，耗费时间是视频播放时长的2-3倍，在此期间无法播放！ <b style="color:red">视频被删除后将再无法还原</b>
					。
				</div>
			</div>
		</div>
		<!-- 右侧结束 -->
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

<!-- 上传的模态 -->

<div class="modal fade" id="myModal01">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">上传视频</h4>
			</div>
			<div class="modal-body">
				<!-- 上传的信息提示区域 -->
				<div class="alert alert-info" id ="up" role="alert" style="display:none"></div>

				<!-- 上传的信息提示区域 -->

				<!-- 上传的表单。标题与视频文件 -->
				<form id="addvform" name="addvform" action="" method="get"   onsubmit="alert('提交视频');">
					<div class="form-group">
						<label for="video-title">标题</label>
						<input type="text" class="form-control" id="video-title" name="title" placeholder="输入视频标题" datatype="s5-16" errormsg="标题至少5个字符,最多16个字符!" nullmsg="你没有输入标题！" >
						<p class="help-block">视频的标题可以设置5到16个字符.</p>
					</div>
					<div class="form-group">
						<label for="video-description">介绍</label>
						<textarea name="description" class="form-control" id="video-description" cols="30" rows="5" placeholder="输入视频描叙"></textarea>
						<p class="help-block">视频的描叙最多1000个汉字.</p>
					</div>

					<div class="form-group">
						<label for="video-file">视频文件</label>
						<input id="video-file"  class="form-control" name="videofile" type="text"  />
						<div style="position:relative; width:80px; height:25px;">
							<div id="swfDiv" style="width:80px;height:25px;position:absolute;z-index:2;"></div>
							<input type="button" value="选择" id="btn_width" style="width:80px;height:25px;position:absolute;z-index:1;" />
						</div>
						<p class="help-block">需要上传的视频文件，格式不限.</p>
					</div>

					<input type="button" id="subbtn" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm" value="提交" onclick="submitvideo();"></form>
				<!-- 表单结束 -->

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- 上传的模态结束 -->

<!-- 编辑的模态 -->
<div class="modal fade" id="myModal02">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">编辑视频</h4>
			</div>
			<div class="modal-body">
				<!-- 信息提示区域 -->
				<div class="alert alert-warning alert-dismissible" role="alert" id="errorMsg" style="display:none" >
					<button type="button" class="close" >
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button> <strong>提示：</strong> <b></b>
				</div>
				<!-- 提示区域 -->

				<!-- 表单。标题与视频文件 -->
				<form  id="editorForm" action="<?php echo u('Teacher/Course/editorVideo');?>" method="post">
					<div class="form-group">
						<label for="video-title02">标题</label>
						<input type="text" class="form-control" id="video-title02" name="title" placeholder="输入视频标题" datatype="s5-16" errormsg="标题至少5个字符,最多16个字符!" nullmsg="你没有输入标题！" >
						<p class="help-block">视频的标题可以设置5到16个字符.</p>
					</div>
					<div class="form-group">
						<label for="video-description02">介绍</label>
						<textarea name="description" class="form-control" id="video-description02" cols="30" rows="5" placeholder="输入视频描叙"></textarea>
						<p class="help-block">视频的描叙最多1000个汉字.</p>
					</div>

					
						<input type="hidden" name="id">
					<input type="submit" class="btn btn-success" value="提交" ></form>
				<!-- 表单结束 -->

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<!-- 编辑的模态 -->






	<!-- /主体 -->

	</div>
	<!-- 底部 -->
	    <!-- 底部
    ================================================== -->
   <footer>
  <div class="container footer">
      <p class="muted credit tr mr10">2005-2014 万工网络课堂 <a href="#">school.ahnieh.com</a> 版权所有皖ICP证070427号</p>
      <ul>
      <li><a href="#" target="_blank">关于我们</a>|</li>
          <li><a href="#" target="_blank">在线反馈</a>|</li>
          <li><a href="#" target="_blank">使用协议</a>|</li>
          <li><a href="#" target="_blank">帮助中心</a></li>
        </ul>
  </div>
</footer>



<script type="text/javascript" src="/Public/static/Validform_v5.3.2/validform_v5.3.2.js" ></script>


<script type="text/javascript">
	//模态窗口关闭后刷新页面
	$('#myModal').on('hidden.bs.modal', function (e) {
		window.location.reload();
})
	//通用的事件
	function commonEvent(obj,info,url) {
		// body...
		//获得要删除的信息.这里获取标题
		var msg = obj.parent().parent().children()[1].innerHTML;
		//注释的地方无效。
		//var id = obj.parent().parent().children().get(0).firstChild.value;//
		var id = obj.attr('va');
		
		

		
		

		//初始化模态中的信息
		$("#myModal .modal-title").html(info+"操作确定：");
		$("#myModal .modal-body p").html("你确定"+info+msg+"课程?");
		$('#myModal').modal('show');
		//给确定按钮绑定删除的事件
		$("#okBtn").bind('click',function(){
			
			$("#myModal .modal-body p").html("正在执行"+info+"操作。。。");
			$.post(url,{id:id},function(result){

				//删除的反馈
				$("#myModal .modal-body p").html("操作结果:<strong style='color:red;'>"+result.msg+"</strong>,2秒后窗口自动关闭!");
				//3秒后关闭模态 todo
				setTimeout("$('#myModal').modal('hide')",2000);
				//关闭后刷新页面
				//window.location.reload();
				
			});
			
		});
		
	}
	//删除绑定事件
	$(".deleteBtn01").bind('click',function(){
		var url01 = "<?php echo u('Teacher/Course/deleteVideo');?>";
		commonEvent($(this),'删除',url01);
	});
	//禁用和启用事件
	$(".refuseBtn01").bind('click',function(){
		//获得当前的状态
		var status = $(this).parent().parent().children()[5].innerHTML;
		var url02;
		if (status == '正常') {
		 url02 = "<?php echo u('Teacher/Course/refuseVideo');?>";
		commonEvent($(this),'禁用',url02);
		} else{
			 url02 = "<?php echo u('Teacher/Course/startVideo');?>";
		commonEvent($(this),'启用',url02);
			
		};
	});

	// 上传的模态js
	// 2014年12月17日 08:49:16 这里要注意2个模态之间影响。要利用模态的id来分隔。
	$("#upBtn01").bind('click',function(){
		//显示上传的窗口
		$('#myModal01').modal({
  //backdrop: false 控制背景色是否会关闭
});


		$("#myModal01").modal('show');
	});

	//编辑的模态.需要去获取数据填充模态
	
	$(".editorBtn01").bind('click',function(){

		//获得id
		var videoId = $(this).attr('va');
		$.post("<?php echo u('Teacher/Course/getVideoDetail');?>",{id:videoId},function(msg){

			
			
			
			//填充id
			$("input[type='hidden'][name='id']").val(msg.id);
			$("#video-title02").val(msg.title);
			//填充描叙
			$("#video-description02").html(msg.description);
			
		});

		$("#myModal02").modal('show');

	});
	
	</script>

<script type="text/javascript" src="/Public/static/cc/js/swfobject.js"></script>

<script type="text/javascript">

  var videofile;
var title;
var description;

var hashId;
var courseId = "<?php echo ($courseData['id']); ?>";

//隐藏时刷新页面
//2014年12月17日 21:42:33增加 弹出时附加样式，隐藏移除
//此法无效。样式被bootstrp覆盖了，全黑
$('#myModal01').on('hidden.bs.modal', function (e) {
		window.location.reload();
		//$(this).removeClass("modal-style");
})



$('#myModal01').on('shown.bs.modal', function (e) {
		
		//$(this).addClass("modal-style");
})

// 加载上传flash ------------- start
var swfobj=new SWFObject('http://union.bokecc.com/flash/api/uploader.swf', 'uploadswf', '80', '25', '8');
swfobj.addVariable( "progress_interval" , 1); //  上传进度通知间隔时长（单位：s）
swfobj.addVariable( "notify_url" , "<?php echo ($spark_config['notify_url']); ?>"); //  上传视频后回调接口
swfobj.addParam('allowFullscreen','true');
swfobj.addParam('allowScriptAccess','always');
swfobj.addParam('wmode','transparent');
swfobj.write('swfDiv');
// 加载上传flash ------------- end
//-------------------
//调用者：flash
//功能：选中上传文件，获取文件名函数
//时间：2010-12-22
//说明：用户可以加入相应逻辑
//-------------------
function on_spark_selected_file(filename) {
  document.getElementById("video-file").value = filename;
}
//-------------------
//调用者：flash
//功能：验证上传是否正常进行函数
//时间：2010-12-22
//说明：用户可以加入相应逻辑
//-------------------
function on_spark_upload_validated(status, videoid) {
  if (status == "OK") {
    $("#up").html("提示：与服务器验证通过");
    hashId = videoid;
  
  } else if (status == "NETWORK_ERROR") {
    //alert("网络错误");
    $("#up").html("提示：网络错误");
  } else {
   // alert("api错误码：" + status);
   $("#up").html("API错误码：" + status);
  }
}
//-------------------
//调用者：flash
//功能：通知上传进度函数
//时间：2010-12-22
//说明：用户可以加入相应逻辑
//-------------------
function on_spark_upload_progress(progress) {
  var uploadProgress = document.getElementById("up");
  if (progress == -1) {
    uploadProgress.innerHTML = "上传出错：" + progress+"，请重新上传";
    $('#subbtn').attr('disabled',false);

  } else if (progress == 100) {
    uploadProgress.innerHTML = "进度：100% 上传完成";
    title = decodeURIComponent(title,"utf-8");
    description = decodeURIComponent(description,'utf-8');
    //后台存入数据库
    $.post("<?php echo u('Teacher/Course/addVideo');?>",{title:title,hash_id:hashId,cid:courseId,description:description},function(msg){
  	uploadProgress.innerHTML = "数据保存成功。3秒后自动关闭窗口";
  	//$("myModal01").modal('hide');
  	setTimeout("$('#myModal01').modal('hide')",2000);
    });

    
    
  } else {
    uploadProgress.innerHTML = "进度：" + progress + "%,请勿进行其他操作";
  }
}
function positionUploadSWF() {
  document.getElementById("swfDiv").style.width = document
      .getElementById("btn_width").style.width;
  document.getElementById("swfDiv").style.height = document
      .getElementById("btn_width").style.height;
}


function submitvideo() {
   videofile = document.getElementById("video-file").value;
   title = encodeURIComponent(document.getElementById("video-title").value, "utf-8");
   description = encodeURIComponent(document.getElementById("video-description").value, "utf-8");

   if(videofile==''){
     document.getElementById("up").innerHTML = "提示：你没有选择任何文件";
     document.getElementById("up").style.display="block";
     return;
   }

//这里u方法没有产生效果
  var url ="http://localhost:8018/index.php?s=/Teacher/Course/getUploadUrl/title/"+title+"/description/"+description+".html"
  var req = getAjax();
  req.open("GET", url, true);
  req.onreadystatechange = function() {
    if (req.readyState == 4) {
      if (req.status == 200) {
        var re = req.responseText;//获取返回的内容
        re = re.substr(1,re.length-2);
        
        document.getElementById("uploadswf").start_upload(re); // 调用flash上传函数
        document.getElementById("up").innerHTML = "提示：正在执行上传操作";
        document.getElementById("up").style.display="block";

        //让按钮失效，阻止再次提交
        $('#subbtn').attr('disabled',true);
      }
    }
  };
  req.send(null);
}
function getAjax() {
  var oHttpReq = null;
  if (window.XMLHttpRequest) {
    oHttpReq = new XMLHttpRequest;
    if (oHttpReq.overrideMimeType) {
      oHttpReq.overrideMimeType("text/xml");
    }
  } else if (window.ActiveXObject) {
    try {
      oHttpReq = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      oHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
  } else if (window.createRequest) {
    oHttpReq = window.createRequest();
  } else {
    oHttpReq = new XMLHttpRequest();
  }
  return oHttpReq;
}


//编辑表单的处理
//
$('#myModal02').on('hidden.bs.modal', function (e) {
		window.location.reload();
		//$(this).removeClass("modal-style");
});

//修改警告的按钮关闭事件
	$(".close").bind('click',function(){
		//隐藏而非删除警告框
		$("#errorMsg").hide();
	});
// 表单处理
	$("#editorForm").Validform(
		{
		tiptype:function(msg,o,cssctl){
		var objtip =$("#errorMsg");
		objtip.children('b').html(msg);
		objtip.show();
		},
		
		ajaxPost:true, //异步提交表单
		callback:function(data){ //ajax提交后的回调函数
			$("#errorMsg").children('b').html(data.info+"2秒后窗口自动关闭");
			setTimeout("$('#myModal02').modal('hide')",2000);
		}
		}
		);
</script>

 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
  
</div>

	<!-- /底部 -->
		



</body>
</html>