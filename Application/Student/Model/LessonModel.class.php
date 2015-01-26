<?php
namespace Student\Model;
use Think\Model;

// +----------------------------------------------------------------------
// | descript:
// +----------------------------------------------------------------------
// | create_time: 15-1-9 上午10:00
// +----------------------------------------------------------------------
// | Author: jsRunner <hi_php@163.com> <http://www.cnblogs.com/jsRunner/>
// +----------------------------------------------------------------------


 
class LessonModel extends  Model{
    protected $tableName='course_lesson';

    /**
     * 根据id获得课时标题
     * @param $id 课时id
     * @return array 结果
     */
    public function getTitle($id){
        return $this->field('id,title')->find($id);
    }
}
 