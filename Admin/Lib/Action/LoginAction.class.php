<?php

class LoginAction extends Action{
	
	function login(){
		$user = M("User");
		$user_name = $_POST['user-name'];
		$password = md5($_POST['password']);
		//查找输入的用户名是否存在
		if($user->where("username ='$user_name' AND password = '$password'")->find()){
			$url=U('/Index/index/username/'.$username);			
			redirect($url,0, '跳转中...');
		}
		else{
			$this->error('用户名或密码错误');
		}
	}
}

?>