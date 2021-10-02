<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use function React\Promise\all;
use Cake\ORM\TableRegistry;


class ArticlesController extends AppController
{

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

    public function view($id)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            // Для версий ниже 3.4.0 использовался $this->request->data().
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            // Добавили эту строку
            $article->user_id = $this->Auth->user('id');
            // Также вы могли сделать следующее
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Articles->patchEntity($article, $newData);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);

        // Просто добавили список категорий, чтобы можно было выбрать
        // категорию для статьи
        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Ваша статья была обновлена.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка обновления вашей статьи.'));
        }

        $this->set('article', $article);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Статья с id: {0} была удалена.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
        parent::isAuthorized($user);

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
}

