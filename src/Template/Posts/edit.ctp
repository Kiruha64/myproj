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
                    <?= $this->Form->input('name',['value'=> $name ,'class' =>'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('detail',['value'=> $detail ,'class' =>'form-control' , 'rows'=>'3']) ?>
                </div>
                <br>
                <?=  $this->Form->button('Edit', ['class'=>'btn btn-warning col-md-3']) ?>
                <?=  $this->Html->link('Back', ['action'=>'index'], ['class'=>'btn btn-primary']) ?>
                <?=  $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
