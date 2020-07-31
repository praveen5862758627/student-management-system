<style>
label{
	font-weight:bold !important;
}
</style>

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 
function checkLength(len,ele){
  var fieldLength = ele.value.length;
  if(fieldLength <= len){
    return true;
  }
  else
  {
    var str = ele.value;
    str = str.substring(0, str.length - 1);
    ele.value = str;
  }
}
function deleteuserpic(){
window.location = targeturl+"users/deleteuserpics";
}

function changeuserpic(){
 document.getElementById("file").click();
}


$(document).on("keydown","#addstu" ,function(evt){
     var firstChar = $("#addstu").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addstu1" ,function(evt){
     var firstChar = $("#addstu1").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#citystu" ,function(evt){
     var firstChar = $("#citystu").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});


$(document).on("keydown","#addressprofile" ,function(evt){
     var firstChar = $("#addressprofile").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addressprofile1" ,function(evt){
     var firstChar = $("#addressprofile1").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addressprofile2" ,function(evt){
     var firstChar = $("#addressprofile2").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).ready(function(){


$('#citystu').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('#addressprofile2').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});



$('#inputName').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#inputName1').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#fnameprofile').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#lnameprofile').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});



$('#inputName').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#inputName1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#fnameprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#lnameprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });



$('#addressprofile3').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#phonenumberprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#pincodeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#phpnenumbeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });


$('#addstu').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#citystu').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#pincodeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#addressprofile1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#addressprofile2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#addstu1').on("cut copy paste",function(e) {
     e.preventDefault();
 });






});

    function inputNameChk(t){
        var specialcharchk = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        var digitchk =/\d/; 
        if(specialcharchk.test(t.value)|| digitchk.test(t.value)){
              t.value='';
        }

    }  

</script>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
  include('cssjs.ctp');
?>
		<script>


function showpassword(a) {
if(a ==1 )
  var x = document.getElementById("mypassowrdprofile");
  else 
   var x = document.getElementById("passwordprofile");
  
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function() {
	
	 $("#captchaOperationvalue2").submit(function(event) {
					 
					  var recaptcha = $("#g-recaptcha-response").val();
   if (recaptcha === "") {
   event.preventDefault();
      alert('Please check the recaptcha');
   }

   
});
	
	 });


</script>

<div class="users form large-9 medium-8 columns content" style="width: 100%;">
   
    
  
    
	
	<?= $this->Form->create($user, ['type' => 'file','id'=>'captchaOperationvalue2']); ?>
	

	
			<?= $this->Form->input('fname' ,array('label' => 'First Name','id' => 'inputName')); ?>
			<?= $this->Form->input('lname' ,array('label' => 'Last Name','id' => 'inputName1')); ?>
			<?= $this->Form->input('email'); ?>
			<?= $this->Form->input('username',array('style'=>'margin-bottom: 1px !important;','autocomplete' => 'off')); ?>
			<em style="font-size: 12px;line-height: 1.0 !important;">Username should be in lowercase.</em><br />
			<!--<?= $this->Form->input('userroles_id', ['type' => 'hidden','value' => '2']);  ?>-->
			<?= $this->Form->input('password', array('type' => 'password','id' => 'passwordprofile','style'=>'margin-bottom: 1px !important;','label' => __('Password'),'autocomplete' => 'off')); ?>
			<em style="font-size: 12px;line-height: 1.0 !important;">Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters. maximum length should be only 14 characters.</em><br />
				<input type="checkbox" onclick="showpassword(2)">Show Password
			


			<?=	
				 $this->Form->input('gender', array(
    'options' => $options,
    'type' => 'select',
    'empty' => 'Select the gender',
  'label' => false,
		'style'=>'display:none !important',
		'value'=>'Male'
   )
); ?>
	<?php /*
				
					<?= $this->Form->control('address',array('label' => 'Address1','type'=>'text','required'=>'required','id'=>'addstu')); ?>
					<?= $this->Form->control('address2',array('label' => 'Address2','type'=>'text','required'=>'required','id'=>'addstu1')); ?>
					<?= $this->Form->control('city',array('label' => 'City','type'=>'text','required'=>'required','id'=>'citystu')); ?>
					<?= $this->Form->control('pincode',array('label' => 'Pincode','type'=>'text','required'=>'required','id'=>'pincodeforstude','onkeypress'=>'return isNumber(event)')); ?>
					
					
					<?=	
				 $this->Form->input('state', array(
    'options' => $indianStates,
    'type' => 'select',
    'empty' => 'Select the State',
    'label' => 'Select the State',
	'id' => 'addressprofile4',
	'required'=>'required'
)); ?> */ ?>
						<?= $this->Form->input('phonenumber' ,array('label' => 'Phone Number','onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstude','onInput'=>'checkLength(10,this)')); ?>
						
						
							 <?= $this->Form->input('userroles_id', array('label' => 'User Role','options' => $usertypes)); ?>
						 <div class="form-group">
<div class="g-recaptcha" data-sitekey="6LeK-KEUAAAAANdsa_t-uBMPhI8YSKlQXBLKd_Ei"></div>
 </div>
						
			<!--<?= $this->Form->input('photo', ['type' => 'file','name' => 'upload']); ?>-->
			<?= $this->Form->submit('Register', array('class' => 'button')); ?>
			
		<?= $this->Form->end(); ?>
	
</div>
