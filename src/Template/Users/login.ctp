<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your name,email and password') ?></legend>
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>


<div>
    <p><?= $this->Html->link('I forgot my password', ['action' => 'identify']) ?></p>
</div>
