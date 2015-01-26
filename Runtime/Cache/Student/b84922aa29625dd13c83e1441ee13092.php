<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>


<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/Student/css/general.css" rel="stylesheet">







  <link rel="stylesheet" type="text/css" href="/Public/Student/css/student.css">



<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>



<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<!-- 头部 -->
	<div class="container-fluid whole-div">

  <div class="row wwf-row-nav">
    <div class="col-md-10 col-md-offset-1">

      <nav class="navbar  wwf-nav" role="navigation">
        <div class="container-fluid wwf-nav-container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo u('Home/Index/index');?>">万工教育</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li >
                <a href="<?php echo u('Home/Course/index');?>">学习课程</a>
              </li>
              <li>
                <a href="<?php echo u('Home/Teacher/index');?>">名师风采</a>
              </li>
              <li>
                <a href="<?php echo u('Home/Wenti/index');?>">常见问题</a>
              </li>
              <li>
                <a href="<?php echo u('Student/MyClass/index');?>">我的课堂</a>
              </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
              <?php if(is_login()): ?><li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0">
                    <?php echo session('user_auth.nickname');?> <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <li><p style="color:#999;font-size:12px" class="text-center">正在使用万工帐号登录</p></li>
                    <li role="presentation" class="divider"></li>
                    <li>
                      <a href="<?php echo U('Teacher/Course/index');?>">教师</a>
                    </li>
                    
                    <li>
                      <a href="<?php echo U('Student/setting/setInfo');?>">设置</a>
                    </li>
                    
                  </li>
                  <li role="presentation" class="divider"></li>
                  <li>
                    <a href="<?php echo U('Home/User/logout');?>">退出</a>
                  </li>
                </ul>
              </li>

              <?php else: ?>
              <li>
                <a href="<?php echo u('Home/user/login');?>">登录</a>
              </li>
              <li>
                <a href="<?php echo u('Home/user/register');?>">注册</a>
              </li>

            </ul><?php endif; ?>

        </div>
        <!-- /.navbar-collapse --> </div>
      <!-- /.container-fluid --> </nav>

  </div>

</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	

  <div class="row my-ban">
    <div class="col-md-8 col-md-offset-1">
      
      <div >
        <div >
        <span class="content1-picture pull-left"> 
<img class="image" src="<?php echo get_userphoto();?>" /> 
</span> 
        <h1>
          <?php echo get_nickname();?>
          <small><?php echo get_time_in_day();?></small>
        </h1>
      </div>

      <p>人类被赋予了一种工作，那就是精神的成长。</p>

    </div>

  </div>
</div>



       
        

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
          <h3 class="panel-title">修改昵称</h3>
        </div>
        <div class="panel-body">
            <!--警告框-->
      <div id="errorMsg" style="display:none" class="alert alert-warning alert-dismissible" role="alert">
  
</div>

          <form id="user-profile-form"  method="post" action="<?php echo u('User/submitNickname');?>" >

            <ul class="list-group">
              <li class="list-group-item">

                <div class="form-group">
          <label class="control-label" for="profile_nickname">新昵称</label>
            <div class="controls">
              <input type="text"  id="profile_nickname" name="nickname" class="form-control" datatype="*" nullmsg="请输入新昵称" errormsg="新昵称格式错误">              
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>

              </li>
              <li class="list-group-item">

                <div class="form-group">
            <label class="control-label" for="profile_pwd">密码</label>
            <div class=" controls radios">
              <input type="text"  id="profile_pwd" name="password" class="form-control" datatype="*" nullmsg="请输入密码" errormsg="密码不可以为空">
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

  
  





<script type="text/javascript">
   
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	<div class="row footer">

  <div class="col-md-8 col-md-offset-2 col-sm-12">

    <div class="row">

      <div class="col-md-3">
        <h4>万工教育</h1>
        <ul>
          <li>
            <a href="<?php echo u('Home/index/about',array('id'=>7));?>">关于我们</a>
          </li>
          <li>
            <a href="<?php echo u('Home/index/about',array('id'=>8));?>">联系我们</a>
          </li>
          <li>
            <a href="<?php echo u('Home/index/about',array('id'=>9));?>">加入我们</a>
          </li>

        </ul>

      </div>
      <div class="col-md-3">
        <h4>请你关注</h1>
        <ul>
          <li>
            <a href="http://ahnieh.com/">安徽NIEH</a>
          </li>
          <li>
            <a href="<?php echo u('Index/xieyi');?>">用前必读</a>
          </li>
          <li>
            <a href="<?php echo u('Index/yinsi');?>">隐私协议</a>
          </li>

        </ul>
      </div>
      <div class="col-md-3">
       <!--  <h4>万工教育</h1>
        <ul>
          <li>
            <a href="#">关于我们</a>
          </li>
          <li>
            <a href="#">联系我们</a>
          </li>
          <li>
            <a href="#">加入我们</a>
          </li>

        </ul> -->
      </div>
      <div class="col-md-3">
       
      
      <ul style="margin-top:30px">
        
        
        <li>©合肥万工网络科技有限公司</li>
        <li>皖ICP备 14048711号</li>
        <li>皖公网安备11010802016612号</li>
      </ul>
      </div>

    </div>

  </div>

</div>

</div>

<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>

<script type="text/javascript" src="/Public/static/Validform_v5.3.2/Validform_v5.3.2.js"></script>

<script type="text/javascript" src="/Public/static/jisuanke/js/unslider.js"></script>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

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

<div class="hidden">
<!-- 用于加载统计代码等隐藏元素 -->

</div>
	<!-- /底部 -->
</body>
</html>