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


  <link rel="stylesheet" type="text/css" href="/Public/Teacher/css/student.css">



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
            <li><a href="#">退出</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<!-- /头部 -->
	
	<!-- 主体 -->
	

  <div class="row wwf-body-row" >

     <div class="col-md-3 col-md-offset-1">


      <div class="panel panel-default">
        

  <div class="panel-heading">
    <h3 class="panel-title">设置</h3>
  </div>
  <div class="panel-body">
    <ul class="list-group">
            <li class="list-group-item">
              <a href="<?php echo u('Setting/setInfo');?>">资料设置</a>
            </li>
            <li class="list-group-item">
              <a href="<?php echo u('Setting/setPhoto');?>">修改头像</a>
            </li>
             <li class="list-group-item">
              <a href="<?php echo u('User/updateNickName');?>">修改昵称</a>
            </li>
            <li class="list-group-item">
              <a href="<?php echo u('User/updatePassword');?>">修改密码</a>
            </li>

          </ul>
  </div>
</div>


      
     </div>

     <div class="col-md-7">

       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">修改密码</h3>
        </div>
        <div class="panel-body">
            <!--警告框-->
      <div id="errorMsg" style="display:none" class="alert alert-warning alert-dismissible" role="alert">
  
</div>

          <form id="user-profile-form"  method="post" action="<?php echo u('User/submitPassword');?>" >

            <ul class="list-group">
              <li class="list-group-item">

                <div class="form-group">
          <label class="control-label" for="profile_truename">旧密码</label>
            <div class="controls">
              <input type="text"  id="profile_truename" name="oldMM" class="form-control" datatype="*" nullmsg="请输入旧密码" errormsg="旧密码错误">              
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>

              </li>
              <li class="list-group-item">

                <div class="form-group">
            <label class="control-label" for="profile_pwd">新密码</label>
            <div class=" controls radios">
              <input type="text"  id="profile_pwd" name="newMM" class="form-control" datatype="*6-10" nullmsg="请输入新密码" errormsg="新密码要求6-10位">
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>
              </li>
              <li class="list-group-item">

                <div class="form-group">
            <label class="control-label" for="profile_confirmMM">确认密码</label>
            <div class=" controls">
              <input type="text"  id="profile_confirmMM" name="confirmMM" class="form-control" datatype="*" recheck="newMM" nullmsg="请再输入一次新密码" >
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>

              </li>
              <li class="list-group-item">
                <button class="btn btn-success">修改</button>
              </li>

            </ul>

          </form>
        </div>
      </div>

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

   var demo = $("#user-profile-form").Validform({
    tiptype:function(msg,o,cssctl){
      var objtip=$("#errorMsg");
      

      objtip.html(msg);

      
      objtip.show();
    }
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