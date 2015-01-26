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
	
  


       
        

  <div class="row" style="margin-top:40px">

    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">注册</h3>
        </div>
        <div class="panel-body">
            <!--警告框-->
      <div id="errorMsg" style="display:none" class="alert alert-warning alert-dismissible" role="alert">
  
</div>

          <form id="login-form"  method="post" action="/index.php?s=/Home/User/register.html" >

            <ul class="list-group">
              <li class="list-group-item">

               <div class="form-group">
                <label class="control-label required" for="register_nickname">用户名</label>
                <div class="controls">
                  <input type="text" id="register_nickname" name="username"  class="form-control" ajaxurl="<?php echo u('User/checkUserNameUnique');?>" datatype="s3-14|zh2-7" nullmsg="请输入用户名"  errormsg="用户名不符合要求" />
                  <p class="help-block">该怎么称呼你？ 中、英文均可，最长14个英文或7个汉字</p>
                </div>
            </div>
              </li>
              <li class="list-group-item">

                <div class="form-group">
                <label class="control-label required" for="register_password">密码</label>
                <div class="controls">
                  <input type="password" id="register_password" name="password"  class="form-control" datatype="*5-20"   errormsg="密码的格式不符合要求" nullmsg="密码不可以为空"/>
                  <p class="help-block">5-20位英文、数字、符号，区分大小写</p>
                </div>
            </div>
              </li>
              <li class="list-group-item">
                <div class="form-group">
                <label class="control-label required" for="register_confirmPassword">确认密码</label>
                <div class="controls">
                  <input type="password" id="register_confirmPassword" name="repassword"  class="form-control" datatype="*" recheck="password"  errormsg="密码两次输入不一致" nullmsg="密码不可以为空">
                  <p class="help-block">再输入一次密码</p>
                </div>
            </div>

              </li>
              <li class="list-group-item">

                <div class="form-group">
                <label class="control-label required" for="register_email">邮箱地址</label>
                <div class="controls">
                  <input type="text" id="register_email" name="email" class="form-control"  datatype="e" nullmsg="请填写你的常用邮箱" errormsg="邮箱的格式错误" >
                   
                  <p class="help-block">填写你常用的邮箱</p>
                </div>
           </div>
              </li>

              <li class="list-group-item">

                <div class="form-group">
            <div class="controls">
              <button type="submit" id="register-btn"  class="btn btn-primary btn-large btn-block" >注册</button>
            </div>
          </div>
                

              </li>



              <li class="list-group-item">
                <div class="ptl">
                  
                  <span class="text-muted">已经注册帐号？</span>
                  <a href="<?php echo U('User/login');?>">立即登录</a>
                </div>
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
            <a href="<?php echo u('index/about',array('id'=>7));?>">关于我们</a>
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
            <a href="<?php echo u('Index/xieyi',array('id'=>10));?>">用前必读</a>
          </li>
          <li>
            <a href="<?php echo u('Index/xieyi',array('id'=>11));?>">隐私协议</a>
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

<!-- <script type="text/javascript" src="/Public/static/jisuanke/js/unslider.js"></script> -->

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

  var demo = $("#login-form").Validform(
    {
     // ajaxPost:false,

      tiptype:function(msg,o,cssctl){
      var objtip=$("#errorMsg");
      

      objtip.html(msg);

      
      objtip.show();
    },

      // callback:function(data){

      //   if (data.status=='y') {
          
      //     if(data.url){

      //       setTimeout(function(){
          
      //       window.location.href = data.url;
      //   },1000);

      //     }
      //   } 
      // },
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