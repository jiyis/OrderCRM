<?php
namespace Admin\Common\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){
		if(session('uid')==''){ 
			$this->redirect(MODULE_NAME.'/Login/index');
		}
	}	
}