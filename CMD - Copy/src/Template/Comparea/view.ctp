<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comparea $comparea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comparea'), ['action' => 'edit', $comparea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comparea'), ['action' => 'delete', $comparea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comparea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comparea'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comparea'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comparea view large-9 medium-8 columns content">
    <h3><?= h($comparea->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($comparea->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($comparea->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($comparea->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comparea->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comparea->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comparea->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($comparea->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Topic') ?></h4>
        <?php if (!empty($comparea->topic)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Comparea Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Mcode') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($comparea->topic as $topic): ?>
            <tr>
                <td><?= h($topic->id) ?></td>
                <td><?= h($topic->comparea_id) ?></td>
                <td><?= h($topic->code) ?></td>
                <td><?= h($topic->mcode) ?></td>
                <td><?= h($topic->name) ?></td>
                <td><?= h($topic->description) ?></td>
                <td><?= h($topic->created) ?></td>
                <td><?= h($topic->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Topic', 'action' => 'view', $topic->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Topic', 'action' => 'edit', $topic->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Topic', 'action' => 'delete', $topic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topic->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
