<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personaldetail $personaldetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Personaldetail'), ['action' => 'edit', $personaldetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Personaldetail'), ['action' => 'delete', $personaldetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personaldetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personaldetails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personaldetail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personaldetails view large-9 medium-8 columns content">
    <h3><?= h($personaldetail->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($personaldetail->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($personaldetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($personaldetail->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($personaldetail->description)); ?>
    </div>
</div>
