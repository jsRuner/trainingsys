<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Student\Model;
use Think\Model\RelationModel;

/**
 * 课程用户模型:关联模型 
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */

class MemberRelationModel extends RelationModel {

    protected $tableName = "member";

    protected $_validate = array(
        array('nickname', '1,16', '昵称长度为1-16个字符', self::EXISTS_VALIDATE, 'length'),
        array('nickname', '', '昵称被占用', self::EXISTS_VALIDATE, 'unique'), //用户名被占用
    );

   
     protected $_link = array(
        'course'=>array(
            'mapping_type'      => self::MANY_TO_MANY,
            'class_name'        =>  'Course',  
              'mapping_name'      =>  'courses',   
               'foreign_key'       =>  'uid',   //关联表中的主表外键
                 'relation_foreign_key'  =>  'cid',  //关联表中从表的外键
                   'relation_table'    =>  'wg_member_course', //此处应显式定义中间表名称，且不能使用C函数读取表前缀 
                        
            )


        );

    public function lists($status = 1, $order = 'uid DESC', $field = true){
        $map = array('status' => $status);
        return $this->field($field)->where($map)->order($order)->select();
    }

    /**
     * 登录指定用户
     * @param  integer $uid 用户ID
     * @return boolean      ture-登录成功，false-登录失败
     */
    public function login($uid){
        /* 检测是否在当前应用注册 */
        $user = $this->field(true)->find($uid);
        if(!$user || 1 != $user['status']) {
            $this->error = '用户不存在或已被禁用！'; //应用级别禁用
            return false;
        }

        //记录行为
        action_log('user_login', 'member', $uid, $uid);

        /* 登录用户 */
        $this->autoLogin($user);
        return true;
    }

    /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }

    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'uid'             => $user['uid'],
            'login'           => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip'   => get_client_ip(1),
        );
        $this->save($data);

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'uid'             => $user['uid'],
            'username'        => $user['nickname'],
            'last_login_time' => $user['last_login_time'],
        );

        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));

    }

    public function getNickName($uid){
        return $this->where(array('uid'=>(int)$uid))->getField('nickname');
    }

    /**
     * 获得用户的明细
     * @param  integer $id [description]
     * @return [type]      [description]
     */
    public function detail($id=0)
    {
        # code...
        if ($id == 0) {
            # code...
            return '没有指定索引';
        }

        $map = array(
            
            'uid'=>$id,
            );
        return $this->relation(true)->where($map)->find();
    }

}
