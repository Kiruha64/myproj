<!-- Файл: src/Template/Articles/index.ctp (Добавлены ссылки для удаления) -->

<h1>Статьи блога</h1>
<p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Заголовок</th>
        <th>Дата создания</th>
        <th>Действия</th>
    </tr>

    <!-- Здесь мы проходимся в цикле по объекту запроса $articles, выводя данные статьи -->

    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td>
                <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
            </td>
            <td>
                <?= $article->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Form->postLink(
                    'Удалить',
                    ['action' => 'delete', $article->id],
                    ['confirm' => 'Вы уверены?'])
                ?>
                <?= $this->Html->link('Изменить', ['action' => 'edit', $article->id]) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
