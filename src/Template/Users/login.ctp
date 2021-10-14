<!-- File: src/Template/Users/login.ctp -->
<!---->
<!--<div class="users form">-->
<!--    --><?//= $this->Flash->render() ?>
<!--    --><?//= $this->Form->create() ?>
<!--    <fieldset>-->
<!--        <legend>--><?//= __('Please enter your name,email and password') ?><!--</legend>-->
<!--        --><?//= $this->Form->control('email') ?>
<!--        --><?//= $this->Form->control('password') ?>
<!--    </fieldset>-->
<!--    --><?//= $this->Form->button(__('Login')); ?>
<!--    --><?//= $this->Form->end() ?>
<!--</div>-->
<!---->
<!---->
<!--<div>-->
<!--    <p>--><?//= $this->Html->link('register', ['action' => 'register']) ?><!--</p>-->
<!--</div>-->

<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Login</h3>
            <div class="card-body">
                <?php echo $this->Form->create()?>
                <div class="form-group">
                    <?php echo $this->Form->input('email',['class'=>'form-control' ,'required' ])?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('password',['class'=>'form-control' ,'required' ])?>
                </div>
                <?= $this->Form->button('Login',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Register' ,['action'=>'register'], ['class'=>'btn btn-primary']) ?>
                <?= $this->Html->link('Forgot password' ,['action'=>'forgotpassword'], ['class'=>'btn btn-info']) ?>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
