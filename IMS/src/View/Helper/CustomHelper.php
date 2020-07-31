<?php
namespace App\View\Helper;
 
use Cake\View\Helper;
use Cake\ORM\TableRegistry;
 
class CustomHelper extends Helper {
 
 /*private $urltopic = 'https://api.loc/cmd/topic.php';
  private $urltopic1 = 'https://api.loc/cmd/lessonname.php';
   private $urltopic2 = 'https://api.loc/cmd/levelname.php';*/
   
    private $urltopic = 'https://napi.odinlearning.in/cmd/topic.php';
  private $urltopic1 = 'https://napi.odinlearning.in/cmd/lessonname.php';
   private $urltopic2 = 'https://napi.odinlearning.in/cmd/levelname.php';
   
   
   	public function geticcname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/geticcnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 public function getdepname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getdepnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 public function getsemname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getsamenames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
public function getexamname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getexamnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
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
        $result1 = file_get_contents($this -> urltopic, false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['code'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		public function getcoursename($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/getcoursename.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 
 
 	public function compereaname($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/compreaname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 public function getlevel($id)
		{
			/* $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> urltopic2, false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];*/
		
		if($id== 7)
			return 'Basic';
		else
			return $id;
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
        $result1 = file_get_contents($this -> urltopic1, false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
     
	 
	 public function getmoodlequizid($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/quizmoodleid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['mcode'];
		//var_dump( $topiccodes);
		//exit;
		}
    public function yourhelperfunction($a)
    {    
    $mytarget = TableRegistry::get('examschedule');
                
         $a1 =       $mytarget->get($a)->exam_id;
                
                
                
                
				$users = TableRegistry::get('exam');
$name = $users->get($a1)->name;
		
		return $name;
    }
	
	/*<?= $this->Custom->gettopic($lesson->topic_id); ?> */
	
	 public function companyname($a)
    {   
	$users = TableRegistry::get('company');
$name = $users->get($a)->name;
		
		return $name;
	
	}
	
		 public function targetnamenbw($a)
    {   
	$users = TableRegistry::get('target');
$name = $users->get($a)->name;
		
		return $name;
	
	}
		 public function getsmestename($a)
    {   
	$users = TableRegistry::get('semesters');
$name = $users->get($a)->name;
		
		return $name;
	
	}
	 public function industryname($a)
    {   
	$users = TableRegistry::get('industry');
$name = $users->get($a)->name;
		
		return $name;
	
	}
	
	 public function yourhelperfunction1($a)
    {    
   
                
                
				$users = TableRegistry::get('exam');
$name = $users->get($a)->name;
		
		return $name;
    }
	
	
}
?>