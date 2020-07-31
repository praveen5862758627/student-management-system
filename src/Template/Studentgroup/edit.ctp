<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studentgroup $studentgroup
 */
   include('cssjs.ctp');
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentgroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentgroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Studentgroup'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
 <script>
 function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

 </script>
<div class="studentgroup form large-9 medium-8 columns content" style="width: 100%;">

    <?= $this->Form->create($studentgroup) ?>
    <fieldset>
        <legend><?= __('Edit Group') ?></legend>
        <?php
            echo $this->Form->control('name' , array('onkeypress'=>'return AvoidSpace(event)'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>
