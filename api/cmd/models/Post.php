<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'topic';
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
    public function getallcompslistfprins() {

      
      
         $query = 'SELECT * from comparea';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
	
	 public function  getallcompslistfprinsmarksccom($compid){
		 
		        $arraa =  explode(',', $compid);
      

$result = "'" . implode ( "','", $arraa ) . "'";

    
	  
	$query = "SELECT  * from  comparea where type='SEM' and code in (".$result.") ORDER BY id";
	
	
         //$query = 'SELECT * from comparea where type="SEM"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
	
      		    	   // Get Posts
    public function getallcompslistfprinsmarks() {

      
      
         $query = 'SELECT * from comparea where type="SEM"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
            		 	   // Get Posts
    public function lisallgroupssms($fcomps) {
      // Create query
        
       $arraa =  explode(',', $fcomps);
      

$result = "'" . implode ( "','", $arraa ) . "'";

    
	  
	$query = "SELECT  * from  comparea where code in (".$result.") ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		    	   // Get Posts
    public function compereanamelistfinal() {
      // Create query
      $query = 'SELECT * FROM comparea limit 0,8';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
		    	   // Get Posts
    public function getcomcounttotal() {
      // Create query
      $query = 'SELECT id FROM comparea';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT id,code,name FROM ' . $this->table . '   ORDER BY name asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	 public function getlessonscompletionstatus($courseid,$csrftokn){
		 
		 include "../config/myconfig.php";
		  $row = array('id' => $courseid);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Bearer ". $csrftokn."=\r\n".
		
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['weburlmainsite'].'scorecard/getmoodlecomplestatus', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0];
		//var_dump( $topiccodes);
		//exit;
		}
		 
	
		   // Get Posts
    public function getcomprealistforst($prod_cat) {
      // Create query
      $query = 'SELECT studyduration,courseid,name,mcode,code FROM baseline  where comparea_id = '.$prod_cat.'  ORDER BY comparea_id asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
      
      	    	   // Get Posts
    public function getcompreacodeforlessons($prod_cat) {
      // Create query
      $query = 'SELECT comparea_id FROM topic  where id = '.$prod_cat.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['comparea_id'];
      
      
         $query = 'SELECT code FROM comparea  where id = '.$lessionid.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
     return $row['code'];
          
    }
	
	
			   // Get Posts
    public function getlessons($prod_cat) {
      // Create query
      $query = 'SELECT id,studyduration,courseid,name,mcode,code,description,topic_id FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY topic_id asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
      
	  public function examcomps($prod_cat) {
      // Create query
      $query = 'SELECT * FROM topic  where comparea_id = '.$prod_cat.'  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	  public function compereanameidleesson($prod_cat) {
      // Create query
      $query = 'SELECT id FROM lesson  where topic_id = '.$prod_cat.'  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	  public function compereanameidleesson1($prod_cat) {
      // Create query
      $query = 'SELECT level_id FROM lesson  where topic_id = '.$prod_cat.'  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	   // Get Posts
    public function lesson($prod_cat) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
     public function lessonscore($prod_cat) {
       
//echo $prod_cat;
//$result = "'" . implode ( "', '", $prod_cat ) . "'";

$result_string = "'" . str_replace(",", "','", $prod_cat) . "'";

//echo "Output String: ".$result_string;
	     

    
      $query = 'SELECT studyduration,id,courseid,topic_id from lesson WHERE topic_id IN ('.$result_string.')';
    //  echo $query;
   //   exit;
      
   
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;
     }
     
     
     
      public function lesson100($prod_cat) {
          
          $result_string = "'" . str_replace(",", "','", $prod_cat) . "'";
          
             $query = 'SELECT studyduration,courseid,name FROM example  where lesson_id IN ('.$result_string.')';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
      }
    
    
    
    	   // Get Posts
    public function lesson1($prod_cat) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
      
      
         $query = 'SELECT code,studyduration,mcode,name,targettype_id FROM example  where lesson_id = '.$lessionid.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
	
	
	
	    public function lesson23($lecode,$lcode) {
    
      
      
         $query = 'SELECT studyduration,courseid,name,mcode,level_id,code FROM quiz  where lesson_id = '.$lcode.'  ORDER BY level_id asc limit '.$lecode;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
	
		   public function quizstatusfind($uid,$code)
  {
	  
	  include "../config/myconfig.php";
	  
	 $row = array('uid' => $uid,'code' => $code);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/getquizstatusfinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['status'];
		//var_dump( $topiccodes);
		//exit;
		
  }
  
   public function getlevelforcomareafo($comparea_id)
  {

      
      include "../config/myconfig.php";
         $query = 'SELECT code FROM comparea  where id = '.$comparea_id.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
     $comparea_id =  $row['code'];	
	  
	  
	 $row = array('comparea_id' => $comparea_id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'ims/getquizstatusfinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['level'];
		//var_dump( $topiccodes);
		//exit;
		
  }
  
  		   public function quizstatusfindnew($uid,$code)
  {
	  
	  include "../config/myconfig.php";
	  
	 $row = array('uid' => $uid,'code' => $code);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/getbaselinestatus.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['status'];
		//var_dump( $topiccodes);
		//exit;
		
  }
	
     	   // Get Posts
    public function lesson2($prod_cat,$limitre) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
      
      
         $query = 'SELECT code,studyduration,courseid,name,mcode FROM quiz  where lesson_id = '.$lessionid.'  ORDER BY level_id asc limit '.$limitre;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
	
	     	   // Get Posts
    public function chapterslist($prod_cat) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
      
      
         $query = 'SELECT * FROM chapters  where lesson_id = '.$lessionid.'  ORDER BY chapterorder asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
	
	 public function chapterslistcalendar($prod_cat) {

      
      
         $query = 'SELECT * FROM chapters  where lesson_id = '.$prod_cat.'  ORDER BY chapterorder asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
     public function alltopicnew($prod_cat){
	
	    // Create query
      $query = 'SELECT id,code FROM comparea  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
	  
	  if($lessionid == NULL )
		   $lessionid = 0;
	   else
		    $lessionid =  $row['id'];
		  
      
      
         $query = 'SELECT * FROM topic  where comparea_id = '.$lessionid;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
	
	 public function alltopicnewacasdeboc($prod_cat){
	 
	 
	 $arraa =  explode(',', $prod_cat);
      

 $result = "'" . implode ( "','", $arraa ) . "'";
		
		///echo $result;
	
	    // Create query
      $query = 'SELECT id as lessonid FROM comparea  where code in ('.$result.')  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
    //  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	  
	  
	  
	   $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $row['lessonid'] . ',';
			
	  }
	  
	 

          // Set properties
     
	  
	  
	  

       
	  
	  if(rtrim($examcode, ',') == NULL )
		   $lessionid = 0;
	   else
		    $lessionid =   rtrim($examcode, ',');
		  
      
      
         $query = 'SELECT * FROM topic  where comparea_id in  ('.$lessionid.')';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
	
                 public function getcompareacode($prod_cat){
	
	    // Create query
      $query = 'SELECT id,code FROM comparea  where id = "'.$prod_cat.'"  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      return  $row['code'];
           }
	public function alltopic(){
	
	 // Create query
      $query = 'SELECT * FROM topic';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
		public function alltopicff($depart){
	
	 // Create query
      $query = 'SELECT * FROM topic where comparea_id='.$depart.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
		public function alltopiccount(){
	
	 // Create query
      $query = 'SELECT id FROM topic';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
	
	   // Get Posts
    public function topicname($prod_cat) {
      // Create query
      $query = 'SELECT code,name FROM topic  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	   // Get Posts
    public function topicname1($prod_cat) {
      // Create query
      $query = 'SELECT name FROM topic  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function getcourseids($prod_cat) {
      // Create query
      $query = 'SELECT courseid FROM lesson  where topic_id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    
	   // Get Posts
    public function getropicidforstudent($prod_cat) {
      // Create query
      $query = 'SELECT id FROM topic  where comparea_id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    	   // Get Posts
    public function compereaname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM comparea  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	   	   // Get Posts
    public function compereanamelist($prod_cat) {
		
		
		
		 $query = 'SELECT comparea_id FROM topic  where id IN (' . $prod_cat . ')';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
     // $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	   $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $comparea_id . ',';
			
	  }
	  
	 

          // Set properties
      $lessionid =   rtrim($examcode, ',');
      
      
    
		
		
      // Create query
      $query = 'SELECT * FROM comparea WHERE id IN (' . $lessionid . ')';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	   public function compereanameid($prod_cat) {
      // Create query
      $query = 'SELECT id FROM comparea  where code = "'.$prod_cat.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    
    	   // Get Posts
    public function compereanamereturn($prod_cat) {
      // Create query
      $query = 'SELECT name FROM comparea  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          return $row['name'];
    }
	
	 	   // Get Posts
    public function compereanamereturnlessoncode($prod_cat) {
      // Create query
      $query = 'SELECT id FROM lesson  where topic_id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          return $row['id'];
    }
    
    
    
      	   // Get Posts
    public function quizid($prod_cat) {
      // Create query
     $query = 'SELECT mcode FROM quiz  where courseid = '.$prod_cat.'';
      
      /*  $query = 'SELECT mcode
    FROM quiz q
INNER JOIN example e
    on q.lesson_id = e.lesson_id WHERE where (q.courseid = '.$prod_cat.' or e.courseid = '.$prod_cat.')';*/
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
       	   // Get Posts
    public function quizidexampale($prod_cat) {
      // Create query
     $query = 'SELECT mcode FROM example  where courseid = '.$prod_cat.'';
      
      /*  $query = 'SELECT mcode
    FROM quiz q
INNER JOIN example e
    on q.lesson_id = e.lesson_id WHERE where (q.courseid = '.$prod_cat.' or e.courseid = '.$prod_cat.')';*/
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
        	   // Get Posts
    public function getcoursenamestudyhours($prod_cat ,$table) {
    
      
      
            $query = 'SELECT studyduration FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
	
	    	   // Get Posts
    public function getcoursenameforlesson($prod_cat ,$table) {
    
      
      
            $query = 'SELECT id as lid FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
       	   // Get Posts
    public function getcoursename($prod_cat ,$table) {
    
      
      
            $query = 'SELECT name FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	     	   // Get Posts
    public function getstudydurationforles($prod_cat) {
    
      
      
            $query = 'SELECT studyduration FROM  lesson  WHERE id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	public function getcoursenameq($prod_cat ,$table) {
    
      
      
            $query = 'SELECT lesson_id as lid FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    
    
          	   // Get Posts
    public function getmatchid($prod_cat ,$table ,$field) {
    
      
      
           $query = 'SELECT '.$field.'
FROM '.$table.'  WHERE courseid = '.$prod_cat.'';


      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
	  	   // Get Posts
    public function quiznamefi($prod_cat) {
    // Create query
      $query = 'SELECT id FROM comparea  where code = "'.$prod_cat.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
     $lessionid =  $row['id'];
	
	 
	 
	 
	 $query = 'SELECT id FROM topic  where comparea_id = "'.$lessionid.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	 
	 
	 
	 $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $id . ',';
			
	  }
	  
	 

          // Set properties
      $lessionid =   rtrim($examcode, ',');
	  
	  
	  $query = 'SELECT id FROM lesson  where topic_id IN (' . $lessionid . ')';
	  
	   // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	 
	 
	 
	 
	/*  $query = 'SELECT id FROM lesson  where topic_id IN (' . $lessionid . ')';
      
    
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();
	 
	 
	 
	 $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $id . ',';
			
	  }
	  
	 

          
     echo $lessionid =   rtrim($examcode, ',');
	 
	 exit;*/
     
      
       /*  $query = 'SELECT * FROM quiz  where lesson_id IN ('.$lessionid.')';
      
     
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;*/
    }
	
    	   // Get Posts
    public function quizname($prod_cat) {
    // Create query
      $query = 'SELECT id FROM comparea  where code = "'.$prod_cat.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
     $lessionid =  $row['id'];
	
	 
	 
	 
	 $query = 'SELECT id FROM topic  where comparea_id = "'.$lessionid.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	 
	 
	 
	 $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $id . ',';
			
	  }
	  
	 

          // Set properties
     return $lessionid =   rtrim($examcode, ',');
	 
	 
	 
	 
	/*  $query = 'SELECT id FROM lesson  where topic_id IN (' . $lessionid . ')';
      
    
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();
	 
	 
	 
	 $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $id . ',';
			
	  }
	  
	 

          
     echo $lessionid =   rtrim($examcode, ',');
	 
	 exit;*/
     
      
       /*  $query = 'SELECT * FROM quiz  where lesson_id IN ('.$lessionid.')';
      
     
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;*/
    }
    
	
		   // Get Posts
    public function lessonname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM lesson  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function levelname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM level  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	   // Get Posts
    public function level($prod_cat) {
      // Create query
      $query = 'SELECT level_id FROM quiz where lesson_id = '.$prod_cat.'  ORDER BY id DESC';
      
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

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
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