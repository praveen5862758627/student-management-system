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
	
			public function getallprojectslistcount() {
        
         $query = 'SELECT * FROM users  where usertype=2 order by id';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
			public function getallapprenticecount() {
        
         $query = 'SELECT * FROM users  where usertype=3 order by id';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
		public function getcomcounttotal() {
        
         $query = 'SELECT * FROM company  order by id';
      
  
      $stmt = $this->conn->prepare($query);

      
      $stmt->execute();

      return $stmt;
        
    }
	
		public function getalljobscounttotalfi() {
        
        $query = 'SELECT * FROM jobs  order by id';
      
  
      $stmt = $this->conn->prepare($query);

      
      $stmt->execute();

      return $stmt;
        
    }
	
			 public function getallcompinieslist() {
        
      //   $query = 'SELECT p.definition as definition,a.industry as inds FROM projectlisting p INNER JOIN areaofexpertise a on p.userid = a.userid order by p.userid desc LIMIT 0,4 ';
      
	  
	           $query = 'SELECT * from company order by id desc LIMIT 0,5 ';

    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
			 public function getallapprenticelist() {
        
      //   $query = 'SELECT p.definition as definition,a.industry as inds FROM projectlisting p INNER JOIN areaofexpertise a on p.userid = a.userid order by p.userid desc LIMIT 0,4 ';
      
	  
	           $query = 'SELECT a.industry as inds,u.fname as firstn, u.lname as lastn FROM users u INNER JOIN areaofexpertise a on u.id = a.userid where u.usertype=3 order by u.id desc LIMIT 0,4 ';

    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
		public function getalljobslistcount($companyid) {
        
         $query = 'SELECT * FROM jobs  where companyid = '.$companyid.' order by id';
      
  
      $stmt = $this->conn->prepare($query);

      
      $stmt->execute();

      return $stmt;
        
    }
	
		 public function getallprojectslist() {
        
      //   $query = 'SELECT p.definition as definition,a.industry as inds FROM projectlisting p INNER JOIN areaofexpertise a on p.userid = a.userid order by p.userid desc LIMIT 0,4 ';
      
	  
	           $query = 'SELECT a.industry as inds,u.fname as firstn, u.lname as lastn FROM users u INNER JOIN areaofexpertise a on u.id = a.userid where u.usertype=2 order by u.id desc LIMIT 0,4 ';

    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
		 public function getallspeakerslist() {
        
         $query = 'SELECT a.industry as inds,u.fname as firstn, u.lname as lastn FROM users u INNER JOIN areaofexpertise a on u.id = a.userid where u.usertype=1 order by u.id desc LIMIT 0,4 ';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
	
		public function getallspeakerslistcount() {
        
         $query = 'SELECT * FROM users  where usertype=1 order by id';
      
    //  echo $query;
     // exit;
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
		
		if($technologyaffiliation == 0 || $problemsolving == 0 || $teamwork == 0 || $leadership == 0 || $socialskils == 0 || $initative == 0 || $communicationspoken == 0 || $communicationwritten == 0 || $communicationoratory == 0 || $travelandexploration == 0 || $managementskills == 0 || $foriegnlanguages == 0)
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
      $query = 'SELECT (1 - ((problemsolving - '.$problemsolving.')*2 + (teamwork - '.$teamwork.')*2 + (leadership - '.$leadership.')*2 +
  (socialskils - '.$socialskils.')*2 + (initative - '.$initative.')*2 + (communicationspoken - '.$communicationspoken.')*2 +
   (communicationwritten - '.$communicationwritten.')*2 + (communicationorartory - '.$communicationoratory.')*2 + (travel - '.$travelandexploration.')*2 +
    (affiliation - '.$technologyaffiliation.')*2 + (managementskils - '.$managementskills.')*2 + (foreignlanguage - '.$foriegnlanguages.')*2 )) /12 as rankget  from targetrule where targetcode ="'.trim($code).'" ';
     // echo  $query;
    //  exit;
      
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
	
	
	
	 public function getalluserdetails($studentid)
		{
			 $row = array('studentid' => $studentid);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://testapi.odinlearning.in/sms/getstudentdetails.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes;
		//var_dump( $topiccodes);
		//exit;
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
	
	
	
		 public function getcomapnynamenew($uid){
       // Create query
      $query = 'SELECT name from company where userid ="'.trim($uid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

 $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $stream = $row['name'];
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
	
		 public function listcompanies(){
      // Create query
      $query = 'SELECT DISTINCT u.id as uid,u.fname as ufname,u.lname as ulname  FROM users u where usertype=6 ORDER BY u.id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		 public function listyofjobs($id){
			 
			 
			   date_default_timezone_set('Asia/Kolkata');
		 $curdate=date("d M, Y");
		 
		 
      // Create query
      $query = 'SELECT *  FROM jobs where companyid='.$id.' ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		 public function listofappliedjobswithuser($userid){
      // Create query
      $query = 'SELECT *  FROM appliedjobs where companyid='.$userid.' ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function getcomapnyname($companyid) {
	
	
	   $query = 'SELECT fname,lname from users where id ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $stream = $row['fname']." ".$row['lname'];
	 }
	 	 public function getcomapnynamennn($companyid) {
	
	
	   $query = 'SELECT name from company where userid ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $stream = $row['name'];
	 }
	 
	 
	  public function getspeakerdetails($userid) {
	
	
	   $query = 'SELECT fname,lname,email,phonenumber from users where id ="'.trim($userid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['fname'],$row['lname'],$row['email'],$row['phonenumber']);
	 }
	 
	   public function getallthelikes($userid,$type) {
	
	
	   $query = 'SELECT count(*) as total FROM liketable where type="'.trim($type).'" and userid="'.trim($userid).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  $row['total'];
	 }
	 
	
	 public function getjobnameandesc($companyid) {
	
	
	   $query = 'SELECT name,description,jobenddate from jobs where id ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['name'],$row['description'],$row['jobenddate']);
	 }
	 
	 
	 public function getprojectdeyils($companyid) {
	
	
	   $query = 'SELECT * from projectlisting where id ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['description'],$row['definition']);
	 }
	 
	  public function getapprenticedetails($companyid) {
	
	
	   $query = 'SELECT * from apprentice where id ="'.trim($companyid).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['description'],$row['definition']);
	 }
	 
	 	 public function getcollegedetaoils($institutecode) {
	
	
	   $query = 'SELECT name,url from collegelist where institutecode ="'.trim($institutecode).'" ';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  $row = $stmt->fetch(PDO::FETCH_ASSOC);
		return  array($row['name'],$row['url']);
	 }
	
		 public function listyofjobsapplied($useridforic,$insidforic){
      // Create query
      $query = 'SELECT *  FROM appliedjobs where iuserid='.$useridforic.' and institutecode="'.$insidforic.'"  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
			 public function listyofjobsappliedprojects($useridforic,$insidforic){
      // Create query
      $query = 'SELECT *  FROM projectapprentice where studentid='.$useridforic.' and inscode="'.$insidforic.'"  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
		 public function listyofjobsappliedprojectsbystudents($insidforic){
      // Create query
      $query = 'SELECT *  FROM projectapprentice where inscode="'.$insidforic.'"  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			 public function listyofjobsappliedins($useridforic,$insidforic){
      // Create query
      $query = 'SELECT *  FROM appliedjobs where  institutecode="'.$insidforic.'"  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
		 public function listodspearlikes(){
      // Create query
      $query = 'SELECT DISTINCT userid FROM liketable';
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
	
	public function listodcount($jobid,$companyid,$useridforic,$insidforic) {
	
	  $query = 'select id from appliedjobs where jobid ="'.$jobid.'" and companyid ="'.$companyid.'"  and iuserid="'.$useridforic.'" and institutecode="'.$insidforic.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
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

    
  public function applyforjobstudents($jobid,$companyid,$useridforic,$insidforic,$name) {
          // Create query
		  
		  date_default_timezone_set('Asia/Kolkata');
		 $curdate=date("d M, Y");
		  
          $query = 'INSERT INTO appliedjobs SET appliedforjobdate = :appliedforjobdate ,studentname = :studentname , jobid = :jobid, companyid = :companyid, iuserid = :useridforic, institutecode = :insidforic';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->jobid = htmlspecialchars(strip_tags($jobid));
          $this->companyid = htmlspecialchars(strip_tags($companyid));
          $this->useridforic = htmlspecialchars(strip_tags($useridforic));
          $this->insidforic = htmlspecialchars(strip_tags($insidforic));
		   $this->studentname = htmlspecialchars(strip_tags($name));
		    $this->appliedforjobdate = htmlspecialchars(strip_tags($curdate));
		   
		   

          // Bind data
          $stmt->bindParam(':jobid', $this->jobid);
          $stmt->bindParam(':companyid', $this->companyid);
          $stmt->bindParam(':useridforic', $this->useridforic);
          $stmt->bindParam(':insidforic', $this->insidforic);
		    $stmt->bindParam(':studentname', $this->studentname);
			  $stmt->bindParam(':appliedforjobdate', $this->appliedforjobdate);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }



    // Update Post
    public function updatestatus($id,$status) {
          // Create query
          $query = 'UPDATE appliedjobs
                                SET status = :status, statusprocesseddate = :statusprocesseddate
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
		  date_default_timezone_set('Asia/Kolkata');
		 $curdate=date("d M, Y");

          $this->status = htmlspecialchars(strip_tags($status));
          $this->id = htmlspecialchars(strip_tags($id));
		  $this->statusprocesseddate = htmlspecialchars(strip_tags($curdate));

          $stmt->bindParam(':status', $this->status);
		   $stmt->bindParam(':statusprocesseddate', $this->statusprocesseddate);
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
    public function updatestatusinsdetails($cat_val,$type,$email) {
		
		
	
		
          // Create query
        if($type == 1)
 {
 
   $query = 'UPDATE collegelist
                                SET event1 = :event1
                                WHERE institeadminemail = :institeadminemail';
								  // Prepare statement
          $stmt = $this->conn->prepare($query);

          $this->event1 = htmlspecialchars(strip_tags($cat_val));
          $this->institeadminemail = htmlspecialchars(strip_tags($email));

          $stmt->bindParam(':event1', $this->event1);
          $stmt->bindParam(':institeadminemail', $this->institeadminemail);
 }
 else  if($type == 2)
 {


   $query = 'UPDATE collegelist
                                SET event2 = :event2
                                WHERE institeadminemail = :institeadminemail';
								
								  $stmt = $this->conn->prepare($query);

          $this->event2 = htmlspecialchars(strip_tags($cat_val));
          $this->institeadminemail = htmlspecialchars(strip_tags($email));

          $stmt->bindParam(':event2', $this->event2);
          $stmt->bindParam(':institeadminemail', $this->institeadminemail);

 }
  else  if($type == 3)
 {
 
   $query = 'UPDATE collegelist
                                SET event3 = :event3
                                WHERE institeadminemail = :institeadminemail';
								$stmt = $this->conn->prepare($query);

          $this->event3 = htmlspecialchars(strip_tags($cat_val));
          $this->institeadminemail = htmlspecialchars(strip_tags($email));

          $stmt->bindParam(':event3', $this->event3);
          $stmt->bindParam(':institeadminemail', $this->institeadminemail);

 }
  else  if($type == 4)
 {
 
   $query = 'UPDATE collegelist
                                SET event4 = :event4
                                WHERE institeadminemail = :institeadminemail';
								$stmt = $this->conn->prepare($query);

          $this->event4 = htmlspecialchars(strip_tags($cat_val));
          $this->institeadminemail = htmlspecialchars(strip_tags($email));

          $stmt->bindParam(':event4', $this->event4);
          $stmt->bindParam(':institeadminemail', $this->institeadminemail);

 }
  else  if($type == 5)
 {
 
   $query = 'UPDATE collegelist
                                SET event5 = :event5
                                WHERE institeadminemail = :institeadminemail';
								$stmt = $this->conn->prepare($query);

          $this->event5 = htmlspecialchars(strip_tags($cat_val));
          $this->institeadminemail = htmlspecialchars(strip_tags($email));

          $stmt->bindParam(':event5', $this->event5);
          $stmt->bindParam(':institeadminemail', $this->institeadminemail);

 }

        

            // Execute query
          if($stmt->execute()) {
           // return true;
		   return $stmt->rowCount();
          }
       else{
		   return 0;
	   }
        
         /* printf("Error: %s.\n", $stmt->error);

          return false;*/
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