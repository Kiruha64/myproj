<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="jumbotron">
            <h3>Hello <?= $name ?></h3>
            <?= $this->Html->link('Logout',['action'=>'logout'],['class'=>'btn btn-info'])?>
        </div>
    </div>
</div>
