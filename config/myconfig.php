<?php
//0 - off  1  - on

$config = array(  // application url setup
    'MyConf' => array(
        'mainurl' => 'https://napi.odinlearning.in/',
		'weburlmainsite' => 'https://nsms.odinlearning.in/',
		'questionBank' => 'https://nsms.odinlearning.in/lmsdata/QuestionBank/',
		'scorebook' => 'https://napi.odinlearning.in/sms/savescorebook.php'
    ),
		
	'Sidebarmenu' => array( // enable or disable
        'jobtarget' => 1,
		'academictarget' => 1,
		'mycompetencies' => 1,
		'learningplan' => 1,
		'calendar' => 1,
		'scorecard' => 1,
		'industryconnect' => 1,
		'ticket' => 1
    ),
	
	'Notifications' => array( // enable or disable
        'notifications' => 1
    ),
		
	'Topmenu' => array( // enable or disable
        'videogallery' => 1,
		'purchase' => 1,
		'gettingstarted' => 1,
		'viewdocumentation' => 1
		
    ),
	
	'Myaccount' => array( // enable or disable
        'myprofile' => 1,
		'mysettings' => 1,
		'mypurchase' => 1
    ),
	
	'Myprofile' => array( // enable or disable
        'academic' => 1,
		'personality' => 1,
		'profile' => 1,
		'workexperience' => 1
    ),
	
	'Mysettings' => array( // enable or disable
        'studyhours' => 1,
		'job' => 1,
		'industryconnect' => 1
    ),
	
	'JobTargets' => array( // enable or disable
        'directory' => 1,
		'recommendedtargets' => 1,
		'previewbutton' => 1
    ),
	
	'Learningplan' => array( // enable or disable
        'modulecomps' => 1,
		'addoncomps' => 1,
		'targetcomps' => 1,
		'consolidatedcomps' => 1
    ),
	'Myprofile_personal' => array( // enable or disable
        'firstname' => 1,
		'lastname' => 1,
		'gender' => 1,
		'dob' => 1,
		'category' => 1,
		'nationality' => 1,
		'address1' => 1,
		'address2' => 1,
	    'country' => 1,
		'state' => 1,
		'city' => 1,
		'zipcode' => 1,
		'email_alternate' => 1,
		'phone_primary' => 1,
		'phone_alternate' => 0
    ),
	// setup to make myprofile-> personal fields mandatory or non mandatory
	'Myprofile_personal_mandatory' => array(
        'firstname' => 1,
		'lastname' => 1,
		'gender' => 0,
		'dob' => 0,
		'category' => 1,
		'nationality' => 1,
		'address1' => 1,
	    'country' => 1,
		'state' => 1,
		'city' => 0,
		'zipcode' => 1,
		'phone_primary' => 1
	),
	
	'Registration' => array( // enable or disable
        'firstname' => 0,
		'lastname' => 0,
		'username' => 0,
		'phonenumber' => 0
    ),
	
	'MyersBriggs' => array( // Myers Briggs
        'test1' => 1,
		'test2' => 1
    ),
	
	'Academic' => array( // Myers Briggs
        'sslc_show'	=> 0,
		'puc_show' => 0,
		'graduation_institute_field' => 1,
		'graduation_institute_field_mandatory' => 0,
		'graduation_stream' => 1,
		'graduation_stream_mandatory' => 0,
		'graduation_specialization' => 1,
		'graduation_specialization_mandatory' => 0,
		'graduation_regno' => 1,
		'graduation_regno_mandatory' => 0,
		'graduation_joining_year' => 1,
		'graduation_joining_year_mandatory' => 0,
		'graduation_passout_year' => 1,
		'graduation_passout_year_mandatory' => 0,
		'graduation_course_duration' => 0,
		'graduation_course_duration_mandatory' => 0,
		'graduation_semwise_marks' => 0
    )
);