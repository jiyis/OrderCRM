<?php

//根据ThinkPHP的SESSION的数据库存储驱动，来写REDIS驱动（此时版本是3.2）
//命名空间
namespace Think\Session\Driver;

class Redis {
	
	private $redis;//redis的连接对象
	private $expire;//session有效时间	
	public function excute() {
		session_set_save_handler(
			array(&$this, 'open'),
			array(&$this, 'close'),
			array(&$this, 'read'),
			array(&$this, 'write'),
			array(&$this, 'destroy'),
			array(&$this, 'gc') 
		);
	}
	//session存储方法的open方法
	public function open($path, $name) {
		$this->expire = C('SESSION_EXPIRE') ? C('SESSION_EXPIRE') : ini_get('session.gc_maxlifetime');
		$this->redis = new \Redis();//受命名空间的影响，实例化PHP内置的类库或者第三方的没有使用命名空间定义的类应加上\
		return $this->redis->connect(C('REDIS_HOST'),C('REDIS_PORT'));
		
	}

	public function close() {
		return $this->redis->close();
	}
	
	public function read($id) {
		$id=C('SESSION_PREFIX') . $id;
		$data = $this->redis->get($id);
		return $data ? $data : '';
	}
	
	public function write($id, $data) {
		$id= C('SESSION_PREFIX') . $id;
		//echo $this->expire;
		return $this->redis->set($id,$data,$this->expire);
		//return $this->redis->expire($id,$this->expire);
	
	}
	
	public function destroy($id) {
		$id = C('SESSION_PREFIX') . $id;
		return $this->redis->delete($id); 
	}
	
	public function gc($maxlifetime) {
		return true;
	}
	
}