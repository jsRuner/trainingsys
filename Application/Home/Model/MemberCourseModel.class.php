<?php 
namespace Home\Model;
use Think\Model;
/**
* 学员课程模型
*/
class MemberCourseModel	 extends Model
{
	protected $tableName ='member_course';

	/**
	 * 检查是否已经收藏
	 * @return boolean [description]
	 */
	public function isLearned($cid='')
	{
		if($cid ==''){
			return false;
		}

		$cid  =intval($cid);
		# code...
		$map =array(
			'uid' =>session('user_auth')['uid'],
			'cid' =>$cid,
			);

		$res = $this->where($map)->find();

		if($res){
			return true;
		}
		
		return false;
	}

	/**
	 * 添加课程到本人学习记录中
	 */
	public function addLearn($cid = '')
	{
		# code...
		
		if($cid ==''){
			return false;
		}

		$cid = intval($cid);
		

		$data = array(
			'uid' => session('user_auth')['uid'],
			'cid' => $cid,
			);
		


		if($this->create($data)){

			$res = $this->add();
			return $res;
		}
		

		return false;
	}

}

 ?>