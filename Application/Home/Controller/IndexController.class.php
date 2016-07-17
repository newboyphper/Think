<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user_info = session('user_auth');
        if($user_info!==null){
//            $this->assign('name','abc');
            $class_style=C('class_style');
            $ClassTable = M('class');
            $classes = $ClassTable->field('class_name,style')->where(array('is_del' => '0'))->select();
            $this->assign('class_info',$classes);
            $this->assign('class_style',$class_style);
            $this->display();
        }
        else{
            $this->redirect('Login/signin'); 
        }
    }

    /*
     * 添加新用户
     */

    public function signup() {
//        if (is_user_login()) {
//            $this->redirect('Index/index');
//        }
        if (IS_GET) {
            //注册页面
            $this->display();
        }
        if (IS_POST) {
            //判断用户 
           
            $data['tels'] = I('tels');
            //模糊查询
            


            $data['tels']=  str_replace('，',',', $data['tels']);
//             my($data);
            $ClassTable = M('register');
            // $where = array('该字段'=>array('LIKE', '%' . $ID . '%')); 
            $where = array('tels'=>array('LIKE', '%' . $data['tels'] . '%'));
            $datanum = $ClassTable->where($where)->find();
            if ($datanum) {
                $this->success('您已经注册过');
            } else {
                $data['register_name'] =I('register_name');
                $data['class_name'] = I('class_name');
                $data['extend_msg'] =I('extend_msg');
                $data['age'] =I('age');
                $data['update_time'] = date('Y-m-d H:i:s');
                $registerid = $ClassTable->add($data);
                if ($registerid)
                    $this->success('注册成功', U('index'));
                else
                    $this->error('注册失败');
            }
        }
    }
    
    
    
    
}