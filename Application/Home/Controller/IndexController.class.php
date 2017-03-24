<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		echo "tp_version：".THINK_VERSION;
		echo "<br/>";
        echo "<br/>";
        echo "———APP_DEBUG：".var_dump(APP_DEBUG);
		echo "<br/>";
        echo "<br/>";
		echo "magic_quotes_gpc：".magic_quotes_gpc;
		echo "<br/>";
        echo "<br/>";
        echo "__FILE__：".__FILE__;
		echo "<br/>";
        echo "<br/>";
        echo "———SERVER：".var_dump($_SERVER);
		echo "<br/>";
        echo "<br/>";
        echo "SERVER[PHP_SELF]：".$_SERVER['PHP_SELF'];
		echo "<br/>";
        echo "<br/>";
        $str = "<a>I'm This is some <b>bold</b> text1.</a>";
		echo htmlspecialchars($str);
		echo "<br/>";
        echo $str;
        echo "<br/>";

        $arr1 = array('a' => array("我" => 'I', "爱" => 'love', '运动' => 'sports'), 'b' => 2, 'c'=>3, 'd' =>4);
        foreach($arr1 as $key => $val){
        	if(is_array($val)){
        		echo $val['我'].' '.$val['爱'].' '.$val['运动'].'！';
			}else{
                echo $key;
			}
			echo "<br/>";
		}
//		$this->show('This is some <b>bold</b> text.');
    }

    public function test()
    {
    	if(!empty($_POST["is_ajax"]))
    	{
    		$or_name = (isset($_POST["or_name"])?$_POST["or_name"]:'');
	    	return $or_name;
	    	
    	}
    	$Users	= M('Users');
    	$count	= $Users->count();
    	$Page 	= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)

    	$show	= $Page->show();// 分页显示输出
    	$result = $Users->order($or_name)->limit($Page->firstRow.','.$Page->listRows)->select();

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

    public function upload(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
	        $this->success('上传成功！');
	    }
	}

    public function Ajax()
    {
    	$data['status']  = 1;
		$data['content'] = 'content';
		$this->ajaxReturn($data);
    }
}

?>
