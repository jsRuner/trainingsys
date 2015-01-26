<extend name="Base:common" />
<!--载入登录需要的样式-->
<block name="style"></block>
<block name="header">

	
  
</block>
<block name="body">


	
<div class="row">

	<div class="col-md-7 col-md-offset-1">

		<a class="btn btn-success btn-sm" href="javascript:void(0)" onclick="javascript:window.history.go(-1);"><span class="glyphicon glyphicon-chevron-left"></span>返回</a>
		<div id="backCourse">
			


		
		<!--视频-->

		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="600" height="490" id="cc_4D2900A7490055629C33DC5901307461"><param name="movie" value="http://p.bokecc.com/flash/single/E49B1C3BDCFDF242_4D2900A7490055629C33DC5901307461_false_DE70B85A05A6A540_1/player.swf" /><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><embed src="http://p.bokecc.com/flash/single/E49B1C3BDCFDF242_4D2900A7490055629C33DC5901307461_false_DE70B85A05A6A540_1/player.swf" width="600" height="490" name="cc_4D2900A7490055629C33DC5901307461" allowFullScreen="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"/></object>
		
		<!--视频-->
		
		</div>









	</div>

	<div class="col-md-3">
		<div id="LearnCourseList" >
			


		<ul class="list-group">

                        <volist name="courseLessonInfo" id="vo">

                          

  <li class="list-group-item"><a href="{:u('Index/learnLesson',array('id'=>
                  $vo['id'],'courseId'=>$vo['courseId']))}">课时{$key+1} :&nbsp;&nbsp;&nbsp;&nbsp;{$vo.title} </a></li>
                        </volist>
 
</ul>
		</div>
		
	</div>



  </div>


  
</block>

