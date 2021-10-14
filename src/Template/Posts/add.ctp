<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $post
 */
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <?php echo $this->Form->create($post) ?>
                <div class="form-group">
                    <?= $this->Form->input('name',['class' =>'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('detail',['class' =>'form-control']) ?>
                </div>
                <button class="btn btn-success">Submit</button>

                <?=  $this->Html->link('Back', ['action'=>'index'], ['class'=>'btn btn-primary']) ?>
                <?=  $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
