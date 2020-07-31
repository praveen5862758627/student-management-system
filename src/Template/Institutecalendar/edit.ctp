<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institutecalendar $institutecalendar
 */
   include('cssjs.ctp');

?>
   <?= $this->Html->css('mdb.css') ?>
<div class="institutecalendar form large-9 medium-8 columns content" style="width: 100%;">
    <?= $this->Form->create($institutecalendar) ?>
    <fieldset>
        <legend><?= __('Edit an Event') ?></legend>
        <?php
            echo $this->Form->control('title');
          
           
            echo $this->Form->control('start' , array('id' => 'datepicker55555','autocomplete' => 'off','label' => 'Date of the Event :' ,'class'=>'form-control datepicker444','required' => 'required' ));
         
		  echo $this->Form->control('description');

		 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	<button onclick="goBack()">Go Back</button>

<script>

  $('.datepicker444').pickadate({format: 'dd-mm-yyyy'});
 
function goBack() {
  window.history.back();
}
</script>
</div>
