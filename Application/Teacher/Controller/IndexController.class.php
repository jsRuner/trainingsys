<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
namespace Teacher\Controller;
use User\Api\UserApi as UserApi;
/**
 * 教师首页控制器
 */
class IndexController extends TeacherController {
	/**
	 * 后台首页
	 *
	 */
	public function index() {
		$this->meta_title = '管理首页';
		$this->display();
	}
	
}
