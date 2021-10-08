

<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th>role</th>
        <th>created</th>

        <th>Actions</th>


    </tr>


<? foreach ($users as $user): ?>
    <tr>
        <td><?= $this->Html->link($user->id, ['action' => 'info', $user->id]) ?></td>
        <td>
            <?= $user->username ?>
        </td>
        <td>
            <?= $user->password ?>
        </td>
        <td>
            <?= $user->role ?>
        </td>
        <td>
            <?= $user->created ?>
        </td>

        <td>
            <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $user->id],
                ['confirm' => 'Are u sure?'])
            ?>        </td>
    </tr>

    <?php endforeach; ?>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('Id') ?>
    <?= $this->Form->button(__('Find')); ?>
    <?= $this->Form->end() ?>

</table>

