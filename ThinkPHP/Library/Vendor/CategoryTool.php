<?php 

/**
 * 无限分类。网友提供
 * 2014年12月11日 15:44:21
 * 来源：http://www.thinkphp.cn/code/170.html
 */
class CategoryTool {
    static public $treeList = array(); //存放无限分类结果如果一页面有多个无限分类可以使用 Tool::$treeList = array(); 清空
    /**
     * 无限级分类
     * @access public 
     * @param Array $data     //数据库里获取的结果集 
     * @param Int $pid             
     * @param Int $count       //第几级分类
     * @return Array $treeList   
     */
    static public function tree(&$data,$pid = 0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['Pid']==$pid){
                $value['Count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['Id'],$count+1);
            } 
        }
        return self::$treeList ;
    }
    
}
 ?>