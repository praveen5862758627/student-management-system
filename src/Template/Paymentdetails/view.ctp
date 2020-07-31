<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentdetail $paymentdetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paymentdetail'), ['action' => 'edit', $paymentdetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paymentdetail'), ['action' => 'delete', $paymentdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentdetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paymentdetails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paymentdetail'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paymentdetails view large-9 medium-8 columns content">
    <h3><?= h($paymentdetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Productcode') ?></th>
            <td><?= h($paymentdetail->productcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Productname') ?></th>
            <td><?= h($paymentdetail->productname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Razorpay Payment Id') ?></th>
            <td><?= h($paymentdetail->razorpay_payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Razorpay Order Id') ?></th>
            <td><?= h($paymentdetail->razorpay_order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Order Id') ?></th>
            <td><?= h($paymentdetail->merchant_order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($paymentdetail->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($paymentdetail->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime') ?></th>
            <td><?= h($paymentdetail->datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paymentdetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($paymentdetail->userid) ?></td>
        </tr>
    </table>
</div>
