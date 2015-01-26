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
 * 课程控制器
 * 2014年12月11日 14:57:42 分类不作子级处理。只读取一级分类。
 */
class CourseController extends TeacherController
{
    /**
     * 课程
     *
     */
    public function index()
    {


        // $this->meta_title = '课程管理首页';
        //提取课程的信息
        $Course = D('CourseRelation');
        $status = array(0, 1);//读取正常的课程
        $count = $Course->listCount($status);// 查询满足要求的总记录数
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 5;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出
        //分页的结果集
        $rs01 = $Course->lists($status, 'seq DESC', true, $Page);
        $this->assign('courseList', $rs01);
        $this->assign('page', $show);// 分页输出
        $this->display();
    }

    /**
     * 课程新增
     *
     * @author 吴文付 <hi_php@163.com>
     */
    public function add()
    {
        if (IS_POST) {
            $Course = D('Course');
            $res = $Course->addCourse();
            if (!$res) {
                $this->error($Course->getError());
            } else {
                $this->success('新增成功', U('Course/index'));
            }
        } else {
            // code...
            //输出分类todo:后期要替换为使用标签。
            $Category = D('CourseCategory');
            $list = $Category->select();
            //加载分类处理的库:2014年12月11日 16:08:18 该方法没有使用上。
            // vendor('CategoryTool');
            // $CategoryTool = new \CategoryTool();
            // $this->assign('List',$CategoryTool->tree($list));
            // 分类的级别问题采用ajax方案。备选方案是递归
            $res = $Category->getTree();
            //p($res);
            //die();
            $this->assign('categoryList', $res);
            $this->display();
        }
    }

    /**
     * 删除课程（修改数据状态为-1）
     *
     * @param integer $id [description]
     * @return [type]      [description]
     */
    public function delete($id = '')
    {
        // code...
        $Course = D('Course');
        $id = I('post.id');
        $res = $Course->setStatus($id, -1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    /**
     * 禁用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function refuse($id = '')
    {
        // code...
        $Course = D('Course');
        $id = I('post.id');
        $res = $Course->setStatus($id, 0);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    /**
     * 启用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function start($id = '')
    {
        // code...
        $Course = D('Course');
        $id = I('post.id');
        $res = $Course->setStatus($id, 1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    public function editor($id = 0)
    {
        if (IS_POST) {
            // code...
            $Course = D('Course');
            $data = $_POST;
            $res = $Course->updateCourse($data);
            if (!$res) {
                $this->error($Course->getError());
            } else {
                $this->success('编辑成功', U('Course/index'));
            }
        } else {
            // code...
            $Course = D('CourseRelation');
            $Category = D('CourseCategory');
            $id = I('get.id');
            $res = $Course->detail($id);
            $res01 = $Category->getTree();
            $this->assign('courseData', $res);
            $this->assign('categoryList', $res01);
            $this->display();
        }
        // code...
    }

    /**
     * 课程图片
     * session操作:图片处理时id传递不便。
     *
     * @param string $id [课程的索引]
     */
    public function setPicture($id = '', $step = 1)
    {
        // code...
        $Course = D('Course');
        $res = $Course->getCoursePicture($id);
        $this->assign('courseData', $res);
        // code...
        if ($step == 1) {
            // code...
            session('courseId', $id);
            $this->display('picture');
        } else {
            // code...
            $this->display();
        }
    }

    /**
     * 图片处理插件的异步地址。
     *
     * @return [Array] [上传后的状态]
     */
    public function flashUpFile()
    {
        $id = session('courseId');
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
            'picture' => $path . $file_src,
            'small_picture' => $path . $filename20,
            'middle_picture' => $path . $filename48,
            'large_picture' => $path . $filename162,
        );
        $Course = D('Course');
        $Course->setPicture($id, $data);
        echo json_encode($rs);
    }

    /**
     * 课程相关的视频资料
     *
     * @param string $id [课程的索引]
     * @return [type]     [description]
     */
    public function videos($id = '')
    {
        // code...
        $Course = D('VideoRelation');
        $status = array(0, 1);//读取正常的课程
        $count = $Course->listCountByCourse($id, $status);// 查询满足要求的总记录数
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 5;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出
        //分页的结果集
        $rs01 = $Course->listsByCourse($id, $status, 'seq DESC', true, $Page);
        $this->assign('videoList', $rs01);
        $this->assign('page', $show);// 分页输出
        $this->assign('courseData', array('id' => $id));
        $this->display();
    }

    /**
     * ajax保存服务器的信息于数据库
     *
     * @param string $id [description]
     */
    public function addVideo()
    {
        // code...
        $title = I('post.title');
        $hash_id = I('post.hash_id');
        $cid = I('post.cid');
        $description = I('post.description');
        $video = D('Video');
        $data = array(
            'title' => $title,
            'hash_id' => $hash_id,
            'cid' => $cid,
            'description' => $description,
        );
        $res = $video->addVideo($data);
        $this->ajaxReturn($res, 'json');
    }

    /**
     * 获得视频的标题与描叙
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getVideoDetail()
    {
        # code...
        $Video = D('VideoRelation');
        $id = I('post.id');
        $res = $Video->detail($id);
        $this->ajaxReturn($res, 'json');
    }

    /**
     * 获得课程的标题与描叙
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function getLessonDetail()
    {
        # code...
        $Video = D('LessonRelation');
        $id = I('post.id');
        $res = $Video->detail($id);
        $this->ajaxReturn($res, 'json');
    }

    /**
     * 编辑单个视频 ajax
     * @return [type] [description]
     */
    public function editorLesson()
    {
        # code...
        $Course = D('Lesson');

        $data = array(
            'title' => I('post.title'),
            'description' => I('post.description'),
            'vid' => I('post.videoId'),
            'id' => I('post.id'),
        );

        $res = $Course->updateLesson($data);

        if (res) {
            # code...
            $data['info'] = '操作成功！';
            $data['status'] = 'y';
        } else {
            # code...
            $data['info'] = '操作失败！';
            $data['status'] = 'n';
        }

        $this->ajaxReturn($data, 'json');


    }

    /**
     * 编辑单个视频 ajax
     * @return [type] [description]
     */
    public function editorVideo()
    {
        # code...
        $Course = D('Video');
        $data = $_POST;

        $res = $Course->updateVideo($data);

        if (res) {
            # code...
            $data['info'] = '操作成功！';
            $data['status'] = 'y';
        } else {
            # code...
            $data['info'] = '操作失败！';
            $data['status'] = 'n';
        }

        $this->ajaxReturn($data, 'json');


    }

    //获得cc上传文件的url。
    public function getUploadUrl()
    {
        // code...
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
        //手动引入cc视频类
        //这里找不到类，说明引入有问题，要加上\根命名空间
        Vendor('Cc.spark_function');
        $spark_function = new \spark_function();
        //获得配置
        $spark_config = C('spark_config');
        $info = array();
        $info['title'] = trim($_GET['title']);
        $info['description'] = trim($_GET['description']);
        $info['userid'] = $spark_config['user_id'];
        $time = time();
        $salt = $spark_config['key'];
        $info['title'] = $spark_function->convert($info['title'], $spark_config['charset'], 'Utf-8');
        $info['description'] = $spark_function->convert($info['description'], $spark_config['charset'], 'Utf-8');
        $request_url = $spark_function->get_hashed_query_string($info, $time, $salt);
        $this->ajaxReturn($request_url);
    }

    /**
     * 删除视频 ajax
     * @return [type] [description]
     */
    public function deleteVideo()
    {
        # code...
        $Course = D('Video');
        $id = I('post.id');
        $res = $Course->setStatus($id, -1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');

    }

    /**
     * 禁用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function refuseVideo($id = '')
    {
        // code...
        $Course = D('Video');
        $id = I('post.id');
        $res = $Course->setStatus($id, 0);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    /**
     * 启用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function startVideo($id = '')
    {
        // code...
        $Course = D('Video');
        $id = I('post.id');
        $res = $Course->setStatus($id, 1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }


    /**
     * 课时列表
     *
     * @return [type] [description]
     */
    public function lessons($id = '')
    {
        $Course = D('LessonRelation');
        $status = array(0, 1);//读取正常的课程
        $count = $Course->listCountByCourse($id, $status);// 查询满足要求的总记录数
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 5;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出
        //分页的结果集
        $rs01 = $Course->listsByCourse($id, $status, 'seq DESC', true, $Page);
        $this->assign('lessonList', $rs01);
        $this->assign('courseData', array('id' => $id));
        $this->assign('page', $show);// 分页输出
        $this->display();
    }

    //添加课时
    public function addLesson()
    {
        // code...
        $lesson = D('Lesson');
        $data = array(
            'title' => I('post.title'),
            'description' => I('post.description'),
            'vid' => I('post.videoId'),
            'cid' => I('post.cid'),
        );
        $res = $lesson->addLesson($data);
        if ($res) {
            $data['info'] = "操作成功！";
            $data['status'] = 'y';
        } else {
            $data['info'] = "操作失败！";
            $data['status'] = 'n';
        }
        //$data['videoid'] = I('post.')
        $this->ajaxReturn($data, 'json');
    }


    /**
     * 删除课程 ajax
     * @return [type] [description]
     */
    public function deleteLesson()
    {
        # code...
        $Course = D('Lesson');
        $id = I('post.id');
        $res = $Course->setStatus($id, -1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');

    }

    /**
     * 禁用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function refuseLesson($id = '')
    {
        // code...
        $Course = D('Lesson');
        $id = I('post.id');
        $res = $Course->setStatus($id, 0);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    /**
     * 启用 ajax
     *
     * @param string $value [课程id]
     * @return [json字符串]        [返回结果]
     */
    public function startLesson($id = '')
    {
        // code...
        $Course = D('Lesson');
        $id = I('post.id');
        $res = $Course->setStatus($id, 1);
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    /**
     * 提供数据给弹窗 ajax
     *
     * @return [json] 视频数据 json的数组
     */
    public function getVideos()
    {
        // code...
        $id = I('get.cid');
        $Course = D('VideoRelation');
        $status = array(0, 1);//读取正常的课程
        $count = $Course->listCountByCourse($id, $status);// 查询满足要求的总记录数
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 1;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出
        //分页的结果集
        //2014年12月17日 16:59:44 这里添加上字段要求。
        $rs01 = $Course->listsByCourse($id, $status, 'seq DESC', 'id,title,status,length,create_time', $Page);
        $this->ajaxReturn($rs01, 'json');
        //$this->assign( 'lessonList', $rs01 );
        //$this->assign('courseData',array('id'=>$id));
        //$this->assign( 'page', $show );// 分页输出
    }

    /**
     * 获得分页
     *ajax分页 视频的分页
     * @return [type] [description]
     */
    public function getPage()
    {
        // code...
        // 异步获得分页
        $id = I('get.cid');
        $Course = D('VideoRelation');
        $status = array(0, 1);//读取正常的课程
        $count = $Course->listCountByCourse($id, $status);// 查询满足要求的总记录数
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 1;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出
        //分页的结果集
        $data['page'] = $show;
        $this->ajaxReturn($data, 'json');
    }
}
