<?php
/**
 * 订单的添加修改和处理
 */
namespace Home\Controller;
use Home\Common\Controller\CommonController;

class OrderController extends CommonController {

    public function index() {
        $User=M('user');
        $rowSupp=$User->where(array('department'=>'供应商'))->field('id,username,nickname')->order('id asc')->select();
        if(empty($rowSupp)){
            $this->error('请先让管理员添加供应商',U('Order/index',array('num'=>1)));
        }
        $this->rowSupp=$rowSupp;
        $this->display();
    }

    /**
     * 添加要求页面
     */
    public function design() {
        $Order=M('order');
        /*$rowOrder=$Order->field('ordername,id')->order('id asc')->select();
        if(empty($rowOrder)){
            $this->error('请先添加订单',U('Order/index',array('num'=>1)));
        }
        $this->rowOrder=$rowOrder;*/
        $oid=I('oid');
        $this->oid=$oid;
        $this->display();
    }
    /**
     * 订单列表页面
     */
    public function listorder() {
        $this->display();
    }

    /**
     * 设计要求列表页面
     */
    public function listdesign() {
        $oid=I('oid');
        $ordername=urldecode(I('ordername'));
        //echo $ordername;die;
        $this->ordername=$ordername;
        $this->url=U('Order/listdesignHandel',array('oid'=>$oid,'ordername'=>$ordername));
        $this->display();
    }
    /**
     * 处理添加订单的函数
     */
    public function addhandle() {
        if(!IS_POST) E('页面不存在');
//        dump(I());die;
        $userRow=M('user')->where(array('id'=>$this->uid))->getField('department,nickname');//取得用户所在的部门和姓名
        $ordername=I("ordername");
        $data = M('order')->field('id')->where(array('ordername'=>$ordername))->find();
        if($data!=''){
            $data['status'] = 0;
            $data['msg'] = '订单名已存在,请更换';
        }else{
            $Order=D('Order'); //实例化User模型
            if(!$Order->create()){ //创建数据对象，并且自动完成
//            exit($User->getError());//输出错误
                $data['status'] = 0;
                $data['msg'] = '创建数据类型失败，请重试';
            }else{
                $Order->uid=$this->uid;
                $Order->department=array_keys($userRow)[0];
                $Order->salesname=array_values($userRow)[0];
                if($lastid=$Order->add()){
                    $oid=$lastid;
                    $data['url']=U('Order/design',array('num'=>1,'oid'=>$oid));
                    $data['status'] = 1;
                    $data['msg'] = '添加订单成功';
                }else{
                    $data['status'] = 0;
                    $data['msg'] = '添加订单失败';
                }
            }
        }
        echo json_encode($data);
    }


    /**
     *    //显示订单信息
     */
    public function listHandel(){
        $oper=I('oper');//获取jqgrip中用户点击的动作，默认的是list,add,edit,delete
        if(I('search')=='true') {$oper='search';}
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
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
                if(!$sidx) $sidx =1;
                $Order=M('order');
                $count = $Order->where(array('uid'=>$this->uid))->count();//统计记录
                //根据记录数分页
                if ($count > 0) {
                    $total_pages = ceil($count / $limit);
                } else {
                    $total_pages = 0;
                }
                if ($page > $total_pages)
                    $page = $total_pages;
                $start = $limit * $page - $limit;
                if ($start < 0 ) $start = 0;
                //$Page = new \Think\Page($count,$limit);// 实例化分页类 传入总记录数和每页显示的记录数
                //$row = $Order->where(array('uid'=>$this->uid,'recycle'=>0))->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
                $row = $Order->where(array('uid'=>$this->uid,'recycle'=>0))->order($order)->limit($start.','.$limit)->select();
                $responce->page =  $page;  //当前页
                $responce->total = $total_pages; //总页数
                $responce->records = $count; //总记录数
                $i=0;
                while($i<count($row)) {
                    $oid=$row[$i]['id'];
                    $ordername=$row[$i]['ordername'];
                    $gourl=U('Order/listdesign',array('num'=>1,'oid'=>$oid,'ordername'=>$ordername));
                    if(!$row[$i]['salsubmit']){
                        $submit="<button class=\"btn btn-success submitOrder\" id=".$oid." onclick=\"showmsg('确定要下单吗？（一旦下单将无法更改）',".$oid.")\">下单</button>";
                    }
                    else{$submit="<button class=\"btn disabled\" onclick=\"showmsg('点击了')\">已下单</button>";}
                    $designBtn="<button class=\"btn btn-primary designBtn\" onclick=\"golist('$gourl')\" >查看设计要求</button>";
                    //if(!$row[$i]['status']){$status='正常';}else{$status='已锁定';}
                    if(!empty($row[$i]['resultpics'])){
                       $picss=explode("::::::",$row[$i]['resultpics']);
                        $htmls='';
                        foreach($picss as $k=>$v){
                            $thubpic=explode("||||||",$v)[0];
                            $bigpics=explode("||||||",$v)[1];
                            $htmls.='<li><a href="'.$bigpics.'" data-rel="colorbox" onclick="clickpics()" bigpic="'.$bigpics.'" thumbpic="'.$thubpic.'"><img class="resultpics" src="'.$thubpic.'" /></a></li>';
                        }
                        $uploadbtn="<ul class='ace-thumbnails'>".$htmls."</ul>";
                    }else{
                        $uploadbtn="<div style='margin:0 atuo;text-align:center;font-weight:bolder;'>暂无设计效果图</div>"; 
                    }
                    
                    //date('Y-m-d',$row[$i]['createtime']),
                    $agreement='未签订';
                    if($row[$i]['agreement']) $agreement='已签订';
                    $responce->rows[$i]['id']=$row[$i]['id'];
                    $responce->rows[$i]['cell']=array($row[$i]['ordername'],$row[$i]['username'],$row[$i]['tel'],$row[$i]['address'],$agreement,$row[$i]['process'],$uploadbtn,'',$designBtn,$submit);
                    $i++;
                }
                $responce=empty($responce) ? 0 : $responce;
                echo json_encode($responce);
                break;

        }


    }
    /**
     *请求显示设计要求信息函数
     */
    public function listdesignHandel(){
        $oid=I('get.oid');
        $oper=I('oper');//获取jqgrip中用户点击的动作，默认的是list,add,edit,delete
        if(I('search')=='true') {$oper='search';}
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
        switch($oper){
            case 'add' ://添加数据
                $ordername=I('get.ordername');
                $this->adddesignhandle($ordername);
                break;
            case 'edit' :
                $this->editAjaxDesign();
                break;
            case 'del' :
                $this->deleteAjaxDesign();
                break;
            case 'search' :
                $this->searchOrder();
                break;
            default :
                if(!$sidx) $sidx =1;
                $Design=M('design');
                $count = $Design->where(array('uid'=>$this->uid,'oid'=>$oid))->count();//统计记录
                //根据记录数分页
                if ($count > 0) {
                    $total_pages = ceil($count / $limit);
                } else {
                    $total_pages = 0;
                }
                if ($page > $total_pages)
                    $page = $total_pages;
                $start = $limit * $page - $limit;
                if ($start < 0 ) $start = 0;
                /*$Page = new \Think\Page($count,$this->limit);// 实例化分页类 传入总记录数和每页显示的记录数
                $row = $Design->where(array('uid'=>$this->uid,'oid'=>$oid,'recycle'=>0))->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();*/
                $row = $Design->where(array('uid'=>$this->uid,'oid'=>$oid,'recycle'=>0))->order($order)->limit($start.','.$limit)->select();
                $responce->page =  $page;  //当前页
                $responce->total = $total_pages; //总页数
                $responce->records = $count; //总记录数
                $i=0;
                while($i<count($row)) {
                    $responce->rows[$i]['id']=$row[$i]['id'];
                    $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['style'],$row[$i]['numbers'],$row[$i]['require'],$row[$i]['sendMethond'],date('Y-m-d',$row[$i]['designTime']),date('Y-m-d',$row[$i]['deliveryTime']),$row[$i]['remarks']);
                    $i++;
                }
                $responce=empty($responce) ? 0 : $responce;
                echo json_encode($responce);
                break;
        }
    }

    /**
     * 处理添加设计要求的函数
     */
    public function adddesignhandle($ordername='') {
        if(!IS_POST) E('页面不存在');
        //if($ordername!=''){ $ordername=$ordername;}else{$ordername=I('ordername');}
        //$data = M('order')->field('id')->where(array('ordername'=>$ordername))->find();
        $Design=D('Design'); //实例化Design模型
        if(!$Design->create()){ //创建数据对象，并且自动完成
            $data['status'] = 0;
            $data['msg'] = '创建数据类型失败，请重试';
        }else{
            $Design->uid=$this->uid;
            //$Design->oid=$data['id'];
            if($Design->add()){
                $data['status'] = 1;
                $data['msg'] = '添加设计要求成功';
            }else{
                $data['status'] = 0;
                $data['msg'] = '添加设计要求失败';
            }
        }
        echo json_encode($data);
    }
    //处理编辑订单信息
    public function editAjaxDesign() {
        if(!IS_POST) E('页面不存在');
        $Design=M('design'); //实例化Design模型
        if(!$Design->create()){ //创建数据对象，并且自动完成
            $data['status'] = 0;
            $data['msg'] = '创建数据类型失败，请重试';
        }else{
            $Design->uid=$this->uid;
            $Design->deliveryTime=strtotime(I('deliveryTime'));
            $Design->designTime=strtotime(I('designTime'));
            if($Design->save()){
                $data['status'] = 1;
                $data['msg'] = '更新设计要求成功';
            }else{
                $data['status'] = 0;
                $data['msg'] = '更新设计要求失败';
            }
        }
        echo json_encode($data);
    }

    //删除订单信息
    private function deleteAjaxDesign() {
        $id=I('id');
        $Design=M('design'); //实例化Design模型
        if($Design->where(array('id'=>$id))->delete()){
            $data['status'] = 1;
            $data['msg'] = '删除设计要求成功';
        }else{
            $data['status'] = 0;
            $data['msg'] = '删除设计要求失败';
        }
        echo json_encode($data);
    }
    //处理订单的ajax修改函数
    private function editOrder() {
        $Order=D('order');
        if(!$Order->create()){ //创建数据对象，并且自动完成
            $data['status'] = 0;
            $data['msg'] = '创建订单数据类型失败，请重试';
        }else{
            //dump($Order->create());die;
            //dump($Order->agreement);die;
            if($Order->save()){
                $data['status'] = 1;
                $data['msg'] = '更新订单成功';
            }else{
                $data['status'] = 0;
                $data['msg'] = '更新订单失败';
            }
        }
        echo json_encode($data);
    }
    //处理订单的ajax修改函数
    private function deleteOrder() {
        $id=I('id');
        $Order=M('order');
        if($Order->where(array('id'=>$id))->delete()){
            $data['status'] = 1;
            $data['msg'] = '删除订单成功';
        }else{
            $data['status'] = 0;
            $data['msg'] = '删除订单失败';
        }
        echo json_encode($data);
    }

    //下单按钮处理函数
    public function submitOrder() {
        $id=I('id');
        $Order=M('order');
        $data = array('salsubmit'=>1,'process'=>'已下单，<br>正在等待接单');
        $Order->where(array('id'=>$id))->setField($data);
        $status=1;
        $this->ajaxReturn($status);
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