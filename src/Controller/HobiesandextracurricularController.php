<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Hobiesandextracurricular Controller
 *
 * @property \App\Model\Table\HobiesandextracurricularTable $Hobiesandextracurricular
 *
 * @method \App\Model\Entity\Hobiesandextracurricular[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HobiesandextracurricularController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hobiesandextracurricular = $this->paginate($this->Hobiesandextracurricular);

        $this->set(compact('hobiesandextracurricular'));
    }

    /**
     * View method
     *
     * @param string|null $id Hobiesandextracurricular id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hobiesandextracurricular = $this->Hobiesandextracurricular->get($id, [
            'contain' => []
        ]);

        $this->set('hobiesandextracurricular', $hobiesandextracurricular);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  
	 public function add()
    {
			 if ($this->request->is(array('ajax'))) { 
        $areaofinterest = $this->Hobiesandextracurricular->newEntity();
		
		$areaofinterest->userid = $this->request->data['userid']; 
		$areaofinterest->name = $this->request->data['name']; 
			$areaofinterest->description = $this->request->data['description']; 
       
            $areaofinterest = $this->Hobiesandextracurricular->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Hobiesandextracurricular->save($areaofinterest)) {
             
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
     * @param string|null $id Hobiesandextracurricular id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hobiesandextracurricular = $this->Hobiesandextracurricular->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hobiesandextracurricular = $this->Hobiesandextracurricular->patchEntity($hobiesandextracurricular, $this->request->getData());
            if ($this->Hobiesandextracurricular->save($hobiesandextracurricular)) {
                $this->Flash->success(__('The HOBBIES AND EXTRA CURRICULAR has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The HOBBIES AND EXTRA CURRICULAR could not be saved. Please, try again.'));
        }
        $this->set(compact('hobiesandextracurricular'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hobiesandextracurricular id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hobiesandextracurricular = $this->Hobiesandextracurricular->get($id);
        if ($this->Hobiesandextracurricular->delete($hobiesandextracurricular)) {
            $this->Flash->success(__('The HOBBIES AND EXTRA CURRICULAR has been deleted.'));
        } else {
            $this->Flash->error(__('The HOBBIES AND EXTRA CURRICULAR could not be deleted. Please, try again.'));
        }

         return $this->redirect(['controller' => 'users',
            'action' => 'index']);
    }
	
		public function deleterow() {
	   
		   $this->autoRender = false;
		
		//$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) { 
 $blockid = $_POST['cat_val'];
 
 


        $optionalblockTable = TableRegistry::get('hobiesandextracurricular');
        $query = $optionalblockTable->query();
        $query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['id' => $blockid])
                ->execute();
				echo "Deleted Successfully";
				exit;
		}
       
}
	
}
