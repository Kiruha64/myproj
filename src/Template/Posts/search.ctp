<div class="row">
    <div class="col-md-3">
        <h3>Posts</h3>
    </div>
    <div class="col-md-6">
        <form action="<?= $this->Url->build(['action'=>'search'])?>"method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control"/>
                <div class="input-group-prepend">
                    <button class="btn btn-primary input-group-text"type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 text-right">
        <?= $this->Html->link('Add Post', ['controller'=> 'Posts', 'action' => 'add'], ['class'=>'btn btn-primary'])?>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr style="border-bottom: 1px solid #ebebec">
            <th>ID</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody style="border-top: 0">
    <?php foreach ($posts as $post):?>
        <tr>
            <td><?= $post->id?></td>
            <td><?= $post->name?></td>
            <td><?= $post->detail?></td>
            <td><?= $post->created?></td>
            <td><?= $post->Modified?></td>
            <td>
                <?= $this->Html->link('Edit', ['controller'=> 'Posts', 'action' => 'edit', $post->id], ['class'=>'btn btn-warning'])?>
                <?= $this->Form->postLink('Delete', ['controller'=> 'Posts', 'action' => 'delete', $post->id], ['class'=>'btn btn-danger','confirm'=>'Are you sure?'])?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
$paginator = $this->Paginator->setTemplates([
    'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
    'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
    'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt</a></li>',
    'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt</a></li>'
]);
?>
<nav>
    <ul class="pagination">
        <?php
            echo $paginator->first();
            if ($paginator->hasPrev()){
                echo $paginator->prev();
            }
            echo $paginator->numbers();

            if ($paginator->hasNext()){
                echo $paginator->next();
            }
            echo $paginator->last();

        ?>
    </ul>
</nav>
