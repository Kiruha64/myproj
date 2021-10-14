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
        <?= $this->Html->link('Add Category', ['controller'=> $controller, 'action' => 'add'], ['class'=>'btn btn-primary'])?>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr style="border-bottom: 1px solid #ebebec">
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody style="border-top: 0">
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= ($category->name) ?></td>
            <td><?= ($category->created) ?></td>
            <td><?= ($category->modified) ?></td>

            <td>
                <?= $this->Html->link('Edit', ['controller'=> 'Categories', 'action' => 'edit', $category->id], ['class'=>'btn btn-warning'])?>
                <?= $this->Form->postLink('Delete', ['controller'=> 'Categories', 'action' => 'delete', $category->id], ['class'=>'btn btn-danger','confirm'=>'Are you sure?'])?>
            </td>
        </tr>
    <?php endforeach; ?>


    </tbody>
</table>


