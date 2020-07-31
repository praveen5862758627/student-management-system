<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Targetcomp $targetcomp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Targetcomp'), ['action' => 'edit', $targetcomp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Targetcomp'), ['action' => 'delete', $targetcomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targetcomp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="targetcomps view large-9 medium-8 columns content">
    <h3><?= h($targetcomp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Targetcode') ?></th>
            <td><?= h($targetcomp->targetcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Competency Code') ?></th>
            <td><?= h($targetcomp->competency_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($targetcomp->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($targetcomp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Target Id') ?></th>
            <td><?= $this->Number->format($targetcomp->target_id) ?></td>
        </tr>
    </table>
</div>
