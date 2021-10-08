<table>
    <tr>
        <th>№</th>
        <th>Name</th>
        <th>Detail</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>
    <?php foreach ($posts as $post):?>
    <tr>
        <td><?= $post->id?></td>
        <td><?= $post->name?></td>
        <td><?= $post->detail?></td>
        <td><?= $post->created?></td>
        <td><?= $post->Modified?></td>
    </tr>
    <?php endforeach; ?>

</table>



