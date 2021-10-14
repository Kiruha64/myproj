<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use function React\Promise\all;

class HomeController extends AppController {

    public function index() {
        $articlesTable = TableRegistry::get('Articles');

        $this->paginate = [
            'limit'=>'4'
        ];

        $articles = $this->paginate($articlesTable->find('all'));
        $this->set('articles',$articles);

        $this->set('title', 'Recomend');

    }

    public function view($id = null) {
//        $categoriesTable = TableRegistry::get('Categories');
//        $articlesTable = TableRegistry::get('Articles');
//
//        $articles = $articlesTable->find('all');
//        $this->set('articles',$articles);
        $this->loadModel('Articles');

        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function beforeFilter(Event $event)
    {
//        parent::beforeFilter($event);
        $this->Auth->allow(['index','view','films']);
        $user_id = $this->Auth->user('id');
        $this->set('user_id',$user_id);

    }


    public function films(){
        $this->loadModel('Article');
        $this->loadModel('Categories');

        $articlesTable = TableRegistry::get('Articles');
        $articles = $this->paginate($articlesTable->find('all')->where(['category_id'=>1]));

        $this->paginate = [
            'limit'=>'4'
        ];

//        $articles = $articlesTable->find('all')->where(['id'=>1]);
        $this->set('articles',$articles);
    }
    public function serials(){
        $this->loadModel('Article');
        $this->loadModel('Categories');

        $articlesTable = TableRegistry::get('Articles');
        $articles = $this->paginate($articlesTable->find('all')->where(['category_id'=>2]));

        $this->paginate = [
            'limit'=>'4'
        ];

//        $articles = $articlesTable->find('all')->where(['id'=>1]);
        $this->set('articles',$articles);
    }
    public function cartoons(){
        $this->loadModel('Article');
        $this->loadModel('Categories');

        $articlesTable = TableRegistry::get('Articles');
        $articles = $this->paginate($articlesTable->find('all')->where(['category_id'=>4]));

        $this->paginate = [
            'limit'=>'4'
        ];

//        $articles = $articlesTable->find('all')->where(['id'=>1]);
        $this->set('articles',$articles);
    }




}
