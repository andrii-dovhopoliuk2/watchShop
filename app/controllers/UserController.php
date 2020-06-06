<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController {
    public function signupAction(){
        if (!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()){
              $user->getErrors();
              $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if ($user->save('user')){
                    $_SESSION['success'] = 'Реєстрація пройшла успішно';
                    if (isset($data['ThisRole'])){
                        if ($data['ThisRole'] == 'admin')
                        redirect();
                    }
                    $user = new User();
                    if ($user->login()){
                       // $_SESSION['success'] = 'Ви успішно авторизовані';
                    }else{
                      //  $_SESSION['error'] = 'Логін чи пароль введені неправильно';
                    }
                }else{
                    $_SESSION['error'] = 'Сталася помилка';
                }
            }
            redirect(PATH);

        }
        $this->setMeta('Реєстрація');
    }

    public function loginAction(){
        if (!empty($_POST)){
            $user = new User();
            if ($user->login()){
                $_SESSION['success'] = 'Ви успішно авторизовані';
                redirect('/user/cabinet');
            }else{
                $_SESSION['error'] = 'Логін чи пароль введені неправильно';
                redirect();
            }
        }
        $this->setMeta('Вхід');
    }

    public function logoutAction(){
        if (isset($_SESSION['user'])) unset($_SESSION['user']);

        redirect();
    }
    public function cabinetAction(){
        if(!User::checkAuth()) redirect();
        $this->setMeta('Особистий кабінет');
    }

    public function editAction(){
        if(!User::checkAuth()) redirect('/user/login');
        if(!empty($_POST)){
            $user = new \app\models\admin\User();
            $data = $_POST;
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('user', $_SESSION['user']['id'])){
                foreach($user->attributes as $k => $v){
                    if($k != 'password') $_SESSION['user'][$k] = $v;
                }
                $_SESSION['success'] = 'Зміни збережені';
            }
            redirect();
        }
        $this->setMeta('Редагування даних');
    }
    public function ordersAction(){
        if(!User::checkAuth()) redirect('/user/login');
        $orders = \R::findAll('order', 'user_id = ?', [$_SESSION['user']['id']]);
        $this->setMeta('Історія замовлень');
        $this->set(compact('orders'));
    }
}