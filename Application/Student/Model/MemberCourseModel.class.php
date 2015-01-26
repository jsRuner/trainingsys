<?php 
namespace Student\Model;
use Think\Model;

/**
* 课程的模型
*/
class MemberCourseModel extends Model
{
    protected $tableName ='member_course';

  
	
	

    
    /**
     * 2014年12月22日 11:10:11 删除数据
     * 
     * @return [type] [description]
     */
    public function deleteData($cid='')
    {
       
        # code...
        $map['uid'] = session('user_auth')['uid'];
        $map['cid'] = $cid;
        $res = $this->where($map)->delete();
        if($res){
            return '操作成功';
        }
        return '操作失败';

    }

   

}

 ?>