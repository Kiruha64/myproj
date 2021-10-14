<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">


    <?= $this->Html->css('default') ?>
    <?= $this->Html->css('home') ?>

</head>

<body>
<!--<nav class="top-bar expanded" data-topbar role="navigation">-->
<!---->
<!--    <div class="top-bar-section">-->
<!--        <ul class="left">-->
<!---->
<!--            <li>-->
<!--                --><?//= $this->Html->link('Home', ['controller'=> 'Home', 'action' => 'index']); ?>
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                --><?//= $this->Html->link('Posts', ['controller'=> 'Posts', 'action' => 'index']); ?>
<!--            </li>-->
<!---->
<!--            --><?php //if($userrole != ''): ?>
<!--            <li>-->
<!--                --><?//= $this->Html->link('Articles', ['controller'=> 'Articles', 'action' => 'index']); ?>
<!--            </li>-->
<!--            --><?php //endif;?>
<!---->
<!---->
<!--        </ul>-->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--    <div class="top-bar-section">-->
<!--        <ul class="right">-->
<!---->
<!--        --><?// if (isset($user_id) == '') {
//            echo '<li>';
//            echo $this->Html->link('Auth', ['controller' => 'Users', 'action' => 'login']);
//            echo '</li>';
//        }
//        else{
//              echo '<div class="top-bar-section">';
//                echo '<ul class="right">';
//                echo '<li style="color: white">';
//                echo $this->Html->link('Profile', ['controller'=> 'Users','action' => 'info']);
//                echo'</li>';
//                    echo '</ul>';
//                echo '</div>';
//        } ?>
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->




<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"style="padding: 0;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Films Ua</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav m-auto ">
                    <li class="nav-item">
                        <a class="nav-link "href="/films">Films</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/categories">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="/articles">Articles</a>
                    </li>
                </ul>
                    <? if ($user_id == '') {
                        echo '<li>';
                        echo $this->Html->link('Auth', ['controller' => 'Users', 'action' => 'login']);
                        echo '</li>';
                    }
                    else{
                        echo '<div class="top-bar-section">';
                        echo '<li style="color: white">';
                        echo $this->Html->link('Profile', ['controller'=> 'Users','action' => 'profile']);
                        echo'</li>';
                        echo '</div>';
                    } ?>
<!--                <form class="d-flex">-->
<!--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                    <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--                </form>-->
            </div>
        </div>
    </nav>
</header>




    <?php $this->Flash->render() ?>
    <div class="container clearfix" style="padding-top: 35px;">
        <br>




        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
