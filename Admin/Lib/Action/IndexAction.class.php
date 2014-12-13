<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$articles = M("article");
    	$count = $articles->count();
    	$article_list = $articles->select();
    	$this->assign('article_list',$article_list);
    	$this->assign('article_count',$count);
    	$this->display();
    }

    public function add(){
    	redirect(U('/Article/index'));
    }
}