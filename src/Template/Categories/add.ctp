<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Add Category</h3>
            <div class="card-body">
                <?php echo $this->Form->create()?>
                <div class="form-group">
                    <?php echo $this->Form->input('name',['class'=>'form-control' ,'required' ])?>
                </div>
                <?= $this->Form->button('Add',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Back' ,['action'=>'index'], ['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

