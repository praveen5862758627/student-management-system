<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Areaofinterest Controller
 *
 * @property \App\Model\Table\AreaofinterestTable $Areaofinterest
 *
 * @method \App\Model\Entity\Areaofinterest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AreaofinterestController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $areaofinterest = $this->paginate($this->Areaofinterest);

        $this->set(compact('areaofinterest'));
    }

    /**
     * View method
     *
     * @param string|null $id Areaofinterest id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $areaofinterest = $this->Areaofinterest->get($id, [
            'contain' => []
        ]);

        $this->set('areaofinterest', $areaofinterest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
			 if ($this->request->is(array('ajax'))) { 
        $areaofinterest = $this->Areaofinterest->newEntity();
		
		$areaofinterest->userid = $this->request->data['userid']; 
		$areaofinterest->name = $this->request->data['name']; 
			$areaofinterest->description = $this->request->data['description']; 
       
            $areaofinterest = $this->Areaofinterest->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Areaofinterest->save($areaofinterest)) {
             
			  echo 'Changes has been saved';
			
            }
			else{
			
			echo "Error saving the data.";
			}
			 }
			EXIT;
    }

    /**
     * Edit method
     *
     * @param string|null $id Areaofinterest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $areaofinterest = $this->Areaofinterest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $areaofinterest = $this->Areaofinterest->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Areaofinterest->save($areaofinterest)) {
                $this->Flash->success(__('The AREAS OF INTEREST has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The AREAS OF INTEREST could not be saved. Please, try again.'));
        }
        $this->set(compact('areaofinterest'));
    }

public function deleterow() {
	   
		   $this->autoRender = false;
		
		//$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) { 
 $blockid = $_POST['cat_val'];
 
 


        $optionalblockTable = TableRegistry::get('areaofinterest');
        $query = $optionalblockTable->query();
        $query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['id' => $blockid])
                ->execute();
				echo "Deleted Successfully";
				exit;
		}
       
}
    /**
     * Delete method
     *
     * @param string|null $id Areaofinterest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $areaofinterest = $this->Areaofinterest->get($id);
        if ($this->Areaofinterest->delete($areaofinterest)) {
            $this->Flash->success(__('The AREAS OF INTEREST has been deleted.'));
        } else {
            $this->Flash->error(__('The AREAS OF INTEREST could not be deleted. Please, try again.'));
        }

          return $this->redirect(['controller' => 'users',
            'action' => 'index']);
    }
}
