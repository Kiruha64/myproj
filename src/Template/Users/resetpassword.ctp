<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Reset Password</h3>
            <div class="card-body">
                <?php echo $this->Form->create()?>
                <div class="form-group">
                    <?php echo $this->Form->input('password',['class'=>'form-control' ,'required' ])?>
                </div>
                <?= $this->Form->button('Reset password',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Login',['action'=>'login'],['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
