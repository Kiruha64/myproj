<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Forgot Password</h3>
            <div class="card-body">
                <?php echo $this->Form->create()?>
                <div class="form-group">
                    <?php echo $this->Form->input('email',['class'=>'form-control' ,'required' ])?>
                </div>
                <?= $this->Form->button('Get New Password',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Login',['action'=>'login'],['class'=>'btn btn-info']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
