<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
		
		
		
	//	document.getElementById('quicklinktoggle').click();
		
		
    </script>

</head>
<style>
    /*
    DEMO STYLE
*/
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


    body {
        font-family: "Arial";
        height:100%;
    }

    p {
        font-family: "Arial";
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

    a, a:hover, a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        padding: 15px 10px;
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
    }


    #sidebar {
        min-width: 250px;
        max-width: 250px;
        color: #CED4DA;
        font-family: "Arial";
        font-weight: bold;
        transition: all 0.6s cubic-bezier(0.945, 0.020, 0.270, 0.665);
        transform-origin: bottom left;
    }

    #sidebar.active {
        margin-left: -250px;
        transform: rotateY(100deg);
    }

    #sidebar .sidebar-header {
        padding: 12px 24px;
    }

    #sidebar ul.components {
        padding: 12px 24px;
    }

    #sidebar ul p {
        color: #CED4DA;
        font-family: "Arial";
        font-weight: bold;
        padding: 12px 24px;
    }

    #sidebar ul li a {
        padding: 12px 24px;
        font-size: 12px;
        display: block;
    }
    #sidebar ul li a:hover {
        color: #CED4DA;
        font-family: "Arial";
        font-weight: bold;
        background: #1a1a1a;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: #CED4DA;
        font-family: "Arial";
        font-weight: bold;
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
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-family: "Arial";
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
    }

    a.article, a.article:hover {
        color: #EFEFEF !important;
    }



    /* ---------------------------------------------------
        CONTENT STYLE
    ----------------------------------------------------- */
    #content {
        width: 100%;
        padding: 20px;
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
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse span:nth-of-type(2) {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }
    #sidebarCollapse span:last-of-type {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }


    #sidebarCollapse.active span {
        transform: none;
        opacity: 1;
        margin: 5px auto;
    }

    #sidebar .list-unstyled {
        padding: 0px;
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
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }
        #sidebarCollapse.active span:nth-of-type(2) {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }
        #sidebarCollapse.active span:last-of-type {
            transform: none;
            opacity: 1;
            margin: 5px auto;
        }

    }
    .top-nav-space {
        border: 1px solid #e5e9f2;
        background-color: #f5f9fc;
        padding-left: 30px;
        padding-top: 3px;
        padding-bottom: 0px;
        min-height:65px !important;
        height:auto !important;
    }
    .top-nav-space-icon {
    }

    .profile-userpic {
        margin-left: 16% !important;
        margin-bottom: 3% !important;
    }

    .profile-usertitle {
      /*  margin-left: 10% !important;
        margin-bottom: 3% !important;*/
    }

    .profile-userbuttons {
        margin-left: -4% !important;
    }
</style>

<body>
<div class="wrapper">
    <!-- Sidebar Holder -->
	
	

    <nav id="sidebar" style="background-color: #354052;">
        <a style="padding: 10px;color: #f8f9fa;display: block;margin-top:12px;"><center><span style="font-size: 16px;color: white;"> <img src="<?= $this->Url->image('logo_new1.png'); ?>" class="img-circle"  width="40" height="40"> ODIN Learning</span></center></a>
        <hr>

        <ul class="list-unstyled">
		
		<li>
			
                    <ul class="list-group" style="width:90%;margin-left: 4%;margin-top: 7%;">
                        <li class="list-group-item" style="background-color: #354052;">
                            <div class="container">
                                <div class="row profile">
                                    <div class="col-md-3">
                                        <div class="profile-sidebar" style="width:90%;">
                                         
                                            <div class="profile-userpic">
											
											
                                                <img src="https://testapi.odinlearning.in/upload/<?= $photoname; ?>" style="margin-left: 5px;width: 40%;height: 75px;border-radius: 50% !important;" class="img-responsive" alt="" id="userpicturechange"><br />
												
												<div align="center" style="width: 100%;
    margin-left: -54px;">
<?php echo $name ?>
</div>
												
												
												
                                            </div>
                                           
                                          <!--  <div class="profile-usertitle">
											 <div class="row">
                        <div class="col-lg-12">
                                             <div style=" text-align: center;"> <?php echo $name ?></div>
                                            </div>
											</div>
											</div>-->
                                           
                                          <!--  <div class="profile-userbuttons" >
                                                <button type="button" class="btn btn-success btn-xs" style="width:30%;" onclick="openmodalboxprofile()">Edit</button>
                                                <input type="button" class="btn btn-danger btn-xs" style="width:30%;" onclick="logouturl()" value="Logout" />
                                            </div>-->
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
               
			</li>
		
         <!--   <li><a href="#" onclick="logouturl()"  > <i class="fa fa-sign-out" style="margin:2px;font-size:18px;"></i> Logout  </a></li>-->
            <?php if($usersrole == 5) { ?>
                <li><a href="users/userindex"  > <i class="fa fa-cog" style="margin:2px;font-size:18px;"></i> Control Panel  </a></li>
            <?php } ?>
			
			
			  <?php if($usersrole == 2 && $getcatn == 'Semester wise') { ?>
			  <li><a data-toggle="collapse" href="#collapse1" aria-expanded="true" > <i class="fa fa-user" style="margin:2px;font-size:18px;"></i> Getting Started</a>
			
			<div id="collapse1" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
				
					 
					<?php if($getcatn != 'Semester wise') {?>
					  
					 <li  style="cursor:pointer;font-weight: normal;"  onclick='openmodalboxtarget("Targetcomps" , "Learning Plans-Baseline");return false;'>Base Line</li>
					 
					
					
                        <li onclick="openmodalbox('Add Targets' , 'Manage my Targets');return false;" style="cursor:pointer;font-weight: normal;">Select Targets</li>
						<?php } ?>
						
						
						
						 <!-- <li onclick="openmodalboxtarget('Targetcomps' , 'My Target Competency');return false;" style="cursor:pointer;font-weight: normal;">View Competencies</li>-->
						   <li onclick="openmodalboxtarget('Targetcomps' , 'Learning Plans');return false;" style="cursor:pointer;font-weight: normal;">View Lesson Plan</li>
                       
                        
						
						</div>
                    </ul>
                </div>
				
				
            </li>
			  
			  
			  <?php }  else if($usersrole == 2){?>
			
            <li style='margin-left: -5px;'><a data-toggle="collapse" href="#collapse1" aria-expanded="true" > <i class="fa fa-user" style="margin:2px;font-size:18px;"></i> Getting Started in 5 simple steps</a>
			
			<div id="collapse1" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
				
						
						<li onclick="openmodalbox('Industry' , 'Industry');return false;" style="cursor:pointer;font-weight: normal;">Understanding Careers</li>
						<li onclick="openmodalbox('Add Targets' , 'Manage my Targets');return false;" style="cursor:pointer;font-weight: normal;">Selecting Targets</li>
						<li onclick="comptaraereport();return false;" style="cursor:pointer;font-weight: normal;">Baseline competencies</li>
						<li onclick="openmodalboxtarget('Targetcomps' , 'Learning Plans');return false;" style="cursor:pointer;font-weight: normal;">Create Lesson plan</li>
						<li onclick="viewstudentcalendar();return false;" style="cursor:pointer;font-weight: normal;">Check & Finish</li>
						<!--</ul>-->
					 
					 
					 
						</div>
                    </ul>
                </div>
				
				
            </li>
			<?php } ?>
			
			<?php if($usersrole == 2){ ?>
			
			 <!--<li style='margin-left: -5px;'><a data-toggle="collapse" href="#collapse111" aria-expanded="true"  onclick="redirecturlsstudent('https://www.odinlearning.in/helpfiles/howtouse/','How do I use ODIN ?')"> <i class="fa fa-file-text-o" style="margin:2px;font-size:18px;"></i> How do I use ODIN ?</a> </li>-->
			<?php } ?>
			
			
			 <?php if($usersrole == 2) { ?>
            <li style='margin-left: -5px;'><a data-toggle="collapse" href="#collapse2" id="quicklinktoggle" aria-expanded="true" > <i class="fa fa-th-list" style="margin:2px;font-size:18px;"></i> Quick Links</a>
                <div id="collapse2" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
					
                       <!-- <li onclick="gettingstartedpopup();return false;" style="cursor:pointer;font-weight: normal;">Getting Started</li>-->
                        <li onclick="viewstudentcalendar();return false;" style="cursor:pointer;font-weight: normal;">My Calendar</li>
						  <li onclick="openscorecardforstudents();return false;" style="cursor:pointer;font-weight: normal;">My ScoreCard</li>
						 <li onclick="openmodalboxprofile(1);return false;" style="cursor:pointer;font-weight: normal;">My Study Hours</li>
						 <li onclick="openmodalboxprofile(2);return false;" style="cursor:pointer;font-weight: normal;">My Profile</li>
                       <!-- <li style="cursor:pointer;font-weight: normal;" onclick="redirecturlsstudent('https://www.odinlearning.in/helpfiles/ODINHelpFAQ/','FAQ')" style="cursor:pointer;font-weight: normal;" >FAQ</li> -->
						 <!--<li onclick="syncscorecardfinal();return false;" style="cursor:pointer;font-weight: normal;">Score Card Sync</li>-->
						 
						<!-- <li  style="cursor:pointer;font-weight: normal;" onclick="redirecturlsstudent('https://odinlearning.in/helpfiles/whatsnew/','Support/What`s New')" style="cursor:pointer;font-weight: normal;">Support/What's New</li> -->
						  <li onclick="logouturl()" style="cursor:pointer;font-weight: normal;">Logout</li>
						 
						</div>
                    </ul>
                </div>
            </li>
			<?php } ?>
			
            <?php if($usersrole == 3) { ?>
           <!-- <li><a data-toggle="collapse" href="#" onclick="studentgroup();return false;"  > <i class="fa fa-user" style="margin:2px;font-size:18px;"></i> Student Group management</a></li>-->
            <!--<li><a data-toggle="collapse" href="#" onclick="admingroup();return false;"  > <i class="fa fa-sitemap" style="margin:2px;font-size:18px;"></i> Group Admin</a></li>-->
			
			  <li><a data-toggle="collapse" href="#collapse111155555" aria-expanded="true" > <i class="fa fa-sitemap" style="margin:2px;font-size:18px;"></i> Student Admin management</a>
			
			<div id="collapse111155555" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
					
					<li onclick='redirecturlsstudent("https://testsms.odinlearning.in/users/addga","Add Students/Group Admin")' style='cursor:pointer;font-weight: normal;'>Add Students/Group Admin</li>   
					<li onclick='openmodalbox1("Student" , document.getElementById("studentserchval").value);return false;' style='cursor:pointer;font-weight: normal;'>Edit/View Students</li>
					 <li onclick="studentgroup();return false;" style='cursor:pointer;font-weight: normal;'>Assign Students to Groups</li> 
				 <li onclick='redirecturlsstudent("https://testsms.odinlearning.in/Studentgroup","Group Management")' style='cursor:pointer;font-weight: normal;'>Edit/View Students in Groups</li>   
			  
				
				 
				 
                       
                      
						
						</div>
                    </ul>
                </div>
				
				
            </li>
			
			
			
			
			  <li><a data-toggle="collapse" href="#collapse1111" aria-expanded="true" > <i class="fa fa-user" style="margin:2px;font-size:18px;"></i> Group Admin management</a>
			
			<div id="collapse1111" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
					
					<li onclick='redirecturlsstudent("https://testsms.odinlearning.in/users/addga","Add Group Admin/Students")' style='cursor:pointer;font-weight: normal;'>Add Group Admins/Students</li>   
					<li onclick='redirecturlsstudent("https://testsms.odinlearning.in/users/gausers","Group Admin Management")' style='cursor:pointer;font-weight: normal;'>Edit/View Group Admins</li>
					 <li onclick='redirecturlsstudent("https://testsms.odinlearning.in/Studentgroup/add","Group Management")' style='cursor:pointer;font-weight: normal;'>Add Groups</li> 
				 <li onclick='redirecturlsstudent("https://testsms.odinlearning.in/Studentgroup","Group Management")' style='cursor:pointer;font-weight: normal;'>Edit/View Groups</li>   
			  
				 <li onclick="admingroup();return false;" style="cursor:pointer;font-weight: normal;">Assign Group to Admins</li>
				 
				 
                       
                      
						
						</div>
                    </ul>
                </div>
				
				
            </li>
			
            <li><a data-toggle="collapse" href="#" onclick="calendarviewforadmin();return false;"  > <i class="fa fa-calendar" style="margin:2px;font-size:18px;"></i> Calendar</a></li>
            
			
			  <li style='margin-left: -5px;'><a data-toggle="collapse" href="#collapse2" id="quicklinktoggle" aria-expanded="true" > <i class="fa fa-th-list" style="margin:2px;font-size:18px;"></i> Quick Links</a>
                <div id="collapse2" class="panel-collapse collapse in" style="border:none;">
                    <ul style="line-height:25px;background-color: #354052;margin-left: 10px;margin-right: 14px;margin-top: 5px;margin-bottom: 5px;"  >
					<div class="container">
					
                      
                        <li onclick="" style="cursor:pointer;font-weight: normal;">View Dashboard</li>
						  <li onclick="" style="cursor:pointer;font-weight: normal;">Showcase Students</li>
						 <li onclick="" style="cursor:pointer;font-weight: normal;">Schedule iLecture</li>
						 <li onclick="" style="cursor:pointer;font-weight: normal;">View Calendar</li>
						  <li onclick="" style="cursor:pointer;font-weight: normal;">View Notifications</li>
						   <li onclick="" style="cursor:pointer;font-weight: normal;">Manage Groups</li>
						    <li onclick="" style="cursor:pointer;font-weight: normal;">View Ticket Status</li>
						    <li onclick="" style="cursor:pointer;font-weight: normal;">Invoice & Billing</li>
							 <li onclick="" style="cursor:pointer;font-weight: normal;">Settings</li>
							  <li onclick="" style="cursor:pointer;font-weight: normal;">College Profile</li>
                      
						  <li onclick="logouturl()" style="cursor:pointer;font-weight: normal;">Logout</li>
						 
						</div>
                    </ul>
                </div>
            </li>
			
			
			
			<?php } ?>
			
			
			
        </ul>

    </nav>

</body>


