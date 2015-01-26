<?php
namespace Home\Controller;



use OT\DataDictionary;

/**
* 前台首页控制器
* 主要获取首页聚合数据
*/
class IndexController extends HomeController
{

  //系统首页
public function index()
{
/*
    p($_SESSION);
     p(S('sys_user_nickname_list'));*/
  /*   var_dump($_SESSION);
    die();*/


      //轮播的数据

  $lunboList = D('lunbo')->lists();


      //首页课程的数据
  $indexCourseList = D('CourseRelation')->listsByIndex();


  $this->assign('lunboList', $lunboList);
  $this->assign('CourseList', $indexCourseList);

  $this->display();
}

  /**
   * 公司介绍文章的读取
   *
   */
    public function about($id)
    {
      # code...
     $res = D('DocumentArticle')->detail($id);
     $res01 = D('Category')->info($res['category_id']);

     $this->assign('article',$res);
     $this->assign('info',$res01);


     
     $this->display();
   }
  /**
   * 公司协议与隐私文章的读取
   */
  public function xieyi($id)
  {
    # code...
    $res = D('DocumentArticle')->detail($id);
    $this->assign('info',$res);
    $this->display();
  }


}