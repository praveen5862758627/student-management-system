     <?= $this->Html->css('mdb.css') ?>
 <?php  $parameters = $this->request->getAttribute('params'); 
 ?>
<?php include('scriptfiles.ctp'); ?>

  <?php include('functionsscript.ctp'); ?>
   <?php include('customcss.css'); ?>
	<body style="background-color: white;">
   <main>
     <div class="container-fluid" >
	 
	 
	 
	  <input type="hidden" value="<?php echo $parameters['pass'][0]; ?>" class="form-control form-control-sm"  id="useridforic" >
	  <input type="hidden" value="<?php echo $parameters['pass'][1]; ?>" class="form-control form-control-sm"  id="insidforic" >
	    <input type="hidden" value="<?php echo $parameters['pass'][2]; ?>" class="form-control form-control-sm"  id="getuserfname" >
	 
	 
	 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Industry Experts</a>
  </li>
  <li class="nav-item" onclick="listofcompanies()">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Jobscan</a>
  </li>
  
   <li class="nav-item" onclick="listofappliedjobs()">
    <a class="nav-link" id="appliedjobs-tab" data-toggle="tab" href="#appliedjobs" role="tab" aria-controls="appliedjobs"
      aria-selected="false">My Applied Jobs</a>
  </li>
 
</ul>
<div class="tab-content" id="myTabContent">

<div class="tab-pane fade" id="appliedjobs" role="appliedjobs" aria-labelledby="appliedjobs-tab">


 <table class="table table-striped table-bordered table-hover" id="appliedjblist">
                        <thead>
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th id="a1">Company Name</th>
                          
							<th id="a1">Job Title</th>
                       
<th id="a1">Job description</th>
<th id="a1">Job end date</th>
<th id="a1">Status</th>
<th id="a1">Applied Date</th>
<th id="a1">Processing Date</th>
                        </tr>
                        </thead>

                    </table>

</div>


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  
    <?= $this->Form->create($targetexamslist, array('action' => '/displayallusers/','class'=>'needs-validation')) ?>

	 
     <div class="row">
	  <div class="col-md-4">
                      <div class="md-form mb-0">
					   <?= $this->Form->control('searchtext' ,array('label' => false,'class' => 'form-control' ,'id' => 'inputNamesearch')); ?>
						
                        <label for="inputName"  class="active">Search by text</label>
					  
					  </div>
					  </div>

             <div class="col-md-4">
                      <div class="md-form mb-0">
               
				
				<?=	
				 $this->Form->input('industry', array(
    'options' => array('Accounting'=>'Accounting','Consulting'=>'Consulting','Sales'=>'Sales','Education'=>'Education','Administrative'=>'Administrative',
'Arts and Design'=>'Arts and Design',
'Business Development'=>'Business Development',
'Community & Social Services'=>'Community & Social Services',
'Engineering'=>'Engineering',
'Entrepreneurship'=>'Entrepreneurship',
'Finance'=>'Finance',
'Healthcare Services'=>'Healthcare Services',
'Human Resources'=>'Human Resources',
'Information technology'=>'Information technology',
'Legal'=>'Legal',
'Marketing'=>'Marketing',
'Media & Communications'=>'Media & Communications',
'Military & Protective services'=>'Military & Protective services',
'Operations'=>'Operations',
'Product Management'=>'Product Management',
'Program & Product management'=>'Program & Product management',
'Purchasing'=>'Purchasing',
'Quality Assurance'=>'Quality Assurance',
'Real Estate'=>'Real Estate',
'Research/Academic'=>'Research/Academic',
'Support'=>'Support'),
    'type' => 'select',
   'multiple' => 'multiple',
    'label' => false,
	//'required'=>'required',
	'class' => 'mdb-select md-form',
	'id' => 'industry',
'disabled' => array('Industry'=>'Industry'),
	'searchable'=>'Search here..'
   )
); ?>

<label for="industry" class="active">Industry</label>
				
			</div>	
            </div>
			
			<div class="col-md-4">
                      <div class="md-form mb-0">
             
				
				
					<?=	
				 $this->Form->input('expertise', array(
    'options' => array('Area1'=>'Area1','Area2'=>'Area2'),
    'type' => 'select',
   //'empty' => array('value selected disabled'=>'SSLC - Stream'),
    'multiple' => 'multiple',
	//'required'=>'required',
    'label' => false,
	'class' => 'mdb-select md-form',
	'id' => 'expertise',
'disabled' => array('Expertise'=>'Expertise'),
	'searchable'=>'Search here..'
   )
); ?>

<label for="expertise" class="active">Expertise</label>
				</div>
            </div>
			
			  <button class="btn btn-success btn-rounded float-right" type="submit">Search</button>
			</div>
			
			  <?= $this->Form->end(); ?>
			 <br />
			
           
   <div class="row mb-4">
   
   <?php foreach($getpaymentdetails as  $users) { ?>
							
							
							<?php /*<div class="col-lg-4 col-md-4 mb-4" style="padding-bottom: 10px;">
							  
<a href="https://iconnect.odinlearning.in/users/displaycardsdetails/<?php echo $users['aid']; ?>/<?php echo $users['usertype']; ?>" ><div class="card testimonial-card" style="padding-bottom: 10px;" >


  <div class="card-up indigo lighten-1"></div>


  <div class="avatar mx-auto white">
  
  <?php if($users['photoname'] =='-') { ?>
    <img src="https://iconnect.odinlearning.in/img/delete.jpg" class="rounded-circle" alt="woman avatar">
  <?php } else { ?>
   <img src="https://api.odinlearning.in/upload/<?php echo  $users['photoname']; ?>" class="rounded-circle" alt="woman avatar">
  <?php } ?>
  </div>


  <div class="card-body">
   
    <h4 class="card-title"><?php echo  $users['fname']; ?> <?php echo  $users['lname']; ?></h4>
	
	<?php if($users['usertype'] ==1) { ?>
	 <h5 class="indigo-text"><strong>Speaker</strong></h5>
	<?php } else if($users['usertype'] ==2) {?>
	 <h5 class="indigo-text"><strong>Project Mentor</strong></h5>
	 <?php } else if($users['usertype'] ==3) {?>
	 	 <h5 class="indigo-text"><strong>Company Coordinator</strong></h5>
	 <?php } ?>
	 
    <hr>

    <p><i class="fas fa-envelope mr-3"></i> <?php echo  $users['email']; ?> <br /> <i class="w-fa fas fa-phone"></i> <?php echo  $users['phonenumber']; ?>  </p>
	
  </div>

</div></a>

							
							</div> <?php */ ?>
						
   <?php } ?>
							
								
				
					
								
							
		</div>	
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
  
  <button type="button" class="btn btn-primary" onclick="listofcompanies()" style="display:none" id="butonbacj" >Back</button>
  
   <table class="table table-striped table-bordered table-hover" id="collegelistname">
                        <thead>
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th id="a1">Company Name</th>
                          
							<th id="a1">Action</th>
                        <!--    <th id="a1" ></th>
                            <th id="a1" ></th>-->

                        </tr>
                        </thead>

                    </table>
					
					   <table class="table table-striped table-bordered table-hover" id="jobslistcou">
                        <thead>
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th>Name</th>
                          <th>Description</th>
							<th>Job End Date</th>
							<th>No. of Position</th>
							 <th  ></th>
                        <!--    <th id="a1" ></th>
                            <th id="a1" ></th>-->

                        </tr>
                        </thead>

                    </table>
  
  
  </div>
 
</div>
	 
	 
					

</div>
   
   
   </main>
   </body>
   <script>
   $(document).ready(function() {
$('.mdb-select').materialSelect();
});
   </script>