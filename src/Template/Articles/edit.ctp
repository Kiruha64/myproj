<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php echo $this->Flash->render()?>
        <div class="card">
            <h3 class="card-header">Edit Article</h3>
            <div class="card-body">

                <?php echo $this->Form->create(null, ['enctype'=>'multipart/form-data'])?>

                <div class="form-group">
                    <label>Title image</label><br>
                    <?= $this->Form->file('img')?><br>
                    <img src="<?php echo '/'.$article->img_path ?>">
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('title',['value'=> $article->title ,'class'=>'form-control' ,'required' ])?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('body',['value'=> $article->body ,'class'=>'form-control' ,'required' ,'rows' => '3']); ?>
                </div>

                <!--                --><?//= $this->Form->input('category_id'); ?>
                <div class="form-group">
                    <label>Category</label>
                    <select class="col-md-12 form-select"name="category_id">
                        <option value="<?= $thiscategory->id ?>"selected><?php echo $thiscategory->name?></option>

                        <? foreach($categories as $category):?>
                            <option value="<?= $category->id ?>"><?php echo $category->name?></option>
                        <? endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Video</label><br>
                    <?= $this->Form->file('file',['value'=>'/'.$article->file_path])?><br>
                    <img src="<?php echo '/'.$article->file_path ?>">

                </div>


                <?= $this->Form->button('Add',['class'=>'btn btn-success']) ?>
                <?= $this->Html->link('Back' ,['action'=>'index'], ['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

