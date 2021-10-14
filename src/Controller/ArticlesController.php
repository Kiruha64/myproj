<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Exception\NotFoundException;
use function React\Promise\all;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;



class ArticlesController extends AppController{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $userid = $this->Auth->user('id');
        $this->set('articles', $this->Articles->find()->where(['user_id' => $userid]));

        $this->set('allarticles', $this->Articles->find('all'));



//        $ad = $this->paginate = [
//            'conditions' => [
//                'Articles.user_id' => $this->Auth->user('id'),
//            ]
//        ];
//        debug($ad);
//        $this->set('articles', $this->paginate($this->Articles));
//        $this->set('_serialize', ['articles']);
//        debug($this->set('_serialize', ['articles']));
//        $userid = $this->Auth->user('id');
////      $this->set('articles', $this->Articles->find('all'));
//        $articles = $this->Articles->find('all')->where(['Articles.user_id' => $userid]);
//        $this->set('articles', $articles);
//        $this->loadModel('User');
//        $this->loadModel('Article');
//        $data = $this->Article->query('SELECT * FROM Articles   ORDER by id desc');
//        $this->set('data',$data);

    }

    public function add()
    {
        if ($this->request->is('post')) {

            $imgname = $this->request->getData()['img']['name'];
            $imgtmp = $this->request->getData()['img']['tmp_name'];
            $imgext = substr(strrchr($imgname, "."), 1);
            $imgpath = "upload/".Security::hash($imgname).date('Y-m-d-H-i-s').".".$imgext;

            $filename = $this->request->getData()['file']['name'];
            $filetmp = $this->request->getData()['file']['tmp_name'];
            $fileext = substr(strrchr($filename, "."), 1);
            $filepath = "upload/".Security::hash($filename).date('Y-m-d-H-i-s').".".$fileext;


            $article = $this->Articles->newEntity();
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->img_name = $imgname;
            $article->img_path = $imgpath;
            $article->file_name = $filename;
            $article->file_path = $filepath;

            $article->user_id = $this->Auth->user('id');
            $article->created = date('Y-m-d H:i:s');
//            if (file_exists(WWW_ROOT.$article->file_path)){
//                $filepath = "upload/".Security::hash($filepath).".".$fileext;
//            }
//            if (file_exists(WWW_ROOT.$article->img_path)){
//                $filepath = "upload/".Security::hash($imgpath).".".$imgext;
//            }
            if ($this->Articles->save($article) and move_uploaded_file($imgtmp, WWW_ROOT.$imgpath) and move_uploaded_file($filetmp, WWW_ROOT.$filepath) ) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set('article', $article);

        $categoriesTable = TableRegistry::get('Categories');
        $categories = $categoriesTable->find('all');

//        $this->set(compact('categories'));
        $this->set('categories',$categories);
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {

            $imgname = $this->request->getData()['img']['name'];
            $imgtmp = $this->request->getData()['img']['tmp_name'];
            $imgext = substr(strrchr($imgname, "."), 1);
            $imgpath = "upload/".Security::hash($imgname).date('Y-m-d-H-i-s').".".$imgext;

            $filename = $this->request->getData()['file']['name'];
            $filetmp = $this->request->getData()['file']['tmp_name'];
            $fileext = substr(strrchr($filename, "."), 1);
            $filepath = "upload/".Security::hash($filename).date('Y-m-d-H-i-s').".".$fileext;


            $this->Articles->patchEntity($article, $this->request->getData());


            if ($imgname != ''){
                $article->img_name = $imgname;
                $article->img_path = $imgpath;
                move_uploaded_file($imgtmp, WWW_ROOT.$imgpath);
            }
            if ($filename != ''){
                $article->file_name = $filename;
                $article->file_path = $filepath;
                move_uploaded_file($filetmp, WWW_ROOT.$filepath);
            }


            if ($this->Articles->save($article)) {
                return $this->redirect(['action' => 'index']);
                $article->modified = date('Y-m-d H:i:s');

            }
            $this->Flash->error(__('Ошибка обновления вашей статьи.'));
        }
        $categoriesTable = TableRegistry::get('Categories');
        $categories = $categoriesTable->find('all');
        $thiscategory = $categoriesTable->find('all')->where(['id'=>$article->category_id])->first();


//        $this->set(compact('categories'));
        $this->set('categories',$categories);
        $this->set('thiscategory',$thiscategory);
        $this->set('article', $article);
    }

    public function download($id){
        $file = $this->Articles->get($id);
        $path = WWW_ROOT.$file->file_path;
        $this->response->body(function () use($path){
           return file_get_contents($path);
        });
        return $this->response->withDownload($file->file_name);
    }
    public function delete($id)
    {
        $article = $this->Articles->get($id);

        if ($this->Articles->delete($article)) {
            unlink(WWW_ROOT.$article->file_path);
            unlink(WWW_ROOT.$article->img_path);

            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
//        parent::isAuthorized($user);

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        if (isset($user['role']) && $user['role'] === 'superadmin') {
            return true;
        }
        if (isset($user['role']) && $user['role'] === 'user') {
            return true;
        }
        if (isset($user['role']) && $user['role'] === '') {
            return true;
        }

        // Все зарегистрированные пользователи могут добавлять статьи
        // До 3.4.0 $this->request->param('action') делали так.
        if ($this->request->getParam('action') === 'add') {
            return true;
        }
//        if (isset($user['role']) && $user['role'] === 'admin') {
//            return true;
//        }
        // Владелец статьи может редактировать и удалять ее
        // До 3.4.0 $this->request->param('action') делали так.
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            // До 3.4.0 $this->request->params('pass.0') делали так.
            $articleId = (int)$this->request->getParam('pass.0');
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }


//         parent::isAuthorized($user);
    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $title = 'Articles';
        $controller = 'Articles';

        $this->set('title', $title);
        $this->set('controller', $controller);        // Разрешить пользователям регистрироваться и выходить из системы.
        // Вы не должны добавлять действие «login», чтобы разрешить список.
        // Это может привести к проблемам с нормальным функционированием

//        if ($this->Auth->user('role') == 'admin'){
//            $this->Auth->deny('index');
//        }


    }
}

