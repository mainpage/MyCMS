<?php
	class ArticleAction extends Action
	{
		public function index()
		{
			$this->display();
		}

		public function add()
		{
			$article = M('Article');
			$article->subject = $_POST['subject'];
			$article->message = $_POST['editorValue'];
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