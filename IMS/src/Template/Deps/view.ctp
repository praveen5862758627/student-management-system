<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dep $dep
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dep'), ['action' => 'edit', $dep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dep'), ['action' => 'delete', $dep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Deps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dep'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depcomps'), ['controller' => 'Depcomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Depcomp'), ['controller' => 'Depcomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deps view large-9 medium-8 columns content">
    <h3><?= h($dep->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Industry') ?></th>
            <td><?= $dep->has('industry') ? $this->Html->link($dep->industry->name, ['controller' => 'Industry', 'action' => 'view', $dep->industry->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($dep->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($dep->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($dep->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dep->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dep->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dep->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($dep->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Depcomps') ?></h4>
        <?php if (!empty($dep->depcomps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Dep Id') ?></th>
                <th scope="col"><?= __('Topic Code') ?></th>
                <th scope="col"><?= __('Lesson Code') ?></th>
                <th scope="col"><?= __('Level Code') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dep->depcomps as $depcomps): ?>
            <tr>
                <td><?= h($depcomps->id) ?></td>
                <td><?= h($depcomps->dep_id) ?></td>
                <td><?= h($depcomps->topic_code) ?></td>
                <td><?= h($depcomps->lesson_code) ?></td>
                <td><?= h($depcomps->level_code) ?></td>
                <td><?= h($depcomps->score) ?></td>
                <td><?= h($depcomps->created) ?></td>
                <td><?= h($depcomps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Depcomps', 'action' => 'view', $depcomps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Depcomps', 'action' => 'edit', $depcomps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Depcomps', 'action' => 'delete', $depcomps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $depcomps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
