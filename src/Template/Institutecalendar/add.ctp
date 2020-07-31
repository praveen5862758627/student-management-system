<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institutecalendar $institutecalendar
 */
   include('cssjs.ctp');
?>

<div class="institutecalendar form large-9 medium-8 columns content" style="width: 100%;">
    <?= $this->Form->create($institutecalendar) ?>
    <fieldset>
        <legend><?= __('Add an Event') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('code');
            echo $this->Form->control('color');
            echo $this->Form->control('start', array('id' => 'datepicker55555','autocomplete' => 'off','label' => 'Date of the Event :' ,'required' => 'required' ));
            echo $this->Form->control('ttype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	
	<button onclick="goBack()">Go Back</button>

<script>

 $( function() {
    $( "#datepicker55555" ).datepicker({dateFormat: 'yy-mm-dd',    minDate: 0});
  } );
 
function goBack() {
  window.history.back();
}
</script>
</div>
