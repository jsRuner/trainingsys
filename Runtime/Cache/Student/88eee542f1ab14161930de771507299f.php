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
                    <?php echo get_username();?> <b class="caret"></b>
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
      <!-- <img src="#">
      -->
      <div >
        <span class="content1-picture pull-left"> 
<img class="image" src="<?php echo get_userphoto();?>" /> 
</span> 
        <h1>
          <?php echo get_username();?>
          <small>下午好！</small>
        </h1>
      </div>

      <p>人类被赋予了一种工作，那就是精神的成长。</p>

    </div>

  </div>



       
        

 <div class="row">
   
   <!-- 左侧列表区域 -->

   <div class="col-md-8 col-md-offset-1">

    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">

        <a class="btn btn-success btn-sm" href="<?php echo u('Student/Daily/index');?>">返回列表</a>
      </div>

  <div class="panel-body">
      <h3><?php echo ($dailyData['title']); ?></h3>

      <p style="margin-top: 20px;">

          <?php echo ($dailyData['content']); ?>
      </p>
    
  </div>

</div>



     
   </div>

   <div class="col-md-2">


    <div class="panel panel-default">
  <div class="panel-heading">什么是学习日记?</div>
  <div class="panel-body">
    每天的学习计划与工作内容。
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">相关统计</h3>
  </div>
  <div class="panel-body">

  </div>
</div>
     
   </div>


   <!-- 右侧介绍区域 -->
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
            <a href="<?php echo u('index/about');?>">关于我们</a>
          </li>
          <li>
            <a href="<?php echo u('index/lianxi');?>">联系我们</a>
          </li>
          <li>
            <a href="<?php echo u('index/zhaopin');?>">加入我们</a>
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

/*
点击管理则出现可以删除的按钮
 */
$("#managerBtn01").bind('click',function(){
  //显示删除按钮
    $(".deleBtn").toggle();
  });




//模态窗口关闭后刷新页面
  $('#myModal').on('hidden.bs.modal', function (e) {
    window.location.reload();
})

  //通用的事件
  function commonEvent(obj,info,url) {
    // body...
    //获得要删除的信息.这里获取标题
    var msg = obj.attr('dt');
    var nid = obj.attr('va');
   // alert(id);
    
    //初始化模态中的信息
    $(".modal-title").html(info+"操作确定：");
    $(".modal-body p").html("你确定"+info+msg+"课程笔记?");
    $('#myModal').modal('show');
    //给确定按钮绑定删除的事件
    $("#okBtn").bind('click',function(){
      
      $(".modal-body p").html("正在执行"+info+"操作。。。");
      $.post(url,{nid:nid},function(result){
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
  $(".deleHref").bind('click',function(){
    var url01 = "<?php echo u('Student/Note/deleteNote');?>";
    commonEvent($(this),'删除',url01);
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