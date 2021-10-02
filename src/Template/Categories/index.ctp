<div class="categories index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Id Родителя</th>
            <th>Lft</th>
            <th>Rght</th>
            <th>Имя</th>
            <th>Описание</th>
            <th>Создано</th>
            <th class="actions"><?= __('Действия') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->parent_id ?></td>
                <td><?= $category->lft ?></td>
                <td><?= $category->rght ?></td>
                <td><?= h($category->name) ?></td>
                <td><?= h($category->description) ?></td>
                <td><?= h($category->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Просмотреть'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Изменить'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $category->id], ['confirm' => __('Вы уверены, что хотите удалить # {0}?', $category->id)]) ?>
                    <?= $this->Form->postLink(__('Сместить вниз'), ['action' => 'moveDown', $category->id], ['confirm' => __('Вы уверены, что хотите сдвинуть категорию вниз # {0}?', $category->id)]) ?>
                    <?= $this->Form->postLink(__('Сместить вверх'), ['action' => 'moveUp', $category->id], ['confirm' => __('Вы уверены, что хотите сдвинуть категорию вверх # {0}?', $category->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
