<?php 
namespace Student\Controller;

/**
* 信息控制器
*/
class SettingController extends StudentController
{
	
	
	public function setInfo()
	{
		# code...
		$this->display();
	}

	public function setPhoto(  $step=1 ) {
		// code...
		$Course = D( 'Member' );
		$res = $Course->getMemberPhoto(UID);
		$this->assign( 'memberData', $res );
		// code...
		if ( $step==1 ) {
			// code...
			
			$this->display( 'photo' );
		} else {
			// code...
			$this->display();
		}
	}

	/**
	 * 图片处理插件的异步地址。
	 *
	 * @return [Array] [上传后的状态]
	 */
	public function flashUpFile() {
		$id = UID;

		$rs =array();
		$path = "./Uploads/Picture/";
		if ( !file_exists( $path ) ) {
			//创建文件目录
			mkdir( $path );
		}
		//生成唯一id
		$filename = uniqid();
		$file_src = $filename."src.png";
		$filename162 = $filename."1.png";
		$filename48 = $filename."2.png";
		$filename20 = $filename."3.png";
		$src=base64_decode( $_POST['pic'] );
		$pic1=base64_decode( $_POST['pic1'] );
		$pic2=base64_decode( $_POST['pic2'] );
		$pic3=base64_decode( $_POST['pic3'] );
		if ( true ) {
			file_put_contents( $path.$file_src, $src );
		}
		file_put_contents( $path.$filename162, $pic1 );
		file_put_contents( $path.$filename48, $pic2 );
		file_put_contents( $path.$filename20, $pic3 );
		$rs['status'] = 1;
		//去掉路径的.
		$path = substr( $path, 1 );
		$data = array(
			'photo' =>$path.$file_src,
			'small_photo'=>$path.$filename20,
			'middle_photo'=>$path.$filename48,
			'large_photo'=>$path.$filename162,
		);
		$Course =D( 'Member' );
		$res  = $Course->setPhoto( $id, $data );

		 if($res){
            $user               =   session('user_auth');
            $user['middle_photo']   =   $data['middle_photo'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));
           
        }
		echo json_encode( $rs );
	}


}

 ?>