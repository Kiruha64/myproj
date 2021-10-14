<div class="container-fluid">
    <div class="row">
        <h3 style="color: white">Films</h3>
        <? foreach ($articles as $article):?>
            <div class="col-md-3 ">
                <div class="text-center article-view" style="max-width: 216px;max-height: 324px">
                    <img src="https://st.depositphotos.com/1813786/1807/i/600/depositphotos_18075463-stock-photo-fiery-font-for-hot-flame.jpg"style="max-width: 216px;max-height: 324px">
                    <h5><?= $this->Html->link($article->title, ['controller'=> 'Home', 'action' => 'view', $article->id])?></h5>
                </div>
            </div>
        <?endforeach;?>

        <?php
        $paginator = $this->Paginator->setTemplates([
            'number'=>'<li class="page-item "><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'current'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
            'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
            'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
            'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">Back</a></li>',
            'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">Forward</a></li>'
        ]);
        ?>
        <nav id="navigation">
            <ul class="pagination justify-content-center">
                <?php
                if ($paginator->hasPrev()){
                    echo $paginator->prev();
                }
                echo $paginator->first();

                echo $paginator->numbers();

                echo $paginator->last();

                if ($paginator->hasNext()){
                    echo $paginator->next();
                }

                ?>
            </ul>
        </nav>

    </div>
</div>



