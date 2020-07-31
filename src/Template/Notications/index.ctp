

<table id="dtMaterialDesignExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
				<th scope="col">Date</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notications as $notication): ?>
            <tr>
                <td><?php echo $notication['id']; ?></td>
                <td><?php echo $notication['name']; ?></td>
				
			<?php 	$old_date_timestamp = strtotime($notication['notificationdate']);
  $dateob = date('d/m/Y', $old_date_timestamp);  ?>
				  <td><?= h($dateob) ?></td>
                <td class="actions">
                    
                    <?php $idd = $notication['id']; ?>
                    
                    <a href="/notications/edit/<?php echo $idd; ?>">Edit</a>
                  
                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete',$idd], ['confirm' => __('Are you sure you want to delete # {0}?', $idd)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	 <script>
// Material Design example
$(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  });
</script>