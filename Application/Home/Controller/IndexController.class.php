<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->show('你好！');
    }

    public function test()
    {
    	
    	$Staff	= M('Staff');
    	$count	= $Staff->count();
    	$Page 	= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
    	$show	= $Page->show();// 分页显示输出
    	$result = $Staff->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('result', $result);
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display('test/test');
    }

    public function test1()
    {
    	$p = (isset($_GET['p']))?$_GET['p']:0;
    	$Staff	= M('Staff');
    	$result	= $Staff->page($p.',5')->select();
    	$this->assign('result', $result);
    	$count	= $Staff->count();// 查询满足要求的总记录数
		$Page 	= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show	= $Page->show();// 分页显示输出
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display('test/test1');
    }
}

?>
