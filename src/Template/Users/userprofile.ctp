<style>
              input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	
</style>
 <div id="wrapper">

         <?php include('sidebar.ctp'); ?>

            <div id="page-wrapper" style="margin-top: 37px;">

<div class="container-fluid">


 <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Profile Edit/View
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#home" data-toggle="tab">profile</a>
                                        </li>
                                      
                                        <li><a href="#messages" data-toggle="tab">Edit</a>
                                        </li>

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">
                                                   <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="<?= $this->Url->image('dummy-man-570x570.png'); ?>" id="profile-image1" class="img-circle img-responsive"> 
                
                <input id="profile-image-upload" class="hidden" type="file">
<div style="color:#999;" >click here to change profile image</div>
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?= h($user->fname. " " .$user->lname) ?></h4></span>
              <span><p>Student</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?= h($user->fname) ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> <?= h($user->lname) ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7"> <?= h($user->created) ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"> <?= h($user->email) ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Username:</div><div class="col-sm-7"> <?= h($user->username) ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender:</div><div class="col-sm-7"> <?= h($user->gender) ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"> <?= h($user->address) ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7">Indian</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>




            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 

									  </div>
                                        
                                        <div class="tab-pane fade" id="messages">
                                        
	<div class="panel">
	
		<?= $this->Form->create($user, ['type' => 'file']); ?>
		   <div class="form-group">
			<?= $this->Form->control('fname' ,array('label' => 'First Name :','class' => 'form-control')); ?>
			  </div>
			   <div class="form-group">
			<?= $this->Form->control('lname' ,array('label' => 'Last Name :','class' => 'form-control')); ?>
			  </div>
			   <div class="form-group">
			<?= $this->Form->control('email',array('label' => 'Email :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
			  </div>
			   <div class="form-group">
			<?= $this->Form->control('username',array('label' => 'User Name :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
			  </div>
			   <div class="form-group">
			<?= $this->Form->control('userroles_id', ['type' => 'hidden','value' => '2']);  ?>
			  </div>
			   <div class="form-group">
			<?= $this->Form->control('password', array('label' => 'Password :','type' => 'password','class' => 'form-control')); ?>
			  </div>
			
			   <div class="form-group">
				<?=	
				 $this->Form->control('gender', array(
    'options' => $options,
    'type' => 'select',
    'empty' => 'Select the gender',
    'label' => 'Gender : ',
	'class' => 'form-control'
   )
); ?>
  </div>
				   <div class="form-group">
					<?= $this->Form->control('address',array('label' => 'Address :','class' => 'form-control')); ?>
					  </div>
					   <div class="form-group">
						<?= $this->Form->control('phonenumber',array('label' => 'Phone Number :','class' => 'form-control')); ?>
						  </div>
						
						
						
			
			<?=  $this->Form->button('submit', array('class' => '"btn btn-default' ,'value' => 'Save Details'));  ?>
			
		<?= $this->Form->end(); ?>
	</div>



									   </div>
                                        
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->



</div>




    
		 </div>
		  </div>