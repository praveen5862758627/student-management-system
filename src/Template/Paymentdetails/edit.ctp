<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentdetail $paymentdetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $paymentdetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paymentdetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Paymentdetails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paymentdetails form large-9 medium-8 columns content">
    <?= $this->Form->create($paymentdetail) ?>
    <fieldset>
        <legend><?= __('Edit Paymentdetail') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('productcode');
            echo $this->Form->control('productname');
            echo $this->Form->control('razorpay_payment_id');
            echo $this->Form->control('razorpay_order_id');
            echo $this->Form->control('merchant_order_id');
            echo $this->Form->control('type');
            echo $this->Form->control('price');
            echo $this->Form->control('datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
