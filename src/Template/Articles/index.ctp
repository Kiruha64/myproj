<div class="row">
    <div class="col-md-3">
        <h3><?= $title ?></h3>
    </div>
    <div class="col-md-6">
        <form action="<?= $this->Url->build(['action'=>'search'])?>"method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <div class="input-group-prepend">
                    <button class="btn btn-primary input-group-text"type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right">
        <?= $this->Html->link('Add Articles', ['controller'=> $controller, 'action' => 'add'], ['class'=>'btn btn-primary'])?>
    </div>
</div>

<table class="table table-bordered table-striped"id="table">
    <thead>
    <tr style="border-bottom: 1px solid #ebebec">
        <th>ID</th>
        <th>Title</th>
        <th>body</th>
        <th>img_name</th>
        <th>img_path</th>
        <th>file_name</th>
        <th>file_path</th>
        <th>category_id</th>
        <th>user_id</th>
        <th>created</th>
        <th>modified</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody style="border-top: 0">
    <?php foreach ($allarticles as $article): ?>
        <tr id="info-column">
            <td><?= $article->id ?></td>
            <td><?= ($article->title) ?></td>
            <td><?= ($article->body) ?></td>
            <td><?= ($article->img_name) ?></td>
            <td><?= ($article->img_path) ?></td>
            <td><?= ($article->file_name) ?></td>
            <td><?= ($article->file_path) ?></td>
            <td><?= ($article->category_id) ?></td>
            <td><?= ($article->user_id) ?></td>
            <td><?= ($article->created) ?></td>
            <td><?= ($article->modified) ?></td>
            <td>
                <?= $this->Html->link('Edit', ['controller'=> 'Articles', 'action' => 'edit', $article->id], ['class'=>'btn btn-warning'])?>
                <?= $this->Html->link('Preview', ['controller'=> 'Home', 'action' => 'view', $article->id], ['class'=>'btn btn-info'])?>
                <?= $this->Form->postLink('Delete', ['controller'=> 'Articles', 'action' => 'delete', $article->id], ['class'=>'btn btn-danger','confirm'=>'Are you sure?'])?>
            </td>
        </tr>
    <?php endforeach; ?>


    </tbody>
</table>


