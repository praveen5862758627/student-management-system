 <script>
$('#inputName').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('#inputName').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

 </script>

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
        <li><?= $this->Html->link(__('List Studentgroup'), ['action' => 'index']) ?></li>
    </ul>
</nav>-->
<div class="studentgroup form large-9 medium-8 columns content" style="width: 100%;">
    <?= $this->Form->create($studentgroup) ?>
    <fieldset>
        <legend><?= __('Add Groups') ?></legend>
        <?php
            echo $this->Form->control('name',array('id' => 'inputName', 'onkeypress'=>'return AvoidSpace(event)'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
