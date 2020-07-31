<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Electives Controller
 *
 * @property \App\Model\Table\ElectivesTable $Electives
 *
 * @method \App\Model\Entity\Elective[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ElectivesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $electives = $this->paginate($this->Electives);

        $this->set(compact('electives'));
    }

    /**
     * View method
     *
     * @param string|null $id Elective id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $elective = $this->Electives->get($id, [
            'contain' => []
        ]);

        $this->set('elective', $elective);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  
		 public function add()
    {
			 if ($this->request->is(array('ajax'))) { 
        $areaofinterest = $this->Electives->newEntity();
		
		$areaofinterest->userid = $this->request->data['userid']; 
		$areaofinterest->name = $this->request->data['name']; 
			$areaofinterest->description = $this->request->data['description']; 
       
            $areaofinterest = $this->Electives->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Electives->save($areaofinterest)) {
             
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
     * @param string|null $id Elective id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $elective = $this->Electives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $elective = $this->Electives->patchEntity($elective, $this->request->getData());
            if ($this->Electives->save($elective)) {
                $this->Flash->success(__('The Elective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Elective could not be saved. Please, try again.'));
        }
        $this->set(compact('elective'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Elective id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $elective = $this->Electives->get($id);
        if ($this->Electives->delete($elective)) {
            $this->Flash->success(__('The Elective has been deleted.'));
        } else {
            $this->Flash->error(__('The Elective could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users',
            'action' => 'index']);
    }
	
	
	public function deleterow() {
	   
		   $this->autoRender = false;
		
		//$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) { 
 $blockid = $_POST['cat_val'];
 
 


        $optionalblockTable = TableRegistry::get('electives');
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
