<?php
//16-7-16 下午9:26  自定义 函数库，放在  /home/Common/Common/
function my($par){
    echo '<pre>';
    var_dump($par);
    die;
}
function is_user_login(){
        $user_info = session('user_auth');
        if($user_info!==null){
            return true;
        }
        else{
            return false;
        }
    
    
}