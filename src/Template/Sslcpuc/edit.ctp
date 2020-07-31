<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sslcpuc $sslcpuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sslcpuc->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sslcpuc->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sslcpuc'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sslcpuc form large-9 medium-8 columns content">
    <?= $this->Form->create($sslcpuc) ?>
    <fieldset>
        <legend><?= __('Edit Sslcpuc') ?></legend>
        <?php
            echo $this->Form->control('collegename');
            echo $this->Form->control('board');
            echo $this->Form->control('percentage');
            echo $this->Form->control('regno');
            echo $this->Form->control('joining');
            echo $this->Form->control('passout');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
