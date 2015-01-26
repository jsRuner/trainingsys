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
      <!-- <img src="#">
      -->
      <div >
        <span class="content1-picture pull-left"> 
<img class="image" src="<?php echo get_userphoto();?>" /> 
</span> 
        <h1>
          <?php echo get_nickname();?>
          <small><?php echo get_time_in_day();?>！</small>
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

      <span>日记列表</span>
        <a class="btn btn-success btn-sm pull-right" href="<?php echo u('Student/Daily/add');?>">写日记</a>
      </div>

  <div class="panel-body">
    
  <!-- List group -->
  <ul class="list-group my-notelist">

    <?php if(is_array($dailyList)): $i = 0; $__LIST__ = $dailyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">
      <div style="margin-left: 10px;">
        <p><a href="<?php echo u('Student/Daily/selectDaily',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a></p>
        <p><span><?php echo (date('Y-m-d',$vo['create_time'])); ?></span><a href="<?php echo u('Student/Daily/editorDaily',array('id'=>$vo['id']));?>" style="margin-left:20px" ><span class="glyphicon glyphicon-edit"></span>编辑</a><a href="javascript:void(0)" dt="第<?php echo ($key+1); ?>条" va="<?php echo ($vo['id']); ?>" class="deleHref"><span class="glyphicon glyphicon-trash"></span>删除</a></p>
      </div>


    </li><?php endforeach; endif; else: echo "" ;endif; ?>





  </ul>
          <!--分页-->
          <nav class="mypage">
              <ul class="pagination pagination-sm pull-right">
                  <?php echo ($page); ?>
              </ul>
          </nav>
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
        <p>你确定删除日记？</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="okBtn" onclick="makeSure()">确定</button>
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

     //删除按钮的逻辑重做
     $(".deleHref").bind('click',function(){
         //将需要删除的数据传递到模态中
         var msg = $(this).attr('dt');
         var id = $(this).attr('va');




         $("#okBtn").attr('deleId',id);//后面获取该值删除



         $(".modal-title").html("删除日记操作确定：");
         $(".modal-body p").html("你确定删除"+msg+"学习日记?");





         $('#myModal').modal('show');
     })

     //定义异步删除的函数
     function makeSure(){
         var url = "<?php echo u('Student/Daily/deleteDaily');?>";
         var id = $("#okBtn").attr('deleId');

         //根据id 找到 va=id的元素
         var obj = $("a[va='"+id+"']");
         //找到该元素的祖先 li
        var  objLi =obj.parents("li");



         $.post(url,{id:id},function(result){
             //删除的反馈
             $(".modal-body p").html("操作结果:<strong style='color:red;'>"+result.msg+"</strong>,2秒后窗口自动关闭!");

             //根据反馈删除指定元素
             if(result.status){
                objLi.remove();
             }
             //3秒后关闭模态 todo
             setTimeout("$('#myModal').modal('hide')",2000);
             //关闭后刷新页面
             //window.location.reload();

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