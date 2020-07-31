
   <div id="personalitytype" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Evaluate your personality type</h4>
      </div>
      <div class="modal-body">
	
	  
	  		  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons255()'
	
]); ?>
   
   <p style="text-align: justify;">The ODIN Personality dashboard uses the Myers Briggs Personality test to describe you as one of the 16 personality types. This is a self test and you are expected to be as honest while answering each question. ODIN uses this score to match the right career / job for you. Landing in the right job is half your way to success. It might well be the difference between doing ‘what you like’ and ‘liking what you do’. At the end of this test, ODIN might suggest the typical careers where a person like you might excel.</p>
	 
	 <p  style="text-align: justify;">Please read the below questions carefully and pick the answer that best describes you. </p>
	 
	
	  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
			
	 
			
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question500" name="pquestion11" value="11" required>
  <label class="form-check-label" for="question500"> I tend to expend energy, enjoy groups</label>

<br />

<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question5001" name="pquestion11" value="22" >
  <label class="form-check-label" for="question5001"> I like to conserve energy, enjoy one-on-one conversations</label>
</div>
 
						
   
   </div>
   </div>
   </div>
   
     <div class="card" style="margin-bottom: 10px;">
	   <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">

   
   
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question5002" name="pquestion21" value="11" required >
  <label class="form-check-label" for="question5002"> I tend to interpret literally a situation</label>

<br />

<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question5003" name="pquestion21" value="22" >
  <label class="form-check-label" for="question5003"> In any situation, I look for meaning and possibilities</label>
</div>
 
						

     </div>
   </div>
   </div>
   
       <div class="card" style="margin-bottom: 10px;">
	     <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
      
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline"  style="display:block !important">
  <input type="radio" class="form-check-input" id="question5004" name="pquestion31" value="11"  required>
  <label class="form-check-label" for="question5004"> I am a logical, thinking, questioning type person</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question5005" name="pquestion31" value="22" >
  <label class="form-check-label" for="question5005">  Empathetic, feeling, accommodating type person </label>
</div>



						
  
   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">4.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question5006" name="pquestion41" value="11"  required>
  <label class="form-check-label" for="question5006"> I tend to be organized, orderly</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question5007" name="pquestion41" value="22" >
  <label class="form-check-label" for="question5007"> I like to do things on the go, I am flexible, adaptable </label>
</div>


						

   </div>
   </div>
   </div>
   
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">5.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline"  style="display:block !important">
  <input type="radio" class="form-check-input" id="question5008" name="pquestion51" value="11"  required>
  <label class="form-check-label" for="question5008"> I am more outgoing, think out loud with friends, colleagues or teachers</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question5009" name="pquestion51" value="22" >
  <label class="form-check-label" for="question5009">  I am more reserved, think to myself  </label>
</div>


						

   </div>
   </div>
   </div>
   
     <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">6.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline"  style="display:block !important">
  <input type="radio" class="form-check-input" id="question50010" name="pquestion61" value="11"  required>
  <label class="form-check-label" for="question50010"> I am practical, realistic, experiential</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50011" name="pquestion61" value="22" >
  <label class="form-check-label" for="question50011">  I am imaginative, innovative, theoretical  </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">7.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50012" name="pquestion71" value="11"  required>
  <label class="form-check-label" for="question50012"> I am candid, straight forward, frank</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50013" name="pquestion71" value="22" >
  <label class="form-check-label" for="question50013">  I am tactful, kind, encouraging </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">8.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50014" name="pquestion81" value="11"  required>
  <label class="form-check-label" for="question50014">I like to plan, schedule</label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50015" name="pquestion81" value="22" >
  <label class="form-check-label" for="question50015">   I like to be unplanned, spontaneous </label>
</div>


						

   </div>
   </div>
   </div>
    
	   <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">9.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question50016" name="pquestion91" value="11"  required>
  <label class="form-check-label" for="question50016">I seek many tasks, public activities, interaction with others </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50017" name="pquestion91" value="22" >
  <label class="form-check-label" for="question50017">   I seek private, solitary activities with quiet to concentrate  </label>
</div>


						

   </div>
   </div>
   </div>
   
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">10.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50018" name="pquestion101" value="11"  required>
  <label class="form-check-label" for="question50018"> As a person, I think I am standard, usual, conventional </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50019" name="pquestion101" value="22" >
  <label class="form-check-label" for="question50019">    As a person, I think I am different, novel, unique   </label>
</div>


						

   </div>
   </div>
   </div>
   
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">11.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50020" name="pquestion111" value="11"  required>
  <label class="form-check-label" for="question50020">  I am firm, tend to criticize, hold the line </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50021" name="pquestion111" value="22" >
  <label class="form-check-label" for="question50021">   I am gentle, tend to appreciate, conciliate    </label>
</div>


						

   </div>
   </div>
   </div>
   
      <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">12.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50022" name="pquestion121" value="11"  required>
  <label class="form-check-label" for="question50022">   I am regulated, structured </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50023" name="pquestion121" value="22" >
  <label class="form-check-label" for="question50023">    I am easygoing, “live” and “let live”    </label>
</div>


						

   </div>
   </div>
   </div>
        <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">13.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question50024" name="pquestion131" value="11"  required>
  <label class="form-check-label" for="question50024">   As a person I am external, communicative, express myself well </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50025" name="pquestion131" value="22" >
  <label class="form-check-label" for="question50025">    As a person, I am  internal, reticent and keep to myself    </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">14.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question50026" name="pquestion141" value="11"  required>
  <label class="form-check-label" for="question50026">   I like to focus on here-and-now </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50027" name="pquestion141" value="22" >
  <label class="form-check-label" for="question50027">   I look to the future, global perspective, “big picture”   </label>
</div>


						

   </div>
   </div>
   </div>
      <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">15.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50028" name="pquestion151" value="11"  required>
  <label class="form-check-label" for="question50028">   I am tough-minded and just. I like to demand work and outcomes, yet will be fair to people </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50029" name="pquestion151" value="22" >
  <label class="form-check-label" for="question50029">   I am tender-hearted, merciful, and generally tend not to hurt anyone or step on their toes    </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">16.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question50030" name="pquestion161" value="11"  required>
  <label class="form-check-label" for="question50030">   I believe in preparation, I plan ahead </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50031" name="pquestion161" value="22" >
  <label class="form-check-label" for="question50031">   I don't plan too much, go with the flow, adapt as I go along    </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">17.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50032" name="pquestion171" value="11"  required>
  <label class="form-check-label" for="question50032">  I am quick, active, initiate things without delay </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50033" name="pquestion171" value="22" >
  <label class="form-check-label" for="question50033">  I am reflective, deliberate on things before I act   </label>
</div>


						

   </div>
   </div>
   </div>
   <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">18.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50034" name="pquestion181" value="11"  required>
  <label class="form-check-label" for="question50034">  I base my decisions and thinking based on facts, things, “what is” </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50035" name="pquestion181" value="22" >
  <label class="form-check-label" for="question50035"> I base my decisions ideas, dreams, “what could be,” philosophical   </label>
</div>


						

   </div>
   </div>
   </div>
    <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">19.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;">
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important">
  <input type="radio" class="form-check-input" id="question50036" name="pquestion191" value="11"  required>
  <label class="form-check-label" for="question50036">  I am matter of fact, issue-oriented </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50037" name="pquestion191" value="22" >
  <label class="form-check-label" for="question50037"> I am sensitive, people-oriented, compassionate    </label>
</div>


						

   </div>
   </div>
   </div>
      <div class="card" style="margin-bottom: 10px;">
  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 16px;">20.</span>
          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3">
   
       
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style="display:block !important" >
  <input type="radio" class="form-check-input" id="question50038" name="pquestion201" value="11"  required>
  <label class="form-check-label" for="question50038"> I like to control, govern and be in control of the goal  </label>

<br />
<!-- Material inline 2 -->

  <input type="radio" class="form-check-input" id="question50039" name="pquestion201" value="22" >
  <label class="form-check-label" for="question50039"> I like to give latitude, freedom to people or my team    </label>
</div>


						

   </div>
   </div>
   </div>
 
   
   <?php //if($myersbriggs == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php  //} ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>