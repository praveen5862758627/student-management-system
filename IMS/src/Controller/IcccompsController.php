<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Icccomps Controller
 *
 * @property \App\Model\Table\IcccompsTable $Icccomps
 *
 * @method \App\Model\Entity\Icccomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IcccompsController extends AppController
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
            'contain' => ['Iccs']
        ];
        $icccomps = $this->paginate($this->Icccomps);

        $this->set(compact('icccomps'));
    }

    /**
     * View method
     *
     * @param string|null $id Icccomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $icccomp = $this->Icccomps->get($id, [
            'contain' => ['Iccs']
        ]);

        $this->set('icccomp', $icccomp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $icccomp = $this->Icccomps->newEntity();
        if ($this->request->is('post')) {
            $icccomp = $this->Icccomps->patchEntity($icccomp, $this->request->getData());
            if ($this->Icccomps->save($icccomp)) {
                $this->Flash->success(__('The icccomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The icccomp could not be saved. Please, try again.'));
        }
        $iccs = $this->Icccomps->Iccs->find('list', ['limit' => 200]);
		
		// $context1  = stream_context_create($this ->options1);
        $result1 = file_get_contents($this -> url1, false);
        $topiccodes = json_decode($result1, true);
		
		

		
        $this->set(compact('icccomp', 'iccs','topiccodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Icccomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $icccomp = $this->Icccomps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $icccomp = $this->Icccomps->patchEntity($icccomp, $this->request->getData());
            if ($this->Icccomps->save($icccomp)) {
                $this->Flash->success(__('The icccomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The icccomp could not be saved. Please, try again.'));
        }
        $iccs = $this->Icccomps->Iccs->find('list', ['limit' => 200]);
		
		//$context1  = stream_context_create($this ->options1);
           $result1 = file_get_contents($this -> url1, false);


        $topiccodes = json_decode($result1, true);
        $this->set(compact('icccomp', 'iccs','topiccodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Icccomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $icccomp = $this->Icccomps->get($id);
        if ($this->Icccomps->delete($icccomp)) {
            $this->Flash->success(__('The icccomp has been deleted.'));
        } else {
            $this->Flash->error(__('The icccomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
