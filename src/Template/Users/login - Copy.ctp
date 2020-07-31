
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
  input{
  font-size: 16px !important;
      padding-left: 10px !important;

  }
  #form6{
   font-size: 16px !important;
  }
  .form-control{
  color: white !important;
  }
label{
  color: white !important;
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
  </style>
</head>

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
  var input = document.getElementById("form6").focus();
}

</script>

<body class="loginbg">
  
	
	

<div class="container-fluid " id="olocon"  style="margin-top: 25px;">

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
          <a class="nav-link waves-effect" href="https://docs.odinlearning.in/APK/nsms.apk"  style="font-size: 24px;"><i class="w-fa fas fa-download"></i> <span class="clearfix d-none d-sm-inline-block">Download Android APP</span></a>
        </li>
      <!--  <li class="nav-item">
          <a class="nav-link waves-effect" href="/users/pricing" style="font-size: 24px;"><i class="w-fa fas fa-cart-plus"></i> <span class="clearfix d-none d-sm-inline-block">Plans and pricing</span></a>
        </li>-->
        <!--li class="nav-item">
          <a class="nav-link waves-effect" id="dark-mode"><i class="fas fa-adjust"></i> <span class="clearfix d-none d-sm-inline-block">Mode</span></a>
        </li-->
   

      </ul>
      <!-- Navbar links -->

    </nav>
    <!-- Navbar -->
	</header>
	
  <main>


<div class="row" id="olorow" style="margin-top: 80px;">

   <div class="col-md-6 align-self-center">

   <img src="../../img/login-min.png" class="img-fluid">

</div>

<div class="col-md-6  align-self-center text-right">




  <p class="olowhite" style="letter-spacing:5px;"> BRIDGING THE EMPLOYABILITY GAP</p>

  <p class="olowhite" style="font-size:3em;">sign <b>in</b></p><br>

  <p class="olowhite">
OpenODIN is a comprehensive, target driven, personalized platform that helps you gear up for wide range of competitive exams that lead to careers in Information Technology, Banking Manufacturing, Hospitality and more.
  </p><br>
<?= $this->Form->create(); ?>
<div class="row text-left">

<!-- Grid column -->
<div class="col-md-6 mb-4">



  <!-- Email validation -->
  <div class="md-form">
	<i class="fas fa-envelope prefix"></i>
	<input type="email" id="form6" class="form-control" name="email">
	<label for="form6"  class="olowhite">Type your email</label>
  </div>

</div>
<!-- Grid column -->

<!-- Grid column -->
<div class="col-md-6 mb-4">

  <!-- Password validation -->
  <div class="md-form">
	<i class="fas fa-lock prefix"></i>
	<input type="password" id="loginpasswor" class="form-control" name="password">
	<label for="form7"  class="olowhite">Type your password</label>
	  <span toggle="#mypassowrdprofile2" class="fa fa-fw fa-eye field-icon toggle-password" style="float: right;margin-top: -35px;"></span>
	  
	  
  </div>

</div>
<!-- Grid column -->

</div>

<button type="submit" class="btn btn-amber waves-effect waves-light olowhite" style="text-transform: lowercase;font-size:1.5em;">login</button>

<br>

<?= $this->Form->end(); ?>
<p class="olowhite">Don’t have an account, <a href="/users/Register" style="color:#FFC312;">Sign Up</a></p>

<p class="olowhite"><a href="/users/password" style="color:#FFC312;">Forgot Password</a></p>


</div>


</div>

</main>



</div>

<script>



$(".toggle-password").click(function() {

//alert("click");

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  //alert(input.attr("type"));
  
  
   var x = document.getElementById("loginpasswor");

  
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
  
 
});

</script>
			
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">



    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2019 Copyright:
          <a href="https://odinlearning.com/" target="_blank">
            <strong> odinlearning.com</strong>
          </a> | 
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

</html>
