<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	/*
	 * 暗号登录密码
	 */
	public $ppw ='milkbobo';
	
	public function check(){
	session_start();	
	$ppp=$_SESSION['pwd'];
		if ($ppp != $this->ppw){
    		header("Location: /jiamen.php?&a=login");
		}
	}
	
	/*
	 * 信息列表
	 */
    public function index(){
   		$this->check();
			
        	$data=M('jiamen')->order('id desc')->select();

        	$this->data=$data;
        	$this->display();

       }
    
    /*
     * 表单提交
     */
    
    public function summ(){

    	if(!$_GET)$this->error('页面不存在');
    	
    	$data=array(
    			'name'=>I('name'),
    			'dz'=>I('dz'),
    			'zy'=>I('zy'),
    			'lxr'=>I('lxr'),
    			'sjh'=>I('sjh'),
    			'email'=>I('email'),
    			'time'=>time(),
    	);
    	$id=M('jiamen')->data($data)->add();
     	if($id){
     		echo $id;
 		}else {
 			echo 0;
 		}
    }
    
    /*
     * 简单登录
     */
    public function login(){
//echo 'asdf';
    	$this->display();
    }
    
    /*
     * 登录验证
     */
    
     public function vre(){
     	if(!IS_POST)$this->error('页面不存在');
     	$pwd=I('pwd');
     	//echo $this->ppw;
     	if ($pwd == $this->ppw){
            $_SESSION['pwd']='milkbobo';
      		header("Location: /jiamen.php?&a=index");
     	}else {
     		$this->error('密码错误', '/jiamen.php?&a=login');
     	}
     }
     
     /*
      * 删除列表
      */
     
     public function del(){
    $this->check();
   //  	print_r($_GET);
   		$id=I('id');
     	$del=M('jiamen')->delete($id);
       
     	if($del>0){
     		$this->success('删除成功', '/jiamen.php?&a=index');
     	}else {
     		$this->success('删除失败', '/jiamen.php?&a=index');
     	}
     	
     	
     	
     	
     	
     }
}
?>
