<?php
// src/Controller/ArticlesController.php

namespace App\Controller;

use App\Controller\AppController;



class PostsController extends AppController {

    public function index(){
        $posts = $this->Posts->find('all');
        $this->set('posts', $posts);
    }

}
