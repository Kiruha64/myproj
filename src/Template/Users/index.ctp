

<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>password</th>
        <th>role</th>
        <th>created</th>

    </tr>
<?
    foreach ($users as $user): ?>
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
    </tr>
    <?php endforeach; ?>


</table>

