<?php 
namespace Home\Model;
use Think\Model\RelationModel;

/**
* 文章的相关模块 提供名师风采的
*/
class DocumentArticleModel extends RelationModel
{
	
	protected $tableName = 'document';

	protected $_link = array(
		//描叙
		'article'=>array(
            'mapping_type'      => self::BELONGS_TO,//文档与文章的对应
            'class_name'        => 'article',
            'mapping_name'  => 'article',
            'foreign_key' =>'id',
                   
            ),

		//封面
		'convert'=>array(
            'mapping_type'      => self::BELONGS_TO,//文档与文章的对应
            'class_name'        => 'picture',
            'mapping_name'  => 'picture',
            'foreign_key' =>'cover_id',
                   
            ),
		);


	 public function lists($category, $order = '`level` DESC', $status = 1, $field = true){
        $map = $this->listMap($category, $status);
        return $this->relation(true)->field($field)->where($map)->order($order)->select();
    }

    public function detail($id)
    {
        # code...
        return $this->relation(true)->field(true)->find($id);
    }



    /**
     * 设置where查询条件
     * @param  number  $category 分类ID
     * @param  number  $pos      推荐位
     * @param  integer $status   状态
     * @return array             查询条件
     */
    private function listMap($category, $status = 1, $pos = null){
        /* 设置状态 */
        $map = array('status' => $status, 'pid' => 0);

        /* 设置分类 */
        if(!is_null($category)){
            if(is_numeric($category)){
                $map['category_id'] = $category;
            } else {
                $map['category_id'] = array('in', str2arr($category));
            }
        }

        $map['create_time'] = array('lt', NOW_TIME);
        $map['_string']     = 'deadline = 0 OR deadline > ' . NOW_TIME;

        /* 设置推荐位 */
        if(is_numeric($pos)){
            $map[] = "position & {$pos} = {$pos}";
        }

        return $map;
    }
}

 ?>