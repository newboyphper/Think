<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller {

    //处理登录
    public function signin() {
        if (IS_GET) {
            $this->display();
        }
        if (IS_POST) {
            /* 调用登录接口登录 */
            $User = M('user');
            //I方法接收页面传递来的值
            $user_name = I('user_name');
            $password = I('user_pwd');
            
            //查找user表中num等于$num的值
            $datanum = $User->where(array('user_name' => $user_name))->find();
            //判断$datanum的值
            if ($datanum) {
                if (md5($password) === $datanum['user_pwd']) {
                    if ($datanum['status'] == 0) {
                        $this->error('用户处于未审核状态，请联系管理员');
                    } elseif ($datanum['status'] == 2) {
                        $this->error('用户处于禁用状态，请联系管理员');
                    } else {
                        $this->autoLogin($datanum); //调用私有方法自动登录.  
                        $uid = $datanum['id'];
                        if ($_SESSION['user_auth']['uid'] && $_SESSION['user_auth']['role'] == 'user') {
                            $this->success('登录成功！', U('Index/index'));
                        } else {
                            $this->error('存储错误.');
                        }
                    }
                } else {
                    $this->error('密码填写不正确,请重新填写');
                    exit();
                }
            } else {
                $this->error('用户不存在，请注册', U('signup'));
            }
        }
    }

    public function autoLogin($user) {
        /* 记录登录SESSION */
        $auth = array(
            'uid' => $user['id'],
            'user_name' => $user['user_name'],
            'role' => 'user', //记录用户类型 
        );
        session('user_auth', $auth);
//        session('user_auth_sign', data_auth_sign($auth));
        session('user_auth_sign', '11');
    }

    /*
     * 用户注册 
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
            $User = M('user');
            $datanum = $User->where($data)->find();
            if ($datanum) {
                $this->success('您已经注册过，请直接登录', U('signin'));
            } else {
                $data['user_pwd'] = md5(I('user_pwd'));
                $data['user_name'] = I('user_name');
                $data['email'] = I('email');
                $data['update_time'] = date('Y-m-d H:i:s');
                $uid = $User->add($data);
                if ($uid)
                    $this->success('注册成功', U('signin'));
                else
                    $this->error('注册失败');
            }
        }
    }

    public function logout() {
        if (is_user_login()) {
            $User = M('user');
            session('user_auth', null);
            session('user_auth_sign', null);
            session('[destroy]');
            $this->success('登出成功！', U('signin'));
        } else {
            $this->redirect('signin');
        }
    }

    //忘记密码
    public function wjpas() {
        if (IS_GET) {
            $this->display();
        }
        if (IS_POST) {
            $User = M('user');
            $user_name = I('user_name');
            $data['user_pwd'] = md5(I('user_pwd'));
            $email = I('email');
            $datanum = $User->where(array('user_name' => $user_name))->find();
            if ($datanum) {
                if ($email === $datanum['email']) {
                    $User->where(array('user_name' => $user_name))->save($data); // 根据条件更新记录
                    $this->success('密码修改成功', U('signin'));
                } else {
                    $this->error('邮箱填写不正确,请重新填写');
                    exit();
                }
            } else {
                $this->error('用户不存在，请注册', U('signup'));
            }
        }
    }

}
