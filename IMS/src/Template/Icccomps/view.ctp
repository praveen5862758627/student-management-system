<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Icccomp $icccomp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Icccomp'), ['action' => 'edit', $icccomp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Icccomp'), ['action' => 'delete', $icccomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icccomp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Icccomps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Icccomp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Iccs'), ['controller' => 'Iccs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Icc'), ['controller' => 'Iccs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="icccomps view large-9 medium-8 columns content">
    <h3><?= h($icccomp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Icc') ?></th>
            <td><?= $icccomp->has('icc') ? $this->Html->link($icccomp->icc->name, ['controller' => 'Iccs', 'action' => 'view', $icccomp->icc->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Topic Code') ?></th>
            <td><?= h($icccomp->topic_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lesson Code') ?></th>
            <td><?= h($icccomp->lesson_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level Code') ?></th>
            <td><?= h($icccomp->level_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($icccomp->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($icccomp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($icccomp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($icccomp->modified) ?></td>
        </tr>
    </table>
</div>
