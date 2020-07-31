<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentdetail[]|\Cake\Collection\CollectionInterface $paymentdetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Paymentdetail'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentdetails index large-9 medium-8 columns content">
    <h3><?= __('Paymentdetails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razorpay_payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razorpay_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentdetails as $paymentdetail): ?>
            <tr>
                <td><?= $this->Number->format($paymentdetail->id) ?></td>
                <td><?= $this->Number->format($paymentdetail->userid) ?></td>
                <td><?= h($paymentdetail->productcode) ?></td>
                <td><?= h($paymentdetail->productname) ?></td>
                <td><?= h($paymentdetail->razorpay_payment_id) ?></td>
                <td><?= h($paymentdetail->razorpay_order_id) ?></td>
                <td><?= h($paymentdetail->merchant_order_id) ?></td>
                <td><?= h($paymentdetail->type) ?></td>
                <td><?= h($paymentdetail->price) ?></td>
                <td><?= h($paymentdetail->datetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paymentdetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentdetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentdetail->id)]) ?>
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
