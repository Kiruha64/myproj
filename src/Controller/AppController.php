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
        $this->loadComponent('Flash');
//        $this->loadComponent('Auth', [
//            'authorize' => ['Controller'], // Добавили эту строку
//            'loginRedirect' => [
//                'controller' => 'Articles',
//                'action' => 'index'
//            ],
//            'logoutRedirect' => [
//                'controller' => 'Pages',
//                'action' => 'display',
//                'home'
//            ]
//        ]);

    }

//    public function beforeFilter(Event $event)
//    {
//        $userrole = $this->Auth->user('role');
//        $this->set('userrole',$userrole);
//        $username = $this->Auth->user('username');
//        $this->set('username',$username);
//        $userid = $this->Auth->user('id');
//        $this->set('userid',$userid);
////        $this->Auth->allow();
//        $this->viewBuilder()->setLayout('admin');
//
//    }

//    public function isAuthorized($user)
//    {
////        if (isset($user['role']) && $user['role'] === 'admin') {
//////            return true;
////            $this->Auth->allow('index');
////
////        }
////        if (isset($user['role']) && $user['role'] === 'superadmin') {
////            return true;
////        }
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
//        return true;
//
//
//    }
}
