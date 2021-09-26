<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;


class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $this->set('articles', $this->Articles->find('all'));
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
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Ваша статья была сохранена.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Невозможно добавить вашу статью.'));
        }
        $this->set('article', $article);

        // Просто добавляем список категорий для возможности выбора
        // одной категории для статьи
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
}
