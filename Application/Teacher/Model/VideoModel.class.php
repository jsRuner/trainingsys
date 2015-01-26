<?php 
namespace Teacher\Model;
use Think\Model;

/**
* 视频的模型
*/
class VideoModel extends Model
{
    protected $tableName = 'course_videos';

    /*自动检查*/
    protected $_validate = array(
        array('title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

	 /* 自动完成规则 */
    protected $_auto = array(
    	array('create_time', 'getCreateTime', self::MODEL_BOTH,'callback'),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', 'getStatus', self::MODEL_BOTH, 'callback'),
         array('uid', 'getUid', self::MODEL_BOTH, 'callback'),
    	);
	
	/**
	 * 列表
	 * @param  integer $status [状态（-1：已删除，0：禁用，1：正常）默认为1]
	 * @param  string  $order  [排序:默认按照seq 倒序]
	 * @param  boolean $field  [字段:默认为所有的字段]
     * @param  boolean $Page  [分页对象 默认为false] 
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
    * 新增数据
    * @param  [type] $data [数据]
    * @return boolean fasle 失败 ， int  成功 返回完整的数据
    */
    public function addVideo($data=null)
    {
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
                $this->error = '添加视频出错!';
                return false;
            }else{
                return true;
            }
        } 
        $this->error = '该视频已经存在!';
        return false;


    }

     public function updateVideo($data=null)
    {
        # code...
        /* 获取数据对象 */
       // $data = $this->create($data);
        if(empty($data)){
            return false;
        }

         /* 更新*/
        if($data['id']){ //更新
           
            $map = array(
                'id'=>$data['id']
                );
            $id = $this->where($map)->save($data); //

            if($id === false){
                $this->error = '更新课程出错!';
                return false;
            }else{
                return true;
            }
        } 
        $this->error = '课程不存在!';
        return false;
        
    }


    /**
     * 修改数据状态。
     * @param  string $id [索引]
     * @param int [varname] [状态值]
     * @return [String]     [修改的结果]
     */
    public function setStatus($id='',$status=1)
    {
        # code...
        if($id == ''){
            return '错误:没有指定数据索引';
        }

        $id = intval($id); //转整型

        $data = array(
            'status'=>$status
            );
        $map = array(
            'id'=>$id
            );

        $res =$this->where($map)->save($data);

        if($res === false){ //恒等更严格
            return '操作失败';
        }

        return "操作成功";


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

        return $uid?$uid:session('uid');
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