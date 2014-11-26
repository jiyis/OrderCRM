<?php
/**
 * Created by jiyi.
 * Name: 
 * Date: 14-9-4
 * Time: 下午2:06
 */

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index() {
        if(!session('homeuid')){
            $this->display();
        }else{
            $this->redirect('/Home/Index/index/');
        }

    }
    //检查登录用户名密码
    public function checkLogin(){
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
        $User=M('user');
        $username=I('name');
        $row=$User->field(array('id','salt','password','nickname','department','userpic'))->where(array('username'=>$username))->find();
        if(!$row) {
            $data['status']  = 101;
            $data['msg'] = '用户名错误';
            $this->ajaxReturn($data);
            die;
        }
        $password=I('password');
        //echo $password;die();
        if(md5($password.$row['salt'])==$row['password']){

            $homeuid=$row['id'];
            session('homeuid',$homeuid);  //设置session
            session('nickname',$row['nickname']);//设置昵称缓存
            session('username',$username);
            session('department',$row['department']);//设置部门缓存
            session('userpic',$row['userpic']);//设置头像缓存
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
        $Verify->fontttf = '4.ttf';
        $Verify->fontSize = 18;
        $Verify->imageW = 120;
        $Verify->imageH = 32;
        $Verify->length   = 4;
        $Verify->entry();
    }
    //注销登录，销毁session
    public function logout(){
        //print_r($_SESSION);die();
        session(null);
       // session('homeuid',null); // 删除name
        $this->redirect('Login/index');
    }
} 