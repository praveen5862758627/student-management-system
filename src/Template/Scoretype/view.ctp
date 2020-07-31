<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scoretype $scoretype
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scoretype'), ['action' => 'edit', $scoretype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scoretype'), ['action' => 'delete', $scoretype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoretype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scoretype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scoretype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scorecard'), ['controller' => 'Scorecard', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scorecard'), ['controller' => 'Scorecard', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scoretype view large-9 medium-8 columns content">
    <h3><?= h($scoretype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($scoretype->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($scoretype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scoretype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scoretype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scoretype->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Scorecard') ?></h4>
        <?php if (!empty($scoretype->scorecard)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scoretype Id') ?></th>
                <th scope="col"><?= __('Targetcomps Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scoretype->scorecard as $scorecard): ?>
            <tr>
                <td><?= h($scorecard->id) ?></td>
                <td><?= h($scorecard->scoretype_id) ?></td>
                <td><?= h($scorecard->targetcomps_id) ?></td>
                <td><?= h($scorecard->date) ?></td>
                <td><?= h($scorecard->score) ?></td>
                <td><?= h($scorecard->created) ?></td>
                <td><?= h($scorecard->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scorecard', 'action' => 'view', $scorecard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Scorecard', 'action' => 'edit', $scorecard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scorecard', 'action' => 'delete', $scorecard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scorecard->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
