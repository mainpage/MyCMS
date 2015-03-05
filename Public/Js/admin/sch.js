$(document).ready(function(){
	//实例化ueditor编辑器
	var editor = new UE.ui.Editor();
	editor.render("myEditor");

	//提交文章，验证标题是否为空
	$("#submit-article").click(function(){
		if($("#txtTitle").val() == ""){
			alert("标题不能为空！");
			return false;
		}
		else if(editor.getContent() == ""){
			alert("内容不能为空！");
			return false;
		}
	})
	/*$("#txtTitle").focus(function(){
		//再次聚焦文本框时，隐藏错误提示
		$(this).prev().css("display","none");
	})*/

	//保存草稿
	$("#save-article").click(function(){
        $.post("/thinkphpTest/admin.php/Article/save", {"id":$("#article-id").val(),"title":$("#txtTitle").val(),"content":editor.getContent()}, function(return_id){
			if(return_id){
				//将草稿生成的id存入隐藏域，提交文章时根据此id将数据库中草稿的isSubmitted状态改为1
				$("#article-id").val(return_id);
				//显示保存草稿成功
				$("#save-notification").text("草稿已成功保存!("+new Date().toLocaleTimeString()+")");
				$("#save-notification").parent().css("display","block");
				$("#save-notification").parent().addClass("notification success png_bg");
			}
			else{
				//显示保存草稿失败
				$("#save-notification").text("保存草稿失败!");
				$("#save-notification").parent().css("display","block");
				$("#save-notification").parent().addClass("notification error png_bg");
			}
		})
		//下面的为什么不行？
		/*$.ajax({
			url: '/thinkphpTest/admin.php/Article/save',
			data: $("#txtTitle").val(),
			type: 'post',
			//dataType:'text',
			success: function(msg){
                /*if(msg=='1'){
                    alert('添加成功');
                }else{
                    alert('添加失败');
                }*/
                /*alert(msg);
            }
		})*/
	})
})