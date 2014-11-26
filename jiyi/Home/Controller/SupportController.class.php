<?php
/**
 * Created by jiyi.
 * Name: 供应商确认函数
 * Date: 14-9-22
 * Time: 下午3:48
 */

namespace Home\Controller;
use Home\Common\Controller\CommonController;

class SupportController extends CommonController {

    public function index() {
        $this->display();
    }

    /**
     *请求显示设计要求信息函数
     */
    public function listHandel(){
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
        if(!$sidx) $sidx =1;
        $Order=D('ArtRelation');
        $count = $Order->relation(true)->where(array('suppid'=>$this->uid,'suppsubmit'=>0,'pursubmit'=>1))->count();//统计记录
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

        $row = $Order->relation(true)->where(array('suppid'=>$this->uid,'suppsubmit'=>0,'pursubmit'=>1))->order($order)->limit($start.','.$limit)->select();
        $responce->page =  $page;  //当前页
        $responce->total = $total_pages; //总页数
        $responce->records = $count; //总记录数
        $i=0;
        while($i<count($row)) {
            $oid=$row[$i]['id'];
            $url=U('Art/listdesign',array('num'=>2,'oid'=>$oid,'ordername'=>$row[$i]['ordername']));
            $submit="<button class=\"btn btn-success submitOrder\" id=".$oid." onclick=\"showmsg('确定接受此订单吗？（一旦接受单将要在规定时间内完成）',".$oid.")\">接受</button>";
            $seemore="<button class=\"btn btn-primary\" onclick=\"golist('".$url."')\">查看订单详情</button>";
            $downurl=U('Support/download',array('oid'=>$oid,'ordername'=>$row[$i]['ordername'],'desid'=>$row[$i]['desid']));
            $downloadurl="<button class=\"btn btn-mini btn-purple\" onclick=\"javascript:window.location.href='".$downurl."'\">下载效果图</button>";
            //显示效果图
            $picss=explode("::::::",$row[$i]['resultpics']);
            foreach($picss as $k=>$v){
                $thubpic=explode("||||||",$v)[0];
                $bigpics=explode("||||||",$v)[1];
                $htmls.='<li><a href="'.$bigpics.'" data-rel="colorbox" onclick="clickpics()" bigpic="'.$bigpics.'" thumbpic="'.$thubpic.'"><img class="resultpics" src="'.$thubpic.'" /></a></li>';
            }
            $showpics="<ul class='ace-thumbnails'>".$htmls."</ul>";
            $responce->rows[$i]['id']=$row[$i]['id'];
            $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['ordername'],$row[$i]['process'],date('Y-m-d',$row[$i]['deliverytime']),$showpics,$seemore,$downloadurl,$submit);
            $i++;
        }
        $responce=empty($responce) ? 0 : $responce;
        echo json_encode($responce);
    }
    //打包下载整个效果图
    public function download() {
        header("Content-type: text/html; charset=utf-8");
        import('Org.Util.FileToZip');
        // 打包下载
        $oid=I('get.oid');
        $ordername=I('ordername');
        $desid=I('desid');
        $username=M('user')->where(array('id'=>$desid))->getField('username');//获取设计师的username
        $cur_file="Public/uploads/upload/".$username.'/orderId-'.$oid.'/bigpics'; //获取打包下载的目录
        if(!file_exists($cur_file)) E('下载出错，请联系管理员');
        $handler = opendir($cur_file);    //$cur_file 文件所在目录
        $download_file = array();
        $i = 0;
        while( ($filename = readdir($handler)) !== false ) {
            if($filename != '.' && $filename != '..') {
                $download_file[$i++] = $filename;
            }
        }
        closedir($handler);
        $zipname=urldecode($ordername).'('.date('Y-m-d',time()).')';
        $scandir=new \traverseDir($cur_file,$save_path,$zipname);    //$save_path zip包文件目录
        $scandir->tozip($download_file);
    }
    //确认接受订单
    public function acceptOrder() {
        $id=I('post.id');//获取订单id
        $Order=M('order');
        $savedate=array(
            'suppsubmit'=>1,
            'process'=>'供应商已确认，<br>订单完成！',
        );
        $submitset=$Order->where(array('id'=>$id))->setField($savedate);
        if($submitset){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $this->ajaxReturn($data);
    }
    //已经完成的订单
    public function complete() {
        $Order=M('order');
        $listrows=$Order->where(array('suppid'=>$this->uid,'suppsubmit'=>1))->select();
        $arr=array();
        foreach($listrows as $v){
            $htmls='';
            $url=U('Art/listdesign',array('num'=>2,'desid'=>$this->uid,'oid'=>$v['id'],'ordername'=>$v['ordername']));
            $v['seemore']= "<a style=\"cursor:pointer;\" onclick=\"golist('".$url."')\">查看订单详情</a>";
            $picss=explode("::::::",$v['resultpics']);
            foreach($picss as $vv){
                $thubpic=explode("||||||",$vv)[0];
                $bigpics=explode("||||||",$vv)[1];
                $htmls.='<img class="resultpics" style="padding-left:5px;" src="'.$thubpic.'" />';
            }
            $v['img']= $htmls;
            $v['result']= "<button class=\"btn disabled\" onclick=\"showmsg('点击了')\">已完成</button>";
            $arr[]=$v;
        }

        $this->list=$arr;
        $this->display();
    }
} 