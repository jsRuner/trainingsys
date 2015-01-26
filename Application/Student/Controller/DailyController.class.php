<?php
namespace Student\Controller;
// +----------------------------------------------------------------------
// | descript: 日记控制器
// +----------------------------------------------------------------------
// | create_time: 15-1-9 上午10:33
// +----------------------------------------------------------------------
// | Author: jsRunner <hi_php@163.com> <http://www.cnblogs.com/jsRunner/>
// +----------------------------------------------------------------------


class DailyController extends StudentController
{

    /**
     *日记列表页面
     */
    public function index()
    {
        $Daily = D('Daily');

        //获得所有的日记条数
        //分页

        $where = array(
            'status' => 1,

            'uid' => UID,
        );


        $count = $Daily->listCount($where);// 查询满足要求的笔记数。


        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 5;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出

        //分页结果集
        $dailyList = $Daily->lists(false, 1, 'create_time DESC', true, $Page);


        $this->assign('dailyList', $dailyList);
        $this->assign('page', $show);


        $this->display();
    }

    /**
     *添加日记
     */
    public function add()
    {
        if (IS_POST) {

            $Daily = D('Daily');

            $data = array(
                'title' => I('post.title'),
                'content' => I('post.editorValue'),
            );

            $res = $Daily->addData($data);

            if ($res['status']) {
                $this->success('日记保存成功', u('index'));
            } else {
                $this->error('日记保存失败');
            }


            /*p($_POST);
            die();*/

        } else {
            $this->display();
        }
    }

    /**
     * @param int $id 日记的id
     */
    public function selectDaily($id)
    {

        $Daily = D('Daily');

        $res = $Daily->detail($id);

        $this->assign('dailyData', $res);
        $this->display();
    }

    /**
     * 异步删除日记
     * @param $id 传递来的日记id
     */
    public function deleteDaily($id)
    {
        $Daily = D('Daily');
        $res = $Daily->deleteData($id);

        $return = array();
        if ($res['status']) {
            $return['msg'] = '删除成功';
            $return['status'] = true;
        } else {
            $return['msg'] = '删除失败';
            $return['status'] = false;
        }

        $this->ajaxReturn($return, 'json');

    }


    /**
     * @param $id 需要编辑的日记id
     */
    public function editorDaily($id)
    {

            $Daily = D('Daily');
        if (IS_POST) {

            $id = I('post.id');

            $data = array(
                'title' => I('post.title'),
                'content' => I('post.editorValue'),
            );

            $res = $Daily->updateData($id,$data);

            if ($res['status']) {
                $this->success('日记更新成功', u('index'));
            } else {
                $this->error('日记更新失败');
            }


        } else {


            $res = $Daily->detail($id);

            $this->assign('dailyData', $res);

            $this->display();
        }
    }
}
 