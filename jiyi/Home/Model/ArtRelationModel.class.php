<?php
/**
 * Created by jiyi.
 * Name: 设计部关联查询订单资料
 * Date: 14-9-12
 * Time: 上午10:00
 */

namespace Home\Model;
use Think\Model\RelationModel;

class ArtRelationModel extends RelationModel{
    protected $tableName='order';
    protected $_link=array(
        'user'=>array(
            'mapping_type'=>self::BELONGS_TO,
            'class_name'  => 'user',
            'foreign_key' => 'uid',
            'as_fields' => 'tel:salesTel',
            'mapping_name'=>'userinfo',
        ),
    );
} 