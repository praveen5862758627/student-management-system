<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preferencesquestion[]|\Cake\Collection\CollectionInterface $preferencesquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Preferencesquestion'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="preferencesquestion index large-9 medium-8 columns content">
    <h3><?= __('Preferencesquestion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question7') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question8') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question9') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question10') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question11') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question12') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question13') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($preferencesquestion as $preferencesquestion): ?>
            <tr>
                <td><?= $this->Number->format($preferencesquestion->id) ?></td>
                <td><?= h($preferencesquestion->question1) ?></td>
                <td><?= h($preferencesquestion->question2) ?></td>
                <td><?= h($preferencesquestion->question3) ?></td>
                <td><?= h($preferencesquestion->question4) ?></td>
                <td><?= h($preferencesquestion->question5) ?></td>
                <td><?= h($preferencesquestion->question6) ?></td>
                <td><?= h($preferencesquestion->question7) ?></td>
                <td><?= h($preferencesquestion->question8) ?></td>
                <td><?= h($preferencesquestion->question9) ?></td>
                <td><?= h($preferencesquestion->question10) ?></td>
                <td><?= h($preferencesquestion->question11) ?></td>
                <td><?= h($preferencesquestion->question12) ?></td>
                <td><?= h($preferencesquestion->question13) ?></td>
                <td><?= h($preferencesquestion->answer) ?></td>
                <td><?= $this->Number->format($preferencesquestion->userid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $preferencesquestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $preferencesquestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $preferencesquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preferencesquestion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
