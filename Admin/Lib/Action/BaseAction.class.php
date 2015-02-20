<?php

	class BaseAction extends Action
	{
		function _initialize()
		{
			$login_user = $_COOKIE['login_user'];
			if($login_user == null)
			{
				$this->error('请登录!',U('Login/index'));
			}
			else
			{
				$this->assign('username',$login_user);
			}
		}
	}
?>