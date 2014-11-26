<?php
/**
 * Created by jiyi.
 * Name: 设计部门订单管理
 * Date: 14-9-11
 * Time: 上午10:02
 */

namespace Home\Controller;
use Home\Common\Controller\CommonController;


class ArtController extends CommonController {

    public function index() {
        $this->display();
    }
    //显示当前订单的设计要求
    public function listdesign() {
        $oid=I('oid');
        $ordername=urldecode(I('ordername'));
        $this->ordername=$ordername;
        $this->url=U('Art/listdesignHandel',array('oid'=>$oid));
        $this->display();
    }
    //查看我的订单函数
    public function myorder(){
        $this->display();
    }
    //显示可以接的订单函数
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
            'desid'=>0,
            'status'=>0,
            'salsubmit'=>array('neq',0),
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
        /*$Page = new \Think\Page($count,$this->limit);// 实例化分页类 传入总记录数和每页显示的记录数
        $row = $Order->relation(true)->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();*/
        $row = $Order->relation(true)->where($where)->order($order)->limit($start.','.$limit)->select();
        $responce->page =  $page;  //当前页
        $responce->total = $total_pages; //总页数
        $responce->records = $count; //总记录数
        $i=0;
        while($i<count($row)) {
            $oid=$row[$i]['id'];
            $url=U('Art/listdesign',array('num'=>2,'oid'=>$oid,'ordername'=>$row[$i]['ordername']));
            $submit="<button class=\"btn btn-success submitOrder\" id=".$oid." onclick=\"showmsg('确定要接此单吗？（一旦接受单将要在规定时间内完成）',".$oid.")\">接单</button>";
            $seemore="<button class=\"btn btn-primary\" onclick=\"golist('".$url."')\">查看订单详情</button>";
            $agreement='未签订';
            if($row[$i]['agreement']) $agreement='已签订';
            $responce->rows[$i]['id']=$row[$i]['id'];
            $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['ordername'],$row[$i]['salesname'],$row[$i]['process'],$row[$i]['salesTel'],date('Y-m-d',$row[$i]['createtime']),date('Y-m-d',$row[$i]['deliverytime']),$agreement,$seemore,$submit);
            $i++;
        }
        $responce=empty($responce) ? 0 : $responce;
        echo json_encode($responce);
    }
    /**
     *请求显示设计要求信息函数
     */
    public function listdesignHandel(){
        $oid=I('get.oid');
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
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
        $row = $Design->where(array('oid'=>$oid,'recycle'=>0))->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();*/
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
    }
    //处理接单的函数
    public function acceptOrder(){
        $oid=I('id');//获取订单id
        $Order=M('order');
        $orderRow=$Order->where(array('id'=>$oid,'salsubmit'=>1,'desid'=>0))->find();
        if(!empty($orderRow)){
            $data=array(
                'desid'=>$this->uid,
                'process'=>'已接单，正在设计中......',
            );
            $Order->where(array('id'=>$oid))->setField($data);
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $this->ajaxReturn($data);
    }
    //处理交单函数
    public function submitOrder() {
        $id=I('post.id');//获取订单id
        $Order=M('order');
        $savedate=array(
            'dessubmit'=>1,
            'process'=>'已设计完成，<br>正在等待采购部审核',
        );
        $submitset=$Order->where(array('id'=>$id))->setField($savedate);
        if($submitset){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $this->ajaxReturn($data);
    }
    //显示已经接了的的订单函数
    public function myorderHandel(){
        if(!IS_REQUEST) die;
        $page = I('page','','htmlspecialchars');
        $limit = I('rows','','htmlspecialchars');
        $sidx = I('sidx') ? I('sidx') : 'id';//字段排序方式
        $sord = I('sord');
        $order=$sidx.' '.$sord;
        if(!$sidx) $sidx =1;
        //$Order=M('order');
        $where=array(
            'status'=>0,
            'desid'=>$this->uid,
            'dessubmit'=>0,
        );
        $Order=D('ArtRelation');
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
            $url=U('Art/listdesign',array('num'=>2,'desid'=>$this->uid,'dessubmit'=>0,'oid'=>$row[$i]['id'],'ordername'=>$row[$i]['ordername']));
            $picurl=U('Art/uploadpic',array('num'=>2,'uid'=>$this->uid,'oid'=>$row[$i]['id'],'ordername'=>$row[$i]['ordername']));
            $addpicurl=U('Art/uploadpic',array('num'=>2,'uid'=>$this->uid,'oid'=>$row[$i]['id'],'ordername'=>$row[$i]['ordername']));
            $delpicurl=U('Art/delallpics',array('num'=>2,'oid'=>$row[$i]['id'],'ordername'=>$row[$i]['ordername'],'del'=>1));
            $submit="<button class=\"btn btn-success submitOrder\" id=".$oid." onclick=\"showmsg('确定要提交此订单吗？（一旦提交，将交给采购部审核）',".$oid.")\">交单</button>";
            $seemore="<button class=\"btn btn-primary\" onclick=\"golist('".$url."')\">查看订单详情</button>";
            if(empty($row[$i]['resultpics'])){
                $uploadbtn="<button class=\"btn btn-primary\" onclick=\"golist('".$picurl."')\">上传效果图</button>";
            }else{
                $picss=explode("::::::",$row[$i]['resultpics']);
                foreach($picss as $k=>$v){
                    $thubpic=explode("||||||",$v)[0];
                    $bigpics=explode("||||||",$v)[1];
                    $htmls.='<li><a href="'.$bigpics.'" data-rel="colorbox" onclick="clickpics()" bigpic="'.$bigpics.'" thumbpic="'.$thubpic.'"><img class="resultpics" src="'.$thubpic.'" /></a></li>';
                }
                $uploadbtn="<ul class='ace-thumbnails'>".$htmls."</ul><div style='margin-left:30px;float:left;'><button class=\"btn btn-mini btn-primary\" style='display:block;margin-top:10px;' onclick=\"golist('".$addpicurl."')\">继续添加</button><button class=\"btn btn-mini btn-danger\" style='display:block;margin-top:10px;' onclick=\"showdelmsg('确定要全部删除吗?','".$delpicurl."')\">全部删除</button></div>";
            }
            $agreement='未签订';
            if($row[$i]['agreement']) $agreement='已签订';
            $responce->rows[$i]['id']=$row[$i]['id'];
            $responce->rows[$i]['cell']=array($row[$i]['id'],$row[$i]['ordername'],$row[$i]['process'],date('Y-m-d',$row[$i]['createtime']),date('Y-m-d',$row[$i]['deliverytime']),$seemore,$agreement,$uploadbtn,$submit);
            $i++;
        }
        $responce=empty($responce) ? 0 : $responce;
        echo json_encode($responce);
    }
    //上传图片函数
    public function uploadpic(){
        header('Content-type: text/html; charset=utf-8');
        $ordername=I('ordername');
        $oid=I('oid');
        $del=I('del');
        $this->serverurl=U('Art/uploadHandel',array('ordername'=>$ordername,'oid'=>$oid,'del'=>$del));
        $this->successurl=U('Art/myorder',array('num'=>2));
        $this->display();
    }
    //全部删除函数
    public function delallpics(){
        //if(!IS_POST) E('页面不存在');
        if (I('get.del')==1) {
            $username=session('username');
            $pathname='Public/uploads/upload/'.$username;
            $oid=I('get.oid');//获取订单的id
            $pathname=$pathname.'/orderId-'.$oid;
            $uploadDir = $pathname.'/bigpics';//图片大图目录
            $uploadthumbDir = $pathname.'/thumbpics';//缩略图目录i
            $Order=M('order');
            $Order->where(array('id'=>$oid))->setField('resultpics','');
            //$uploadDirDel='Public/uploads/upload/'.$username;
            $uploadDirThumb=$uploadthumbDir;
            if (!is_dir($uploadDir) || !$dir = opendir($uploadDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            if (!is_dir($uploadDirThumb) || !$thumbdir = opendir($uploadDirThumb)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $delfilePath = $uploadDir . DIRECTORY_SEPARATOR . $file;
                // Remove temp file if it is older than the max age and is not the current file
                @unlink($delfilePath);
            }
            while (($thumbfile = readdir($thumbdir)) !== false) {
                $delfileThumbPath=$uploadDirThumb . DIRECTORY_SEPARATOR . $thumbfile;
                // Remove temp file if it is older than the max age and is not the current file
                @unlink($delfileThumbPath);
            }
            closedir($dir);
            closedir($thumbdir);
            $this->redirect(U('Art/myorder',array('num'=>2)));
        }
    }
    public function uploadHandel(){
        //header('Content-type: text/html; charset=utf-8');
        $username=session('username');//获取当前登录着的昵称
        //$datetime=date('Y-m-d',time());//格式化当前时间
        $pathname='Public/uploads/upload/'.$username;
        $oid=I('get.oid');//获取订单的id
        //先创建昵称目录
        if(!file_exists($pathname)) @mkdir($pathname);
        //在创建订单目录
        $pathname=$pathname.'/orderId-'.$oid;
        if(!file_exists($pathname)) @mkdir($pathname);

        //设置php脚本运行最长时间
        @set_time_limit(5 * 60);
        //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir ='Public/uploads/upload_tmp';//这里取的是根目录下的文件夹路径，注意不能加/
        $uploadDir = $pathname.'/bigpics';//图片大图目录
        $uploadthumbDir = $pathname.'/thumbpics';//缩略图目录i
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 30 * 24 * 3600; // Temp file age in seconds

        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
            @mkdir($uploadthumbDir);
        }
        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
        $filetype=substr(strrchr($_FILES['file']['name'],"."),1);//获取文件后缀名
        //加载的就是Common目录下的user.php,@只本目录下的　
        load('Common/string');
        $randname=create_str();
        $D=date("mdHis");//时间戳
        $fileName=$D.$randname.'.'.$filetype;
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;

        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            $dir_thum=opendir($uploadthumbDir);
            while (($file = readdir($dir)) !== false) {
                $file_thumb = readdir($dir_thum);
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                $tmpfile_thumbPath = $uploadthumbDir . DIRECTORY_SEPARATOR . $file_thumb;
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                    @unlink($tmpfile_thumbPath);
                }
            }
            closedir($dir);
            closedir($dir_thum);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
        $picsrows=$uploadDir.'/'.$fileName;
        $thumbpath=$uploadthumbDir.'/thumb-'.$fileName;
        import('Home.Common.ResizeImage',APP_PATH,'.php');
        $Resize=new \ResizeImage($picsrows,'120','90','0',$thumbpath);
        //var_dump($Resize);die;
        $picsrows='/'.$picsrows;
        $thumbrows='/'.$thumbpath;
        $finalrows=$thumbrows.'||||||'.$picsrows;

        $Order=M('order');
        $rows=$Order->where(array('id'=>$oid))->getField('resultpics');
        $rows=empty($rows) ? $finalrows : $rows.'::::::'.$finalrows;
        $result=$Order->where(array('id'=>$oid))->setField('resultpics',$rows);
        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }
    //已经完成的订单
    public function complete() {
        $Order=M('order');
        $listrows=$Order->where(array('desid'=>$this->uid,'dessubmit'=>1))->select();
        $arr=array();
        foreach($listrows as $v){
            $htmls='';
            $url=U('Art/listdesign',array('num'=>2,'desid'=>$this->uid,'oid'=>$v['id'],'ordername'=>$v['ordername']));
            $v['seemore']= "<a style=\"cursor:pointer;\" onclick=\"golist('".$url."')\">查看订单详情</a>";
            $picss=explode("::::::",$v['resultpics']);
            foreach($picss as $vv){
                $thubpic=explode("||||||",$vv)[0];
                $bigpics=explode("||||||",$vv)[1];
                $htmls.='<img class="resultpics" src="'.$thubpic.'" />';
            }
            $v['img']= $htmls;
            $v['result']= "<button class=\"btn disabled\" onclick=\"showmsg('点击了')\">已完成</button>";
            $arr[]=$v;
        }

        $this->list=$arr;
        $this->display();
    }

} 