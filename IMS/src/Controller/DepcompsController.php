<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Depcomps Controller
 *
 * @property \App\Model\Table\DepcompsTable $Depcomps
 *
 * @method \App\Model\Entity\Depcomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepcompsController extends AppController
{
	
	/*private $url1 = 'https://www.odinlearning.in/API/cmd/read.php';
	
	private $urllesson = 'https://www.odinlearning.in/API/cmd/lesson.php';
	
	private $urllevel = 'https://www.odinlearning.in/API/cmd/level.php';*/
	
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
            'contain' => ['Deps']
        ];
        $depcomps = $this->paginate($this->Depcomps);

        $this->set(compact('depcomps'));
    }

    /**
     * View method
     *
     * @param string|null $id Depcomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $depcomp = $this->Depcomps->get($id, [
            'contain' => ['Deps']
        ]);

        $this->set('depcomp', $depcomp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $depcomp = $this->Depcomps->newEntity();
        if ($this->request->is('post')) {
            $depcomp = $this->Depcomps->patchEntity($depcomp, $this->request->getData());
            if ($this->Depcomps->save($depcomp)) {
                $this->Flash->success(__('The depcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The depcomp could not be saved. Please, try again.'));
        }
        $deps = $this->Depcomps->Deps->find('list', ['limit' => 200]);
		// $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);
        $topiccodes = json_decode($result1, true);
        $this->set(compact('depcomp', 'deps','topiccodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Depcomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $depcomp = $this->Depcomps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $depcomp = $this->Depcomps->patchEntity($depcomp, $this->request->getData());
            if ($this->Depcomps->save($depcomp)) {
                $this->Flash->success(__('The depcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The depcomp could not be saved. Please, try again.'));
        }
        $deps = $this->Depcomps->Deps->find('list', ['limit' => 200]);
		//$context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);


        $topiccodes = json_decode($result1, true);
        $this->set(compact('depcomp', 'deps','topiccodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Depcomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $depcomp = $this->Depcomps->get($id);
        if ($this->Depcomps->delete($depcomp)) {
            $this->Flash->success(__('The depcomp has been deleted.'));
        } else {
            $this->Flash->error(__('The depcomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
