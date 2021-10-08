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

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">


    <?= $this->Html->css('default.css') ?>


</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">

    <div class="top-bar-section">
        <ul class="left">

            <li>
                <?= $this->Html->link('Home', ['controller'=> 'Home', 'action' => 'index']); ?>
            </li>

            <?php if($userrole != ''): ?>
            <li>
                <?= $this->Html->link('Articles', ['controller'=> 'Articles', 'action' => 'index']); ?>
            </li>
            <?php endif;?>


        </ul>
    </div>



    <div class="top-bar-section">
        <ul class="right">
            <? if ($userrole == '') {

                echo '<li>';
                echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']);
                echo '</li>';

                echo '<li>';
                echo $this->Html->link('Register', ['controller' => 'Users', 'action' => 'register']);
                echo '</li>';

            }
            echo '<div class="top-bar-section">';
                echo '<ul class="right">';
             if ($userrole == 'admin' or $userrole == 'superadmin' or $userrole == 'user'){

                echo '<li style="color: white">';
                echo $this->Html->link('Profile', ['controller'=> 'Users','action' => 'info']);
                echo'</li>';
                    echo '</ul>';
                echo '</div>';



             }?>


        </ul>
    </div>
</nav>


    <?php $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
