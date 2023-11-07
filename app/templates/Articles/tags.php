<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
?>
<h1>
    Articles tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
    <?php foreach ($articles as $article): ?>
        <article>
            <!-- Use the HtmlHelper to create a link -->
            <h4>
                <?= $this->Html->link(
                    $article->title,
                    ['controller' => 'Articles', 'action' => 'view', $article->id]
                ) ?>
            </h4>
            <span>
                <?= h($article->created->format(DATE_ISO8601)) ?>
            </span>
        </article>
    <?php endforeach; ?>
</section>
