<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;
use phpDocumentor\Reflection\Element;


class UsersController extends AppController
{

    //вивід з меншого айді до більшого ліміт 100
    public $paginate = [
        'maxLimit' => 100,
        'order' => [
            'Users.id' => 'asc'
        ]
    ];
    public function index()
    {
        $this->set('users', $this->paginate());


    }
    public function edit($id = null){
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User info has been edit.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка обновления вашей статьи.'));
        }
        $this->set('user' , $user);
    }

    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Статья с id: {0} была удалена.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }


    public function initialize()
    {

        parent::initialize();
        $this->loadComponent('Paginator');

    }

    public function info()
    {
        $userid = $this->Auth->user('id');
        $this->set('userid',$userid);
        $usercreated = $this->Auth->user('created');
        $this->set('usercreated',$usercreated);
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }



    public function register()
    {
        if ($this->request->is('post')){
            $userTable  = TableRegistry::get('Users');
            $user = $userTable->newEntity();

            $username = $this->request->getData('name');
            $useremail = $this->request->getData('email');
            $userpass = Security::hash($this->request->getData('password'), 'sha256','false');
            $usertoken = Security::hash(Security::randomBytes(32));

            $user->name = $username;
            $user->email = $useremail;
            $user->password = $userpass;
            $user->token = $usertoken;
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');


            if ($userTable->save($user)){
                $this->Flash->set('Successful registry!' ,['element'=>'success']);


//                Email::configTransport('mailtrap', [
//                    'host' => 'localhost',
//                    'port' => 25,
//                    'username' => 'root',
//                    'password' => '',
//                    'className' => 'Smtp'
//                ]);
//                $email = new Email('default');
//                $email->transport('mailtrap');
//                $email->emailFormat('html');
//                $email->from('topsinpw@gmail.com', 'Kiruha64');
//                $email->subject('Confirm your email to activation your account');
//                $email->to($useremail);
//                $email->send('hello '.$username. '<br> Pleas click here to conform your account<br/>
//                <a href="http://myproj/users/verification/'.$usertoken.'">Verificate</a>
//                <br>Thank you<br/>
//');

            }
            else{
                $this->Flash->set('Error registry!',['element'=>'error']);
            }
        }
        $this->set('user', $this->Auth->user('all'));


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
                if (isset($user['role']) && $user['role'] === 'superadmin'){
                return $this->redirect($this->Auth->redirectUrl($this->redirect(['action' => 'index'])));
                }
                else{
                    return $this->redirect($this->Auth->redirectUrl($this->redirect(['controller' => 'Articles', 'action'=>'index'])));
                }
            }
            else{
                $this->Flash->error(__('Invalid username or password, try again'));

            }
        }
        $this->viewBuilder()->setLayout('default');

    }


    public function logout()
    {
        return $this->redirect($this->Auth->logout($this->redirect(['action ' => 'login'])));
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
