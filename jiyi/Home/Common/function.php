<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-10-30
 * Time: 下午9:18
 */
if(!function_exists(getGroup)){
    function getGroup($uid){
        return M('user')->where(array('id'=>$uid))->getField('department');
    }
}