<?php 
use Cake\Core\Configure;
Configure::load('myconfig');


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://nsms.odinlearning.in/js/jquery-3.4.1.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://nsms.odinlearning.in/ocweb/ocassets/ocstyle.css">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <title>Register - Odin Connect</title>
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
	
	/*$('#username').keyup(function(){
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
    });*/
	
	
	 });

</script>

<script src='https://www.google.com/recaptcha/api.js?hl=en-US'></script>
<style>
#ocregister
{
/*padding-bottom :0px !important;*/
}
</style>
  </head>
  <body>

    <nav class="navbar  navbar-expand-md ">
      <a class="navbar-brand" href="/"><img src="https://nsms.odinlearning.in/ocweb/ocassets/odin-logo-1.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNaVJbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNaVJbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Odin Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/users/login" role="button">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/users/Register" role="button">sign-up</a>
          </li>     
        </ul>
      </div>  
    </nav>

    <div class="container-fluid" id="ocregister">
        <div class="row" id="oclogVrow">
            <div class="col-md-4" id="oclogcol01">
                <p>ITS TIME TO</p>
                <h2>SIGN UP<br>NOW!</h2>
                
            </div>

            

            <div class="col-md-8" id="oclogcol03">

               	<?= $this->Form->create($user, ['type' => 'file','id'=>'captchaOperationvalue2','class'=>"px-4 py-3"]); ?>
				<div class="alert alert-danger" onclick="this.classList.add('hidden');" style="text-align: center;display:none" ></div>
<?php  if(Configure::read('Registration.firstname') == 1) {?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="inputName" placeholder="First name" required>
                    </div>
<?php } ?>

<?php  if(Configure::read('Registration.lastname') == 1) {?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lname" id="inputName1" placeholder="Last name" required>
                    </div>
                    <?php } ?>
                    
                    <div class="form-group">
                       
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail" required>
									<span class="result" style="font-weight:bold;font-size: 17px;line-height: 1.0 !important;" ></span>

                      </div>
					  
					  <?php  if(Configure::read('Registration.username') == 1) {?>
                    
                    <div class="form-group">
                      
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
	<span class="result1" style="font-weight:bold;font-size: 17px;line-height: 1.0 !important;"></span>
                    </div>
					<?php } ?>
				
					<?= $this->Form->input('userroles_id', ['type' => 'hidden','value' => '2']);  ?>

                    <div class="form-group">
                      
                      <input type="password" name="password" required class="form-control" id="passwordprofile" placeholder="Password">
                      	<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<em>Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters.</em>
                    </div>
					<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -27px;
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
			   
			   
			   
			   <select name="inscoursename" class="form-control" id="inscoursename1" style="display:none"   style="font-size: 19px;
    font-weight: 500;color:black">
			   <option value="" selected="selected">Course of Study</option>
			   
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

  <?php  if(Configure::read('Registration.phonenumber') == 1) {?>
                    <div class="form-group">
                        
                        <input type="text" required name="phonenumber" class="form-control" onInput='checkLength(10,this)' id='phpnenumbeforstude' onkeypress='return isNumber(event)' placeholder="Phone Number">
                    </div>
					<?php } ?>
					
											 <div class="form-group">
<div class="g-recaptcha" data-sitekey="6LeK-KEUAAAAANdsa_t-uBMPhI8YSKlQXBLKd_Ei"></div>

<!--<div class="g-recaptcha" data-sitekey="6LcCnKgUAAAAALl8tVOY21M5KNUi4PKRvK8vw2tx"></div>-->



 </div>


                    <div class="row">

                        <div class="col-md-6 text-left">
                            
                            <button type="submit" class="btn">REGISTER NOW</button>

                        </div>

                        <div class="col-md-6 ">
                        
                        </div>

                    </div>
                    

                	<?= $this->Form->end(); ?>

            </div>
        </div>
    </div>

    <div class="container-fluid" id="ocfootlogin">
      <div class="row" id="ocfootrow">

        <div class="col-md-12" id="ocfootcolV4">
           <p class="text-left" >© 2020 Copyright:
          <a style="color:lightgray" href="https://odinlearning.com/" target="_blank">
            <strong> odinlearning.com</strong>
          </a> | 
          <a style="color:lightgray" href="/users/Privacy" target="_blank" style="text-decoration:underline">
           <strong>Privacy Policy</strong>
          </a>
        </p> 

        </div>

        

      </div>
    </div>

  
  </body>
</html>