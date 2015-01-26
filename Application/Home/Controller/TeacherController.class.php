<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 首页控制器
 * 师资介绍
 */
class TeacherController extends HomeController {

	//首页
    public function index(){

      	//教师的数据
        $res = D('DocumentArticle')->lists(40);
        $this->assign('teacherList',$res);
        $this->display();
    }

}