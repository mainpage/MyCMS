<?php

class IndexAction extends Action {
    /**
     * @函数  index
     * @功能  显示后台管理主页面（登录验证还没写）
     */
    public function index(){
        //实例化文章模型(M方法不需要模型类存在)
    	$articles = M("article");
    	$article_count = $articles->where("isSubmitted=1")->count();

        //使用框架内的page类(ThinkPHP/Extend/Library/ORG/Util/Page.class.php)
        //实现分页(对该文件稍作修改，添加样式)
        //(考虑如何用ajax实现无刷新分页)
        import('ORG.Util.Page');
        $num_per_page = 5; //每页显示5篇文章
        $page = new Page($article_count,$num_per_page);
        //设置显示格式
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
    	$article_list = $articles->where("isSubmitted=1")->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('article_list',$article_list);
    	$this->assign('article_count',$article_count);
        $this->assign('pagination',$pagination);

    	$this->display();
    }

    //草稿箱显示页面
    public function draft(){
        $articles = M("article");
        $article_count = $articles->where("isSubmitted=0")->count();

        import('ORG.Util.Page');
        $num_per_page = 5; //每页显示5篇文章
        $page = new Page($article_count,$num_per_page);
        //设置显示格式
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
        $article_list = $articles->where("isSubmitted=0")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('article_list',$article_list);
        $this->assign('article_count',$article_count);
        $this->assign('pagination',$pagination);

        $this->display("index");
    }

    /**
     * @函数  add
     * @功能  写新文章
     */
    function add(){
        //跳转到Article控制器的index方法
        redirect(U('/Article/index'));
    } 
    /**
     * @函数  delete
     * @功能  删除文章
     */
    function delete(){
        
        //跳转至Article控制器来实现
        if($_GET['id']){
            redirect(U('/Article/delete/id/'.$_GET['id']));
        }
        else{
            $this->error('参数错误！');
        }
    }
    
    /**
     * @函数  edit
     * @功能  编辑文章
     */
    function edit(){
        if($_GET['id']){
            redirect(U('/Article/edit/id/'.$_GET['id']));
        }
        else{
            $this->error('参数错误！');
        }
    }
        
}