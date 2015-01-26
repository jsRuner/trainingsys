<?php
namespace Teacher\Model;
use Think\Model\RelationModel;

/**
 * 视频关联的模型
 */
class VideoRelationModel extends RelationModel
{
    protected  $tableName ="course_videos";

    //关联规则
    protected $_link = array(
        'author'=>array(
            'mapping_type'      => self::BELONGS_TO, //视频必定属于某个用户创建的
            'class_name'        => 'Member',
            'mapping_name'  => 'author',
            'foreign_key' =>'uid',
            'mapping_fields'=>'nickname',
        ),

        'course'=>array(
            'mapping_type'      => self::BELONGS_TO, //视频必定属于某个课程
            'class_name'        => 'Course',
            'mapping_name'  => 'course',
            'foreign_key' =>'cid',
            'mapping_fields'=>'title',
        )

    );



    /**
     * 视频列表:
     *
     * @param Array   $status [状态（-1：已删除，0：禁用，1：正常）默认为1 和0]
     * @param string  $order  [排序:默认按照seq 倒序]
     * @param boolean $field  [字段:默认为所有的字段]
     * @return [type]          [description]
     */
    public function lists( $status = array( 0, 1 ), $order = 'seq DESC', $field = true, $Page=null ) {
        $map['status'] =array( 'in', $status );
        if ( $Page != null ) {
            return $this->relation( true )->field( $field )->where( $map )->order( $order )->limit( $Page->firstRow.','.$Page->listRows )->select();
        }
        return $this->relation( true )->field( $field )->where( $map )->order( $order )->select();
    }

    /**
     * 指定的课程视频列表
     * @param  array   $status [description]
     * @param  string  $order  [description]
     * @param  boolean $field  [description]
     * @param  [type]  $Page   [description]
     * @return [type]          [description]
     */
    public function listsByCourse( $cid='',$status = array( 0, 1 ), $order = 'seq DESC', $field = true, $Page=null ) {

        if($cid==''){
            return '没有指定索引';
        }
        $cid = intval($cid);
        $map ['cid'] = $cid;
        $map['status'] =array( 'in', $status );
        if ( $Page != null ) {
            return $this->relation( true )->field( $field )->where( $map )->order( $order )->limit( $Page->firstRow.','.$Page->listRows )->select();
        }
        return $this->relation( true )->field( $field )->where( $map )->order( $order )->select();
    }


    /**
     * 返回数据的数量：默认为正常与禁用的数据
     *
     * @return [type] [description]
     */
    public function listCount( $status =array( 0, 1 ) ) {

        $map['status'] =array( 'in', $status );
        return $this->where( $map )->Count( 'id' );
    }
    /**
     * 指定课程下的所有视频
     * @param  [type] $cid    [description]
     * @param  array  $status [description]
     * @return [type]         [description]
     */
    public function listCountByCourse($cid='', $status =array( 0, 1 ) ) {
        if($cid==''){
            return 0;
        }
        $cid = intval($cid);
        $map['cid'] = $cid;
        $map['status'] =array( 'in', $status );
        return $this->where( $map )->Count( 'id' );
    }

    public function detail( $id=0 ) {
        // code...
        if ( $id == 0 ) {
            // code...
            return '没有指定索引';
        }

        $map = array(
            //'status'=>1,
            'id'=>$id,
        );
        return $this->relation( true )->where( $map )->find();
    }




}

?>
