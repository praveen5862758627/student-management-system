
   <?= $this->Html->css('mdb.css') ?>
   <?php include('scriptfiles.ctp'); ?>
<p>Your payment was successful.   </p>

<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
  <span class="sr-only">Loading...</span>
</div>



Please wait. Adding modules to your profile is in progress.

<?php if($_GET['type'] =='modules') { ?> 
<script>
window.location = targeturl+"targetcomps/evalauetargetcompsformodules/<?php echo $_GET['pid']; ?>";
</script>

<?php } else { ?>

<script>
window.location = targeturl+"targetcomps/evalauetargetcompsforiccmods/<?php echo $_GET['pid']; ?>";
</script>

<?php } ?>