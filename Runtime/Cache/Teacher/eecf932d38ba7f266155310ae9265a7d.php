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

	<link rel="stylesheet" type="text/css" href="/Public/static/Validform_v5.3.2/validform_style.css">



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
      <a class="navbar-brand" href="#">万工课堂会员后台</a>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">帐号管理</a></li>
            <li><a href="#">个人资料</a></li>
            <li><a href="#">消息中心</a></li>
            <li class="divider"></li>
            <li><a href="#">退出</a></li>
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
						<span>发布新课程</span>
					</div>
					<div class="panel-body">
						<div class="alert alert-warning alert-dismissible" role="alert" id="errorMsg" style="display:none" >
							<button type="button" class="close">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button> <strong>注意!</strong> <b></b>
						</div>
						<!-- 表单开始 -->
						<form role="form" id="myform" action="<?php echo u('Teacher/Course/add');?>" method="post">
							<div class="form-group">
								<label for="course-title">标题</label>
								<input type="text" class="form-control" id="course-title" name="title" placeholder="输入课程标题" datatype="s5-16" errormsg="标题至少5个字符,最多16个字符!" nullmsg="你没有输入标题！" >
								<p class="help-block">课程的标题可以设置5到16个字符.</p>
							</div>
							<div class="form-group">
								<label for="course-about">介绍</label>
								<textarea name="about" class="form-control" id="course-about" cols="30" rows="10" placeholder="输入课程介绍"></textarea>
								<p class="help-block">课程的介绍最多1000个汉字.</p>
							</div>
							<div class="form-group">
								<label for="course-price">价格</label>
								<input type="text" class="form-control" id="course-price" name="price" placeholder="0.00">
								<p class="help-block">价格的单位：人民币</p>
							</div>
							<div class="form-group">
								<label for="course-category">分类</label>
								<div class="row">
									<div class="col-xs-4">
										<select name="category_id" id="course-category" class="form-control col-sm-2" placeholder="请选择">
											<?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									<!-- to:do 分类 -->
									<!-- <div class="col-xs-4">
									<input type="text" class="form-control" placeholder=".col-xs-3"></div>
								<div class="col-xs-4">
									<input type="text" class="form-control" placeholder=".col-xs-4"></div>
								-->
							</div>
							<p class="help-block">请选择课程的分类</p>
						</div>
						<button type="submit" class="btn btn-default">提交</button>
					</form>
					<!-- 表单结束 -->
				</div>
				<div class="panel-footer text-center">
					提示：课程未发布用户无法学习，恢复为已发布状态即可。 <b style="color:red">课程被删除后将再无法还原</b>
					。
				</div>
			</div>
		</div>
		<!-- 右侧结束 -->
	</div>
</div>

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
//修改警告的按钮关闭事件
	$(".close").bind('click',function(){
		//隐藏而非删除警告框
		$("#errorMsg").hide();
	});

	/*验证表单*/
		var demo   = $("#myform").Validform(
		{
		tiptype:function(msg,o,cssctl){
		var objtip =$("#errorMsg");
		objtip.children('b').html(msg);
		objtip.show();
		},
		
		}
		);
			
	</script> <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
  
</div>

	<!-- /底部 -->
		



</body>
</html>