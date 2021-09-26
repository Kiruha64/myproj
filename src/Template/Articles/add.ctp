<!-- Файл: src/Template/Articles/add.ctp -->

<h1>Добавить статью</h1>
<?php
echo $this->Form->create($article);
// просто добавили инпут для выбора категорий
echo $this->Form->input('category_id');
echo $this->Form->input('title');
echo $this->Form->input('body', ['rows' => '3']);
echo $this->Form->button(__('Сохранить статью'));
echo $this->Form->end();
