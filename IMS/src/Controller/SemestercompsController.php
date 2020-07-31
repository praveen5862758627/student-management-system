<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Cache\Cache;
use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Excelreader\PhpExcelReader;

/**
 * Semestercomps Controller
 *
 * @property \App\Model\Table\SemestercompsTable $Semestercomps
 *
 * @method \App\Model\Entity\Semestercomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SemestercompsController extends AppController
{
	
		/*private $url1 = 'https://api.loc/cmd/read.php';
	
	private $urllesson = 'https://api.loc/cmd/lesson.php';
	
	private $urllevel = 'https://api.loc/cmd/level.php';*/
	
	
		private $url1 = 'https://napi.odinlearning.in/cmd/read.php';
	
	private $urllesson = 'https://napi.odinlearning.in/cmd/lesson.php';
	
	private $urllevel = 'https://napi.odinlearning.in/cmd/level.php';
	
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
  $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM semestercomps";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Semestercomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semestercomp = $this->Semestercomps->get($id, [
            'contain' => ['Semesters']
        ]);

        $this->set('semestercomp', $semestercomp);
    }




    	public function updateordeforsemcomps(){
		
$this->autoRender = false;

$cat_val = $_POST['cat_val'];

$getoder = $_POST['getoder'];




        if ($this->request->is(array('ajax'))) {

		
		
		$this->Semestercomps->updateAll(['orderlesson' => $getoder], ['id' => $cat_val]);
                    echo 'Saved successfully.';
					
					
               
		
		}
	}
	


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semestercomp = $this->Semestercomps->newEntity();
        if ($this->request->is('post')) {
            $semestercomp = $this->Semestercomps->patchEntity($semestercomp, $this->request->getData());
            if ($this->Semestercomps->save($semestercomp)) {
                $this->Flash->success(__('The semestercomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The semestercomp could not be saved. Please, try again.'));
        }
        $semesters = $this->Semestercomps->Semesters->find('list', ['limit' => 200]);
      //  $this->set(compact('semestercomp', 'semesters'));
		
		// $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);
        $topiccodes = json_decode($result1, true);
		/*var_dump($topiccodes);
		exit;*/
		
        $this->set(compact('semestercomp', 'semesters','topiccodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Semestercomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semestercomp = $this->Semestercomps->get($id, [
            'contain' => []
        ]);
		
		$gettid = $semestercomp['topic_code'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semestercomp = $this->Semestercomps->patchEntity($semestercomp, $this->request->getData());
            if ($this->Semestercomps->save($semestercomp)) {
                $this->Flash->success(__('The semestercomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The semestercomp could not be saved. Please, try again.'));
        }
        $semesters = $this->Semestercomps->Semesters->find('list', ['limit' => 200]);
        //$this->set(compact('semestercomp', 'semesters'));
		
		// $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);


        $topiccodes = json_decode($result1, true);
		
        $this->set(compact('gettid','semestercomp','semesters','topiccodes'));
		
    }

    /**
     * Delete method
     *
     * @param string|null $id Semestercomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semestercomp = $this->Semestercomps->get($id);
        if ($this->Semestercomps->delete($semestercomp)) {
            $this->Flash->success(__('The semestercomp has been deleted.'));
        } else {
            $this->Flash->error(__('The semestercomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
