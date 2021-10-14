<?php
// src/Controller/UsersController.php

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use function React\Promise\all;


class UsersController extends AppController
{

    //вивід з меншого айді до більшого ліміт 100
//    public $paginate = [
//        'maxLimit' => 100,
//        'order' => [
//            'Users.id' => 'asc'
//        ]
//    ];
    public function index()
    {
        $this->set('name', $this->Auth->user('name'));
    }



    public function register()
    {
        if ($this->request->is('post')){
            $userTable  = TableRegistry::get('Users');
            $user = $userTable->newEntity();

            $username = $this->request->getData('name');
            $useremail = $this->request->getData('email');
            $userpass = ($this->request->getData('password'));
            $usertoken = Security::hash(Security::randomBytes(32));

            $user->name = $username;
            $user->role = 'user';
            $user->email = $useremail;
            $user->password = $userpass;
            $user->token = $usertoken;

            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');


            if ($userTable->save($user)){
                $this->Flash->set('Successful registry!' ,['element'=>'success']);


                Email::configTransport('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => 'dbc651ae35924b',
                    'password' => '88b3e51b5d131d',
                    'className' => 'Smtp'
                ]);
                $email = new Email('default');
                $email->transport('mailtrap');
                $email->emailFormat('html');
                $email->from('topsinpw@gmail.com', 'Kiruha64');
                $email->subject('Confirm your email to activation your account');
                $email->to($useremail);
                $email->send('hello '.$username. '<br> Pleas click here to conform your account<br/>
                <a href="http://myproj/users/verification/'.$usertoken.'">Verificate</a>
                <br>Thank you<br/>');

            }
            else{
                $this->Flash->set('Error registry!',['element'=>'error']);
            }
        }
//        $this->set('user', $this->Auth->user('all'));


    }
    public function verification($token){
        $userTable = TableRegistry::get('Users');
        $verify = $userTable->find('all')->where(['token'=>$token])->first();
        $verify->verified = '1';
        $userTable->save($verify);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error(__('Invalid email or password, try again'));
            }
        }
    }

    public function forgotpassword(){
        if ($this->request->is('post')){
            $myemail = $this->request->getData('email');
            $token = Security::hash(Security::randomBytes(25));

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['email'=>$myemail])->first();
            $user->password = '';
            $user->token = $token;
            if ($userTable->save($user)){
                $this->Flash->success('Reset password link has been sent to your email('.$myemail.')!');


                Email::configTransport('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => 'dbc651ae35924b',
                    'password' => '88b3e51b5d131d',
                    'className' => 'Smtp'
                ]);

                $email = new Email('default');
                $email->transport('mailtrap');
                $email->emailFormat('html');
                $email->from('topsinpw@gmail.com', 'Kiruha64');
                $email->subject('Password reset confirm');
                $email->to($myemail);
                $email->send('hello '.$myemail.'<br> Pleas click here to reset your password<br/>
                <a href="http://myproj/users/resetpassword/'.$token.'">Reset Password</a>
                <br>Thank you<br/>');

            }
        }
    }

    public function resetpassword($token){
        if ($this->request->is('post')){
            $mypassword =($this->request->getData('password'));

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>$token])->first();
            $user->password = $mypassword;
            if ($userTable->save($user)){
                return $this->redirect(['action'=>'login']);
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    public function profile(){
        $userTable = TableRegistry::get('Users');

        $user = $userTable->find('all')->where(['id'=>$this->Auth->user('id')])->first();

        $this->set('user',$user);


    }



//    public function isAuthorized($user){
//
//        if (isset($user['role']) && $user['role'] === 'superadmin') {
//            return true;
//        }
//
////        elseif (isset($user['role']) && $user['role'] === '') {
////            if ($this->request->getParam('controller' ) == 'Users' and $this->request->getParam('action' ) == 'identify') {
////                return true;
////            }
////        }
//
//        if (isset($user['role']) && $user['role'] === 'admin' or $user['role'] === 'user' ){
//            if ($this->request->getParam('controller' ) == 'Users' and $this->request->getParam('action' ) == 'index') {
//                return false;
//            }
//            else{
//                return true;
//            }
//        }
//        if ($this->request->getParam('controller' ) == 'Users' and $this->request->getParam('action' ) == 'newpassword') {
//            return true;
//        }
//
//
//
//
//    }

//    public function beforeFilter(Event $event)
//    {
//        parent::beforeFilter($event);
//
//        $this->Auth->allow(['register', 'logout','verification']);
//
//    }


}
