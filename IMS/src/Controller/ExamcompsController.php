<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;

/**
 * Examcomps Controller
 *
 * @property \App\Model\Table\ExamcompsTable $Examcomps
 *
 * @method \App\Model\Entity\Examcomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamcompsController extends AppController
{
	/*private $url1 = 'https://api.loc/cmd/read.php';
	
	private $urllesson = 'https://api.loc/cmd/lesson.php';
	
	private $urllevel = 'https://api.loc/cmd/level.php';*/
	
	private $url1 = 'https://oapi.odinlearning.in/cmd/read.php';
	
	private $urllesson = 'https://oapi.odinlearning.in/cmd/lesson.php';
	
	private $urllevel = 'https://oapi.odinlearning.in/cmd/level.php';
	
	private $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
        ));

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Examschedule']
        ];
        $examcomps = $this->paginate($this->Examcomps);
		
		
		
		/*var_dump($examcomps);
		exit;*/

        $this->set(compact('examcomps'));
    }
	
	 public function getexamname()
    {
		return "hello";
	}



    /**
     * View method
     *
     * @param string|null $id Examcomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examcomp = $this->Examcomps->get($id, [
            'contain' => ['Examschedule']
        ]);

        $this->set('examcomp', $examcomp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		
		if($id != null){
			
					   $this->loadModel('Examschedule');
		  $loggedintime1 = $this->Examschedule->find('all', [ 'conditions' => ['Examschedule.id' => $id]])->first();
		  
		   $id1 = $loggedintime1->exam_id;
		
		 $examschedule = $this->Examcomps->Examschedule->Exam->find('list',array(
    'conditions'=>array('Exam.id' => $id1)));
	
		
		}
		else {
			 $examschedule = $this->Examcomps->Examschedule->Exam->find('list', ['limit' => 200]);
		}
		
	
        $examcomp = $this->Examcomps->newEntity();
        if ($this->request->is('post')) {
            $examcomp = $this->Examcomps->patchEntity($examcomp, $this->request->getData());
			
			
			 $this->loadModel('Examschedule');
		  $loggedintime1 = $this->Examschedule->find('all', [ 'conditions' => ['Examschedule.exam_id' => $_POST['examschedule_id']]])->first();
		  
		   $examschedule_id = $loggedintime1->id;
		   
		   	$examcomp->examschedule_id = $examschedule_id;
			
            if ($this->Examcomps->save($examcomp)) {
                $this->Flash->success(__('The examcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examcomp could not be saved. Please, try again.'));
        }
        
	

        

        //$context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);
        $topiccodes = json_decode($result1, true);
		
		
		//var_dump($topiccodes);
		//exit;
		
		/****;level ***/
		/*$result1lesson = file_get_contents($this -> urllesson, false, $context1);
        $topiccodeslesson = json_decode($result1lesson, true);*/
		/*************/
		
		/****lesson ****/
		/*$result1level = file_get_contents($this -> urllevel, false, $context1);
        $topiccodeslevel = json_decode($result1level, true);*/
		/**************/
		
		
/*	var_dump($topiccodeslevel);
		exit;*/

        $this->set(compact('examcomp', 'examschedule','topiccodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examcomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examcomp = $this->Examcomps->get($id, [
            'contain' => []
        ]);
		
		  
		
		$gettid = $examcomp['topic_code'];
		
		
		
		
	//echo $gettid;
//	exit;
		$this->set(compact('gettid'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examcomp = $this->Examcomps->patchEntity($examcomp, $this->request->getData());
			
			 $this->loadModel('Examschedule');
			
		  $loggedintime1 = $this->Examschedule->find('all', [ 'conditions' => ['Examschedule.exam_id' => $_POST['examschdeule_id']]])->first();
		 
		  
		   $examschedule_id = $loggedintime1->id;
		   
		   	$examcomp->examschedule_id = $examschedule_id;
			
            if ($this->Examcomps->save($examcomp)) {
                $this->Flash->success(__('The examcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examcomp could not be saved. Please, try again.'));
        }
        $examschedule = $this->Examcomps->Examschedule->Exam->find('list', ['limit' => 200]);
		 // $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);


        $topiccodes = json_decode($result1, true);
	//var_dump(array($topiccodes));
		//exit;
		
		
		/**************/

        $this->set(compact('gettid','examcomp','topiccodes','examschedule'));
		
     //   $this->set(compact('examcomp', 'examschedule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examcomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examcomp = $this->Examcomps->get($id);
        if ($this->Examcomps->delete($examcomp)) {
            $this->Flash->success(__('The examcomp has been deleted.'));
        } else {
            $this->Flash->error(__('The examcomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
