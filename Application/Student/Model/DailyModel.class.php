<?php
namespace Student\Model;
use Think\Model;

// +----------------------------------------------------------------------
// | descript: 日记的模型
// +----------------------------------------------------------------------
// | create_time: 15-1-9 下午1:04
// +----------------------------------------------------------------------
// | Author: jsRunner <hi_php@163.com> <http://www.cnblogs.com/jsRunner/>
// +----------------------------------------------------------------------


/**
 * Class DailyModel
 * @package Student\Model
 */
class DailyModel extends  Model{

    protected  $_validate=array(
        array('title', 'require', '日记标题不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),

        array('content', 'require', '日记内容不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),

    );

    protected  $_auto = array(
        array('create_time', 'getCreateTime', self::MODEL_BOTH, 'callback'),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', 'getStatus', self::MODEL_BOTH, 'callback'),
        array('uid', 'getUid', self::MODEL_BOTH, 'callback'),
    );

    /**
     * 日记列表
     * @param   boolean $isAll 当前用户还是所有用户 false 查询当前用户
     * @param  integer $status [状态（-1：已删除，0：禁用，1：正常）默认为1]
     * @param  string $order [排序:默认按照seq 倒序]
     * @param  boolean $field [字段:默认为所有的字段]
     * @param  boolean $Page [分页对象 默认为false]
     * @return [type]          [description]
     */
    public function lists($isAll = false, $status = 1, $order = 'seq DESC', $field = true, $Page = null)
    {

        $map = array(
            'status' => $status,
        );
        //是否查询所有
        if($isAll === false){
            $map['uid'] = UID;
        }



        if ($Page != null) {
            return $this->field($field)->where($map)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        }
        return $this->field($field)->where($map)->order($order)->select();
    }

    /**
     * 返回查询的结果集中id的数量
     * @param $where 查询的条件
     * @return mixed 返回查询的记录条数
     */
    public function listCount($where){

        return $this->where($where)->Count('id');
    }

    /**
     * 新增日记
     * @param $data  array 需要新增的数据
     * @return array 返回操作后的结果数组。包含操作状态与错误信息
     */
    public function addData($data){
        $return =array();
        $daily = $this->create($data);

        if($daily){

        $this->add();
            $return['status'] = true;
        }else{
            $return['status'] = false;
            $return['msg'] = '新增数据错误';
        }

        return $return;

    }

    public function updateData($id,$data){
        $return =array();

        $res = $this->where(array('id'=>$id))->save($data);
        if($res !== false ){

            $return['status'] = true;
        }else{
            $return['status'] = false;
            $return['msg'] = '更新数据错误';
        }

        return $return;
    }


    /**
     * 根据日记id 获得日记的信息
     * @param $id  日记id
     * @return mixed 返回查询的结果集
     */
    public function detail($id){
        return $this->find($id);
    }

    /**
     * @param $id 要删除的记录主键
     * @return mixed 返回删除的状态数组
     */
    public function deleteData($id){

        $res = $this->delete($id);

        if($res === false ){
            $return['status'] = false;
            $return['msg'] ='删除出现错误';
        }else{
            $return['status'] = true;
        }
        return $return;

    }

    /**
     * 创建时间不写则取当前时间
     * @return int 时间戳
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getCreateTime()
    {
        $create_time = I('post.create_time');
        return $create_time ? strtotime($create_time) : NOW_TIME;
    }

    /**
     * 课程创建者不写则取当前用户
     * @return int 用户id
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getUid()
    {
        $uid = I('post.uid');

        return $uid ? $uid : UID;
    }

    /**
     * 获取数据状态
     * @return integer 数据状态
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getStatus()
    {
        $id = I('post.id');
        if (empty($id)) {    //新增 默认为1 正常
            $status = 1;
        } else {
            $status = 1; // 非新增 没有处理
        }
        return $status;
    }

}
 