<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'exam';
	private $AUTH_USER = 'praveen';
	private $AUTH_PASS = '123456';
	private $has_supplied_credentials;

    // Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
      	 	public function encrypt($sData){
$id=(double)$sData*543544.456;
return base64_encode($id);
//return $id;
}
	 public function getcoupondeatils($couponcode,$modulecode){
     
	 	 
// $query = 'SELECT dateofbirth,problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     
	  $query = 'SELECT expiryflag,price from couponcode where couponcode ="'.trim($couponcode).'" and modulecode ="'.trim($modulecode).'" ';
     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    
		return  array($row['expiryflag'],$row['price']);
		
	 }
      		 	   // Get Posts
    public function getfinalgradenn($prod_cat,$userroles_id,$fcomps) {
      // Create query
        
       $arraa =  explode(',', $fcomps);
      

$result = "'" . implode ( "','", $arraa ) . "'";

    
	  
	$query = "SELECT  * from  studentscore where userid =".$prod_cat." and comparea_code in (".$result.") ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

  	   // Get Posts
    public function compereaname($prod_cat, $useridmoodle, $courseid) {
      // Create query
      $query = "SELECT  * from studentscore where code ='".$courseid."' and userid ='".$useridmoodle."' ";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		     public function getuserdetailsforrulddfdfdfes($uid){
     
	 	 
// $query = 'SELECT dateofbirth,problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     
	  $query = 'SELECT dateofbirth from users where id ="'.trim($uid).'"';
     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    
		$dateofbirth =  $row['dateofbirth'];
		
		if($dateofbirth == 0)
		{
			$returnnndfs =  0;
		}
		else 
		{
			
			
			/*******************************************************/
			
	$query = 'SELECT problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     

     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    
		$problemsolving =  $row['problemsolving'];
 $teamwork =  $row['teamwork'];
 $leadership =  $row['leadership'];
 $socialskils =  $row['socialskils'];
 $initative =  $row['initative'];
 $communicationspoken =  $row['communicationspoken'];
 $communicationwritten =  $row['communicationwritten'];
 $communicationoratory =  $row['communicationoratory'];
 $travelandexploration =  $row['travelandexploration'];
 $technologyaffiliation =  $row['technologyaffiliation'];
 $managementskills =  $row['managementskills'];
$foriegnlanguages =  $row['foriegnlanguages'];
		
		if($problemsolving == 0 || $teamwork == 0 || $leadership == 0 || $socialskils == 0 || $initative == 0 || $communicationspoken == 0 || $managementskills == 0 || $technologyaffiliation == 0)
		{
			$returnnndfs = 0;
		}
			/*******************************************************/
		else {	  
			  
			  
      $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="PG"';
   
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  if($stmt->rowCount() == 1)
	  {
		  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
		 if($yearpassout == 0)
		{
			$returnnndfs = 0;
		}
		else{
			$returnnndfs = 1;
		}
		
	  }
	  else
	  {
		 $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="UG"';

         $stmt = $this->conn->prepare($query);

         // Execute query
         $stmt->execute();
	     $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
		  if($yearpassout == 0)
		{
			$returnnndfs = 0;
		}
		else
		{
			$returnnndfs = 1;
		}
		   
	  }
		}
			
		}
		
		return $returnnndfs;
		
	  }
    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT code FROM ' . $this->table . '   ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			   // Get Posts
    public function lessonnamestatus($uid,$code) {
      // Create query
      $query = 'SELECT * FROM studentscore  where code = "'.$code.'" and userid = "'.$uid.'" ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    public function	examcompsexamname($temp) {
        
         $query = 'SELECT e.code as ecode
    FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id WHERE es.id = '.$temp;
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
	
	 public function getstudentdettt($companyid) {
	
	
	   $query = 'SELECT fname,lname,email from users where id ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['fname'],$row['lname'],$row['email']);
	 }
	
	
	
	
		   // Get Posts
    public function getinstitutreadmin() {
      // Create query
      $query = 'SELECT fname,email,event1,event2,event3,event4,event5 FROM users  where userroles_id = 3  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	   // Get Posts
    public function specilizationlist($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM specialization  where courseid = '.$prod_cat.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	   // Get Posts
    public function counmtrysytlist($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM states  where country_id = '.$prod_cat.'  ORDER BY id asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    
    
    
    	 public function depcomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.dep_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
FROM deps s
INNER JOIN depcomps sc
    on s.id = sc.dep_id
 WHERE s.code IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	 public function getsudentcluster($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
	 $thePostIdArray = explode(', ', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";
 
  $query = 'SELECT * from clusters WHERE code IN ('.$result.')';

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
    
	
	 public function getsudentclustertarget($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
	 $thePostIdArray = explode(', ', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";
 
 // $query = 'SELECT * from target WHERE clustercode IN ('.$result.')';
  
  
   $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where t.clustercode IN ('.$result.')';

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
	
	
	public function getsudentclusterstudentindustires($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
         $temp = $row['clustercode'];
		 
		 $a ="";
	   
	   $string = preg_replace('/\.$/', '', $temp); //Remove dot at end if exists
$array = explode(', ', $string); //split string into array seperated by ', '
foreach($array as $value) //loop over values
{
   // echo $value . PHP_EOL; //print value
	
	$a.='FIND_IN_SET("'.$value.'",clustercode)  or ';
	
}

/*echo rtrim($a, "or"); 


exit;
	   
	   
	   exit;
	 $thePostIdArray = explode(', ', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";*/
 
// SELECT * FROM industry WHERE FIND_IN_SET('CL07',`clustercode`) or FIND_IN_SET('CL09',`clustercode`);

  
  
   $query = 'SELECT * FROM industry WHERE '.$a.' ';
   
   
  $query1 =  substr_replace($query ,"",-4) ;
   
  

 
 
  $stmt = $this->conn->prepare($query1);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
	
	
	 public function getsudentclusterstudentcomapnies($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
	 $thePostIdArray = explode(', ', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";
 
 // $query = 'SELECT * from target WHERE clustercode IN ('.$result.')';
  
  
   $query = 'SELECT * from company where clustercode IN ('.$result.')';

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
    
    	 public function icccomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.icc_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
FROM iccs s
INNER JOIN icccomps sc
    on s.id = sc.icc_id
 WHERE s.code IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    	 public function semestercomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.semester_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
FROM semesters s
INNER JOIN semestercomps sc
    on s.id = sc.semester_id
 WHERE s.code IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
	
	 public function examcomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
     /* $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
	
	
	$query = 'SELECT * FROM targetcomps  WHERE targetcode IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
		 public function examsresultcomps($prod_cat) {
    
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	   $query = 'SELECT cm.name as cmname , tc.level as tclevel FROM targetcomps tc LEFT JOIN competencymasters cm ON trim(tc.competency_code) = trim(cm.code) where tc.target_id ='.$prod_cat.' ';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    
	 public function examsresult($prod_cat) {
      // Create query
	  
	 // if($prod_cat == NULL || $prod_cat == "") {
      
       $myArray = explode(',', $prod_cat);


	  $result = "'" . implode ( "', '", $myArray ) . "'";
	  
	/*  } else {
		  $result = '0';
	  }*/
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	   $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
     public function depresults($prod_cat) {
      // Create query
      
   /*    $myArray = explode(',', $prod_cat);


$result = "'" . implode ( "', '", $myArray ) . "'";*/
    
       $query = 'SELECT code,name FROM deps';
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
     public function iccresults($prod_cat) {
      // Create query
      
      /* $myArray = explode(',', $prod_cat);


$result = "'" . implode ( "', '", $myArray ) . "'";*/
    
       $query = 'SELECT code,name FROM iccs';
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
     public function semesterresult($prod_cat) {
      // Create query
      if($prod_cat == '4 Sem') {
      	
$result = '3';

	
$result1 = '6';
}

 else if($prod_cat == '2 Sem') {
      	
$result = '1';

	
$result1 = '2';
}
 else if($prod_cat == '6 Sem') {
      	
$result = '7';

	
$result1 = '12';
}
 else if($prod_cat == '8 Sem') {
      	
$result = '13';

	
$result1 = '20';
}
    
       $query = 'SELECT code,name FROM semesters where id BETWEEN "'.$result.'" AND "'.$result1.'"';
       
     // echo $query;
      // exit;
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function exam() {
      // Create query
      //$query = 'SELECT code,name FROM exam';
	   $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
     public function companycount() {
      // Create query
      $query = 'SELECT id,code,name,description FROM company ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
      public function industrycount() {
      // Create query
      $query = 'SELECT id FROM industry';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    	   // Get Posts
    public function examname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM target  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function compereanameidname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM company  where code = "'.$prod_cat.'"  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	
		   // Get Posts
    public function compereanameid($prod_cat) {
      // Create query
     // $query = 'SELECT companycode FROM target  where code = "'.$prod_cat.'"  ';
	  
	  
	
	   
	      $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where t.code ="'.$prod_cat.'"';
		
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function semnamename($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM semesters  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			   // Get Posts
    public function semnamenamedate($courseid,$moodleid) {
      // Create query
      $query = 'SELECT * FROM studentscore  where code = "'.$courseid.'" and  userid = "'.$moodleid.'" ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    		   // Get Posts
    public function iccname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM iccs  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
	
	  		   // Get Posts
    public function getgarduatio($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM graduation  where graduationcode = "'.$prod_cat.'"  ORDER BY graduationcode DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    		   // Get Posts
    public function depname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM deps  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	 public function comapnysearch($prod_cat){
      // Create query
      $query = 'SELECT id,code,name,description FROM company ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    public function examsearchrelated($prod_cat){
      // Create query
     // $query = 'SELECT code,name,description FROM company where industry_id ="'.$prod_cat.'" ORDER BY id DESC';
      $query = 'SELECT position,code,name,description FROM exam where company_id ="'.$prod_cat.'" ORDER BY id DESC';
      
      
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    	 public function comapnysearchrelated($prod_cat){
      // Create query
      $query = 'SELECT code,name,description FROM company where industry_id ="'.$prod_cat.'" ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    
    	 public function examsearchrelatedschdules($prod_cat){
      // Create query
      $query = 'SELECT id,date,location,eligibility,Selectionstages  FROM examschedule where exam_id ="'.$prod_cat.'" ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
     public function getsta($uid,$code){
      // Create query
      $query = 'SELECT *  FROM paymentdetails where userid ="'.$uid.'" and productcode ="'.$code.'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	  public function getuserdetailsforrules($uid){
     
	 	 
// $query = 'SELECT dateofbirth,problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     
	  $query = 'SELECT dateofbirth from users where id ="'.trim($uid).'"';
     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    
		$dateofbirth =  $row['dateofbirth'];
		
		if($dateofbirth == 0)
		{
			return 'dateofbirtherroe';
		}
		else 
		{
			
			
			/*******************************************************/
			
	$query = 'SELECT problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     

     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	    
		$problemsolving =  $row['problemsolving'];
 $teamwork =  $row['teamwork'];
 $leadership =  $row['leadership'];
 $socialskils =  $row['socialskils'];
 $initative =  $row['initative'];
 $communicationspoken =  $row['communicationspoken'];
 $communicationwritten =  $row['communicationwritten'];
 $communicationoratory =  $row['communicationoratory'];
 $travelandexploration =  $row['travelandexploration'];
 $technologyaffiliation =  $row['technologyaffiliation'];
 $managementskills =  $row['managementskills'];
$foriegnlanguages =  $row['foriegnlanguages'];
		
		if($problemsolving == 0 || $teamwork == 0 || $leadership == 0 || $socialskils == 0 || $initative == 0 || $communicationspoken == 0 || $managementskills == 0 || $technologyaffiliation == 0)
		{
			return 'personality';
		}
			/*******************************************************/
		else {	  
			  
			  
      $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="PG"';
   
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  if($stmt->rowCount() == 1)
	  {
		  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
		 if($yearpassout == 0)
		{
			return 'yearofpassout';
		}
		
	  }
	  else
	  {
		 $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="UG"';

         $stmt = $this->conn->prepare($query);

         // Execute query
         $stmt->execute();
	     $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
		  if($yearpassout == 0)
		{
			return 'yearofpassout';
		}
		   
	  }
		}
			
		}
		
		
		
	  }
	
	  public function getstataget($uid,$code,$tminage,$tmaxage,$year){
     
	 	 
// $query = 'SELECT dateofbirth,problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     
	  $query = 'SELECT dateofbirth from users where id ="'.trim($uid).'"';
     
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
        /* $problemsolving =  $row['problemsolving'];
 $teamwork =  $row['teamwork'];
 $leadership =  $row['leadership'];
 $socialskils =  $row['socialskils'];
 $initative =  $row['initative'];
 $communicationspoken =  $row['communicationspoken'];
 $communicationwritten =  $row['communicationwritten'];
 $communicationoratory =  $row['communicationoratory'];
 $travelandexploration =  $row['travelandexploration'];
 $technologyaffiliation =  $row['technologyaffiliation'];
 $managementskills =  $row['managementskills'];
$foriegnlanguages =  $row['foriegnlanguages'];*/
$dateofbirth =  $row['dateofbirth'];




 // Create query
      $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="PG"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  if($stmt->rowCount() == 1)
	  {
		  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
	  }
	  else
	  {
		   $query = 'SELECT yearpassout from ugpg where userid ="'.trim($uid).'" and type="UG"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $yearpassout = $row['yearpassout'];
		   
	  }

		
		 
		 $old_date = date('31-03-'.$yearpassout);              // returns Saturday, January 30 10 02:06:34
$old_date_timestamp = strtotime($old_date);
  $graduationyeardate = date('Y-m-d', $old_date_timestamp); 
 
            // returns Saturday, January 30 10 02:06:34
$old_date_timestamp = strtotime($dateofbirth);
  $dateob = date('Y-m-d', $old_date_timestamp); 
 



    $birthdate = new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $dateob))))));
    $today= new DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $graduationyeardate))))));           
    $age = $birthdate->diff($today)->y;
	
	
	
	/****************************************/
	$targetyear = date('31-03-'.$year);              // returns Saturday, January 30 10 02:06:34
$targetyeardate = strtotime($targetyear);
    $targetyearfinaldate = date('Y-m-d', $targetyeardate); 

  
     $todaytarget= new DateTime(date("Y-m-d",  strtotime($targetyearfinaldate)));

  
  
    $age1 = $birthdate->diff($todaytarget)->y.'.'.$birthdate->diff($todaytarget)->m;
	
	
  
	/********************************************/


//if(($age >= $tminage && $age <= $tmaxage) && ($age1 >= $tminage && $age1 <= $tmaxage))
	if(($age1 >= $tminage && $age1 <= $tmaxage) && ($yearpassout != 0 || $yearpassout != NULL))
	
	$agecondition = 1;
else
	$agecondition = 0;
	
     /* $query = 'SELECT id from targetrule where targetcode ="'.trim($code).'" and ( problemsolving <= "'.trim($problemsolving).'" 
and teamwork <= "'.trim($teamwork).'"

and leadership <= "'.trim($leadership).'"
and socialskils <= "'.trim($socialskils).'"
and initative <= "'.trim($initative).'"
and communicationspoken <= "'.trim($communicationspoken).'"
and communicationwritten <= "'.trim($communicationwritten).'"
and communicationorartory <= "'.trim($communicationoratory).'"
and travel <= "'.trim($travelandexploration).'"
and affiliation <= "'.trim($technologyaffiliation).'"
and managementskils <= "'.trim($managementskills).'"
and foreignlanguage <= "'.trim($foriegnlanguages).'")';
    
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();
	  
	  
	 return array($stmt,$agecondition);*/
	 
	 return $agecondition;
    }
    
	
	
	 public function getstatagetrank($uid,$code){
     
	 
	 
	  // Create query
      $query = 'SELECT problemsolving,teamwork,leadership,socialskils,initative,communicationspoken,communicationwritten,communicationoratory,travelandexploration,technologyaffiliation,managementskills,foriegnlanguages from users where id ="'.trim($uid).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         $problemsolving =  $row['problemsolving'];
 $teamwork =  $row['teamwork'];
 $leadership =  $row['leadership'];
 $socialskils =  $row['socialskils'];
 $initative =  $row['initative'];
 $communicationspoken =  $row['communicationspoken'];
 $communicationwritten =  $row['communicationwritten'];
 $communicationoratory =  $row['communicationoratory'];
 $travelandexploration =  $row['travelandexploration'];
 $technologyaffiliation =  $row['technologyaffiliation'];
 $managementskills =  $row['managementskills'];
$foriegnlanguages =  $row['foriegnlanguages'];
		 
		 
		 
		   // Create query
     /* $query = 'SELECT (1 - ((problemsolving - '.$problemsolving.')*2 + (teamwork - '.$teamwork.')*2 + (leadership - '.$leadership.')*2 +
  (socialskils - '.$socialskils.')*2 + (initative - '.$initative.')*2 + (communicationspoken - '.$communicationspoken.')*2 +
   (affiliation - '.$technologyaffiliation.')*2 + (managementskils - '.$managementskills.')*2  )) /8 as rankget  from targetrule where targetcode ="'.trim($code).'" ';
     */
   $query = ' SELECT (1 - (POWER((problemsolving - '.$problemsolving.'),2) + POWER((teamwork - '.$teamwork.'),2) + POWER((leadership - '.$leadership.'),2) 
  + POWER((socialskils - '.$socialskils.'),2) +
  POWER((initative - '.$initative.'),2) + POWER((communicationspoken - '.$communicationspoken.'),2) + POWER((affiliation - '.$technologyaffiliation.'),2) + 
  POWER((managementskils - '.$managementskills.'),2) ) /8) 
  as rankget from targetrule where targetcode ="'.trim($code).'" ';
  

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	   $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         /*$problemsolving1 =  $row['problemsolving'];
 $teamwork1 =  $row['teamwork'];
 $leadership1 =  $row['leadership'];
 $socialskils1 =  $row['socialskils'];
 $initative1 =  $row['initative'];
 $communicationspoken1 =  $row['communicationspoken'];
 $communicationwritten1 =  $row['communicationwritten'];
 $communicationoratory1 =  $row['communicationorartory'];
 $travelandexploration1 =  $row['travel'];
 $technologyaffiliation1 =  $row['affiliation'];
 $managementskills1 =  $row['managementskils'];
$foriegnlanguages1 =  $row['foreignlanguage'];

$rank = (1 - (($problemsolving1 - $problemsolving)*2 + ($teamwork1 - $teamwork)*2 + ($leadership1 - $leadership)*2 +
  ($socialskils1 - $socialskils)*2 + ($initative1 - $initative)*2 + ($communicationspoken1 - $communicationspoken)*2 +
   ($communicationwritten1 - $communicationwritten)*2 + ($communicationoratory1 - $communicationoratory)*2 + ($travelandexploration1 - $travelandexploration)*2 +
    ($technologyaffiliation1 - $technologyaffiliation)*2 + ($managementskills1 - $managementskills)*2 + ($foriegnlanguages1 - $foriegnlanguages)*2 )) /12;


	  
	  
	 return $rank;*/
	 
	 return $row['rankget'];
    }
    
    	public function gettopic($id)
		{
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://www.odinlearning.in/API/cmd/topic.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['code'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 
 public function getlevel($id)
		{
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://www.odinlearning.in/API/cmd/levelname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
	//	var_dump( $topiccodes);
	//exit;
		}
		
		public function getlesson($id)
		{
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://www.odinlearning.in/API/cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
    
    
	 public function industrysearch($prod_cat){
      // Create query
      $query = 'SELECT id,code,name,description FROM industry  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
		 public function getgradutionname($id){
       // Create query
      $query = 'SELECT name from courselist where id ="'.trim($id).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

 $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $stream = $row['name'];
		 }
	
		 public function getscoecount($code,$nsadfkj){
       // Create query
      $query = 'SELECT * from studentscore where userid ="'.trim($nsadfkj).'" and code="'.trim($code).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  return $stmt->rowCount();
		  
		 }
      
      		 public function getasignments($userid,$codeforassignment){

                 
       $query = 'SELECT * from assignments where userid ="'.trim($userid).'" and assignmentcode="'.trim($codeforassignment).'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
		  
		 }
	
		 public function getgradution($id){
       // Create query
      $query = 'SELECT stream,specialization from ugpg where userid ="'.trim($id).'" and type="PG"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  if($stmt->rowCount() == 1)
	  {
		  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $stream = $row['stream'];
		  $specialization = $row['specialization'];
	  }
	  else
	  {
		   $query = 'SELECT stream,specialization from ugpg where userid ="'.trim($id).'" and type="UG"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $stream = $row['stream'];
		  $specialization = $row['specialization'];
		   
	  }
	  
	  return array($stream,$specialization);
    }
	
		 public function userslist(){
      // Create query
      $query = 'SELECT DISTINCT u.id as uid,u.fname as ufname,u.lname as ulname,u.email as uemail,u.emailalternate as uemailalternate,u.phonenumber as uphonenumber, u.phonenumalter as uphonenumalter,u.moodleuid as umoodleuid FROM users u ORDER BY u.id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	
	
	public function userslistbytextsearch($searchstr){
      // Create query
     // $query = 'SELECT * FROM users  where category LIKE "%'.$searchstr.'%" ORDER BY id DESC';
	 
	 
	 $query = 'SELECT DISTINCT  u.id as uid,u.fname as ufname,u.lname as ulname ,u.moodleuid as umoodleuid
 FROM users u
LEFT JOIN areaofinterest ai ON trim(u.id) = trim(ai.userid)
LEFT JOIN projectexecuted pe ON trim(u.id) = trim(pe.userid)
LEFT JOIN internshipdetails ide ON trim(u.id) = trim(ide.userid)
LEFT JOIN hobiesandextracurricular he ON trim(u.id) = trim(he.userid)
LEFT JOIN electives el ON trim(u.id) = trim(el.userid)
LEFT JOIN coursesattended ca ON trim(u.id) = trim(ca.userid)
LEFT JOIN personaldetails pd ON trim(u.id) = trim(pd.userid)
 
 where (ai.name LIKE "%'.$searchstr.'%"  or ai.description LIKE "%'.$searchstr.'%"   or
 pe.name LIKE "%'.$searchstr.'%"  or pe.description LIKE "%'.$searchstr.'%"   or
 ide.name LIKE "%'.$searchstr.'%"  or ide.description LIKE "%'.$searchstr.'%"   or
 he.name LIKE "%'.$searchstr.'%"  or he.description LIKE "%'.$searchstr.'%"   or
 el.name LIKE "%'.$searchstr.'%"  or el.description LIKE "%'.$searchstr.'%"   or
 ca.name LIKE "%'.$searchstr.'%"  or ca.description LIKE "%'.$searchstr.'%"   or
 pd.name LIKE "%'.$searchstr.'%"  or pd.description LIKE "%'.$searchstr.'%" ) 
 
  ORDER BY u.id DESC';
	 
	 
	 
	  
	  // $query = 'SELECT distinct u.id as uid,u.fname as ufname,u.lname as ulname,u.email as uemail,u.emailalternate as uemailalternate,u.phonenumber as uphonenumber, u.phonenumalter as uphonenumalter,u.moodleuid as umoodleuid FROM users u LEFT JOIN ugpg c ON trim(u.id) = trim(c.userid) where (u.category LIKE "%'.$searchstr.'%" and c.type LIKE "%'.$educationtype.'%" ) ORDER BY u.id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	public function userslistserach($searchstr,$educationtype){
      // Create query
     // $query = 'SELECT * FROM users  where category LIKE "%'.$searchstr.'%" ORDER BY id DESC';
	 
	 
	 
	  
	   $query = 'SELECT DISTINCT u.id as uid,u.fname as ufname,u.lname as ulname,u.email as uemail,u.emailalternate as uemailalternate,u.phonenumber as uphonenumber, u.phonenumalter as uphonenumalter,u.moodleuid as umoodleuid FROM users u LEFT JOIN ugpg c ON trim(u.id) = trim(c.userid) where (u.category LIKE "%'.$searchstr.'%" and c.type LIKE "%'.$educationtype.'%" ) ORDER BY u.id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	public function examsearch($prod_cat){
      // Create query
     // $query = 'SELECT * FROM target where (name LIKE "%'.$prod_cat.'%" or code LIKE "%'.$prod_cat.'%") ORDER BY id DESC';
     // echo  $query;
    //  exit;
	
	 $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                                    FROM ' . $this->table . ' p
                                    LEFT JOIN
                                      categories c ON p.category_id = c.id
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->title = $row['title'];
          $this->body = $row['body'];
          $this->author = $row['author'];
          $this->category_id = $row['category_id'];
          $this->category_name = $row['category_name'];
    }
	
	
	public function getcompanyname($companycode) {
	
	  // Create query
      $query = 'SELECT name from company where code ="'.trim($companycode).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         return $row['name'];
		  // return $stmt;
	}
    	public function gettotalatatmpts($uid,$code) {
	
	  // Create query
      $query = 'SELECT attempts from studentscore where code ="'.trim($code).'" and userid ="'.trim($uid).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         return $row['attempts'];
		  // return $query;
	}
	
	public function getquizstatusfind($uid,$code) {
	
	  // Create query
      $query = 'SELECT score_in_percentage,passingscore_in_percentage from studentscore where code ="'.trim($code).'" and userid ="'.trim($uid).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

        
         if( $row['score_in_percentage'] >=  $row['passingscore_in_percentage'] )
		 {
		 return 'pass';
		 }
		 else 
		 {
			 return 'fail';
		 }
		  // return $query;
	}
      
      
      // Create Post
    public function savestudentassignment($userid,$studentcomment,$groupidforstudent,$codeforassignment,$filename,$assignmentnamestu,$assignmenturlstu,$compreacodeforassignment,$recordingfile) {
          // Create query
          $query = 'INSERT INTO assignments SET recordingfile = :recordingfile,userid = :userid, groupid = :groupid, stdentcomment = :stdentcomment, teachercomment = :teachercomment, filename = :filename, assignmentcode = :assignmentcode , url = :url , name = :name , compreacode = :compreacode';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
		  $this->recordingfile = htmlspecialchars(strip_tags($recordingfile));
          $this->userid = htmlspecialchars(strip_tags($userid));
          $this->groupid = htmlspecialchars(strip_tags($groupidforstudent));
          $this->stdentcomment = htmlspecialchars(strip_tags($studentcomment));
          $this->teachercomment = htmlspecialchars(strip_tags("No comments yet"));

         $this->filename = htmlspecialchars(strip_tags($filename));
          $this->assignmentcode = htmlspecialchars(strip_tags($codeforassignment));
           $this->url = htmlspecialchars(strip_tags($assignmenturlstu));
           $this->name = htmlspecialchars(strip_tags($assignmentnamestu));
          $this->compreacode = htmlspecialchars(strip_tags($compreacodeforassignment));

          // Bind data
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':recordingfile', $this->recordingfile);
          $stmt->bindParam(':groupid', $this->groupid);
          $stmt->bindParam(':stdentcomment', $this->stdentcomment);
          $stmt->bindParam(':teachercomment', $this->teachercomment);
          $stmt->bindParam(':filename', $this->filename);
          $stmt->bindParam(':assignmentcode', $this->assignmentcode);
           $stmt->bindParam(':url', $this->url);
          $stmt->bindParam(':name', $this->name);
         $stmt->bindParam(':compreacode', $this->compreacode);

          // Execute query
          if($stmt->execute()) {
            return "Submitted successfully.";
      }

     

      return $stmt->error;
    }
      
      
                      // Update Post
    public function updategrouptabwithcomps($compareacode,$groupid) {
          // Create query
         
        
         $query = 'UPDATE studentgroup SET compareacode = :compareacode  where id = :id';
        
        

          // Prepare statement
          $stmt = $this->conn->prepare($query);

         // Clean data
          $this->compareacode = htmlspecialchars(strip_tags($compareacode));
          $this->id = htmlspecialchars(strip_tags($groupid));
          

          // Bind data
          $stmt->bindParam(':compareacode', $this->compareacode);
          $stmt->bindParam(':id', $this->id);
      

          // Execute query
          if($stmt->execute()) {
            return "1";
          }

          return $stmt->error;
    }
      
          // Update Post
    public function savestudentassignmentupdate($userid,$studentcomment,$groupidforstudent,$codeforassignment,$filename) {
          // Create query
         
        
         $query = 'UPDATE assignments SET groupid = :groupid, stdentcomment = :stdentcomment, teachercomment = :teachercomment, filename = :filename where userid = :userid and assignmentcode = :assignmentcode';
        
        

          // Prepare statement
          $stmt = $this->conn->prepare($query);

         // Clean data
          $this->userid = htmlspecialchars(strip_tags($userid));
          $this->groupid = htmlspecialchars(strip_tags($groupidforstudent));
          $this->stdentcomment = htmlspecialchars(strip_tags($studentcomment));
          $this->teachercomment = htmlspecialchars(strip_tags("No comments yet"));

         $this->filename = htmlspecialchars(strip_tags($filename));
          $this->assignmentcode = htmlspecialchars(strip_tags($codeforassignment));

          // Bind data
          $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':groupid', $this->groupid);
          $stmt->bindParam(':stdentcomment', $this->stdentcomment);
          $stmt->bindParam(':teachercomment', $this->teachercomment);
          $stmt->bindParam(':filename', $this->filename);
          $stmt->bindParam(':assignmentcode', $this->assignmentcode);

          // Execute query
          if($stmt->execute()) {
            return "Submitted successfully.";
          }

          return $stmt->error;
    }

      
        // Update Post
    public function savestudentassignmentupdateteacheco($userid,$studentcomment,$codeforassignment) {
          // Create query
         
        
         $query = 'UPDATE assignments SET  teachercomment = :teachercomment where userid = :userid and assignmentcode = :assignmentcode';
        
        

          // Prepare statement
          $stmt = $this->conn->prepare($query);

         // Clean data
          $this->userid = htmlspecialchars(strip_tags($userid));
       
          $this->teachercomment = htmlspecialchars(strip_tags($studentcomment));

        
          $this->assignmentcode = htmlspecialchars(strip_tags($codeforassignment));

          // Bind data
          $stmt->bindParam(':userid', $this->userid);
       
          $stmt->bindParam(':teachercomment', $this->teachercomment);
       
          $stmt->bindParam(':assignmentcode', $this->assignmentcode);

          // Execute query
          if($stmt->execute()) {
            return "Submitted successfully.";
          }

          return $stmt->error;
    }

      
    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
	
		    // Create Post
    public function savestudentsstart($startdate,$uid,$type,$code,$attempts) {
		
		
		
          // Create query
          $query = 'INSERT INTO eventlog SET userid = :userid, type = :type, val1 = :val1, val2 = :val2, time = :time';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->userid = htmlspecialchars(strip_tags($uid));
          $this->type = htmlspecialchars(strip_tags($type));
        
          $this->val1 = htmlspecialchars(strip_tags($code));
		  $this->val2 = htmlspecialchars(strip_tags($attempts));
          $this->time = htmlspecialchars(strip_tags($startdate));
       

          // Bind data
          $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':type', $this->type);
          $stmt->bindParam(':val1', $this->val1);
          $stmt->bindParam(':val2', $this->val2);
		   $stmt->bindParam(':time', $this->time);
        

          // Execute query
          if($stmt->execute()) {
            return true;
			
			//return 'Done';
      }

      // Print error if something goes wrong
    //  printf("Error: %s.\n", $stmt->error);

      //return false;
	  return $stmt->error;
    }
	
	    // Create Post
    public function scorecrdforuser($comparea_code,$quiz_type,$totalscopre,$displayTime,$quizstartdate,$quizenddate,$nsadfkj,$timeLeft,$qurl,$qname,$passingscore_in_percentage,$code) {
		
		  // $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';
		
          // Create query
          $query = 'INSERT INTO studentscore SET comparea_code = :comparea_code, name = :name,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage , userid = :userid , timeconsumed = :timeconsumed, code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
		  $this->comparea_code = htmlspecialchars(strip_tags($comparea_code));
          $this->name = htmlspecialchars(strip_tags($qname));
		  $this->quiztype = htmlspecialchars(strip_tags($quiz_type));
          $this->url = htmlspecialchars(strip_tags($qurl));
          $this->duration = htmlspecialchars(strip_tags($timeLeft/60));
          $this->starttime = htmlspecialchars(strip_tags($quizstartdate));
		  $this->endtime = htmlspecialchars(strip_tags($quizenddate));
          $this->score_in_percentage = htmlspecialchars(strip_tags($totalscopre));
          $this->passingscore_in_percentage = htmlspecialchars(strip_tags($passingscore_in_percentage));
          $this->userid = htmlspecialchars(strip_tags($nsadfkj));
		   $this->timeconsumed = htmlspecialchars(strip_tags($displayTime));
		     $this->code = htmlspecialchars(strip_tags($code));

          // Bind data
		  $stmt->bindParam(':comparea_code', $this->comparea_code);
          $stmt->bindParam(':name', $this->name);
		    $stmt->bindParam(':quiztype', $this->quiztype);
          $stmt->bindParam(':url', $this->url);
          $stmt->bindParam(':duration', $this->duration);
          $stmt->bindParam(':starttime', $this->starttime);
		   $stmt->bindParam(':endtime', $this->endtime);
          $stmt->bindParam(':score_in_percentage', $this->score_in_percentage);
          $stmt->bindParam(':passingscore_in_percentage', $this->passingscore_in_percentage);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':timeconsumed', $this->timeconsumed);
		    $stmt->bindParam(':code', $this->code);

          // Execute query
          if($stmt->execute()) {
            //return true;
			
			return 'Done';
      }

      // Print error if something goes wrong
    //  printf("Error: %s.\n", $stmt->error);

      //return false;
	  return $stmt->error;
    }
	
	
		    // Create Post
    public function saceonlineclasses($code,$onlineclassname,$studentsgroupsclass,$startdattime,$enddattime,$onlineclassdescription) {
		
		
		  
		  $gettime = time();
		  
		  		  $stdate = date('Y-m-d H:i:s', strtotime($startdattime));
		  $startdattimenew =	str_replace(' ', 'T', $stdate);

  $endate = date('Y-m-d H:i:s', strtotime($enddattime));
		  $enddattimenew =	str_replace(' ', 'T', $endate);
		  
		  
		  
		/*  $startdattime ="2020-04-16T15:21:57";
$enddattime ="2020-04-16T16:21:57";*/

$start =  strtotime(date('Y-m-d H:i:s', strtotime($startdattimenew)));
$end =  strtotime(date('Y-m-d H:i:s', strtotime($enddattimenew)));
$mins = ($end - $start) / 60;



$data = array('topic' => $onlineclassname, 'type' => 2 ,'start_time' => $startdattimenew,'duration' => $mins,'timezone' => "Asia/Kolkata",'password' => "123456",'agenda' => "Online Class" ,array("settings"=>["registrants_email_notification"=>1]));                                                 
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.zoom.us/v2/users/me/meetings');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(          
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IkdGamZRbTFIUTUtdWtFUUNBaHdtNXciLCJleHAiOjE2NTAwODc3MjAsImlhdCI6MTU4NzAyOTg3MH0.XA6J-onm7ZSd-IpryvZIbct8soIHi_cgfaE4H_l5QKw",                                                                
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     

$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  
          $topiccodes = json_decode($response, true);
		//var_dump( $topiccodes);
		
	$meetingid =  	$topiccodes['id'];
	$meetingurl =  	$topiccodes['start_url'];
	$join_url =  	$topiccodes['join_url'];
  
  
}
		
        
          /*$query = 'INSERT INTO onlineclasses SET title = :title, studentgroup_id = :studentgroup_id,starttime = :starttime, endtime = :endtime, description = :description, meetingid = :meetingid, joinurl = :joinurl';

   
          $stmt = $this->conn->prepare($query);

        
		  $this->title = htmlspecialchars(strip_tags($onlineclassname));
          $this->studentgroup_id = htmlspecialchars(strip_tags($studentsgroupsclass));
		  $this->starttime = htmlspecialchars(strip_tags($startdattime));
          $this->endtime = htmlspecialchars(strip_tags($enddattime));
          $this->description = htmlspecialchars(strip_tags($onlineclassdescription));
		  $this->meetingid = htmlspecialchars(strip_tags($gettime));
		  $this->joinurl = htmlspecialchars(strip_tags('https://www.odinlearing.in'));
     

        
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':studentgroup_id', $this->studentgroup_id);
		    $stmt->bindParam(':starttime', $this->starttime);
          $stmt->bindParam(':endtime', $this->endtime);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':meetingid', $this->meetingid);
		   $stmt->bindParam(':joinurl', $this->joinurl);
   

       
          if($stmt->execute()) {
   
		
      }*/

      // Print error if something goes wrong
    //  printf("Error: %s.\n", $stmt->error);

      //return false;
	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO institutecalendar SET title = :title, studentgroup_id = :studentgroup_id,start = :starttime, end = :endtime, description = :description, meetingid = :meetingid, joinurl = :joinurl, code = :code, color = :color, ttype = :ttype';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		  $stdate = date('Y-m-d H:i:s', strtotime($startdattime));
		  $startdattimenew =	str_replace(' ', 'T', $stdate);

  $endate = date('Y-m-d H:i:s', strtotime($enddattime));
		  $enddattimenew =	str_replace(' ', 'T', $endate);
		  
          // Clean data
		  $this->title = htmlspecialchars(strip_tags($onlineclassname));
          $this->studentgroup_id = htmlspecialchars(strip_tags($studentsgroupsclass));
		  $this->start = htmlspecialchars(strip_tags($startdattimenew));
          $this->end = htmlspecialchars(strip_tags($enddattimenew));
          $this->description = htmlspecialchars(strip_tags($onlineclassdescription));
		  $this->meetingid = htmlspecialchars(strip_tags($meetingid));
		  $this->joinurl = htmlspecialchars(strip_tags($meetingurl));
		   $this->code = htmlspecialchars(strip_tags($code));
		    $this->color = htmlspecialchars(strip_tags('#82D1D8'));
			 $this->ttype = htmlspecialchars(strip_tags('ONLINECLASS'));
     

          // Bind data
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':studentgroup_id', $this->studentgroup_id);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':meetingid', $this->meetingid);
		   $stmt->bindParam(':joinurl', $this->joinurl);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':ttype', $this->ttype);
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
				   			  $query = 'INSERT INTO events SET meetingid = :meetingid , title = :title, courseid = :courseid,start = :starttime, end = :endtime, description = :description, userid = :userid, url = :url, code = :code, color = :color, type = :type';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		  $stdate = date('Y-m-d H:i:s', strtotime($startdattime));
		  $startdattimenew =	str_replace(' ', 'T', $stdate);

  $endate = date('Y-m-d H:i:s', strtotime($enddattime));
		  $enddattimenew =	str_replace(' ', 'T', $endate);
		  
          // Clean data
		  $this->title = htmlspecialchars(strip_tags($onlineclassname));
          $this->courseid = htmlspecialchars(strip_tags($studentsgroupsclass));
		  $this->start = htmlspecialchars(strip_tags($startdattimenew));
          $this->end = htmlspecialchars(strip_tags($enddattimenew));
          $this->description = htmlspecialchars(strip_tags($onlineclassdescription));
		  $this->userid = htmlspecialchars(strip_tags(0));
		  $this->url = htmlspecialchars(strip_tags($join_url));
		  	  $this->meetingid = htmlspecialchars(strip_tags($meetingid));
		   $this->code = htmlspecialchars(strip_tags($code));
		    $this->color = htmlspecialchars(strip_tags('#82D1D8'));
			 $this->type = htmlspecialchars(strip_tags('OC'));
     

          // Bind data
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':courseid', $this->courseid);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':url', $this->url);
		     $stmt->bindParam(':meetingid', $this->meetingid);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':type', $this->type);
				 $stmt->execute();
				   /*******************************************************************************************************************************************/
   
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
			    // Create Post
    public function savattendancesheet($attendancetype,$attandancecompare,$attandancecompareval,$attandancetopiocs,$attandancetopiocscal,
	$atatdnavcestartdate,$attendanceendtaer,$group,$attandenceforstu,$loggeduserid) {
		
		
		 
	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO attendance SET userid = :userid, type =:type, compid =:compid, 
			  topicid = :topicid, compname = :compname,topicname = :topicname, startdate = :startdate, 
			  enddate = :enddate, groupid = :groupid, studentid = :studentid, 
			  loguserid = :loguserid
			  ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		
		  
          // Clean data
		  $this->userid = htmlspecialchars(strip_tags($loggeduserid));
          $this->type = htmlspecialchars(strip_tags($attendancetype));
		  $this->compid = htmlspecialchars(strip_tags($attandancecompareval));
          $this->topicid = htmlspecialchars(strip_tags($attandancetopiocscal));
          $this->compname = htmlspecialchars(strip_tags($attandancecompare));
		  $this->topicname = htmlspecialchars(strip_tags($attandancetopiocs));
		  $this->startdate = htmlspecialchars(strip_tags($atatdnavcestartdate));
		   $this->enddate = htmlspecialchars(strip_tags($attendanceendtaer));
		    $this->groupid = htmlspecialchars(strip_tags($group));
			 $this->studentid = htmlspecialchars(strip_tags($attandenceforstu));
			  $this->loguserid = htmlspecialchars(strip_tags($loggeduserid));
			  
     

          // Bind data
		  $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':type', $this->type);
		    $stmt->bindParam(':compid', $this->compid);
          $stmt->bindParam(':topicid', $this->topicid);
          $stmt->bindParam(':compname', $this->compname);
          $stmt->bindParam(':topicname', $this->topicname);
		   $stmt->bindParam(':startdate', $this->startdate);
		     $stmt->bindParam(':enddate', $this->enddate);
			   $stmt->bindParam(':groupid', $this->groupid);
			     $stmt->bindParam(':studentid', $this->studentid);
				   $stmt->bindParam(':loguserid', $this->loguserid);
				     
		       if($stmt->execute()) {
				  
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
		    // Create Post
    public function saceffclasses($topiccode,$topicname,$dow,$groupid,$starttime,$endtime,$startdattime11,$enddattime11,$desc,$color) {
		
		
		  
		  $gettime = $topiccode.time();
		  
		  		  $stdate = date('Y-m-d', strtotime($startdattime11));


  $endate = date('Y-m-d', strtotime($enddattime11));

		  
		
	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO institutecalendar SET startdate = :startdate, enddate =:enddate, dow =:dow, title = :title, studentgroup_id = :studentgroup_id,start = :starttime, end = :endtime, description = :description, meetingid = :meetingid, joinurl = :joinurl, code = :code, color = :color, ttype = :ttype';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		
		  
          // Clean data
		  $this->title = htmlspecialchars(strip_tags($topicname));
          $this->studentgroup_id = htmlspecialchars(strip_tags($groupid));
		  $this->start = htmlspecialchars(strip_tags($starttime));
          $this->end = htmlspecialchars(strip_tags($endtime));
          $this->description = htmlspecialchars(strip_tags($desc));
		  $this->meetingid = htmlspecialchars(strip_tags($gettime));
		  $this->joinurl = htmlspecialchars(strip_tags('-'));
		   $this->code = htmlspecialchars(strip_tags($topiccode));
		    $this->color = htmlspecialchars(strip_tags($color));
			 $this->ttype = htmlspecialchars(strip_tags('SEM'));
			  $this->dow = htmlspecialchars(strip_tags($dow));
			   $this->startdate = htmlspecialchars(strip_tags($stdate));
			    $this->enddate = htmlspecialchars(strip_tags($endate));
     

          // Bind data
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':studentgroup_id', $this->studentgroup_id);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':meetingid', $this->meetingid);
		   $stmt->bindParam(':joinurl', $this->joinurl);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':ttype', $this->ttype);
				   $stmt->bindParam(':dow', $this->dow);
				     $stmt->bindParam(':startdate', $this->startdate);
					   $stmt->bindParam(':enddate', $this->enddate);
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
			  $query = 'INSERT INTO events SET startdate = :startdate, enddate =:enddate, dow =:dow,meetingid = :meetingid , title = :title, courseid = :courseid,start = :starttime, end = :endtime, description = :description, userid = :userid, url = :url, code = :code, color = :color, type = :type';

       
          $stmt = $this->conn->prepare($query);
		  
		 
		  
    
		  $this->title = htmlspecialchars(strip_tags($topicname));
          $this->courseid = htmlspecialchars(strip_tags($groupid));
		  $this->start = htmlspecialchars(strip_tags($starttime));
          $this->end = htmlspecialchars(strip_tags($endtime));
          $this->description = htmlspecialchars(strip_tags($desc));
		  $this->userid = htmlspecialchars(strip_tags(0));
		  $this->url = htmlspecialchars(strip_tags('-'));
		  	  $this->meetingid = htmlspecialchars(strip_tags($gettime));
		   $this->code = htmlspecialchars(strip_tags($topiccode));
		    $this->color = htmlspecialchars(strip_tags($color));
			 $this->type = htmlspecialchars(strip_tags('SEM'));
			   $this->dow = htmlspecialchars(strip_tags($dow));
			   $this->startdate = htmlspecialchars(strip_tags($stdate));
			    $this->enddate = htmlspecialchars(strip_tags($endate));
     

         
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':courseid', $this->courseid);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':url', $this->url);
		     $stmt->bindParam(':meetingid', $this->meetingid);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':type', $this->type);
				    $stmt->bindParam(':dow', $this->dow);
				     $stmt->bindParam(':startdate', $this->startdate);
					   $stmt->bindParam(':enddate', $this->enddate);
				 $stmt->execute();
				   /*******************************************************************************************************************************************/
   
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
		// Create Post
    public function savemarksforstudents($useridlog,$uid,$markstype,$listofmarkscomname,$listdoftopicsmarksname,$marksscore,$markapssing,$markssmax,$listofmarkscom,$listdoftopicsmarks) {
		
	

		  if($marksscore >= $markapssing)
			  $topiccode ='Pass';
		 else
			 $topiccode ="Fail";
	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO markscard SET loguserid = :loguserid , userid = :userid, type =:type, compid =:compid, topicid = :topicid, 
			  score = :score,passscore = :passscore, maxscore = :maxscore, status = :status, compareaname = :compareaname,
			  topicname = :topicname';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		 $this->loguserid = htmlspecialchars(strip_tags($useridlog));
		  
          // Clean data
		  $this->userid = htmlspecialchars(strip_tags($uid));
          $this->type = htmlspecialchars(strip_tags($markstype));
		  $this->compid = htmlspecialchars(strip_tags($listofmarkscom));
          $this->topicid = htmlspecialchars(strip_tags($listdoftopicsmarks));
          $this->score = htmlspecialchars(strip_tags($marksscore));
		  $this->passscore = htmlspecialchars(strip_tags($markapssing));
		  $this->maxscore = htmlspecialchars(strip_tags($markssmax));
		   $this->status = htmlspecialchars(strip_tags($topiccode));
		    $this->compareaname = htmlspecialchars(strip_tags($listofmarkscomname));
			 $this->topicname = htmlspecialchars(strip_tags($listdoftopicsmarksname));
			 
     

          // Bind data
		   $stmt->bindParam(':loguserid', $this->loguserid);
		  $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':type', $this->type);
		    $stmt->bindParam(':compid', $this->compid);
          $stmt->bindParam(':topicid', $this->topicid);
          $stmt->bindParam(':score', $this->score);
          $stmt->bindParam(':passscore', $this->passscore);
		   $stmt->bindParam(':maxscore', $this->maxscore);
		     $stmt->bindParam(':status', $this->status);
			   $stmt->bindParam(':compareaname', $this->compareaname);
			     $stmt->bindParam(':topicname', $this->topicname);
				   
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
	
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	// Create Post
    public function savevoideodss($videotittle,$videocategpy,$videodepartment,$videourl,$videovisson,$videoorder) {
		
	

	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO videogallery SET title = :title , category = :category, department =:department, videourl =:videourl,
			  display = :display, ordervideo = :ordervideo';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		
		  $this->title = htmlspecialchars(strip_tags($videotittle));
          $this->category = htmlspecialchars(strip_tags($videocategpy));
		  $this->department = htmlspecialchars(strip_tags($videodepartment));
          $this->videourl = htmlspecialchars(strip_tags($videourl));
          $this->display = htmlspecialchars(strip_tags($videovisson));
		  $this->ordervideo = htmlspecialchars(strip_tags($videoorder));
		 
			 
     

          // Bind data
		   $stmt->bindParam(':title', $this->title);
		  $stmt->bindParam(':category', $this->category);
          $stmt->bindParam(':department', $this->department);
		    $stmt->bindParam(':videourl', $this->videourl);
          $stmt->bindParam(':display', $this->display);
          $stmt->bindParam(':ordervideo', $this->ordervideo);
         
				   
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
	
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
	// Create Post
    public function savevoideodssree($videotittle,$videocategpy,$videodepartment,$videourl,$videovisson,$videoorder,$filepreview_image) {
		
	

	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO fileresources SET filepreview_image = :filepreview_image, title = :title , category = :category, department =:department, videourl =:videourl,
			  display = :display, ordervideo = :ordervideo';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  $this->filepreview_image = htmlspecialchars(strip_tags($filepreview_image));
		
		  $this->title = htmlspecialchars(strip_tags($videotittle));
          $this->category = htmlspecialchars(strip_tags($videocategpy));
		  $this->department = htmlspecialchars(strip_tags($videodepartment));
          $this->videourl = htmlspecialchars(strip_tags($videourl));
          $this->display = htmlspecialchars(strip_tags($videovisson));
		  $this->ordervideo = htmlspecialchars(strip_tags($videoorder));
		 
			 
     
   $stmt->bindParam(':filepreview_image', $this->filepreview_image);
          // Bind data
		   $stmt->bindParam(':title', $this->title);
		  $stmt->bindParam(':category', $this->category);
          $stmt->bindParam(':department', $this->department);
		    $stmt->bindParam(':videourl', $this->videourl);
          $stmt->bindParam(':display', $this->display);
          $stmt->bindParam(':ordervideo', $this->ordervideo);
         
				   
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
	
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
	    // Create Post
    public function savemoreeventfromcal($topiccode,$topicname,$dow,$groupid,$starttime,$endtime,$startdattime11,$enddattime11,$desc,$color,$title,$type) {
		
		
		  
		  $gettime = $topiccode.time();
		  
		  		  $stdate = date('Y-m-d', strtotime($startdattime11));


  $endate = date('Y-m-d', strtotime($enddattime11));
  
    $endaten = date('Y-m-d H:i:s', strtotime($starttime));
		  $examdatedate =	str_replace(' ', 'T', $endaten);

		  
		
	  
	  	/************************************************************************************************/
			  $query = 'INSERT INTO institutecalendar SET startdate = :startdate, enddate =:enddate, dow =:dow, title = :title, studentgroup_id = :studentgroup_id,start = :starttime, end = :endtime, description = :description, meetingid = :meetingid, joinurl = :joinurl, code = :code, color = :color, ttype = :ttype';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  
		
		  
          // Clean data
		  $this->title = htmlspecialchars(strip_tags($title));
          $this->studentgroup_id = htmlspecialchars(strip_tags($groupid));
		  $this->start = htmlspecialchars(strip_tags($examdatedate));
          $this->end = htmlspecialchars(strip_tags($examdatedate));
          $this->description = htmlspecialchars(strip_tags($desc));
		  $this->meetingid = htmlspecialchars(strip_tags($gettime));
		  $this->joinurl = htmlspecialchars(strip_tags('-'));
		   $this->code = htmlspecialchars(strip_tags($topiccode));
		    $this->color = htmlspecialchars(strip_tags($color));
			 $this->ttype = htmlspecialchars(strip_tags($type));
			  $this->dow = htmlspecialchars(strip_tags($dow));
			   $this->startdate = htmlspecialchars(strip_tags($stdate));
			    $this->enddate = htmlspecialchars(strip_tags($endate));
     

          // Bind data
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':studentgroup_id', $this->studentgroup_id);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':meetingid', $this->meetingid);
		   $stmt->bindParam(':joinurl', $this->joinurl);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':ttype', $this->ttype);
				   $stmt->bindParam(':dow', $this->dow);
				     $stmt->bindParam(':startdate', $this->startdate);
					   $stmt->bindParam(':enddate', $this->enddate);
		       if($stmt->execute()) {
				   /*************************************************************************************************************/
			  $query = 'INSERT INTO events SET startdate = :startdate, enddate =:enddate, dow =:dow,meetingid = :meetingid , title = :title, courseid = :courseid,start = :starttime, end = :endtime, description = :description, userid = :userid, url = :url, code = :code, color = :color, type = :type';

       
          $stmt = $this->conn->prepare($query);
		  
		 
		  
    
		  $this->title = htmlspecialchars(strip_tags($title));
          $this->courseid = htmlspecialchars(strip_tags($groupid));
		  $this->start = htmlspecialchars(strip_tags($examdatedate));
          $this->end = htmlspecialchars(strip_tags($examdatedate));
          $this->description = htmlspecialchars(strip_tags($desc));
		  $this->userid = htmlspecialchars(strip_tags(0));
		  $this->url = htmlspecialchars(strip_tags('-'));
		  	  $this->meetingid = htmlspecialchars(strip_tags($gettime));
		   $this->code = htmlspecialchars(strip_tags($topiccode));
		    $this->color = htmlspecialchars(strip_tags($color));
			 $this->type = htmlspecialchars(strip_tags($type));
			   $this->dow = htmlspecialchars(strip_tags($dow));
			   $this->startdate = htmlspecialchars(strip_tags($stdate));
			    $this->enddate = htmlspecialchars(strip_tags($endate));
     

         
		  $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':courseid', $this->courseid);
		    $stmt->bindParam(':starttime', $this->start);
          $stmt->bindParam(':endtime', $this->end);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':url', $this->url);
		     $stmt->bindParam(':meetingid', $this->meetingid);
		     $stmt->bindParam(':code', $this->code);
			   $stmt->bindParam(':color', $this->color);
			     $stmt->bindParam(':type', $this->type);
				    $stmt->bindParam(':dow', $this->dow);
				     $stmt->bindParam(':startdate', $this->startdate);
					   $stmt->bindParam(':enddate', $this->enddate);
				 $stmt->execute();
				   /*******************************************************************************************************************************************/
   
		return 'Details saved successfully';
	  
      }
   
			/**************************************************************************************************/
			
	  return $stmt->error;
    }
	
	    // Update Post
    public function updateeventcalendarforqu($uid,$code,$stime,$etime) {
		
				  $stdate = date('Y-m-d H:i:s', strtotime($stime));
		  $startdattimenew =	str_replace(' ', 'T', $stdate);

  $endate = date('Y-m-d H:i:s', strtotime($etime));
		  $enddattimenew =	str_replace(' ', 'T', $endate);

          // Create query
          $query = 'UPDATE events
                                SET color = :color, start = :start, end = :end, completionflag = :completionflag
                                WHERE userid = :userid and code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->color = htmlspecialchars(strip_tags('#899194'));
          $this->completionflag = htmlspecialchars(strip_tags(1));
		
          $this->userid = htmlspecialchars(strip_tags($uid));
          $this->code = htmlspecialchars(strip_tags($code));
		  $this->start = htmlspecialchars(strip_tags($startdattimenew));
		  $this->end = htmlspecialchars(strip_tags($enddattimenew));
       

          // Bind data
          $stmt->bindParam(':color', $this->color);
          $stmt->bindParam(':completionflag', $this->completionflag);

          $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':code', $this->code);
		    $stmt->bindParam(':start', $this->start);
			  $stmt->bindParam(':end', $this->end);
      

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
	
		 	   // Get Posts
    public function getfinalgrade($useridmoodle) {
      // Create query
    
	  
	$query = "SELECT  * from  studentscore where userid =".$useridmoodle." ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 	   // Get Posts
    public function getallvideos($limit,$start) {
      // Create query
    
	  
	$query = "SELECT * FROM videogallery where  display=1 and ordervideo between ".$start." and ".$limit." order by ordervideo asc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
			 	   // Get Posts
    public function getallvideosresouces($limit,$start) {
      // Create query
    
	  
	$query = "SELECT * FROM fileresources where  display=1 and ordervideo between ".$start." and ".$limit." order by ordervideo asc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 	   // Get Posts
    public function getallvideos1($limit,$start,$filter) {
      // Create query
    
	  
	$query = "SELECT * FROM videogallery where  category='".$filter."' and display=1 and ordervideo between ".$start." and ".$limit." order by ordervideo asc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 	   // Get Posts
    public function getallvideos2($limit,$start,$filter) {
      // Create query
    
	  
	$query = "SELECT * FROM videogallery where  department='".$filter."' and display=1 and ordervideo between ".$start." and ".$limit." order by ordervideo asc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	public function getvideofgaco()
	{
	
	$query = 'SELECT * from videogallery where display=1';
   
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	return $stmt->rowCount();
	}
	public function getvideofgaco1($val)
	{
	
	$query = 'SELECT * from videogallery where category="'.$val.'" and display=1';
   
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	return $stmt->rowCount();
	}
	
	public function getvideofgaco2($val)
	{
	
	$query = 'SELECT * from videogallery where department="'.$val.'" and display=1';
   
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	return $stmt->rowCount();
	}
			 	   // Get Posts
    public function getfinalgrademarks($useridmoodle,$loguserid) {
      // Create query
    
	  
	//$query = "SELECT  * from  markscard where userid =".$useridmoodle." and loguserid =".$loguserid." ORDER BY id";

$query = "SELECT  * from  markscard where userid =".$useridmoodle."  ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	    public function getallatandecad($loguserid) {
      

               $input = '0';
$list = $loguserid;

$array1 = Array($input);
$array2 = explode(',', $list);
$array3 = array_diff($array2, $array1);

$output = implode(',', $array3);
            
            
$locArray = explode(',', $output);
$locQuery = implode(' OR ', array_map(function($locArray) { return "FIND_IN_SET($locArray, studentid)"; }, $locArray));

            

            $query = "SELECT * FROM attendance where ($locQuery)  ORDER BY id DESC";



      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
				 	   // Get Posts
    public function getfinalgrademarkskjjkkjkjd($topicid,$userid,$comp) {
      // Create query
    
	  
	$query = "SELECT  * from  markscard where userid =".$userid." and topicid =".$topicid." and compid=".$comp."  ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
      
      	
		 	   // Get Posts
    public function lisallgroupssms() {
      // Create query
    
	  
	$query = "SELECT  * from  studentgroup";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

            	 public function getcomparvchkd($codeforassignment, $userid) {
	
	
	   $query = 'SELECT compreacode from assignments where userid ="'.trim($userid).'" and assignmentcode ="'.trim($codeforassignment).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $row['compreacode'];
	 }
      
                  		 	   // Get Posts
    public function getallsssignnn($useridmoodle,$fcomps) {
      // Create query
    
                
       $arraa =  explode(',', $fcomps);
      

$result = "'" . implode ( "','", $arraa ) . "'";

    
	  
	$query = "SELECT  * from  assignments where userid =".$useridmoodle." and compreacode in (".$result.") ORDER BY id";
	  
//	$query = "SELECT  * from  assignments where userid =".$useridmoodle." ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
					 	   // Get Posts
    public function getstudentcommentsandasignment($userid,$codeforassignment,$groupidforstudent) {
			$query = "SELECT recordingfile,stdentcomment,teachercomment,filename from assignments where userid =".$userid."  and assignmentcode ='".$codeforassignment."'";
 
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	    

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  include "../config/myconfig.php";
	 
   if($row['filename'] != "")
     {
       $file = $config['MyConf']['mainurl'].'sms/upload/'.$row['filename'];
      $attachemnt = '<a target="_blank" href='.$file.'><i class="w-fa fas fa-download"></i> Download the attachment</a>';
        
     } 
     else
        {
            $attachemnt ="";
        }
		
		if($row['recordingfile'] != "")
     {
		 $file = $config['MyConf']['mainurl'].'sms/upload/'.$row['recordingfile'];
       
	   $recordings = '<video class="video-fluid z-depth-1" controls><source src='.$file.' type="video/webm" /></video>';
        
     } 
     else
        {
            $recordings ="";
        }
	  
	
         
         return $score_in_percentage = $row['stdentcomment'] ."<br />".$attachemnt."<br />".$recordings;
	}
      
      					 	   // Get Posts
    public function getstudentcommentsandasignmentnew($userid,$codeforassignment,$groupidforstudent) {
			$query = "SELECT stdentcomment,teachercomment,filename from assignments where userid =".$userid." and assignmentcode ='".$codeforassignment."'";
 
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	    

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
   /*if($row['filename'] != "")
     {
       $file = 'http://napi.odinlearning.in/sms/upload/'.$row['filename'];
      $attachemnt = '<a target="_blank" href='.$file.'><i class="w-fa fas fa-download"></i> Download the attachment</a>';
        
     } 
     else
        {
            $attachemnt ="";
        }*/
	  
	
         
         return $score_in_percentage = $row['teachercomment'];
	}
      
      
	
      
				 	   // Get Posts
    public function getfinalgradealldatepasscount($userid,$compcode) {
			$query = "SELECT count(*) as passfail from studentscore where userid =".$userid." and comparea_code='".$compcode."' and  cast(score_in_percentage as int) >= cast(passingscore_in_percentage as int) and quiztype != 'Lesson'";
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         return $score_in_percentage = $row['passfail'];
	}
	
					 	   // Get Posts
    public function getfinalgradealldatepasscountfail($userid,$compcode) {
			$query = "SELECT count(*) as passfail from studentscore where userid =".$userid." and comparea_code='".$compcode."' and  cast(score_in_percentage as int) < cast(passingscore_in_percentage as int) and quiztype != 'Lesson'";
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         return $score_in_percentage = $row['passfail'];
	}
		
			 	   // Get Posts
    public function getfinalgradealldatenew($userid,$compcode) {
		
		
		
	
		
		
      // Create query
    
	  
	$query = "SELECT * from  studentscore where userid =".$userid." and comparea_code='".$compcode."'";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 	   // Get Posts
    public function getfinalgradealldate($userid,$compcode) {
		
		
		
	
		
		
      // Create query
    
	  
	$query = "SELECT  count(*) as totalquiz, sum(attempts) as totalattempts ,sum(score_in_percentage) as score_in_percentage  from  studentscore where userid =".$userid." and quiztype !='Lesson' and  comparea_code='".$compcode."'";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		 	   // Get Posts
    public function getfinalgradenew($userid,$code) {
      // Create query
    
	  
	$query = "SELECT  * from  studentscore where userid =".$userid."  and code = '".$code."' ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 	   // Get Posts
    public function getalltheventlogs($userid) {
      // Create query
    
	  
	$query = "SELECT * FROM eventlog WHERE DATE(time) >= DATE(NOW()) - INTERVAL 30 DAY and userid =".$userid." order by id desc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
				 	   // Get Posts
    public function getalltheventlogsnew($userid,$dateval) {
      // Create query
    

	$query = "SELECT * FROM eventlog WHERE date_format(time, '%d-%m-%Y') LIKE '%".$dateval."%' and (userid =".$userid.") order by id desc";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
      
      	    // Create Post
    public function updatescorecrdforusernew($comparea_code,$quiz_type,$scoring_method,$totalscopre,$displayTime,$quizstartdate,$quizenddate,$nsadfkj,$timeLeft,$qurl,$qname,$passingscore_in_percentage,$code) {
         

$query = 'SELECT attempts,score_in_percentage from studentscore where code ="'.trim($code).'" and userid ="'.trim($nsadfkj).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         $score_in_percentage = $row['score_in_percentage'];
		 
		 
		 
		if(strtoupper($scoring_method) == 'FIRST')
		{
			$totalscopre = $score_in_percentage;
            	 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}	
        else if(strtoupper($scoring_method) == 'LAST')
		{
			$totalscopre = $totalscopre;
				 // Create query
        /*  $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
		}	
           else if(strtoupper($scoring_method) == 'LASTNEW')
		{
			$totalscopre = $totalscopre;
               	 // Create query
          /*$query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed where  userid = :userid and code = :code';*/
			
		}	
        
        
		 else if(strtoupper($scoring_method) == 'HIGHEST')
		{
			$totalscopre = max($totalscopre,$score_in_percentage);
             	 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}	
		 else if(strtoupper($scoring_method) == 'AVERAGE')
		{
			//$totalscopre = 'hjshafhrf';
			
			$totalscopre = (($row['score_in_percentage'] * $row['attempts']) + $totalscopre ) / ($row['attempts'] + 1) ;
			
			//$totalscopre = $row['score_in_percentage'] .' '. $row['attempts'] .' '. $totalscopre .'  '. $row['attempts'] + 1 ;
			
				 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}
        
       // return strtoupper($scoring_method);
        
           $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = 1 where  userid = :userid and code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
		   $this->comparea_code = htmlspecialchars(strip_tags($comparea_code));
          $this->name = htmlspecialchars(strip_tags($qname));
		    $this->quiztype = htmlspecialchars(strip_tags($quiz_type));
          $this->url = htmlspecialchars(strip_tags($qurl));
          $this->duration = htmlspecialchars(strip_tags($timeLeft/60));
          $this->starttime = htmlspecialchars(strip_tags($quizstartdate));
		  $this->endtime = htmlspecialchars(strip_tags($quizenddate));
          $this->score_in_percentage = htmlspecialchars(strip_tags($totalscopre));
          $this->passingscore_in_percentage = htmlspecialchars(strip_tags($passingscore_in_percentage));
          $this->userid = htmlspecialchars(strip_tags($nsadfkj));
		   $this->timeconsumed = htmlspecialchars(strip_tags($displayTime));
		     $this->code = htmlspecialchars(strip_tags($code));

          // Bind data
		     $stmt->bindParam(':comparea_code', $this->comparea_code);
          $stmt->bindParam(':name', $this->name);
		   $stmt->bindParam(':quiztype', $this->quiztype);
          $stmt->bindParam(':url', $this->url);
          $stmt->bindParam(':duration', $this->duration);
          $stmt->bindParam(':starttime', $this->starttime);
		   $stmt->bindParam(':endtime', $this->endtime);
          $stmt->bindParam(':score_in_percentage', $this->score_in_percentage);
          $stmt->bindParam(':passingscore_in_percentage', $this->passingscore_in_percentage);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':timeconsumed', $this->timeconsumed);
		    $stmt->bindParam(':code', $this->code);
		//	$stmt->bindParam(':attempts', ' + 1 ');

          // Execute query
          if($stmt->execute()) {
            //return true;
			
			return 'Done';
			//return $totalscopre = $row['score_in_percentage'] .' '. $row['attempts'] .' '. $totalscopre .' '. $row['attempts'] + 1;
      }

      // Print error if something goes wrong
    //  printf("Error: %s.\n", $stmt->error);

      //return false;
	  return $stmt->error;
    }
	
	    // Create Post
    public function updatescorecrdforuser($comparea_code,$quiz_type,$scoring_method,$totalscopre,$displayTime,$quizstartdate,$quizenddate,$nsadfkj,$timeLeft,$qurl,$qname,$passingscore_in_percentage,$code) {
         

$query = 'SELECT attempts,score_in_percentage from studentscore where code ="'.trim($code).'" and userid ="'.trim($nsadfkj).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         $score_in_percentage = $row['score_in_percentage'];
		 
		 
		 
		if(strtoupper($scoring_method) == 'FIRST')
		{
			$totalscopre = $score_in_percentage;
            	 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}	
        else if(strtoupper($scoring_method) == 'LAST')
		{
			$totalscopre = $totalscopre;
				 // Create query
        /*  $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
		}	
           else if(strtoupper($scoring_method) == 'LASTNEW')
		{
			$totalscopre = $totalscopre;
               	 // Create query
          /*$query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed where  userid = :userid and code = :code';*/
			
		}	
        
        
		 else if(strtoupper($scoring_method) == 'HIGHEST')
		{
			$totalscopre = max($totalscopre,$score_in_percentage);
             	 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}	
		 else if(strtoupper($scoring_method) == 'AVERAGE')
		{
			//$totalscopre = 'hjshafhrf';
			
			$totalscopre = (($row['score_in_percentage'] * $row['attempts']) + $totalscopre ) / ($row['attempts'] + 1) ;
			
			//$totalscopre = $row['score_in_percentage'] .' '. $row['attempts'] .' '. $totalscopre .'  '. $row['attempts'] + 1 ;
			
				 // Create query
         /* $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';*/
			
		}
        
       // return strtoupper($scoring_method);
        
           $query = 'UPDATE studentscore SET  comparea_code = :comparea_code  , name = :name  ,quiztype = :quiztype, url = :url, duration = :duration, starttime = :starttime, endtime = :endtime,
		  score_in_percentage = :score_in_percentage , passingscore_in_percentage = :passingscore_in_percentage  , timeconsumed = :timeconsumed , attempts = attempts + 1 where  userid = :userid and code = :code';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
		   $this->comparea_code = htmlspecialchars(strip_tags($comparea_code));
          $this->name = htmlspecialchars(strip_tags($qname));
		    $this->quiztype = htmlspecialchars(strip_tags($quiz_type));
          $this->url = htmlspecialchars(strip_tags($qurl));
          $this->duration = htmlspecialchars(strip_tags($timeLeft/60));
          $this->starttime = htmlspecialchars(strip_tags($quizstartdate));
		  $this->endtime = htmlspecialchars(strip_tags($quizenddate));
          $this->score_in_percentage = htmlspecialchars(strip_tags($totalscopre));
          $this->passingscore_in_percentage = htmlspecialchars(strip_tags($passingscore_in_percentage));
          $this->userid = htmlspecialchars(strip_tags($nsadfkj));
		   $this->timeconsumed = htmlspecialchars(strip_tags($displayTime));
		     $this->code = htmlspecialchars(strip_tags($code));

          // Bind data
		     $stmt->bindParam(':comparea_code', $this->comparea_code);
          $stmt->bindParam(':name', $this->name);
		   $stmt->bindParam(':quiztype', $this->quiztype);
          $stmt->bindParam(':url', $this->url);
          $stmt->bindParam(':duration', $this->duration);
          $stmt->bindParam(':starttime', $this->starttime);
		   $stmt->bindParam(':endtime', $this->endtime);
          $stmt->bindParam(':score_in_percentage', $this->score_in_percentage);
          $stmt->bindParam(':passingscore_in_percentage', $this->passingscore_in_percentage);
          $stmt->bindParam(':userid', $this->userid);
		   $stmt->bindParam(':timeconsumed', $this->timeconsumed);
		    $stmt->bindParam(':code', $this->code);
		//	$stmt->bindParam(':attempts', ' + 1 ');

          // Execute query
          if($stmt->execute()) {
            //return true;
			
			return 'Done';
			//return $totalscopre = $row['score_in_percentage'] .' '. $row['attempts'] .' '. $totalscopre .' '. $row['attempts'] + 1;
      }

      // Print error if something goes wrong
    //  printf("Error: %s.\n", $stmt->error);

      //return false;
	  return $stmt->error;
    }
    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET title = :title, body = :body, author = :author, category_id = :category_id
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }


    // Update Post
    public function updateeventslist($uid,$id,$code) {
		
		$stdate = date('Y-m-d H:i:s');
		  $startdattimenew =	str_replace(' ', 'T', $stdate);

          // Create query
          $query = 'UPDATE events
                                SET color = :color, start = :start, end = :end, completionflag = :completionflag
                                WHERE userid = :userid and courseid = :courseid and type = :type';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->color = htmlspecialchars(strip_tags('#899194'));
          $this->completionflag = htmlspecialchars(strip_tags(1));
		  $this->type = htmlspecialchars(strip_tags('L'));
          $this->userid = htmlspecialchars(strip_tags($uid));
          $this->courseid = htmlspecialchars(strip_tags($id));
		  $this->start = htmlspecialchars(strip_tags($startdattimenew));
		  $this->end = htmlspecialchars(strip_tags($startdattimenew));
       

          // Bind data
          $stmt->bindParam(':color', $this->color);
          $stmt->bindParam(':completionflag', $this->completionflag);
		  $stmt->bindParam(':type', $this->type);
          $stmt->bindParam(':userid', $this->userid);
          $stmt->bindParam(':courseid', $this->courseid);
		    $stmt->bindParam(':start', $this->start);
			  $stmt->bindParam(':end', $this->end);
      

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
// Delete Post
    public function deleetallmarks($id) {
          // Create query
          $query = 'DELETE FROM markscard WHERE id = "'.$id.'"';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

        

          // Execute query
          if($stmt->execute()) {
			  return "Deleted Successfully.";
			  
		  }
		  
		  return "Error while deleting.";
	}
	   public function deleetallmarksgalalafggf($id) {
          // Create query
          $query = 'DELETE FROM fileresources WHERE id = "'.$id.'"';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

        

          // Execute query
          if($stmt->execute()) {
			  return "Deleted Successfully.";
			  
		  }
		  
		  return "Error while deleting.";
	}
	
	   public function deleetallmarksgalala($id) {
          // Create query
          $query = 'DELETE FROM videogallery WHERE id = "'.$id.'"';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

        

          // Execute query
          if($stmt->execute()) {
			  return "Deleted Successfully.";
			  
		  }
		  
		  return "Error while deleting.";
	}
	
	 public function updateatendace($id,$userdid) {
		 
		 
		 $query = 'SELECT studentid from attendance where id ="'.trim($id).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         $str = $row['studentid'];
		 
		 
		 
		 $item = $userdid; 
		  $parts = explode(',', $str);

        while (($i = array_search($item, $parts)) !== false) {
            unset($parts[$i]);
        }

        $userdid =  implode(',', $parts);
		
		 
		  $query = 'UPDATE attendance SET studentid = :studentid  where id = :id';
        
        

          // Prepare statement
          $stmt = $this->conn->prepare($query);

         // Clean data
          $this->studentid = htmlspecialchars(strip_tags($userdid));
          $this->id = htmlspecialchars(strip_tags($id));
          

          // Bind data
          $stmt->bindParam(':studentid', $this->studentid);
          $stmt->bindParam(':id', $this->id);
      

          // Execute query
          if($stmt->execute()) {
           return "Deleted Successfully.";
          }

         
		  
		  return "Error while deleting.";
	}

    // Delete Post
    public function getallcourses($userid,$moodleid) {
          // Create query
          $query = 'DELETE FROM scorecard WHERE users_id = "'.$userid.'"';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

        

          // Execute query
          if($stmt->execute()) {
            //return true;
			
			/*****************************************************************************/
			
			 $row = array('wstoken' => '36273d0cb5670991cd92216058a151a6', 
			 'moodlewsrestformat' => 'json',
             'userid' => $moodleid,
			 //'userid' => 25,
             'wsfunction' => 'gradereport_overview_get_course_grades');
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Content-Type: application/json\r\n",
            
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://testcms.odinlearning.in/webservice/rest/server.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		
		var_dump($result1);
		exit;
			
			
			
			
			
			
			
			/*****************************************************************************/
			
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
	
	public  function require_auth() {

	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$this->has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$this->is_not_authenticated = (
		!$this->has_supplied_credentials ||
		$_SERVER['PHP_AUTH_USER'] != $this->AUTH_USER ||
		$_SERVER['PHP_AUTH_PW']   != $this->AUTH_PASS
	);
	if ($this->is_not_authenticated) {
		header('WWW-Authenticate: Basic realm="Access denied"');
		header('HTTP/1.1 401 Authorization Required');
		
		  return false;
	}
	
    return true;

		
}
    
  }