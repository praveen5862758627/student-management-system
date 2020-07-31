<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internshipdetail $internshipdetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internshipdetail'), ['action' => 'edit', $internshipdetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internshipdetail'), ['action' => 'delete', $internshipdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipdetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internshipdetails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internshipdetail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipdetails view large-9 medium-8 columns content">
    <h3><?= h($internshipdetail->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($internshipdetail->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($internshipdetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($internshipdetail->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($internshipdetail->description)); ?>
    </div>
</div>
