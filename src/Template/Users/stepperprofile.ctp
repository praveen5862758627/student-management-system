   <?= $this->Html->css('mdb.css') ?>
    <?php include('customcss.css'); ?>
   <style>
   	 body{
background-image:url(../img/About-Competitive-min.png);
 background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
	height:auto;
	     /* opacity: 0.5;*/
		 
}
   </style>
<body class="fixed-sn white-skin" >

	


<header>
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
 </header>

  

  
   <div class="container-fluid">
  <center><h3 style="margin-top: 10px;    font-weight: bold;color: black;">Let's get started - 6 simple steps</h3></center>
   
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
						  
						  <p id="stepgetimhjbdmc" style="color:#666A6D;
    font-size: 16px;
    font-weight: normal;    position: absolute;
    bottom: 100px;text-align: justify;width:400px;    right: 41px;        background: #eeeeee;
    padding: 10px 10px 10px 10px;font-family: 'Roboto', sans-serif;    opacity: 0.7;">ODIN is your personal coach, with you all the way to help you succeed in the sphere of competitive hiring and help you achieve your dream job. ODIN understands who you are, and works with you on every aspect that is needed for you to succeed.  ODIN is built with some of the best and complex technologies to help deliver a personalized experience. So let me about yourself to help us personalize the learning journey for you. </p>
						  </div>
						  
						  </div>
   
   
 
   
   <!--- step end -------------------------->
   
   </div>
   
   

	
	<footer>
	</footer>

  
</body>