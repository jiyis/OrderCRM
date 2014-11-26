<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index() {
		if(!session('uid')) {
			$this->display();
		}else{
			$this->redirect('/Admin/Index/index');
		}
	}

	//检验登录的用户名和密码
	public function checkLogin() {
        if(!IS_POST) E('页面不存在');
		// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
		$code=I('post.verify');

		$verify = new \Think\Verify();
		if(!$verify->check($code,'')){
			//E('验证码错误！');
			$data['status']  = 103;
			$data['msg'] = '验证码错误';
			$this->ajaxReturn($data);
			die;
		}
		$name=I('post.username','','htmlspecialchars');
		$User=M('admin');
		$row=$User->field(array('id','salt','password'))->where(array('username'=>$name))->find();
		if(!$row) {
			//E('用户名或者密码错误！');
			$data['status']  = 101;
			$data['msg'] = '用户名错误';
			$this->ajaxReturn($data);
			die;
		}
		$password=I('post.password','','htmlspecialchars');
		//echo $password;die();
		if(md5($password.$row['salt'])==$row['password']){
			$uid=$row['id'];
			session('uid',$uid);  //设置session
			//$this->redirect('Index/index');
			$data['status']  = 100;
			$data['msg'] = '登录成功';
			$this->ajaxReturn($data);
		}else{
			//E('用户名或者密码错误！');
			$data['status']  = 102;
			$data['msg'] = '密码错误';
			$this->ajaxReturn($data);
		}
	}
	//验证码类
	public function verify(){
    	$Verify = new \Think\Verify();
		// 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
		$Verify->fontttf = '5.ttf'; 
		$Verify->fontSize = 14;
		$Verify->imageW = 96;
		$Verify->imageH = 30;
		$Verify->length   = 4;
		$Verify->entry();
	}
	//注销登录，销毁session
	public function logout(){
		//print_r($_SESSION);die();
		session_destroy();
		$this->redirect('Index/index');
	}
	
}