<?php
/**
 * Created by jiyi.
 * Name: 
 * Date: 14-9-4
 * Time: 上午9:34
 */
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
    protected $trueTableName = 'bixiu_order';//模型数据表的真实名字
    //protected $uid=session('homeuid');//获取当前户名的userid
    protected $_auto=array(
       // array('status','getStatus',3,'callback'), //对status回调getStatus处理，把开启关闭转换为0，1
        array('createtime','time',1,'function'),//对创建时间字段，在新增时进行时间戳函数处理
        array('altertime','time',3,'function'), //对修改时间的字段，在更新时进行时间戳函数处理
        array('ip','get_client_ip',3,'function'),//获取操作的ip，此方法获取ip并不准确
        //array('department','getDepartment',1,'callback'),
        array('agreement',"getAgreement",3,'callback'),
    );
    protected function  getAgreement(){
        if(I('agreement')=='on'||I('agreement')=='已签订'){
            return 1;
        }else{
            return 0;
        }
    }
    //转换status函数
    protected function getStatus(){
        if(I('status')=='on'){
            return 0;
        }else{
            return 1;
        }
    }
    //获取用户id以及部门
    protected function getDepartment() {
        $User=M('user');
        $department=$User->where(array('id'=>$this->uid))->getField('department');
        return $department;
    }


} 