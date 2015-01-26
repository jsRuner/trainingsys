<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController
{

    /* 用户中心首页 */
    public function index()
    {

    }

    /* 注册页面 */
    public function register($username = '', $password = '', $repassword = '', $email = '', $verify = '')
    {
        if (!C('USER_ALLOW_REGISTER')) {
            $this->error('注册已关闭');
        }
        if (IS_POST) { //注册用户
            /* 检测验证码 */
            if (!check_verify($verify)) {
                //$this->error('验证码输入错误！');
            }

            /* 检测密码 */
            if ($password != $repassword) {
                $this->error('密码和重复密码不一致！');
            }

            /* 调用注册接口注册用户 */
            $User = new UserApi;
            $uid = $User->register($username, $password, $email);
            if (0 < $uid) { //注册成功
                //TODO: 发送验证邮件
                if (true) {


                    //发送开始
                    //获取用户的数据
                    $data = $User->infoNew($uid);
                    $token = md5($data['username'] . $data['email']);
                    $url = u('Home/User/emailVerifyUrl', array('id' => $uid, 'token' => $token));

                    $url = "http://localhost:80".$url;


                    //这里需要添加发送邮箱的操作。
                    $to = $data['email'];

                    $name = '万工教育';
                    $subject = '万工教育-注册邮箱验证';

                    $info = '帐号:' . I('post.username') . ';密码为:' . I('post.password') . ';';


                    $body = '<div id="mailContentContainer" class="qmbox qm_con_body_content"><p>尊敬的万工教育用户  <strong>' . $data['realname'] . '</strong>： </p>
<div style="margin-left:30px;">
<p>您好！</p>
<p>你在万工教育注册了帐号，' . $info . '需要击下面的链接完成邮箱验证。</p>
<p><a href="' . $url . '" target="_blank">' . $url . '</a></p>
<p>如果上面的链接无法点击，您也可以复制链接，粘贴到您浏览器的地址栏内，然后按“回车”键打开预设页面，完成相应功能。</p>
<p>验证将会在30分钟后失效，请尽快完成身份验证，否则需要重新进行验证。</p>
<p>如果有其他问题，请联系我们：<a href="mailto:hi_php@qq.com" target="_blank">hi_php@163<wbr>.com</a> 谢谢！</p>
</div><p>此为系统消息，请勿回复</p><div style="display:none;"><img src="javascript:;"></div>
</div>';

                    $msg = think_send_mail($to, $name, $subject, $body);
                    if ($msg == 1) {
                        $this->success('邮件已经发送到你的邮箱,请在30分钟内完成验证！', U('login'), 5);
                        die();
                    } else {
                        # code...
                        //如果失败了则删除该用户
                        M('ucenter_member')->delete($uid);
                        $this->error($msg);
                    }
                    //发送结束
                }
                //
                $this->success('注册成功！', U('login'));
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }

        } else { //显示注册表单
             if (is_login()) {
                # code...
                redirect('index.php?s=/Student/MyClass/index.html');

                exit();
            }
            $this->display();
        }
    }

    /* 登录页面 */
    public function login($username = '', $password = '', $verify = '')
    {


        if (IS_POST) { //登录验证


            /* 检测验证码 */
            if (!check_verify($verify)) {
                //$this->error('验证码输入错误！');
            }

            /*先检查邮箱是否验证*/
            if (true) {

                $data = M('ucenter_member')->where(array('username' => $username))->find();

               if($data===null){
                    $data['info'] = '用户不存在';
                    $data['status'] = 'n';

                    $this->ajaxReturn($data, 'json');
                    die();

               }


                if ($data['verify'] != 1) {
                    $data['info'] = $data['verify'];
                    //$data['info'] = '邮箱没有验证！';
                    $data['status'] = 'n';

                    $this->ajaxReturn($data, 'json');
                    die();

                }


            }


            /* 调用UC登录接口登录 */
            $user = new UserApi;
            $uid = $user->login($username, $password);

           
             

            if (0 < $uid) { //UC登录成功
                /* 登录用户 */
                $Member = D('Member');
                if ($Member->login($uid)) { //登录用户

                    //写入cookie。为的时实现登陆考试系统
                    //这里的cookie值经过加密
                    //cookie有前缀，这里临时要消除。
                    // $sid = md5(get_client_ip().'/'.$_SERVER['HTTP_X_FORWARDED_FOR'].'/'.$_SERVER['REMOTE_ADDR'].':'.$_SERVER['REMOTE_PORT'].':'.$_SERVER['HTTP_USER_AGENT'].':'.date('Y-m-d'));
                    // cookie('exam_psid','cdf2bebc861d6c14f21a3955fb7ff683',array('expire'=>3600*24,'prefix'=>''));
                    // //还需要写入数据库。
                    // $sessionData = array('sessionid'=>$sid,'sessionuserid'=>1,'sessionip'=>get_client_ip());
                    // //指定的数据库连接
                    // $pesession = M('session','x2_','mysql://root:root@localhost/pe2014#utf8'); 
                    // $pesession->add($sessionData);
                    // cookie('exam_psid',1);

                   
                    //TODO:跳转到登录前页面
                    //$this->success('登录成功！',U('Home/Index/index'));
                    $data['info'] = '登录成功！';
                    $data['status'] = 'y';
                    $data['url'] = U('Home/Index/index');
                    $this->ajaxReturn($data, 'json');

                } else {

                    // $this->error($Member->getError());

                    $data['info'] = $user->getError();
                    $data['status'] = 'n';
                    //$data['url'] = U('Home/Index/index');
                    $this->ajaxReturn($data, 'json');
                }

            } else { //登录失败
                switch ($uid) {
                    case -1:
                        $error = '用户不存在或被禁用！';
                        break; //系统级别禁用
                    case -2:
                        $error = '密码错误！';
                        break;
                    default:
                        $error = '未知错误！';
                        break; // 0-接口参数错误（调试阶段使用）
                }

                $data['info'] = $error;
                $data['status'] = 'n';
                //$data['url'] = U('Home/Index/index');
                $this->ajaxReturn($data, 'json');
                //$this->error($error);
            }

        } else { //显示登录表单
            //显示登陆之前 要检查是否已经登陆
            if (is_login()) {
                # code...
                redirect('index.php?s=/Student/MyClass/index.html');

                exit();
            }
            $this->display();
        }
    }

    /* 退出登录 */
    public function logout()
    {
        if (is_login()) {
            D('Member')->logout();
            $this->success('退出成功！', U('User/login'));
        } else {
            $this->redirect('User/login');
        }
    }

    /* 验证码，用于登录和注册 */
    public function verify()
    {
        $verify = new \Think\Verify();
        $verify->entry(1);
    }

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0)
    {
        switch ($code) {
            case -1:
                $error = '用户名长度必须在16个字符以内！';
                break;
            case -2:
                $error = '用户名被禁止注册！';
                break;
            case -3:
                $error = '用户名被占用！';
                break;
            case -4:
                $error = '密码长度必须在6-30个字符之间！';
                break;
            case -5:
                $error = '邮箱格式不正确！';
                break;
            case -6:
                $error = '邮箱长度必须在1-32个字符之间！';
                break;
            case -7:
                $error = '邮箱被禁止注册！';
                break;
            case -8:
                $error = '邮箱被占用！';
                break;
            case -9:
                $error = '手机格式不正确！';
                break;
            case -10:
                $error = '手机被禁止注册！';
                break;
            case -11:
                $error = '手机号被占用！';
                break;
            default:
                $error = '未知错误';
        }
        return $error;
    }


    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile()
    {
        if (!is_login()) {
            $this->error('您还没有登陆', U('User/login'));
        }
        if (IS_POST) {
            //获取参数
            $uid = is_login();
            $password = I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if ($data['password'] !== $repassword) {
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if ($res['status']) {
                $this->success('修改密码成功！');
            } else {
                $this->error($res['info']);
            }
        } else {
            $this->display();
        }
    }

    /**
     * 检查注册的用户名是否重了
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function checkUserNameUnique()
    {

        # code...
        $result = M('ucenter_member')->where(array('username' => I('post.param')))->find();

        if ($result) {

            $data['info'] = "该用户名已经被占用";
            $data['status'] = "n";
            $this->ajaxReturn($data);
        } else {
            # code...
            $data['info'] = "该用户名可以使用";
            $data['status'] = "y";
            $this->ajaxReturn($data);
        }


    }

    //处理来自邮箱的验证
    public function emailVerifyUrl()
    {
        # code...
        $data = M('ucenter_member')->find(I('get.id'));

        if ($data['verify'] == 1) {
            $this->error('当前邮箱已经通过验证，请不要重复验证', u('login'));
            die();
        }

        $token = md5($data['username'] . $data['email']);

        if ($token == I('get.token')) {
            # code...
            $data['verify'] = 1;
            M('ucenter_member')->where(array('id' => I('get.id')))->save($data);

            //这里添加角色赋予权限。暂时定为学生角色
            // $role_result = M('role')->where(array('name'=>'student'))->find();

            // $role_data = array(
            // 	'role_id' =>$role_result['id'],
            // 	'user_id' =>$data['id'],
            // 	);
            // M('user_role')->add($role_data);


            //角色赋予


            $this->success('邮箱验证通过,请登录', u('login'));
        } else {
            # code...
            $this->error('邮箱验证失败,请联系管理员', u('login'), 5);

        }

    }

    /**
     * 找到密码
     * @return [type] [description]
     */
    public function findPWD()
    {
        # code...
        if (IS_POST) {
            # code...
            //检查用户名与邮箱
            $username = I('post.username');
            $email = I('post.email');

            $Api = new UserApi();

            $res = $Api->infoNew($username, true);
            if ($res < 0) {
                //不存在
                $data['msg'] = '用户不存在';
                $this->ajaxReturn($data, 'json');
            } else {
                //存在则比较下邮箱
                //邮箱错误
                if (empty($res['email']) || $res['email'] != $email) {
                    $data['msg'] = '请输入你注册时的邮箱';
                    $this->ajaxReturn($data, 'json');
                }
            }
            //符合则发送邮件
            if (true) {


                //发送开始
                //获取用户的数据
                $data = $res;
                $token = md5($data['username'] . $data['email']);
                $url = u('Home/User/resetMM', array('id' => $res['id'], 'token' => $token));
                $url = "http://localhost:80" . $url;


                //这里需要添加发送邮箱的操作。
                $to = $data['email'];

                $name = '万工教育';
                $subject = '万工教育-注册邮箱验证';

                $info = '';


                $body = '<div id="mailContentContainer" class="qmbox qm_con_body_content"><p>尊敬的万工教育用户  <strong>' . $data['username'] . '</strong>： </p>
<div style="margin-left:30px;">
<p>您好！</p>
<p>你在申请找回密码服务，' . $info . '需要击下面的链接来找回密码。</p>
<p><a href="' . $url . '" target="_blank">' . $url . '</a></p>
<p>如果上面的链接无法点击，您也可以复制链接，粘贴到您浏览器的地址栏内，然后按“回车”键打开预设页面，完成相应功能。</p>
<p>验证将会在30分钟后失效，请尽快完成，否则需要重新进行验证。</p>
<p>如果有其他问题，请联系我们：<a href="mailto:hi_php@qq.com" target="_blank">hi_php@163<wbr>.com</a> 谢谢！</p>
</div><p>此为系统消息，请勿回复</p><div style="display:none;"><img src="javascript:;"></div>
</div>';

                $msg = think_send_mail($to, $name, $subject, $body);
                if ($msg == 1) {
                    $result['msg'] = '重设密码邮件已经发送到你的邮箱,请在30分钟内完成验证！';
                    $this->ajaxReturn($result, 'json');
                } else {
                    # code...
                    $result['msg'] = '发送邮件失败，请检查你的邮箱是否正确';
                    $this->ajaxReturn($result, 'json');

                }
                //发送结束
            }


        } else {
            # code...
            $this->display();


        }

    }

    /**
     * 重设密码
     */
    public function resetMM()
    {
        //处理来自邮箱的找回密码
        if (IS_POST) {

            //获取参数
            $uid = I('get.id');

            $data['password'] = I('post.password');
            empty($data['password']) && $this->error('请输入新密码');
            $repassword = I('post.confirmpassword');
            empty($repassword) && $this->error('请输入确认密码');

            if ($data['password'] !== $repassword) {
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();


            $res = $Api->resetMM($uid, $data['password']);

            if ($res['status']) {

                $this->success('修改密码成功！', u('login'));
            } else {
                $this->error('修改密码失败');
            }


        } else {
            $this->display();
        }
    }


}
