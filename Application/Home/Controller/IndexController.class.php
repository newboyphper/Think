<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user_info = session('user_auth');
        if($user_info!==null){
            $this->display();
        }
        else{
            $this->redirect('Login/signin'); 
        }
    }
}