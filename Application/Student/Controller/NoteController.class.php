<?php
namespace Student\Controller;

    /**
     * 笔记控制器
     */
/**
 * Class NoteController
 * @package Student\Controller
 */
class NoteController extends StudentController
{

    /**
     * 按照课程显示笔记
     *
     */
    public function index()
    {
        # code...
        $courseList = D('MemberRelation')->detail(UID);

        //todo:课程笔记的数量要显示


        $this->assign('courseList', $courseList);


        $this->display();

    }

    /**
     * 笔记列表
     * @param string $cid
     * @param bool $lesson_id
     */
    public function listNote($cid = '', $lesson_id = false)
    {
        # code...
        $note = D('note');

        $courseData = D('CourseRelation')->detail($cid);

        //分页

        $where = array(
            'status' => 1,
            'cid' => $cid,
            'uid' => UID,
        );
        //如果存在课时id则加入到条件中去。
        if ($lesson_id) {
            $where['lesson_id'] = $lesson_id;
        }


        $count = $note->listCount($where);// 查询满足要求的笔记数。
        $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 5;//配置中的分页
        $Page = new \Think\Page($count, $listRows);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页的配置
        if ($count > $listRows) {
            //$Page->setConfig( 'theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%' );
            $Page->setConfig('theme', '%UP_PAGE%%LINK_PAGE%%DOWN_PAGE% ');
        }
        $show = $Page->show();// 分页显示输出

        //分页结果集
        $noteList = D('note')->lists($cid, $lesson_id, 1, 'seq DESC', true, $Page);

        //如果存在课时id 则取得课时名称
        if ($lesson_id) {

            $res = D('Lesson')->getTitle($lesson_id);
            $this->assign('lessonData', $res);
        }


        $this->assign('noteList', $noteList);
        $this->assign('courseData', $courseData);
        $this->assign('page', $show);

        $this->display();

    }

    /**
     * 异步删除笔记
     * @param string $nid
     * @return void [type]     [description]
     */
    public function deleteNote($nid = '')
    {
        # code...
        $note = D('note');
        $res = $note->deleteDataByNid($nid);
        $data['msg'] = $res;

        $this->ajaxReturn($data, 'json');
    }

    /**
     * 编辑笔记
     * @return void [type] [description]
     */
    public function editorNote()
    {
        $note = D('note');
        # code...
        if (IS_POST) {

            $data = $_POST;
            $res = $note->updateNote($data);
            if (!$res) {
                $this->error($note->getError());
            } else {
                $this->success('编辑成功', U('Note/editorNote', array('id' => I('post.id'))));
            }

        } else {
            # code...
            $res = $note->find(I('get.id'));
            $this->assign('noteData', $res);
            $this->display();
        }

    }

    /**
     * 2014年12月19日 18:09:08 删除课程笔记
     * 删除该课程下所有的笔记
     * 根据用户id和课程Id来删除。
     * 这里是直接删除。不修改状态
     * @param string $cid
     * @return void [type]     [description]
     */
    public function deleteNotes($cid = '')
    {
        # code...
        // code...
        $Note = D('note');

        $res = $Note->deleteData($cid);
        //$data['msg'] = $Course->_sql();
        $data['msg'] = $res;
        $this->ajaxReturn($data, 'json');
    }
}

?>