<?php 
namespace Home\Model;
use Think\Model\RelationModel;

/**
* 课时关联的模型
*/
class LessonRelationModel extends RelationModel
{
    protected  $tableName ="course_lesson";

    //关联规则
    protected $_link = array(
        'course'=>array(
            'mapping_type'      => self::BELONGS_TO,//课程必定属于某个课程创建的
            'class_name'        => 'Course',
            'mapping_name'  => 'course',
            'foreign_key' =>'cid',
            'mapping_fields'=>'title',            
            ),

         'video'=>array(
            'mapping_type'      => self::BELONGS_TO,//课程必定对应一个视频
            'class_name'        => 'Video',
            'mapping_name'  => 'video',
            'foreign_key' =>'vid',
            //'mapping_fields'=>'title',            
            )

        );

	
	
	/**
	 * 列表:
	 * @param  Array $status [状态（-1：已删除，0：禁用，1：正常）默认为1 和0]
	 * @param  string  $order  [排序:默认按照seq 倒序]
	 * @param  boolean $field  [字段:默认为所有的字段]
	 * @return [type]          [description]
	 */
	public function lists($status = array(0,1), $order = 'seq DESC', $field = true,$Page=null){
        $map['status'] =array('in',$status);
        if($Page != null){
            return $this->relation(true)->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->relation(true)->field($field)->where($map)->order($order)->select();
    }

    /**
     * 列表:
     * @param  Array $status [状态（-1：已删除，0：禁用，1：正常）默认为1 和0]
     * @param  string  $order  [排序:默认按照seq 倒序]
     * @param  boolean $field  [字段:默认为所有的字段]
     * @return [type]          [description]
     */
    public function listsByCourse($id,$status = array(0,1), $order = 'seq DESC', $field = true,$Page=null){
        $map['status'] =array('in',$status);
        $map['cid'] = $id;
        if($Page != null){
            return $this->relation(true)->field($field)->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        return $this->relation(true)->field($field)->where($map)->order($order)->select();
    }



    /**
     * 返回数据的数量：默认为正常数据
     * @return [type] [description]
     */
     public function listCount($status =array(0,1)){
        
        $map['status'] =array('in',$status);
        return $this->where($map)->Count('id');
    }

     public function listCountByCourse($id,$status =array(0,1)){
        
        $map['status'] =array('in',$status);
        $map['cid']=$id;
        return $this->where($map)->Count('id');
    }


    public function detail($id=0)
    {
        # code...
        if ($id == 0) {
            # code...
            return '没有指定索引';
        }

        $map = array(
            //'status'=>1,
            'id'=>$id,
            );
        return $this->relation(true)->where($map)->find();
    }
   



}

 ?>