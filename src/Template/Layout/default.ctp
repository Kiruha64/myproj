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
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <? if ($userrole == 'admin' or $userrole == 'superadmin' or $userrole == 'user'){

                    echo '<li>';
                    echo $this->Html->link('logout', ['controller'=> 'Users','action' => 'logout']);
                    echo'</li>';

                    echo '<h3 style="color: white">';
                    echo $this->Html->link($username, ['controller'=> 'Users','action' => 'info']);
                    echo'</h3>';

                }
                else {
                    echo '<li>';
                    echo $this->Html->link('Login', ['controller'=> 'Users','action' => 'login']);
                    echo'</li>';

                    echo '<li>';
                    echo $this->Html->link('Register', ['controller'=> 'Users','action' => 'add']);
                    echo'</li>';
                }

                ?>

            </ul>
        </div>
    </nav>
    <?php if ($userrole != ''):?>
    <div class="actions large-2 medium-3 columns">
        <h3><?= __('Действия') ?></h3>


        <ul class="side-nav">
            <li><?= $this->Html->link(__('Новая Категория'), ['action' => 'add']) ?></li>
        </ul>
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>

            <?php if ($userrole == 'superadmin'):?>
            <li><?= $this->Html->link(__('Users'),['controller' => 'Users', 'action' => 'index']) ?></li>
            <? endif;?>

            <li><?= $this->Html->link(__('List Parent Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        </ul>

    </div>
    <? endif;?>
    <?php $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
