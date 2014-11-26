<?php
//生成随机密码salt
function create_str($length = 6){
	$str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randString = ''; 
	$len = strlen($str)-1; 
	for($i = 0;$i < $length;$i ++){ 
		$num = mt_rand(0, $len); 
		$randString .= $str[$num]; 
	} 
	return $randString ;  
}



?>