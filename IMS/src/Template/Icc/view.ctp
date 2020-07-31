<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Icc $icc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Icc'), ['action' => 'edit', $icc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Icc'), ['action' => 'delete', $icc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Icc'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Icc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Icccomps'), ['controller' => 'Icccomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Icccomp'), ['controller' => 'Icccomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="icc view large-9 medium-8 columns content">
    <h3><?= h($icc->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($icc->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($icc->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($icc->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($icc->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Industry Id') ?></th>
            <td><?= $this->Number->format($icc->industry_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($icc->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($icc->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($icc->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Icccomps') ?></h4>
        <?php if (!empty($icc->icccomps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Icc Id') ?></th>
                <th scope="col"><?= __('Topic Code') ?></th>
                <th scope="col"><?= __('Lesson Code') ?></th>
                <th scope="col"><?= __('Level Code') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($icc->icccomps as $icccomps): ?>
            <tr>
                <td><?= h($icccomps->id) ?></td>
                <td><?= h($icccomps->icc_id) ?></td>
                <td><?= h($icccomps->topic_code) ?></td>
                <td><?= h($icccomps->lesson_code) ?></td>
                <td><?= h($icccomps->level_code) ?></td>
                <td><?= h($icccomps->score) ?></td>
                <td><?= h($icccomps->created) ?></td>
                <td><?= h($icccomps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Icccomps', 'action' => 'view', $icccomps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Icccomps', 'action' => 'edit', $icccomps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Icccomps', 'action' => 'delete', $icccomps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icccomps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
