<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    //'MODULE_DENY_LIST'   => array('Common','User','Admin','Install','Student','Teacher'),
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '}i2$"HD+XydlwTIVMF[3P|%r&5z^{(eWU9a0<!G8', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */
    /*2014年12月17日 09:50:01 在上传的视频时url参数难以加入，这里修改为普通url*/
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    //'URL_MODEL'            => 0, //URL模式
   
    
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'trainingsys', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'wg_', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),

    //'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    //'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    //'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    //'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
    'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息
    'SHOW_PAGE_TRACE' =>true, 

    //日志配置
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式

      //邮件配置
  'THINK_EMAIL' => array(
    'SMTP_HOST'   => 'smtp.yeah.net', //SMTP服务器
    'SMTP_PORT'   => '25', //SMTP服务器端口
    'SMTP_USER'   => 'doudouchidou@yeah.net', //SMTP服务器用户名
    'SMTP_PASS'   => 'q1w2e3r4t5', //SMTP服务器密码
    'FROM_EMAIL'  => 'doudouchidou@yeah.net', //发件人EMAIL
    'FROM_NAME'   => '万工教育', //发件人名称
    'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
    'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
 ),
);
