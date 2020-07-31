<?php 
use Cake\Core\Configure;
Configure::load('myconfig');


?> 
 <?= $this->Html->css('mdb.css') ?>
<body class="fixed-sn white-skin">

	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

			  
			  <script type="text/javascript">
function saveAspdf() {
	toastr.info('PDF download is in progress.');
var pdf = new jsPDF('p','pt','a4');
pdf.addHTML(document.body,function() {
    pdf.save('studentcv.pdf');
});
}

//$('.media-body')
</script>
<style>
.fixed-sn main {
    padding-top: 1.5rem !important;
}
	.holds-the-iframe {
  background:url(<?= $this->Url->image("ajax-loading.gif"); ?>) center center no-repeat;
}
</style>

<header>

 </header>

  <main>
<!--  <a onclick="javascript:saveAspdf()"  style="float: right;" id="getStart-content-CLI-jquery" class="btn btn-purple btn-md my-1 flex-fill waves-effect waves-light" target="_blank" alt="PDF button">PDF
                <i class="fas fa-download ml-2 d-none d-xl-inline-block"></i>
              </a>-->
  
   <div class="container-fluid">
   
     <section class="mb-5">
	 
	             <table class="table table-bordered">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="4" style="background-color: gray;color: white;text-align:center;font-weight:800 !important"><h2>Curriculum Vitae</h2></th>
	 
	 </tbody>
	 </table>

       
        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
            <div class="media ml-3">
              <img class="d-flex mr-3 z-depth-1" src="<?php echo Configure::read('MyConf.mainurl');?>upload/<?= $photoname; ?>" alt="User" width="150px" height="150px">
              <div class="media-body">
                <h5 class="mt-0"><strong><?php echo $name; ?></strong></h5>
               <?php echo $aboutme; ?>
              </div>
            </div>
          </div>

        </div>
        <!-- Card -->
		   <div class="card" style="margin-top:4px">

          <!-- Card content -->
          <div class="card-body">
            <div class="media ml-3">
            
              <div class="media-body">
                <h5 class="mt-0">Personality type is :<strong> <?PHP echo strtoupper($myersbriggs); ?></strong></h5>

              </div>
            
          </div>

        </div>
		</div>

      </section>
      <!-- Section: Example -->
	  
	   <section class="mb-5">

      

        <!-- Card -->
        <div class="card" style="margin-top: -44px;">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
            <table class="table table-bordered" width="100%">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="4" style="background-color: gray;color: white;"><h4>Personal Details</h4></th>
    <tr>
      <tr>  <th scope="col">First name</th> <th scope="col"><?php echo $fname; ?></th><th scope="col">Email (Primary)</th> <th scope="col"><?php echo $email; ?></th> </tr>
    <tr>     <th scope="col">Last name</th><th scope="col"><?php echo $lname; ?></th><th scope="col">Email (Alternate)</th> <th scope="col"><?php echo $emailalternate; ?></th> </tr>
      <tr> <th scope="col">Phone # (Primary)</th><th scope="col"><?php echo $phonenumber; ?></th><th scope="col">Nationality</th><th scope="col"><?php echo $nationality; ?></th> </tr>
    <tr><th scope="col">Phone # (Alternate)</th> <th scope="col"><?php echo $phonenumalter; ?></th><th scope="col">DOB</th> <th scope="col"><?php echo $dateofbirth; ?></th> </tr>
	    <tr> <th scope="col">Country</th><th scope="col"><?php echo $country; ?></th> <th scope="col">Category</th><th scope="col"><?php echo $category; ?></th> </tr>
    <tr><th scope="col">State</th> <th scope="col"><?php echo $state; ?></th> <th scope="col">Gender</th><th scope="col"><?php echo $gender; ?></th></tr>
      <tr>  <th scope="col">Zip Code</th><th scope="col"><?php echo $pincode; ?></th> <th scope="col">Address (Line 1)</th> <th scope="col"><?php echo $address; ?></th></tr>
     
     <tr> <th scope="col">Address (Line 2)</th><th scope="col"><?php echo $address2; ?></th> </tr>
   
  </tbody>
</table>
</div>
          </div>

        </div>
        <!-- Card -->

      </section>
   
    	   <section class="mb-5">

          <h4 class="mb-5 dark-grey-text font-weight-bold">Academic Details</h4>

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  
		     <div class="row">
			 
			 <?php if($postgraduationcount > 0 ) { ?>

        <!-- Grid column -->
        <div class="col-lg-6 col-md-12 mb-lg-0 mb-4">
		<div class="table-responsive">
		
			  <table class="table table-bordered" width="100%">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="2" style="background-color: gray;color: white;"><h4>Post Graduation</h4></th>
    <tr>
      <tr>  <th scope="col">Institution/University Name</th> <th scope="col"><?php echo $universitynameug; ?></th> </tr>
    <tr>     <th scope="col">Stream</th><th scope="col"><?php echo $streamug; ?></th> </tr>
      <tr> <th scope="col">Specialization</th><th scope="col"><?php echo $specializationug; ?></th> </tr>
    <tr><th scope="col">Registration No.</th> <th scope="col"><?php echo $regnougug; ?></th> </tr>
	    <tr> <th scope="col">Year of Joining</th><th scope="col"><?php echo $yearjoiningug; ?></th> </tr>
    <tr><th scope="col">Year of Passout</th> <th scope="col"><?php echo $yearpassoutug; ?></th> </tr>
	
	<?php if($coursedurationug == 1) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1ug; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2ug; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($coursedurationug == 2) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1ug; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2ug; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3ug; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4ug; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($coursedurationug == 3) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1ug; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2ug; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3ug; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4ug; ?></th> </tr>
	<tr><th scope="col">Semester5(%)</th> <th scope="col"><?php echo $sem5ug; ?></th> </tr>
	<tr><th scope="col">Semester6(%)</th> <th scope="col"><?php echo $sem6ug; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($coursedurationug == 4) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1ug; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2ug; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3ug; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4ug; ?></th> </tr>
	<tr><th scope="col">Semester5(%)</th> <th scope="col"><?php echo $sem5ug; ?></th> </tr>
	<tr><th scope="col">Semester6(%)</th> <th scope="col"><?php echo $sem6ug; ?></th> </tr>
	<tr><th scope="col">Semester7(%)</th> <th scope="col"><?php echo $sem7ug; ?></th> </tr>
	<tr><th scope="col">Semester8(%)</th> <th scope="col"><?php echo $sem8ug; ?></th> </tr>
	
	<?php } ?>
	
	
  
   
  </tbody>
</table>
		
	</div>	
	
		</div>
		
			 <?php } ?>
		 <div class="col-lg-6 col-md-12 mb-lg-0 mb-4">
		 
		 <div class="table-responsive">
		 
		 	  <table class="table table-bordered" width="100%">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="2" style="background-color: gray;color: white;"><h4>Graduation</h4></th>
    <tr>
      <tr>  <th scope="col">Institution/University Name</th> <th scope="col"><?php echo $universityname; ?></th> </tr>
    <tr>     <th scope="col">Stream</th><th scope="col"><?php echo $stream; ?></th> </tr>
      <tr> <th scope="col">Specialization</th><th scope="col"><?php echo $specialization; ?></th> </tr>
    <tr><th scope="col">Registration No.</th> <th scope="col"><?php echo $regnoug; ?></th> </tr>
	    <tr> <th scope="col">Year of Joining</th><th scope="col"><?php echo $yearjoining; ?></th> </tr>
    <tr><th scope="col">Year of Passout</th> <th scope="col"><?php echo $yearpassout; ?></th> </tr>
	
	<?php if($courseduration == 1) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($courseduration == 2) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($courseduration == 3) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4; ?></th> </tr>
	<tr><th scope="col">Semester5(%)</th> <th scope="col"><?php echo $sem5; ?></th> </tr>
	<tr><th scope="col">Semester6(%)</th> <th scope="col"><?php echo $sem6; ?></th> </tr>
	
	
	<?php } ?>
	<?php if($courseduration == 4) { ?>
	<tr><th scope="col">Semester1(%)</th> <th scope="col"><?php echo $sem1; ?></th> </tr>
	<tr><th scope="col">Semester2(%)</th> <th scope="col"><?php echo $sem2; ?></th> </tr>
	<tr><th scope="col">Semester3(%)</th> <th scope="col"><?php echo $sem3; ?></th> </tr>
	<tr><th scope="col">Semester4(%)</th> <th scope="col"><?php echo $sem4; ?></th> </tr>
	<tr><th scope="col">Semester5(%)</th> <th scope="col"><?php echo $sem5; ?></th> </tr>
	<tr><th scope="col">Semester6(%)</th> <th scope="col"><?php echo $sem6; ?></th> </tr>
	<tr><th scope="col">Semester7(%)</th> <th scope="col"><?php echo $sem7; ?></th> </tr>
	<tr><th scope="col">Semester8(%)</th> <th scope="col"><?php echo $sem8; ?></th> </tr>
	
	<?php } ?>
	
	
  
   
  </tbody>
</table>
		 
		
	</div>
		</div>
		

        <!-- Grid column -->
        <div class="col-lg-6 col-md-12 mb-lg-0 mb-4">
		<div class="table-responsive">
	
		 <table class="table table-bordered" width="100%">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="2" style="background-color: gray;color: white;"><h4>SSLC + 2/3</h4></th>
    <tr>
      <tr>  <th scope="col">School/College Name</th> <th scope="col"><?php echo $collegenamepuc; ?></th> </tr>
    <tr>     <th scope="col">Board</th><th scope="col"><?php echo $boardpuc; ?></th> </tr>
      <tr> <th scope="col">Percentage</th><th scope="col"><?php echo $percentagepuc; ?></th> </tr>
    <tr><th scope="col">Registration No.</th> <th scope="col"><?php echo $regnonpuc; ?></th> </tr>
	    <tr> <th scope="col">Year of Joining</th><th scope="col"><?php echo $joiningpuc; ?></th> </tr>
    <tr><th scope="col">Year of Passout</th> <th scope="col"><?php echo $passoutpuc; ?></th> </tr>
  
   
  </tbody>
</table>
</div>
		</div>
		<div class="col-lg-6 col-md-12 mb-lg-0 mb-4">
		<div class="table-responsive">
		  <table class="table table-bordered" width="100%">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="2" style="background-color: gray;color: white;"><h4>SSLC</h4></th>
    <tr>
      <tr>  <th scope="col">School/College Name</th> <th scope="col"><?php echo $collegename; ?></th> </tr>
    <tr>     <th scope="col">Board</th><th scope="col"><?php echo $board; ?></th> </tr>
      <tr> <th scope="col">Percentage</th><th scope="col"><?php echo $percentage; ?></th> </tr>
    <tr><th scope="col">Registration No.</th> <th scope="col"><?php echo $regnon; ?></th> </tr>
	    <tr> <th scope="col">Year of Joining</th><th scope="col"><?php echo $joining; ?></th> </tr>
    <tr><th scope="col">Year of Passout</th> <th scope="col"><?php echo $passout; ?></th> </tr>
  
   
  </tbody>
</table>
</div>
		</div>
		</div>





          </div>

        </div>
        <!-- Card -->

      </section>
   





<!--<table class="table table-bordered">
  <thead>
 
			 
  </thead>
  <tbody>
     <th scope="col" colspan="2"><h4>Personality</h4></th>
  
    <tr>
      <tr>  <th scope="col">Problem Solving </th> <th scope="col"><?php echo number_format((float)$problemsolving * 100, 2, '.', ''); ?>%</th> </tr>
    <tr>     <th scope="col">Teamwork </th><th scope="col"><?php echo number_format((float)$teamwork * 100, 2, '.', ''); ?>%</th> </tr>
      <tr> <th scope="col">Leadership</th><th scope="col"><?php echo number_format((float)$leadership * 100, 2, '.', ''); ?>%</th> </tr>
    <tr><th scope="col">Social skills</th> <th scope="col"><?php echo number_format((float)$socialskils * 100, 2, '.', ''); ?>%</th> </tr>
	    <tr> <th scope="col">Initative</th><th scope="col"><?php echo number_format((float)$initative * 100, 2, '.', ''); ?>%</th> </tr>
    <tr><th scope="col">Communication (spoken)</th> <th scope="col"><?php echo number_format((float)$communicationspoken * 100, 2, '.', ''); ?>%</th> </tr>
      <tr>  <th scope="col">Communication (written)</th><th scope="col"><?php echo number_format((float)$communicationwritten * 100, 2, '.', ''); ?>%</th> </tr>
       <tr> <th scope="col">Communication (oratory)</th> <th scope="col"><?php echo number_format((float)$communicationoratory * 100, 2, '.', ''); ?>%</th> </tr>
	  <tr><th scope="col">Travel and Exploration</th> <th scope="col"><?php echo number_format((float)$travelandexploration * 100, 2, '.', ''); ?>%</th> </tr>
      <tr> <th scope="col">Technology Affiliation</th><th scope="col"><?php echo number_format((float)$technologyaffiliation * 100, 2, '.', ''); ?>%</th> </tr>
       <tr><th scope="col">Management skills</th> <th scope="col"><?php echo number_format((float)$managementskills * 100, 2, '.', ''); ?>%</th> </tr>
       <tr> <th scope="col">Foriegn Languages</th><th scope="col"><?php echo number_format((float)$foriegnlanguages * 100, 2, '.', ''); ?>%</th> </tr>
	
   
  </tbody>
</table>-->

<?php if($areaofinterestcount > 0 ) { ?>
 <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
              <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Areas of Interest</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($areaofinterest as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	  
	  <?php } ?>
	  
	  
	  <?php if($projectexecutedcount > 0 ) { ?>
	  
	   <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
             <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Projects Executed</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($projectexecuted as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	   <?php } ?>
	  
	  <?php if($internshipdetailscount > 0 ) { ?>
	  
	   <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
           <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Internship Details</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($internshipdetails as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	  
	  
	   <?php } ?>
	
	   <?php if($hobbiesandextracount > 0 ) { ?>
	  <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
           <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Hobbies and Extra curricular</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($hobbiesandextra as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	  
	  <?php } ?>
	  
	    <?php if($electivescount > 0 ) { ?>
	  
	   <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
          <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Electives</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($electives as $det) {   ?>
          <tr>
		   <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
           
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	   <?php } ?>
	  
	    <?php if($coursesattendedcount > 0 ) { ?>
	  
	  <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
           <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Lectures/Courses Attended</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($coursesattended as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	   <?php } ?>
	   
	     <?php if($personaldetailscount > 0 ) { ?>
	  
	  <section class="mb-5">

       

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
		  <div class="table-responsive">
          <table class="table table-bordered  table-striped text-center" width="100%">
     <thead>
    <tr>
      <th scope="col" colspan="3" style="background-color: gray;color: white;"><h4>Additional Details</h4></th>
    
    </tr>
  </thead>
        <tbody>
			<?php   foreach($personaldetails as $det) {   ?>
          <tr>
		  
	
            <td class="pt-3-half" contenteditable="false" > <?php echo $det['name']; ?> </td>
            <td class="pt-3-half" contenteditable="false"  > <?php echo $det['description']; ?></td>
       
           

 
           
          </tr>
			<?php } ?>
          <!-- This is our clonable table line -->
         
     
        
        </tbody>
      </table>
	  </div>
          </div>

        </div>
        <!-- Card -->

      </section>
	  
	  
	   <?php } ?>
	  
	  <section class="mb-5">

          <h4 class="mb-5 dark-grey-text font-weight-bold">Competency Performance Review</h4>

        <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
 <iframe id="" frameBorder="0" src="<?php echo Configure::read('MyConf.weburlmainsite');?>users/showstatusbar" width="100%" height="600" class="holds-the-iframe"></iframe>
          </div>

        </div>
        <!-- Card -->

      </section>
	  
	  

	  
	  
	  
	  
	
	</div>
	
	</main>
	
	<footer>
	</footer>

  
</body>