<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="status view large-9 medium-8 columns content">
    <h3><?= h($status->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($status->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($status->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($status->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($status->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($status->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Questionbank') ?></h4>
        <?php if (!empty($status->questionbank)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Topic Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Targettype Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Program') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modifiled') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($status->questionbank as $questionbank): ?>
            <tr>
                <td><?= h($questionbank->id) ?></td>
                <td><?= h($questionbank->topic_id) ?></td>
                <td><?= h($questionbank->level_id) ?></td>
                <td><?= h($questionbank->code) ?></td>
                <td><?= h($questionbank->name) ?></td>
                <td><?= h($questionbank->author) ?></td>
                <td><?= h($questionbank->targettype_id) ?></td>
                <td><?= h($questionbank->status_id) ?></td>
                <td><?= h($questionbank->program) ?></td>
                <td><?= h($questionbank->created) ?></td>
                <td><?= h($questionbank->modifiled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questionbank', 'action' => 'view', $questionbank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questionbank', 'action' => 'edit', $questionbank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questionbank', 'action' => 'delete', $questionbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionbank->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
