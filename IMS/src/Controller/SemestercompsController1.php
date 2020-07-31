<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Semestercomps Controller
 *
 * @property \App\Model\Table\SemestercompsTable $Semestercomps
 *
 * @method \App\Model\Entity\Semestercomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SemestercompsController extends AppController
{
	private $url1 = 'https://www.odinlearning.in/API/cmd/read.php';
	
	private $urllesson = 'https://www.odinlearning.in/API/cmd/lesson.php';
	
	private $urllevel = 'https://www.odinlearning.in/API/cmd/level.php';
	
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
        $semestercomps = $this->paginate($this->Semestercomps);

        $this->set(compact('semestercomps'));
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
            'contain' => []
        ]);

        $this->set('semestercomp', $semestercomp);
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
		
		 $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false, $context1);
        $topiccodes = json_decode($result1, true);
		
        $this->set(compact('semestercomp','topiccodes'));
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
		  $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false, $context1);


        $topiccodes = json_decode($result1, true);
		
        $this->set(compact('gettid','semestercomp','topiccodes'));
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
