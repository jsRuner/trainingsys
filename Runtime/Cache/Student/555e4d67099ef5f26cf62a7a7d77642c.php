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
          <small><?php echo get_time_in_day();?></small>
        </h1>
      </div>

      <p>人类被赋予了一种工作，那就是精神的成长。
      </p>



    </div>

  </div>



       
        

  <div class="row wwf-body-row">

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

      <div class="panel panel-default panel-col lesson-manage-panel">
        <div class="panel-heading">编辑资料</div>
        <div class="panel-body">

           <form   action="/index.php?s=/Student/setting/setInfo.html" method="post" >

          <ul class="list-group">
            <li class="list-group-item">

              <div class="form-group">
                <label class="control-label" for="profile_nickname">昵称</label>
                <div class="controls">
                  <input type="text" style="height:43px" id="profile_nickname" value="<?php echo get_nickname();?>" class="form-control"  readonly>
                  <div class="help-block" style="display:none;"></div>
                </div>


              </div>
            </li>
            <li class="list-group-item">

              <div class="form-group">
                <label class="control-label" for="profile_truename">姓名</label>
                <div class="controls">
                  <input type="text" style="height:43px" id="profile_truename" name="real_name" class="form-control" data-widget-cid="widget-1" data-explain="" value="<?php echo ($memberData['real_name']); ?>">
                  <div class="help-block" style="display:none;"></div>
                </div>
              </div>
            </li>
            <li class="list-group-item">

              <div class="form-group">
                <label class=" control-label">性别</label>
                <div class="controls radios" >
                  <div id="profile_gender" >

                    <input type="radio" id="profile_gender_1" name="sex"  value="1"   <?php if($memberData['sex'] == 1): ?>checked<?php endif; ?>
                  >
                  <label for="profile_gender_1"  >男</label>
                  <input type="radio" id="profile_gender_0" name="sex" value="0"  <?php if($memberData['sex'] != 1): ?>checked<?php endif; ?>
                >
                <label for="profile_gender_0"   >女</label>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">

          <div class="form-group">
            <label class=" control-label" for="profile_idcard">身份证号</label>
            <div class="controls radios">
              <input type="text" style="height:43px" id="profile_idcard" name="card" class="form-control" value="<?php echo ($memberData['card']); ?>" data-widget-cid="widget-6" data-explain="">
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="form-group">
            <label for="profile_mobile" class=" control-label">手机号码</label>
            <div class="controls">
              <input type="text" style="height:43px" id="profile_mobile" name="mobile" class="form-control" data-widget-cid="widget-5" data-explain="" value="<?php echo ($memberData['mobile']); ?>">
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>

        </li>

            <li class="list-group-item">
                <div class="form-group">
                    <label for="profile_phone" class=" control-label">电话号码</label>
                    <div class="controls">
                        <input type="text" style="height:43px" id="profile_phone" name="telephone" class="form-control" data-widget-cid="widget-5" data-explain="" value="<?php echo ($memberData['telephone']); ?>">
                        <div class="help-block" style="display:none;"></div>
                    </div>
                </div>

            </li>

            <li class="list-group-item">

                <div class="form-group">
                    <label for="profile_qq" class=" control-label">QQ</label>
                    <div class="controls">
                        <input type="text" style="height:43px" id="profile_qq" name="qq" class="form-control" data-widget-cid="widget-2" data-explain="" value="<?php echo ($memberData['qq']); ?>">
                        <div class="help-block" style="display:none;"></div>
                    </div>
                </div>
            </li>

        <!--<li class="list-group-item">-->
          <!--<div class="form-group form-forIam-group form-notStudent-group">-->
            <!--<label class=" control-label">公司</label>-->
            <!--<div class="controls">-->
              <!--<input type="text" style="height:43px" id="profile_company" name="company" class="form-control" value="<?php echo ($studentInfo['company']); ?>">-->
              <!--<div class="help-block" style="display:none;"></div>-->
            <!--</div>-->
          <!--</div>-->

        <!--</li>-->

        <!--<li class="list-group-item">-->
          <!--<div class="form-group form-forIam-group form-notStudent-group">-->
            <!--<label class=" control-label">职业</label>-->
            <!--<div class="controls">-->
              <!--<input type="text" style="height:43px" id="profile_job" name="work" class="form-control" value="<?php echo ($studentInfo['work']); ?>">-->
              <!--<div class="help-block" style="display:none;"></div>-->
            <!--</div>-->
          <!--</div>-->

        <!--</li>-->

        <li class="list-group-item">
          <div class="form-group">
            <label class=" control-label">自我介绍</label>

            <div class="controls">
              <textarea cols="20" rows="4" class="form-control" name="about" style="width:475px"><?php echo ($memberData['about']); ?></textarea>

            </div>

          </div>

        </li>

        <!--<li class="list-group-item">-->

          <!--<div class="form-group">-->
            <!--<label class=" control-label">个人主页</label>-->
            <!--<div class="controls">-->
              <!--<input type="text" style="height:43px" id="profile_site" name="url" class="form-control" data-widget-cid="widget-4" data-explain="" value="<?php echo ($studentInfo['url']); ?>">-->
              <!--<div class="help-block" style="display:none;"></div>-->
            <!--</div>-->
          <!--</div>-->
        <!--</li>-->

        <!--<li class="list-group-item">-->
          <!--<div class="form-group">-->
            <!--<div class=" control-label">-->
              <!--<label for="weibo">微博</label>-->
            <!--</div>-->
            <!--<div class="controls">-->
              <!--<input type="text" style="height:43px" id="weibo" name="weibo" class="form-control" data-widget-cid="widget-3" data-explain="" value="<?php echo ($studentInfo['weibo']); ?>">-->
              <!--<div class="help-block" style="display:none;"></div>-->
            <!--</div>-->
          <!--</div>-->

        <!--</li>-->

        <!--<li class="list-group-item">-->
          <!--<div class="form-group">-->
            <!--<label class=" control-label">微信</label>-->
            <!--<div class="controls">-->
              <!--<input type="text" style="height:43px" id="profile_weixin" name="weixin" class="form-control" value="<?php echo ($studentInfo['weixin']); ?>">-->
              <!--<div class="help-block" style="display:none;"></div>-->
            <!--</div>-->
          <!--</div>-->

        <!--</li>-->



        <li class="list-group-item">





          <div class="form-group ">

              <label for="profile_province" class=" control-label">出生省份</label>
            <div class="controls">


              <select class="form-control" name="birth_province" id="profile_province" onChange="initCity(this.options[this.options.selectedIndex].value)" >

                 <!-- <option>请选择省份</option> -->
                  <?php if($memberData['birth_province'] == '请选择'): ?><option value="请选择">请选择</option>
                      <?php else: ?>
                  <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?><option value="<?php echo ($province['provinceid']); ?>" <?php if($province['provinceid'] == $memberData['birth_province']): ?>selected<?php endif; ?> ><?php echo ($province['provincename']); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>


              </select>

              <div class="help-block" style="display:none;"></div>
            </div>
          </div>

        </li>
        <li class="list-group-item">
            <div class="form-group">
                <label for="profile_city" class=" control-label">出生城市</label>
                <div class="controls">

                    <select class="form-control" name="birth_city" id="profile_city" >

                        <?php if($memberData['birth_city'] == '请选择'): ?><option value="请选择">请选择</option>
                            <?php else: ?>
                            <?php if(is_array($cityList)): $i = 0; $__LIST__ = $cityList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i; if($city['cityid'] == $memberData['birth_city']): ?><option value="<?php echo ($city['cityid']); ?>"><?php echo ($city['cityname']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>


                    </select>

                    <div class="help-block" style="display:none;"></div>
                </div>
            </div>







        </li>

        <li class="list-group-item">

          <div class="form-group">
            <label for="profile_school" class=" control-label">毕业学校</label>
            <div class="controls">

              <select class="form-control"  id="profile_school" onChange="initUnivs(this.options[this.options.selectedIndex].value)">

                 <!-- <option>请选择学校地区</option> -->

                <?php if(is_array($univsProvincesList)): $i = 0; $__LIST__ = $univsProvincesList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"  ><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                
              </select>

                <select class="form-control" name="univs" id="profile_univs"  onChange="initDepartment(this.options[this.options.selectedIndex].value)">

                    <!-- <option>请选择学校</option> -->

                    <?php if(is_array($univsList)): $i = 0; $__LIST__ = $univsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($vo['id'] == $memberData['univsid']): ?>selected<?php endif; ?> ><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                </select>
              
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>
          

        </li>

        <li class="list-group-item">

          <div class="form-group">
            <label for="profile_department" class=" control-label">毕业院系</label>
            <div class="controls">

              <select class="form-control" name="department" id="profile_department"  >
                


                <?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($vo['id'] == $memberData['departmentid']): ?>selected<?php endif; ?> ><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

              </select>
              
              <div class="help-block" style="display:none;"></div>
            </div>
          </div>
          

        </li>

        <li class="list-group-item">

          <div class="form-group">
            <label for="profile_profession" class=" control-label">所学专业</label>
            <div class="controls">
             <input type="text" value="11" id="profile_profession" name="profession" class="form-control">



              <div class="help-block" style="display:none;"></div>
            </div>
          </div>
          

        </li>


        <li class="list-group-item">
          <button  type="submit" class="btn btn-primary">保存</button>
            <input type="hidden" value="<?php echo ($memberData['uid']); ?>" name="uid">


        </li>

      </ul>
    </form>

    <!-- </form> -->


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
//点击后初始化
function initCity(data) {
    //alert(data);
    if(data == '请选择'){
        document.getElementById("profile_city").options.length = 0;
        var p;

            p = new Option( '请选择','请选择');
            document.getElementById("profile_city").options[0] = p;

        return;
    }
    var m ="<?php echo u('setting/getCity');?>";
    $.post(m,{ProvinceID:data},function(msg){
        //alert(msg);
        document.getElementById("profile_city").options.length = 0;
        var p;
        for (var i = msg.length - 1; i >= 0; i--) {
            p = new Option( msg[i].cityname,msg[i].cityid);
            document.getElementById("profile_city").options[i] = p;
        };
    });
}

    //初始化高校
function initUnivs(data) {
    //alert(data);
    if(data == '请选择'){
        document.getElementById("profile_univs").options.length = 0;
        var p;

        p = new Option( '请选择','请选择');
        document.getElementById("profile_univs").options[0] = p;

        return;
    }
    var m ="<?php echo u('setting/getUnivs');?>";
    $.post(m,{pid:data},function(msg){
        //alert(msg);
        document.getElementById("profile_univs").options.length = 0;
        var p;
        for (var i = msg.length - 1; i >= 0; i--) {
            p = new Option( msg[i].name,msg[i].id);
            document.getElementById("profile_univs").options[i] = p;
        };
    });
}

    //初始化院系
function initDepartment(data) {
    //alert(data);
    if(data == '请选择'){
        document.getElementById("profile_department").options.length = 0;
        var p;

        p = new Option( '请选择','请选择');
        document.getElementById("profile_department").options[0] = p;

        return;
    }
    var m ="<?php echo u('setting/getDepartment');?>";
    $.post(m,{uid:data},function(msg){

        if(msg===null){
            alert('获得数据为空');
            return;
        }
        //alert(msg);
        document.getElementById("profile_department").options.length = 0;
        var p;
        for (var i = msg.length - 1; i >= 0; i--) {
            p = new Option( msg[i].name,msg[i].id);
            document.getElementById("profile_department").options[i] = p;
        };
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