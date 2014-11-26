<?php
/**
 * Created by jiyi.
 * Name:
 * Date: 14-9-4
 * Time: 上午9:34
 */
namespace Home\Model;
use Think\Model;
class DesignModel extends Model{
    protected $trueTableName = 'bixiu_design';//模型数据表的真实名字
    protected $_auto=array(
        array('designTime','strtotime',3,'function'),
        array('deliveryTime','strtotime',3,'function'),
        array('createTime','time',3,'function'),//对创建时间字段，在新增时进行时间戳函数处理
    );

} 