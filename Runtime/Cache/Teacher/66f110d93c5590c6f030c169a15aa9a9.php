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
							返回列表
						</a>
					</li>
					
				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/editor',array('id'=>$courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							基本信息
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/setPicture',array('id'=>$courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							课程图片
						</a>
					</li>
					<li class="list-group-item"><a href="<?php echo u('Teacher/Course/videos',array('id'=>$courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							视频列表
						</a></li>
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
						<span>编辑课程封面图片</span>
					</div>
					<div class="panel-body">

						<!--编辑头像-->

         <script type="text/javascript">
   function uploadevent(status){
  
        status += '';

     switch(status){
     case '1':

     window.location.href = "<?php echo u('Teacher/Course/setPicture',array('id'=>$courseData['id']));?>";
 
    
  break;
 

     
     case '-1':
    window.location.reload();
     break;
     default:
     window.location.reload();
    } 
   }
  </script>

         <div id="altContent">

<input  id="username" type="hidden" value="20130101232565" />

<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
WIDTH="650" HEIGHT="450" id="myMovieName">
<PARAM NAME=movie VALUE="/Public/static/flash/avatar.swf">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=bgcolor VALUE=#FFFFFF>

<?php if(empty($courseData['picture'])): ?><param name="flashvars" value="imgUrl=/Public/static/flash/default.jpg&uploadUrl=/index.php?s=/Teacher/Course/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($courseData['id']); ?>" />
<EMBED src="/Public/static/flash/avatar.swf" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="450" wmode="transparent" flashVars="imgUrl=/Public/static/flash/default.jpg&uploadUrl=/index.php?s=/Teacher/Course/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($courseData['id']); ?>"
NAME="myMovieName" ALIGN="" TYPE="application/x-shockwave-flash" allowScriptAccess="always"
PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED>

<?php else: ?>

<param name="flashvars" value="imgUrl=<?php echo ($courseData['picture']); ?>&uploadUrl=/index.php?s=/Teacher/Course/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($courseData['id']); ?>" />
<EMBED src="/Public/static/flash/avatar.swf" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="450" wmode="transparent" flashVars="imgUrl=<?php echo ($courseData['picture']); ?>&uploadUrl=/index.php?s=/Teacher/Course/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($courseData['id']); ?>"
NAME="myMovieName" ALIGN="" TYPE="application/x-shockwave-flash" allowScriptAccess="always"
PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED><?php endif; ?>

</OBJECT>
 

  </div>

  <div id="avatar_priview"></div>
         <!--编辑头像-->
						
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



	<script type="text/javascript">
	


	</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
  
</div>

	<!-- /底部 -->
		



</body>
</html>