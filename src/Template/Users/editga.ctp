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

$('#inputName2').keypress(function (e) {
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
 
 $('#inputName2').on("cut copy paste",function(e) {
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

    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit Group Admin') ?></legend>
        <?php
            echo $this->Form->control('fname',array('label' => 'First Name','id' => 'inputName'));
			echo $this->Form->control('lname',array('label' => 'Last Name','id' => 'inputName1'));
            echo $this->Form->control('email',array('readonly'=>'readonly'));
			 echo $this->Form->control('username',array('style'=>'margin-bottom: 1px !important;','id' => 'inputName2','readonly'=>'readonly'));
            echo $this->Form->control('password', array('type' => 'password','id' => 'passwordprofile','style'=>'margin-bottom: 1px !important;','label' => __('Password')));?>
				<em style="font-size: 12px;line-height: 1.0 !important;">Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters. maximum length should be only 14 characters.</em><br />
				<input type="checkbox" onclick="showpassword(2)">Show Password
			<?php
			
			
            echo $this->Form->control('userroles_id', ['options' => $role1 ,'readonly']);
         //  echo $this->Form->control('institution_id' , ['options' => $institution ,  'empty' => 'None']);
           
			
			?>
			<?=	
				 $this->Form->input('gender', array(
    'options' => $options,
    'type' => 'select',
    'empty' => 'Select the gender',
    'label' => 'Gender'
   )
); ?>
			<?php
            echo $this->Form->control('address',array('label' => 'Address1','type'=>'text','required'=>'required','id'=>'addstu'));
           // echo $this->Form->control('photoname');
            echo $this->Form->control('phonenumber',array('label' => 'Phone Number','onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstude','onInput'=>'checkLength(10,this)'));
        ?>
		
		<?=	
				 $this->Form->input('status', array(
    'options' => $options2,
    'type' => 'select',
    'empty' => 'Select the Option',
    'label' => 'Status'
   )
); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	
	 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>
