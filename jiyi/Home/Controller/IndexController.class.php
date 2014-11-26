<?php
namespace Home\Controller;
use Home\Common\Controller\CommonController;
class IndexController extends CommonController {
    public function index(){
       $this->display();
    }
    //处理日历进程
    public function calendar() {
        $this->display();
    }
    //初始化读取日历进程
    public function dateEvents() {
        header("Content-type:text/html;charset=utf-8");
        $Calendar=M('calendar');
        $array=array();
        $rows=$Calendar->select();
        foreach($rows as $k=>$v){
            $array[$k]['title']=$v['title'];
            $array[$k]['start']=date('Y-m-d',$v['start']);
            $array[$k]['end']=date('Y-m-d',$v['end']);
            $array[$k]['className']=$v['className'];

        }
        echo json_encode($array);
    }
    //处理日程增删修改函数
    public function dateHandel() {
        $method=I('post.method');//获取操作函数
        $id=I('post.id');//获取id
        $Calendar=M('calendar');
        if($method=='change'){
            $title=I('post.title');
            if($Calendar->where(array('calid'=>$id))->setField('title',$title)){
                $info['status']=1;
            }else{
                $info['status']=0;
            }
        }else if($method=='delete'){
            if($Calendar->where(array('calid'=>$id))->delete()){
                $info['status']=1;
            }else{
                $info['status']=0;
            }
        }else{
            $startrows=explode(' ',I('post.start'));
            $endrows=explode(' ',I('post.end'));
            array_splice($startrows,-2,2);
            array_splice($endrows,-2,2);
            $startrows=implode(' ',$startrows);
            $endrows=implode(' ',$endrows);
            $data=array(
                'title'=>I('post.title'),
                'start'=>strtotime($startrows),
                'end'=>strtotime($endrows),
                'allDay'=>I('post.allDay')
            );
            if($Calendar->data($data)->add()){
                $info['status']=1;
            }else{
                $info['status']=0;
            }
        }
        $this->ajaxReturn($info);
    }
}