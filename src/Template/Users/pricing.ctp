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
	<!-- Section: Pricing table -->
<section id="one" class="pricing-table d-flex align-items-center blue-gradient">

<div class="container">

  <div class="row" style="margin-top: 87px;line-height: 1.0;">
    <!-- Free Tier -->
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Basic</h5>
          <h6 class="card-price text-center">INR 499<span class="term">/year</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>10 Mock Tests</li>
          
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Lessons with inbuilt Quizzes</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Multi-format lessons (PPT, Text, Video)</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Lesson planning and scheduling</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Solved Examples</li>
			
			
			            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Chapter based Testing</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Practise Tests</li>
		
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>CCS Analysis and reports</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Adaptive Testing</li>
			
			
			
			
			            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Target Recommender for Career and Jobs</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Target Mapping</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Target and Competency Alignment</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Target Dashboards</li>
			
          </ul>
          <a href="#" class="btn blue-gradient btn-block btn-primary z-depth-0 btn-rounded my-2" >Buy</a>
		  
		  
		  
		  
        </div>
      </div>
    </div>
    <!-- Plus Tier -->
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Advanced</h5>
          <h6 class="card-price text-center">INR 3000<span class="term">/year</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
		    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Mock Tests</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Practise Tests	</li>
          
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Target Recommender option for Career</li>
			
			 <li><span class="fa-li"><i class="fas fa-check"></i></span>Lessons with inbuilt Quizzes</li>
			  <li><span class="fa-li"><i class="fas fa-check"></i></span>Multi-format lessons (PPT, Text, Video) </li>
			   <li><span class="fa-li"><i class="fas fa-check"></i></span>Lesson planning and scheduling</li>
			    <li><span class="fa-li"><i class="fas fa-check"></i></span>Solved Examples</li>
				 <li><span class="fa-li"><i class="fas fa-check"></i></span>Chapter based Testing</li>
				  <li><span class="fa-li"><i class="fas fa-check"></i></span>Adaptive Testing</li>
				   <li><span class="fa-li"><i class="fas fa-check"></i></span>Target Mapping</li>
				    <li><span class="fa-li"><i class="fas fa-check"></i></span>Target and Competency Alignment</li>
					 <li><span class="fa-li"><i class="fas fa-check"></i></span>Target Dashboards</li>
			
			
			
            
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>CCS Analysis and reports</li>
          </ul>
          <a href="#" class="btn btn-light btn-block btn-primary z-depth-0 btn-rounded my-2" onclick="toastr.error('Adanced features not available yet.');">Buy</a>
        </div>
      </div>
    </div>
    <!-- Pro Tier -->
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Pro</h5>
          <h6 class="card-price text-center">INR 6000<span class="term">/year</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
		   <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>CCS Analysis and reports</strong></li>
		   <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Target Recommender for Career and Jobs</strong></li>
          <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Mock Tests</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Practise Tests	</li>
          
            
			
			 <li><span class="fa-li"><i class="fas fa-check"></i></span>Lessons with inbuilt Quizzes</li>
			  <li><span class="fa-li"><i class="fas fa-check"></i></span>Multi-format lessons (PPT, Text, Video) </li>
			   <li><span class="fa-li"><i class="fas fa-check"></i></span>Lesson planning and scheduling</li>
			    <li><span class="fa-li"><i class="fas fa-check"></i></span>Solved Examples</li>
				 <li><span class="fa-li"><i class="fas fa-check"></i></span>Chapter based Testing</li>
				  <li><span class="fa-li"><i class="fas fa-check"></i></span>Adaptive Testing</li>
				   <li><span class="fa-li"><i class="fas fa-check"></i></span>Target Mapping</li>
				    <li><span class="fa-li"><i class="fas fa-check"></i></span>Target and Competency Alignment</li>
					 <li><span class="fa-li"><i class="fas fa-check"></i></span>Target Dashboards</li>
			
			
			
            
       
          </ul>
          <a href="#" class="btn btn-light btn-block btn-primary z-depth-0 btn-rounded my-2" onclick="toastr.error('Pro features not available yet.');">Buy</a>
        </div>
      </div>
    </div>
  </div>

</div>

</section>
<!-- Section: Pricing table -->

<!-- Section: Pricing table -->
<!--<section id="two" class="pricing-table d-flex align-items-center peach-gradient">

<div class="container">

  <div class="row">
    
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Free</h5>
          <h6 class="card-price text-center">$0<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-orange z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
   
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Plus</h5>
          <h6 class="card-price text-center">$9<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-orange z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
  
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Pro</h5>
          <h6 class="card-price text-center">$49<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-orange z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
  </div>

</div>

</section>

<section id="three" class="pricing-table d-flex align-items-center aqua-gradient">

<div class="container">

  <div class="row">
  
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Free</h5>
          <h6 class="card-price text-center">$0<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-cyan z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
  
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Plus</h5>
          <h6 class="card-price text-center">$9<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-cyan z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
   
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Pro</h5>
          <h6 class="card-price text-center">$49<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-cyan z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
  </div>

</div>

</section>

<section id="four" class="pricing-table d-flex align-items-center purple-gradient">

<div class="container">

  <div class="row">
 
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Free</h5>
          <h6 class="card-price text-center">$0<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-purple z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Plus</h5>
          <h6 class="card-price text-center">$9<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-purple z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Pro</h5>
          <h6 class="card-price text-center">$49<span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
          </ul>
          <a href="#" class="btn btn-block btn-purple z-depth-0 btn-rounded my-2">Button</a>
        </div>
      </div>
    </div>
  </div>

</div>

</section>-->
<!-- Section: Pricing table -->

<!-- Scrollspy -->
<!--<div class="dotted-scrollspy">
  <ul class="nav smooth-scroll clearfix d-none d-sm-flex flex-column">
    <li class="nav-item"><a class="nav-link" href="#one"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#two"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#three"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#four"><span></span></a></li>
  </ul>
</div>-->

<style>
section {
  height:100vh;
}
.pricing-table .card {
  -webkit-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  -webkit-border-radius: 15px;
  border-radius: 15px; }
  .pricing-table .card .card-title {
    font-size: 1rem;
    letter-spacing: .2rem;
    font-weight: 500; }
  .pricing-table .card .card-price {
    font-size: 2.7rem; }
    .pricing-table .card .card-price .term {
      font-size: .875rem; }
  .pricing-table .card .fa-ul li:not(:last-child) {
    margin-bottom: 1rem; }

@media (min-width: 992px) {
  .pricing-table .card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    -webkit-box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3); } }
</style>

<script>
// initialize scrollspy
$('body').scrollspy({
  target: '.dotted-scrollspy'
});
</script>
	


</main>
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">ODIN</h6>
        <p>OpenODIN is a comprehensive, target driven, personalized platform that helps you gear up for wide range of competitive exams that lead to careers in Information Technology, Banking Manufacturing, Hospitality and more.</p>
      </div>
      <!-- Grid column -->

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
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> Xlanz India Pvt. Ltd.,
India Development Centre, Unit 201, Brigade Rubix, 20, Watch Factory Road, Yeshwanthpur, Bangalore-560013, INDIA</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> <a href="mailto:info@odinlearning.com?Subject=ODIN%20Help" target="_top">info@odinlearning.com</a></p>
     <!--   <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>-->
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
          <a href="https://odinlearning.com/" target="_blank">
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

</html>
