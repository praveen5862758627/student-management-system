<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">
  <title>Odin - Login</title>
     <?= $this->Html->css('mdb.css') ?>
  <?= $this->Html->css('login.css') ?> 

  <!-- Your custom styles (optional) -->
  <style>
  .form-control{
  color: white;
  }
label{
  color: white;
  }
    @media (min-width: 600px) {
.navbar.scrolling-navbar {
   
    padding-top: 5px !important;
    padding-bottom: -8px !important;
	
}
   }
   #olocon{
   height:auto !important;
   }
   
   select {
    display: block !important;
}
  </style>
</head>


<body class="loginbg">
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav" style="background-color: #FEB264;">

     

      <!-- Breadcrumb -->
      <div class="breadcrumb-dn mr-5">
       <a href="/users/login" > <img src="../../img/odin-monologo.png" class="img-fluid"></a>
      </div>
	  
	 

      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

    
        <li class="nav-item">
          <a class="nav-link waves-effect" href="/users/login" style="font-size: 24px;"><i class="w-fa fas fa-lock"></i> <span class="clearfix d-none d-sm-inline-block">Login</span></a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link waves-effect" id="dark-mode"><i class="fas fa-adjust"></i> <span class="clearfix d-none d-sm-inline-block">Mode</span></a>
        </li-->
   

      </ul>
      <!-- Navbar links -->

    </nav>
    <!-- Navbar -->
	</header>
	  <main>
	  <div class="container-fluid">
<script>
function hideme() {
  var x = document.getElementById("hidemesges");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
window.onload = function() {
  var input = document.getElementById("inputName").focus();
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

<?= $this->Html->css('base.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
		<script>

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

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function ischaracter(event) {
   
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
             return false;
        }
		 return true;
}



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
      //alert('Please check the recaptcha');
	    $(".alert").show(); 
	   $(".alert").html('Please check the recaptcha.');
	 
   }

   
});
	
	 });


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
                      if(data){
                          $( ".result" ).html('<span style="color:red">Someone already has that Email. Try another?</span>');
                      }else{
                         $( ".result" ).html('<span style="color:green">The email is still available!!</span>');
                      }

                  }
        });
    });
	
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
                          $( ".result1" ).html('<span style="color:red">Someone already has that Username. Try another?</span>');
                      }else{
                         $( ".result1" ).html('<span style="color:green">The Username is still available!!</span>');
                      }

                  }
        });
    });
	
	
	 });

</script>
<br>
<script src='https://www.google.com/recaptcha/api.js?hl=en-US'></script>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns" style="padding-top: 80px;">
	<div class="panel">
		<h3 class="text-center">Student Registration</h3>
		<hr />
	<div class="alert alert-danger" onclick="this.classList.add('hidden');" style="text-align: center;display:none" ></div>
		
		<?= $this->Form->create($user, ['type' => 'file','id'=>'captchaOperationvalue2']); ?>
			<?= $this->Form->input('fname' ,array('label' => 'First Name','id'=>'inputName')); ?>
			<?= $this->Form->input('lname' ,array('label' => 'Last Name','id'=>'inputName1')); ?>
			<?= $this->Form->input('email'); ?>
			<span class="result" style="font-size: 12px;line-height: 1.0 !important;" ></span>
			<?= $this->Form->input('username',array('style'=>'margin-bottom: 1px !important;')); ?>
			<span style="font-size: 12px;line-height: 1.0 !important;">Username should be in lowercase.</span>
			
			<span class="result1" style="font-size: 12px;line-height: 1.0 !important;"></span>
			
			<?= $this->Form->input('userroles_id', ['type' => 'hidden','value' => '2']);  ?>
			<?= $this->Form->input('password', array('type' => 'password','id' => 'passwordprofile','style'=>'margin-bottom: 1px !important;','label' => __('Password'))); ?>
			<em style="font-size: 12px;line-height: 1.0 !important;">Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters. Maximum length should be only 14 characters.</em><br />
			
			<!--<input type="checkbox" onclick="showpassword(2)">Show Password-->
			
			<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
			
			<!--<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="showpassword(2)">
    <label class="custom-control-label" for="defaultUnchecked">Show Password</label>
</div>-->
<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -76px;
  position: relative;
  z-index: 2;
      margin-right: 10px;
}

</style>
<script>

$('.toggle-password').on('click', function() {



  $(this).toggleClass('fa-eye fa-eye-slash');
  let input = $($(this).attr('toggle'));
  
  var el = document.getElementById("passwordprofile"); 

//alert($(el).attr('type'));
  
  if ($(el).attr('type') == 'password') {
     el.type = "text";
  }
  else {
     el.type = "password";
  }
});


</script>
			
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

	

 <div class="form-group">
			   
			   <label for="inscoursename1">Course of Study :</label>
			   
			   <select name="inscoursename" class="" id="inscoursename1" required="required"    style="display: block !important;">
			   <option value="" selected="selected">Select the Course of Study</option>
			   
			   <?php foreach($stcategorycoueses as $cname ) { ?>
			    <option value="<?php echo $cname['graduationcode']; ?>"><?php echo $cname['name']; ?></option>
			   <?php } ?>
			   
			 
			   </select>
			
			<?php /*<!--<?=	
				 $this->Form->input('inscoursename', array(
    'options' => $stcategorycoueses,
    'type' => 'select',
    'empty' => 'Select the Course',
    'label' => 'Institution Course :',
	'class' => 'form-control',
	'id' => 'inscoursename1',
	'required' => 'required'
   )
); ?>--> */ 
?>
			  </div>
				
					<?= $this->Form->control('address',array('label' => false,'type'=>'text','id'=>'addstu', 'style'=>'display:none' ,'value'=>'' )); ?>
					<?= $this->Form->control('address2',array('label' => false,'type'=>'text','id'=>'addstu1', 'style'=>'display:none' ,'value'=>'')); ?>
					<?= $this->Form->control('city',array('label' => false,'type'=>'text','id'=>'citystu','onkeypress'=>'return ischaracter(event)', 'style'=>'display:none' ,'value'=>'')); ?>
					<?= $this->Form->control('pincode',array('label' =>false,'type'=>'text','id'=>'pincodeforstude','onkeypress'=>'return isNumber(event)', 'style'=>'display:none' ,'value'=>'')); ?>
					
					
					<?=	
				 $this->Form->input('state', array(
    'options' => $indianStates,
    'type' => 'select',
    'empty' => 'Select the State',
    'label' => false,
	'id' => 'addressprofile4',
	 'style'=>'display:none !important' ,'value'=>''
)); ?>
						<?= $this->Form->input('phonenumber', array('label' => 'Phone Number','required'=>'required','onInput'=>'checkLength(10,this)' ,'id'=>'phpnenumbeforstude','onkeypress'=>'return isNumber(event)')); ?>
						
						 <div class="form-group">
<div class="g-recaptcha" data-sitekey="6LeK-KEUAAAAANdsa_t-uBMPhI8YSKlQXBLKd_Ei"></div>

<!--<div class="g-recaptcha" data-sitekey="6LcCnKgUAAAAALl8tVOY21M5KNUi4PKRvK8vw2tx"></div>-->



 </div>
						
			<!--<?= $this->Form->input('photo', ['type' => 'file','name' => 'upload']); ?>-->
			<?= $this->Form->submit('Register', array('class' => 'button')); ?>
			
		<?= $this->Form->end(); ?>
	</div>
</div>

</div>
</main>
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

     

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <!--  <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
        <p>
          <a href="https://odinlearning.com/" target="_blank">ODIN</a>
         
        </p>-->
        
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

     
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
      <!--  <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
      
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
      
        <p>
          <a href="#!">Help</a>
        </p>-->
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
       
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2019 Copyright:
          <a href="https://odinlearning.com/">
            <strong> odinlearning.com</strong>
          </a>
		   | 
          <a href="https://docs.odinlearning.in/privacy.pdf" target="_blank" style="text-decoration:underline">
           <strong>Privacy Policy</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" target="_blank" href="https://www.facebook.com/OdinLearning/">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" target="_blank" href="https://twitter.com/OdinLearning" >
                <i class="fab fa-twitter"></i>
              </a>
            </li>
           <!-- <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>-->
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" target="_blank" href="https://www.linkedin.com/company/odinlearning/">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer -->



</body>