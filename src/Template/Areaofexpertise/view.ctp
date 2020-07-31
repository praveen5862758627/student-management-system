<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Areaofexpertise $areaofexpertise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Areaofexpertise'), ['action' => 'edit', $areaofexpertise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Areaofexpertise'), ['action' => 'delete', $areaofexpertise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areaofexpertise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Areaofexpertise'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Areaofexpertise'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areaofexpertise view large-9 medium-8 columns content">
    <h3><?= h($areaofexpertise->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($areaofexpertise->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($areaofexpertise->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Industry') ?></h4>
        <?= $this->Text->autoParagraph(h($areaofexpertise->industry)); ?>
    </div>
    <div class="row">
        <h4><?= __('Functionalexpertise') ?></h4>
        <?= $this->Text->autoParagraph(h($areaofexpertise->functionalexpertise)); ?>
    </div>
    <div class="row">
        <h4><?= __('Liketobe') ?></h4>
        <?= $this->Text->autoParagraph(h($areaofexpertise->liketobe)); ?>
    </div>
    <div class="row">
        <h4><?= __('Expertise') ?></h4>
        <?= $this->Text->autoParagraph(h($areaofexpertise->expertise)); ?>
    </div>
</div>
