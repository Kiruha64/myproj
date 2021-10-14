<div class="container-fluid">
    <div class="row">
        <h3 style="color: white"><?= $article->title ?></h3>
    </div>
</div>

<div class="container-fluid"">
    <div class="row">
        <div>
            <h2></h2>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="row" >
        <img src="<?= '/'.$article->file_path ?>"style="max-width: 600px;max-height: 100px">
        <img src="<?= '/'.$article->img_path; ?>">

    </div>
</div>

<div class="container-fluid">
    <div class="row" id="about">
        <h3>About what film "<?= $article->title ?>":</h3>
        <p><?= $article->body ?></p>
    </div>
</div>

<div class="container-fluid">
    <div class="row" id="download">
        <h3>Download film "<?= $article->title ?>":</h3>
        <?= $this->Html->link('Download',['controller'=>'Articles','action'=>'download',$article->id],['class'=>'btn btn-success','id'=>'btn-download']) ?>
    </div>
</div>

