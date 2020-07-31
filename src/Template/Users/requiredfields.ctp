<?php
use Cake\Core\Configure;
Configure::load('myconfig');
if(Configure::read('Myprofile_personal_mandatory.firstname') == 1)
{
	$required1 = 'required';
	$mandatory1 = '<span style="color:red;">*</span>';
}	
else{
	$required1 = null;
	$mandatory1 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.lastname') == 1)
{
	$required2 = 'required';
	$mandatory2 = '<span style="color:red;">*</span>';
}	
else{
	$required2 = null;
	$mandatory2 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.gender') == 1)
{
	$required3 = 'required';
	$mandatory3 = '<span style="color:red;">*</span>';
}	
else{
	$required3 = null;
	$mandatory3 = '';
}

if(Configure::read('Myprofile_personal_mandatory.dob') == 1)
{
	$required4 = 'required';
	$mandatory4 = '<span style="color:red;">*</span>';
}	
else{
	$required4 = null;
	$mandatory4 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.category') == 1)
{
	$required5 = 'required';
	$mandatory5 = '<span style="color:red;">*</span>';
}	
else{
	$required5 = null;
	$mandatory5 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.nationality') == 1)
{
	$required6 = 'required';
	$mandatory6 = '<span style="color:red;">*</span>';
}	
else{
	$required6 = null;
	$mandatory6 = '';
}
if(Configure::read('Myprofile_personal_mandatory.address1') == 1)
{
	$required7 = 'required';
	$mandatory7 = '<span style="color:red;">*</span>';
}	
else{
	$required7 = null;
	$mandatory7 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.country') == 1)
{
	$required8 = 'required';
	$mandatory8 = '<span style="color:red;">*</span>';
}	
else{
	$required8 = null;
	$mandatory8 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.state') == 1)
{
	$required9 = 'required';
	$mandatory9 = '<span style="color:red;">*</span>';
}	
else{
	$required9 = null;
	$mandatory9 = '';
}

if(Configure::read('Myprofile_personal_mandatory.city') == 1)
{
	$required10 = 'required';
	$mandatory10 = '<span style="color:red;">*</span>';
}	
else{
	$required10 = null;
	$mandatory10 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.zipcode') == 1)
{
	$required11 = 'required';
	$mandatory11 = '<span style="color:red;">*</span>';
}	
else{
	$required11 = null;
	$mandatory11 = '';
}

 if(Configure::read('Myprofile_personal_mandatory.phone_primary') == 1)
{
	$required12 = 'required';
	$mandatory12 = '<span style="color:red;">*</span>';
}	
else{
	$required12 = null;
	$mandatory12 = '';
}


///// graduation 

if(Configure::read('Academic.graduation_institute_field_mandatory') == 1)
{
	$required13 = 'required';
	$mandatory13 = '<span style="color:red;">*</span>';
}	
else{
	$required13 = null;
	$mandatory13 = '';
}


if(Configure::read('Academic.graduation_stream_mandatory') == 1)
{
	$required14 = 'required';
	$mandatory14 = '<span style="color:red;">*</span>';
}	
else{
	$required14 = null;
	$mandatory14 = '';
}

if(Configure::read('Academic.graduation_specialization_mandatory') == 1)
{
	$required15 = 'required';
	$mandatory15 = '<span style="color:red;">*</span>';
}	
else{
	$required15 = null;
	$mandatory15 = '';
}


if(Configure::read('Academic.graduation_regno_mandatory') == 1)
{
	$required16 = 'required';
	$mandatory16 = '<span style="color:red;">*</span>';
}	
else{
	$required16 = null;
	$mandatory16 = '';
}

if(Configure::read('Academic.graduation_joining_year_mandatory') == 1)
{
	$required17 = 'required';
	$mandatory17 = '<span style="color:red;">*</span>';
}	
else{
	$required17 = null;
	$mandatory17 = '';
}

if(Configure::read('Academic.graduation_passout_year_mandatory') == 1)
{
	$required18 = 'required';
	$mandatory18 = '<span style="color:red;">*</span>';
}	
else{
	$required18 = null;
	$mandatory18 = '';
}

if(Configure::read('Academic.graduation_course_duration_mandatory') == 1)
{
	$required19 = 'required';
	$mandatory19 = '<span style="color:red;">*</span>';
}	
else{
	$required19 = null;
	$mandatory19 = '';
}


?>