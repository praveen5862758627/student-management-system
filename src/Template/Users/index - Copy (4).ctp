<?php 
use Cake\Core\Configure;
Configure::load('myconfig');


?>
<?php// echo Configure::read('MyConf.weburlmainsite');?>
<?php //echo Configure::read('MyConf.mainurl'); ?>

<script>
		$(document).ready(function () {
  $(document).click(function (e) {
    fire(e);
  });
});

function fire(e) { 

//alert('hi'); 

url = targeturl+'Users/checksession/';

  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                     // question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					if(data == 1)
					{
					//toastr.error('Session exists.');
					//window.location = targeturl;
					}
					else
					{
					//toastr.error('Session expired.');
					window.location = targeturl+'users';
					}
					},
					error: function(xhr, status, error) {
 
// toastr.error('Session expired.');
					window.location = targeturl+'users';
}
					});


}
</script>
 <?= $this->Html->css('mdb.css') ?>

<body class="fixed-sn white-skin" onload="calendarfilter('all');">

 <?php include('scriptfiles.ctp'); ?>

 <?php include('functionsscript.ctp'); ?>
 <?php include('customcss.css'); ?>
 <?php include('functionsTicket.ctp'); ?>
 <?php include('viewTicket.ctp'); ?>
 <?php include('viewTrailTicket.ctp'); ?>
 <?php include('createTicket.ctp'); ?> 

    <script>
        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });
    </script>
    <style>
        #compreaadata a{
            color:blue !important;
        }
        #learningmodscomprea a{
            color:blue !important;
        }

        .card.card-cascade .view.view-cascade.gradient-card-header {
            padding: 1.3rem 1rem !important;
            background-image:linear-gradient(to bottom, #00a2ee 60%, #0071e4 100%);
            background-color: rgba(0, 0, 0, 0.3);


        }
        .font-weight-bold {
            font-weight: normal!important;
        }
    </style>



    <span id="displayerrormesageforstudent" style="display:none;z-index: 10000000;" ></span>



    <!-- Main Navigation -->
    <header>
	
	      <?php if($usersrole == 3 || $usersrole == 4) { ?>
	<style>
	/*
    DEMO STYLE
*/
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 2.0rem !important;
  
}
.row {
   
    margin-right: 0px;
    margin-left: 0px;
}

.white-skin .card-header {
    background-color: #FF9900;
}
a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 1px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
    perspective: 1500px;
}


#sidebar {
    min-width: 250px;
    max-width: 250px;
       background-image: linear-gradient(to bottom, #18186a 0%, #1b59a0 80%);
    color: #fff;
    transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
    transform-origin: bottom left;
}

#sidebar.active {
    margin-left: -250px;
    transform: rotateY(100deg);
}

#sidebar .sidebar-header {
    padding: 0px;
  //  background: #6d7fcc;
      line-height: 0.6 !important;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    //background: #6d7fcc;
}


a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article, a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}


.card-intro {
    padding-left: 0!important;
    margin-top: -33px!important;
	margin-bottom : 4px !important;
}
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */
.pt-4, .py-4 {
   
    margin-top: -12px !important;
}
#content {
    width: 100%;
    padding: 8px;
    min-height: 100vh;
    transition: all 0.3s;
}

#sidebarCollapse {
    width: 40px;
    height: 40px;
    background: #f5f5f5;
    cursor: pointer;
}

#sidebarCollapse span {
    width: 80%;
    height: 2px;
    margin: 0 auto;
    display: block;
    background: #555;
    transition: all 0.8s cubic-bezier(0.810, -0.330, 0.345, 1.375);
    transition-delay: 0.2s;
}

#sidebarCollapse span:first-of-type {
    transform: rotate(45deg) translate(2px, 2px);
}
#sidebarCollapse span:nth-of-type(2) {
    opacity: 0;
}
#sidebarCollapse span:last-of-type {
    transform: rotate(-45deg) translate(1px, -1px);
}


#sidebarCollapse.active span {
    transform: none;
    opacity: 1;
    margin: 5px auto;
}


/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
        transform: rotateY(90deg);
    }
    #sidebar.active {
        margin-left: 0;
        transform: none;
    }
    #sidebarCollapse span:first-of-type,
    #sidebarCollapse span:nth-of-type(2),
    #sidebarCollapse span:last-of-type {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse.active span {
        margin: 0 auto;
    }
    #sidebarCollapse.active span:first-of-type {
        transform: rotate(45deg) translate(2px, 2px);
    }
    #sidebarCollapse.active span:nth-of-type(2) {
        opacity: 0;
    }
    #sidebarCollapse.active span:last-of-type {
        transform: rotate(-45deg) translate(1px, -1px);
    }

}

.fixed-sn main {
    margin-top: -98px !important;
}


	</style>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
              

        <!-- Logo -->
        <li class="logo-sn waves-effect" style="background-color:#fff;padding:1.7px;">
          <div class="text-center">
            <a href="#" class="pl-0"><img src="../../img/logo_75-75.png" class="img-fluid" style="position: relative;
    margin-top: -6px;
}"></a>
          </div>
        </li>
				
            </div>

            <ul class="list-unstyled components">
							   <li>
                    
					 
					  <a href="#pageSubmenu11115" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users-cog"></i> Manage Users</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11115">
					<?php if($usersrole == 3) { ?>
                        <li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>users/addga","Create Users")' >Create Users</a>
                        </li>
                        <li>
                            <a href="#" onclick='openmodalbox1("Student" , "");return false;' >Manage Users</a>
                        </li>
							<li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>Studentgroup/add","Create a Group")'   >Create a Group</a>
                        </li>
							<li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>Studentgroup","Manage Groups")'   >Manage Groups</a>
                        </li>
						    <li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>users/addga","Create Group Administrator")' >Create Administrator</a>
                        </li>
						<li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>users/gausers","Manage Group Administrators")' >Manage Administrators</a>
                        </li>
					
                         <li>
                            <a href="#" onclick='assigntopictogroup()' >Assign Competencies to Group</a>
                        </li>
                         <li>
                            <a href="#" onclick='listallgroupsandcoms()' >Manage Competencies in Group</a>
                        </li>
						 <li>
                            <a href="#" onclick="studentgroup();return false;" >Assign Users to Group</a>
                        </li>
						<li>
                            <a href="#" onclick="admingroup();return false;"   >Assign Administrator to Group</a>
                        </li>
                       
						<li>
                            <a href="#" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>Studentgroup","Group Management")' >View Users in Group</a>
                        </li>
						
					
					
						<?php } ?>
							<?php if($usersrole == 4) { ?>
                        
                        <li>
                            <a href="#" onclick='openmodalboxstudents("Student", "");return false;'  >Manage Users</a>
                        </li>
						
						<?php } ?>
                       
                    </ul>
					 
                </li>
												
              
                
                <li>
                
					
					<a href="#pageSubmenu11113" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-project-diagram"></i> Industry Connect </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11113">
						 <li>
                            <a href="#" onclick='loadmodalrfeportsins(11)'  >View Speakers</a>
                        </li>
                       
						 <li>
                            <a href="#" onclick='loadmodalrfeportsins(12)'  >View Projects</a>
                        </li>
						 <li>
                            <a href="#" onclick='loadmodalrfeportsins(12)'  >View Project Mentor Profiles</a>
                        </li>
                         <li>
                            <a href="#" onclick='loadmodalrfeportsins(13)'  >View Internships</a>
                        </li>
						  <li>
                            <a href="#" onclick='loadmodalrfeportsins(13)'  >View Apprenticeships</a>
                        </li>
						 <li>
                            <a href="#" onclick='listofstudentsappliedforpeojects()'  >User Application</a>
                        </li>
						 <li>
                            <a href="#" onclick='listofcompaniesnew()'  >Company Jobs </a>
                        </li>
						 <li>
                            <a href="#" onclick='statusofapploiedjobs()'  >Application Status</a>
                        </li>
						 <li>
                            <a href="#" onclick='loadmodalrfeportsins(14)'  >Off Campus Hiring</a>
                        </li>
						 <li>
                            <a href="#" onclick='showlistoflikesmentor()'  >User Likes</a>
                        </li>
					
						<!--<li>
                            <a href="#" onclick='getcomptencieslist()'  >Competency Dashboard</a>
                        </li>-->
                    </ul>
					
					
					 
                 
                </li>
				
						<li>
                   
					 <a href="#pageSubmenu1110001" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-user-tie"></i> Industry Engagement</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1110001">
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"> View Speaking Engagements</a>
                        </li>
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">View Project Activities</a>
                        </li>
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">View Internship Activities</a>
                        </li>
						
						
                    </ul>
                </li>
				
				<li>
                   
					 <a href="#pageSubmenu1111" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-plane-departure"></i> Placement Mgt</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1111">
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"> Add Placement Event</a>
                        </li>
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">Modify Placement Event</a>
                        </li>
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">Delete Placement Event</a>
                        </li>
						<li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">View Placement Result</a>
                        </li>
						<li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">View Placement Season</a>
                        </li>
						
                    </ul>
                </li>
               <!-- <li>
                 
					<a href="#pageSubmenu11114" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-paper-plane"></i> Hiring  </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11114">
                        <li>
                            <a href="#" onclick='listofcompaniesnew()'  >Company Jobs </a>
                        </li>
						 <li>
                            <a href="#" onclick='statusofapploiedjobs()'  >Application Status</a>
                        </li>
						 <li>
                            <a href="#" onclick='loadmodalrfeportsins(14)'  >Off Campus Hiring</a>
                        </li>
                   
                    </ul>
                </li>-->
                <li>
                    <a href="#pageSubmenu11114ddnnr" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  > <i class="fas fa-chart-bar"></i>
					Reports</a>
					<ul class="collapse list-unstyled" id="pageSubmenu11114ddnnr">
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"   >NAAC Reports </a>
                        </li>
						 <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')" >NBA Reports</a>
                        </li>
						<li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>userdashboard/activity/index.php','User Activity Reports')"  >User Activity Reports</a>
                        </li>
						<li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')" >Student Competency Reports</a>
                        </li>
						 
                   
                    </ul>
                </li>
				
				   
 <li>
                    <a href="#" onclick="calendarviewforadmin('all','all');return false;" > <i class="fas fa-calendar-alt"></i>
					Calendar</a>
                </li>
 <li>
                    <a href="#" onclick="dispalystudentattandance();return false;" > <i class="fas fa-calendar-alt"></i>
					Attendance</a>
                </li>
				<li>
                    <a href="#" onclick="displayvideogalleey();return false;" > <i class="fas fa-play-circle"></i>
					Video Gallery</a>
                </li>
				
				<?php if($usersrole == 3   ||  $usersrole == 4 ) { ?>
				   <li>
                    <a href="#pageSubmenu11114ddnn" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  > <i class="fas fa-bell"></i>
					Notification</a>
					<ul class="collapse list-unstyled" id="pageSubmenu11114ddnn">
                        <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>notications/add","Create Notification")'  >Create Notification </a>
                        </li>
						 <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>notications","Manage Notifications")'>Manage Notifications</a>
                        </li>
						 
                   
                    </ul>
                </li>
				
				
				  
				<?php } ?>
				<?php if($usersrole == 3 ) { ?>
				   <li>
                    <a href="#pageSubmenu11114ddnnii" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  > <i class="fas fa-file-import"></i>
					CSV Import</a>
					<ul class="collapse list-unstyled" id="pageSubmenu11114ddnnii">
                        <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.mainurl'); ?>importfile/start.php","Users Import")'  >Users </a>
                        </li>
						 <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.mainurl'); ?>importfile/markscard.php","Marks card Import")'>Marks card</a>
                        </li>
						 <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.mainurl'); ?>importfile/studentdataevent.php","Student Events Import")'>Student Events</a>
                        </li>
						 <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.mainurl'); ?>importfile/institutecalendar.php","Admin Events Import")'>Admin Events</a>
                        </li>
						 <li>
                            <a href="#"  onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.mainurl'); ?>importfile/attendance.php","Attendance Import")'>Attendance</a>
                        </li>
						 
                   
                    </ul>
                </li>
				
				
				  
				<?php } ?>
				
				
				 <li>
                 
					<a href="#pageSubmenu11114dd" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-mail-bulk"></i> 	Surveys & Feedback	  </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11114dd">
                        <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"  >Create a survey </a>
                        </li>
						 <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">Manage survey</a>
                        </li>
						 <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')">Create Poll</a>
                        </li>
						 <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"  >Stop Poll</a>
                        </li>
						 <li>
                            <a href="#" onclick="redirecturlsstudent1('<?php echo Configure::read("MyConf.weburlmainsite");?>users/comingsoon','')"  >View survey or Poll </a>
                        </li>
                   
                    </ul>
                </li>
				 <li>
                 
					<a href="#pageSubmenu11114ddss" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-cogs"></i> 	System Setup	  </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu11114ddss">
                        <li>
                            <a href="https://ncmd.odinlearning.in/users/login" target="_blank"  >CMD </a>
                        </li>
						 <li>
                            <a href="https://nims.odinlearning.in/users/login" target="_blank"   >IMS</a>
                        </li>
						 <li>
                            <a href="http://ec2-13-232-213-64.ap-south-1.compute.amazonaws.com:8080/" target="_blank"   >Course Authoring</a>
                        </li>
						
                   
                    </ul>
                </li>
                
				 
				  <!-- <li>
                   
					<a href="#pageSubmenu111" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-file"></i> Content Library</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu111">
                        <li>
                            <a href="#">View Content listing and search by content id and lesson id</a>
                        </li>
                       
                    </ul>
                </li>-->
				
				<!--  <li>
                    <a href="#"  onclick="loadmodalrfeports()"> <i class="fas fa-tachometer-alt"></i> Reports</a>
                </li>-->
				
				
            </ul>

         
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                   <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>-->
					
					 <div class="breadcrumb-dn mr-5">
        <p>  <h2 style="margin-left:10px"> <?php echo strtoupper($institution['name']); ?></h2></p>
      </div>
	  
	        <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
		 <?php if($usersrole == 2) { ?>
        <li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="shownotifications()">
            <span class="badge red"><?php echo $noticationscount; ?></span> <i class="fas fa-bell"></i>
            <span class="d-none d-md-inline-block">Notifications</span>
          </a>
        
        </li>
		 <?php } ?>
       <!-- <li class="nav-item">
          <a class="nav-link waves-effect" href="#test1"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
        </li>-->
        <!--<li class="nav-item">
          <a class="nav-link waves-effect" href="#test1"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
        </li>
        <!--li class="nav-item">
          <a class="nav-link waves-effect" id="dark-mode"><i class="fas fa-adjust"></i> <span class="clearfix d-none d-sm-inline-block">Mode</span></a>
        </li-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">My Account</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
		  
		  	 <?php if($usersrole != 3 && $usersrole != 4 ) { ?>
        <a class="dropdown-item" href="#" onclick="openmodalboxprofile(3);  return false;" id="myprofileaccount" >My Profile</a>
		<?php } ?>
            <a class="dropdown-item" href="#" onclick="openmodalboxprofile(4);  return false;" id="myseetingaccount" >My Settings</a>
			 <?php if($usersrole == 2) { ?>
		 
            <a class="dropdown-item" href="#" onclick="openmodalboxprofile(5);  return false;" id="mypurchaseaccount" >My Purchases</a>
			
			 <?php } ?>
			
    <a class="dropdown-item" href="#" onclick="logouturl()" >Log Out</a>
          </div>
        </li>

      </ul>

                   
                </div>
            </nav>
			
		<div class="card card-intro sky-gradient">
  <div class="card-body white-text rgba-black-light text-center" style="padding: 5px 20px 5px 0 !important;" >
    <!--Grid row-->
    <div class="row d-flex justify-content-between align-items-center">
	
      <!--Grid column-->
      <div class="col-md-4">
        <h3 class="h3-responsive" style="font-family: Roboto, sans-serif;">Welcome <?php echo $name; ?></h3>
        
      </div>
       
       

      </div>

      <!--Grid column-->
    </div>
	
	
    <!--Grid row-->
  </div>
            



<iframe src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/iadash/index.php?id=281 " width="100%" height="80%" frameBorder="0">Browser not compatible.</iframe>


    
 



 




	  </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

	
<?php } ?>
   <!--------------------------------------->
   
    <?php if($usersrole != 3 && $usersrole != 4) { ?>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed">
            <ul class="custom-scrollbar">


                <!-- Logo -->
                <li class="logo-sn waves-effect" style="background-color:#fff;padding:1.7px;">
                    <div class="text-center">
                        <a href="#" class="pl-0"><img src="../../img/logo_75-75.png" class="img-fluid"></a>
                    </div>
                </li>

                <!-- Search Form -->


                <!-- Side navigation links -->
                <li class="text-center">
		 <?php if($usersrole == 2) { ?>
                    <ul class="collapsible collapsible-accordion">

                        <!--  <li data-toggle="tooltip" data-placement="right"
          title="Company Jobs"> 
                      <a href="#" class="collapsible-header waves-effect" onclick='listofcompanies()'    ><i class="w-fa fas fa-user-tie"></i></a>
                    </li>-->

<?php if(Configure::read('Sidebarmenu.jobtarget') == 1) { ?>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Job Targets"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='checktargetrules()'><i class="w-fa fas fa-bullseye"></i></a>
                        </li>
<?php } ?>

<?php if(Configure::read('Sidebarmenu.academictarget') == 1) { ?>
						 <li data-toggle="tooltip" data-placement="right"
                            title="Academic Targets"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='checktargetrulesnew()'><i class="w-fa fas fa-book"></i></a>
                        </li>
						<?php } ?>
						
						<?php if(Configure::read('Sidebarmenu.mycompetencies') == 1) { ?>

                        <li data-toggle="tooltip" data-placement="right"
                            title="My Competencies"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='comptaraereport();return false;'><i class="w-fa fas fa-superscript"></i></a>
                        </li>
						<?php } ?>
<?php if(Configure::read('Sidebarmenu.learningplan') == 1) { ?>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Learning Plan">
                            <a class="collapsible-header waves-effect" onclick="openmodalboxtarget('Targetcomps', 'Learning Plans');return false;">
                                <i class="w-fa fas fa-tasks"></i>
                            </a>

                        </li>
						<?php } ?>

                        <!-- <li data-toggle="tooltip" data-placement="right"
               title="User Profile">
                           <a class="collapsible-header waves-effect arrow-r" onclick="openmodalboxprofile(2);return false;">
                             <i class="w-fa fas fa-user"></i>
                           </a>
                         
                         </li>-->
<?php if(Configure::read('Sidebarmenu.calendar') == 1) { ?>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Calendar">
                            <a href="#" class="collapsible-header waves-effect" onClick='viewstudentcalendar();return false;'><i class="w-fa far fa-calendar-check"></i></a>
                        </li>
						<?php } ?>
<?php if(Configure::read('Sidebarmenu.scorecard') == 1) { ?>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Score Card">
                            <a href="#" class="collapsible-header waves-effect" onclick="openscorecardforstudents(<?php echo $useridmoodle; ?>);return false;"><i class="w-fa fas fa-tachometer-alt"></i></a>
                        </li>
						<?php } ?>
<?php if(Configure::read('Sidebarmenu.industryconnect') == 1) { ?>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Industry Connect">
                            <a href="#" class="collapsible-header waves-effect" onclick="listindustryconnectusers()"><i class="w-fa fas fa-industry"></i></a>
                        </li>
						<?php } ?>

                      <!--  <li data-toggle="tooltip" data-placement="right"
                            title="Industry Connect old">
                            <a href="#" class="collapsible-header waves-effect" onclick="redirecturlsstudent1industry('https://iconnect.odinlearning.in/users/displayallusers/<?php echo $this->request->getSession()->read('sessionname'); ?>/<?php echo $this->request->getSession()->read('inscode'); ?>/<?php echo $name; ?>/<?php echo $this->request->getSession()->read('sessionemail'); ?>', 'Industry Connect old')"><i class="w-fa fas fa-industry"></i></a>
                        </li>-->







                        <!-- <li data-toggle="tooltip" data-placement="right"
  title="Insights"> 
              <a href="#" class="collapsible-header waves-effect" onclick='redirecturlsstudent125("" , "Insights")' ><i class="w-fa fas fa-lightbulb"></i></a>
            </li>-->
			<?php if(Configure::read('Sidebarmenu.ticket') == 1) { ?>

                        <li data-toggle="tooltip" data-placement="right"
                            title="Questions and Answers"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='openmodalboxforticket(2)' ><i class="w-fa fas fa-ticket-alt"></i></a>
                        </li>
<?php } ?>

                    </ul>

		  <?PHP } ?>


		  	 <?php if($usersrole == 6) { ?>
                    <ul class="collapsible collapsible-accordion">

                        <li data-toggle="tooltip" data-placement="right"
                            title="Questions and Answers"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='openmodalboxforticket(6)' ><i class="w-fa fas fa-ticket-alt"></i></a>
                        </li>


                    </ul>

		  <?PHP } ?>

		  	 <?php /*if($usersrole == 4) { ?>
                    <ul class="collapsible collapsible-accordion">

                        <li data-toggle="tooltip" data-placement="right"
                            title="My Students"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='openmodalboxstudents("Student", "");return false;' ><i class="w-fa fas fa-user-friends"><span class="badge red"><?php echo $usercountget; ?></span></i></a>
                        </li>
                        <li data-toggle="tooltip" data-placement="right"
                            title="Student Notification Management"> 
                            <a href="#" class="collapsible-header waves-effect" onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>notications", "Student Notification Management")'  ><i class="w-fa fas fa-bell"></i></a>
                        </li>

                        <li data-toggle="tooltip" data-placement="right"
                            title="Reports">
                            <a href="#" class="collapsible-header waves-effect" onclick="loadmodalrfeports()"><i class="w-fa fas fa-tachometer-alt"></i></a>
                        </li>


                    </ul>

		  <?PHP }*/ ?>

		  	 <?php if($usersrole == 5) { ?>
                    <ul class="collapsible collapsible-accordion">

                        <li data-toggle="tooltip" data-placement="right"
                            title="Control Panel"> 
                            <a href="users/userindex" class="collapsible-header waves-effect"  ><i class="w-fa fas fa-solar-panel"></i></a>
                        </li>


                    </ul>

		  <?PHP } ?>

                    <input type="text" class="form-control" placeholder="Enter text" id="studentserchval" style="display:none">

		  


                </li>


            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!-- Sidebar navigation -->
		
		<?php } ?>
	
	  
 <?php if($usersrole != 3 && $usersrole != 4) { ?>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>

            <!-- Breadcrumb -->
            <div class="breadcrumb-dn mr-5">
                <p>  <h2 style="margin-left:10px"> <?php echo strtoupper($institution['name']); ?></h2></p>
            </div>

            <!--<div>
                  <ul class="nav md-pills nav-justified pills-amber pills-rounded">
                <li class="nav-item" style="padding:0 0.5rem;">
                  <a class="nav-link waves-effect active" href="">Student</a>
                </li>
                <li class="nav-item" style="padding:0 0.5rem;;">
                  <a class="nav-link waves-effect" href="">Institution</a>
                </li>
                <li class="nav-item" style="padding:0 0.5rem;;">
                  <a class="nav-link waves-effect"  href="" >Industry</a>
                </li>
  
              </ul>
          </div>-->

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown -->
		 <?php if($usersrole == 2) { ?>
		 <?php if(Configure::read('Notifications.notifications') == 1) { ?>
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="shownotifications()">
                        <span class="badge red"><?php echo $noticationscount; ?></span> <i class="fas fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notifications</span>
                    </a>

                </li>
				 <?php } ?>
		 <?php } ?>
                <!-- <li class="nav-item">
                   <a class="nav-link waves-effect" href="#test1"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
                 </li>-->
                <!--<li class="nav-item">
                  <a class="nav-link waves-effect" href="#test1"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <!--li class="nav-item">
                  <a class="nav-link waves-effect" id="dark-mode"><i class="fas fa-adjust"></i> <span class="clearfix d-none d-sm-inline-block">Mode</span></a>
                </li-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">My Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					
					 <?php if(Configure::read('Myaccount.myprofile') == 1) { ?>
                        <a class="dropdown-item" href="#" onclick="openmodalboxprofile(3);  return false;">My Profile</a>
						 <?php } ?>
						 <?php if(Configure::read('Myaccount.mysettings') == 1) { ?>
                        <a class="dropdown-item" href="#" onclick="openmodalboxprofile(4);  return false;">My Settings</a>
						 <?php } ?>
			 <?php if($usersrole == 2) { ?>
 <?php if(Configure::read('Myaccount.mypurchase') == 1) { ?>
                        <a class="dropdown-item" href="#" onclick="openmodalboxprofile(5);  return false;">My Purchases</a>
 <?php } ?>
			 <?php } ?>

                        <a class="dropdown-item" href="#" onclick="logouturl()" >Log Out</a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </nav>
        <!-- Navbar -->
		
		<?php } ?>

 <?php if($usersrole != 3 && $usersrole != 4) { ?>

        <div class="card card-intro sky-gradient">
            <div class="card-body white-text rgba-black-light text-center" style="padding: 5px 20px 5px 0 !important;" id="lnadingusernamedisp">
                <!--Grid row-->
                <div class="row d-flex justify-content-between align-items-center">

                    <!--Grid column-->
                    <div class="col-md-4">
                        <h3 class="h3-responsive" style="font-family: Roboto, sans-serif;">Welcome <?php echo $name; ?></h3>

                    </div>
                    <div class="col-md-4">

<!-- <span>Last logged in :<?php echo $loggedintime; ?> IST</span> -->
                    </div>
                    <div class="col-md-4">

          <!--<input placeholder="Search..." type="text" class="form-control" style="border-radius:5rem;" value="" readonly  onfocus="if (this.hasAttribute('readonly')) {
this.removeAttribute('readonly');
// fix for mobile safari to show virtual keyboard
this.blur();    this.focus();  }"> -->

		 <?php if($usersrole == 2) { ?>


 <?php if(Configure::read('Topmenu.purchase') == 1) { ?>
                        <button type="button" class="btn" style="float: right;" onclick='openmodalbox2("View Targets ICC", "List of Targets")'><b>Purchases</b></button>
						 <?php } ?>
						 <?php if(Configure::read('Topmenu.viewdocumentation') == 1) { ?>
                        <a style="margin-right: -154px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 39px;
                                                                                                                                                                     color: white;
                                                                                                                                                                     padding-top: 8px;"></i></a>
							 <?php } ?>																																		 

                        
						 <?php if(Configure::read('Topmenu.videogallery') == 1) { ?>
						
						 <a style="margin-right:12px" href="#" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="Video Gallery" onclick='displayvideogalleey()'><i class="w-fa fas fa-play-circle" style="font-size: 39px;
                                                                              color: white;
                                                                              padding-top: 8px;"></i></a>
																			   <?php } ?>
						 <?php if(Configure::read('Topmenu.gettingstarted') == 1) { ?>
						<a style="margin-right: -56px;" href="#" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="Getting Started" onclick='showuserguisde()'><i class="w-fa fas fa-info-circle" style="font-size: 39px;
                                                                              color: white;
                                                                              padding-top: 8px;"></i></a>
																			   <?php } ?>
		 <?php } ?>


                    </div>

                </div>

                <!--Grid column-->
            </div>


            <!--Grid row-->
        </div>
		<?php } ?>
    </div>

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>




    <div class="container-fluid">

	<?php if($usersrole == 2 && $modulesenable== 0) { 
	
	

	?>

        <script>
            $(function () {
                $('#frameModalBottom').modal({

                    keyboard: false,
                    backdrop: 'static'

                });

                enablemodulesfostudentnew();

            });


            function  enablemodulesfostudentnew() {

//console.log($("#moduleslist").val());

                $.ajax({
                    type: "POST",
                    url: targeturl + 'Users/savestudentinfobuyadminmodules/',
                    data: {

                        addoncourse: $("#addoncousess").val(), modules: $("#moduleslist").val(), scheduleoption: $("#modulescat").val(), course: $("#courseofstudent").val(), useridforrow: $("#useridofstude").val(), useridsavemoodle: $("#useridmoodlestudent").val()

                    },
                    dataType: 'text',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                        /*$("#stdinfosave").hide();
                         $("#messagessksk").html('<div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span></div>Please wait. Do not refresh.');*/


                        // toastr.success("Processing your request please wait......");
                    },
                    success: function (data)
                    {
                        toastr.success(data);
                        // $('#frameModalBottom').modal('hide');
                        updatestudentsmodulesflag();


                    }
                });

            }


            function  updatestudentsmodulesflag() {

//console.log($("#moduleslist").val());

                $.ajax({
                    type: "POST",
                    url: targeturl + 'Users/updatestudentsmodulesflag/',
                    data: {

                        //addoncourse:$("#addoncousess").val(),modules:$("#moduleslist").val(), scheduleoption:$("#modulescat").val(),course : $("#courseofstudent").val(),useridforrow : $("#useridofstude").val(),useridsavemoodle : $("#useridmoodlestudent").val()

                    },
                    dataType: 'text',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                        /*$("#stdinfosave").hide();
                         $("#messagessksk").html('<div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span></div>Please wait. Do not refresh.');*/


                        // toastr.success("Processing your request please wait......");
                    },
                    success: function (data)
                    {
                        //toastr.success(data);
                        $('#frameModalBottom').modal('hide');


                    }
                });

            }



        </script>


 <!--<select name="modules[]" multiple="multiple" class="form-control" id="moduleslist" style="display: none !important;">-->

        <select  class="form-control" id="moduleslist" style="display: none !important;">
            <option value="M0001" selected>Module 1/12 - ( Code:M0001)</option>
       <!--     <option value="M0002" selected>Module 2/12 - ( Code:M0002)</option>
            <option value="M0003" selected>Module 3/12 - ( Code:M0003)</option>
            <option value="M0004" selected>Module 4/12 - ( Code:M0004)</option>
            <option value="M0005" selected>Module 5/12 - ( Code:M0005)</option>
            <option value="M0006" selected>Module 6/12 - ( Code:M0006)</option>
            <option value="M0007" selected>Module 7/12 - ( Code:M0007)</option>
            <option value="M0008" selected>Module 8/12 - ( Code:M0008)</option>
            <option value="M0009" selected>Module 9/12 - ( Code:M0009)</option>
            <option value="M0010" selected>Module 10/12 - ( Code:M0010)</option>
            <option value="M0011" selected>Module 11/12 - ( Code:M0011)</option>
            <option value="M0012" selected>Module 12/12 - ( Code:M0012)</option>-->
        </select>

        <input type="hidden" id="courseofstudent" value="<?php echo $coursenameforfileter; ?>">
        <input type="hidden" id="useridofstude" value="<?php echo $userid; ?>">
        <input type="hidden" id="useridmoodlestudent" value="<?php echo $useridmoodle; ?>">
        <input type="hidden" id="modulescat" value="Module wise">
        <input type="hidden" id="addoncousess" value="">

        <!-- Frame Modal Bottom -->
        <div class="modal fade top" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

            <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-frame modal-top" role="document">


                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center align-items-center">

                            <p class="pt-3 pr-2">


                            <div class="spinner-grow" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>Your account is being set up please wait for a while.

                            </p>

                            <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn ">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Frame Modal Bottom -->







<?php 



} ?>


	<?php if($usersrole != 3 && $usersrole != 4) { ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false"  >
            <div class="carousel-inner">
                <div class="carousel-item active">
	<?php if($usersrole == 2  && $finalgeturl == NULL) { ?>
                    <iframe class="d-block w-100" src="<?php echo Configure::read('MyConf.weburlmainsite');?>users/stepperprofile" id="urlforthemainuser" width="380" height="700" frameBorder="0"></iframe>

	<?php } else if($usersrole == 2 && $finalgeturl != NULL) { ?>
                    <!--<iframe class="d-block w-100" src="<?php echo $finalgeturl; ?>" id="urlforthemainuser" width="380" height="700" frameBorder="0"></iframe>-->
					
					<iframe class="d-block w-100" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/landingdash/index.php?id=<?php echo $userid; ?>" id="urlforthemainuser" width="380" height="700" frameBorder="0"></iframe>
	 <?php }  else { ?>
                    <iframe class="d-block w-100" src="<?php echo Configure::read('MyConf.weburlmainsite');?>users/stepperprofile" id="urlforthemainuser" width="380" height="700" frameBorder="0"></iframe>

	 <?php } ?>
                </div>

	<?php  $k1=1;
	foreach($eventsdatarci12 as $events) { ?>

                <div class="carousel-item">
                    <iframe class="d-block w-100" id="iframepreferencesseturl<?php echo $k1; ?>" width="380" height="700" frameBorder="0"></iframe>
                </div>

	<?php $k1++;  } ?>

                <!--  <div class="carousel-item">
                    <iframe class="d-block w-100" src="https://docs.odinlearning.in/joomlatutorial/" width="380" height="700" frameBorder="0"></iframe>
                  </div>
                      
                      <div class="carousel-item">
                    <iframe class="d-block w-100" src="https://docs.odinlearning.in/phptraining" width="380" height="700" frameBorder="0"></iframe>
                  </div>
                      
                      <div class="carousel-item">
                    <iframe class="d-block w-100" src="https://docs.odinlearning.in/pythonlearn" width="380" height="700" frameBorder="0"></iframe>
                  </div>-->

                <!--<div class="carousel-item">
              <iframe class="d-block w-100" src="<?php echo Configure::read('MyConf.weburlmainsite');?>img/java_tutorial.pdf" width="380" height="700" frameBorder="0"></iframe>
            </div>-->
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>-->
            <!--   <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                  <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                  <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                  <img src="https://pbs.twimg.com/profile_images/905183271046193153/q_P1KBUJ_400x400.jpg" class="img-fluid"/>
                </li>
              </ol> -->
   <?php if($usersrole == 2 && $finalgeturltype != NULL) { ?>
            <div class="container pt-4 pb-5">
                <div class="row carousel-indicators">
                    <div class="col-lg-3 col-md-12 mb-4 item">


	  <?php if($usersrole == 2  && $finalgeturl == NULL) { 
	  
	  $getfurlff ='<?php echo Configure::read("MyConf.weburlmainsite");?>users/stepperprofile';
	  
      } else if($usersrole == 2 && $finalgeturl != NULL) { 
	  
	  $getfurlff = $finalgeturl;
	  
      }  else { 
	  $getfurlff ='<?php echo Configure::read("MyConf.weburlmainsite");?>users/stepperprofile';
	 } ?>

                        <!-- Card -->
                        <div class="card card-cascade cascading-admin-card" data-target="#carouselExampleIndicators" data-slide-to="0" style="height: 148px;" onClick="setlessonurl(4, '<?php echo $getfurlff; ?>')">

                            <!-- Card Data -->
                            <div class="admin-up">
                                <i class="fas fa-book-open warning-color mr-3 z-depth-2"></i>
                                <div class="data">
				<?php if($finalgeturltype == 'L' ){
					
					$cattype = 'Lesson';
				}
				else if($finalgeturltype == 'Q' ){
					$cattype = 'Quiz';
					
				} else if($finalgeturltype == 'PQ' ){
					
					$cattype = 'Practice Quiz';
				}
					
					?>

                                    <p class="text-uppercase"><?php echo $cattype; ?></p>
                                    <h4 class="font-weight-bold dark-grey-text"></h4>
                                </div>
                            </div>

                            <!-- Card content -->
                            <div class="card-body card-body-cascade">
                                <!--<div class="progress mb-3">
                                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                                <p class="card-text"><?php echo $finalgeturltitle; ?></p>
                            </div>

                        </div>
                        <!-- Card -->

<!--<img src="http://nsms.odinlearning.in/img/l1.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/> -->
                    </div>
	    <?php 
	  $k=1;
	  foreach($eventsdatarci12 as $events) { ?>


                    <div class="col-lg-3 col-md-12 mb-4 item">


                        <div class="card card-cascade cascading-admin-card" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $k; ?>" onClick="setlessonurl(<?php echo $k; ?>, '<?php echo $events['url']; ?>')" style="height: 148px;">


                            <div class="admin-up">
                                <i class="fas fa-book-open warning-color mr-3 z-depth-2"></i>
                                <div class="data">
                                    <p class="text-uppercase">Lesson</p>
                                    <h4 class="font-weight-bold dark-grey-text"></h4>
                                </div>
                            </div>


                            <div class="card-body card-body-cascade">
                                <!--  <div class="progress mb-3">
                                    <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>-->
                                <p class="card-text"><?php echo $events['title']; ?></p>
                            </div>

                        </div>
                    </div>

	  <?php $k++;  } ?>


	  <?php /*   <div class="col-lg-3 col-md-12 mb-4 item">
	  
	   <!-- Card -->
            <div class="card card-cascade cascading-admin-card" data-target="#carouselExampleIndicators" data-slide-to="1">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-file-pdf light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">Joomla</p>
                  <h4 class="font-weight-bold dark-grey-text">200</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->
	  
        <!--<img src="http://nsms.odinlearning.in/img/l1.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/> -->
      </div>
	     <div class="col-lg-3 col-md-12 mb-4 item">
	  
	   <!-- Card -->
            <div class="card card-cascade cascading-admin-card" data-target="#carouselExampleIndicators" data-slide-to="2">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-file-pdf light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">PHP</p>
                  <h4 class="font-weight-bold dark-grey-text">200</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->
	  
        <!--<img src="http://nsms.odinlearning.in/img/l1.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/> -->
      </div>
	     <div class="col-lg-3 col-md-12 mb-4 item">
	  
	   <!-- Card -->
            <div class="card card-cascade cascading-admin-card" data-target="#carouselExampleIndicators" data-slide-to="3">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-file-pdf light-blue lighten-1 mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase">Phython</p>
                  <h4 class="font-weight-bold dark-grey-text">200</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->
	  
        <!--<img src="http://nsms.odinlearning.in/img/l1.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="0"/> -->
      </div> */ ?>
                    <!--<div class="col-md-2 item">
                      <img src="http://nsms.odinlearning.in/img/l2.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="1"/>
                    </div>
                    <div class="col-md-2 item">
                      <img src="http://nsms.odinlearning.in/img/pdf.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="2"/>
                    </div>
                         <div class="col-md-2 item">
                      <img src="http://nsms.odinlearning.in/img/pdf.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="3"/>
                    </div>
                        <div class="col-md-2 item">
                      <img src="http://nsms.odinlearning.in/img/pdf.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="4"/>
                    </div>
                         <div class="col-md-2 item">
                      <img src="http://nsms.odinlearning.in/img/pdf.jpg" class="img-fluid" data-target="#carouselExampleIndicators" data-slide-to="5"/>
                    </div>-->

                </div>
            </div>
  <?php } ?><br />
        </div>

<?php } ?>

        <div id="studentcalendarmodal" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Calendar</h4>
                    </div>
                    <div class="modal-body">
<!--
                        <em style="font-size: 14px;line-height: 1.0 !important;color:green">* Completion status will be updated in the calendar once in 24hrs. If you want to know the current status of any module please visit the Learning plan.
                        </em><br />-->
                        <br />	
<?php if($usersrole == 2) { ?>
<?php if($firstlogin == 0 && $synctocalsem == 1 ) {  ?>
                        <span id="synctocalsem1" style="font-weight: bold;font-size: 14px;line-height: 1.0 !important;color:red" > We are fetching events for you. It can take more time than usual. Please wait for a while.</span>
<?php } ?>


<?php if($firstlogin == 0 && $synctocalsem == 0 ) {  ?>
                        <span id="synctocalsem1" style="font-weight: bold;font-size: 14px;line-height: 1.0 !important;color:red" > We are fetching events for you. It can take more time than usual. Please wait for a while.</span>
<?php } ?>

<?php } ?>

                        <div class="row">
                            <div class="col-lg-2 calendar-filter-class" >
                                <div class="form-group1" style="margin-left: 8%;">

                                    <div class="row">
                                        <div class="col-lg-4">

							<?php if($getcatn != 'Semester wise' ) { ?>
                                            <!--<button type="button" class="btn  pull-right" onClick="synctoclanederbystudent();" >Sync to Calendar</button>-->
							<?php } ?>

                                        </div>

							<?php if($getcatn == 'Semester wise' ) { ?>

                                        <div class="col-lg-12" style="display:none" >



							<?php } else { ?>

                                            <div class="col-lg-12" >

							<?php } ?>

                                                <select class="form-control" onchange="calendarfilter(this.value)">
                                                    <!-- <option value="">Choose the filter option</option>-->
                                                    <option value="all">All</option>
                                                    <option value="ICC">ICC</option>
                                                    <option value="DEP">DEP</option>
                                                    <option value="EXAM">Exam</option>
                                                    <option value="SEM">SEM</option>
                                                    <option value="L">Lessons</option>
                                                    <option value="PQ">Example</option>
                                                    <option value="Q">Quiz</option>
                                                </select>
                                            </div>
                                        </div>

							<?php if($getcatn == 'Semester wise' ) { ?>

<!--<a type="button" class="btn  pull-right" onclick="alertforuser()" href="<?php echo Configure::read('MyConf.weburlmainsite');?>events/synctocalendar/<?php echo $userid; ?>" >Sync to Calendar</a>
                                        --><?php } ?>


                                    </div>
                                </div>
                            </div>
							
							<button type="button" onclick="shwoaddeventsnewfilters('OC')" class="btn btn-light">FILTER</button>
							
							<button type="button" onclick="calendarfilter('all')" class="btn btn-light" style="display:none" id="showallonlinecls">Show All</button>
							
							
							<button type="button" class="btn btn-light" onclick='colorlegndsh()'> EVENT COLOR LEGEND</button>
							
							
                            <div class="row calendar-class">
                                <div id='calendar'></div>
                            </div>







                        </div>
                        <!-- <!--<div class="modal-footer">
                            <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                        </div>-->
                    </div>

                </div>
            </div> 
        </div>

        <div id="diagnosticsinsghts" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 300px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation"><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="titlefiorpreference2">In Sights</h4>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn " onClick='openindustry()' >
                            Industry <span class="badge badge-danger ml-2"><?php echo $industrycount; ?></span>
                        </button>
                        <button type="button" class="btn " onClick='opencompany()' >
                            Company <span class="badge badge-danger ml-2"><?php echo $companycount; ?></span>
                        </button>
                        <button type="button" class="btn " onClick='opentargtes()'>
                            Targets <span class="badge badge-danger ml-2"><?php echo $examcount; ?></span>
                        </button>
                        <button type="button" class="btn " onClick='openmodalboxtopics()'>
                            Topics <span class="badge badge-danger ml-2"><?php echo $topicscount; ?></span>
                        </button>

                        <button type="button" class="btn  pull-right" onclick="mytargetsuggestionstudentdisplay()">My Target Suggestion </button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
        <div class="modal right fade" id="myModal1pops" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 300px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><div id='mtitle'></div> </h4>
                    </div>

                    <div id="industrysearch" style="display:none" >
                        <div class="modal-body"  >

<div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover" id="loadindustrytable201">
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                        <!--<th>Industry code</th>-->
                                        <th>Name</th>
                                        <th id="d1">Description</th>
                                    <!--    <th id="a1" ></th>
                                        <th id="a1" ></th>-->

                                    </tr>
                                </thead>

                            </table>

</div>

                        </div>
                    </div>
                    <div id="examsearch" style="display:none" >
                        <div class="modal-body"  >





                        </div>
                    </div>

                    <div id="companysearch" style="display:none" >
                        <div class="modal-body"  >





                        </div>
                    </div>


                    <div id="displaytargets" style="display:none" >
                        <div class="modal-body"  >
				  <?php if($getcatn != 'Semester wise' ) { ?>
                            <button type="button" class="btn  pull-right" onclick="targetrecommender()" >Target Selector </button>
                            <br />
                            <br />
<?php }  ?>

<div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                            <?php if($getcatn == 'Semester wise' ) { ?>
                                        <th>Semester/Code</th>

                            <?php } else {  ?>
                                        <th>Exams/Code</th>
                                        <th>Action</th>
                            <?php }  ?>

                                    </tr>
                                </thead>
                                <tbody>
                        <?php foreach ($targetexams as $target): ?>
                                    <tr class="odd gradeX">

                            <?php if($getcatn == 'Semester wise' ) { ?>
                                        <td><?= h($this->Custom->getsemname($target->examcode)) .' - '.h($target->examcode) ?></td>

                            <?php } else { ?>

                                        <td><?= h($this->Custom->getexamname($target->examcode)) .' / '.h($target->examcode) ?></td>

                                        <td><a href="users/deleteexamcode/<?= h($target->id) ?>">
                                                <i class="fa fa-times fa-fw"></i> Delete
                                            </a></td>

                            <?php }  ?>




                                    </tr>
                        <?php endforeach; ?>
                                </tbody>
                            </table>
							</div>
                            <script>
                                $(document).ready(function () {
                                    $('#dataTables-example').DataTable({
                                        responsive: true
                                    });
                                });
                            </script>


                        </div>
                    </div>


                    <div id="addtargets" style="display:none" >
                        <div class="modal-body"  >
                            <!--<p>Some text in the modal.</p>-->
                            <!--  <button type="button" class="btn  pull-right" onclick="targetrecommender()">Target Selector </button>-->

                            <!--<button type="button" class="btn  pull-right" onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>users/jobfilters","My Filters")'>My Filters </button>-->

<?php if(Configure::read('JobTargets.directory') == 1) { ?>
                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body" style="padding: 0.25rem !important;">
                                    <div class="media ml-3">
                                        <div class="media-body">
                                            <h5 class="mt-0" style="margin-left: 6px;"><strong>Directory : </strong></h5>
                                            <div class="row">
											<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
											 <button type="button" style="width: 100%;right: 12px;" class="btn " onClick='openindustry()' >
                                                Industry <span class="badge badge-danger ml-2"><?php echo $industrycount; ?></span>
                                            </button>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
											<button type="button" style="width: 100%;right: 12px;" class="btn " onClick='opencompany()' >
                                                Company <span class="badge badge-danger ml-2"><?php echo $companycount; ?></span>
                                            </button>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
											 <button type="button" style="width: 100%;right: 12px;" class="btn " onClick='opentargtes()'>
                                                Targets <span class="badge badge-danger ml-2"><?php echo $examcount; ?></span>
                                            </button>
											</div>
											<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
											 <button type="button" style="width: 100%;right: 12px;" class="btn " onClick='openmodalboxtopics()'>
                                                Topics <span class="badge badge-danger ml-2"><?php echo $topicscount; ?></span>
                                            </button>
											</div>
											</div>

                                           
                                            
                                           
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
<?php } ?>
							
							<?php if(Configure::read('JobTargets.recommendedtargets') == 1) { ?>
							<br />
							
							       <div class="card">

                                <!-- Card content -->
                                <div class="card-body" style="padding: 0.25rem !important;">
                                    <div class="media ml-3">
                                        <div class="media-body">
                                            
                                            <div class="row">
											<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
											   <button type="button" style="width: 100%;right: 12px;" class="btn  pull-right" onclick="mytargetsuggestionstudentdisplay()">Recommended Targets</button>
											</div>
											
											</div>

                                           
                                            
                                           
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
							
                      
							
							<?php } ?>

<br />
                            <span style="font-size: 15px;line-height: 1.0 !important;">Select the Targets(Career Path, Exam or Job) that interests you and click on the below Preview button.<br /><em style="font-size: 15px;line-height: 1.0 !important;">* Maximum Target allowed is 10 only.</em></span><br /><br />

<div class="table-responsive">

                            <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="loadtargetsforstudentss" >
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                        <th id="levelv">Eligibility</th>
                                        <th id="levelv" style="width: 18% !important;">Suitability Rank</th>
                                        <th id="levelv">Competency</th>
                                        <th id="levelv">Exam / Target Name</th>
                                        <th id="levelv">Company Name</th>
                                        <th id="levelv">Cut off %</th>
                                        <th id="levelv">Age (min)</th>
                                        <th id="levelv">Age (max)</th>

                                        <th id="levelv">Month (approximate)</th>
                                        <th id="levelv">Year</th>

                                        <th id="levelv" style="width: 18% !important;">Actions</th>



                                    </tr>
                                </thead>

                            </table>
							</div>

                            <em style="font-size: 15px;line-height: 1.0 !important;">* Targets shown in green are already in your selection.</em><br />	



                            <!-- <?= $this->Form->create($targetexamslist, array('action' => '/tagetadd/')) ?>
         
                             <div class="form-group">
         
                                 <select name="target[]" multiple="multiple" class="form-control" id="targets" required style="height: 500px !important;">
         
         
                                 </select>
         
         
         
                             </div>
                             <button type="submit" class="btn ">Add</button>
         
                    <?= $this->Form->end(); ?>-->
					
					
<?php if(Configure::read('JobTargets.previewbutton') == 1) { ?>
                            <button type="button" class="btn  pull-right" onclick="finishatargetcomps()">Preview </button>
							
<?php } ?>
                        </div>
                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>




        <div id="userfprofile" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
					 <?php if($usersrole == 2) { ?>
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
<?php } ?>                       
					   <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="dispalytileforecahc" ></h4>
                    </div>
                    <div class="modal-body">

                        <!-- First row -->
                        <div class="row">
                            <!-- First column -->
                            <div class="col-lg-1 mb-4">




                                <!-- Card -->
                                <div class="card card-cascade narrower" id="displaymenoysonprofile" style="">

                                    <ul class="nav md-pills nav-justified pills-warning mb-4">



			 <?php if(2 == 2 ) { ?>

                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="idforpersonal"
                                            title="Personal">
                                            <a class="nav-link1 active" data-toggle="tab" href="#panel65" id="removedefaultlink" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-user-astronaut"></i></a>
                                        </li>
			<?php } ?>  
			 <?php if($usersrole == 2) { ?>
			 
			 <?php if(Configure::read('Myprofile.academic') == 1) { ?>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="idforacdemic"
                                            title="Academic">
                                            <a class="nav-link1" data-toggle="tab" href="#panel67" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-user-graduate"></i></a>
                                        </li>
			 <?php } ?>
	  	<?php } ?>  

		<?php if($usersrole == 2) { ?>
		
		<?php if(Configure::read('Myprofile.personality') == 1) { ?>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="idforpersonality"
                                            title="Personality">
                                            <a class="nav-link1" data-toggle="tab" href="#panel68" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-address-card" style="margin-left: -2px;
                                                                                                                                                "></i></a>
                                        </li>
										<?php } ?>  
	  	<?php } ?>  

<?php if(Configure::read('Myprofile.profile') == 1) { ?>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="idforprofilesection"
                                            title="Profile" onclick="loadprofilewithgraph()">
                                            <a class="nav-link1" id="profiulesection" data-toggle="tab" href="#panel69" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-tasks" style="margin-left: -2px;
                                                                                                                                                                     "></i></a>
                                        </li>
										<?php } ?>  
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="iforpreference"
                                            title="Preferences" >


                                            <a class="nav-link1" data-toggle="tab" id="preferencessection" href="#panel66" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-bell"></i></a>

                                        </li>
										<?php if(Configure::read('Myprofile.workexperience') == 1) { ?>
										<li class="nav-item" data-toggle="tooltip" data-placement="right" id="workexperience"
                                            title="Work Experience">
                                            <a class="nav-link1" data-toggle="tab" href="#panel650" id="workexperiencelink" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-user-tie"></i></a>
                                        </li>


<?php } ?>  




		 <?php if($usersrole == 2) { ?>
                                        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" id="idfortargetsection" onclick="displaylistoftargetsbasedonyear()" 
                                title="Targets">
                                      <a class="nav-link1" data-toggle="tab" href="#panel70" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-podcast"></i></a>
                                    </li>-->
	  	  	<?php } ?>  
			 <?php if($usersrole == 2) { ?>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="right" id="idforprodcutslist"
                                            title="Purchases">
                                            <a class="nav-link1" data-toggle="tab" href="#panel71" id="lisdtofpurchadeitems" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-cart-plus" style="margin-left: -4px;" ></i></a>
                                        </li>
	  <?php } ?>  


	  <?php if($usersrole == 3) { ?>

                                        <li class="nav-item" data-toggle="tooltip" data-placement="right"
                                            title="Subscribe Events">
                                            <a class="nav-link1" data-toggle="tab" href="#panel80" role="tab" style="width:46px;height:40px"><i class="w-fa fas fa-mail-bulk" ></i></a>
                                        </li>	  

	  <?php } ?>


                                    </ul>




                                </div>



                            </div>
                            <!-- First column -->





                            <!-- Second column -->
                            <div class="col-lg-11 mb-4">

                                <div class="tab-content pt-2 pl-1" id="pills-tabContent">	  

                                    <div class="tab-pane fade show active" id="panel65" role="tabpanel" aria-labelledby="pills-home-tab">


                                        <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold"><?php echo $name; ?></h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <span id="uploaded_image"></span>



                                                <div   id="originalinmage"> 
				<?php if($photoname == 'logo_150-150.png') { ?>

                                                    <img src="<?php echo Configure::read('MyConf.weburlmainsite');?>img/logo_150-150.png" alt="User Photo" class="z-depth-1 mb-3 mx-auto" style="height:150px;width:150px" id="userpicssave">

				<?php } else { ?>
                                                    <img src="<?php echo Configure::read('MyConf.mainurl'); ?>upload/<?= $photoname; ?>" alt="User Photo" class="z-depth-1 mb-3 mx-auto" style="height:150px;width:150px" id="userpicssave">
				<?php } ?>
                                                </div>


				  <?= $this->Form->create($user, ['type' => 'file' ,'id' => 'imageUploadForm']); ?>

                                                <span style="display:none"><?= $this->Form->control('Change', ['label' => 'Change' ,'type' => 'file','name' => 'file','class' => 'hidden','id' => 'filepic' ,'style'=>'cursor: pointer !important;border: 1px solid #333333;padding: 1px 1px 1px 1px;background: #0DB5B5;color: white;']); ?> </span>
  <?= $this->Form->end(); ?>

                <!--<p class="text-muted"><small>Profile photo will be changed automatically</small></p>-->
                                                <div class="row flex-center">
                                                    <a class="btn-floating peach-gradient mt-0 float-left waves-effect waves-light" onclick="changeuserpic();
                                                            return false">
                                                        <i class="fas fa-upload" aria-hidden="true"></i>

                                                    </a>

			    <?php if($photoname != 'logo_150-150.png') { ?>
                                                    <a class="btn-floating peach-gradient mt-0 float-left waves-effect waves-light" id="showdeletimage" onclick="if (confirm('Are you sure want to delete?'))
                                                                deleteuserpic();
                                                            return false">
                                                        <i class="fas fa-trash-alt" aria-hidden="true"></i>

                                                    </a>

				<?php } ?>

                                                    <a class="btn-floating peach-gradient mt-0 float-left waves-effect waves-light" id="showdeletimage" style="display:none" onclick="if (confirm('Are you sure want to delete?'))
                                                                deleteuserpic();
                                                            return false">
                                                        <i class="fas fa-trash-alt" aria-hidden="true"></i>

                                                    </a>




                                                    <!--<button class="btn btn-info btn-rounded btn-sm waves-effect waves-light">Upload New Photo</button><br>
                                                    <button class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">Delete</button>-->
                                                </div>
                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card -->
                                        <br />

                                        <!-- Card -->


                                        <br />
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Personal Details</h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <!-- Edit Form -->
            <?= $this->Form->create($user, ['type' => 'file','onsubmit'=>'return validatephoinenum()']); ?>
                                                <!-- First row -->

                                                <!-- First row -->
                                                <div class="row">
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">



 <?php include('requiredfields.ctp'); ?>

						 <?= $this->Form->control('fname' ,array('label' => false,'class' => 'form-control' ,'id' => 'inputName', $required1)); ?>

                                                            <label for="inputName"  class="active">First name <?php echo $mandatory1; ?></label>
                                                        </div>
                                                    </div>

                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						   <?= $this->Form->control('lname' ,array('label' => false,'class' => 'form-control' ,'id' => 'inputName1' ,$required2)); ?>
                                                            <label for="inputName1"  class="active">Last name <?php echo $mandatory2; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- First row -->

                                                <div class="row">

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

                                                            <!-- Material inline 1 -->
                                                            <div class="form-check form-check-inline" id="genderlistuserd" style="
                                                                 padding: 11px;">
                                                                <input type="radio" class="form-check-input" id="materialInline1" name="gender" value="Male" <?php echo ($gender== 'Male') ?  "checked" : "" ;  ?> <?php echo $required3; ?>>
                                                                <label class="form-check-label" for="materialInline1">Male</label>
                                                            </div>

                                                            <!-- Material inline 2 -->
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" id="materialInline2" name="gender" value="Female" <?php echo ($gender== 'Female') ?  "checked" : "" ;  ?>>
                                                                <label class="form-check-label" for="materialInline2">Female</label>
                                                            </div>

                                                            <!-- Material inline 3 -->
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" class="form-check-input" id="materialInline3" name="gender" value="Other" <?php echo ($gender== 'Other') ?  "checked" : "" ;  ?>>
                                                                <label class="form-check-label" for="materialInline3">Other</label>
                                                            </div>





                                                            <label for="genderid" class="active">Gender <?php echo $mandatory3; ?></label>



                                                        </div>
                                                    </div>
                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					   <?= $this->Form->control('dateofbirth',array('label' => false,'class' => 'form-control datepicker' ,'id' => 'date-picker-example',$required4)); ?>

                                                            <label for="date-picker-example" class="active">Date of Birth <?php echo $mandatory4; ?></label>

                                                            <script>
                                                                $('.datepicker').pickadate({
                                                                    today: '',
                                                                    clear: 'Clear selection',
                                                                    close: 'Cancel',
                                                                    selectYears: 100,
                                                                    format: 'dd-mm-yyyy',
                                                                    min: new Date(1950, 1, 1),
                                                                    max: new Date(2004, 1, 1)
                                                                })
                                                            </script>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- First row -->

                                                <div class="row">

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					  	<?=	
				 $this->Form->input('category', array(
    'options' => $stcategory,
    'type' => 'select',
    'empty' => 'Select the Category',
     'label' => false,
     'class' => 'mdb-select md-form',
	'id' => 'category11',
	$required5
   )
); ?>
                                                            <label for="category11" class="active">Category <?php echo $mandatory5; ?></label>




                                                        </div>
                                                    </div>
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					  	  	<?=	
				 $this->Form->input('nationality', array(
    'options' => array('Indian'=>'Indian' ,'Foreign'=>'Foreign','NRI'=>'NRI'),
    'type' => 'select',
    'empty' => 'Select the Nationality',
     'label' => false,
     'class' => 'mdb-select md-form',
	'id' => 'nationality',
	$required6
   )
); ?>


					    <?php /* $this->Form->control('nationality',array('label' => false,'class' => 'form-control' ,'id' => 'nationality','required'=>'required')); */?>

                                                            <label for="nationality" class="active">Nationality <?php echo $mandatory6; ?></label>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Third row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">



						 <?= $this->Form->control('address',array('label' => false,'class' => 'md-textarea form-control','id'=>'addstu',$required7  , 'rows'=>'3')); ?>


                                                            <label for="addstu"  class="active"  style="margin-top: -9px;">Address (Line 1) <?php echo $mandatory7; ?></label>
                                                        </div>
                                                    </div>
                                                    <!-- First column -->

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">


						    <?= $this->Form->control('address2',array('label' => false,'class' => 'md-textarea form-control','id'=>'addstu1', 'rows'=>'3')); ?>

                                                            <label for="addstu1" class="active"  style="margin-top: -9px;">Address (Line 2)	</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Third row -->


                                                <div class="row">


                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						<?php /*  <?=
				 $this->Form->control('country', array(
                                                'options' => $countrylist,
												
                                                'type' => 'select',
                                                'empty' => 'Select the Country',
												'id' =>'countryse',
                                                'label' => false,
                                                'required' => 'required',
                                                'class' => 'mdb-select md-form'
                                                )
                                                ); ?> */ ?>

                                                            <select class="mdb-select md-form" searchable="Search here.." onchange="leaveChangecountry(this.value)" name="country" id="countrylistdata" <?php echo $required8; ?> >
                                                                <option value="" disabled selected>Select the Country</option>

<?php foreach($countirelist as $clist) { ?>

                                                                <option value="<?php echo $clist['id']; ?>" <?php if ($getcountry == $clist['id'] ) echo 'selected' ; ?> ><?php echo $clist['name']; ?></option>

<?php } ?>

                                                            </select>



                                                            <label for="countryse" class="active"  style="    margin-top: -23px;
                                                                   font-size: 13px;
                                                                   left: 0;">Country <?php echo $mandatory8; ?></label>


                                                        </div>
                                                    </div>
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                         <!-- <select class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
                                        <option value="" disabled selected>City</option>
                                        <option value="1">USA</option>
                                        <option value="2">Germany</option>
                                        <option value="3">France</option>
                                        <option value="4">Poland</option>
                                        <option value="5">Japan</option>
                                      </select>-->






                                                            <select class="mdb-select md-form" searchable="Search here.." id="loadcountrystates" name="state" <?php echo $required9; ?>>

 <?php if($getcountrystate != NULL )  { ?>
                                                                <option value="<?php echo $getcountrystate; ?>" ><?php echo $getcountrystate; ?></option>
 <?php } ?>

                                                            </select>
                                                            <label for="countrystate" class="active" style="    margin-top: -23px;
                                                                   font-size: 13px;
                                                                   left: 0;">State <?php echo $mandatory9; ?></label>									 

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- First row -->

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						 <?= $this->Form->control('city',array('type'=>'text','id'=>'citystudent','label' =>false,'class' => 'form-control',$required10)); ?>
                                                            <label for="citystudent" class="active">City <?php echo $mandatory10; ?></label>
                                                        </div>
                                                    </div>

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						 <?= $this->Form->control('pincode',array('type'=>'text','id'=>'pincodeforstude','label' =>false,'onkeypress'=>'return isNumber(event)','class' => 'form-control',$required11)); ?>
                                                            <label for="pincodeforstude" class="active">Zip Code <?php echo $mandatory11; ?></label>
                                                        </div>
                                                    </div>
                                                    <!-- Second column -->

                                                </div>
                                                <!-- First row -->

                                                <!-- Second row -->
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

			 <?= $this->Form->control('email',array('label' => false,'class' => 'form-control' ,'disabled' => 'disabled')); ?>

                                                            <label for="form77ep" class="active">Email (Primary) <?php echo $mandatory; ?></label>





                                                        </div>
                                                    </div>

                                                    <!-- First column -->

                                                    <!-- Second column -->

                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						 <?= $this->Form->control('emailalternate',array('label' => false,'class' => 'form-control' ,'id' => 'alternateemail')); ?>
                                                            <label for="alternateemail" class="active">Email (Alternate)</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Second row -->

				      <?= $this->Form->control('userroles_id', ['type' => 'hidden','value' => $usersrole]);  ?>

                                                <!-- Third row -->

                                                <!-- Third row -->
                                                <!-- Third row -->
                                                <div class="row">

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					  <?= $this->Form->control('phonenumber',array('label' => false,'onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstude','onInput'=>'checkLength(10,this)','class' => 'form-control',$required12 )); ?>

                                                            <label for="phpnenumbeforstude"  class="active">Phone # (Primary) <?php echo $mandatory12; ?></label>

                                                        </div>
                                                    </div>
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					 <?= $this->Form->control('phonenumalter',array('label' => false,'onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstudeal','onInput'=>'checkLength(10,this)','class' => 'form-control' )); ?>

                                                            <label for="phpnenumbeforstudeal" class="active" >Phone # (Alternate)</label>






                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Third row -->








                                                <!-- Fourth row -->
                                                <div class="row">
                                                    <div class="col-md-12 text-center my-4">
                                                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update Account" class="btn btn-info btn-rounded"></span>
                                                    </div>
                                                </div>
                                                <!-- Fourth row -->

                    <?= $this->Form->end(); ?>
                                                <!-- Edit Form -->

                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card -->
                                        <!-- Card -->

                                    </div>


                                    <div class="tab-pane fade" id="panel66" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->

                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Change Password</h5>
                                            </div>
                                            <!-- Card image -->

                                            <div class="card-body card-body-cascade text-center">
                                                <!-- Third row -->


	<?php  echo $this->Form->create($user, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitchangepassword()'
	
]); ?>			   

                                                <!-- Password -->
   	 <?= $this->Form->control('password_check', array('label' => false, 'required' => 'required','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile1' , 'placeholder'=>'Current Password')); ?>

                                                <span toggle="#mypassowrdprofile1" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                                <br />
                                                <!-- Password -->
   	 <?= $this->Form->control('password_new', array('label' => false,'required' => 'required','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile2' , 'placeholder'=>'New Password')); ?>
                                                <span toggle="#mypassowrdprofile2" class="fa fa-fw fa-eye field-icon toggle-password"></span>


                                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">

                                                </small>


	 <?= $this->Form->control('password_newconfirm', array('label' => false,'required' => 'required','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile3' , 'placeholder'=>'Confirm New Password')); ?>

                                                <span toggle="#mypassowrdprofile3" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                                    Password must contain at least 8 characters, 1 number, 1 capital & 1 lowercase letters. Maximum length should be only 14 characters.
                                                </small>

                                                <div class="text-center">


				    <?=  $this->Form->button('Reset password', array('class' => 'btn btn-info btn-md waves-effect waves-light' ,'value' => 'Reset password'));  ?>


                                                </div>
	 <?= $this->Form->end(); ?>	







                                            </div>


                                            <script>

                                                $('.toggle-password').on('click', function () {



                                                    $(this).toggleClass('fa-eye fa-eye-slash');
                                                    let input = $($(this).attr('toggle'));
                                                    if (input.attr('type') == 'password') {
                                                        input.attr('type', 'text');
                                                    } else {
                                                        input.attr('type', 'password');
                                                    }
                                                });

                                            </script>


                                        </div>
                                        <!-- Card -->
                                        <br />
                                        <br />	






 <?php if($usersrole == 2) { ?>
 
 <?php if(Configure::read('Mysettings.studyhours') == 1) { ?>
                                        <div class="card card-cascade narrower">
                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Study Hour Preferences</h5>
                                                <h5<small>If you tell us how you are likely to study, we will schedule the learning activities accordingly. You can always change this later!</small></h5>
                                            </div>
                                            <!-- Card image -->


                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead style="background-color:#D3D3D3">
                                                            <tr>

                                                                <th>
                                                                    Sunday

                                                                </th>
                                                                <th>
                                                                    Monday

                                                                </th>
                                                                <th>
                                                                    Tuesday

                                                                </th>
                                                                <th>
                                                                    Wednesday

                                                                </th>
                                                                <th>
                                                                    Thursday

                                                                </th>
                                                                <th>
                                                                    Friday

                                                                </th>
                                                                <th>
                                                                    Saturday

                                                                </th>

                                                            </tr>
                                                        </thead> 
                                                        <tbody>
                                                            <tr>
                                                        <script>

                                                            function spinnernumber(a, b)
                                                            {
                                                                //oldValue = 1;
                                                                oldValue = document.getElementById(b).value;
                                                                //alert(oldValue);
                                                                newVal = 1;
                                                                if (a == 'up') {
                                                                    newVal = parseInt(oldValue) + 1;

//	alert(newVal);

                                                                    if (newVal == 25)
                                                                    {
                                                                        return false;
                                                                    }
                                                                } else {
                                                                    if (oldValue > 1) {
                                                                        newVal = parseInt(oldValue) - 1;
                                                                    } else {
                                                                        newVal = 1;
                                                                    }
                                                                }



                                                                if (isNaN(newVal))
                                                                    document.getElementById(b).value = 1;
                                                                else
                                                                    document.getElementById(b).value = newVal;
                                                            }
                                                            /*	 $('.btn').on('click', '.number-spinner .btn', function () {    
                                                             
                                                             
                                                             var btn = $(this),
                                                             oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                                                             newVal = 0;
                                                             
                                                             if (btn.attr('data-dir') == 'up') {
                                                             newVal = parseInt(oldValue) + 1;
                                                             
                                                             if(newVal == 25)
                                                             {
                                                             return false;
                                                             }
                                                             } else {
                                                             if (oldValue > 1) {
                                                             newVal = parseInt(oldValue) - 1;
                                                             } else {
                                                             newVal = 0;
                                                             }
                                                             }
                                                             btn.closest('.number-spinner').find('input').val(newVal);
                                                             });*/
                                                        </script>



												    <?= $this->Form->create($user, ['onsubmit'=>'return savestudeyduartions()']); ?>

                                                        <td><div class="input-group number-spinner">

                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'sunday');
                                                                            return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>
						<?= $this->Form->control('sunday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'sunday' ,'style'=>'margin-top: -20px;')); ?>



                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="dwn" onClick="spinnernumber('down', 'sunday');
                                                                            return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                        <!--	<input type="text" class="form-control text-center" value="0" id="sunday" max="24" name="sunday" >-->


                                                            </div></td>
                                                        <td><div class="input-group number-spinner">


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'monday');
                                                                            return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>

					<?= $this->Form->control('monday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'monday','style'=>'margin-top: -20px;')); ?>


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;"  data-dir="dwn" onClick="spinnernumber('down', 'monday');
                                                                            return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                                <!--<input type="text" class="form-control text-center" value="0" id="monday" name="monday">-->


                                                            </div></td>
                                                        <td><div class="input-group number-spinner">

                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'tuesday');
                                                                            return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>
			<?= $this->Form->control('tuesday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'tuesday','style'=>'margin-top: -20px;')); ?>


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="dwn" onClick="spinnernumber('down', 'tuesday');
                                                                            return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                                <!--<input type="text" class="form-control text-center" value="0" id="tuesday" name="tuesday">-->

                                                            </div></td>
                                                        <td><div class="input-group number-spinner">
                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'wednesday');return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>

				<?= $this->Form->control('wednesday' ,array('type'=>'text','max'=>'24',  'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'wednesday','style'=>'margin-top: -20px;')); ?>

                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="dwn" onClick="spinnernumber('down', 'wednesday');return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                                <!--<input type="text" class="form-control text-center" value="0" id="wednesday" name="wednesday">-->

                                                            </div></td>
                                                        <td><div class="input-group number-spinner">
                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'thursday');
                                                                            return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>

					<?= $this->Form->control('thursday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'thursday','style'=>'margin-top: -20px;')); ?>


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="dwn" onClick="spinnernumber('down', 'thursday');
                                                                            return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                                <!--<input type="text" class="form-control text-center" value="0" id="thursday" name="thursday">-->

                                                            </div></td>
                                                        <td><div class="input-group number-spinner">

        <!--<input type="text" class="form-control text-center" value="0" id="friday" name="friday">-->
                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="up" onClick="spinnernumber('up', 'friday');return false;"><span class="w-fa fas fa-plus"></span></span>
                                                                </span>
						<?= $this->Form->control('friday' ,array('type'=>'text','max'=>'24',  'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'friday','style'=>'margin-top: -20px;')); ?>


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;" data-dir="dwn" onClick="spinnernumber('down', 'friday');return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>

                                                            </div></td>
                                                        <td><div class="input-group number-spinner">
                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;"  data-dir="up" onClick="spinnernumber('up', 'saturday');return false;" ><span class="w-fa fas fa-plus"></span></span>
                                                                </span>

					<?= $this->Form->control('saturday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'saturday','style'=>'margin-top: -20px;')); ?>


                                                                <span class="input-group-btn">
                                                                    <span class="btn-floating btn-sm btn-secondary"  style="line-height: 36px;margin-left: 44px;"  data-dir="dwn" onClick="spinnernumber('down', 'saturday');
                                                                            return false;"><span class="w-fa fas fa-minus"></span></span>
                                                                </span>
                                                                <!--<input type="text" class="form-control text-center" value="0" id="saturday" name="saturday">-->

                                                            </div></td>


                                                        </tr>

                                                        </tbody>
                                                    </table>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>
				<?= $this->Form->end(); ?>

                                                    </div>




                                                </div>

                                                <!-- Card content -->

                                            </div>
                                        </div>
                                        <br /><br />
										
 <?php } ?>

<?php if(Configure::read('Mysettings.job') == 1) { ?>

                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Job Preferences</h5>
                                                <h5<small>These settings will help us show you the right kind of jobs.</small></h5>
                                            </div>
                                            <!-- Card image -->
											
											
 <div class="card-body card-body-cascade text-center">
 
 	<?php  /*echo $this->Form->create(null, [
    'url' => [
        'controller' => 'Preferencesquestion',
        'action' => 'add'
    ]
	
]); */?>
 <!-- Third row -->
 
  <?= $this->Form->create(null, ['onsubmit'=>'return validateprefrencessettings()']); ?>
 

<!----------------------------------------------------->
 

                               


 <!-- Third row -->

<table class="table table-borderless">
  
  <tbody>
  
    <tr>
       <th style="text-align: left;width:100%">  <label for="genderid" class="active"> I would like to be notified of jobs that match</label>
     				  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question1" name="question1" value="My field of specialization" <?php echo ($question1== 'My field of specialization') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question1">My field of specialization</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question11" name="question1" value="Any job that fulfills the basic criteria" <?php echo ($question1== 'Any job that fulfills the basic criteria') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question11">Any job that fulfills the basic criteria</label>
</div>
</th>
    </tr>
	
	    <tr>
      <th style="text-align: left;"><label for="genderid" class="active"> I would prefer a job</label>
     <div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question2" name="question2" value="Anywhere in India"  <?php echo ($question2== 'Anywhere in India') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question2">Anywhere in India</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question22" name="question2" value="Anywhere in the world" <?php echo ($question2== 'Anywhere in the world') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question22"> Anywhere in the world  </label>
</div>
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question222" name="question2" value="Near my Native place" <?php echo ($question2== 'Near my Native place') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question222"> Near my Native place  </label>
</div>


</th>
    
    </tr>
	    <tr>
       <th style="text-align: left;"><label for="genderid" class="active">I would like to avail of Government schemes for employment eg. Government apprentice schemes</label>
   					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question3" name="question3" value="Yes" <?php echo ($question3== 'Yes') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question3">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question33" name="question3" value="No" <?php echo ($question3== 'No') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question33">No </label>
</div></th>
    </tr>
	
	<tr>
      <th style="text-align: left;"> <label for="genderid" class="active">If I have to pick between a job that provides stability vs high learnability I will pick</label>
   					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question4" name="question4" value="Stable company" <?php echo ($question4== 'Stable company') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question4">Stable company</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question44" name="question4" value="Learning company" <?php echo ($question4== 'Learning company') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question44">Learning company</label>
</div></th>
    </tr>
	
	<tr>
      <th style="text-align: left;"> <label for="genderid" class="active">If I have to pick between a well-defined environment vs ad-hoc high energy start-up, I will pick</label>
    

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question55" name="question5" value="A High Energy start-up" <?php echo ($question5== 'A High Energy start-up') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question55">A High Energy start-up </label>
</div>

  <div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question5" name="question5" value="Well defined, process-oriented company" <?php echo ($question5== 'Well defined, process-oriented company') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question5">Well defined, process-oriented company</label>
</div>

</th>
    </tr>
	
	<tr>
       <th style="text-align: left;"> <label for="genderid" class="active">If I have to pick between an established company vs a startup I will pick</label>
    			  <!-- Material inline 1 -->
			  
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question6" name="question6" value="Established company" <?php echo ($question6== 'Established company') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question6">Established company</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question66" name="question6" value="The young startup" <?php echo ($question6== 'The young startup') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question66">The young startup  </label>
</div></th>
    </tr>
	
	<tr>
      <th style="text-align: left;"> <label for="genderid" class="active">How important is money in my first Job </label>
   			  
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question7" name="question7" value="Very important, nothing else matters" <?php echo ($question7== 'Very important, nothing else matters') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question7">Very important, nothing else matters</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question77" name="question7" value="Does not matter as long as my growth is good and Im learning"  <?php echo ($question7== 'Does not matter as long as my growth is good and Im learning') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question77">Does not matter as long as my growth is good and I'm learning </label>
</div></th>
    </tr>
	</tbody>
	</table>
	
	
<!-------------------------------->
  
 				
 
 

 

 

  			
			 
					  
                   
<button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>					
 
           
</div>




                                        </div>
                                        <br />
                                        <br />
										
										 <?php } ?>
										 
										 <?php if(Configure::read('Mysettings.industryconnect') == 1) { ?>
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Industry Connect Settings</h5>
                                                <h5<small>These settings will help us make the right kind of industry connections for you.</small></h5>
                                            </div>
                                            <!-- Card image -->

 <div class="card-body card-body-cascade text-center">
 <!-- Third row -->

<table class="table table-borderless">
  
  <tbody>
  
    <tr>
       <th style="text-align: left;"><label for="genderid" class="active">I would like to make myself available to companies (aligned to my target) for internship</label>
      <div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question10" name="question10" value="Yes" <?php echo ($question10== 'Yes') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question10">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question100" name="question10" value="No" <?php echo ($question10== 'No') ?  "checked" : "" ;  ?> >
  <label class="form-check-label" for="question100">No </label>
</div></th>
    </tr>
	
	<tr>
      <th style="text-align: left;"> <label for="genderid" class="active">If you have selected Yes, above, indicate the time period you can spend at companies as an intern</label>
	
      
	  
	 <!--Table-->
<table class="table table-bordered" >

  <!--Table head-->
  <thead style="background-color:#D3D3D3">
    <tr>
     <th style="font-weight:bold"></th>
      <th style="font-weight:bold">From (dd-mm-yyyy)</th>
      <th style="font-weight:bold">To (dd-mm-yyyy)</th>
    
    </tr>
  </thead>
  <!--Table head-->

  <!--Table body-->
  <tbody>
  
  <?php 

$myArray = explode(',', $question11);
  ?>
  
    <tr>
    <td style="font-weight:bold">Year 1</td> 
      <td><input placeholder="Select the date" type="text" id="date-picker-example11" class="form-control datepicker11" value="<?php echo $myArray[0]; ?>"></td>
      <td><input placeholder="Select the date" type="text" id="date-picker-example111" class="form-control datepicker111" value="<?php echo $myArray[1]; ?>"></td>
     
    </tr>
    <tr>
    <td style="font-weight:bold">Year 2</td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example22" class="form-control datepicker22" value="<?php echo $myArray[2]; ?>"></td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example222" class="form-control datepicker222" value="<?php echo $myArray[3]; ?>"></td>
     
    </tr>
    <tr>
     <td style="font-weight:bold">Year 3</td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example33" class="form-control datepicker33" value="<?php echo $myArray[4]; ?>"></td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example333" class="form-control datepicker333" value="<?php echo $myArray[5]; ?>"></td>
    
    </tr>
    <tr>
      <td style="font-weight:bold">Year 4</td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example44" class="form-control datepicker44" value="<?php echo $myArray[6]; ?>"></td>
      <td> <input placeholder="Select the date" type="text" id="date-picker-example444" class="form-control datepicker444" value="<?php echo $myArray[7]; ?>"></td>
      
    </tr>
   
  </tbody>
  
  <script>
  $('.datepicker11').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker111').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker22').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker222').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker33').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker333').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker44').pickadate({format: 'dd-mm-yyyy'});
  $('.datepicker444').pickadate({format: 'dd-mm-yyyy'});
  </script>
  <!--Table body-->

</table>
<!--Table-->

</th>
    </tr>
	
	<tr>
      <th style="text-align: left;"><label for="genderid" class="active">Do I expect to be paid during my internship</label>
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question12" name="question12" value="Yes" <?php echo ($question12== 'Yes') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question12">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question122" name="question12" value="No" <?php echo ($question12== 'No') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question122">No </label>
</div></th>
    </tr>
	
	<tr>
       <th style="text-align: left;"> <label for="genderid" class="active">I like to keep myself abreast with Technology and Trends, I would be interested to know about speakers and lectures I can attend</label>
      <div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question13" name="question13" value="Yes" <?php echo ($question13== 'Yes') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question13">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question133" name="question13" value="No" <?php echo ($question13== 'No') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question133">No </label>
</div></th>
    </tr>
	
	
	<tr>
       <th style="text-align: left;"> <label for="genderid" class="active">I would like to connect with industry experts who can help me with my college project</label>
    <div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="questioVDDSn13" name="question9" value="Yes" <?php echo ($question9== 'Yes') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="questioVDDSn13">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question133DDDF" name="question9" value="No" <?php echo ($question9== 'No') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="question133DDDF">No </label>
</div></th>
    </tr>
	
	
  </tbody>
</table>
 
 

       <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>	      
</div>


  <?= $this->Form->end(); ?> 


                                        </div>
                                        <br />
                                        <br />
										<?php } ?>


			<?php } ?>



                                        <br />
                                        <!----- nofication settings ------------------------->
			   <?php /*if($usersrole == 2) { ?>
			 <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue">
                <h5 class="mb-0 font-weight-bold">Notification settings</h5>
              </div>
              <!-- Card image -->

 <div class="card-body card-body-cascade text-center">
 <!-- Third row -->
   <!-- Switch -->
              <div class="switch">
                <label>
                  Yes
                  <input type="checkbox" checked="checked">
                  <span class="lever"></span> No
                </label>
              </div>               
		
					
</div>
			  

            </div>
            <!-- Card -->
			<?php } */?>

                                        <!----- end of nofication settings ------------------------->
















                                    </div>
									 <div class="tab-pane fade" id="panel650" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                       
                       <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Work Experience</h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <!-- Edit Form -->
            <?= $this->Form->create($user, ['type' => 'file','onsubmit'=>'return validateexpenceiec()']); ?>
                                                <!-- First row -->

                                           

                                         

                                                <div class="row">

                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					  	<?=	
				 $this->Form->input('exp_industry', array(
     'options' => array('Telecom'=>'Telecom' ,'Manufacturing'=>'Manufacturing','Textile'=>'Textile','Aerospace'=>'Aerospace','Automobile'=>'Automobile'),
    'type' => 'select',
    'empty' => 'Select an option',
     'label' => false,
     'class' => 'mdb-select md-form',
	'id' => 'exp_industry',
	'required' => 'required'
   )
); ?>
                                                            <label for="exp_industry" class="active">Industry <span style="color:red;">*</span></label>




                                                        </div>
                                                    </div>
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

					  	  	<?=	
				 $this->Form->input('exp_expertise', array(
    'options' => array('Finance'=>'Finance' ,'Engineering'=>'Engineering','Human resources'=>'Human resources','Logistics'=>'Logistics'),
    'type' => 'select',
    'empty' => 'Select an option',
     'label' => false,
     'class' => 'mdb-select md-form',
	'id' => 'exp_expertise',
	'required' => 'required'
   )
); ?>


					    <?php /* $this->Form->control('nationality',array('label' => false,'class' => 'form-control' ,'id' => 'nationality','required'=>'required')); */?>

                                                            <label for="exp_expertise" class="active">Line of Expertise	 <span style="color:red;">*</span></label>

                                                        </div>
                                                    </div>
                                                </div>

     <!-- First row -->
                                                <div class="row">
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">



						 <?= $this->Form->control('exp_experience' ,array('label' => false,'onkeypress'=>"return fun_AllowOnlyAmountAndDot(this.id);",'required'=>'required','class' => 'form-control' ,'id' => 'exp_experience')); ?>

                                                            <label for="exp_experience"  class="active">Total Experience (in years) <span style="color:red;">*</span></label>
                                                        </div>
                                                    </div>

                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						   <?= $this->Form->control('exp_currentcompany' ,array('label' => false,'onkeypress'=>"return fun_AllowOnlyAmountAndDot(this.id);",'required'=>'required','class' => 'form-control' ,'id' => 'exp_currentcompany')); ?>
                                                            <label for="exp_currentcompany"  class="active">Experience with the current company (in years)	<span style="color:red;">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- First row -->
												
												     <!-- First row -->
                                                <div class="row">
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">



						 <?= $this->Form->control('exp_namecurrentcompany' ,array('label' => false,'required'=>'required','class' => 'form-control' ,'id' => 'exp_namecurrentcompany')); ?>

                                                            <label for="exp_namecurrentcompany"  class="active">Name of current company	 <span style="color:red;">*</span></label>
                                                        </div>
                                                    </div>

                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						   <?= $this->Form->control('exp_website' ,array('label' => false,'required'=>'required','class' => 'form-control' ,'id' => 'exp_website')); ?>
                                                            <label for="exp_website"  class="active">Website of the company		<span style="color:red;">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- First row -->

                                              


                                                <div class="row">


                                                    <!-- Second column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">

						<?php /*  <?=
				 $this->Form->control('country', array(
                                                'options' => $countrylist,
												
                                                'type' => 'select',
                                                'empty' => 'Select the Country',
												'id' =>'countryse',
                                                'label' => false,
                                                'required' => 'required',
                                                'class' => 'mdb-select md-form'
                                                )
                                                ); ?> */ ?>

                                                            <select class="mdb-select md-form" searchable="Search here.."  name="country" id="exp_country" required >
                                                                <option value="" disabled selected>Select the Country</option>

<?php foreach($countirelist as $clist) { ?>

                                                                <option value="<?php echo $clist['id']; ?>" <?php if ($exp_country == $clist['id'] ) echo 'selected' ; ?> ><?php echo $clist['name']; ?></option>

<?php } ?>

                                                            </select>



                                                            <label for="exp_country" class="active"  style="    margin-top: -23px;
                                                                   font-size: 13px;
                                                                   left: 0;">Country <span style="color:red;">*</span></label>


                                                        </div>
                                                    </div>
                                                    <!-- First column -->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                    		 	  	<?=	
				 $this->Form->input('exp_levels', array(
    'options' => array('Senior Leadership Team (SLT)'=>'Senior Leadership Team (SLT)' ,'Manager Of Managers (MOM)'=>'Manager Of Managers (MOM)','First Time Manager (FTM)'=>'First Time Manager (FTM)','Individual Contributor (IC)'=>'Individual Contributor (IC)'),
    'type' => 'select',
    'empty' => 'Select an option',
     'label' => false,
     'class' => 'mdb-select md-form',
	'id' => 'exp_levels',
	'required' => 'required'
   )
); ?>


					    <?php /* $this->Form->control('nationality',array('label' => false,'class' => 'form-control' ,'id' => 'nationality','required'=>'required')); */?>

                                                            <label for="exp_levels" class="active">Level in Current company		 <span style="color:red;">*</span></label>
							 

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- First row -->

                                                

                                              









                                                <!-- Fourth row -->
                                                <div class="row">
                                                    <div class="col-md-12 text-center my-4">
                                                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Submit Details" class="btn btn-info btn-rounded"></span>
                                                    </div>
                                                </div>
                                                <!-- Fourth row -->

                    <?= $this->Form->end(); ?>
                                                <!-- Edit Form -->

                                            </div>
                                            <!-- Card content -->

                                        </div>
									   
</div>
                                    <div class="tab-pane fade" id="panel67" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">


                                                <h4 class="mb-0 font-weight-bold" <?php if($usersrole == 2) { ?>  id="acaddmicspsmndm" style="" <?php } ?> >Academic
				 <?php if($usersrole == 2) { ?>
                                                    <a onclick="showacademicdetails()"  style="float: right;line-height:9px;margin-top:-4px" id="getStart-content-CLI-jquery" class="btn btn-yellow btn-md flex-fill waves-effect waves-light" target="_blank" alt="PDF button">View
                                                        <i class="fas fa-eye ml-2 d-none d-xl-inline-block"></i>
                                                    </a>
				 <?php } ?>
                                                </h4>


                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">
                                                <!-- Card -->
                                                <div class="card card-cascade cascading-admin-card user-card" style="margin-top: 10px !important;">

                                                    <!-- Card Data -->
                                                    <div class="admin-up d-flex justify-content-start">
                                                        <i class="fas fa-user-graduate info-color py-4 mr-3 z-depth-2"></i>
                                                        <div class="data">
                                                            <h5 class="font-weight-bold dark-grey-text">SSLC - <span class="text-muted">Complete your
                                                                    profile</span></h5>
                                                        </div>
                                                    </div>
                                                    <!-- Card Data -->

                                                    <!-- Card content -->
                                                    <div class="card-body card-body-cascade">

			  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubfunctionsslcpuc(1)'
	
]); ?>

                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">

                                                                    <input type="text" id="collegename1" class="form-control form-control-sm" name="collegename" value="<?php echo $collegename; ?>" required>

                                                                    <label for="form6" class="active">School/College Name <span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->



                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <select class="mdb-select md-form" searchable="Search here.." name="board" id="boardfsfs1">
                                                                        <option value="" disabled selected>Board</option>
                                                                        <option value="CBSE" <?php if ($board == 'CBSE' ) echo 'selected' ; ?>  >CBSE</option>
                                                                        <option value="ICSE"  <?php if ($board == 'ICSE' ) echo 'selected' ; ?> >ICSE</option>
                                                                        <option value="State Board"  <?php if ($board == 'State Board' ) echo 'selected' ; ?> >State Board</option>
                                                                        <option value="CISCE"  <?php if ($board == 'CISCE' ) echo 'selected' ; ?> >CISCE</option>

                                                                    </select>


                                                                    <label for="boardfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Board</label>

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="percentage1" class="form-control form-control-sm" name="percentage" value="<?php echo $percentage; ?>" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" required>
                                                                    <label for="form5" class="active">Percentage<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="regno1" class="form-control form-control-sm" name="regno" value="<?php echo $regnon; ?>">
                                                                    <label for="form5" class="active">Registration No.</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="joining1" class="form-control form-control-sm" name="joining" value="<?php echo $joining; ?>" onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Joining</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="passout1" class="form-control form-control-sm" name="passout" value="<?php echo $passout; ?>" required  onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Passout<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>

                                                            <input type="hidden" value="SSLC" class="form-control form-control-sm" name="type" id="type1" >
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>	


  <?= $this->Form->end(); ?> 

                                                        <!-- Grid row -->

                                                    </div>
                                                    <!-- Card content -->

                                                </div>
                                                <!-- Card -->



                                                <div class="card card-cascade cascading-admin-card user-card" style="margin-top: 30px !important;">

                                                    <!-- Card Data -->
                                                    <div class="admin-up d-flex justify-content-start">
                                                        <i class="fas fa-user-graduate info-color py-4 mr-3 z-depth-2"></i>
                                                        <div class="data">
                                                            <h5 class="font-weight-bold dark-grey-text">SSLC + 2/3 - <span class="text-muted">Complete your
                                                                    profile</span></h5>
                                                        </div>
                                                    </div>
                                                    <!-- Card Data -->

                                                    <!-- Card content -->
                                                    <div class="card-body card-body-cascade">

		  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubfunctionsslcpuc(2)'
	
]); ?>

                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">

                                                                    <input type="text" id="collegename2" class="form-control form-control-sm" name="collegename" value="<?php echo $collegenamepuc; ?>"  required>

                                                                    <label for="form6" class="active">School/College Name<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->



                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <select class="mdb-select md-form" searchable="Search here.." name="board" id="boardfsfs2">
                                                                        <option value="" disabled selected>Board</option>
                                                                        <option value="PU Board" <?php if ($boardpuc == 'PU Board' ) echo 'selected' ; ?>  >PU Board</option>
                                                                        <option value="CBSE"  <?php if ($boardpuc == 'CBSE' ) echo 'selected' ; ?> >CBSE</option>
                                                                        <option value="ICSE"  <?php if ($boardpuc == 'ICSE' ) echo 'selected' ; ?> >ICSE</option>


                                                                    </select>


                                                                    <label for="boaassdfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Board</label>

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="percentage2" class="form-control form-control-sm" name="percentage" value="<?php echo $percentagepuc; ?>" required onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Percentage<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="regno2" class="form-control form-control-sm" name="regno" value="<?php echo $regnonpuc; ?>">
                                                                    <label for="form5" class="active">Registration No.</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="joining2" class="form-control form-control-sm" name="joining" value="<?php echo $joiningpuc; ?>" onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Joining</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="passout2" class="form-control form-control-sm" name="passout" value="<?php echo $passoutpuc; ?>" required onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Passout<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>

                                                            <input type="hidden" value="PUC" class="form-control form-control-sm" name="type" id="type2" >
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>	


  <?= $this->Form->end(); ?> 

                                                        <!-- Grid row -->

                                                    </div>
                                                    <!-- Card content -->
                                                    <!-- Card content -->

                                                </div>
                                                <!-- Card -->


                                                <div class="card card-cascade cascading-admin-card user-card" style="margin-top: 30px !important;">

                                                    <!-- Card Data -->
                                                    <div class="admin-up d-flex justify-content-start">
                                                        <i class="fas fa-user-graduate info-color py-4 mr-3 z-depth-2"></i>
                                                        <div class="data">
                                                            <h5 class="font-weight-bold dark-grey-text">Graduation - <span class="text-muted">Complete your
                                                                    profile</span></h5>
                                                        </div>
                                                    </div>
                                                    <!-- Card Data -->

                                                    <!-- Card content -->
                                                    <div class="card-body card-body-cascade">



  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Ugpg',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubfunctionugpg(1)'
	]); ?>

                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="universitynameugpg1" class="form-control form-control-sm" name="universityname" value="<?php echo $universityname; ?>" required>
                                                                    <label for="form6" class="active">Institution/University Name<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->



                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <select class="mdb-select md-form" searchable="Search here.." onchange="leaveChange(this.value)" name="stream" id="boarderwwfsfs1" >
                                                                        <option value="" disabled selected>Stream</option>

<?php foreach($courselist as $clist) { ?>

                                                                        <option value="<?php echo $clist['id']; ?>" <?php if ($stream == $clist['id'] ) echo 'selected' ; ?> ><?php echo $clist['name']; ?></option>

<?php } ?>

                                                                    </select>

                                                                    <label for="boarderwwfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Stream</label>

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">





                                                                    <select class="mdb-select md-form" searchable="Search here.." id="loadugsepcilaization1" name="specialization" id="boargfgderwwfsfs">

 <?php if($specialization != NULL )  { ?>
                                                                        <option value="<?php echo $specialization; ?>" ><?php echo $specialization; ?></option>
 <?php } ?>

                                                                    </select>

                                                                    <label for="boargfgderwwfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Specialization</label>

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="regnougpg1" class="form-control form-control-sm" name="regno" value="<?php echo $regnoug; ?>">
                                                                    <label for="form5" class="active">Registration No.</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="yearjoiningugpg1" class="form-control form-control-sm" name="yearjoining" value="<?php echo $yearjoining; ?>" onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Joining</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="yearpassoutugpg1" class="form-control form-control-sm" name="yearpassout" value="<?php echo $yearpassout; ?>" required   onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Passout<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->


                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">


                                                                    <select class="mdb-select md-form" searchable="Search here.." name="courseduration" id="boadfdgfrdfsfs1" required>
                                                                        <option value="" disabled selected>Course duration</option>
                                                                        <option value="1" <?php if ($courseduration == 1 ) echo 'selected' ; ?>>1 Year</option>
                                                                        <option value="2" <?php if ($courseduration == 2 ) echo 'selected' ; ?>>2 Year</option>
                                                                        <option value="3" <?php if ($courseduration == 3 ) echo 'selected' ; ?>>3 Year</option>
                                                                        <option value="4" <?php if ($courseduration == 4 ) echo 'selected' ; ?>>4 Year</option>

                                                                    </select>
                                                                    <label for="boadfdgfrdfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Course duration <span style="color:red;">*</span></label>  
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->

                                                        <!-- Grid row -->
                                                        <div class="row">


                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem11" class="form-control form-control-sm" name="sem1"  value="<?php echo $sem1; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 1(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem21" class="form-control form-control-sm" name="sem2"  value="<?php echo $sem2; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 2(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem31" class="form-control form-control-sm" name="sem3"  value="<?php echo $sem3; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 3(%)</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem41" class="form-control form-control-sm" name="sem4"  value="<?php echo $sem4; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 4(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->
                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem51" class="form-control form-control-sm" name="sem5"  value="<?php echo $sem5; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 5(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem61" class="form-control form-control-sm" name="sem6"  value="<?php echo $sem6; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 6(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem71" class="form-control form-control-sm" name="sem7"  value="<?php echo $sem7; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="sem71" class="active">Semester 7(%)</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem81" class="form-control form-control-sm" name="sem8"  value="<?php echo $sem8; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="sem81" class="active">Semester 8(%)</label>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <!-- Grid row -->
                                                        <input type="hidden" value="UG" class="form-control form-control-sm" name="type" id="typeugpg1" >

                                                        <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>	


 <?= $this->Form->end(); ?> 

                                                        <!-- Grid row -->

                                                    </div>
                                                    <!-- Card content -->

                                                </div>
                                                <!-- Card -->


                                                 <div class="border border-light p-3 mb-4" style="margin-top: 12px;">
<div class="text-left">Post Graduation</div>
     
	  	<div class="text-right custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="ffffnmkfbkjasfljdfjags" onclick="applicablepostgraduation()">
    <label class="custom-control-label" for="defaultUnchecked">Applicable</label>
</div>

    </div>
			
			<div class="card card-cascade cascading-admin-card user-card" style="margin-top: 30px !important;display:none" id="postygarduatoionchec">

                                                    <!-- Card Data -->
                                                    <div class="admin-up d-flex justify-content-start">
                                                        <i class="fas fa-user-graduate info-color py-4 mr-3 z-depth-2"></i>
                                                        <div class="data">
                                                            <h5 class="font-weight-bold dark-grey-text">Post Graduation - <span class="text-muted">Complete your
                                                                    profile</span></h5>
                                                        </div>
                                                    </div>
                                                    <!-- Card Data -->

                                                    <!-- Card content -->
                                                    <div class="card-body card-body-cascade">

	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Ugpg',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubfunctionugpg(2)'
	]); ?>

                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="universitynameugpg2" class="form-control form-control-sm" name="universityname" required value="<?php echo $universitynameug; ?>">
                                                                    <label for="form6" class="active">Institution/University Name<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->



                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">
                                                                    <select class="mdb-select md-form" searchable="Search here.." onchange="leaveChange1(this.value)" name="stream" id="boarderwwfsfs2">
                                                                        <option value="" disabled selected>Stream</option>

<?php foreach($courselistpg as $clist) { ?>

                                                                        <option value="<?php echo $clist['id']; ?>" <?php if ($streamug == $clist['id'] ) echo 'selected' ; ?> ><?php echo $clist['name']; ?></option>

<?php } ?>

                                                                    </select>

                                                                    <label for="boadfdgfrerwrdfsfs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Stream</label>  

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-6">

                                                                <div class="md-form form-sm mb-0">





                                                                    <select class="mdb-select md-form" searchable="Search here.." id="loadugsepcilaization2" name="specialization" >

 <?php if($specializationug != NULL )  { ?>
                                                                        <option value="<?php echo $specializationug; ?>" ><?php echo $specializationug; ?></option>
 <?php } ?>

                                                                    </select>
                                                                    <label for="hjdfgfsgsf" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Specialization</label>  

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="regnougpg2" class="form-control form-control-sm" name="regno" value="<?php echo $regnougug; ?>">
                                                                    <label for="form5" class="active">Registration No.</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="yearjoiningugpg2" class="form-control form-control-sm" name="yearjoining" value="<?php echo $yearjoiningug; ?>" onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Joining</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-4">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="yearpassoutugpg2" class="form-control form-control-sm" name="yearpassout" required value="<?php echo $yearpassoutug; ?>"   onkeypress="return isNumber(event)" onInput="checkLength(4,this)">
                                                                    <label for="form5" class="active">Year of Passout<span style="color:red;">*</span></label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->


                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->


                                                            <!-- Grid column -->
                                                            <div class="col-md-12">

                                                                <div class="md-form form-sm mb-0">


                                                                    <select class="mdb-select md-form" searchable="Search here.." name="courseduration" id="boadfdgfrdfsfs2" required>
                                                                        <option value="" disabled selected>Course duration</option>
                                                                        <option value="1" <?php if ($coursedurationug == 1 ) echo 'selected' ; ?>>1 Year</option>
                                                                        <option value="2" <?php if ($coursedurationug == 2 ) echo 'selected' ; ?>>2 Year</option>
                                                                        <option value="3" <?php if ($coursedurationug == 3 ) echo 'selected' ; ?>>3 Year</option>
                                                                        <option value="4" <?php if ($coursedurationug == 4 ) echo 'selected' ; ?>>4 Year</option>

                                                                    </select>
                                                                    <label for="fsfsaafs" class="active" style="    margin-top: -23px;
                                                                           font-size: 13px;
                                                                           left: 0;" >Course duration <span style="color:red;">*</span></label>  

                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->

                                                        <!-- Grid row -->
                                                        <div class="row">


                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem12" class="form-control form-control-sm" name="sem1"  value="<?php echo $sem1ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 1(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem22" class="form-control form-control-sm" name="sem2"  value="<?php echo $sem2ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 2(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem32" class="form-control form-control-sm" name="sem3"  value="<?php echo $sem3ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 3(%)</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem42" class="form-control form-control-sm" name="sem4"  value="<?php echo $sem4ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 4(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                        </div>
                                                        <!-- Grid row -->
                                                        <!-- Grid row -->
                                                        <div class="row">

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem52" class="form-control form-control-sm" name="sem5"  value="<?php echo $sem5ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 5(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->

                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem62" class="form-control form-control-sm" name="sem6"  value="<?php echo $sem6ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 6(%)</label>
                                                                </div>

                                                            </div>
                                                            <!-- Grid column -->
                                                            <!-- Grid column -->
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem72" class="form-control form-control-sm" name="sem7"  value="<?php echo $sem7ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 7(%)</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3">

                                                                <div class="md-form form-sm mb-0">
                                                                    <input type="text" id="sem82" class="form-control form-control-sm" name="sem8"  value="<?php echo $sem8ug; ?>" autocomplete="none" onkeypress="return fun_AllowOnlyAmountAndDot(this.id);">
                                                                    <label for="form5" class="active">Semester 8(%)</label>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <!-- Grid row -->
                                                        <input type="hidden" value="PG" class="form-control form-control-sm" name="type"  id="typeugpg2">

                                                        <button type="submit" class="btn btn-info btn-md waves-effect waves-light" >Save</button>	


 <?= $this->Form->end(); ?> 

                                                        <!-- Grid row -->




                                                        <!-- Grid row -->

                                                    </div>
                                                    <!-- Card content -->

                                                </div>
                                                <!-- Card -->

                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card --></div>


                                    <div class="tab-pane fade" id="panel68" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                                   <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue">
                <h5 class="mb-0 font-weight-bold">Personality</h5>
					<h5<small>Information here is used to find you the best job type/ job function based on the type of person you are.</small></h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
                  <div class="card-body card-body-cascade text-center">
			  
			  
			  
			  

            
				  


                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
					  
                         <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Problem Solving (<span id="getvaluesp1"><?php echo number_format((float)$problemsolving * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $problemsolving * 100; ?>"  disabled  id="getvaluespp1"/>
      </form>
	 
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	  <?php if($problemsolving == '0') { ?>
   <!--<i class="fas fa-arrow-alt-circle-up" aria-hidden="true" style="padding-left: 11px;margin-top: 4px;font-size:25px" data-toggle="tooltip" data-placement="top"
  title="Test / Start" onClick="modalboxes(1)"></i>-->
  <button type="button" class="btn " onClick="modalboxes(1)"  id="modalboxes1"   style=" height: 10px;width:50px;
    
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else { ?>
     <button type="button" class="btn " onClick="modalboxes(1)"  id="modalboxes1"   style=" height: 10px;width:50px;
    
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;display:none;">Quiz</button>
   <?php } ?>
	
    </div>
	
                   
                      </div>
                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
					  
					  
					  
                         <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Teamwork
(<span id="getvaluesp2"><?php echo number_format((float)$teamwork * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $teamwork * 100; ?>"  disabled id="getvaluespp2"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	  
	   <?php if($teamwork == '0') { ?>
 
   <button type="button" class="btn " onClick="modalboxes(2)"  id="modalboxes2"   style=" height: 10px;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
  
   <?php  } else { ?>
   
      <button type="button" class="btn " onClick="modalboxes(2)"  id="modalboxes2"   style=" height: 10px;display:none;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php } ?>
    </div>
					  
					  
                       
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- First row -->
                  <div class="row">
                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                    
						
						
						 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Leadership (<span id="getvaluesp3"><?php echo number_format((float)$leadership * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100"  value="<?php echo $leadership * 100; ?>"  disabled id="getvaluespp3" />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	  
	    <?php if($leadership == '0') { ?>

   <button type="button" class="btn " onClick="modalboxes(3)"  id="modalboxes3"   style=" height: 10px;width:50px;
   
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else { ?>
     <button type="button" class="btn " onClick="modalboxes(3)"  id="modalboxes3"   style=" height: 10px;display:none;width:50px;
   
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php } ?>
    </div>
						
						
                      </div>
                    </div>

                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                      
						
							 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Social/Language Skills (<span id="getvaluesp4"><?php echo number_format((float)$socialskils * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $socialskils * 100; ?>"  disabled id="getvaluespp4"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	  
	     <?php if($socialskils == '0') { ?>

   <button type="button" class="btn " onClick="modalboxes(4)"  id="modalboxes4"  style=" height: 10px;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else { ?>
   
     <button type="button" class="btn " onClick="modalboxes(4)"  id="modalboxes4"  style=" height: 10px;display:none;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   
   <?php } ?> 
    </div>
						
						
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- Second row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                   
						 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Initiative (<span id="getvaluesp5"><?php echo number_format((float)$initative * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $initative * 100; ?>"  disabled  id="getvaluespp5"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	
	   <?php if($initative == '0') { ?>

	  <button type="button" class="btn " onClick="modalboxes(5)"  id="modalboxes5"  style=" height: 10px;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  }  else { ?>
   
   	  <button type="button" class="btn " onClick="modalboxes(5)"  id="modalboxes5"  style=" height: 10px;display:none;width:50px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   
   <?php } ?>
    </div>
						
                      </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-6">
                      <div class="md-form mb-0">
					  
					  	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Communication (<span id="getvaluesp6"><?php echo number_format((float)$communicationspoken * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100"  value="<?php echo $communicationspoken * 100; ?>"  disabled id="getvaluespp6" />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	
	     <?php if($communicationspoken == '0') { ?>

   <button type="button" class="btn " onClick="modalboxes(6)"    id="modalboxes6" style=" height: 10px;width:50px;
 
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else {  ?>
   
   <button type="button" class="btn " onClick="modalboxes(6)"    id="modalboxes6" style=" height: 10px;display:none;width:50px;
 
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   
   <?php } ?>
    </div>
                       
						
  
						
						
                      </div>
                    </div>
                  </div>
                 
                  <!--<div class="row">

                    
                    <div class="col-md-6">
                      <div class="md-form mb-0">
					  
					  	  
					  	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Communication (written) (<span id="getvaluesp7"><?php echo number_format((float)$communicationwritten * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $communicationwritten * 100; ?>"  disabled id="getvaluespp7" />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	 
	    <?php if($communicationwritten == '0') { ?>
  
   <button type="button" class="btn " onClick="modalboxes(7)"  id="modalboxes7"   style=" height: 10px;
   
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } ?>
    </div>
	
                      
                       
						
						
						
                      </div>
                    </div>
                

                    <div class="col-md-6">
                      <div class="md-form mb-0">
					  
					  
					   	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Communication (oratory) (<span id="getvaluesp8"><?php echo number_format((float)$communicationoratory * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100"  value="<?php echo $communicationoratory * 100; ?>"  disabled id="getvaluespp8" />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>

	  <?php if($communicationoratory == '0') { ?>
  	 
   <button type="button" class="btn " onClick="modalboxes(8)"  id="modalboxes8"  style=" height: 10px;
  
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } ?>
    </div>
                       
					
                      </div>
                    </div>
                  </div>-->
                  <!-- Second row -->

                 
                  <div class="row">
  <div class="col-md-6">
                      <div class="md-form mb-0">
                   
						
							 	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Management (<span id="getvaluesp11"><?php echo number_format((float)$managementskills * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $managementskills * 100; ?>"  disabled id="getvaluespp11"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	
	  <?php if($managementskills == '0') { ?>
  
   <button type="button" class="btn " onClick="modalboxes(11)"  id="modalboxes11"  style=" height: 10px;width:50px;
 
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else { ?>
      <button type="button" class="btn " onClick="modalboxes(11)"  id="modalboxes11"  style=" height: 10px;display:none;width:50px;
 
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php } ?>
    </div>
						
						
                      </div>
                    </div>
                   
                   
                  

                    <div class="col-md-6">
                      <div class="md-form mb-0">
               
						
						 	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Technology (<span id="getvaluesp10"><?php echo number_format((float)$technologyaffiliation * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $technologyaffiliation * 100; ?>"  disabled id="getvaluespp10"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	 
	   <?php if($technologyaffiliation == '0') { ?>

   <button type="button" class="btn " onClick="modalboxes(10)"   id="modalboxes10"  style=" height: 10px;width:50px;

    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } else {?>
   
    <button type="button" class="btn " onClick="modalboxes(10)"   id="modalboxes10"  style=" height: 10px;display:none;width:50px;

    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   
   <?php } ?>
    </div>
						
						
                      </div>
                    </div>
                  </div>
                  <!-- Second row -->
				    <!-- Second row -->
                 <!--- <div class="row">

                    
                  <div class="col-md-6">
                      <div class="md-form mb-0">
                  
						
						 	 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Travel and Exploration (<span id="getvaluesp9"><?php echo number_format((float)$travelandexploration * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100" value="<?php echo $travelandexploration * 100; ?>"  disabled  id="getvaluespp9"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	 
	   <?php if($travelandexploration == '0') { ?>
 
   <button type="button" class="btn " onClick="modalboxes(9)"  id="modalboxes9"  style=" height: 10px;
   
    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } ?>
    </div>
						
                      </div>
                    </div>
                   

                    <div class="col-md-6">
             
                            <div class="md-form mb-0">
						 <div class="d-flex justify-content-center my-4 pt-3">
						     <label for="form2" data-error="wrong" data-success="right" style="left:null !important;top: 34px;right: 0;">Foreign Languages (<span id="getvaluesp12"><?php echo number_format((float)$foriegnlanguages * 100, 2, '.', ''); ?></span>%)</label>
      <span class="font-weight-bold blue-text mr-2 mt-1"><i class="fas fa-thumbs-down" aria-hidden="true"></i></span>
      <form class="range-field w-75">
        <input class="border-0" type="range" min="0" max="100"  value="<?php echo $foriegnlanguages * 100; ?>"  disabled  id="getvaluespp12"  />
      </form>
      <span class="font-weight-bold blue-text ml-2 mt-1"><i class="fas fa-thumbs-up" aria-hidden="true"></i></span>
	
	   <?php if($foriegnlanguages == '0') { ?>

   <button type="button" class="btn " onClick="modalboxes(12)"   id="modalboxes12"  style=" height: 10px;

    line-height: 2px;
    padding-left: 3px;
    padding-right: 3px;">Quiz</button>
   <?php  } ?>
    </div>
						
						
			</div>			
                    
                    </div>
                  </div>-->
                  <!-- Second row -->
				

        <?php if($myersbriggs == '0' ) { ?>
		<div id="loadimgss"></div>
<button type="button" class="btn " onClick="evaluatemypersoanlity()" id="eveabriges" >Evaluate your personality type</button>
		<?php } else { ?>
 <img class="img-fluid" style="height: 105px;" onClick="redirecturlsstudent17545574('<?php echo Configure::read("MyConf.weburlmainsite");?>users/<?php echo $myersbriggs; ?>','<?php echo strtoupper($myersbriggs); ?>')" id="userpicturechange5555" src="https://openodin.odinlearning.in/img/<?php echo $myersbriggs; ?>.png" 
    alt="<?php echo strtoupper($myersbriggs); ?>">

<button type="button" class="btn " onClick="evaluatemypersoanlity()" id="eveabriges" style="display:none;" >Evaluate your personality type</button>
		<div id="loadimgss"></div>
		<?php } ?>
		
		<br />
		<br />
		
		<div class="text-right">
 <button type="button" class="btn " onClick="resetallkeys()">Re-attempt Quiz</button>
</div>
          


              </div>
              <!-- Card content -->

            </div>
                                        <!-- Card --></div>

                                    <div class="tab-pane fade" id="panel69" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <!--  style="padding: 23px 15px 2px 3px !important;"-->
                                            <div class="view view-cascade gradient-card-header blue" style="height: 69px;" >

                                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>


                                                <script type="text/javascript">
														  	    function resetallkeys()
			  {
				  
				  $("#modalboxes1").show();
				   $("#modalboxes2").show();
				    $("#modalboxes3").show();
					 $("#modalboxes4").show();
					  $("#modalboxes5").show();
					   $("#modalboxes6").show();
					    $("#modalboxes10").show();
						  $("#modalboxes11").show();
						   $("#eveabriges").show();
						     $("#userpicturechange5555").hide();
							   $("#dbfskjvKJSFJKAFDFAS").hide();
				  
				  
			  }
                                                    function saveAspdf() {
                                                        toastr.info('PDF download is in progress.');
                                                        var pdf = new jsPDF('p', 'pt', 'a4');
                                                        pdf.addHTML(document.body, function () {
                                                            pdf.save('studentcv.pdf');
                                                        });
                                                    }

                                                    //$('.media-body')
                                                </script>

                                                <h4 class="mb-0 font-weight-bold" <?php if($usersrole == 2) { ?>  id="curriculumvitrearesume" style="" <?php } ?> >Profile
				 <?php if($usersrole == 2) { ?>
                                                    <a target="_blank" href="<?php echo Configure::read('MyConf.weburlmainsite');?>users/studentresume"  style="float: right;line-height:9px;margin-top:-4px" id="getStart-content-CLI-jquery" class="btn btn-yellow btn-md flex-fill waves-effect waves-light" target="_blank" alt="PDF button">Curriculum Vitae
                                                        <i class="fas fa-eye ml-2 d-none d-xl-inline-block"></i>
                                                    </a>
				 <?php } ?>
                                                </h4>

                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">



                                                <table class="table table-bordered table-striped">
                                                    <thead style="background-color:#D3D3D3">
                                                        <tr>

                                                            <th>






												  <?= $this->Form->create($user, ['type' => 'file','onsubmit'=>'return onsubfunction()']); ?>      
                                                                <!-- Third row -->


                                                                <!-- First column -->
                                                                <div class="col-md-12">
                                                                    <div class="md-form mb-0">



                                                                        <div class="media">

					  <?php if($photoname == 'logo_150-150.png') { ?>

                                                                            <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" id="userpicturechange" src="<?php echo Configure::read('MyConf.weburlmainsite');?>img/logo_150-150.png"  style="height:70px;width:70px"
                                                                                 alt="Avatar">

<?php } else { ?>
                                                                            <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" id="userpicturechange" src="<?php echo Configure::read('MyConf.mainurl'); ?>upload/<?= $photoname; ?>"  style="height:70px;width:70px"
                                                                                 alt="Avatar">

<?php } ?>


                                                                            <div class="media-body">
                                                                                <h5 class="mt-0 font-weight-bold blue-text" style="text-align: left;">About Myself : </h5>
  	 <?= $this->Form->control('aboutme',array('label' => false,'class' => 'md-textarea form-control','id'=>'aboutmedata','required' => 'required' ,'pattern'=>'\S+', 'title'=>'This field is required', 'rows'=>'3' , 'maxlength'=>'250')); ?>
                                                                                <span class="waves-input-wrapper waves-effect waves-light" style="float: right;"><input type="submit" value="Update" class="btn btn-info btn-rounded"></span>
                                                                            </div>
                                                                        </div>




                                                                    </div>
                                                                </div>



                                                                <!-- Third row -->
				       <?= $this->Form->end(); ?>



                                                            </th>
                                                        </tr>
                                                    </thead>	
                                                </table>	


   <?php if($usersrole == 2) { ?>
<!-- <table class="table table-bordered table-striped">
                                          <thead style="background-color: green; color: white;">
                                              <tr>
                                                  
                                                  <th style="font-size:12px">
                                                    University/College Reg No.
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                      Year of Admission
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                      Year of Graduation
                                                    
                                                  </th>
                                                                                                      
                                                                                                       
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                               <tr>
                                                                                                <td><?php echo $regno; ?></td>
                                                                                                <td><?php echo $adminisonyear; ?></td>
                                                                                                <td><?php echo $graduationyear; ?></td>
                                                                                               
                                                                                               
                                                                                               </tr>
                                                                                                </tbody>
                                                                                                 </table>



<table class="table table-bordered table-striped">
                                          <thead style="background-color: green; color: white;">
                                              <tr>
                                                  
                                                  <th style="font-size:12px">
                                                      Semester 1
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                     Semester 2
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                     Semester 3
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                     Semester 4
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                      Semester 5
                                                    
                                                  </th>
                                                                                                       <th style="font-size:12px">
                                                    Semester 6
                                                    
                                                  </th>
                                                                                                       
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                               <tr>
                                                                                                <td>75.20%</td>
                                                                                                <td>65.25%</td>
                                                                                                <td>58.27%</td>
                                                                                                <td>25.25%</td>
                                                                                                <td>58.00%</td>
                                                                                                <td>25.25%</td>
                                                                                               
                                                                                               </tr>
                                                                                                </tbody>
                                                                                                 </table>		-->

<!-- <iframe id="loadcomprweagraph" frameBorder="0" src="" width="100%" height="600" class="holds-the-iframe"></iframe>		-->				   




                                                <br /><br />

                                                <!-- Editable table -->
                                                <div class="card">


                                                    <div class="view view-cascade gradient-card-header rgba-black-light" >
                                                        <h5 class="mb-0 font-weight-bold">Areas of Interest</h5>

                                                    </div>

                                                    <div class="card-body">
                                                        <div id="table" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('areaofinterest')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="loadareofinterest"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Area of Interest</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>



                                                            </table>
															</div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Editable table -->


                                                <br /><br /><br />
                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Projects Executed</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add1 float-right mb-3 mr-2" onClick="addprofileextra('projectexecuted')" ><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="loadprojecexecuted"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Project Executed</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,2)"
href="Projectexecuted/deleterow/<?php echo $det['id']; ?>"-->
                                                            </table>
</div>


                                                        </div>
                                                    </div>
                                                </div>




                                                <br /><br /><br />
                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Internship Details</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('internshipdetails')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="loadinternshipdetails"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Internship</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,3)"
href="Internshipdetails/deleterow/<?php echo $det['id']; ?>"-->
                                                            </table>
															</div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <br /><br /><br />
                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Hobbies and Extra curricular</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('hobbiesandextra')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>

<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="loadhobies"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Hobbies and Extra curricular</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,4)"
href="Hobiesandextracurricular/deleterow/<?php echo $det['id']; ?>" 
hobbiesandextra-->
                                                            </table>
</div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br /><br /><br />

                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Electives</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('electives')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="loadelectives"  data-order="[]" style="width:100% !important" >
                                                               <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1">Percentage</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,5)"
href="Electives/deleterow/<?php echo $det['id']; ?>" 
electives-->
                                                            </table>
															</div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <br /><br /><br />
                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Lectures/Courses Attended</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('coursesattended')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>

<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="laodcouseattended"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Lectures/Courses</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,6)"
href="Coursesattended/deleterow/<?php echo $det['id']; ?>" 
coursesattended-->
                                                            </table>
															</div>



                                                        </div>
                                                    </div>
                                                </div>
                                                <br /><br /><br />

                                                <!-- Editable table -->
                                                <div class="card">

                                                    <div class="view view-cascade gradient-card-header blue" >
                                                        <h5 class="mb-0 font-weight-bold">Additional Details</h5>

                                                    </div>
                                                    <div class="card-body">
                                                        <div id="table1" class="table-editable">
                                                            <span class="table-add float-right mb-3 mr-2" onClick="addprofileextra('personaldetails')"><a href="#!" class="text-success"><i
                                                                        class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>

<div class="table-responsive">
                                                            <table class="table table-striped table-bordered table-hover" id="laodaditionaldeatils"  data-order="[]" style="width:100% !important" >
                                                                <thead style="background-color:#D3D3D3">
                                                                    <tr>
                                                                        <th id="a1">Additional Details</th>
                                                                        <th id="a1">Description</th>
                                                                        <th id="a1" >Save</th>
                                                                        <th id="a1" >Delete</th>

                                                                    </tr>
                                                                </thead>


<!--onClick="saveareaofintesdata(<?php echo $det['id']; ?>,7)"
href="Personaldetails/deleterow/<?php echo $det['id']; ?>" 
personaldetails-->
                                                            </table>

</div>


                                                        </div>
                                                    </div>
                                                </div>

   <?php } ?>

        <!--<button type="button" class="btn btn-fb" style="float: right;" onclick="toastr.info('You`r profile has been shared to Industry.');"><i class="far fa-share-square pr-2"  aria-hidden="true"></i>Share</button>-->											 


                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card --></div>


                                    <div class="tab-pane fade" id="panel70" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->

                                        <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">My Targets</h5>
                                                <h5<small>Targets selected will appear here.</small></h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">



                                                <table class="table table-bordered">

                                                    <!-- Table head -->
                                                    <thead style="background-color:#D3D3D3">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>


                                                        </tr>
                                                    </thead>
                                                    <!-- Table head -->

                                                    <!-- Table body -->
                                                    <tbody>

			  <?php 
			  $s=1;
			  foreach($targetexams as $tar)  { ?>
                                                        <tr>


                                                            <td><?php echo $s; ?></td>
                                                            <td style="    text-align: left;"><?php echo $tar['name']; ?></td>

                                                        </tr>

				<?php 
				$s++;
				} ?>

                                                    </tbody>
                                                    <!-- Table body -->
                                                </table>

                                            </div>
                                            <!-- Card content -->






                                        </div>


                                        <br /><br />
                                        <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Target Range</h5>
                                                <h5<small>We recommend that you start with the year of graduation, and finish 2 years from the year of graduation, to help us show you the optimal opportunities.</small></h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <div class="row mb-4">

                                                    <!-- Grid column -->
                                                    <div class="col-lg-4 col-md-12 mb-4">

                                                        <select class="mdb-select md-form"  id="fromyears">
                                                            <option value="" disabled selected>Year from</option>

  <?php for($s= 2019 ; $s<=2030 ; $s++)  { ?>

                                                            <option value="<?php echo $s; ?>"><?php echo $s; ?></option>

  <?php } ?>

                                                        </select>

                                                    </div>
                                                    <!-- Grid column -->
                                                    <div class="col-lg-4 col-md-12 mb-4">

                                                        <select class="mdb-select md-form" id="toyears">
                                                            <option value="" disabled selected>Year to</option>
   <?php for($s= 2019 ; $s<=2030;$s++)  { ?>

                                                            <option value="<?php echo $s; ?>"><?php echo $s; ?></option>

  <?php } ?>
                                                        </select>



                                                    </div>
                                                    <div class="col-lg-4 col-md-12 mb-4">

                                                        <button class="btn blue-gradient" onclick="displaytarghetsbasedonfromandto()">Show</button>


                                                    </div>


                                                </div>



                                                <p id="serchresultytext" style="color:green"></p>





                                                <table class="table table-bordered table-striped mb-0" id="mytargetsstudentresults"  data-order="[]"  >
                                                    <thead style="background-color:#D3D3D3">
                                                        <tr>
                                                            <th id="a1">Name</th>
                                                            <th id="a1">Company</th>
                                                            <th id="a1">Cut off</th>
                                                            <th id="a1">Age (min)</th>
                                                            <th id="a1">Age (max)</th>
                                                            <th id="a1">Month (approximate)</th>
                                                            <th id="a1">Year</th>
                                                           <!-- <th id="a1">Actions</th>-->
                                                        </tr>
                                                    </thead>



                                                </table>		

                                                <!--<button type="button" class="btn  pull-right" onclick="finishatargetcomps()">Preview </button>-->





                                            </div>
                                            <!-- Card content -->






                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="panel80" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Subscribe Events</h5>
                                                <h5<small>The events you have Subscribed will be tick marked here.</small></h5>
                                            </div>
                                            <!-- Card image -->

                                            <div class="card-body card-body-cascade text-center">
 <?php if($usersrole == 3) { ?>	 


                                                <div class="row">


                                                    <!-- First column -->
                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="materialUnchecked1"  value="1" <?php if($event1==1){ echo 'checked="checked"';} ?> onclick="checkboxcheckedforsubs(1)">
                                                                <label class="form-check-label" for="materialUnchecked1">Project Mentor Events</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check"> 
                                                                <input type="checkbox" class="form-check-input" id="materialUnchecked2" value="1" <?php if($event2==1){ echo 'checked="checked"';} ?> onclick="checkboxcheckedforsubs(2)">
                                                                <label class="form-check-label" for="materialUnchecked2">Speaker Events</label>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="materialUnchecked3" value="1" <?php if($event3==1){ echo 'checked="checked"';} ?> onclick="checkboxcheckedforsubs(3)">
                                                                <label class="form-check-label" for="materialUnchecked3">Apprentice Events</label>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="materialUnchecked4" value="1" <?php if($event4==1){ echo 'checked="checked"';} ?> onclick="checkboxcheckedforsubs(4)">
                                                                <label class="form-check-label" for="materialUnchecked4">Company Events</label>
                                                            </div>

                                                        </div>
                                                    </div>




                                                </div>



                                                <div class="row" style="margin-left: -54px !important;">
                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="materialUnchecked5" value="1" <?php if($event5==1){ echo 'checked="checked"';} ?> onclick="checkboxcheckedforsubs(5)">
                                                                <label class="form-check-label" for="materialUnchecked5">Jobs Events</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="md-form mb-0">
                                                            <div class="form-check">

                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>





<?php } ?>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="panel71" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Purchase Details</h5>
                                                <h5<small>The items you have purchased appear here.</small></h5>
                                            </div>
                                            <!-- Card image -->

                                            <div class="card-body card-body-cascade text-center">
	<?php   foreach($getpaymentdetails as $det) {   ?>

                                                <table class="table table-bordered table-striped">

                                                    <thead style="background-color: #2196F3; color: white;">
                                                        <tr >
                                                            <th colspan="2">

                                                                <b> Product : <span style="color:#F8BB33"><?php echo $det['productname']; ?></span></b>
                                                            </th>
                                                        </tr>

                                                    </thead>

                                                    <tbody>







<!--  <tr>

<td>
<b> Product Code :  </b> 
</td>
 <td>
                                                  <?php echo $det['productcode']; ?>
</td>
</tr>

  <tr>

<td>
<b>  Payment ID : </b>
</td>
 <td>
                                                  <?php echo $det['razorpay_payment_id']; ?>
</td>
</tr>

  <tr>

<td>
<b>Order ID :  </b>
</td>
 <td>
                                                  <?php echo $det['razorpay_order_id']; ?>
</td>
</tr>

  <tr> -->

                                                    <td>
                                                        <b>  Order ID : </b>
                                                    </td>
                                                    <td>
                                                  <?php echo $det['merchant_order_id']; ?>
                                                    </td>
                                                    </tr>

                                                    <tr>

                                                        <td>
                                                            <b> Purchase Date and time : </b>
                                                        </td>
                                                        <td>
                                                  <?php echo $det['datetime']; ?>
                                                        </td>
                                                    </tr>

                                                    </tbody>	
                                                </table>	
 <?php } ?>


                                            </div>
                                        </div>
                                    </div>




                                    <div class="tab-pane fade" id="panel66" role="tabpanel" aria-labelledby="pills-profile-tab"> <!-- Card -->
                                        <div class="card card-cascade narrower">

                                            <!-- Card image -->
                                            <div class="view view-cascade gradient-card-header blue">
                                                <h5 class="mb-0 font-weight-bold">Settings</h5>
                                            </div>
                                            <!-- Card image -->

                                            <!-- Card content -->
                                            <div class="card-body card-body-cascade text-center">

                                                <!-- Edit Form -->
                                                <form>
                                                    <!-- First row -->

                                                    <div class="row">

                                                        <!-- First column -->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="form1c" class="form-control" value="Company, inc" disabled="">
                                                                <label for="form1" data-error="wrong" data-success="right" class="active">Company</label>
                                                            </div>
                                                        </div>
                                                        <!-- Second column -->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="form2un" class="form-control">
                                                                <label for="form2" data-error="wrong" data-success="right">Username</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- First row -->

                                                    <!-- First row -->
                                                    <div class="row">
                                                        <!-- First column -->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="form81fn" class="form-control">
                                                                <label for="form81fn" data-error="wrong" data-success="right">First name</label>
                                                            </div>
                                                        </div>

                                                        <!-- Second column -->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="form82lln" class="form-control">
                                                                <label for="form82lln" data-error="wrong" data-success="right">Last name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- First row -->

                                                    <!-- Second row -->
                                                    <div class="row">

                                                        <!-- First column -->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="email" id="form76ed" class="form-control">
                                                                <label for="form76ed">Email address</label>
                                                            </div>
                                                        </div>
                                                        <!-- Second column -->

                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="form77wa" class="form-control">
                                                                <label for="form77wa" data-error="wrong" data-success="right">Website Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Second row -->

                                                    <!-- Third row -->
                                                    <div class="row">

                                                        <!-- First column -->
                                                        <div class="col-md-12">
                                                            <div class="md-form mb-0">
                                                                <textarea type="text" id="form78am" class="md-textarea form-control" rows="3"></textarea>
                                                                <label for="form78am">About me</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Third row -->

                                                    <!-- Fourth row -->
                                                    <div class="row">
                                                        <div class="col-md-12 text-center my-4">
                                                            <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update Account" class="btn btn-info btn-rounded"></span>
                                                        </div>
                                                    </div>
                                                    <!-- Fourth row -->

                                                </form>
                                                <!-- Edit Form -->

                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card --></div>



                                </div> 



                            </div>
                            <!-- Second column -->

                        </div>
                        <!-- First row -->

              <?php /*  <div class="row">
                    <div class="col-lg-12">


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Profile Edit/View
                            </div>
                            
                            <div class="panel-body" style="height:100% !important">
                               
                                <ul class="nav nav-tabs" >
                                    <li class="active" style="background-color:white !important;" ><a href="#home123" data-toggle="tab" id="profileuserid" >Profile</a>
                                    </li>

                                    <li style="background-color:white !important;"><a href="#messages" data-toggle="tab">Edit</a>
                                    </li>

                                    <?php if($usersrole == 2) {  ?>
                                    <li style="background-color:white !important;"><a href="#moreinfo" data-toggle="tab">More Info</a>
                                    </li>
                                    <li style="background-color:white !important;" ><a href="#moreinfostudy" data-toggle="tab" id="profilepreferencesid" >Preferences</a>
                                    </li>
									<li style="background-color:white !important;" ><a href="#bystudentsmodule" data-toggle="tab" id="bystudentsmodule1" >Buy Modules</a>
                                    </li>
									
                                    <?php } ?>

                                </ul>

                              
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home123" style="background-color:white !important;">
                                        <div class="col-md-7 ">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">  <h4 >User Profile</h4></div>
                                                <div class="panel-body" style="height:100% !important">

                                                    <div class="box box-info">

                                                        <div class="box-body">
                                                            <div class="col-sm-6 list-group-item"      style="text-align: right;">
                                                                <div  align="center"> <span id="uploaded_image"></span>	</div>

                                                                <div  align="center" id="originalinmage"> <img alt="User Pic" src="<?php echo Configure::read('MyConf.mainurl'); ?>upload/<?= $photoname; ?>" id="profile_image1" style="height:120px;width:120px" class="img-circle img-responsive"> </div>
                                                                <?= $this->Form->create($user, ['type' => 'file' ,'id' => 'imageUploadForm']); ?>

                                                                 <span style="display:none"><?= $this->Form->control('Change', ['label' => 'Change' ,'type' => 'file','name' => 'file','class' => 'hidden','id' => 'file' ,'style'=>'cursor: pointer !important;border: 1px solid #333333;padding: 1px 1px 1px 1px;background: #0DB5B5;color: white;']); ?> </span>

<br />

<i class="fa fa-fw" aria-hidden="true" title="Copy to use exchange">&#xf0ec</i><a  style="cursor:pointer;text-decoration:none;font-weight:bold" onclick="if (confirm('Are you sure want to upload the image?')) changeuserpic(); return false" >Upload</a> |
 <i class="fa fa-fw" aria-hidden="true" title="Copy to use trash">&#xf1f8</i><a  style="cursor:pointer;text-decoration:none;font-weight:bold" onclick="if (confirm('Are you sure want to delete?')) deleteuserpic(); return false" >Delete</a>


                                                                <?= $this->Form->end(); ?>




                                                                <br>

                                                               
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h4 style="color:#00b1b1;"><?= h($user->fname. " " .$user->lname) ?></h4></span>
                                                                <span><p>
			  <?php if($usersrole == 3 ) {  ?>
                                                                    Institute Admin

                                                                    <?php } else if($usersrole == 4 ) {  ?>
                                                                    Student Group Admin

                                                                    <?php } else if($usersrole == 7 ) {  ?>
                                                                    Facit Panel user

                                                                    <?php } else { ?>

                                                                    Student

                                                                    <?php } ?>

			  </p></span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <hr style="margin:5px 0 5px 0;">
															
															
															
															 <div class="table-responsive table-bordered">
                                        <table class="table">
                                           
                                            <tbody>
                                                <tr>
                                                    <td>First Name:</td>
                                                    <td><?= h($user->fname) ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>Last Name:</td>
                                                    <td><?= h($user->lname) ?></td>
                                                  
                                                </tr>
												
												<?php if($usersrole == 2 ) {  ?>
                                                <tr>
                                                    <td>Date Of Admission:</td>
                                                    <td><?= h($user->admissiondate) ?></td>
                                                   
                                                </tr>
												<?php } ?>
												
												<tr>
                                                    <td>Email:</td>
                                                    <td><?= h($user->email) ?></td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td>Username :</td>
                                                    <td><?= h($user->username) ?></td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td>Gender:</td>
                                                    <td><?= h($user->gender) ?></td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td>Address1:</td>
                                                    <td><?= h($user->address) ?></td>
                                                   
                                                </tr>
												<tr>
                                                    <td>Address2:</td>
                                                    <td><?= h($user->address2) ?></td>
                                                   
                                                </tr>
												<tr>
                                                    <td>City:</td>
                                                    <td><?= h($user->city) ?></td>
                                                   
                                                </tr>
												<tr>
                                                    <td>Pincode:</td>
                                                    <td><?= h($user->pincode) ?></td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td>State:</td>
                                                    <td><?= h($user->state) ?></td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td>Nationality:</td>
                                                    <td>Indian</td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>



                                                            <div class="clearfix"></div>
                                                            <div class="bot-border"></div>

                                                        </div>
                                                       
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="tab-pane fade" id="messages" style="background-color:white !important;">

                                        <div class="panel">

                                            <?= $this->Form->create($user, ['type' => 'file']); ?>
                                            <div class="form-group">
                                                <?= $this->Form->control('fname' ,array('label' => 'First Name :','class' => 'form-control' ,'id' => 'inputName')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('lname' ,array('label' => 'Last Name :','class' => 'form-control' ,'id' => 'inputName1')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('email',array('label' => 'Email :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('username',array('label' => 'User Name :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('userroles_id', ['type' => 'hidden','value' => $usersrole]);  ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('password', array('label' => 'Password :','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile')); ?>
												<em style="font-size: 12px;line-height: 1.0 !important;">Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters. maximum length should be only 14 characters.</em><br />
                                                <input type="checkbox" onclick="showpassword(1)">Show Password
                                            </div>

                                            <div class="form-group">
                                                <?=
				 $this->Form->control('gender', array(
                                                'options' => $options,
                                                'type' => 'select',
                                                'empty' => 'Select the gender',
												'required' => 'required',
                                                'label' => 'Gender : ',
                                                'class' => 'form-control'
                                                )
                                                ); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('address',array('label' => 'Address1 :','class' => 'form-control','id'=>'addstu','required' => 'required')); ?>
                                            </div>

                                            <div class="form-group">
                                                <?= $this->Form->control('address2',array('label' => 'Address2 :','class' => 'form-control','id'=>'addstu1','required' => 'required')); ?>
                                            </div>

                                            <div class="form-group">
											
											
                                                <?= $this->Form->control('city',array('type'=>'text','label' => 'City :','class' => 'form-control','id'=>'citystu','required' => 'required')); ?>
                                            </div>

                                            <div class="form-group">
                                                <?= $this->Form->control('pincode',array('type'=>'text','id'=>'pincodeforstude','label' => 'Pincode :','onkeypress'=>'return isNumber(event)','class' => 'form-control','required' => 'required')); ?>
                                            </div>

                                            <div class="form-group">


                                                <?=
				 $this->Form->control('state', array(
                                                'options' => $indianStates,
                                                'type' => 'select',
                                                'empty' => 'Select the State',
                                                'label' => 'Select the State:',
                                                'required' => 'required',
                                                'class' => 'form-control'
                                                )
                                                ); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('phonenumber',array('label' => 'Phone Number :','onkeypress'=>'return isNumber(event)','id'=>'phpnenumbeforstude','onInput'=>'checkLength(10,this)','class' => 'form-control','required' => 'required' )); ?>
                                            </div>




                                            <?=  $this->Form->button('submit', array('class' => 'btn ' ,'value' => 'Save Details'));  ?>

                                            <?= $this->Form->end(); ?>
                                        </div>



                                    </div>

                                  
                                    <div class="tab-pane fade" id="moreinfo" style="background-color:white !important;">

                                        <div class="panel">

                                            <?= $this->Form->create($user, ['type' => 'file']); ?>

                                            <div class="form-group">
                                                <?= $this->Form->control('regnumber',array('label' => 'University Registration number :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
											
											<div class="form-group">
                                                <?= $this->Form->control('collegeregnumber',array('label' => 'College Registration number :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
											
                                            <div class="form-group">
                                                <?= $this->Form->control('inscoursename',array('label' => 'Institution Course Name :','value'=>$getcoutrsename,'class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('category',array('label' => 'Category Name :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
                                            <div class="form-group">
                                                <?= $this->Form->control('admissiondate',array('label' => 'Date of Admission :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
											
											<div class="form-group">
                                                <?= $this->Form->control('dateofbirth',array('label' => 'Date of Birth :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>

                                            <div class="form-group">
                                                <?= $this->Form->control('scheduleoption',array('label' => 'Schedule Option :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>

                                            <?php if($getcatn == 'Semester wise' ) { ?>
                                            <div class="form-group">
                                                <?= $this->Form->control('courseduration',array('label' => 'Duration of course :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>

                                            <?php } ?>
                                            <div class="form-group">
											
											
                                                <?= $this->Form->control('programenrolled',array('value'=> $pgent,'label' => 'Programs enrolled in ODIN :','class' => 'form-control' ,'disabled' => 'disabled')); ?>
                                            </div>
                                            <?= $this->Form->end(); ?>

                                        </div>



                                    </div>


 <div class="tab-pane fade" id="bystudentsmodule" style="background-color:white !important;">
                                        
	<div class="panel">
	 <div class="row">
		<br />
		
		
		 <div class="col-lg-12">
		 <div class="panel panel-default">
                                
		 <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>
                                                       Modules
                                                      
                                                    </th>
													<th>
                                                      
                                                      
                                                    </th>
													
													   </thead>
                                            <tbody>
											
											<tr class="odd gradeX">
                                                    <td>Module 1/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 1/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 2/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 2/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 3/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 3/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 4/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 4/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 5/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 5/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 6/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 6/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 7/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 7/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												<tr class="odd gradeX">
                                                    <td>Module 8/8</td>
                                                    <td><button type="submit" class="btn " onclick='redirecturlsstudent("<?php echo Configure::read('MyConf.weburlmainsite');?>razor/prod1.php ","Module 8/8")'  style="background-color:#FD8401" >Buy now</button></td>
                                                    
                                                </tr>
												
											
											  </tbody>
                                        </table>
										
										</div>
										</div>
										</div>
										</div>
										</div>
										</div>
 
  

                                    <div class="tab-pane fade" id="moreinfostudy" style="background-color:white !important;">
                                        
	<div class="panel">
	 <div class="row">
		
		<br />
		
		 <div class="col-lg-12">
		 <div class="panel panel-default">
                                <div class="panel-heading">
                                   <b>Study Hours</b>
                                </div>
		 <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>
                                                        Sunday
                                                      
                                                    </th>
													 <th>
                                                        Monday
                                                      
                                                    </th>
													 <th>
                                                        Tuesday
                                                      
                                                    </th>
													 <th>
                                                        Wednesday
                                                      
                                                    </th>
													 <th>
                                                        Thursday
                                                      
                                                    </th>
													 <th>
                                                        Friday
                                                      
                                                    </th>
													 <th>
                                                        Saturday
                                                      
                                                    </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
												 <script>
												 
												 function spinnernumber(a,b)
												 {
													
													 oldValue = document.getElementById(b).value;  
													
													 newVal = 1;
													 if (a == 'up') {
		newVal = parseInt(oldValue) + 1;
		
	
		
		if(newVal == 25)
		{
			return false;
		}
	} else {
		if (oldValue > 1) {
			newVal = parseInt(oldValue) - 1;
		} else {
			newVal = 1;
		}
	}
	
	
	
	if(isNaN(newVal))
		document.getElementById(b).value = 1;
	else
	document.getElementById(b).value = newVal;
												 }
											
</script>
                                                 
												   <?= $this->Form->create($user, array('action' => '/adduserstudyhours')) ?>
                                                    <td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','sunday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
			
				
					<?= $this->Form->control('sunday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'sunday')); ?>
				
				
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','sunday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','monday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
			
				
				<?= $this->Form->control('monday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'monday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','monday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','tuesday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
				
				<?= $this->Form->control('tuesday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'tuesday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','tuesday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','wednesday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
				
				<?= $this->Form->control('wednesday' ,array('type'=>'text','max'=>'24',  'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'wednesday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','wednesday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','thursday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
				
					<?= $this->Form->control('thursday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'thursday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','thursday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','friday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
			
				<?= $this->Form->control('friday' ,array('type'=>'text','max'=>'24',  'readonly' => 'readonly','label' => '','class' => 'form-control text-center' , 'id'=>'friday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','friday');return false;"><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
			<td><div class="input-group number-spinner">
				<span class="input-group-btn">
					<span class="btn " data-dir="dwn" onClick="spinnernumber('down','saturday');return false;"><span class="glyphicon glyphicon-minus"></span></span>
				</span>
				
					<?= $this->Form->control('saturday' ,array('type'=>'text','max'=>'24', 'readonly' => 'readonly', 'label' => '','class' => 'form-control text-center' , 'id'=>'saturday')); ?>
				<span class="input-group-btn">
					<span class="btn " data-dir="up" onClick="spinnernumber('up','saturday');return false;" ><span class="glyphicon glyphicon-plus"></span></span>
				</span>
			</div></td>
		
                                                   
                                                </tr>
												
				
												  </tbody>
                                        </table>
										
										<div class="form-group">
																	<button type="submit" class="btn " style="margin-left: 9px;" >Save</button>
				<?= $this->Form->end(); ?>
										
									</div>
												
												</div>
												</div>
		  
			  
			  </div> 
			 	
			
				
				</div> 
			  
</div>



									   </div>

                                   
									 
									     
						
						
					

                                   

                                </div>
                            </div>
                         
                        </div>
                      

                    </div>
                </div>  <?php */ ?>






                    </div>
                    <!--<div class="modal-footer">
                       <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                   </div>-->
                </div>

            </div>
        </div>


        <div id="mymodalexamcomps" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="mymodalexamcomps1" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;"  class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" href="https://sites.google.com/xlanz.com/odin-help" target="_blank"><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="mtitle2"></h4>
                    </div>
                    <div class="modal-body" style="padding: 0 !important;">

                        <br />


                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body" style="height:100%">
                                    <!-- Nav tabs -->

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

   <li class="nav-item">
    <a class="nav-link active"  onClick="displaymodulestype()"  id="baselinecompnew-tab" data-toggle="tab" href="#baselinecompnew" role="tab" aria-controls="baselinecompnew"
      aria-selected="false">Modules</a>
  </li>

<?php if(Configure::read('Learningplan.modulecomps') == 1) { ?>

                                        <li class="nav-item">
                                            <a class="nav-link"  onClick="loadmodulesforstudents()"  id="baselinecomp-tab" data-toggle="tab" href="#baselinecomp" role="tab" aria-controls="baselinecomp"
                                               aria-selected="false">Modules Competencies</a>
                                        </li>
<?php } ?>

<?php if(Configure::read('Learningplan.addoncomps') == 1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onClick="addonmoduleslist()"  id="addoncoursescom-tab" data-toggle="tab" href="#addoncoursescom" role="tab" aria-controls="addoncoursescom"
                                               aria-selected="false">Add-On Courses Competencies</a>
                                        </li>
										<?php } ?>
										
										<?php if(Configure::read('Learningplan.targetcomps') == 1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" id="home-tab" onClick="exampscompfr()" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                               aria-selected="true">Target Competencies</a>
                                        </li>

<?php } ?>




<?php if(Configure::read('Learningplan.consolidatedcomps') == 1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" onClick="learningplaconsolida()"  id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                               aria-selected="false">Consolidated for Target Competencies</a>
                                        </li>
<?php } ?>



                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content" id="myTabContent">


                                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="table-responsive">


                                            <table class="table table-striped table-bordered table-hover" id="examcompsnormal"  data-order="[]"  width="100%" >
                                               <thead style="background-color:#D3D3D3">
                                                    <tr>
                                                        <th>Exam</th>

                                                        <th>Lesson</th>
                                                        <th id="levelv">Level</th>


														   <?php if($getcatn == 'Semester wise' ) { ?>
                                                        <th id="scorev" >Action</th>
														   <?php } ?>






                                                    </tr>
                                                </thead>

                                            </table>

</div>

                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


<div class="table-responsive">

                                            <table class="table table-striped table-bordered table-hover" id="examcompsconsolidated"  width="100%" data-toggle="table"
                                                   data-search="true"
                                                   data-filter-control="true" 
                                                   data-show-export="true"
                                                   data-click-to-select="true" data-order="[]" >
                                                <thead style="background-color:#D3D3D3">
                                                    <tr>


                                                        <th>Lesson</th>
                                                        <th>Level</th>


<!-- <th id="scorev" >Skip</th>-->

                                                        <th id="scorev">Action</th>










                                                    </tr>
                                                </thead>

                                            </table>
											</div>


                                        </div>
										
													   <div class="tab-pane fade show active" id="baselinecompnew" role="tabpanel" aria-labelledby="baselinecomp-tab">
										   
										   <div class="table-responsive">
										 <table class="table table-striped table-bordered table-hover" id="modulestableztypess"  data-order="[]" width="100%"  >
                                            <thead style="background-color:#D3D3D3">
                                                <tr>
                                                    <th>Module</th>
													
													   <th id="levelv">Description</th>
													 	 <th id="levelv">Type</th>
														  <th id="scorev" ></th>
														
														  
														
                                                    
                                                </tr>
                                            </thead>
											
											  </table>
											  </div>
										   </div>

                                        <div class="tab-pane fade" id="baselinecomp" role="tabpanel" aria-labelledby="baselinecomp-tab">
<div class="table-responsive">

                                            <table class="table table-striped table-bordered table-hover" id="modulestablez"  data-order="[]"  width="100%" >
                                                <thead style="background-color:#D3D3D3">
                                                    <tr>
                                                        <th>Exam</th>

                                                        <th>Lesson</th>
                                                        <th id="levelv">Level</th>
                                                        <th id="scorev" >Skip</th>

                                                        <th id="scorev" >Action</th>


                                                    </tr>
                                                </thead>

                                            </table>
											</div>
                                        </div>
                                        <div class="tab-pane fade" id="addoncoursescom" role="tabpanel" aria-labelledby="addoncoursescom-tab">
<div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="modulestablezaddon"  data-order="[]"  width="100%" >
                                                <thead style="background-color:#D3D3D3">
                                                    <tr>
                                                        <th>Exam</th>

                                                        <th>Lesson</th>
                                                        <th id="levelv">Level</th>
                                                        <th id="scorev" >Skip</th>
                                                        <th id="scorev" >Action</th>


                                                    </tr>
                                                </thead>

                                            </table>
											</div>
                                        </div>


                                        <!---------------------------------------- comp area *******************---->

                                        <!--<div class="tab-pane fade in active" style="background-color: var(--main-color) !important;" id="competencyarea">
                                        
                                        <br />
                                        
                                        <table class="table table-striped table-bordered table-hover" id="compreaadata"  data-toggle="table"
data-search="true"
data-filter-control="true" 
data-show-export="true"
data-click-to-select="true" >
    <thead>
        <tr>
           
                                                                
                                                                   <th>Name</th>
                                                                         <th>Description</th>
                                                             <th>Initial Baseline</th>
                                                                         <th>Hours Total</th>
                                                                         <th>Hours Pending</th>
                                                                         
                                                                         
                                                                        
                                                                         <th>Current Competency</th>
                                                                        
            
        </tr>
    </thead>
   
</table>
                                        
 
 </div>-->

                                        <!---------------------------------------- end of comp area *******************---->



                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
        <!--<p>Some text in the modal.</p>-->



                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>


													<div id="listallgroupsandcomscomsac" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Manage My Academic Targets</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">

                        
  <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="loadtargetsforstudentssac" >
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                       
                                        <th >Course(s)	</th>
                                        <th id="levelv">Topic Name</th>
                                     

                                        <th id="levelv">Description</th>
										 <th id="levelv">Marks Card</th>
                                       

                                       
 <th id="levelv">Action</th>


                                    </tr>
                                </thead>

                            </table>

</div>
                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		



        <div id="learningmodules" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="lllpalalmo" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Learning Modules</h4>
                    </div>
                    <div class="modal-body">
                      <!--<p>Some text in the modal.</p>-->
                        <style>

                            .steps1 {
                                /*width: 500px;*/
                                box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3);
                                background-color: #eeeeee;
                                padding: 24px 0;
                                position: relative;
                                margin: auto;
                                height: 695px;
                                overflow: auto;


                            }

                            .steps1::before {
                                content: '';
                                position: absolute;
                                top: 0;
                                height: 24px;
                                width: 1px;
                                background-color: rgba(0, 0, 0, 0.2);
                                left: calc(50px / 2);
                                z-index: 1;
                            }

                            .steps1::after {
                                content: '';
                                position: absolute;
                                height: 13px;
                                width: 13px;
                                background-color: var(--primary-color);
                                box-shadow: 0px 0px 5px 0px var(--primary-color);
                                border-radius: 15px;
                                left: calc(50px / 2);
                                /* bottom: 24px;*/
                                transform: translateX(-45%);
                                z-index: 2;

                            }

                            .step1 {
                                padding: 0 20px 24px 50px;
                                position: relative;
                                transition: all 0.4s ease-in-out;
                                background-color: #eeeeee;

                            }

                            .step1::before {
                                content: '';
                                position: absolute;
                                height: 25px;
                                width: 25px;
                                background-color: rgb(198, 198, 198);
                                border-radius: 15px;
                                left: calc(50px / 2);
                                transform: translateX(-45%);
                                z-index: 2;
                            }

                            .step1::after {
                                content: '';
                                position: absolute;
                                height: 100%;
                                width: 1px;
                                background-color: rgb(198, 198, 198);
                                left: calc(50px / 2);
                                top: 0;
                                z-index: 1;
                            }

                            .step1.minimized {
                                background-color: #eeeeee;
                                transition: background-color 0.3s ease-in-out;
                                cursor: pointer;
                            }

                            .header {
                                user-select: none;
                                font-size: 16px;
                                color: #464646;
                                font-weight: bold;
                            }

                            .subheader {
                                user-select: none;
                                font-size: 14px;
                                color: rgba(0, 0, 0, 0.4);
                            }

                            .step-content {
                                transition: all 0.3s ease-in-out;
                                overflow: hidden;
                                position: relative;
                            }

                            .step.minimized > .step-content {
                                height: 0px;
                            }

                            .step-content.one1 {
                                height: auto;
                                width: 100%;
                                /*background-color: rgba(0, 0, 0, 0.05);*/
                                border-radius: 4px;
                                font-size: 14px;
                                left: -17px;

                                text-align: justify;
                            }


                            .step-content.two1 {
                                height: auto;
                                width: 100%;
                                /*background-color: rgba(0, 0, 0, 0.05);*/
                                border-radius: 4px;
                                font-size: 14px;
                                left: -17px;

                                text-align: justify;
                            }
                            .step-content.three1 {
                                height: 490px;
                                width: 100%;
                                /*background-color: rgba(0, 0, 0, 0.05);*/
                                border-radius: 4px;
                                font-size: 14px;
                                left: -17px;

                                text-align: justify;
                            }

                            .step-content.four1 {
                                height: 203px;
                                width: 100%;
                                /*background-color: rgba(0, 0, 0, 0.05);*/
                                border-radius: 4px;
                                font-size: 14px;
                                left: -17px;

                                text-align: justify;
                            }






                            .next-btn {
                                position: absolute;

                                border: 0;
                                padding: 5px 10px;
                                border-radius: 4px;
                                background-color: red;
                                box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
                                color: #FFF;
                                transition: background-color 0.3s ease-in-out;
                                cursor: pointer;
                                transform: translate(-50%, -50%);
                            }

                            .close-btn {
                                position: absolute;
                                /*  top: 50%;
                                  left: 50%;*/
                                border: 0;
                                padding: 5px 10px;
                                border-radius: 4px;
                                background-color: rgb(255, 0, 255);
                                box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
                                color: #FFF;
                                transition: background-color 0.3s ease-in-out;
                                cursor: pointer;
                                transform: translate(-50%, -50%);
                            }

                            /* Irrelevant styling things */
                            .close-btn:hover {
                                background-color: rgba(255, 0, 255, 0.6);
                            }

                            .close-btn:focus {
                                outline: 0;
                            }

                            .next-btn:hover {
                                background-color: rgba(255, 0, 0, 0.6);
                            }

                            .next-btn:focus {
                                outline: 0;
                            }

                            .step.minimized:hover {
                                background-color: rgba(0, 0, 0, 0.06);
                            }

                        </style>


   <div class="steps1" id="laefvsadfdsdsDSdsjknew">
	   
	     <div class="step"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">1</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Lesson</div>
      <!--<div class="subheader">Hopefully this looks cool</div>-->
    </div>
    <div class="step-content one1">
	
         <p>Lessons teach you Foundations, Fundamentals, details, tips and techniques. It is important that you give enough attention to these so that you will build necessary and sufficient skills to solve the problems.</p>

                                   <!-- <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Lesson(s)</th>


                                                <th>Lesson(s)</th>

                                            </tr>
                                        </thead>
                                        <tbody id="learningmods">



                                        </tbody>
                                    </table>-->
									
									<div id="loadlessonstaus22"></div>
									
									<div class="table-responsive">
									
									         <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Chapter(s)</th>


                                                <th>Chapter(s)</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaychaptersoflession22">



                                        </tbody>
                                    </table>
									</div>
									
									
									

                            
	
  
    </div>
  </div>
	   
	   </div>
	 
			   <div class="steps1" id="laefvsadfsjknew">
	   
	    <div class="step"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">1</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Test Pack</div>
     
    </div>
    <div class="step-content three1">
	<p>Mock Tests are model tests of the actual exams that follows the exam pattern and is bound by the time.
</p>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
													
													  <th>Completion Status</th>
														 <th>Mock Test</th>
                                                          <th>Score</th>
                                                </tr>
                                            </thead>
                                          
												    <tbody id="learningmods200">
											
											
												
												   </tbody>
												     </table></div>
      <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 90%;">Close</button>
    </div>
  </div>
		
		</div>


                        <div class="steps1" id="laefvsadfsjk">
                            <div class="step"><span style="margin-left: -28px;
                                                    z-index: 100000000;
                                                    color: green;
                                                    position: relative;
                                                    font-weight: bold;">1</span>
                                <div class="step-header">
                                    <div class="header" style="margin-top: -23px;">Progress</div>
                                    <!--<div class="subheader">Hopefully this looks cool</div>-->
                                </div>
                                <div class="step-content four1">

                                    <iframe id="loadurlforgraph" frameBorder="0" width="100%" height="200" class="holds-the-iframe"></iframe>

                                    <button class="next-btn btn " style="position: relative;margin-top:-23px;left: 85%;">Next</button>
                                </div>
                            </div>
                            <div class="step minimized"><span style="margin-left: -28px;
                                                              z-index: 100000000;
                                                              color: green;
                                                              position: relative;
                                                              font-weight: bold;">2</span>
                                <div class="step-header">
                                    <div class="header" style="margin-top: -23px;">Lesson</div>
                                    <!--<div class="subheader">Hopefully this looks cool</div>-->
                                </div>
                                <div class="step-content one1">
                                    <p>Lessons teach you Foundations, Fundamentals, details, tips and techniques. It is important that you give enough attention to these so that you will build necessary and sufficient skills to solve the problems.</p>

                                   <!-- <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Lesson(s)</th>


                                                <th>Lesson(s)</th>

                                            </tr>
                                        </thead>
                                        <tbody id="learningmods">



                                        </tbody>
                                    </table>-->
									
									<div id="loadlessonstaus"></div>
									<div class="table-responsive">
									         <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Chapter(s)</th>


                                                <th>Chapter(s)</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaychaptersoflession">



                                        </tbody>
                                    </table>
									</div>
									
									

                                    <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 85%;">Next</button>
                                </div>
                            </div>
                            <div class="step minimized"><span style="margin-left: -28px;
                                                              z-index: 100000000;
                                                              color: green;
                                                              position: relative;
                                                              font-weight: bold;">3</span>
                                <div class="step-header">
                                    <div class="header" style="margin-top: -23px;">Practice Test/Assignment</div>

                                </div>
                                <div class="step-content two1">
                                    <p>Practice tests test your knowledge and help you to apply the skills learned. These tests are not timed and you can review your answers and also understand the solutions provided by the content developer.
                                    </p>
									<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Practice Test/Assignment(s)</th>

                                                <th>Completion Status</th>
                                                <th>Practice Test/Assignment(s)</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>

                                        <tbody id="learningmods1">



                                        </tbody>
                                    </table>
									</div>

                                    <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 85%;">Next</button>
                                </div>
                            </div>






                            <div class="step minimized"><span style="margin-left: -28px;
                                                              z-index: 100000000;
                                                              color: green;
                                                              position: relative;
                                                              font-weight: bold;">4</span>
                                <div class="step-header">
                                    <div class="header" style="margin-top: -23px;">Quiz</div>

                                </div>
                                <div class="step-content three1">
                                    <p>Level Quizzes help you to access your level of competency. The quizzes are timed. You can compare and review your answers with the explanation and solutions provided.
                                    </p>
									<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Quiz Level(s)</th>

                                                <th>Completion Status</th>
                                                <th>Quiz Level(s)</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>

                                        <tbody id="learningmods2">



                                        </tbody>
                                    </table>
									</div>
                                    <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 85%;">Close</button>
                                </div>
                            </div>


                            <div id="loadrealquizes"></div>


                        </div>
                                        <!-- <table class="table table-striped table-bordered table-hover" >
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Modules</th>
                                                                                                                                
                                                                                                                                  <th>Completion Status</th>
                                                                                                                                         <th>Lesson/Quiz</th>
                                                                                  <th>Score</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="learningmods">
                                                                                                                
                                                                                                                
                                                                                                                        
                                                                                                                           </tbody>
                                                                                                                           <tbody id="learningmods1">
                                                                                                                
                                                                                                                
                                                                                                                        
                                                                                                                           </tbody>
                                                                                                                            <tbody id="learningmods2">
                                                                                                                
                                                                                                                
                                                                                                                        
                                                                                                                           </tbody>
                                                                </table>-->

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>




        <div id="viewtargetforicc" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Purchase courses</h4>
                    </div>
                    <div class="modal-body">



                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="modules-tab" data-toggle="tab" href="#modules" role="tab" aria-controls="modules"
                                   aria-selected="false">Modules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="addon-tab" data-toggle="tab" href="#addon" role="tab" aria-controls="addon"
                                   aria-selected="true">Add-On Courses</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="addon" role="tabpanel" aria-labelledby="addon-tab">

                <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example52">
                                          <thead>
                                              <tr>
                                                                                              
                                                  <th id="a1">Name</th>
                                                                                                       <th id="a1">Description</th>
                                                                                                      
                                                                                                        <th id="a1">Category</th>
                                                                                                         <th id="a1">Price</th>
                                                                                                        
                                                                                                         <th id="a1"></th>
                                                                                                      
                                                                                                       
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                                                              
                                      </table>-->

                                <iframe  id="displayamodiulescourses1" class="holds-the-iframe" width="100%" height="800" frameBorder="0"   ></iframe>


                            </div>
                            <div class="tab-pane fade show active" id="modules" role="tabpanel" aria-labelledby="modules-tab">



                                <iframe  id="displayamodiulescourses" class="holds-the-iframe500" width="100%" height="800" frameBorder="0"    ></iframe>


                                <!--   <div class="row">-->

<?php /*foreach($disaplyallmodulecourses['data'] as $allmodulesdis) { ?>
          <!-- Grid column -->
          <div class="col-xl-3 col-md-3 mb-xl-0 mb-4" style="margin-bottom: 46px!important;
">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <i class="fas fa-shopping-cart warning-color mr-3 z-depth-2"></i>
                <div class="data">
                  <p class="text-uppercase"><?php echo $allmodulesdis['name']; ?></p>
                  <h4 class="font-weight-bold dark-grey-text">₹<?php echo $allmodulesdis['price']; ?></h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                
                <p class="card-text"></p>
				
				  <a class="btn btn-unique" style="padding: 10px 10px 10px 10px;background-color:#454545 !important" onclick="displaydetailsforthemoduels(<?php echo $allmodulesdis['id']; ?>,'<?php echo $allmodulesdis['name']; ?>')" >Details</a>
						 <?php echo $allmodulesdis['bynowbuttn']; ?>
				
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->
		  
		  <?php }*/ ?>

                                <!--</div>-->

 <!--<iframe  id="displayamodiulescourses" width="100%" height="800" frameBorder="0" class="holds-the-iframe" ></iframe>-->

                <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example52modules">
                                          <thead>
                                              <tr>
                                                                                              
                                                  <th id="a1">Name</th>
                                                                                                       <th id="a1">Description</th>
                                                                                                                 <th id="a1">Price</th>
                                                                                                      
                                                                                                        
                                                                                                         <th id="a1"></th>
                                                                                                      
                                                                                                       
                                                  
                                              </tr>
                                          </thead>
                                          <tbody>
                                                                              
                                      </table>-->


                            </div>








<!--<script>
$(document).ready(function() {
$('#dataTables-example52').DataTable({
responsive: true
});
});
</script>-->	 

                        </div>
                        <!--<div class="modal-footer">
                          <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                        </div>-->
                    </div>

                </div>
            </div>
        </div>


        <div id="targetsuggestionstudent" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="recommedtagets">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title" >Target Recommender</h4>-->

                        <h4 class="modal-title" >Recommended Targets</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="mytargetsstudent"  data-order="[]"  >
                            <thead style="background-color:#D3D3D3">

                                <tr>
                                    <th id="levelv">Eligibility</th>
                                    <th id="levelv" style="width: 18% !important;">Suitability Rank</th>
                                    <th id="levelv">Competency</th>
                                    <th id="levelv">Exam / Target Name</th>
                                    <th id="levelv">Company Name</th>
                                    <th id="levelv">Cut off %</th>
                                    <th id="levelv">Age (min)</th>
                                    <th id="levelv">Age (max)</th>

                                    <th id="levelv">Month (approximate)</th>
                                    <th id="levelv">Year</th>

                                    <th id="levelv" style="width: 18% !important;">Actions</th>



                                </tr>
                            </thead>



                        </table>
</div>						
                        <button type="button" class="btn  pull-right" onclick="finishatargetcomps()">Preview </button>

                        <!--	
                                
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
aria-controls="pills-home" aria-selected="true">My Clusters</a>
</li>

<li class="nav-item">
<a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab"
aria-controls="pills-messages" aria-selected="false">My Companies</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab"
aria-controls="pills-settings" aria-selected="false">My Industries</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
aria-controls="pills-profile" aria-selected="false">My Targets</a>
</li>
</ul>
                                
                                <br />


<div class="tab-content pt-2 pl-1" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<div class="table-responsive">
   <table class="table table-striped table-bordered table-hover" id="myclustersstudent"  data-order="[]"  >
<thead>
<tr>
<th id="a1">Name</th>
        <th id="a1">Description</th>
        <th id="a1">Market Trend</th>
        <th id="a1">Market Size</th>

</tr>
</thead>



</table>	
</div>	
</div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
     <div class="table-responsive">
	 <table class="table table-striped table-bordered table-hover" id="mytargetsstudent"  data-order="[]"  >
<thead>

 <tr>
        <th id="levelv">Eligibility</th>
         <th id="levelv" style="width: 18% !important;">Suitability Rank</th>
         <th id="levelv">Competency</th>
<th id="levelv">Exam / Target Name</th>
                <th id="levelv">Company Name</th>
                  <th id="levelv">Cut off %</th>
                   <th id="levelv">Age (min)</th>
                   <th id="levelv">Age (max)</th>
                   
                   <th id="levelv">Month (approximate)</th>
                   <th id="levelv">Year</th>
                
<th id="levelv" style="width: 18% !important;">Actions</th>
                


</tr>
</thead>



</table>		

</div>
           
 <button type="button" class="btn  pull-right" onclick="finishatargetcomps()">Preview </button>

</div>

                                          <div class="tab-pane fade" id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                                 <div class="table-responsive">       
     <table class="table table-striped table-bordered table-hover" id="mycompnaiessstudent"  data-order="[]"  >
<thead>
<tr>
<th id="a1">Name</th>
        <th id="a1">Location</th>
        <th id="a1">No of Employees</th>
        <th id="a1">Size</th>
        <th id="a1">Ownership</th>

</tr>
</thead>



</table>	
</div>	
</div>

                                                  <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
                           <div class="table-responsive">             
     <table class="table table-striped table-bordered table-hover" id="myindustriessstudent"  data-order="[]"  >
<thead>
<tr>
<th id="a1">Name</th>

        <th id="a1">Description</th>
        

</tr>
</thead>



</table>	
</div>	
</div>
</div> -->







                    </div>

                </div>

            </div>
        </div>
        <div id="targetmodalforstudentselected" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="lisofseelcte" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title" >Target Recommender</h4>-->

                        <h4 class="modal-title" >Selected Targets</h4>
                    </div>
                    <div class="modal-body">

<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="studentcompetencieslist"  data-order="[]"  >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Target Name</th>
                                    <th id="a1">Company Name</th>

                                </tr>
                            </thead>



                        </table>
</div>						
                        <br />

                        <em style="font-size: 15px;line-height: 1.0 !important;">* Close this window to return to Targets page.</em><br />	
                        <em style="font-size: 15px;line-height: 1.0 !important;">* Once confirmed, this action cannot be undone.</em><br />					



                        <!-- <button type="button" class="btn  pull-right" onclick="if (confirm('This action cannot be undone. Are you sure want to proceed?')) finishatargetcompsfinsish(); return false" >Confirm </button>-->

                        <button type="button" class="btn  pull-right" onclick="finishatargetcompsfinsish();
                                return false" >Save & close </button>





                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>
		

		
        <div id="targetmodalforstudent" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="listofomsps">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title" >Target Recommender</h4>-->

                        <h4 class="modal-title" id="compnamesforstud" ></h4>
                    </div>
                    <div class="modal-body">

                        <section class="mb-5" id="showcompsh">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                        <p style="font-size: 22px;"><b style="color:#2368AB">Overall Target Baseline Score  : </b><span id="overalltagetsection"></span></p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>

<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="studentcompetencies"  data-order="[]"  >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Name</th>
                                    <th id="a1">Level</th>
                                    <th id="a1" >Topics</th>
                                    <th id="a1" >Hours Total</th>
                                    <th id="a1" >Hours Pending</th>

                                    <th id="a1" >Current Target Baseline</th>



                                </tr>
                            </thead>



                        </table>
</div>						












                    </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>


        <div id="comparerepro" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Competency Area</h4>
                    </div>
                    <div class="modal-body">

                        <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 25px;"><span  style="color:#00509E">Overall Foundation Baseline Score  : </span><span id="overalltagetsectionfunda"></span><br />
			 <span style="font-style:italic;font-size:18px"> (This score indicates your starting point with respect to your selected target) </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
<div class="table-responsive">


                        <table class="table table-striped table-bordered table-hover" id="compreaadata"  data-toggle="table"
                               data-search="true"
                               data-filter-control="true" 
                               data-show-export="true"
                               data-click-to-select="true"  width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>


                                    <th>Name</th>
                                    <th id="scorev" >Description</th>
                                    <th id="scorev">Initial Baseline</th>
                                    <th id="scorev">Hours Total</th>
                                    <th id="scorev">Hours Pending</th>



                                    <th id="scorev">Current Competency</th>


                                </tr>
                            </thead>

                        </table>

</div>










                    </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

<div id="allcompsdoaply" class="modal fade right" role="dialog">
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >Competency</h4>
            </div>
            <div class="modal-body">
			
										<ul class="nav nav-tabs" id="myTabnewc" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home88-tab" data-toggle="tab" href="#home88" role="tab" aria-controls="home88"
      aria-selected="true">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile88-tab" data-toggle="tab" href="#profile88" role="tab" aria-controls="profile88"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewcContent">
  <div class="tab-pane fade show active" id="home88" role="tabpanel" aria-labelledby="home88-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/competency/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile88" role="tabpanel" aria-labelledby="profile88-tab">
  <div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="allcompstable"  data-order="[]"  >
                    <thead style="background-color:#D3D3D3">
                    <tr>
                        
                        <th>Name</th>
                        <th id="tdes">Description</th>
						<th id="tdes">Topics</th>




                    </tr>
                    </thead>



                </table>
				</div>
  </div>
 
</div>
			

</div>
            <!-- <!--<div class="modal-footer">
                <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
            </div>-->
        </div>

    </div>
</div>

        <div id="topicsdoaply" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="dispalytopoicslis">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Topics</h4>
                    </div>
                    <div class="modal-body">
<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="topicstable"  data-order="[]"  >
                           <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th>Competency area</th>
                                    <th>Name</th>
                                    <th id="tdes">Description</th>




                                </tr>
                            </thead>
                       </table>
					   </div>

                      </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
		
		
		        <div id="displaychapetrs" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Chapter(s)</h4>
                    </div>
                    <div class="modal-body">
<div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" >
                                        <thead style="background-color:#D3D3D3">
                                            <tr>
                                                <th>Name</th>


                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="displaychaptersoflessionnew">



                                        </tbody>
                                    </table>
                       </div>

                      </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

        <div id="studentsmodaladmin" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Students</h4>
                    </div>
                    <div class="modal-body">
<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="stdtableadmin"  data-order="[]" width="100%" >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Reg. Number</th>
                                    <th id="a1">First Name</th>
                                    <th id="a1">Last Name</th>
                                    <th id="a1">Email</th>
                                    <!--<th id="a1">Username</th>
                                    <th> Gender</th>-->
                                    <th> Group</th>
                                    <th> Assignments</th>
									<th> Marks Card</th>
									<th> Attendance</th>
                                    
                                    <th id="a1"> Activity</th>


                                   <!-- <th id="a1">Total modules attempted</th>
                                    <th id="a1">Average Score</th>-->
                                    <th id="a1"> Score Card</th>
                                  <!--  <th id="a1"> Action</th>-->
                                </tr>
                            </thead>



                        </table>

</div>




                    </div>
                    <!--<div class="modal-footer">
                       <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                   </div>-->
                </div>

            </div>
        </div>








			<?php if($usersrole == 3 || $usersrole == 4) {  ?>
        <div id="studentgroup" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Students Group Management</h4>
                    </div>
                    <div class="modal-body">

	  	<?= $this->Form->create($areaofinterest, array('action' => '/addgroup')) ?>

                        <div class="form-group">
                            Students:

                            <select name="userlis[]" multiple="multiple" class="form-control" id="userlis" style="height:300px;display:block !important" required>
		  <?php 
		  
		  if (is_array($userlistsfinal) || is_object($userlistsfinal)) {
		  foreach ($userlistsfinal as $blockdet) { ?>
                                <option value="<?= h($blockdet['id']) ?>"><?= h($blockdet['fname']) ?><?= h($blockdet['lname']) ?>(Email : <?= h($blockdet['email'])  ?>)</option>

		  <?php } } ?>
                            </select>


                        </div>

                        <div class="form-group">
                            Groups:

                            <select name="groupname"  class="form-control" id="groupname" required style="display:block !important">
		  <?php 
		  
		  if (is_array($grouplists) || is_object($grouplists)) {
		  foreach ($grouplists as $blockdet) { ?>
                                <option value="<?= h($blockdet['id']) ?>"><?= h($blockdet['name']) ?></option>

		  <?php } } ?>
                            </select>


                        </div>

                        <button type="submit" class="btn ">Add</button>

												   <?= $this->Form->end(); ?>







                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>


<?php } ?>							


        <div id="admingroup" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Admin Group Management</h4>
                    </div>
                    <div class="modal-body">

	  	<?= $this->Form->create($usergrou, array('action' => '/addgroupadmin')) ?>

                        <div class="form-group">
                            Group admins:

                            <select name="groupadminname"  class="form-control" id="groupadminname" required style="display:block !important">
		  <?php 
		  
		  if (is_array($grouplistsadmin) || is_object($grouplistsadmin)) {
		  foreach ($grouplistsadmin as $blockdet) { ?>
                                <option value="<?= h($blockdet['id']) ?>"><?= h($blockdet['fname']) ?>(<?= h($blockdet['email']) ?>)</option>

		  <?php } } ?>
                            </select>


                        </div>


                        <div class="form-group">
                            Students Group:

                            <select name="userlisgoup[]" multiple="multiple" class="form-control" id="userlisgoup" style="height:300px;display:block !important" required>
		  <?php 
		  
		  if (is_array($grouplists) || is_object($grouplists)) {
		  foreach ($grouplists as $blockdet) { ?>
                                <option value="<?= h($blockdet['id']) ?>"><?= h($blockdet['name']) ?></option>

		  <?php } } ?>
                            </select>


                        </div>



                        <button type="submit" class="btn ">Add</button>

												   <?= $this->Form->end(); ?>







                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

        <div id="myModalinstitute" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Calendar</h4>
                    </div>
                    <div class="modal-body">
					
					
					 <button type="reset" class="btn " onclick='onlineclassmodal()'> ADD ONLINE CLASS</button>
					 
					
					
					
					

                        <button type="submit" class="btn " onclick = 'openmodalboxforadmin("Add Targets", "Add Targets");return false;' >Add Job Test</button>
                     <!--   <button type="reset" class="btn " onclick = 'addsemadmin("Add Targets", "Add Targets");
                                return false;'> Add Semester Event</button> -->
                     <!--   <button type="reset" class="btn " onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>institutecalendar", "Event Management")'> Event Management</button>-->
						
						<button type="reset" class="btn " onclick='onlineclassmodalf2f()'> ADD ON CAMPUS CLASS </button>
						
						<button type="reset" class="btn " onclick='shwoaddeventsnew();return false;'> ADD EVENTS </button>
						<?php  //if ($this->request->getSession()->read('sessionname2') == 3) { ?>
						<button type="reset" class="btn " onclick='shwoaddeventsnewfilters();return false;'>Filter </button>
						<button type="reset" class="btn " id="foletrdbuifckf" style="display:none" onclick='calendarviewforadmin("all","all");return false;'>Clear Filter </button>
						
						 <button type="reset" class="btn " onclick='colorlegndsh()'> EVENT COLOR LEGEND</button>
						<?php //} ?>
			
                        <br /> <br />
<!--<p>Some text in the modal.</p>-->
                        <div id='calendarinst'></div>
                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
		
		        <div id="onlineclassmodal" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Online Class</h4>
                    </div>
                    <div class="modal-body">
	  <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return onlineclasssaveinfo()')) ?>

                       

                        <div class="form-group">
							<b>Title <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'onlineclassname','autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>

                       



                        <div class="form-group">

                            
							<b>Group name <span style="color:red">*</span>:</b> 

                            <select name="groupname"  class="form-control" id="studentsgroupsclass" required style="display:block !important">
							<?php foreach($studentgroups as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                               <?php } ?>

                            </select>                                



                        </div>
					
						<div class="form-group">
		            <b>Start time <span style="color:red">*</span>:</b> 
<?= $this->Form->control('starttime',array('label' => false,'class' => 'form-control startdattime' ,'id' => 'startdattime','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                            <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.startdattime').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
	
});
                                                            </script>

                        </div>
						<div class="form-group">
						<b>End time <span style="color:red">*</span>:</b> 
		    
  <?= $this->Form->control('endtime',array('label' => false,'class' => 'form-control enddattime' ,'id' => 'enddattime','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                          
                                                            <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.enddattime').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
});
                                                            </script>

                        </div>
						
						<div class="form-group">
							<b>Comparea :</b> 
							
							                     <select class="form-control" id="lisddiffcompsnew1" style="display:block !important" onchange="getallthetopisbvf1(this.value)"  searchable="Search here.." >
  

</select>
			

					  </div>
					  
					   <div class="form-group">
							<b>Topic :</b> 
							
							                     <select class="form-control" id="getallthetopisbvf1nnn"  style="display:block !important"  searchable="Search here.." >
  

</select>


			

					  </div>

                        <div class="form-group">
						
		

                            <b>Description <span style="color:red">*</span>:</b> 

                            <textarea rows="4" cols="50"  name="description" class="form-control" id="onlineclassdescription" required ></textarea>



                        </div>

                        <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

        <div id="inscalendartab" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Job Test</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return exameventssave()')) ?>

                       

                        <div class="form-group">
							<b>Exam <span style="color:red">*</span>:</b> 
			
			  <select name="targetexams"  class="form-control" id="targetsins" required style="display:block !important"></select> 
			
                        </div>

             
					
						<div class="form-group">
		            <b>Date & time  of Exam<span style="color:red">*</span>:</b> 
<?= $this->Form->control('starttime',array('label' => false,'class' => 'form-control startdattimeexamee' ,'id' => 'startdattimeexamevents','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                            <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.startdattimeexamee').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
});
                                                            </script>

                        </div>
					   <div class="form-group">
							<b>Event color <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="colorid" required style="display:block !important">
                                <option value="#61B7C8">#61B7C8</option>
                                <!--<option value="green">Green</option>
                                <option value="red">Red</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>-->

                            </select>                      
			
                        </div>

                        <div class="form-group">
						
		

                            <b>Description <span style="color:red">*</span>:</b> 

                            <textarea rows="4" cols="50"  name="description" class="form-control" id="onlineclassdescriptionevents" required ></textarea>



                        </div>

                        <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
        <div id="myModalinstitutesemester" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Semester Event</h4>
                    </div>
                    <div class="modal-body">
	  <?= $this->Form->create($targetexamslist, array('action' => '/tagetaddsem/')) ?>


                        <div class="form-group" id="courseduarionhide">

			<?=	
				 $this->Form->input('courseduration', array(
    'options' => $stdurartion,
    'type' => 'select',
    'empty' => 'Select the Duration of course',
    'label' => 'Duration of course  :',
	'class' => 'form-control',
	'id' => 'courseduration11',
	'required' => 'required',
	'onchange' => 'createslectsemester(this)',
	'style'=>'display:block !important'
	
   )
); ?>

                        </div>

                        <div class="form-group" id="semestershideoption11">
                            <b> Semester:    </b>   
                            <select name="semesterrs"  class="form-control" id="semesterselecs" required  style="display:block !important">


                            </select>    

                        </div>

                        <div class="form-group">
              <?= $this->Form->control('eventtitleadmin' ,array('label' => 'Event title :','class' => 'form-control' ,'id' => 'inputName')); ?>
                        </div>




                        <div class="form-group">
			<?= $this->Form->control('examdatedate',array('id' => 'datepickersem','autocomplete' => 'off','label' => 'Date :','class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>

                        <div class="form-group">
                            <b> Choose Event color:    </b>                       
                            <select name="color"  class="form-control" id="colorid" required style="display:block !important">
                                <option value="purple">Purple</option>
                                <option value="green">Green</option>
                                <option value="red">Red</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>

                            </select>                                



                        </div>

                        <div class="form-group">

                            <b>Description:</b> 

                            <textarea rows="4" cols="50" class="form-control" name="description">
                            </textarea>

                        </div>


                        <script>
//initSample1();
                        </script>



                        <button type="submit" class="btn ">Add</button>

												   <?= $this->Form->end(); ?>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

        <div id="studentsmodal" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Users and Activity</h4>
                    </div>
                    <div class="modal-body">

                       					<ul class="nav nav-tabs" id="myTabnewss" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home00-tab" data-toggle="tab" href="#home00" role="tab" aria-controls="home00"
      aria-selected="true">Student Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile000-tab" data-toggle="tab" href="#profile000" role="tab" aria-controls="profile000"
      aria-selected="false">Activity Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile00-tab" data-toggle="tab" href="#profile00" role="tab" aria-controls="profile00"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewssContent">
  <div class="tab-pane fade show active" id="home00" role="tabpanel" aria-labelledby="home00-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile000" role="tabpanel" aria-labelledby="profile000-tab">
  
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/activity/index.php" ></iframe>
  </div>
  <div class="tab-pane fade" id="profile00" role="tabpanel" aria-labelledby="profile00-tab">
  
   <button type="button" class="btn ">
                            Active Students <span class="badge badge-danger ml-2"><?php echo $usercountget; ?></span>
                        </button>

                        <button type="button" class="btn ">
                            Inactive Students <span class="badge badge-danger ml-2"><?php echo $usercountgetin; ?></span>
                        </button>
<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="stdtable"  data-order="[]"  width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Reg. No</th>
                                    <th id="a1">First Name</th>
                                    <th id="a1">Last Name</th>
                                    <th id="a1">Email</th>
                                    <!--<th id="a1">Username</th>
                                    <th> Gender</th>-->
                                    <th> Group</th>
                                    <!--<th id="a1"> Registered Date</th>-->
                                    <th id="a1"> Status</th>
                                                            <!-- <th id="a1">Total modules attempted</th>
                                                             <th id="a1">Average Score</th>-->
                                    <th id="a1"> Score Card</th>
									<th id="a1"> Activity</th>
									<th id="a1"> Marks Card</th>
									<th id="a1"> Attendance</th>
                                    <th id="a1"> Edit/View</th>

                                    <th id="a1"> Delete Modules/Add-On Course</th>
                                     <th id="a1"> Reset Password</th>
                                   <!-- <th id="a1"> Evaluation for DEP</th>-->
                                </tr>
                            </thead>



                        </table>
						</div>
  </div>
 
</div>









                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>


        <div id="studentsmodalpayment" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Purchased modules</h4>
                    </div>
                    <div class="modal-body">

<div class="table-responsive">


                        <table class="table table-striped table-bordered table-hover" id="listoftablesmodules"  data-order="[]"  width="100%" >
                           <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Product code</th>
                                    <th id="a1">Product Name</th>
                                    <th id="a1">Product Type</th>
                                    <th id="a1">Purchased Date/Time</th>
                                    <th id="a1">Action</th>
                                </tr>
                            </thead>



                        </table>

</div>







                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>




        <div id="edituserfrom" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Students Management</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">


                                <div class="panel panel-default">

                                    <!-- /.panel-heading -->
                                    <div class="panel-body" style="height:100% !important">



                                        <ul class="nav nav-tabs" id="myTab100" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home123456-tab" data-toggle="tab" href="#home123456" role="tab" aria-controls="home123456"
                                                   aria-selected="true">Student Institute Info</a>
                                            </li>


                                        </ul>

                                        <div class="tab-content" id="myTab100Content">


                                            <div class="tab-pane fade show active" id="home123456" role="tabpanel" aria-labelledby="home123456-tab">

                                                <div class="col-md-7 ">

                                                    <div class="panel panel-default">

                                                        <div class="panel-body" style="height:100% !important">

    <?= $this->Form->create($user, array('action' => '/savestudentinfo','onsubmit'=>'return saveusermodulesinfo()')); ?>



                                                            <div class="form-group">

                                                                <label for="inscoursename1">Institution Course :</label>

                                                                <select name="inscoursename" class="form-control" id="inscoursename1" required="required"    style="display: block !important;">
                                                                    <option value="" selected="selected">Select the Course</option>

			   <?php foreach($stcategorycoueses as $cname ) { ?>
                                                                    <option value="<?php echo $cname['graduationcode']; ?>"><?php echo $cname['name']; ?></option>
			   <?php } ?>


                                                                </select>


                                                            </div>




                                                            <div class="form-group">

			<?=	
				 $this->Form->input('scheduleoption', array(
    'options' => $stschedule,
    'type' => 'select',
    'empty' => 'Select the Schedule',
    'label' => 'Schedule Option  :',
	'class' => 'form-control',
	'id' => 'scheduleoption1',
	'required' => 'required',
	'onchange' => 'createslectseme1(this)',
		'style'=>'display: block !important'
   )
); ?>

                                                            </div>




                                                            <div class="form-group" id="moduleslist">
                                                                Modules :
                                                                <select  class="form-control" id="modulesl" style="display: block !important;">


                                                                </select>    

                                                            </div>
                                                            <div class="form-group" id="addoncourselist">
                                                                Add-On Courses
                                                                <select name="addoncourse[]" multiple="multiple" class="form-control" id="addoncourselis" style="display: block !important;">


                                                                </select>    

                                                            </div>





                                                            <input type="hidden" id="useridforrow" name="useridsave" >
                                                            <input type="hidden" id="useridforrowmoodle" name="useridsavemoodle" >
                                                            <input type="hidden" id="productslist" name="productslist" >

                                                            <span id="messagessksk"></span>

				<?= $this->Form->submit('Save', array('class' => 'btn ','id' => 'stdinfosave')); ?>

			  <?= $this->Form->end(); ?> 


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                            <!--  <div class="tab-pane fade" id="studentcal">
                                                                            
                                            <div class="panel">
                                            
                                             <div id='calendarinst'></div>
                                            </div>
                                            </div>
                                            
                                             <div class="tab-pane fade" id="studentexamschedular">
                                                                            
                                            <div class="panel">
                                            
		<?= $this->Form->create($targetexamslist, array('action' => '/tagetadd/')) ?>
                                            
                                             <div class="form-group">
                                                     Select Exam :
                                            
                                                 <select name="targetstudent" multiple="multiple" class="form-control" id="targetstudent" required>
                                               
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                     
                                                     Select Exam date :
                                                     
                                                     
                                                     </div>
	  <?= $this->Form->end(); ?>
                                            
                                            </div>
                                            </div>
                                            -->






                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>






        <div id="profileextradetails1" class="modal fade right" role="dialog">

            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD AREAS OF INTEREST</h4>
                    </div>
                    <div class="modal-body">


	 <?php /*  echo $this->Form->create(null, [
    'url' => [
        'controller' => 'Areaofinterest',
        'action' => 'add'
    ]
]);*/ ?> 

                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'Area of Interest:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1001')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1001')); ?>

                        </div>


                        <input type="hidden" id="useridare1" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(1)">Add</button>

												  <?PHP /* $this->Form->end(); */?> 


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>



        <div id="profileextradetails2" class="modal fade right" role="dialog">
            <div class="modal-dialog" >
                <script>
                    function validatefields1() {
                        var name = $("#projectexecuted100").val();
                        var n = name.replace(/ /g, '');
                        var c = n.replace(/^(&nbsp;)+/g, '');
                        var f = c.replace(/^(<br>)+/g, '');


                        var name1 = $("#projectexecuteddetails100").val();
                        var n1 = name1.replace(/ /g, '');
                        var c1 = n1.replace(/^(&nbsp;)+/g, '');
                        var f1 = c1.replace(/^(<br>)+/g, '');



                        if (f.length == 0) {
                            toastr.error("Please enter the Project Executed:.");
                            return false;
                        } else if (f1.length == 0) {
                            toastr.error("Please enter the Description.");
                            return false;
                        }
                    }
                </script>
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD PROJECTS EXECUTED</h4>
                    </div>
                    <div class="modal-body">




                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'Project Executed:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1002')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','id'=>'decriptionatreaofinterest1002','class' => 'md-textarea form-control')); ?>

                        </div>


                        <input type="hidden" id="useridare2" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(2)">Add</button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>




        <div id="profileextradetails3" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD INTERNSHIP DETAILS</h4>
                    </div>
                    <div class="modal-body">

                        <script>
                            function validatefields2() {
                                var name = $("#internshuop100").val();
                                var n = name.replace(/ /g, '');
                                var c = n.replace(/^(&nbsp;)+/g, '');
                                var f = c.replace(/^(<br>)+/g, '');


                                var name1 = $("#internshipdetyails100").val();
                                var n1 = name1.replace(/ /g, '');
                                var c1 = n1.replace(/^(&nbsp;)+/g, '');
                                var f1 = c1.replace(/^(<br>)+/g, '');

                                if (f.length == 0) {
                                    toastr.error("Please enter the details.");
                                    return false;
                                } else if (f1.length == 0) {
                                    toastr.error("Please enter the details.");
                                    return false;
                                }
                            }
                        </script>



                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'Internship:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1003')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1003')); ?>

                        </div>


                        <input type="hidden" id="useridare3" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(3)">Add</button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

        <div id="profileextradetails4" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <script>
                    function validatefields3() {
                        var name = $("#hobbiesandextra100").val();
                        var n = name.replace(/ /g, '');
                        var c = n.replace(/^(&nbsp;)+/g, '');
                        var f = c.replace(/^(<br>)+/g, '');


                        var name1 = $("#hobbiesandextradescription100").val();
                        var n1 = name1.replace(/ /g, '');
                        var c1 = n1.replace(/^(&nbsp;)+/g, '');
                        var f1 = c1.replace(/^(<br>)+/g, '');

                        if (f.length == 0) {
                            toastr.error("Please enter the details.");
                            return false;
                        } else if (f1.length == 0) {
                            toastr.error("Please enter the details.");
                            return false;
                        }
                    }
                </script>
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD HOBBIES AND EXTRA CURRICULAR</h4>
                    </div>
                    <div class="modal-body">




                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'Hobbies and Extra Carricular:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1004')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1004')); ?>

                        </div>


                        <input type="hidden" id="useridare4" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(4)">Add</button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>





        <div id="profileextradetails5" class="modal fade right" role="dialog">
            <script>
                function validatefields4() {
                    var name = $("#electivesnmame100").val();
                    var n = name.replace(/ /g, '');
                    var c = n.replace(/^(&nbsp;)+/g, '');
                    var f = c.replace(/^(<br>)+/g, '');


                    var name1 = $("#electivesnmamedecription100").val();
                    var n1 = name1.replace(/ /g, '');
                    var c1 = n1.replace(/^(&nbsp;)+/g, '');
                    var f1 = c1.replace(/^(<br>)+/g, '');

                    if (f.length == 0) {
                        toastr.error("Please enter the details.");
                        return false;
                    } else if (f1.length == 0) {
                        toastr.error("Please enter the details.");
                        return false;
                    }
                }
            </script>
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD ELECTIVES</h4>
                    </div>
                    <div class="modal-body">




                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'Percentage:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1005','onkeypress'=>'return fun_AllowOnlyAmountAndDot(this.id);')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1005')); ?>

                        </div>


                        <input type="hidden" id="useridare5" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(5)">Add</button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>







        <div id="profileextradetails6" class="modal fade right" role="dialog">
            <div class="modal-dialog" >
                <script>
                    function validatefields5() {
                        var name = $("#coursesadded100").val();
                        var n = name.replace(/ /g, '');
                        var c = n.replace(/^(&nbsp;)+/g, '');
                        var f = c.replace(/^(<br>)+/g, '');


                        var name1 = $("#colurseaddeddescriotion100").val();
                        var n1 = name1.replace(/ /g, '');
                        var c1 = n1.replace(/^(&nbsp;)+/g, '');
                        var f1 = c1.replace(/^(<br>)+/g, '');

                        if (f.length == 0) {
                            toastr.error("Please enter the details.");
                            return false;
                        } else if (f1.length == 0) {
                            toastr.error("Please enter the details.");
                            return false;
                        }
                    }
                </script>

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD LECTURES/COURSES ATTENDED</h4>
                    </div>
                    <div class="modal-body">




                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'LECTURES/COURSES:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1006')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1006')); ?>

                        </div>


                        <input type="hidden" id="useridare6" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(6)">Add</button>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>






        <div id="profileextradetails7" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADD ADDITIONAL DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <script>
                            function validatefields6() {
                                var name = $("#personaldetails100").val();
                                var n = name.replace(/ /g, '');
                                var c = n.replace(/^(&nbsp;)+/g, '');
                                var f = c.replace(/^(<br>)+/g, '');


                                var name1 = $("#personaldetailsdescription100").val();
                                var n1 = name1.replace(/ /g, '');
                                var c1 = n1.replace(/^(&nbsp;)+/g, '');
                                var f1 = c1.replace(/^(<br>)+/g, '');

                                if (f.length == 0) {
                                    toastr.error("Please enter the details.");
                                    return false;
                                } else if (f1.length == 0) {
                                    toastr.error("Please enter the details.");
                                    return false;
                                }
                            }
                        </script>



                        <div class="form-group">
		<?php      echo $this->Form->control('name', array('label'=>'ADDITIONAL DETAILS:','required' => 'required','class' => 'form-control','id'=>'areaofinterest1007')); ?>

                        </div>
                        <div class="form-group">
		<?php      echo $this->Form->control('description' , array('rows'=>'3','label'=>'Description:','required' => 'required','class' => 'md-textarea form-control','id'=>'decriptionatreaofinterest1007')); ?>

                        </div>


                        <input type="hidden" id="useridare7" name="userid" value="<?php echo $userid; ?>" >




                        <button type="submit" class="btn " onClick="saveareaofinterets(7)">Add</button>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>






        <div id="opencomp" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="openmodalcompany" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Companies</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="loadcomapny" >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                   <!-- <th>Comapny code</th>-->
                                    <th>Name</th>
                                    <th id="d1">Description</th>
                                   <!-- <th id="a1"></th>
                                    <th id="a1"></th>-->

                                </tr>
                            </thead>

                        </table>
</div>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
        <div id="openindustry" class="modal fade right" role="dialog">
            <div class="modal-dialog"  id="industrylisstopen" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Industries</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="loadindustrytable2011">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <!--<th>Industry code</th>-->
                                    <th>Name</th>
                                    <th id="d1">Description</th>
                                <!--    <th id="a1" ></th>
                                    <th id="a1" ></th>-->

                                </tr>
                            </thead>

                        </table>

</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="opentargets" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="modaltargets" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Targets</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover"  id="loadexam1">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th>Target Name</th>
                                    <th>Company Name</th>
                                    <th id="d1">Cut off %</th>
                                    <th>Age (min)</th>
                                    <th>Age (max)</th>
       <!-- <th id="a1"></th>
        <th id="a1"></th>-->


                                </tr>
                            </thead>

                        </table>
</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 



        <div id="learningmodulescomprea" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Baseline and Progress</h4>
                    </div>
                    <div class="modal-body">
                      <!--<p>Some text in the modal.</p>-->
					  <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover"  style="width:100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th>Competency</th>
                                    <th>Minutes</th>
                                    <th>Completion Status</th>
                                    <th>Quiz</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody id="learningmodscomprea">



                            </tbody>

                        </table>
						</div>
						<br /><br />
						
						<div class="table-responsive">
						  <table class="table table-striped table-bordered table-hover"  style="width:100%" id="displayallbaselionedatalist">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th>Total Number of Quizzes</th>
                                    <th>Total Attempts</th>
                                    <th>Pass/Fail</th>
                                    <th>Percentage Completion</th>
                                    <th>Average Grade</th>
                                </tr>
                            </thead>
                            

                        </table>
						</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>



        <div id="loadacdemicdetails" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Academic Details</h4>
                    </div>
                    <div class="modal-body">
                      <!--<p>Some text in the modal.</p>-->
<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="loadacdemicdd"  data-order="[]" style="width:100% !important" >
                            <thead style="background-color:#D3D3D3">
                                <tr>

                                    <th id="a1">SSLC / SSLC + 2/3</th>
                                    <th id="a1">School/College Name</th>

                                    <th id="a1" >Delete</th>

                                </tr>
                            </thead>



                        </table>
</div>
<div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover" id="loadacdemicdd1"  data-order="[]" style="width:100% !important" >

                            <thead >
                                <tr>

                                    <th id="a1">Graduation/Post Graduation</th>
                                    <th id="a1">College Name</th>

                                    <th id="a1" >Delete</th>

                                </tr>
                            </thead>


                        </table>
</div>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
		
		
		        <div id="scorecrddisplayforstudent" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
					<?php if($usersrole == 2) { ?>
                        <a id="scpredocview" style="" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                     <?php } ?>

<?php if($usersrole == 2) { ?>

					 <button type="button"  id="scoreananalidhdjd" style="" class="btn " onclick='redirecturlsstudent1("<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/scoreanalysis/index.php?id=<?php echo $userid; ?>","Score Analysis")'>Score Analysis</button>

<?php } else { ?>
					 <!--<button type="button"  style="position: absolute;left: 384px;top: 5px;" class="btn " onclick='redirectrespectivestudentscore()'>Score Analysis</button>-->


<?php } ?>
					   <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Score Card</h4>
                    </div>
                    <div class="modal-body">
<div class="table-responsive">

                        <table class="table table-striped table-hover table-bordered dt-responsive display nowrap" id="scoredisp"  data-order="[]" width="100%"   >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a11">Topic</th>
									<th id="d1">Quiz Code</th>
									<th id="a11">Quiz Type</th>
                                    <th id="d1">Attempt(s)</th>
                                    <th id="d1">Quiz Duration(Minutes)</th>

                                    <th id="d1">Start Date and Time</th>
                                    <th id="d1">End Date and Time</th>
                                    <th id="d1">Score(%)</th>
                                    <th id="d1">Passing Score(%)</th>

                                    <th id="d1">Time consumed</th>
                                    <th id="d1">Status</th>


                                </tr>
                            </thead>



                        </table>




</div>



                    </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

<?php include('modalboxed.ctp'); ?> 
<?php include('modalboxedpersonlaity.ctp'); ?> 


		        <div id="diagnosticsreports11" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Professional Speakers</h4>
				
                    </div>
                    <div class="modal-body">
					<ul class="nav nav-tabs" id="myTabnew" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home22-tab" data-toggle="tab" href="#home22" role="tab" aria-controls="home22"
      aria-selected="true">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile22-tab" data-toggle="tab" href="#profile22" role="tab" aria-controls="profile22"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewContent">
  <div class="tab-pane fade show active" id="home22" role="tabpanel" aria-labelledby="home22-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/icdashboard/speakerreport/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile22" role="tabpanel" aria-labelledby="profile22-tab">
  
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/users/displayspeakerlist" ></iframe>
  </div>
 
</div>
					
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
			        <div id="diagnosticsreports12" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Projects</h4>
						
                    </div>
                    <div class="modal-body">
					<ul class="nav nav-tabs" id="myTabnewp" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home33-tab" data-toggle="tab" href="#home33" role="tab" aria-controls="home33"
      aria-selected="true">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile33-tab" data-toggle="tab" href="#profile33" role="tab" aria-controls="profile33"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewpContent">
  <div class="tab-pane fade show active" id="home33" role="tabpanel" aria-labelledby="home33-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/icdashboard/projectreport/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile33" role="tabpanel" aria-labelledby="profile33-tab">
  
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/users/displayprojectmentorlist" ></iframe>
  </div>
 
</div>
					
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
		      <div id="diagnosticsreports13" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Internship</h4>
				
                    </div>
                    <div class="modal-body">
<ul class="nav nav-tabs" id="myTabnewi" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home44-tab" data-toggle="tab" href="#home44" role="tab" aria-controls="home44"
      aria-selected="true">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile44-tab" data-toggle="tab" href="#profile44" role="tab" aria-controls="profile44"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewiContent">
  <div class="tab-pane fade show active" id="home44" role="tabpanel" aria-labelledby="home44-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/icdashboard/appproject/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile44" role="tabpanel" aria-labelledby="profile44-tab">
  
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/users/displayapprentice" ></iframe>
  </div>
 
</div>
					
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
			      <div id="diagnosticsreports14" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Off Campus Hiring</h4>
							
                    </div>
                    <div class="modal-body">
					<ul class="nav nav-tabs" id="myTabnewm" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home55-tab" data-toggle="tab" href="#home55" role="tab" aria-controls="home55"
      aria-selected="true">Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile55-tab" data-toggle="tab" href="#profile55" role="tab" aria-controls="profile55" onClick="listofcompanies()"
      aria-selected="false">View Data</a>
  </li>

</ul>
<div class="tab-content" id="myTabnewmContent">
  <div class="tab-pane fade show active" id="home55" role="tabpanel" aria-labelledby="home55-tab">
  <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/icdashboard/jobreport/index.php" ></iframe>
  
  </div>
  <div class="tab-pane fade" id="profile55" role="tabpanel" aria-labelledby="profile55-tab">
  <div class="table-responsive">
     <table class="table table-striped table-bordered table-hover" id="collegelistname" width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <!--<th>Industry code</th>-->
                                    <th id="a1">Company Name</th>

                                    <th id="a1">Action</th>
    <!--    <th id="a1" ></th>
        <th id="a1" ></th>-->

                                </tr>
                            </thead>

                        </table>
						</div>

  </div>
 
</div>
					
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="diagnosticsindustry" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="titlefiorpreferenceindustry"></h4>
                    </div>
                    <div class="modal-body">
                        <iframe  id="iframepreferencesindustry" width="100%" height="800" frameBorder="0" class="holds-the-iframe" ></iframe>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
 <div id="industryconnectmodal" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
                           title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Industry Connect</h4>
                    </div>
                    <div class="modal-body">
                        	 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="homeic-tab" data-toggle="tab" href="#homeic" role="tab" aria-controls="homeic"
      aria-selected="true">Speakers</a>
  </li>
         <li class="nav-item" onclick="displayalllicprom()">
    <a class="nav-link" id="prom-tab" data-toggle="tab" href="#prom" role="tab" aria-controls="prom"
      aria-selected="false">Project Mentors</a>
  </li>
         <li class="nav-item" onclick="displayalllicappren()">
    <a class="nav-link" id="appren-tab" data-toggle="tab" href="#appren" role="tab" aria-controls="appren"
      aria-selected="false">Apprentice</a>
  </li>
         
  <li class="nav-item" onclick="listofcompaniesicic()">
    <a class="nav-link" id="profileic-tab" data-toggle="tab" href="#profileic" role="tab" aria-controls="profileic"
      aria-selected="false">Jobscan</a>
  </li>
  
   <li class="nav-item" onclick="listofappliedjobs()">
    <a class="nav-link" id="appliedjobs-tab" data-toggle="tab" href="#appliedjobs" role="tab" aria-controls="appliedjobs"
      aria-selected="false">My Applied Jobs</a>
  </li>
  
   <li class="nav-item" onclick="listofappliedprojects()">
    <a class="nav-link" id="appliedproject-tab" data-toggle="tab" href="#appliedproject" role="tab" aria-controls="appliedproject"
      aria-selected="false">My Applied Projects/Apprenticeship</a>
  </li>
  
 
</ul>
                        
                        <div class="tab-content" id="myTabContent">


                            <div class="tab-pane fade" id="appliedproject" role="appliedproject" aria-labelledby="appliedproject-tab">
							<div class="table-responsive">
     <table class="table table-striped table-bordered table-hover" id="appliedprojects" width="100%">
                         <thead style="background-color:#D3D3D3">
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th id="a1">Desctription</th>
                          
							<th id="a1">Definition</th>
                       
<th id="a11">Type</th>
<th id="a1">Action</th>

                        </tr>
                        </thead>

                    </table>
					</div>
                            </div>
                            
                            <div class="tab-pane fade" id="appliedjobs" role="appliedjobs" aria-labelledby="appliedjobs-tab">
							<div class="table-responsive">
                                 <table class="table table-striped table-bordered table-hover" id="appliedjblist" width="100%">
                         <thead style="background-color:#D3D3D3">
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th id="a1">Company Name</th>
                          
							<th id="a1">Job Title</th>
                       
<th id="a1">Job description</th>
<th id="a1">Job end date</th>

<th id="a1">Applied Date</th>
<th id="a1">Status</th>
<th id="a1">Processing Date</th>
                        </tr>
                        </thead>

                    </table>
					</div>
                            </div>
                            
                            <div class="tab-pane fade show active" id="homeic" role="tabpanel" aria-labelledby="homeic-tab">
                                  <style>
  #a1 select{
display: none !important;
}
#a11 select{
display: block !important;
}
  </style>
  
  <div class="table-responsive">
   
   <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead style="background-color:#D3D3D3">
    <tr>
      <?php /*<th class="th-sm" id="a1">
      </th> */ ?>
      <th class="th-sm" id="a1">First Name
      </th>
        <th class="th-sm" id="a1">Last Name
      </th>
      <th class="th-sm" id="a1">Industry
      </th>
        <th class="th-sm" id="a1">Expertise
      </th>
        <th class="th-sm" id="a1">Years of expertise
      </th>
        <th class="th-sm" id="a1">Location
      </th>
      <!--<th class="th-sm" id="a1">Contact Details
      </th>-->
      <th class="th-sm" style="width:20px" id="a1">
      </th>
	  <th class="th-sm" id="a1">
      </th>
     
    </tr>
  </thead>
</table>
</div>
                                
                            </div>
                            
                            <div class="tab-pane fade" id="prom" role="tabpanel" aria-labelledby="prom-tab">
							<div class="table-responsive">
                                 <table id="displayalllicprom" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead style="background-color:#D3D3D3">
    <tr>
    <!--  <th class="th-sm" id="a1">
      </th>-->
      <th class="th-sm" id="a1">Project Name
      </th>
        <th class="th-sm" id="a1">Industry applicable
      </th>
      <th class="th-sm" id="a1">Streams applicable
      </th>
        <th class="th-sm" id="a1">Estimated effort
      </th>
        <th class="th-sm" id="a1">Funded/Not funded
      </th>
        <th class="th-sm" id="a1">Technologies involved
      </th>
         <th class="th-sm" id="a1">Industry sponsored / Freelancer name
      </th>
        
      <!--<th class="th-sm" id="a1">Contact Details
      </th>-->
      <th class="th-sm" style="width:20px" id="a1">
      </th>
	  <th class="th-sm" id="a1">
      </th>
     
    </tr>
  </thead>
                                </table>
								</div>
                            </div>
                            
                            <div class="tab-pane fade" id="appren" role="tabpanel" aria-labelledby="appren-tab">
							<div class="table-responsive">
                                                                 <table id="displayalllicappren" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead style="background-color:#D3D3D3">
    <tr>
    <!--  <th class="th-sm" id="a1">
      </th>-->
      <th class="th-sm" id="a1">Apprentice Name
      </th>
        <th class="th-sm" id="a1">Industry applicable
      </th>
      <th class="th-sm" id="a1">Streams applicable
      </th>
        <th class="th-sm" id="a1">Estimated effort
      </th>
        <th class="th-sm" id="a1">Funded/Not funded
      </th>
        <th class="th-sm" id="a1">Technologies involved
      </th>
         <th class="th-sm" id="a1">Industry sponsored / Freelancer name
      </th>
        
      <!--<th class="th-sm" id="a1">Contact Details
      </th>-->
      <th class="th-sm" style="width:20px" id="a1">
      </th>
	  <th class="th-sm" id="a1">
      </th>
     
    </tr>
  </thead>
                                </table>
								</div>
                            </div>
                            
                            <div class="tab-pane fade" id="profileic" role="tabpanel" aria-labelledby="profileic-tab">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="collegelistnameic" width="100%">
                        <thead style="background-color:#D3D3D3">
                        <tr>
                            <!--<th>Industry code</th>-->
                            <th id="a1">Company Name</th>
                          
							<th id="a1">Action</th>
                        <!--    <th id="a1" ></th>
                            <th id="a1" ></th>-->

                        </tr>
                        </thead>

                    </table>
					
					   <table class="table table-striped table-bordered table-hover" id="jobslistcouic" width="100%">
                         <thead style="background-color:#D3D3D3">
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
                       


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

        <div id="noticationsdialo" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Notification(s)</h4>
                    </div>
                    <div class="modal-body">
<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2552" data-order="[]" width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>


                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Notification</th>


                                </tr>
                            </thead>
                            <tbody>
                        <?php foreach ($stmt1notications as $notfi): ?>
                                <tr class="odd gradeX">







                                    <td><?php 


	$old_date_timestamp = strtotime($notfi['notificationdate']);
 // $dateob = date('Y-m-d', $old_date_timestamp); 
  echo $dateob = date('d-m-Y', $old_date_timestamp); 
 ?></td>
                                    <td><?php echo $notfi['name']; ?></td>
                                    <td><?php echo $notfi['description']; ?></td>                       




                                </tr>
                        <?php endforeach; ?>
                            </tbody>
                        </table>
						</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                    <script>
                        $(document).ready(function () {
                            $('#dataTables-example2552').DataTable({
                                responsive: true
                            });
                        });
                    </script>
                </div>

            </div>
        </div> 


        <div id="diagnosticsdescriptio" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="loadmodaltil"></h4>
                    </div>
                    <div class="modal-body" id="contenmtmodiules">



                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="listofcolleges" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Companies List</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
					
					     <table class="table table-striped table-bordered table-hover" id="collegelistnamenew" width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <!--<th>Industry code</th>-->
                                    <th id="a1">Company Name</th>

                                    <th id="a1">Action</th>
    <!--    <th id="a1" ></th>
        <th id="a1" ></th>-->

                                </tr>
                            </thead>

                        </table>
                     
</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="jobslist" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Jobs</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="jobslistcou" width="100%">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <!--<th>Industry code</th>-->
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Job End Date</th>
                                    <th>No. of Position</th>
    <!--    <th id="a1" ></th>
        <th id="a1" ></th>-->

                                </tr>
                            </thead>

                        </table>

</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="jobslistbysyatus" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Application status of the Students applied for Jobs</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="appliedjblist">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a11">Student Name</th>
                                    <th id="a11">Company Name</th>

                                    <th id="a1">Job Title</th>

                                    <th id="a1">Job description</th>
                                    <th id="a1">Job end date</th>

                                    <th id="d1">Applied Date</th>
                                    <th id="a11">Status</th>
                                    <th id="d1">Status Date</th>
                                    <th id="a1">CV</th>

                                </tr>
                            </thead>

                        </table>

</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

        <div id="diagnosticsreports" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Reports</h4>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTabreports" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="homereports-tab" data-toggle="tab" href="#homereports" role="tab" aria-controls="homereports"
                                   aria-selected="true">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profilereports-tab" data-toggle="tab" href="#profilereports" role="tab" aria-controls="profilereports"
                                   aria-selected="false">Industry Connect </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contactreport-tab" data-toggle="tab" href="#contactreport" role="tab" aria-controls="contactreport"
                                   aria-selected="false">Industry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="placementreport-tab" data-toggle="tab" href="#placementreport" role="tab" aria-controls="placementreport"
                                   aria-selected="false">Placement</a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" id="placementreport1-tab" data-toggle="tab" href="#placementreport1" role="tab" aria-controls="placementreport1"
                                   aria-selected="false">Activity & Usage</a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" id="placementreport2-tab" data-toggle="tab" href="#placementreport2" role="tab" aria-controls="placementreport2"
                                   aria-selected="false">Internship</a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" id="placementreport3-tab" data-toggle="tab" href="#placementreport3" role="tab" aria-controls="placementreport3"
                                   aria-selected="false">Competency</a>
                            </li>
							  <li class="nav-item">
                                <a class="nav-link" id="placementreport4-tab" data-toggle="tab" href="#placementreport4" role="tab" aria-controls="placementreport4"
                                   aria-selected="false">Demand & Supply</a>
                            </li>
							
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="homereports" role="tabpanel" aria-labelledby="homereports-tab">

                                <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/index.php" ></iframe>

                            </div>
                            <div class="tab-pane fade" id="profilereports" role="tabpanel" aria-labelledby="profilereports-tab">
                                <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://iconnect.odinlearning.in/icdashboard/index.php" ></iframe>
                            </div>
                            <div class="tab-pane fade" id="contactreport" role="tabpanel" aria-labelledby="contactreport-tab">

                                <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="https://ims.odinlearning.in/imsdashboard/index.php" ></iframe>

                            </div>
                            <div class="tab-pane fade" id="placementreport" role="tabpanel" aria-labelledby="placementreport-tab">
							
							 <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/placement/index.php" ></iframe>
							</div>
							
							  <div class="tab-pane fade" id="placementreport1" role="tabpanel" aria-labelledby="placementreport1-tab">
							   <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/activity/index.php" ></iframe>
							  </div>
							    <div class="tab-pane fade" id="placementreport2" role="tabpanel" aria-labelledby="placementreport2-tab">
								 <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/internship/index.php" ></iframe>
								</div>
								  <div class="tab-pane fade" id="placementreport3" role="tabpanel" aria-labelledby="placementreport3-tab">
								   <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/competency/index.php" ></iframe>
								  </div>
								    <div class="tab-pane fade" id="placementreport4" role="tabpanel" aria-labelledby="placementreport4-tab">
									 <iframe  id="" width="100%" height="800" frameBorder="0" class="holds-the-iframe00" src="<?php echo Configure::read('MyConf.weburlmainsite');?>userdashboard/demandsupply/index.php" ></iframe>
									</div>
							
                        </div>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		

		
		
		


        <div id="listofspeakerlikes" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Students likes for Speakers</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="likesspeakerbystu">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Speaker Name</th>
                                    <th id="a1">Contact details</th>
                                    <th id="a1"></th>

                                    <th id="a1"></th>



                                </tr>
                            </thead>

                        </table>
</div>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

        <div id="appliedprojectlist" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="">List of Students applied for Project/Apprenticeship</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="listofstudentsappliedforjob">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Student Name</th>
                                    <th id="a1">Student Email address</th>
                                    <th id="a11">Type</th>
                                    <th id="a1">Project/Apprenticeship Description</th>

                                    <th id="a1">Contact Details</th>



                                </tr>
                            </thead>

                        </table>

</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
 <?php include('modalbosexall.ctp'); ?>

        <div id="modalforassignment" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title" id="">Assignments</h4>
                    </div>
                    <div class="modal-body">
                        
                     <ul class="nav nav-tabs" id="myTabas" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="homeas-tab" data-toggle="tab" href="#homeas" role="tab" aria-controls="homeas"
      aria-selected="true">Submit Assignment</a>
  </li>
  <li class="nav-item" onclick="viewtaecherscomments()">
    <a class="nav-link" id="profileas-tab" data-toggle="tab" href="#profileas" role="tab" aria-controls="profileas"
      aria-selected="false">Answer/ Comments</a>
  </li>
  </ul>
<div class="tab-content" id="myTabasContent">
  <div class="tab-pane fade show active" id="homeas" role="tabpanel" aria-labelledby="homeas-tab">
  <form method="post" action="" enctype="multipart/form-data" id="myformm">
                        
                          <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Question : </span><br />
			 <span id="assignmentquestion" style="font-style:italic;font-size:18px"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
      
      <section class="mb-5" id="genefadcehkkjdlk">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">General feedback : </span><br />
			 <span id="feedabckstudentassih" style="font-style:italic;font-size:18px"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
      <div id="shwistudentanswerfeedbavck">


<ul class="nav nav-tabs" id="myTabasss" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="homeasss-tab" data-toggle="tab" href="#homeasss" role="tab" aria-controls="homeasss"
      aria-selected="true">Your Answer</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profileasss-tab" data-toggle="tab" href="#profileasss" role="tab" aria-controls="profileasss"
      aria-selected="false">Video Recording</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabasssContent">
  <div class="tab-pane fade show active" id="homeasss" role="tabpanel" aria-labelledby="homeasss-tab">
  
                         <div class="form-group shadow-textarea" id="writeamseflas">
  <label for="exampleFormControlTextarea6">Your Answer:</label>
  <textarea class="form-control z-depth-1" maxlength = "1000" id="exampleFormControlTextarea6" rows="15" placeholder="Max 1000 Characters..."></textarea>
</div>
                        <style>
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}
                        </style>
                        
							  
						<div class="divider-new">
         <h4 class="text-center text-uppercase mx-3">OR</h4>
        </div>	  
                       
          <div class="input-group" id="uplaodassflas" style="padding-bottom:20px" >
<!--  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Submit</span>
  </div>-->
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fileassigmet" name="file"
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

                  
   <!--<div class="divider-new">
         <h4 class="text-center text-uppercase mx-3">OR</h4>
        </div>-->
  
 <input type="hidden" id="settoime" />
<!-- row requires "row-divided" class -->
  <input type="button" class="btn " value="Submit" id="but_upload" >
  
  </div>
  <div class="tab-pane fade" id="profileasss" role="tabpanel" aria-labelledby="profileasss-tab">
    <div class="row" id="recordingflas">
       
    	<div class="col-md-8">
            <video id="myVideo" class="video-js vjs-default-skin"></video>  
    	</div>
		<div class="col-md-4">
            <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
            <div class="media ml-3">
			
			<div class="media-body">
                <h5 class="mt-0" style="margin-left: -20px;"><strong>Video Instructions</strong></h5>
              <ul style="
    margin-left: -43px;
    text-align: justify;
    font-size: 13px;
">
    <li>Please sit in an upright position and adjust your camera, such that your face occupies at least 50% of the screen</li>
    <li>Ensure that the lighting is in front of you. Adjust the camera and microphone.</li>
    <li>Record a sample before you record the actual video, to ensure that your microphone and camera are well adjusted. </li>
	<li>Do not record long videos, record in parts (ideally 1 min each) it's easier.</li>
	<li>Preview your video before you submit. Once submitted you will get a message to indicate status. </li>
  </ul>
              </div>
			
			 
          

            </div>
          </div>

        </div>
        <!-- Card --> 
    	</div>
    </div>
	
	<input type="button" class="btn " value="Submit" id="but_uploadnew" >
  </div>

</div>



  
  




     
       
            
            
      
      </div>
	  
	  <script>
	  
	  var timee = $("#settoime").val();
	  
	 //alert(timee);
	  
var player = videojs("myVideo", {
    controls: true,
    width: 600,
    height: 300,
    fluid: false,
    plugins: {
        record: {
            audio: true,
            video: true,
            maxLength: 900,
            debug: true
        }
    }
}, function(){
    // print version information at startup
    var msg = 'Using video.js ' + videojs.VERSION +
        ' with videojs-record ' + videojs.getPluginVersion('record') +
        ' and recordrtc ' + RecordRTC.version;
    videojs.log(msg);
});
// error handling
player.on('deviceError', function() {
    console.log('device error:', player.deviceErrorCode);
});
player.on('error', function(error) {
    console.log('error:', error);
});
// user clicked the record button and started recording
player.on('startRecord', function() {
    console.log('started recording!');
});
// user completed recording and stream is available
player.on('finishRecord', function() {
    // the blob object contains the recorded data that
    // can be downloaded by the user, stored on server etc.
    console.log('finished recording: ', player.recordedData);
	
	
	 // stop device stream only
	    //player.record().stopStream();



/*$("#myVideo").click(function(){
  player.record().getDevice();
});*/
	   
	
	/*var input = document.createElement('input');
input.type="file";
input.value= player.recordedData;*/

  //$.cookie("records", player.recordedData.video);
//myForm.appendChild(input);

//document.getElementById("fileassigmetnew").appendChild(input);     // Append <li> to <ul> with id="myList"


    /*var formData = new FormData();
    formData.append('audiovideo', player.recordedData.video);
    
    
    xhr(urlmainsite+'sms/upload.php', formData, function (fName) {
        alert("Video succesfully uploaded !");
    });

    
    function xhr(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                callback(location.href + request.responseText);
            }
        };
        request.open('POST', url);
        request.send(data);
    }*/
});

                 $(document).ready(function(){

    $("#but_upload").click(function(){
	
	
	
	/**********************************/
	   /* var formData = new FormData();
    formData.append('audiovideo', player.recordedData.video);
    
    
    xhr(urlmainsite+'sms/upload.php', formData, function (fName) {
        alert("Video succesfully uploaded !");
    });

    
    function xhr(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                callback(location.href + request.responseText);
            }
        };
        request.open('POST', url);
        request.send(data);
    }*/
	/*********************/
	

        var fd = new FormData();
        var files = $('#fileassigmet')[0].files[0];
        console.log(files);
        fd.append('file',files);
		
	//	fd.append('audiovideo', player.recordedData.video);
		
		// fd.append('records',player.recordedData);
		
       var userid  = document.getElementById("userid").value;
fd.append('userid',userid);
        var studentcomment  = document.getElementById("exampleFormControlTextarea6").value;
fd.append('studentcomment',studentcomment);
        
         var groupidforstudent  = document.getElementById("groupidforstudent").value;
fd.append('groupidforstudent',groupidforstudent);
        
         var codeforassignment  = document.getElementById("codeforassignment").value;
fd.append('codeforassignment',codeforassignment);
        
         
        
           var assignmentnamestu  = document.getElementById("assignmentnamestu").value;
fd.append('assignmentnamestu',assignmentnamestu);
        
           var assignmenturlstu  = document.getElementById("assignmenturlstu").value;
fd.append('assignmenturlstu',assignmenturlstu);
        
         var compreacodeforassignment  = document.getElementById("compreacodeforassignment").value;
fd.append('compreacodeforassignment',compreacodeforassignment);
        
        

        $.ajax({
            url: urlmainsite+'sms/upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
              beforeSend: function() {
   
                  $("#showloadingaiisgn").show();
                   $("#but_upload").hide();
                  
  },
            success: function(response){
                $("#showloadingaiisgn").hide();
                 $("#but_upload").show();
                if(response == 'Submitted successfully.')
                    {
                        
                        toastr.success(response);
                    }
                else
                    {
                          toastr.error(response);
                        
                    }
              
            },
        });
    });
});


                 $(document).ready(function(){

    $("#but_uploadnew").click(function(){
	
	
	
	/**********************************/
	   /* var formData = new FormData();
    formData.append('audiovideo', player.recordedData.video);
    
    
    xhr(urlmainsite+'sms/upload.php', formData, function (fName) {
        alert("Video succesfully uploaded !");
    });

    
    function xhr(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                callback(location.href + request.responseText);
            }
        };
        request.open('POST', url);
        request.send(data);
    }*/
	/*********************/
	

        var fd = new FormData();
       
		
		fd.append('audiovideo', player.recordedData.video);
		
		
		
        var userid  = document.getElementById("userid").value;
fd.append('userid',userid);
        var studentcomment  = document.getElementById("exampleFormControlTextarea6").value;
fd.append('studentcomment',studentcomment);
        
         var groupidforstudent  = document.getElementById("groupidforstudent").value;
fd.append('groupidforstudent',groupidforstudent);
        
         var codeforassignment  = document.getElementById("codeforassignment").value;
fd.append('codeforassignment',codeforassignment);
        
         
        
           var assignmentnamestu  = document.getElementById("assignmentnamestu").value;
fd.append('assignmentnamestu',assignmentnamestu);
        
           var assignmenturlstu  = document.getElementById("assignmenturlstu").value;
fd.append('assignmenturlstu',assignmenturlstu);
        
         var compreacodeforassignment  = document.getElementById("compreacodeforassignment").value;
fd.append('compreacodeforassignment',compreacodeforassignment);
        
         
        
        
        

        $.ajax({
            url: urlmainsite+'sms/uploadrecording.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
              beforeSend: function() {
   
                  $("#showloadingaiisgn").show();
                   $("#but_uploadnew").hide();
                  
  },
            success: function(response){
                $("#showloadingaiisgn").hide();
                 $("#but_uploadnew").show();
                if(response == 'Submitted successfully.')
                    {
                        
                        toastr.success(response);
                    }
                else
                    {
                          toastr.error(response);
                        
                    }
              
            },
        });
    });
});


</script>

                              
                              <button class="btn " type="button" disabled id="showloadingaiisgn" style="display:none">
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
       
 
                          
                        
                          </form>
  
  
  </div>
  <div class="tab-pane fade" id="profileas" role="tabpanel" aria-labelledby="profileas-tab">
  <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Student Answer: </span><span id=""></span><br />
			 <span style="font-style:italic;font-size:18px" id="studentlistcommengts"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
   <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Teacher Comments: </span><span id=""></span><br />
			 <span style="font-style:italic;font-size:18px" id="studentlistcommengtsteachers"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
  
  </div>
 
</div>     



                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
		
		
        <div id="modalforassignmentfeed" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="">Coding Test</h4>
                    </div>
                    <div class="modal-body">
                        
                     
    <form method="post" action="" enctype="multipart/form-data" id="myformm" onsubmit='return onsubmitcodingtest()' >
                        
                          <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Question : </span><br />
			 <span id="assignmentquestionffee" style="font-style:italic;font-size:18px"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
      
      <section class="mb-5" id="genefadcehkkjdlkfeed">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Feedback : </span><br />
			 <span id="feedabckstudentassihfeed" style="font-style:italic;font-size:18px"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
      <div id="shwistudentanswerfeedbavck">

                       <div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea6">Your Answer:</label>
  <textarea class="form-control z-depth-1" maxlength = "1000" id="exampleFormControlTextarea6gg" rows="15" placeholder="Max 1000 Characters..."></textarea>
</div>
                        <style>
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}
                        </style>
                        
    
     
       
            
            <input type="submit" class="btn " value="Submit" id="but_upload" >
      
      </div>

                              
        
       
 
                          
                        
                          </form>
  



                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

		
		        <div id="studentsevents" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="">Student Activity</h4>
                    </div>
                    <div class="modal-body">
					<div class="row">
					
					<input type="hidden" id="eventlogsuser" value="">
					        <div class="col-md-8">
                                                        <div class="md-form mb-0">

					   <?= $this->Form->control('dateofbirth',array('label' => false,'class' => 'form-control datepickernew' ,'id' => 'date-picker-examplenew','required'=>'required')); ?>

                               <label for="date-picker-examplenew" class="active">Date <span style="color:red;">*</span></label>                             

                                                            <script>
                                                                $('.datepickernew').pickadate({
                                                                    today: '',
                                                                    clear: 'Clear selection',
                                                                    close: 'Cancel',
                                                                    selectYears: 100,
                                                                    format: 'dd-mm-yyyy'
                                                                   /* min: new Date(1950, 1, 1),
                                                                    max: new Date(2004, 1, 1)*/
                                                                })
                                                            </script>


                                                        </div>
                                                    </div>
													<div class="col-md-4">
													<button type="button" class="btn " onclick="filterlogsbydate(1)">Filter</button>
													<button type="button" class="btn " id="clearfilterforevents" style="display:none" onclick="filterlogsbydate(2)">Clear Filter</button>

					
					</div>
													
													</div>
					
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="listofstudentsevents"  style="width:100% !important" data-order="[]">
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a1">Type</th>
                                    <th id="a1">Code</th>
                                    <th id="a1">No. of Attempt(s)</th>
                                    <th id="a1">Date and Time</th>

                                    



                                </tr>
                            </thead>

                        </table>

</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


        <div id="diagnostics" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="loadrepostfporst" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="titlefiorpreference"></h4>
                    </div>
                    <div class="modal-body">
                        <iframe  id="iframepreferences" width="100%" height="800" frameBorder="0" class="holds-the-iframenew" ></iframe>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
		   <div id="diagnosticsfgffgfg" class="modal fade right" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="titlefiorpreferenceadfsdfsdfs"></h4>
      </div>
      <div class="modal-body">
	 <iframe  id="iframepreferencesfsdfsdfs" width="100%" height="800" frameBorder="0" class="holds-the-iframe" ></iframe>
	    
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div> 

		        <div id="displayassignments" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

					   <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Assignments</h4>
                    </div>
                    <div class="modal-body">

<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="displayssih"  data-order="[]" width="100%"   >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                   
									<th id="d1">Assignment Name</th>
									
                                    <th id="d1">Assignment Code</th>
                                    <th id="d1"></th>

                                   


                                </tr>
                            </thead>



                        </table>
</div>








                    </div>
                    <!-- <!--<div class="modal-footer">
                        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>

        <style>
            #backgroundimg{
                background-image:url(../img/About-Competitive-min.png);
                /*background-position: center;*/
                background-repeat: no-repeat;
                background-size: cover;
                height:100%;
                margin: 0;
                /* opacity: 0.5;*/
				
				background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height:auto;
            }
        </style>


<div id="modalforassignment1" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="">View Assignments</h4>
                    </div>
                    <div class="modal-body">
                        
                     <ul class="nav nav-tabs" id="myTabas1" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="homeas1-tab" data-toggle="tab" href="#homeas1" role="tab" aria-controls="homeas1"
      aria-selected="true">Add comments</a>
  </li>
  <li class="nav-item" onclick="viewtaecherscomments1()">
    <a class="nav-link" id="profileas1-tab" data-toggle="tab" href="#profileas1" role="tab" aria-controls="profileas1"
      aria-selected="false">Answer/ Comments</a>
  </li>
  </ul>
<div class="tab-content" id="myTabas1Content">
  <div class="tab-pane fade show active" id="homeas1" role="tabpanel" aria-labelledby="homeas1-tab">
  <form method="post" action="" enctype="multipart/form-data" id="myformm">
                        
                          <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Question : </span><br />
			 <span id="assignmentquestion1" style="font-style:italic;font-size:18px"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>

                       <div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea6">Your Comment:</label>
  <textarea class="form-control z-depth-1" maxlength = "500" id="exampleFormControlTextarea61" rows="15" placeholder="Max 500 Characters..."></textarea>
</div>
                        <style>
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}
                        </style>
                        

               </style>
  <script type="text/javascript">
    function isNumberKey11(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
      </script>

     <input class="form-control" type="text" placeholder="Enter score" id="scoreforstudents" onkeypress="return isNumberKey11(this, event);" required>

       
            
            <input type="button" class="btn " value="Add comment" id="but_upload1" >

                              
                              <button class="btn " type="button" disabled id="showloadingaiisgn1" style="display:none">
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
       
 
                          
                        
                          </form>
  
  
  </div>
  <div class="tab-pane fade" id="profileas1" role="tabpanel" aria-labelledby="profileas1-tab">
  <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Student Answer: </span><span id=""></span><br />
                                        
			 <span style="font-style:italic;font-size:18px" id="studentlistcommengts1"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
   <section class="mb-5">



                            <!-- Card -->
                            <div class="card">

                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="media ml-3">
                                          <p style="font-size: 20px;"><span  style="color:#00509E">Teacher Comments: </span><span id=""></span><br />
			 <span style="font-style:italic;font-size:18px" id="studentlistcommengtsteachers1"> 

 </span>  </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Card -->

                        </section>
  
  </div>
 
</div>     



                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" style="padding-left:500px !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height:75px">
        <h5 class="modal-title"id="titleforevenmtscal" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -54px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <div class="table-responsive">
       <table class="table" style ="text-align: center;">

  <tbody>
  
  <tr><td id="titleforonlineevent"></td></tr>
    <tr>
     
     
      <td id="onlineclasssgtartdate"></td>
      
    </tr>
    <tr>
      
      <td id="onlineclassenddate"></td>
    </tr>
	<tr>
      
      <td id="groupnameofonlineclass"></td>
    </tr>
    <tr>
      <td id="descriptionforonlioneclass"></td>
   
    </tr>
	 <tr>
      <td><a class="btn " id="joinlinkforadmin" target="_blank">Click here to join</a>
	  
	  <?php if($usersrole == 3 ||  $usersrole == 4 ) { ?>
	  <a class="btn btn-danger" onclick="delteteonloineclass()">Delete</a>
	  <?php } ?>
   
    </tr>
  </tbody>
</table>
</div>
      </div>
	  <input type="hidden" id="meetingidforuser" />
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn ">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
<script>
function delteteonloineclass()
{
var r = confirm('Are you sure to delete?');
if (r == true) {


 var a = $("#meetingidforuser").val();
 url = targeturl+'Users/deleteonlineclass/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					  $("#basicExampleModal").modal('hide');
$('#calendarinst').fullCalendar( 'refetchEvents' );
					     
					
                    }
                });


 
} else {
  
}
}
</script>
<style>
#basicExampleModal
{
padding-left : 500px !important;
padding-right : 500px !important;
}
</style>

   <div id="userguisde" class="modal fade right" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Getting Started</h4>
      </div>
      <div class="modal-body" id="backgroundimg">
	  <style>
	  :root {
  --background-color: #FFFFFF;
  --primary-color: #E66A53;
}

*{
  box-sizing: border-box;
}



.steps {
  /*width: 500px;*/
  box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3);
     background-color: #eeeeee;
  padding: 24px 0;
  position: relative;
  margin: auto;
 height: 695px;
    overflow: auto;
	  opacity: 0.7;

}

.steps::before {
  content: '';
  position: absolute;
  top: 0;
  height: 24px;
  width: 1px;
  background-color: rgba(0, 0, 0, 0.2);
  left: calc(50px / 2);
  z-index: 1;
}

.steps::after {
  content: '';
  position: absolute;
  height: 13px;
  width: 13px;
  background-color: var(--primary-color);
  box-shadow: 0px 0px 5px 0px var(--primary-color);
  border-radius: 15px;
  left: calc(50px / 2);
 /* bottom: 24px;*/
  transform: translateX(-45%);
  z-index: 2;
    
}

.step {
  padding: 0 20px 24px 50px;
  position: relative;
  transition: all 0.4s ease-in-out;
     background-color: #eeeeee;
  
}

.step::before {
  content: '';
  position: absolute;
  height: 25px;
  width: 25px;
  background-color: rgb(198, 198, 198);
  border-radius: 15px;
  left: calc(50px / 2);
  transform: translateX(-45%);
  z-index: 2;
}

.step::after {
  content: '';
  position: absolute;
  height: 100%;
  width: 1px;
  background-color: rgb(198, 198, 198);
  left: calc(50px / 2);
  top: 0;
  z-index: 1;
}

.step.minimized {
     background-color: #eeeeee;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
}

.header {
  user-select: none;
  font-size: 16px;
     color: #464646;
    font-weight: bold;
}

.subheader {
  user-select: none;
  font-size: 14px;
  color: rgba(0, 0, 0, 0.4);
}

.step-content {
  transition: all 0.3s ease-in-out;
  overflow: hidden;
  position: relative;
}

.step.minimized > .step-content {
  height: 0px;
}

.step-content.one {
height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.step-content.two {
height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}
.step-content.twotwo {
height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}
.step-content.three {
  height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.step-content.four {
height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}
.step-content.five {
  height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.step-content.six {
 
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.step-content.seven {
 height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.step-content.eight {
  height: auto;
  width: 100%;
  /*background-color: rgba(0, 0, 0, 0.05);*/
  border-radius: 4px;
    font-size: 14px;
    left: -17px;
 
    text-align: justify;
}

.next-btn {
  position: absolute;
  
  border: 0;
 padding: 5px 10px;
  border-radius: 4px;
  background-color: red;
  box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
  color: #FFF;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
  transform: translate(-50%, -50%);
}

.close-btn {
  position: absolute;
/*  top: 50%;
  left: 50%;*/
  border: 0;
  padding: 5px 10px;
  border-radius: 4px;
  background-color: rgb(255, 0, 255);
  box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
  color: #FFF;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
  transform: translate(-50%, -50%);
}

/* Irrelevant styling things */
.close-btn:hover {
  background-color: rgba(255, 0, 255, 0.6);
}

.close-btn:focus {
  outline: 0;
}

.next-btn:hover {
  background-color: rgba(255, 0, 0, 0.6);
}

.next-btn:focus {
  outline: 0;
}

.step.minimized:hover {
  background-color: rgba(0, 0, 0, 0.06);
}

	  </style>
	  <script>
	  let curOpen;

$(document).ready(function() {
  curOpen = $('.step')[0];
  
  $('.next-btn').on('click', function() {
    let cur = $(this).closest('.step');
    let next = $(cur).next();
    $(cur).addClass('minimized');
    setTimeout(function() {
      $(next).removeClass('minimized');
      curOpen = $(next);
    }, 400);
  });
  
  $('.close-btn').on('click', function() {
    let cur = $(this).closest('.step');
    $(cur).addClass('minimized');
    curOpen = null;
  });
  
  $('.step .step-content').on('click' ,function(e) {
    e.stopPropagation();
  });
  
  $('.step').on('click', function() {
    if (!$(this).hasClass("minimized")) {
      curOpen = null;
      $(this).addClass('minimized');
    }
    else {
      let next = $(this);
      if (curOpen === null) {
        curOpen = next;
        $(curOpen).removeClass('minimized');
      }
      else {
        $(curOpen).addClass('minimized');
        setTimeout(function() {
          $(next).removeClass('minimized');
          curOpen = $(next);
        }, 300);
      }
    }
  });
})
	  </script>
	 
	  <div class="row">
                        <div class="col-lg-4">
						
						    <div class="steps" style="margin-top: 24px;">
  <div class="step"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">1</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Profile setup  - Tell us who you are</div>
      <!--<div class="subheader">Hopefully this looks cool</div>-->
    </div>
    <div class="step-content one">
	
	<ul>
    <li>
   
 
	Go to <span style="color:blue"> My Account -> Profile </span>fill all the mandatory details (fields denoted by a <span style="color:red">*</span>). The profile is divided into 4 parts ie Basic profile, Academic profile, Personality, and Profile view. </li>
 <li>Update all mandatory fields in each section to get started. These details are used to show you the relevant targets (exams or companies you could consider for a career)</li>
 </ul>
	
      <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 88%;">Next</button>
    </div>
  </div>
  <div class="step minimized"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">2</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Preferences - How would you like to use ODIN</div>
     
    </div>
    <div class="step-content two">
	<ul>
	 <li>Go to<span style="color:blue"> My Account -> Preferences: Study hours</span> This is set at 2 hours per day default. You can change this setting based on how many hours you would like to plan for competitive exam preparation.</li> 
 <li>Under,  job preferences, there are a few basic questions to understand what kind of opportunities can be mapped to you. You can answer them now or at any time later. </li>

 </ul>      
	  <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 88%;">Next</button>
    </div>
  </div>
   
   
    <div class="step minimized"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">3</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Select Targets - What would you like to prepare for </div>
     
    </div>
    <div class="step-content three">
	
	<ul>
	 <li>You can add targets (competitive exams or careers you are interested in) to your career map.</li> 
<li>To do this go-to targets, in the sidebar and select the targets that you are interested in by clicking on the + sign against each target. </li>
<li>Targets you are eligible for are indicated in green, while targets recommended for you are shown as blue.</li>
<li>You can also check the competencies mapped to each target with their needed levels of expertise and the topics contained in each competency. </li>
<li>The maximum targets that can be selected are 10. Once you are finished with adding targets to your selection, Preview and save your targets. The Preview stage allows you to go back and change your selection. When you are finally done, hit the save button.</li> 
 </ul>
     <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 88%;">Next</button>
    </div>
  </div>
  
   <div class="step minimized"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">4</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">Baseline yourself, Let’s us identify your strong areas </div>
     
    </div>
    <div class="step-content four">
		<ul>
	 
 <li>Baselining is measured and represented as a percentile score.</li>
 <li>It will define how far you are to a particular level.</li>
 </ul>

      <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 88%;">Next</button>
    </div>
  </div>
  
    <div class="step minimized"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">5</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">View your calendar and start learning </div>
     
    </div>
    <div class="step-content five">
	<ul>
	 <li>Click on the calendar to see what lessons are planned for each day. </li>
 <li>Click on the lesson to start learning. Happy Learning and I wish you success! </li>
 </ul>
      <button class="next-btn btn " style="position: relative;margin-top: 12px;left: 86%;">Next</button>
    </div>
  </div>
  
    <div class="step minimized"><span style="margin-left: -28px;
    z-index: 100000000;
    color: green;
    position: relative;
    font-weight: bold;">6</span>
    <div class="step-header">
      <div class="header" style="margin-top: -23px;">All set lets start learning</div>
     
    </div>
    <div class="step-content six">
       <button class="next-btn btn " style="position: relative;margin-top: 26px;left: 88%;">Close</button>
    </div>
  </div>
  
   <!-- <div class="step minimized">
    <div class="step-header">
      <div class="header">Lesson Programs</div>
     
    </div>
    <div class="step-content seven">
      <button class="next-btn">Next</button>
    </div>
  </div>
  
  
  <div class="step minimized">
    <div class="step-header">
      <div class="header">Score Card</div>
     
    </div>
    <div class="step-content eight">
      <button class="close-btn">Close</button>
    </div>
  </div> -->
</div>
						</div>
						
						  <div class="col-lg-8">
						  
		  <p id="gettingstartedright" style="color:#666A6D;
    font-size: 16px;
    font-weight: normal;    position: absolute;
    bottom: 100px;text-align: justify;width:400px;    right: 41px;        background: #eeeeee;
    padding: 10px 10px 10px 10px;font-family: 'Roboto', sans-serif;    opacity: 0.7;">ODIN is your personal coach, with you all the way to help you succeed in the sphere of competitive hiring and help you achieve your dream job. ODIN understands who you are, and works with you on every aspect that is needed for you to succeed.  ODIN is built with some of the best and complex technologies to help deliver a personalized experience. So let me about yourself to help us personalize the learning journey for you. </p>
						  </div>
						  
						  </div>
	

		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div> 





    </div>
</main>
<!-- Main layout -->
<input type="hidden" id="gettargetcount" value="<?php echo $targetexamscount; ?>">
<input type="hidden" id="getexamcodes" value="<?php echo $getecodes; ?>">
<input type="hidden" id="userid" value="<?php echo $userid; ?>">
<input type="hidden" id="useridmoodle" value="<?php echo $useridmoodle; ?>">
<input type="hidden" id="loggesingroupid" value="<?php echo $loggesingroupid; ?>">
<input type="hidden" id="roleid" value="<?php echo $usersrole; ?>">

<input type="hidden" id="ticketuserid" value="<?php echo $ticketuserid; ?>">
<input type="hidden" id="tickettokenkey" value="<?php echo $tickettokenkey; ?>">

<input type="hidden" id="coursenameforfileter" value="<?php echo $coursenameforfileter; ?>">
<input type="hidden" id="getsemanme" value="<?php echo $getsemanme; ?>">

<input type="hidden" id="getsemmode" value="<?php echo $getcatn; ?>">

<input type="hidden" id="getuserfname" value="<?php echo $name; ?>">

<input type="hidden" id="getthestudentpassoutyear" value="<?php echo $yearpassout; ?>">

<input type="hidden" id="studentscoreuserid" >

<input type="hidden" id="codeforassignment" >

<input type="hidden" id="assignmentnamestu" >
<input type="hidden" id="assignmenturlstu" >

<input type="hidden" id="assignmenturlstuuid" >

<input type="hidden" id="assignmenturlstuuidgroupid" >

<input type="hidden" id="compreacodeforassignment" >
<input type="hidden" value="<?php echo $this->request->getSession()->read('groupid'); ?>" class="form-control form-control-sm"  id="groupidforstudent" >


<input type="hidden" value="<?php echo $this->request->getSession()->read('sessionname'); ?>" class="form-control form-control-sm"  id="useridforic" >
<input type="hidden" value="<?php echo $this->request->getSession()->read('inscode'); ?>" class="form-control form-control-sm"  id="insidforic" >


<input type="hidden" value="<?php echo $this->request->getSession()->read('sessionemail'); ?>" class="form-control form-control-sm"  id="sessionemail" >






<input type="hidden" id="gettopicids" value="<?php echo $gettopicids; ?>">
<input type="hidden" id="tragetids" value="<?php echo $tragetids; ?>">

<button type="button" style="display:none" onClick="calendarfilter('all');" id="calendarfileterloadf">Click Me!</button>

<?php if($usersrole == 2) { ?>

<?php if($firstlogin == 0 && $synctocalsem == 1 ) {  ?>

<iframe width="0" height="0" frameborder="0" scrolling="no" vspace="0" hspace="0" marginheight="0" marginwidth="0" src="<?php echo Configure::read('MyConf.weburlmainsite');?>events/synctocalendar/<?php echo $userid; ?>"></iframe>


<?php } ?>

<?php if($firstlogin == 0 && $synctocalsem == 0 ) {  ?>

<iframe width="0" height="0" frameborder="0" scrolling="no" vspace="0" hspace="0" marginheight="0" marginwidth="0" src="<?php echo Configure::read('MyConf.weburlmainsite');?>users/synctocalendar"></iframe>


<?php } ?>

<?php if($firstlogin == 1 && $getcatn == 'Semester wise' ) {  ?>

<iframe width="0" height="0" frameborder="0" scrolling="no" vspace="0" hspace="0" marginheight="0" marginwidth="0" src="<?php echo Configure::read('MyConf.weburlmainsite');?>events/synctocalendar/<?php echo $userid; ?>"></iframe>


<?php } ?>

<?php } ?>


<input type="hidden" id="countofpending" >
<input type="hidden" id="countofcomplted" >

<input type="hidden" id="baselinescore" value="0" >

<footer class="page-footer font-small mdb-color pt-4" >


    <div class="container text-center text-md-left" id="test1">


        <!--  <div class="row text-center text-md-left mt-3 pb-3">
      
            
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">ODIN</h6>
              <p style="text-align: justify;">OpenODIN is a comprehensive, target driven, personalized platform that helps you gear up for wide range of competitive exams that lead to careers in Information Technology, Banking Manufacturing, Hospitality and more.</p>
            </div>
         
      
            <hr class="w-100 clearfix d-md-none">
      
         
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
             
              
            </div>
          
      
            <hr class="w-100 clearfix d-md-none">
      
          
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          
            </div>
      
          
            <hr class="w-100 clearfix d-md-none">
      
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p>
                <i class="fas fa-home mr-3"></i> Xlanz India Pvt. Ltd.,<br />
      India Development Centre, <br/>Unit 201, Brigade Rubix, <br />20, Watch Factory Road, Yeshwanthpur, <br />Bangalore-560013, INDIA</p>
              <p>
                <i class="fas fa-envelope mr-3"></i> <a href="mailto:info@odinlearning.com?Subject=ODIN%20Help" target="_top">info@odinlearning.com</a></p>
         
            </div>
      
          </div>-->
        <!-- Footer links -->



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
<!-- Footer -->
<!-- Footer -->
<style>
    /* #slide-out {
 transform: translateX(0px) !important;
   }*/
</style>

    <link rel="stylesheet" type="text/css" href="datetimepicker/bootstrap-datetimepicker.css">
    <script src="datetimepicker/moment.min.js"></script>
      <script src="datetimepicker/bootstrap-datetimepicker.min.js"></script>



</body>


