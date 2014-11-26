<?php
/**
 * Created by jiyi.
 * Name: 用户修改密码等系统操作
 * Date: 14-9-23
 * Time: 下午4:46
 */

namespace Home\Controller;
use Home\Common\Controller\CommonController;

class SystemController extends CommonController {
    public function edit() {
        $this->display();
    }

    public function changepwd() {
        $uid=I('post.uid');
        $User=M('user');
        $row=$User->where(array('id'=>$uid))->field('salt,password')->find();
        $oldpwd=md5(I('post.oldpwd').$row['salt']);
        if($oldpwd!=$row['password']){
            $data['status']  = 102;
            $data['msg'] = '原来密码输入错误';
            $this->ajaxReturn($data);
            exit;
        }
        $newpwd=md5(I('post.newpwd').$row['salt']);
        $datarow=array(
            'id'=>$uid,
            'password'=>$newpwd
        );
        if($User->data($datarow)->save()){
            $data['status']  = 100;
            $data['msg'] = '密码修改成功';
            $this->ajaxReturn($data);
        }else{
            $data['status']  = 101;
            $data['msg'] = '密码更新失败';
            $this->ajaxReturn($data);
        }
    }

} 