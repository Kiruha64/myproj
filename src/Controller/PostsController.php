<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;



class PostsController extends AppController {

    public function index(){

        $this->paginate = [
          'limit'=>'10'
        ];
        $posts = $this->paginate($this->Posts->find('all'));
        $this->set('posts', $posts);

    }
    public function search(){
        $search = $this->request->getQuery('search');
        $this->paginate = [
            'limit'=>'10'
        ];
//        $posts = $this->paginate($this->Posts->find('all')->where(
//            function ($exp,$query) use ($search){
//                    return $exp->like('detail','%'.$search.'%');
//            }));
        $posts = $this->paginate($this->Posts->find('all')
            ->where(['name LIKE' => '%'.$search.'%'])
            ->orWhere(['detail LIKE' => '%'.$search.'%']));
        $this->set('posts', $posts);

    }
    public function add(){
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')){
            $post = $this->Posts->patchEntity($post ,$this->request->getData());
            $post->created = date('Y-m-d H:i:s');
            $post->modified = date('Y-m-d H:i:s');
            if ($this->Posts->save($post)){
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set('post', $post);
    }

    public function edit($id = null){
        $post = $this->Posts->get($id);
        if ($this->request->is(['put' , 'post'])){
          $post = $this->Posts->patchEntity($post , $this->request->getData());
          $post->modified = date('Y-m-d H:i:s');
          $this->Posts->save($post);
          return $this->redirect(['action' => 'index']);
        }
        $this->set('name' , $post->name);
        $this->set('detail', $post->detail);
        $this->set('post', $post);
    }
    public function delete($id){
        if ($this->request->is(['delete','post'])){
            $post = $this->Posts->get($id);
            $this->Posts->delete($post);
            return $this->redirect(['action'=>'index']);
        }
    }
}
