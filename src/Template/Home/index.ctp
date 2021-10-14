<div class="container-fluid">
    <div class="row">
        <h3 style="color: white">Recomended</h3>
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

<div class="container-fluid"id="footer">
    <div class="row">
        <div>
            <h2>ДИВИТИСЯ ФІЛЬМИ ОНЛАЙН УКРАЇНСЬКОЮ МОВОЮ В HD ЯКОСТІ</h2>
            <p>Чим себе зайняти після важких трудових буднів? Повсякденне життя пропонує масу варіантів, але практично кожна людина на нашій планеті любить переглядати улюблені кінокартини, тим паче з українським озвученням. Ми створили зручний і унікальний у своєму роді кінотеатр для перегляду кіно онлайн українською в комфортних для тебе умовах. Тобі більше ніколи не доведеться шукати якусь вільну хвилинку, щоб знайти підходящі кінотеатри, встигнути купити в касі або забронювати через інтернет квитки на улюблені місця. Все це залишилося позаду, а взамін великі перспективи дивитися фільми онлайн в хорошій HD якості українською мовою на нашому сайті. Дорогий гість ресурсу, пропонуємо тобі прямо зараз зануритися в неймовірно захоплюючий світ - новинки кінопрокату онлайн українською мовою доступні всім користувачам цілодобово!</p>
        </div>
    </div>
</div>

