<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studentgroup[]|\Cake\Collection\CollectionInterface $studentgroup
 */
   include('cssjs.ctp');
?>

<div class="studentgroup index large-9 medium-8 columns content" style="width: 100%;">


   
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               
				
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentgroupsto as $studentgroup1){ ?>
            <tr>
			
			
              
                <td><?php echo $studentgroup1['name']; ?></td>
                <td class="actions">
				
				
				<a  href="../../users/removefromgroup/<?php echo $studentgroup1['id'];?>/<?php echo $this->request->pass[0]; ?>" style="cursor:pointer;text-decoration:none;font-weight:bold" onclick="if (confirm('Are you sure you want to remove from the Group ?')) changeuserpic(); return false" >Remove from Group Admin</a>
                   
				 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
	
	 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
 
</div>
