<?php
namespace Admin\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
        /*
         __ROOT__ ： (互联网)Internet站点根目录地址
__APP__ ： 当前项目（入口文档）地址
__GROUP__ ：当前分组地址
__URL__ ： 当前模块地址
__ACTION__ ： 当前操作地址
__SELF__ ： 当前 URL 地址
ACTION_NAME ： 当前操作名称
APP_PATH ： 当前项目目录
APP_NAME ： 当前项目名称         
        
        */
//        echo __ROOT__,'<br />';
//        echo __APP__,'<br />';
//        echo __GROUP__,'<br />';
//        echo __URL__,'<br />';
//        echo __ACTION__,'<br />';
//        echo __SELF__,'<br />';
//        echo __APP_PATH__,'<br />';
//        echo APP_NAME;
//        die;
                if (!is_user_login()) {
             $this->redirect('login/signin'); 
        }
                    $ClassTable = M('register');
              
            $registers = $ClassTable->where(array('status' => '1'))->select();
                  $this->assign('users',$registers);
        $this->display();
    }
    public function h(){
        echo 'bbb';
    }
}