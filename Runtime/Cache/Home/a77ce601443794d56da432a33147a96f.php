<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>


<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/Home/css/general.css" rel="stylesheet">






  
  <style type="text/css">


/*圆形的头像*/
.image{ 
width:43px; 
height:43px; 
border-radius:50px; 
} 

  </style>




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
	
  


       
        

  <div class="row wwf-selectCourseBan">

    <div class="col-md-4 col-md-offset-2">

      <div class="wwf-selectCourseImg" >
        
        <img src="<?php echo ($courseData["large_picture"]); ?>" style="width:198px">
      </div>


    </div>

     <div class="col-md-5 col-md-offset-1">

      <div class="wwf-selectCourseContent">
        <h3><?php echo ($courseData["title"]); ?></h3>
        <h5><?php echo ($courseData["subtitle"]); ?></h5>


        <div class="stats">
          <p>
            价　格：
            <span class="money-num" style="font-size:16px;"><?php echo ($courseData["price"]); ?></span>
          </p>
        
          <p>
            学员数：
            <span class="member-num"><?php echo ($courseData["student_num"]); ?></span>
            <span class="member-text">人</span>
          </p>
          
        </div>

        <?php if($isLearned): ?><button class="btn btn-success addCourseBtn" >已经收藏</button>

          <?php else: ?>
        <button class="btn btn-success addCourseBtn" onclick="addToLearn(<?php echo ($courseData['id']); ?>)">加入收藏</button><?php endif; ?>
        

      </div>

      


    </div>
    
    

  </div>


  <div class="row wwf-selectCourseInfo">

    <div class="col-md-7 col-md-offset-1">

      <div id="course-about-pane" class="panel panel-default ">
          <div class="panel-heading">
            <h3 class="panel-title">课程介绍</h3>
          </div>
          <div class="panel-body">
          <p>
          
          <?php echo ($courseData["about"]); ?>
        </p>

          </div>
        </div>

        <div id="course-list-pane" class="panel panel-default ">
          <div class="panel-heading">
            <h3 class="panel-title">课时列表</h3>
          </div>
          <div class="panel-body">
            <div class="course-item-list-multi">


                       <ul class="list-group">

                        <?php if(is_array($courseData['lesson'])): $i = 0; $__LIST__ = $courseData['lesson'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item"><a href="<?php echo u('Home/Course/detailLesson',array('id'=>$vo['id']));?>">课时<?php echo ($key+1); ?> :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["title"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
 
</ul>
              
            </div>
          </div>
        </div>
      
      
    </div>

    <div class="col-md-3">

      
      
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">课程教师</h3>
          </div>
          <div class="panel-body">
           
              <div align="center">
                
<span>
  
<img class="image" src="<?php echo ($courseData['author']['middle_photo']); ?>" /> 
</span>

              </div>
                     <h4 class="text-center"> <?php echo ($courseData['author']['nickname']); ?></h4>
                   



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


  <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/static/ueditor/lang/zh-cn/zh-cn.js"></script>

 
  
  <script type="text/javascript">

  var url = "<?php echo u('Home/Course/addLearn');?>";

  function addToLearn (cid) {
  
    $.post(url,{cid:cid},function(msg){
      alert(msg.info);
      window.location.reload();
    });
    
  }





  



  </script>

<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->

<div class="hidden">
<!-- 用于加载统计代码等隐藏元素 -->

</div>
	<!-- /底部 -->
</body>
</html>