<?php
namespace Admin\Controller;
use Admin\Common\Controller\CommonController;
class UserController extends CommonController {
	private $page;
    private $limit;
    private $sidx;
    private $sord;
	public function index() {
		$array['menunum']=I('num');
		$this->assign($array);
		$this->display();
	}
	/**
	 * 处理添加用户的函数
	 */
	public function addhandle() {
		//print_r($_FILES["userpic"]);die;
		if(!IS_POST) E('页面不存在');
		$username=I('post.username');//获取用户名
		$nickname=I('post.nickname');//获取真实姓名
		$password=I('post.password');//获取密码
		$department=I('post.department');//获取用户部门
		$userpic = I('userpic');//获取用户头像
		$status=empty(I('post.status')) ? 1 : 0;
		//加载的就是Common目录下的user.php,@只本目录下的　
		load('Common/string'); 
		$salt=create_str();
		$password=md5($password.$salt);
        //判断数据库中用户名是否存在了
        $Member = M('user');
        $data = $Member->where(array('username'=>$username))->find();
        if($data!=''){
            $data['status'] = 0;
            $data['msg'] = '用户名已存在,请更换';
            echo json_encode($data);
            die();
        }
        if($_FILES["userpic"]!=''){
        	//下面是生成重命名图片的方法
	    	$less=time()-strtotime('2014-5-10'); 
	    	$less = base64_encode($less);
	    	$randomnum = rand(100,999);
	    	$userpicname = $username.$less.$randomnum;
	    	$kuozhan_name=end(explode('.', $_FILES["userpic"]["name"]));//上传的图片的扩展名
	    	$userpic = $userpicname.'.'.$kuozhan_name;//最终重命名的文件名
	    	$max_file_size = 300000;//字节单位，不能超过300kb
	    	//上传头像图片
	    	if(!is_uploaded_file($_FILES["userpic"][tmp_name])) {
	            $data['status'] = 0;
	            $data['msg'] = '上传失败';
	            echo json_encode($data);
	    		exit;
	    	} 
	    	$file = $_FILES["userpic"];  
		    if($max_file_size < $file["size"]){  //检查文件大小
	            $data['status'] = 0;
	            $data['msg'] = '文件太大';
	            echo json_encode($data);    
		        exit;  
		    }
		    $filepath = __ROOT__."upload/userpic/";
		   	$file = $_FILES["userpic"][tmp_name];
		    if(!move_uploaded_file($file,$filepath.$userpic )) {  
	            $data['status'] = 0;
	            $data['msg'] = '移动文件出错';
	            echo json_encode($data);
		        exit;  
		    }
		    $userpic= $filepath.$userpic;
        }else{
        	$userpic='';
        }
    	
	    $data = array(
	    	'username' => $username,
	    	'nickname' => $nickname,
	    	'password' => $password,
	    	'salt' => $salt,
	    	'userpic' => $userpic,
	    	'department' => $department,
	    	'status' => $status,
	    	'logintime' => time(),
	    	'loginip' => get_client_ip()
	    );
	    if($Member->add($data)){
            $data['status'] = 1;
            $data['msg'] = '添加用户成功';
            echo json_encode($data);
            //echo '{ message: "添加成功" }';
	    }else{
            $data['status'] = 0;
            $data['msg'] = '添加用户失败';
            echo json_encode($data);
	    }
	}
	/**
	 * 用户列表编辑
	 */
	public function edit() {
		$array['menunum']=I('num');
		$this->assign($array);
		$this->display();
	}
	/**
	 * 
	 */
    //显示订单信息
    public function showUser(){
        $oper=I('oper');//获取jqgrip中用户点击的动作，默认的是list,add,edit,delete
        if(I('search')=='true') {$oper='search';}
        $this->page = I('page','','htmlspecialchars'); 
        $this->limit = I('rows','','htmlspecialchars'); 
        $this->sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式 
        $this->sord = I('sord');
        $order=$this->sidx.' '.$this->sord;
        switch($oper){
            case 'add' ://添加数据
                $this->addOrder();
                break;
            case 'edit' :
                $this->editOrder();
                break;
            case 'del' :
                $this->deleteOrder();
                break;
            case 'search' :
                $this->searchOrder();
                break;
            default :
                if(!$this->sidx) $this->sidx =1; 
                $User=M('user');
                $count = $User->count();//统计记录
                $Page = new \Think\Page($count,$this->limit);// 实例化分页类 传入总记录数和每页显示的记录数
                $row = $User->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
                $i=0;
                while($i<$count) {
                    $responce->rows[$i]['id']=$row[$i]['id'];
                    $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['username'],$row[$i]['nickname'],$row[$i]['department'],date('Y-m-d',$row[$i]['logintime']),$row[$i]['loginip'],$row[$i]['status']);
                    $i++;
                }
                echo json_encode($responce);
                break;

        }
       

    }
    //添加订单信息
    private function addUser() {
        $Order=M('order');
        $data=I('','','htmlspecialchars');//获取post过来的值
        unset($data['oper']);
        $data['updatetime']=time();
        $data['inserttime']=time();
        $data['starttime']=strtotime($data['starttime']);
        $data['endtime']=strtotime($data['endtime']);
        if($Order->data($data)->add()){
            echo "{success:true,message:'插入成功'}"; 
        }else{
            echo "{success:false,message:'插入失败'}"; 
        }

    }
    //修改订单信息
    private function editUser() {
        $Order=M('order');
        $data=I('','','htmlspecialchars');//获取post过来的值
        unset($data['oper']);
        $data['updatetime']=time();
        $data['starttime']=strtotime($data['starttime']);
        $data['endtime']=strtotime($data['endtime']);
        if($Order->save($data)){
            echo "{success:true,message:'更新成功'}"; 
        }else{
            echo "{success:false,message:'更新失败'}"; 
        }
    }
        
    //删除订单信息
    private function deleteUser() {
        $id=I('id','','htmlspecialchars');
        $Order=M('order');
        if($Order->where(array('id'=>$id))->delete()){
            echo "{success:true,message:'删除成功'}"; 
        }else{
            echo "{success:false,message:'删除失败'}";
            //$this->redirect('Index/main');
        }
    }
    //查询订单信息
    private function searchOrder() {
        $search_name = I('search_name','','htmlspecialchars');
        $value = I('value','','htmlspecialchars'); 
        $condition[$search_name] = array('like',$value);
        if(!$this->sidx) $this->sidx =1; 
        $order=$this->sidx.' '.$this->sord;
        $where = '';
        if(!empty($value)) 
            $where .= " and ".$search_name." like '%".$value."%'";
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $result = $Model->query("select count(*) as count from bixiu_user where id>0 ".$where);
        $count = $result[0]['count']; //获取总记录数 
        if($count!=0){
            $Page = new \Think\Page($count,$this->limit);// 实例化分页类 传入总记录数和每页显示的记录数
            $Order = M('user');
            $condition = "%".$value."%";
            $map[$search_name] = array('like',$condition);
            $row = $Order->where($map)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
            $i=0;
            while($i<$count) {
                $responce->rows[$i]['id']=$row[$i]['id'];
                 $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['username'],$row[$i]['nickname'],$row[$i]['department'],date('Y-m-d',$row[$i]['logintime']),$row[$i]['loginip'],$row[$i]['status']);
                $i++;
            }
            echo json_encode($responce);
        }else{
            $responce['status'] = '0';
            echo json_encode($responce);; 
        }
    }
    //处理日志进程的模版
    public function calendar() {
        $this->display();
    }

    
}