<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Moduletarget $moduletarget
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Moduletarget'), ['action' => 'edit', $moduletarget->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Moduletarget'), ['action' => 'delete', $moduletarget->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moduletarget->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Moduletargets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Moduletarget'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="moduletargets view large-9 medium-8 columns content">
    <h3><?= h($moduletarget->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Modulecode') ?></th>
            <td><?= h($moduletarget->modulecode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targetcode') ?></th>
            <td><?= h($moduletarget->targetcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targetname') ?></th>
            <td><?= h($moduletarget->targetname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($moduletarget->id) ?></td>
        </tr>
    </table>
</div>
