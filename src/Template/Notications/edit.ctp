 <?= $this->Form->create($notication,array('class'=>'border border-light p-5')) ?>
    <fieldset>
        <legend><?= __('Edit Notifications') ?></legend>
        <?php
            echo $this->Form->control('name',array('class'=>'form-control mb-4','label'=>'Name:','placeholder'=>"Name"));
            echo $this->Form->control('description',array('class'=>'form-control mb-4','label'=>'Description:','placeholder'=>"Description"));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>