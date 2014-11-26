<?php
/**
 * Created by jiyi.
 * Name: 采购部门处理函数
 * Date: 14-9-19
 * Time: 上午10:32
 */

namespace Home\Controller;
use Home\Common\Controller\CommonController;

class BuyController extends CommonController {

    //默认显示待审核的订单把
    public function index() {
        $this->display();
    }
    //显示可以审核的订单函数
    public function listHandel(){
        if(!IS_REQUEST) die;
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
        if(!$sidx) $sidx =1;
        //$Order=M('order');
        $where=array(
            'salsubmit'=>1,
            'dessubmit'=>1,
            'pursubmit'=>0,
        );
        $Order=D('ArtRelation');
        //$rowss=$Order->relation(true)->where($where)->select();
        $count = $Order->relation(true)->where($where)->count();//统计记录
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
       /* $Page = new \Think\Page($count,$this->limit);// 实例化分页类 传入总记录数和每页显示的记录数
        $row = $Order->relation(true)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();*/
        $row = $Order->relation(true)->where($where)->order($order)->limit($start.','.$limit)->select();
        $responce->page =  $page;  //当前页
        $responce->total = $total_pages; //总页数
        $responce->records = $count; //总记录数
        $i=0;
        while($i<count($row)) {
            $htmls='';
            $oid=$row[$i]['id'];
            //$url=U('Art/listdesign',array('num'=>2,'oid'=>$oid,'ordername'=>$row[$i]['ordername']));
            $submitorder="<button class=\"btn btn-success submitOrder\" id=".$oid." onclick=\"showmsg('submit','确定要审核此单吗？（一旦接受单将要在规定时间内完成）',".$oid.")\">审核订单</button>";
            $backorder= "<button class=\"btn btn-danger backOrder\" id=".$oid." onclick=\"showmsg('reject','确定要驳回此单吗？（一旦驳回订单将返回设计部门）',".$oid.")\">驳回订单</button>";
            $submit=$backorder.$submitorder;
            //$seemore="<button class=\"btn btn-primary\" onclick=\"golist('".$url."')\">查看订单详情</button>";
            $picss=explode("::::::",$row[$i]['resultpics']);
            foreach($picss as $k=>$v){
                $thubpic=explode("||||||",$v)[0];
                $bigpics=explode("||||||",$v)[1];
                $htmls.='<li><a href="'.$bigpics.'" data-rel="colorbox" onclick="clickpics()" bigpic="'.$bigpics.'" thumbpic="'.$thubpic.'"><img class="resultpics" src="'.$thubpic.'" /></a></li>';
            }
            $uploadbtn="<ul class='ace-thumbnails'>".$htmls."</ul>";

            $responce->rows[$i]['id']=$row[$i]['id'];
            $responce->rows[$i]['cell']=array($row[$i]['ordername'],$row[$i]['salesname'],$row[$i]['process'],$row[$i]['salesTel'],date('Y-m-d',$row[$i]['createtime']),date('Y-m-d',$row[$i]['deliverytime']),$uploadbtn,$submit);
            $i++;
        }
        $responce=empty($responce) ? 0 : $responce;
        echo json_encode($responce);
    }
    ///采购部门审核订单
    public function submitOrder() {
        if(!IS_POST) E('非法页面');
        $method=I('post.method');
        if($method=='reject'){
            $process='采购部已驳回订单，<br>正在等待设计';
            $pursubmit=0;
            $dessubmit=0;
        }else{
            $process='采购部已审核，<br>正在等待供应商审核';
            $pursubmit=1;
            $dessubmit=1;
        }
        $Order=M('order');
        $data=array(
            'id'=>I('id'),
            'pursay'=>I('con'),
            'pursubmit'=>$pursubmit,
            'process'=>$process,
            'dessubmit'=>$dessubmit
        );
        if($Order->save($data)){
            $status=1;
        }else{
            $status=0;
        }
        $this->ajaxReturn($status);
    }
    ////已经完成的订单
    public function complete() {
        $Order=M('order');
        $listrows=$Order->where(array('pursubmit'=>1))->select();
        $arr=array();
        foreach($listrows as $v){
            $htmls='';
            //$url=U('Buy/listdesign',array('num'=>2,'desid'=>$this->uid,'oid'=>$v['id'],'ordername'=>$v['ordername']));
            //$v['seemore']= "<a style=\"cursor:pointer;\" onclick=\"golist('".$url."')\">查看订单详情</a>";
            $picss=explode("::::::",$v['resultpics']);
            foreach($picss as $vv){
                $thubpic=explode("||||||",$vv)[0];
                $bigpics=explode("||||||",$vv)[1];
                $htmls.='<img class="resultpics" src="'.$thubpic.'" />';
            }
            $v['img']= $htmls;
            $v['result']= "<button class=\"btn disabled\" onclick=\"showmsg('点击了')\">已审核</button>";
            $arr[]=$v;
        }

        $this->list=$arr;
        $this->display();
    }
} 