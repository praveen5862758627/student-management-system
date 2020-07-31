
   <div id="problemsolving" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Problem Solving</h4>
      </div>
      <div class="modal-body">
	
	  
	  		  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(1)'
	
]); ?>
   
	 
	   <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 5px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			<label for="genderid" class="active">My favorite subject in school was Maths?</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="question2000" name="pquestion11" value="1" required>
  <label class="form-check-label" for="question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question2001" name="pquestion11" value="0" >
  <label class="form-check-label" for="question2001">False</label>
</div>
 
						
   </div>
</div>
</div>   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				
				 <label for="genderid" class="active">I love applying mathematical concepts to solve problems</label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="question2002" name="pquestion21" value="1" required >
  <label class="form-check-label" for="question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question2003" name="pquestion21" value="0" >
  <label class="form-check-label" for="question2003">False</label>
</div>

						
   </div> 
   </div>
   </div>
   
   
   
        <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	    <label for="genderid" class="active">I like solving crossword puzzles and sudoku?</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="question2004" name="pquestion31" value="1"  required>
  <label class="form-check-label" for="question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question2005" name="pquestion31" value="0" >
  <label class="form-check-label" for="question2005">False</label>
</div>




						
   </div> 
   </div>
   </div>
   
   
         <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I like to come up with algorithms in programming</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 14px;">
  <input type="radio" class="form-check-input" id="question2008" name="pquestion41" value="1"  required>
  <label class="form-check-label" for="question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question2009" name="pquestion41" value="0" >
  <label class="form-check-label" for="question2009">False</label>
</div>



   </div> 
		   </div> 				
   </div> 
   
   
     <!--<div class="md-form mb-0">
				
					 
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="question20012" name="pquestion51" value="1" required>
  <label class="form-check-label" for="question20012">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20013" name="pquestion51" value="0" >
  <label class="form-check-label" for="question20013">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20014" name="pquestion51" value="0" >
  <label class="form-check-label" for="question20014">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20015" name="pquestion51" value="0" >
  <label class="form-check-label" for="question20015">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. I was certain<br />
B. the management meeting.<br />
C. be allowed to attend<br />
D. that subordinates would not<br />
</label>
						
   </div>-->
   
   
   <!--<div class="md-form mb-0">
				
					 
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="question20016" name="pquestion61" value="0" required>
  <label class="form-check-label" for="question20016">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20017" name="pquestion61" value="1" >
  <label class="form-check-label" for="question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20018" name="pquestion61" value="0" >
  <label class="form-check-label" for="question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="question20019" name="pquestion61" value="0" >
  <label class="form-check-label" for="question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>-->
   
   <?php //if($problemsolving == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

      <div id="teamwork" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Teamwork</h4>
      </div>
      <div class="modal-body">
		<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(2)'
	
]); ?>
   
   
	 
	    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		<label for="genderid" class="active">I like playing team games like football and cricket</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="1question2000" name="pquestion12" value="1" required>
  <label class="form-check-label" for="1question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question2001" name="pquestion12" value="0" >
  <label class="form-check-label" for="1question2001">False</label>
</div>
 
						
   </div>
</div>
			</div>   
   
 <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I am in my college team in a team game like football</label>		
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="1question2002" name="pquestion22" value="1" required>
  <label class="form-check-label" for="1question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question2003" name="pquestion22" value="0" >
  <label class="form-check-label" for="1question2003">False</label>
</div>

						
   </div> 
   </div>
			</div>
   
   
       <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I like to help others in my class, and I often take the time to teach my classmates something I know</label>
						
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="1question2004" name="pquestion32" value="1" required>
  <label class="form-check-label" for="1question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question2005" name="pquestion32" value="0" >
  <label class="form-check-label" for="1question2005">False</label>
</div>



 
   </div> 
   </div>
			</div>
   
   
        <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				
				 <label for="genderid" class="active">I have organized festivals and community events in my neighborhood or at college </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="1question2008" name="pquestion42" value="1" required>
  <label class="form-check-label" for="1question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question2009" name="pquestion42" value="0" >
  <label class="form-check-label" for="1question2009">False</label>
</div>




						
   </div> 
   </div>
			</div>
   
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	 <label for="genderid" class="active">I have participated in the Swatch Bharat Abhiyan campaign (or similar) in my locality or area </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" >
  <input type="radio" class="form-check-input" id="1question20012" name="pquestion52" value="1" required>
  <label class="form-check-label" for="1question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question20013" name="pquestion52" value="0" >
  <label class="form-check-label" for="1question20013">False</label>
</div>



 
						
   </div>
   </div>
			</div>
   
   
  <!-- <div class="md-form mb-0">
				
					
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="1question20016" name="pquestion62" value="0" required>
  <label class="form-check-label" for="1question20016">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question20017" name="pquestion62" value="1" >
  <label class="form-check-label" for="1question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question20018" name="pquestion62" value="0" >
  <label class="form-check-label" for="1question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="1question20019" name="pquestion62" value="0" >
  <label class="form-check-label" for="1question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>-->
   
   <?php //if($teamwork == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

 <div id="leadership" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Leadership</h4>
      </div>
      <div class="modal-body">
	 	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(3)'
	
]); ?>
   
   
	 
	    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I like to be in situations where my success depends on the success of my friends or project mates.</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="2question2000" name="pquestion13" value="1" required>
  <label class="form-check-label" for="2question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question2001" name="pquestion13" value="0" >
  <label class="form-check-label" for="2question2001">False</label>
</div>

						
   </div> 
   </div>
			</div>
   
  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				<label for="genderid" class="active">I have held a / got elected to a position in the college student council </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="2question2002" name="pquestion23" value="1" required>
  <label class="form-check-label" for="2question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question2003" name="pquestion23" value="0" >
  <label class="form-check-label" for="2question2003">False</label>
</div>
 
						
   </div> 
   </div>
			</div>
   
   
   
       <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I am amazingly talented, left to myself I can produce wonders</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="2question2004" name="pquestion33" value="1" required>
  <label class="form-check-label" for="2question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question2005" name="pquestion33" value="0" >
  <label class="form-check-label" for="2question2005">False</label>
</div>



 
						
   </div> 
   </div>
			</div>
   
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I have started student forums in technology, the management or engineering </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="2question2008" name="pquestion43" value="1" required>
  <label class="form-check-label" for="2question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question2009" name="pquestion43" value="0" >
  <label class="form-check-label" for="2question2009">False</label>
</div>




						
   </div> 
   </div>
			</div>
   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				<label for="genderid" class="active">When I am given a problem to solve, I perceive against all odds, find people to support me, organize the resources and don't stop till I meet my goal. </label><br />

					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 10px;">
  <input type="radio" class="form-check-input" id="2question20012" name="pquestion53" value="1" required>
  <label class="form-check-label" for="2question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question20013" name="pquestion53" value="0" >
  <label class="form-check-label" for="2question20013">False</label>
</div>



 						
   </div>
   </div>
			</div>
   
   <!--<div class="md-form mb-0">
				
			
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="2question20016" name="pquestion63" value="0" required>
  <label class="form-check-label" for="2question20016">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question20017" name="pquestion63" value="1" >
  <label class="form-check-label" for="2question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question20018" name="pquestion63" value="0" >
  <label class="form-check-label" for="2question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="2question20019" name="pquestion63" value="0" >
  <label class="form-check-label" for="2question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>-->
   
   <?php //if($leadership == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>



<div id="socialskils" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Social/Language Skills</h4>
      </div>
      <div class="modal-body">
		<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(4)'
	
]); ?>
   
   
	 
	    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">Many times I have walked up to a stranger and picked up a conversation with him. </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question2000" name="pquestion14" value="1" required>
  <label class="form-check-label" for="3question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question2001" name="pquestion14" value="0" >
  <label class="form-check-label" for="3question2001">False</label>
</div>

						
   </div> 
   	</div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				<label for="genderid" class="active">I have many friends on social media, I love making friends in person </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question2002" name="pquestion24" value="1" required>
  <label class="form-check-label" for="3question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question2003" name="pquestion24" value="0" >
  <label class="form-check-label" for="3question2003">False</label>
</div>
 
						
   </div> 
   	</div>
			</div>
   
   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				
 <label for="genderid" class="active">If I get invited to a party  or function where I hardly know anyone, I will still go 
</label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question2004" name="pquestion34" value="1" required>
  <label class="form-check-label" for="3question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question2005" name="pquestion34" value="0" >
  <label class="form-check-label" for="3question2005">False</label>
</div>



						
   </div> 
   	</div>
			</div>
   
   
         <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				 <label for="genderid" class="active">I am active on Facebook and Twitter 
</label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question2008" name="pquestion44" value="1" required>
  <label class="form-check-label" for="3question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question2009" name="pquestion44" value="0" >
  <label class="form-check-label" for="3question2009">False</label>
</div>




						
   </div>
	</div>
			</div>   
   
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				
 <label for="genderid" class="active">People tell me that I have a sense of humor
</label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question20012" name="pquestion54" value="1" required>
  <label class="form-check-label" for="3question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question20013" name="pquestion54" value="0" >
  <label class="form-check-label" for="3question20013">False</label>
</div>



						
   </div>
   	</div>
			</div>
   
   
   <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">6.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			 <label for="genderid" class="active">I love traveling to new places 
</label>	
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3question20016" name="pquestion64" value="1" required>
  <label class="form-check-label" for="3question20016">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3question20017" name="pquestion64" value="0" >
  <label class="form-check-label" for="3question20017">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
   
       <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">7.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				 <label for="genderid" class="active">I am comfortable traveling alone </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="3questiofvfdfsn20016" name="pquestion74" value="1" required>
  <label class="form-check-label" for="3questiofvfdfsn20016">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="3questidffsdgsdgfon20017" name="pquestion74" value="0" >
  <label class="form-check-label" for="3questidffsdgsdgfon20017">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">8.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				 <label for="genderid" class="active">In a new place, I try to learn a few words of the local language  </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="gsgggggggsdgsgd" name="pquestion84" value="1" required>
  <label class="form-check-label" for="gsgggggggsdgsgd">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="ggdgfsdgfsdgfsdgfs" name="pquestion84" value="0" >
  <label class="form-check-label" for="ggdgfsdgfsdgfsdgfs">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">9.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				 <label for="genderid" class="active">In a new place, I always try to eat local cuisine even if I have an option  </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="dgfsdgfsdgfsdgfs" name="pquestion94" value="1" required>
  <label class="form-check-label" for="dgfsdgfsdgfsdgfs">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="dgfsdgfsrwetw" name="pquestion94" value="0" >
  <label class="form-check-label" for="dgfsdgfsrwetw">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
   <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">10.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I am comfortable mingling with locals or natives and will stay in their home if invited  </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="gwegrwtw" name="pquestion104" value="1" required>
  <label class="form-check-label" for="gwegrwtw">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="dgfgfgfgfgfs" name="pquestion104" value="0" >
  <label class="form-check-label" for="dgfgfgfgfgfs">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">11.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active"> I can speak more than  3 Indian Languages  </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="dgfsgfgfagsags" name="pquestion114" value="1" required>
  <label class="form-check-label" for="dgfsgfgfagsags">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="gfdgfgfagfsadgfs" name="pquestion114" value="0" >
  <label class="form-check-label" for="gfdgfgfagfsadgfs">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
  <!--<div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">12.</span>

          
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I can speak & write more than  3 Indian Languages  </label>
				
					 
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="adfsadfsadfsadfs" name="pquestion124" value="1" required>
  <label class="form-check-label" for="adfsadfsadfsadfs">True</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="fdadfsafdadfsadfs" name="pquestion124" value="0" >
  <label class="form-check-label" for="fdadfsafdadfsadfs">False</label>
</div>




						
   </div>
   	</div>
			</div>-->
			
 <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">12.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I can speak a foreign language 
 </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="erQERW343434" name="pquestion124" value="1" required>
  <label class="form-check-label" for="erQERW343434">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="GFW4R232342ERW" name="pquestion124" value="0" >
  <label class="form-check-label" for="GFW4R232342ERW">False</label>
</div>




						
   </div>
   	</div>
			</div>
			
			
  <!-- <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">14.</span>

         
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I can read and write in a foreign language 
 </label>
				
					
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="ETRTREWETRWQETRW" name="pquestion144" value="1" required>
  <label class="form-check-label" for="ETRTREWETRWQETRW">True</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="DFEFFAf" name="pquestion144" value="0" >
  <label class="form-check-label" for="DFEFFAf">False</label>
</div>




						
   </div>
   	</div>
			</div>-->
   
 <!--<div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">15.</span>

         
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I can speak more than 2 foreign languages 
 </label>
				
					  
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="GFGFADGFSADGFS" name="pquestion154" value="1" required>
  <label class="form-check-label" for="GFGFADGFSADGFS">True</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="dbfdgfsdgfsdgfsdgfs" name="pquestion154" value="0" >
  <label class="form-check-label" for="dbfdgfsdgfsdgfsdgfs">False</label>
</div>




						
   </div>
   	</div>
			</div>
   -->
   
   
   
   <?php //if($socialskils == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

<div id="initative" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Initiative</h4>
      </div>
      <div class="modal-body">
		<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(5)'
	
]); ?>
   
   
	 
	  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			
				
				<label for="genderid" class="active">I have started a cause on <a href="https://www.change.org/" target="_blank" style="color:blue">change.org</a></label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="4question2000" name="pquestion15" value="1" required>
  <label class="form-check-label" for="4question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question2001" name="pquestion15" value="0" >
  <label class="form-check-label" for="4question2001">False</label>
</div>
 
						
   </div> 
   </div>
			</div>
   
   <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			
	 <label for="genderid" class="active">If I find something wrong in college, I will bring it up with the concerned authorities and get it addressed
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="4question2002" name="pquestion25" value="1" required>
  <label class="form-check-label" for="4question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question2003" name="pquestion25" value="0" >
  <label class="form-check-label" for="4question2003">False</label>
</div>

						
   </div> 
   </div>
			</div>
   
   
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			
	   <label for="genderid" class="active">I have been the first to call an ambulance when I have seen an accident victim on the road </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="4question2004" name="pquestion35" value="1" required>
  <label class="form-check-label" for="4question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question2005" name="pquestion35" value="0" >
  <label class="form-check-label" for="4question2005">False</label>
</div>



 
						
   </div> 
   </div>
			</div>
   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			
		 <label for="genderid" class="active">When my friends or family plans for a holiday, I am usually the one who volunteers to do the planning and logistics
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="4question2008" name="pquestion45" value="1" required>
  <label class="form-check-label" for="4question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question2009" name="pquestion45" value="0" >
  <label class="form-check-label" for="4question2009">False</label>
</div>




						
   </div> 
   </div>
			</div>
   
   
  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
			
	  <label for="genderid" class="active">I have organized campaigns like Swatch Bharat Abhiyan or blood donation camps in my locality or area 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="4question20012" name="pquestion55" value="1" required>
  <label class="form-check-label" for="4question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question20013" name="pquestion55" value="0" >
  <label class="form-check-label" for="4question20013">False</label>
</div>




						
   </div>
   </div>
			</div>
   
   
   <!--<div class="md-form mb-0">
				
					  
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="4question20016" name="pquestion65" value="0" required>
  <label class="form-check-label" for="4question20016">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question20017" name="pquestion65" value="1" >
  <label class="form-check-label" for="4question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question20018" name="pquestion65" value="0" >
  <label class="form-check-label" for="4question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="4question20019" name="pquestion65" value="0" >
  <label class="form-check-label" for="4question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>-->
   
   <?php //if($initative == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

<div id="communicationspoken" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Communication</h4>
      </div>
      <div class="modal-body">
		<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(6)'
	
]); ?>
   
   
	 
	   <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		<label for="genderid" class="active">I have no stage fear and am comfortable addressing groups of people in public forums
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="5question2000" name="pquestion16" value="1" required>
  <label class="form-check-label" for="5question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question2001" name="pquestion16" value="0" >
  <label class="form-check-label" for="5question2001">False</label>
</div>
 
						
   </div> 
   </div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	<label for="genderid" class="active">I have participated in debates and oratory competitions in school and college 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="5question2002" name="pquestion26" value="1" required>
  <label class="form-check-label" for="5question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question2003" name="pquestion26" value="0" >
  <label class="form-check-label" for="5question2003">False</label>
</div>
 
						
   </div> 
   </div>
			</div>
   
   
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I have been a speaker at professional forums like seminars and conferences
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px">
  <input type="radio" class="form-check-input" id="5question2004" name="pquestion36" value="1" required>
  <label class="form-check-label" for="5question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question2005" name="pquestion36" value="0" >
  <label class="form-check-label" for="5question2005">False</label>
</div>



 
						
   </div> 
   </div>
			</div>
   
         <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		
 <label for="genderid" class="active">I like to go extempore rather than prepared with notes 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="5question2008" name="pquestion46" value="1" required>
  <label class="form-check-label" for="5question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question2009" name="pquestion46" value="0" >
  <label class="form-check-label" for="5question2009">False</label>
</div>


						
   </div> 
   </div>
			</div>
   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	 <label for="genderid" class="active">If I am called up to explain a familiar concept to my class, I will feel confident and can express myself rather well
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px">
  <input type="radio" class="form-check-input" id="5question20012" name="pquestion56" value="1" required>
  <label class="form-check-label" for="5question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question20013" name="pquestion56" value="0" >
  <label class="form-check-label" for="5question20013">False</label>
</div>



 
						
   </div>
   </div>
			</div>
   
   
  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">6.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
    <label for="genderid" class="active">I like writing blogs, and I am a regular blogger, I like to present my ideas in a written format 

</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="5question20016" name="pquestion66" value="1" required>
  <label class="form-check-label" for="5question20016">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="5question20017" name="pquestion66" value="0" >
  <label class="form-check-label" for="5question20017">False</label>
</div>




						
   </div>
   </div>
			</div>
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">7.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	  <label for="genderid" class="active">I like twitter style or conveying my ideas rather than long essays 


</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="gfgffgswew676" name="pquestion76" value="1" required>
  <label class="form-check-label" for="gfgffgswew676">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="dfsadfsfdf4234" name="pquestion76" value="0" >
  <label class="form-check-label" for="dfsadfsfdf4234">False</label>
</div>



 
						
   </div>
   </div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">8.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I am good with language grammar, I can convey my ideas in writing without any difficulty 


</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="dgfdfdgfs45" name="pquestion86" value="1" required>
  <label class="form-check-label" for="dgfdfdgfs45">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="gffgsfs556" name="pquestion86" value="0" >
  <label class="form-check-label" for="gffgsfs556">False</label>
</div>




						
   </div>
   </div>
			</div>
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">9.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I write/ have written for college magazines or other magazines in print 


</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="vfdgfsdgsf545" name="pquestion96" value="1" required>
  <label class="form-check-label" for="vfdgfsdgsf545">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="gffgfdsdgfsgfd344" name="pquestion96" value="0" >
  <label class="form-check-label" for="gffgfdsdgfsgfd344">False</label>
</div>




						
   </div>
   </div>
			</div>
  <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">10.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I was able to write/ compile my project report with clarity and preciseness 


</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 10px;">
  <input type="radio" class="form-check-input" id="fdsffdsasdf445" name="pquestion106" value="1" required>
  <label class="form-check-label" for="fdsffdsasdf445">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="erwqerwqerw4545" name="pquestion106" value="0" >
  <label class="form-check-label" for="erwqerwqerw4545">False</label>
</div>




						
   </div>
   </div>
			</div>
   
   <?php // if($communicationspoken == '0') { ?>
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


<div id="communicationwritten" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Communication (written)</h4>
      </div>
      <div class="modal-body">
	  	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(7)'
	
]); ?>
   
   
	 
	    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="6question2000" name="pquestion17" value="1" required>
  <label class="form-check-label" for="6question2000">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2001" name="pquestion17" value="0" >
  <label class="form-check-label" for="6question2001">No</label>
</div>
 <label for="genderid" class="active">Do you like solving puzzles?</label>
						
   </div> 
   
    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="6question2002" name="pquestion27" value="1" required>
  <label class="form-check-label" for="6question2002">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2003" name="pquestion27" value="0" >
  <label class="form-check-label" for="6question2003">No</label>
</div>
 <label for="genderid" class="active">Do you play crosswords, Sudoko or jumbled words?</label>
						
   </div> 
   
   
   
       <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="6question2004" name="pquestion37" value="0" required>
  <label class="form-check-label" for="6question2004">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2005" name="pquestion37" value="0" >
  <label class="form-check-label" for="6question2005">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2006" name="pquestion37" value="0" >
  <label class="form-check-label" for="6question2006">adbc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2007" name="pquestion37" value="1" >
  <label class="form-check-label" for="6question2007">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.<br />A. She saw hir opportunity<br />
B. to make amends<br />
C. when he came to her home<br />
D. to borrow some sugar.<br />
</label>
						
   </div> 
   
   
        <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="6question2008" name="pquestion47" value="0" required>
  <label class="form-check-label" for="6question2008">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question2009" name="pquestion47" value="0" >
  <label class="form-check-label" for="6question2009">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20010" name="pquestion47" value="1" >
  <label class="form-check-label" for="6question20010">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20011" name="pquestion47" value="0" >
  <label class="form-check-label" for="6question20011">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. He danced with joy<br />
B. that he had topped<br />
C. when he found out<br />
D. the board examination.<br />
</label>
						
   </div> 
   
   
     <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="6question20012" name="pquestion57" value="1" required>
  <label class="form-check-label" for="6question20012">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20013" name="pquestion57" value="0" >
  <label class="form-check-label" for="6question20013">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20014" name="pquestion57" value="0" >
  <label class="form-check-label" for="6question20014">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20015" name="pquestion57" value="0" >
  <label class="form-check-label" for="6question20015">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. I was certain<br />
B. the management meeting.<br />
C. be allowed to attend<br />
D. that subordinates would not<br />
</label>
						
   </div>
   
   
   <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="6question20016" name="pquestion67" value="0" required>
  <label class="form-check-label" for="6question20016">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20017" name="pquestion67" value="1" >
  <label class="form-check-label" for="6question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20018" name="pquestion67" value="0" >
  <label class="form-check-label" for="6question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="6question20019" name="pquestion67" value="0" >
  <label class="form-check-label" for="6question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>
   
   <?php //if($communicationwritten == '0') { ?>
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
   
   
   
   <div id="communicationoratory" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Communication (oratory)</h4>
      </div>
      <div class="modal-body">
		<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(8)'
	
]); ?>
   
   
	 
	    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="7question2000" name="pquestion18" value="1" required>
  <label class="form-check-label" for="7question2000">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2001" name="pquestion18" value="0" >
  <label class="form-check-label" for="7question2001">No</label>
</div>
 <label for="genderid" class="active">Do you like solving puzzles?</label>
						
   </div> 
   
    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="7question2002" name="pquestion28" value="1" required>
  <label class="form-check-label" for="7question2002">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2003" name="pquestion28" value="0" >
  <label class="form-check-label" for="7question2003">No</label>
</div>
 <label for="genderid" class="active">Do you play crosswords, Sudoko or jumbled words?</label>
						
   </div> 
   
   
   
       <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="7question2004" name="pquestion38" value="0" required>
  <label class="form-check-label" for="7question2004">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2005" name="pquestion38" value="0" >
  <label class="form-check-label" for="7question2005">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2006" name="pquestion38" value="0" >
  <label class="form-check-label" for="7question2006">adbc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2007" name="pquestion38" value="1" >
  <label class="form-check-label" for="7question2007">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.<br />A. She saw hir opportunity<br />
B. to make amends<br />
C. when he came to her home<br />
D. to borrow some sugar.<br />
</label>
						
   </div> 
   
   
        <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="7question2008" name="pquestion48" value="0" required>
  <label class="form-check-label" for="7question2008">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question2009" name="pquestion48" value="0" >
  <label class="form-check-label" for="7question2009">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20010" name="pquestion48" value="1" >
  <label class="form-check-label" for="7question20010">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20011" name="pquestion48" value="0" >
  <label class="form-check-label" for="7question20011">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. He danced with joy<br />
B. that he had topped<br />
C. when he found out<br />
D. the board examination.<br />
</label>
						
   </div> 
   
   
     <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="7question20012" name="pquestion58" value="1" required>
  <label class="form-check-label" for="7question20012">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20013" name="pquestion58" value="0" >
  <label class="form-check-label" for="7question20013">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20014" name="pquestion58" value="0" >
  <label class="form-check-label" for="7question20014">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20015" name="pquestion58" value="0" >
  <label class="form-check-label" for="7question20015">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. I was certain<br />
B. the management meeting.<br />
C. be allowed to attend<br />
D. that subordinates would not<br />
</label>
						
   </div>
   
   
   <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="7question20016" name="pquestion68" value="0" required>
  <label class="form-check-label" for="7question20016">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20017" name="pquestion68" value="1" >
  <label class="form-check-label" for="7question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20018" name="pquestion68" value="0" >
  <label class="form-check-label" for="7question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="7question20019" name="pquestion68" value="0" >
  <label class="form-check-label" for="7question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>
   
   <?php if($communicationoratory == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php  } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>


<div id="travelandexploration" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Travel and Exploration</h4>
      </div>
      <div class="modal-body">
	 	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(9)'
	
]); ?>
   
   
	 
	    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="8question2000" name="pquestion19" value="1" required>
  <label class="form-check-label" for="8question2000">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2001" name="pquestion19" value="0" >
  <label class="form-check-label" for="8question2001">No</label>
</div>
 <label for="genderid" class="active">Do you like solving puzzles?</label>
						
   </div> 
   
    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="8question2002" name="pquestion29" value="1" required>
  <label class="form-check-label" for="8question2002">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2003" name="pquestion29" value="0" >
  <label class="form-check-label" for="8question2003">No</label>
</div>
 <label for="genderid" class="active">Do you play crosswords, Sudoko or jumbled words?</label>
						
   </div> 
   
   
   
       <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="8question2004" name="pquestion39" value="0" required >
  <label class="form-check-label" for="8question2004">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2005" name="pquestion39" value="0" >
  <label class="form-check-label" for="8question2005">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2006" name="pquestion39" value="0" >
  <label class="form-check-label" for="8question2006">adbc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2007" name="pquestion39" value="1" >
  <label class="form-check-label" for="8question2007">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.<br />A. She saw hir opportunity<br />
B. to make amends<br />
C. when he came to her home<br />
D. to borrow some sugar.<br />
</label>
						
   </div> 
   
   
        <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="8question2008" name="pquestion49" value="0" required>
  <label class="form-check-label" for="8question2008">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question2009" name="pquestion49" value="0" >
  <label class="form-check-label" for="8question2009">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20010" name="pquestion49" value="1" >
  <label class="form-check-label" for="8question20010">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20011" name="pquestion49" value="0" >
  <label class="form-check-label" for="8question20011">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. He danced with joy<br />
B. that he had topped<br />
C. when he found out<br />
D. the board examination.<br />
</label>
						
   </div> 
   
   
     <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="8question20012" name="pquestion59" value="1" required>
  <label class="form-check-label" for="8question20012">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20013" name="pquestion59" value="0" >
  <label class="form-check-label" for="8question20013">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20014" name="pquestion59" value="0" >
  <label class="form-check-label" for="8question20014">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20015" name="pquestion59" value="0" >
  <label class="form-check-label" for="8question20015">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. I was certain<br />
B. the management meeting.<br />
C. be allowed to attend<br />
D. that subordinates would not<br />
</label>
						
   </div>
   
   
   <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="8question20016" name="pquestion69" value="0" required>
  <label class="form-check-label" for="8question20016">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20017" name="pquestion69" value="1" >
  <label class="form-check-label" for="8question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20018" name="pquestion69" value="0" >
  <label class="form-check-label" for="8question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="8question20019" name="pquestion69" value="0" >
  <label class="form-check-label" for="8question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>
   
   <?php // if($travelandexploration == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

<div id="technologyaffiliation" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Technology</h4>
      </div>
      <div class="modal-body">
	 	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(10)'
	
]); ?>
   
   
	 
	    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				<label for="genderid" class="active">I am inclined to technology, I like reading and keeping myself abreast with new technology </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="9question2000" name="pquestion110" value="1" required>
  <label class="form-check-label" for="9question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question2001" name="pquestion110" value="0" >
  <label class="form-check-label" for="9question2001">False</label>
</div>
 
						
   </div> 
   	</div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
				<label for="genderid" class="active">I regularly visit the websites of technology companies and keep my self informed of the latest happenings </label>
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="9question2002" name="pquestion210" value="1" required>
  <label class="form-check-label" for="9question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question2003" name="pquestion210" value="0" >
  <label class="form-check-label" for="9question2003">False</label>
</div>
 
						
   </div> 
   	</div>
			</div>
   
   
   
       <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	   <label for="genderid" class="active">I have written articles online / technology magazines on areas of my interest 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="9question2004" name="pquestion310" value="1" required>
  <label class="form-check-label" for="9question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question2005" name="pquestion310" value="0" >
  <label class="form-check-label" for="9question2005">False</label>
</div>



 
			</div>
			</div>				
   </div> 
   
   
       <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I have gained expertise with computer programming on my own, I am good with programming languages 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="9question2008" name="pquestion410" value="1" required >
  <label class="form-check-label" for="9question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question2009" name="pquestion410" value="0" >
  <label class="form-check-label" for="9question2009">False</label>
</div>




						
   </div> 
   	</div>
			</div>
   
   
     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	  <label for="genderid" class="active">I like machines, I like to take them apart and put them back together
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 10px;">
  <input type="radio" class="form-check-input" id="9question20012" name="pquestion510" value="1" required>
  <label class="form-check-label" for="9question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question20013" name="pquestion510" value="0" >
  <label class="form-check-label" for="9question20013">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
   
   <!--<div class="md-form mb-0">
				
					
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="9question20016" name="pquestion610" value="0" required>
  <label class="form-check-label" for="9question20016">adcb</label>
</div>


<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question20017" name="pquestion610" value="1" >
  <label class="form-check-label" for="9question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question20018" name="pquestion610" value="0" >
  <label class="form-check-label" for="9question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="9question20019" name="pquestion610" value="0" >
  <label class="form-check-label" for="9question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>-->
   
   <?php //if($technologyaffiliation == '0') { ?>
   <button type="submit" class="btn ">Submit</button>
   <?php // } ?>

 <?= $this->Form->end(); ?>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

<div id="managementskills" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Management</h4>
      </div>
      <div class="modal-body">
	 	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(11)'
	
]); ?>
   
   
	 
	     <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">1.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">I am a disciplined person and like to make a detailed plan before I work on a project or organize a holiday </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="10question2000" name="pquestion111" value="1" required >
  <label class="form-check-label" for="10question2000">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="10question2001" name="pquestion111" value="0" >
  <label class="form-check-label" for="10question2001">False</label>
</div>

						
   </div> 
   	</div>
			</div>
   
    <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">2.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	<label for="genderid" class="active">I value time. I am usually on or before the time for any function, (eg seminar), exams, meetings or appointments (eg. at the dentist) </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="10question2002" name="pquestion211" value="1" required>
  <label class="form-check-label" for="10question2002">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="10question2003" name="pquestion211" value="0" >
  <label class="form-check-label" for="10question2003">False</label>
</div>
 
						
   </div> 
   	</div>
			</div>
   
   
   
        <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">3.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	    <label for="genderid" class="active">I have more than 90% attendance through my college days </label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="10question2004" name="pquestion311" value="1" required >
  <label class="form-check-label" for="10question2004">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="10question2005" name="pquestion311" value="0" >
  <label class="form-check-label" for="10question2005">False</label>
</div>




						
   </div> 
   	</div>
			</div>
   
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">4.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
		 <label for="genderid" class="active">Given a task, I usually finish on time. I think through deadlines and dependencies before I commit to when I can finish a task. 
</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 10px;">
  <input type="radio" class="form-check-input" id="10question2008" name="pquestion411" value="1" required>
  <label class="form-check-label" for="10question2008">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="10question2009" name="pquestion411" value="0" >
  <label class="form-check-label" for="10question2009">False</label>
</div>




						
   </div> 
   	</div>
			</div>
   
   
      <div class="card" style="margin-bottom: 10px;">
	  
	  <span style="    position: absolute;
    font-size: 35px;
    padding-left: 5px;
    padding-top: 14px;">5.</span>

          <!-- Card content -->
          <div class="card-body" style="padding-left: 50px;" >
            <div class="media ml-3" style="display:block !important">
	  <label for="genderid" class="active">Given a task, I usually finish on time. I somehow or the other complete it. I don't believe in planning for uncertainties but deal with them as it happens.</label>
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-bottom: 10px;">
  <input type="radio" class="form-check-input" id="10question20012" name="pquestion511" value="1" required>
  <label class="form-check-label" for="10question20012">True</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="10question20013" name="pquestion511" value="0" >
  <label class="form-check-label" for="10question20013">False</label>
</div>




						
   </div>
   	</div>
			</div>
   
   

   
   <?php //if($managementskills == '0') { ?>
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
   
   
   <div id="foriegnlanguages" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:60%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="">Foreign Languages</h4>
      </div>
      <div class="modal-body">
	 	<?php  echo $this->Form->create(null, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitpersonalityquestiuons(12)'
	
]); ?>
   
   
	 
	    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="11question2000" name="pquestion112" value="1" required>
  <label class="form-check-label" for="11question2000">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2001" name="pquestion112" value="0" >
  <label class="form-check-label" for="11question2001">No</label>
</div>
 <label for="genderid" class="active">Do you like solving puzzles?</label>
						
   </div> 
   
    <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;">
  <input type="radio" class="form-check-input" id="11question2002" name="pquestion212" value="1" required>
  <label class="form-check-label" for="11question2002">Yes</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2003" name="pquestion212" value="0" >
  <label class="form-check-label" for="11question2003">No</label>
</div>
 <label for="genderid" class="active">Do you play crosswords, Sudoko or jumbled words?</label>
						
   </div> 
   
   
   
       <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="11question2004" name="pquestion312" value="0" required >
  <label class="form-check-label" for="11question2004">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2005" name="pquestion312" value="0" >
  <label class="form-check-label" for="11question2005">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2006" name="pquestion312" value="0" >
  <label class="form-check-label" for="11question2006">adbc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2007" name="pquestion312" value="1" >
  <label class="form-check-label" for="11question2007">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.<br />A. She saw hir opportunity<br />
B. to make amends<br />
C. when he came to her home<br />
D. to borrow some sugar.<br />
</label>
						
   </div> 
   
   
        <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="11question2008" name="pquestion412" value="0"  required>
  <label class="form-check-label" for="11question2008">bcda</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question2009" name="pquestion412" value="0" >
  <label class="form-check-label" for="11question2009">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20010" name="pquestion412" value="1" >
  <label class="form-check-label" for="11question20010">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20011" name="pquestion412" value="0" >
  <label class="form-check-label" for="11question20011">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. He danced with joy<br />
B. that he had topped<br />
C. when he found out<br />
D. the board examination.<br />
</label>
						
   </div> 
   
   
     <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="11question20012" name="pquestion512" value="1" required >
  <label class="form-check-label" for="11question20012">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20013" name="pquestion512" value="0" >
  <label class="form-check-label" for="11question20013">bcad</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20014" name="pquestion512" value="0" >
  <label class="form-check-label" for="11question20014">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20015" name="pquestion512" value="0" >
  <label class="form-check-label" for="11question20015">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. I was certain<br />
B. the management meeting.<br />
C. be allowed to attend<br />
D. that subordinates would not<br />
</label>
						
   </div>
   
   
   <div class="md-form mb-0">
				
					  <!-- Material inline 1 -->
<div class="form-check form-check-inline" style=" padding: 11px;margin-top: 120px;">
  <input type="radio" class="form-check-input" id="11question20016" name="pquestion612" value="0" required>
  <label class="form-check-label" for="11question20016">adcb</label>
</div>

<!-- Material inline 2 -->
<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20017" name="pquestion612" value="1" >
  <label class="form-check-label" for="11question20017">badc</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20018" name="pquestion612" value="0" >
  <label class="form-check-label" for="11question20018">acbd</label>
</div>

<div class="form-check form-check-inline">
  <input type="radio" class="form-check-input" id="11question20019" name="pquestion612" value="0" >
  <label class="form-check-label" for="11question20019">abcd</label>
</div>

 <label for="genderid" class="active">In the question below, there is a sentence with jumbled up parts. Rearrange these parts, which are labelled A, B, C and D to produce the correct sentence. Choose the proper sequence.
<br />
A. stretching for maybe fifteen metres<br />
B. lay across the track in front of us<br />
C.  and the dirt track reappeared<br />
D. before it petered out<br />
</label>
						
   </div>
   
   <?php //if($foriegnlanguages == '0') { ?>
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
   
   
   