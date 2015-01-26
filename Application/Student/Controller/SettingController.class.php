<?php
namespace Student\Controller;

/**
 * 信息控制器
 * @descript 设置控制器
 */
class SettingController extends StudentController
{


    public function setInfo()
    {
        # code...
        if (IS_POST) {

//           p($_POST);
//           die();

            $data = array(
                'about' => I('post.about'),
                'qq' => I('post.qq'),
                'mobile' => I('post.mobile'),
                'telephone' => I('post.telephone'),
                'real_name' => I('post.real_name'),
                'card' => I('post.card'),
                'sex' => I('post.sex'),
                'birth_province' => I('post.birth_province'),
                'birth_city' => I('post.birth_city'),


            );
            $uid = I('post.uid');
            $res = D('Member')->updateInfo($uid, $data);

            if ($res['status'] == true) {
                $this->success('更新成功');
            } else {


                $this->error('更新失败');
            }

        } else {

            //取出原有的资料
            $res = D('Member')->info(UID);

            $province = M('province')->select();
            $city = M('city')->select();

            //获得高校的数据
            $univsProvinces = M('univs_provinces')->select();


            $univs = M('univs')->select();
            $departments = M('department')->select();


            $this->assign('memberData', $res);
            $this->assign('provinceList', $province);
            $this->assign('cityList', $city);

            $this->assign('univsProvincesList', $univsProvinces);
            $this->assign('univsList', $univs);
            $this->assign('departmentList', $departments);

            $this->display();
        }

    }

    public function setPhoto($step = 1)
    {
        // code...
        $Course = D('Member');
        $res = $Course->getMemberPhoto(UID);
        $this->assign('memberData', $res);
        // code...
        if ($step == 1) {
            // code...

            $this->display('photo');
        } else {
            // code...

            $this->display();
        }
    }

    /**
     * 图片处理插件的异步地址。
     *
     * @return void [Array] [上传后的状态]
     */
    public function flashUpFile()
    {
        $id = UID;

        $rs = array();
        $path = "./Uploads/Picture/";
        if (!file_exists($path)) {
            //创建文件目录
            mkdir($path);
        }
        //生成唯一id
        $filename = uniqid();
        $file_src = $filename . "src.png";
        $filename162 = $filename . "1.png";
        $filename48 = $filename . "2.png";
        $filename20 = $filename . "3.png";
        $src = base64_decode($_POST['pic']);
        $pic1 = base64_decode($_POST['pic1']);
        $pic2 = base64_decode($_POST['pic2']);
        $pic3 = base64_decode($_POST['pic3']);
        if (true) {
            file_put_contents($path . $file_src, $src);
        }
        file_put_contents($path . $filename162, $pic1);
        file_put_contents($path . $filename48, $pic2);
        file_put_contents($path . $filename20, $pic3);
        $rs['status'] = 1;
        //去掉路径的.
        $path = substr($path, 1);
        $data = array(
            'photo' => $path . $file_src,
            'small_photo' => $path . $filename20,
            'middle_photo' => $path . $filename48,
            'large_photo' => $path . $filename162,
        );
        $Course = D('Member');
        $res = $Course->setPhoto($id, $data);

        if ($res) {
            $user = session('user_auth');
            $user['middle_photo'] = $data['middle_photo'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));

        }
        echo json_encode($rs);
    }


    /**
     *异步获得城市信息
     */
    public function getCity()
    {
        // code...
        $result = M('city')->where(array('ProvinceID' => I('post.ProvinceID')))->select();
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 获得大学的信息
     */
    public function getUnivs()
    {
        $result = M('univs')->where(array('pid' => I('post.pid')))->select();
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 获得院系信息
     */
    public function getDepartment()
    {
        $result = M('department')->where(array('uid' => I('post.uid')))->select();
        $this->ajaxReturn($result, 'json');
    }


}

?>