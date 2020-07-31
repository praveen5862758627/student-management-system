<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Sslcpuc Controller
 *
 * @property \App\Model\Table\SslcpucTable $Sslcpuc
 *
 * @method \App\Model\Entity\Sslcpuc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SslcpucController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sslcpuc = $this->paginate($this->Sslcpuc);

        $this->set(compact('sslcpuc'));
    }

    /**
     * View method
     *
     * @param string|null $id Sslcpuc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sslcpuc = $this->Sslcpuc->get($id, [
            'contain' => []
        ]);

        $this->set('sslcpuc', $sslcpuc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        if ($this->request->is(array('ajax'))) { 
		 $sslcpuc = $this->Sslcpuc->newEntity();
			
			if($_POST['type'] == 'SSLC') {
			   $optionalblockTable = TableRegistry::get('sslcpuc');
        $query = $optionalblockTable->query();
		$query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['userid' => $this->request->getSession()->read('sessionname'),'type'=>'SSLC'])
                ->execute();
			}
			if($_POST['type'] == 'PUC') {
			   $optionalblockTable = TableRegistry::get('sslcpuc');
        $query = $optionalblockTable->query();
		$query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['userid' => $this->request->getSession()->read('sessionname'),'type'=>'PUC'])
                ->execute();
			}
			
			$this->request->data['collegename'] =  $this->request->data['collegename']; 
			$this->request->data['board'] =  $this->request->data['board']; 
			$this->request->data['percentage'] =  $this->request->data['percentage']; 
			$this->request->data['regno'] =  $this->request->data['regno']; 
			$this->request->data['joining'] =  $this->request->data['joining']; 
			$this->request->data['passout'] =  $this->request->data['passout']; 
			$this->request->data['type'] =  $this->request->data['type']; 
			 
			 $this->request->data['userid'] =  $this->request->getSession()->read('sessionname');
			
            $sslcpuc = $this->Sslcpuc->patchEntity($sslcpuc, $this->request->getData());
            if ($this->Sslcpuc->save($sslcpuc)) {
				  echo 'Changes has been saved';
                       
            }
			else{
			
			echo "Error saving the data.";
			}
			exit;
          
        }
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Sslcpuc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sslcpuc = $this->Sslcpuc->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sslcpuc = $this->Sslcpuc->patchEntity($sslcpuc, $this->request->getData());
            if ($this->Sslcpuc->save($sslcpuc)) {
                $this->Flash->success(__('The sslcpuc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sslcpuc could not be saved. Please, try again.'));
        }
        $this->set(compact('sslcpuc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sslcpuc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sslcpuc = $this->Sslcpuc->get($id);
        if ($this->Sslcpuc->delete($sslcpuc)) {
            $this->Flash->success(__('The sslcpuc has been deleted.'));
        } else {
            $this->Flash->error(__('The sslcpuc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
