$(document).ready(function(){

// Memo页面	
	//提交memo，验证内容是否为空
	$("#submit-memo").click(function(){
		if($("#content").val() == ""){
			alert("内容不能为空！");
			return false;
		}
	})

// 登录页面

	//登录框验证
	$("#login-button").click(function(){
		if($("#user-name").val() == ""){
			alert("用户名不能为空！");
			return false;
		}
		else if($("#password").val() == ""){
			alert("密码不能为空！");
			return false;
		}
	})

})