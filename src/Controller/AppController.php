<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
// src/Controller/AppController.php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    //...

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form'=>[
                    'fields'=>['username'=>'email', 'password'=>'password'],
                    'scope'=>['verified'=>'1'],
                    'userModel'=> 'Users'
                ]
            ], // Добавили эту строку
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'storage'=>'Session',
        ]);

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['verification','logout','register','forgotpassword','resetpassword']);

        $user_id = $this->Auth->user('id');
        $this->set('user_id',$user_id);
    }

//    public function isAuthorized($user)
//    {
////        if ($this->request->getParam('prefix') === 'admin') {
////            return (bool)($user['role'] === 'admin');
////        }
////        if ($this->request->getParam('controller' ) == 'Home' and $this->request->getParam('action' ) == 'index') {
////            return true;
////        }
//
////
//////
////
////            if ($this->request->getParam('controller' ) == 'Users' and $this->request->getParam('action' ) == 'newpassword') {
////                return true;
////            }
////
////        if ($this->request->getParam('controller' ) == 'Users' and $this->request->getParam('action' ) == 'identify') {
////            return true;
////        }
//    }
}
