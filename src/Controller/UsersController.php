<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }
    public function info()
    {
        $userid = $this->Auth->user('id');
        $this->set('userid',$userid);
        $usercreated = $this->Auth->user('created');
        $this->set('usercreated',$usercreated);
//        $this->set('users', $this->Users->find('id'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity($this->request->getData());
        if ($this->Users->save($user)) {
            $this->Auth->setUser($user->toArray());
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'index'
            ]);
        }
        $this->set('user', $user);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Разрешить пользователям регистрироваться и выходить из системы.
        // Вы не должны добавлять действие «login», чтобы разрешить список.
        // Это может привести к проблемам с нормальным функционированием
        $this->Auth->allow(['add', 'logout']);

    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl($this->redirect(['action' => 'index'])));
            }
            else{
                $this->Flash->error(__('Invalid username or password, try again'));

            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout($this->redirect(['action' => 'login'])));
    }


}
