<?php 
namespace Home\Model;
use Think\Model;

/**
* 课时笔记的模型
*/
class NoteModel extends Model
{
	protected $tableName = 'course_note';

	/*自动检查*/
    protected $_validate = array(
        array('content', 'require', '笔记内容不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

	 /* 自动完成规则 */
    protected $_auto = array(
    	array('create_time', 'getCreateTime', self::MODEL_BOTH,'callback'),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', 'getStatus', self::MODEL_BOTH, 'callback'),
         array('uid', 'getUid', self::MODEL_BOTH, 'callback'),
    	);

    /**
     * 获得笔记的列表
     * @param  integer $status [description]
     * @param  string  $order  [description]
     * @param  boolean $field  [description]
     * @param  [type]  $Page   [description]
     * @return [type]          [description]
     */
    public function lists($status = 1, $order = 'seq DESC', $field = true,$Page=null){
        $map = array('status' => $status);
        if($Page != null){
            return $this->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->field($field)->where($map)->order($order)->select();
    }

    /**
     * 根据指定的条件找到对应的笔记
     * @param  [type]  $where  [description]
     * @param  integer $status [description]
     * @param  string  $order  [description]
     * @param  boolean $field  [description]
     * @param  [type]  $Page   [description]
     * @return [type]          [description]
     */
     public function listsByWhere($where,$status = 1, $order = 'seq DESC', $field = true,$Page=null){
        $map = array('status' => $status);

        $newMap = array_merge_recursive($map, $where);  



        if($Page != null){
            return $this->field($field)->where($newMap)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->field($field)->where($newMap)->order($order)->select();
    }

    /**
     * 根据指定的条件找到对应的笔记 最新的1条
     * 
     * @param  [type]  $where  [description]
     * @param  integer $status [description]
     * @param  string  $order  [description]
     * @param  boolean $field  [description]
     * @param  [type]  $Page   [description]
     * @return [type]          [description]
     */
     public function listsByNew($where,$limit=1,$status = 1, $order = 'create_time DESC', $field = true){
        $map = array('status' => $status);

        //追加数组，并覆盖相同的下标
        $newMap = array_merge_recursive($map, $where);  
        return $this->field($field)->where($newMap)->order($order)->limit($limit)->select();
    }


     


	
	public function addNote($data=null)
	{
		# code...
		# code...
    	/* 获取数据对象 */
        $data = $this->create($data);


        if(empty($data)){
            return false;
        }
        
         /* 新增*/
        if(empty($data['id'])){ //新增
            $id = $this->add(); //添加

            if(!$id){
                $this->error = '新增笔记出错!';
                return false;
            }else{
                return true;
            }
        } 
        $this->error = '笔记已经存在!';
        return false;

		
	}




	/**
     * 创建时间不写则取当前时间
     * @return int 时间戳
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getCreateTime(){
        $create_time    =   I('post.create_time');
        return $create_time?strtotime($create_time):NOW_TIME;
    }

    /**
     * 课程创建者不写则取当前用户
     * @return int 用户id
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getUid(){
        $uid    =   I('post.uid');

        return $uid?$uid:session('user_auth.uid');
    }

    /**
     * 获取数据状态 
     * @return integer 数据状态
     * @author 吴文付 <hi_php@163.com>
     */
    protected function getStatus(){
        $id = I('post.id');
        if(empty($id)){	//新增 默认为1 正常
            $status = 1;
        }else{
            $status = 1; // 非新增 没有处理
        }
        return $status;
    }
}


 ?>