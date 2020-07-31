<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Company'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exam'), ['controller' => 'Exam', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exam', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="company view large-9 medium-8 columns content">
    <h3><?= h($company->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($company->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yearofincorporation') ?></th>
            <td><?= h($company->yearofincorporation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($company->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Headoffice') ?></th>
            <td><?= h($company->headoffice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locations') ?></th>
            <td><?= h($company->locations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Turnover') ?></th>
            <td><?= h($company->turnover) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Industry Id') ?></th>
            <td><?= $this->Number->format($company->industry_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Noofemployees') ?></th>
            <td><?= $this->Number->format($company->noofemployees) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($company->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Exam') ?></h4>
        <?php if (!empty($company->exam)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->exam as $exam): ?>
            <tr>
                <td><?= h($exam->id) ?></td>
                <td><?= h($exam->company_id) ?></td>
                <td><?= h($exam->code) ?></td>
                <td><?= h($exam->name) ?></td>
                <td><?= h($exam->description) ?></td>
                <td><?= h($exam->position) ?></td>
                <td><?= h($exam->created) ?></td>
                <td><?= h($exam->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exam', 'action' => 'view', $exam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exam', 'action' => 'edit', $exam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exam', 'action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
