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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_nickname();?> <span class="caret"></span></a>
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
							课程列表
						</a>
					</li>
					
				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/add');?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							发布课程
						</a>
					</li>
					
				</ul>
			</div>
			<!-- 右侧 -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<!--搜索-->
						<div class="input-group mysearch">
  <input type="text" class="form-control">
  <span class="input-group-addon">搜索</span>
</div>

					</div>
					<div class="panel-body">
						
						<!--表格区域-->
						<table class="table table-hover">
  <tr>
  	<th><input type="checkbox" name="id[]"/></th>
  	<th>课程标题</th><th>发布者</th><th>创建时间</th><th>状态</th><th>分类</th>
  	<th>操作</th>
  	

  </tr>

  <?php if(is_array($courseList)): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
  	<td><input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>" /></td>
  	<td><?php echo ($vo['title']); ?></td><td><?php echo ($vo['author']['nickname']); ?></td><td><?php echo (date("Y-h-d h:i:s",$vo['create_time'])); ?></td><td><?php echo getDataStatus($vo['status']);?></td><td><?php echo ($vo['category']['title']); ?></td>
  	<td>
  		
  		<a href="<?php echo U('Teacher/Course/editor',array('id'=>$vo['id']));?>">编辑</a>
  		<a href="javascript:void(0)" class="refuseBtn01"><?php if($vo['status'] == 0): ?>启用<?php else: ?>禁用<?php endif; ?> </a>
  		<a href="javascript:void(0)" class="deleteBtn01">删除</a>
  		
  	</td>
  	

  </tr><?php endforeach; endif; else: echo "" ;endif; ?>



</table>

<!--分页-->
<nav class="mypage">
  <ul class="pagination pagination-sm pull-right">
    <?php echo ($page); ?>
  </ul>
</nav>





					</div>
					<div class="panel-footer text-center">提示：课程未发布用户无法学习，恢复为已发布状态即可。<b style="color:red">课程被删除后将再无法还原</b>。</div>
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
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">操作确认：</h4>
      </div>
      <div class="modal-body">
        <p>你确定删除课程？</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="okBtn">确定</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.mo
	<!-- 模态结束 -->

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
		var id = obj.parent().parent().children().get(0).firstChild.value;//
		
		//初始化模态中的信息
		$(".modal-title").html(info+"操作确定：");
		$(".modal-body p").html("你确定"+info+msg+"课程?");
		$('#myModal').modal('show');
		//给确定按钮绑定删除的事件
		$("#okBtn").bind('click',function(){
			
			$(".modal-body p").html("正在执行+"+info+"+操作。。。");
			$.post(url,{id:id},function(result){
				//删除的反馈
				$(".modal-body p").html("操作结果:<strong style='color:red;'>"+result.msg+"</strong>,2秒后窗口自动关闭!");
				//3秒后关闭模态 todo
				setTimeout("$('#myModal').modal('hide')",2000);
				//关闭后刷新页面
				//window.location.reload();
				
			});
			
		});
		
	}

	//删除绑定事件
	$(".deleteBtn01").bind('click',function(){
		var url01 = "<?php echo u('Teacher/Course/delete');?>";
		commonEvent($(this),'删除',url01);
	});

	//禁用和启用事件
	$(".refuseBtn01").bind('click',function(){
		//获得当前的状态
		var status = $(this).parent().parent().children()[4].innerHTML;
		if (status == '正常') {
		var url02 = "<?php echo u('Teacher/Course/refuse');?>";
		commonEvent($(this),'禁用',url02);



		} else{
			var url02 = "<?php echo u('Teacher/Course/start');?>";
		commonEvent($(this),'启用',url02);
			
		};
	});
	


	</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
  
</div>

	<!-- /底部 -->
		



</body>
</html>