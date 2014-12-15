<?php
	class ArticleAction extends Action
	{
		public function index()
		{
			if(isset($_GET['id']))
			{
				$article = M('Article');
				$data = $article->where();//
			}
			$this->display();
		}

		public function add()
		{
			$article = M('Article');
			$article->subject = $_POST['subject'];
			$article->message = $_POST['editorValue']; //editorValue即为ueditor的内容
			$article->author = "sch";
			$article->createtime = time();
			if($article->add())
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
			
		}
	}

?>