<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.ico">
  <title>Odin - Forgot Password</title>
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
  </style>
  <script>
  function hideme() {
  var x = document.getElementById("hidemesges");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
  </script>
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
<?= $this->Html->css('base.css') ?>
 

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	<br />

<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns" style="padding-top: 200px;padding-bottom:200px">
	<div class="panel">
<?php $this->assign('title', 'Request Password Reset'); ?>
	<h3><?php echo __('Forgot Password'); ?></h3>
	<?php
    	echo $this->Form->create();
        echo $this->Form->input('email', ['autofocus' => true, 'label' => 'Email address', 'required' => true]);
		echo $this->Form->button('Request reset email');
    	echo $this->Form->end();
	?>

</div>
</div>
</main>
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4" >

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
