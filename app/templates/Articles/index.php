<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $articles
 */
?>
<h1>Articles</h1>
<p>
    <?= $this->Html->link("Add Article", ['action' => 'add']) ?>
</p>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here's where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($articles as $article): ?>
        <tr>
            <td>
                <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
            </td>
            <td>
                <?= $article->created->format(DATE_ATOM) ?>
            </td>
            <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->id],
                    ['confirm' => 'Are you sure?']
                ) ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
