<!-- Файл: src/Template/Articles/add.ctp -->
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Add Article</h3>
            <div class="card-body">

                <?php echo $this->Form->create(null, ['enctype'=>'multipart/form-data'])?>

                <div class="form-group">
                    <label>Title image</label>
                    <?= $this->Form->file('img')?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('title',['class'=>'form-control' ,'required' ])?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('body',['class'=>'form-control' ,'required' ,'rows' => '3']); ?>
                </div>

<!--                --><?//= $this->Form->input('category_id'); ?>
                <div class="form-group">
                    <label>Category</label>
                    <select class="col-md-12 form-select"name="category_id">
                        <? foreach($categories as $category):?>
                            <option value="<?= $category->id ?>"><?php echo $category->name?></option>
                        <? endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Video</label>
                    <?= $this->Form->file('file')?>
                </div>


                <?= $this->Form->button('Add',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Back' ,['action'=>'index'], ['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
