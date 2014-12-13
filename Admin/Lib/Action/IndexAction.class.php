<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        //实例化文章模型(M方法不需要模型类存在)
    	$articles = M("article");
    	$count = $articles->count();

        //使用框架内的page类(ThinkPHP/Extend/Library/ORG/Util/Page.class.php)
        //实现分页(对该文件稍作修改，添加样式)
        //(考虑如何用ajax实现无刷新分页)
        import('ORG.Util.Page');
        $num_per_page = 5; //每页显示5篇文章
        $page = new Page($count,$num_per_page);
        //设置显示格式
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
    	$article_list = $articles->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('article_list',$article_list);
    	$this->assign('article_count',$count);
        $this->assign('pagination',$pagination);
    	$this->display();
    }

    public function add(){
    	redirect(U('/Article/index'));
    }
}