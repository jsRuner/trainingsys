<?php
namespace Student\Controller;

/**
 * 我的课堂控制器
 */
class MyClassController extends StudentController
{


    /**
     * 我的课堂首页
     * @return [type] [description]
     */
    public function index()
    {
        # code...
        //获得当前用户收藏的课程


        $courseList = D('MemberRelation')->detail(UID);

        

       

     



        $this->assign('courseList', $courseList);
    


        $this->display();
    }

    /**
     * 2014年12月19日 18:09:08 删除课程
     * 根据用户id和课程Id来删除。
     * 这里是直接删除。不修改状态
     * @param  string $id [description]
     * @return [type]     [description]
     */
    public function deleteCourse($cid = '')
    {
        # code...
        // code...
        $Course = D('MemberCourse');

        $res = $Course->deleteData($cid);
        //$data['msg'] = $Course->_sql();
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }

    


}

?>