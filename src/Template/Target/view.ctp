<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Target $target
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Target'), ['action' => 'edit', $target->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Target'), ['action' => 'delete', $target->id], ['confirm' => __('Are you sure you want to delete # {0}?', $target->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Target'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Target'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="target view large-9 medium-8 columns content">
    <h3><?= h($target->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $target->has('user') ? $this->Html->link($target->user->name, ['controller' => 'Users', 'action' => 'view', $target->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Examcode') ?></th>
            <td><?= h($target->examcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($target->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($target->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($target->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Targetcomps') ?></h4>
        <?php if (!empty($target->targetcomps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Topiccode') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($target->targetcomps as $targetcomps): ?>
            <tr>
                <td><?= h($targetcomps->id) ?></td>
                <td><?= h($targetcomps->target_id) ?></td>
                <td><?= h($targetcomps->topiccode) ?></td>
                <td><?= h($targetcomps->level) ?></td>
                <td><?= h($targetcomps->score) ?></td>
                <td><?= h($targetcomps->created) ?></td>
                <td><?= h($targetcomps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Targetcomps', 'action' => 'view', $targetcomps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Targetcomps', 'action' => 'edit', $targetcomps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Targetcomps', 'action' => 'delete', $targetcomps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targetcomps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
