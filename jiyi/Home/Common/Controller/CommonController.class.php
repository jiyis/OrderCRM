<?php
/**
 * Created by jiyi.
 * Name: RBAC权限判断以及初始化变量
 * Date: 14-9-4
 * Time: 下午2:01
 */
namespace Home\Common\Controller;
use Think\Controller;
class CommonController extends Controller {
    public $uid;
    //private $group;
    public function _initialize() {
        if(session('homeuid')==''){
            $this->redirect('/login');
        }else{
            $this->menunum=I('num');
            $this->uid=session('homeuid');
            //$this->group=getGroup($this->uid);
        }
    }

} 