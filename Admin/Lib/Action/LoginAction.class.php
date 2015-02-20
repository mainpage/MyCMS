<?php

class LoginAction extends Action
{
	function login(){
		$user = M("User");
		$user_name = $_POST['user-name'];
		$password = md5($_POST['password']);
		//查找输入的用户名是否存在
		if($user->where("username ='$user_name'")->find())
		{	
			//密码是否正确
			$login_user = $user->where("username ='$user_name' AND password = '$password'")->find();	
			if($login_user)
			{
				setcookie('login_user',$login_user['username'],time()+3600,'/');//本域名下有效
				redirect(U('Index/index'));
			}
			else
			{
				$this->error('密码错误！');
			}
		}
		else{
			$this->error('用户名不存在');
		}
	}
}

?>