<br>
<?php
$this->assign('title', 'CMD');

?>
<style>
body {
  background-image: url("https://odinlearning.in/CMD/img/gplus_profil.png");


  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  /*background-size: cover;**/
  
   background-size: 1000px 1000px;
  
}
</style>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
<h2 style="text-align:center;color:red"> CMD </h2>
	<div class="panel">
		<h2 class="text-center">Login</h2>
		<?= $this->Form->create(); ?>
			<?= $this->Form->input('email'); ?>
			<?= $this->Form->input('password', array('type' => 'password')); ?>
			<?= $this->Form->submit('Login', array('class' => 'button')); ?>
		<?= $this->Form->end(); ?>
	</div>
</div>