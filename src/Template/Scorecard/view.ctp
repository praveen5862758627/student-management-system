<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scorecard $scorecard
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scorecard'), ['action' => 'edit', $scorecard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scorecard'), ['action' => 'delete', $scorecard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scorecard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Scorecard'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scorecard'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="scorecard view large-9 medium-8 columns content">
    <h3><?= h($scorecard->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Targetcomp') ?></th>
            <td><?= $scorecard->has('targetcomp') ? $this->Html->link($scorecard->targetcomp->id, ['controller' => 'Targetcomps', 'action' => 'view', $scorecard->targetcomp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($scorecard->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($scorecard->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scorecard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scoretype Id') ?></th>
            <td><?= $this->Number->format($scorecard->scoretype_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scorecard->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scorecard->modified) ?></td>
        </tr>
    </table>
</div>
