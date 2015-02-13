<?php
	class ArticleAction extends Action
	{
		/**
		*@显示文章编辑器
		*/
		public function index()
		{
			$this->assign("h1","New Article");
			$this->assign("button_text","Submit article");
			$this->assign("button_action","add");
			$this->display();
		}

		/**
		*@将编辑好的文章添加到数据库(需添加js代码验证标题和内容是否为空)
		*/
		public function add()
		{
			$article = M('Article');
			//如果id存在，说明数据库中已经有该文章的草稿，只需对其进行更新
			if($_POST['id'])
			{
				$id=$_POST['id'];
				$article->title = $_POST['title'];
				$article->content = $_POST['editorValue']; //editorValue即为ueditor的内容
				$article->lastModifyTime = date("Y-m-d H:i:s");
				$article->isSubmitted = 1;
				//save
				if($article->where("id=$id")->save())
				{
					$this->success('文章添加成功!',U('Index/index'));
				}
				else
				{
					$this->error('文章添加失败!');
				}
			}
			else
			{
				$article->title = $_POST['title'];
				$article->content = $_POST['editorValue']; //editorValue即为ueditor的内容
				$article->author = "sch";
				$article->createTime = date("Y-m-d H:i:s");
				$article->lastModifyTime = date("Y-m-d H:i:s");
				$article->isSubmitted = 1;
				//add
				if($article->add())
				{
					$this->success('文章添加成功!',U('Index/index'));
				}
				else
				{
					$this->error('文章添加失败!');
				}
			}
		}

		/**
		*@编辑已有文章
		*/
		public function edit()
		{
			$article = M('Article');
			if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				$data = $article->where("id=$id")->find();
				$this->assign("h1","编辑文章");
				$this->assign("button_text","更新文章");
				$this->assign("button_action","update");
				$this->assign("article_item",$data);
				$this->display('index');
			}
			else
			{
				$this->error('参数错误！');
			}
		}

		/**
		*@更新文章
		*/
		public function update()
		{
			$article = M('Article');
			if(isset($_POST['id']))
			{
				$id = $_POST['id'];
				$article->title = $_POST['title'];
				$article->content = $_POST['editorValue']; 
				$article->lastModifyTime = date("Y-m-d H:i:s");
				if($article->where("id=$id")->save())
				{
					$this->success('更新成功!',U('Index/index'));
				}
				else
				{
					$this->success('更新失败!');
				}
			}
			else
			{
				$this->error('参数错误！');
			}
		}

		/**
		*@删除文章
		*/
		function delete(){		
	    	$article = M('article');
	    	if(isset($_GET['id']))
	    	{
		    	if($article->delete($_GET['id'])){
					$this->success('文章删除成功!');
				}
				else{
					//$this->error($article->getLastSql());
					$this->error('文章删除失败');
				}
	    	}
			else
			{
				$ids = $_POST['ids'];
				foreach ($ids as $id) 
				{
					if(!$article->delete($id))
					{
						$this->error('批量删除失败!');
					}
				}
				$this->success('批量删除成功!');
			}
		}

		/**
		*@保存草稿
		*/
		function save(){		
	    	$article = M('Article');
			if($_POST['id'])
			{
				$id = $_POST['id'];
				$article->title = ($_POST['title']=="")?"未命名":$_POST['title'];
				$article->content = $_POST['content']; 
				$article->lastModifyTime = date("Y-m-d H:i:s");
				$article->where("id=$id")->save();
				echo $id;
			}
			else
			{
				$article->title = ($_POST['title']=="")?"未命名":$_POST['title'];
				$article->content = $_POST['content']; 
			    $article->author = "sch";
			    $article->createTime = date("Y-m-d H:i:s");
			    $article->lastModifyTime = date("Y-m-d H:i:s");
			    $article->isSubmitted = 0;
				echo $article->add();
			}
		}
	}

?>