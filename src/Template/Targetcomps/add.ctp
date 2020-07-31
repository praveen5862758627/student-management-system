<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Targetcomp $targetcomp
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="targetcomps form large-9 medium-8 columns content">
    <?= $this->Form->create($targetcomp) ?>
    <fieldset>
        <legend><?= __('Add Targetcomp') ?></legend>
        <?php
            echo $this->Form->control('target_id');
           // echo $this->Form->control('topiccode');
				?>
			<select name="topiccode" id="topiccode-id" required>
			<option value=""><?php  echo 'Select the Topic code'; ?></option>
		<?php
		foreach ($topiccodes as $k => $v) { ?>
			
			<option value="<?php  echo $v['tcode']; ?>"><?php  echo $v['tcode']; ?></option>
			<?php
 
}
		?>
		</select>
			<?php
            echo $this->Form->control('level');
            echo $this->Form->control('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
