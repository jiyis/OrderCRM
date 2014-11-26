<?php
/**
 * Created by PhpStorm.
 * User: Gary.F.Dong
 * Date: 14-10-31
 * Time: 下午11:40
 * Desc: ******
 */

namespace Admin\Controller;
use Admin\Common\Controller\CommonController;


class OrderController extends CommonController {
    public function index() {
        $this->display();
    }
    /**
     * 设计要求列表页面
     */
    public function listdesign() {
        $oid=I('oid');
        $ordername=I('ordername');
        $this->ordername=$ordername;
        $this->url=U('Order/listdesignHandel',array('oid'=>$oid,'ordername'=>$ordername));
        $this->display();
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
                $count = $Order->where(array('suppsubmit'=>0))->count();//统计记录
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
                $row = $Order->where(array('suppsubmit'=>0,'recycle'=>0))->order($order)->limit($start.','.$limit)->select();
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
                    $responce->rows[$i]['id']=$row[$i]['id'];
                    $responce->rows[$i]['cell']=array($row[$i]['ordername'],$row[$i]['username'],$row[$i]['tel'],$row[$i]['address'],$row[$i]['process'],$uploadbtn,'',$designBtn);
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
                $count = $Design->where(array('oid'=>$oid))->count();//统计记录
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
                $row = $Design->where(array('oid'=>$oid,'recycle'=>0))->order($order)->limit($start.','.$limit)->select();
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

} 