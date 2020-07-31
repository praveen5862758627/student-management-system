 <?= $this->Html->css('mdb.css') ?>
 <?php  $parameters = $this->request->getAttribute('params'); ?>
<?php include('scriptfiles.ctp'); ?>

  <?php include('functionsscript.ctp'); ?>
  	
   <main>
   
   <h2 class="text-center font-bold pt-4 mb-5"><strong>Registration for <?php if($parameters['pass'][2] == 1) { echo 'Speaker'; } else if($parameters['pass'][2] == 2) { echo 'Project Mentor'; } else if($parameters['pass'][2] == 3) { echo 'Company'; } ?></strong></h2>
<!-- Classic tabs -->
<div class="classic-tabs mx-2">

  <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist">
    <li class="nav-item">
      <a class="nav-link  waves-light active show" id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange"
        role="tab" aria-controls="profile-classic-orange" aria-selected="true"><i class="fa fa-user-tie fa-2x pb-2"
          aria-hidden="true"></i><br>Personal Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange"
        role="tab" aria-controls="follow-classic-orange" aria-selected="false"><i class="fa fa-user-shield fa-2x pb-2"
          aria-hidden="true"></i><br>Area of Expertise</a>
    </li>
	
	<?php if($parameters['pass'][2] == 1) { ?>
    <li class="nav-item">
      <a class="nav-link waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange"
        role="tab" aria-controls="contact-classic-orange" aria-selected="false"><i class="fa fa-user-clock fa-2x pb-2"
          aria-hidden="true"></i><br>My Availability</a>
    </li>
	<?php } ?>
	
	<?php if($parameters['pass'][2] == 2) { ?>
    <li class="nav-item">
      <a class="nav-link waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange"
        role="tab" aria-controls="awesome-classic-orange" aria-selected="false"><i class="fa fa-server fa-2x pb-2"
          aria-hidden="true"></i><br>Project Listing</a>
    </li>
	<?php } ?>
	<?php if($parameters['pass'][2] == 3) { ?>
	<li class="nav-item">
      <a class="nav-link waves-light" id="apprentice-tab-classic-orange" data-toggle="tab" href="#apprentice-classic-orange"
        role="tab" aria-controls="apprentice-classic-orange" aria-selected="false"><i class="fa fa-user-tag fa-2x pb-2"
          aria-hidden="true"></i><br>Apprentice</a>
    </li>
	<?php } ?>
	
  </ul>

 <?= $this->Form->create($targetexamslist, array('action' => '/registerusers/','style'=>'padding-left:20px;padding-right: 20px;', 'class'=>'needs-validation', 'novalidate' => 'novalidate')) ?>

  <div class="tab-content card" id="myClassicTabContentOrange">
    <div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
         <div class="row setup-content-2" id="step-1">
        <div class="col-md-12">
            <h3 class="font-weight-bold pl-0 my-4"><strong>Personal Details</strong></h3>
			

			
			   <div class="form-row">
    <div class="col-md-4 mb-3 md-form">
	
	  <?= $this->Form->control('username' ,array('templates'=> ['inputContainer' => '{{content}}'],'label' => false,'class' => 'form-control' ,'id' => 'username','onkeypress'=>'return ischaracter(event)' , 'required' => 'required')); ?> 
  
  
  <label for="username"  class="active" >Username<span style="color:red;">*</span> :  <em class="result1" ></em></label>
  <div class="invalid-feedback">
        Please provide a valid Username.
      </div>
	
	</div>
	
	<div class="col-md-4 mb-3 md-form">
	    <?= $this->Form->control('fname' ,array('templates'=> ['inputContainer' => '{{content}}'],'label' => false,'class' => 'form-control' ,'id' => 'inputName','required' => 'required')); ?>
						
                        <label for="inputName"  class="active">First name<span style="color:red;">*</span> :</label>
						
				  <div class="invalid-feedback">
        Please provide a valid First name.
      </div>
	</div>
	
	
	<div class="col-md-4 mb-3 md-form">
	  <?= $this->Form->control('lname' ,array('templates'=> ['inputContainer' => '{{content}}'],'label' => false,'class' => 'form-control' ,'id' => 'inputName1','required' => 'required')); ?>
                        <label for="inputName1"  class="active">Last name<span style="color:red;">*</span> :</label>
							  <div class="invalid-feedback">
        Please provide a valid Last name.
      </div>	
						
						<?= $this->Form->input('password', ['type' => 'hidden','value' => '123456Aa']);  ?>
						
					
						<?= $this->Form->input('passkey', ['type' => 'hidden','value' => $parameters['pass'][0]]);  ?>
						<?= $this->Form->input('timeout', ['type' => 'hidden','value' => $parameters['pass'][1]]);  ?>
						<?= $this->Form->input('usertype', ['type' => 'hidden','value' => $parameters['pass'][2]]);  ?>
	
	</div>
	
	</div>
	
	
	  <div class="form-row">
    <div class="col-md-4 mb-3 md-form">
	       <?= $this->Form->control('email' ,array('templates'=> ['inputContainer' => '{{content}}'],'label' => false,'class' => 'form-control' ,'id' => 'email','required' => 'required')); ?>
				     <label for="email"  class="active">Email Address<span style="color:red;">*</span> :    <em class="result" ></em></label>
					 	  <div class="invalid-feedback">
        Please provide a valid Email address.
      </div>
	</div>
	 <div class="col-md-4 mb-3 md-form">
			 <?= $this->Form->control('phonenumber',array('templates'=> ['inputContainer' => '{{content}}'],'label' => false,'onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstude','onInput'=>'checkLength(10,this)','class' => 'form-control','required' => 'required' )); ?>
						
                        <label for="phpnenumbeforstude"  class="active">Phone Number<span style="color:red;">*</span> :</label>
							  <div class="invalid-feedback">
        Please provide a valid Phone Number.
      </div>
	</div>
	 <div class="col-md-4 mb-3 md-form">
	     <?= $this->Form->control('linkedinprofile' ,array('label' => false,'class' => 'form-control' ,'id' => 'inputName6')); ?>
				   <label for="inputName6"  class="active">LinkedIn Profile :</label>
	</div>
	</div>
			
          <div class="form-row">
    <div class="col-md-4 mb-3 md-form">    
          <?= $this->Form->control('pincode',array('templates'=> ['inputContainer' => '{{content}}'],'type'=>'text','id'=>'pincodeforstude','label' =>false,'onkeypress'=>'return isNumber(event)','class' => 'form-control','required' => 'required')); ?>
                        <label for="pincodeforstude" class="active">Zip Code :</label>
						<div class="invalid-feedback">
        Please provide a valid Zip Code.
      </div>
		 </div>
	</div>
          
			
			
		
			
            <button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" onclick="nextbutton(1)">Next</button>
        </div>
    </div>
    </div>
    <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
     <!-- Second Step -->
    <div class="row setup-content-2" id="step-2">
        <div class="col-md-12">
		
            <h3 class="font-weight-bold pl-0 my-4"><strong>Area of Expertise</strong></h3>
            <div class="form-group md-form">
               
				
				<?=	
				 $this->Form->input('industry', array(
    'options' => array('Accounting'=>'Accounting','Consulting'=>'Consulting','Sales'=>'Sales','Education'=>'Education'),
    'type' => 'select',
   //'empty' => array('value selected disabled'=>'SSLC - Stream'),
    'label' => false,
	'class' => 'mdb-select md-form',
	'id' => 'industry',
'disabled' => array('Industry'=>'Industry'),
	'searchable'=>'Search here..'
   )
); ?>

<label for="industry" class="active">Industry</label>
				
				
            </div>
            <div class="form-group md-form mt-3">
            
				
					<?=	
				 $this->Form->input('functionalexpertise', array(
    'options' => array('Area1'=>'Area1','Area2'=>'Area2'),
    'type' => 'select',
   //'empty' => array('value selected disabled'=>'SSLC - Stream'),
    'label' => false,
	'class' => 'mdb-select md-form',
	'id' => 'functionalexpertise',
'disabled' => array('Functional expertise'=>'Functional expertise'),
	'searchable'=>'Search here..'
   )
); ?>

<label for="functionalexpertise" class="active">Functional expertise</label>
				
				
				
            </div>
           
            <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Expertise</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
				
				
					<?=	
				 $this->Form->input('expertise', array(
    'options' => array('Area1'=>'Area1','Area2'=>'Area2'),
    'type' => 'select',
   //'empty' => array('value selected disabled'=>'SSLC - Stream'),
    'label' => false,
	'class' => 'mdb-select md-form',
	'id' => 'expertise',
'disabled' => array('Expertise'=>'Expertise'),
	'searchable'=>'Search here..'
   )
); ?>

<label for="expertise" class="active">Expertise</label>
				
            </div>
            <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button" onclick="previousbutton(1)">Previous</button>
            <button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" onclick="nextbutton(2)">Next</button>
        </div>
    </div>
    </div>
		<?php if($parameters['pass'][2] == 1) { ?>
    <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
        <!-- Third Step -->
    <div class="row setup-content-2" id="step-3">
        <div class="col-md-12">
            <h3 class="font-weight-bold pl-0 my-4"><strong>My Availability</strong></h3>
            <div class="form-group md-form">
                <label for="surname-2" data-error="wrong" data-success="right">Availability</label>
                <input id="surname-2" type="text"  class="form-control">
            </div>
			  <div class="form-group md-form">
                <label for="surname-2" data-error="wrong" data-success="right">Location</label>
                <input id="surname-2" type="text" class="form-control">
            </div>
			
            <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button" onclick="previousbutton(2)">Previous</button>
           <!-- <button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" onclick="nextbutton(3)">Next</button>-->
        </div>
    </div>
    </div>
	
	<?php } ?>
	
	<?php if($parameters['pass'][2] == 2) { ?>
    <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
       <div class="row setup-content-2" id="step-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold pl-0 my-4"><strong>Project Listing</strong></h3>
           <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Description <span style="color:red;">*</span></label>
                <textarea id="yourAddress-2" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Definition <span style="color:red;">*</span></label>
                <textarea id="yourAddress-2" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Qualifying Criteria (Team)</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Team Size</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Estimated Duration</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Estimated Cost</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Type</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Patents/IP Clauses</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Design, Mockup, blueprint, etc</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Milestones</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Materials Needed</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Testing Specification</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Evaluation Criteria</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Terms and Conditions</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
            <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button" onclick="previousbutton(3)">Previous</button>
           <!-- <button class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" onclick="nextbutton(4)">Next</button>-->
        </div>
    </div>
    </div>
	
	<?php } ?>
	
	<?php if($parameters['pass'][2] == 3) { ?>
	    <div class="tab-pane fade" id="apprentice-classic-orange" role="tabpanel" aria-labelledby="apprentice-tab-classic-orange">
       <div class="row setup-content-2" id="step-4">
        <div class="col-md-12">
            <h3 class="font-weight-bold pl-0 my-4"><strong>Apprentice</strong></h3>
           <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Description <span style="color:red;">*</span></label>
                <textarea id="yourAddress-2" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Definition <span style="color:red;">*</span></label>
                <textarea id="yourAddress-2" type="text" required="required" rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Qualifying Criteria (Team)</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Team Size</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Estimated Duration</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Estimated Cost</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Type</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Patents/IP Clauses</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Design, Mockup, blueprint, etc</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Project Milestones</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Materials Needed</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Testing Specification</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Evaluation Criteria</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			  <div class="form-group md-form mt-3">
                <label for="yourAddress-2" data-error="wrong" data-success="right">Terms and Conditions</label>
                <textarea id="yourAddress-2" type="text"  rows="2" class="md-textarea validate form-control"></textarea>
            </div>
			
            <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button" onclick="previousbutton(4)">Previous</button>
          
        </div>
    </div>
    </div>
	
	<?php } ?>
	
	   
  </div>
   <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
    <?= $this->Form->end(); ?>

</div>
<!-- Classic tabs -->
   



 




 <!-- Third Step -->

    <!-- Fourth Step -->
   <!-- <div class="row setup-content-2" id="step-5">
        <div class="col-md-12">
            <h3 class="font-weight-bold pl-0 my-4"><strong>Finish</strong></h3>
            <h2 class="text-center font-weight-bold my-4">Registration completed!</h2>
            <button class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
            <button class="btn btn-success btn-rounded float-right" type="submit">Submit</button>
			
			 
        </div>
    </div>-->
 

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})



$('document').ready(function(){
    $('#email').keyup(function(){
        var email = $(this).val();
		
		
        $.ajax({
                  type:'POST',
               
				   url: targeturl+'Users/emailCheck/',
                  dataType: "text",
                  data:{email:email},
				  cache: false,
				   beforeSend: function(xhr) {
					    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
   
  },
                  success: function(data)
                  {
					  
					  if(validateEmail(email) == true){
                      if(data){
                          $( ".result" ).html('<em style="color:red">Someone already has that Email. Try another?</em>');
                      }else{
                         $( ".result" ).html('<em style="color:green">The email is still available!!</em>');
                      }
					  }
					  else
					  {
						   $( ".result" ).html('<em style="color:red">Invalid Email address.</em>');
					  }

                  }
        });
    });
	
	function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
	
	$('#username').keyup(function(){
        var username = $(this).val();
		
		
        $.ajax({
                  type:'POST',
               
				   url: targeturl+'Users/usernameCheck/',
                  dataType: "text",
                  data:{username:username},
				  cache: false,
				   beforeSend: function(xhr) {
					    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
   
  },
                  success: function(data)
                  {
                      if(data){
                          $( ".result1" ).html('<em style="color:red">Someone already has that Username. Try another?</em>');
                      }else{
                         $( ".result1" ).html('<em style="color:green">The Username is still available!!</em>');
                      }

                  }
        });
    });
	
	
	 });
	 function ischaracter(event) {
   
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
             return false;
        }
		 return true;
}

(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>

  </main>