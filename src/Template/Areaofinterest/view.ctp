<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Areaofinterest $areaofinterest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Areaofinterest'), ['action' => 'edit', $areaofinterest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Areaofinterest'), ['action' => 'delete', $areaofinterest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areaofinterest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Areaofinterest'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Areaofinterest'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areaofinterest view large-9 medium-8 columns content">
    <h3><?= h($areaofinterest->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($areaofinterest->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($areaofinterest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($areaofinterest->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($areaofinterest->description)); ?>
    </div>
</div>
