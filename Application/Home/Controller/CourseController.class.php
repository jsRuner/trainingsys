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
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class CourseController extends HomeController
{

    //学习课程-首页
    public function index()
    {
        //所有的课程的数据
        $indexCourseList = D('CourseRelation')->lists();

        $this->assign('courseList', $indexCourseList);

        $this->display();
    }

    //查看某一个课程的详细
    public function detail()
    {
        # code...
        $res = D('CourseRelation')->detail(I('get.id'));

        //检查是否已经收藏
        $res01 = false;
        if (is_login()) {

            $res01 = D('MemberCourse')->isLearned($res['id']);

        }

      /*  //显示作者的头像
        p($res);
        die();*/


        $this->assign('isLearned', $res01);

        $this->assign('courseData', $res);


        $this->display();
    }

    //加入收藏
    public function addLearn()
    {
        # code...
        if (!is_login()) {
            # code...
            $data['info'] = '你没有登录';
        }

        $MemberCourse = D('MemberCourse');

        $res = $MemberCourse->addLearn(I('post.cid'));


        if ($res) {
            $data['info'] = '操作成功';
        } else {
            $data['info'] = '操作失败';
        }

        $this->ajaxReturn($data, 'json');


    }

    //查看课时。开始学习
    public function detailLesson()
    {


        $res = D('LessonRelation')->detail(I('get.id'));

        //检查是否已经收藏

        if (is_login()) {

            $res01 = D('MemberCourse')->isLearned($res['cid']);

            if (!$res01) {
                $this->error('需要添加才允许操作');
            }

        } else {
            //检查是否登录

            $this->error('请登录后操作', U('User/login'));

        }


        # code...

        $res01 = D('CourseRelation')->detail($res['cid']);


        //课时对应的 笔记的信息
        $where = array(
            'cid' => $res['cid'],
            'lesson_id' => $res['id'],
            'uid' => session('user_auth.uid'),
            );
        $res02 = D('Note')->listsByNew($where, 3);


        $this->assign('lessonData', $res);
        $this->assign('courseData', $res01);

        $this->assign('noteList', $res02);

        $this->display();
    }

    /*添加课程笔记
     */
    public function addNote()
    {

        $note = D('Note');
        $data = array(

            'cid' => I('post.cid'),
            'lesson_id' => I('post.lesson_id'),
            'content' => I('post.content')
            );
        $res = $note->addNote($data);

        $where = array(
            'cid' => I('post.cid'),
            'lesson_id' => I('post.lesson_id'),
            'uid' => session('user_auth.uid'),
            );

        $res02 = D('Note')->listsByNew($where);
        $this->ajaxReturn($res02, 'json');

    }


}
