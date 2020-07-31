<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Target $target
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Target'), ['action' => 'edit', $target->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Target'), ['action' => 'delete', $target->id], ['confirm' => __('Are you sure you want to delete # {0}?', $target->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Target'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Target'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targetcompsopt'), ['controller' => 'Targetcompsopt', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcompsopt'), ['controller' => 'Targetcompsopt', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="target view large-9 medium-8 columns content">
    <h3><?= h($target->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($target->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($target->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Companycode') ?></th>
            <td><?= h($target->companycode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clustercode') ?></th>
            <td><?= h($target->clustercode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Careerpathcode') ?></th>
            <td><?= h($target->careerpathcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precondition') ?></th>
            <td><?= h($target->precondition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cutoff') ?></th>
            <td><?= h($target->cutoff) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Minage') ?></th>
            <td><?= h($target->minage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Maxage') ?></th>
            <td><?= h($target->maxage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month Approximate') ?></th>
            <td><?= h($target->month_approximate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($target->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($target->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Targetcomps') ?></h4>
        <?php if (!empty($target->targetcomps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Targetcode') ?></th>
                <th scope="col"><?= __('Competency Code') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($target->targetcomps as $targetcomps): ?>
            <tr>
                <td><?= h($targetcomps->id) ?></td>
                <td><?= h($targetcomps->target_id) ?></td>
                <td><?= h($targetcomps->targetcode) ?></td>
                <td><?= h($targetcomps->competency_code) ?></td>
                <td><?= h($targetcomps->level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Targetcomps', 'action' => 'view', $targetcomps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Targetcomps', 'action' => 'edit', $targetcomps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Targetcomps', 'action' => 'delete', $targetcomps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targetcomps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Targetcompsopt') ?></h4>
        <?php if (!empty($target->targetcompsopt)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Target Id') ?></th>
                <th scope="col"><?= __('Targetcode') ?></th>
                <th scope="col"><?= __('Competency Code') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($target->targetcompsopt as $targetcompsopt): ?>
            <tr>
                <td><?= h($targetcompsopt->id) ?></td>
                <td><?= h($targetcompsopt->target_id) ?></td>
                <td><?= h($targetcompsopt->targetcode) ?></td>
                <td><?= h($targetcompsopt->competency_code) ?></td>
                <td><?= h($targetcompsopt->level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Targetcompsopt', 'action' => 'view', $targetcompsopt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Targetcompsopt', 'action' => 'edit', $targetcompsopt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Targetcompsopt', 'action' => 'delete', $targetcompsopt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targetcompsopt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
