<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="related">
    <h4>
        <?= __('Related Articles') ?>
    </h4>
    <?php if (!empty($articles)): ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>
                        <?= __('Id') ?>
                    </th>
                    <th>
                        <?= __('User Id') ?>
                    </th>
                    <th>
                        <?= __('Title') ?>
                    </th>
                    <th>
                        <?= __('Slug') ?>
                    </th>
                    <th>
                        <?= __('Body') ?>
                    </th>
                    <th>
                        <?= __('Published') ?>
                    </th>
                    <th>
                        <?= __('Created') ?>
                    </th>
                    <th>
                        <?= __('Modified') ?>
                    </th>
                    <th class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
                <?php foreach ($articles as $current): ?>
                    <tr>
                        <td>
                            <?= h($current->id) ?>
                        </td>
                        <td>
                            <?= h($current->user_id) ?>
                        </td>
                        <td>
                            <?= h($current->title) ?>
                        </td>
                        <td>
                            <?= h($current->slug) ?>
                        </td>
                        <td>
                            <?= h($current->body) ?>
                        </td>
                        <td>
                            <?= h($current->published) ?>
                        </td>
                        <td>
                            <?= h($current->created->format(DATE_ATOM)) ?>
                        </td>
                        <td>
                            <?= h($current->modified->format(DATE_ATOM)) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $current->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $current->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $current->id], ['confirm' => __('Are you sure you want to delete # {0}?', $current->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>
