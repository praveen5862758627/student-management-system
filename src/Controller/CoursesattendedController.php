<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Coursesattended Controller
 *
 * @property \App\Model\Table\CoursesattendedTable $Coursesattended
 *
 * @method \App\Model\Entity\Coursesattended[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesattendedController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $coursesattended = $this->paginate($this->Coursesattended);

        $this->set(compact('coursesattended'));
    }

    /**
     * View method
     *
     * @param string|null $id Coursesattended id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursesattended = $this->Coursesattended->get($id, [
            'contain' => []
        ]);

        $this->set('coursesattended', $coursesattended);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
 

		 public function add()
    {
			 if ($this->request->is(array('ajax'))) { 
        $areaofinterest = $this->Coursesattended->newEntity();
		
		$areaofinterest->userid = $this->request->data['userid']; 
		$areaofinterest->name = $this->request->data['name']; 
			$areaofinterest->description = $this->request->data['description']; 
       
            $areaofinterest = $this->Coursesattended->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Coursesattended->save($areaofinterest)) {
             
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
     * @param string|null $id Coursesattended id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursesattended = $this->Coursesattended->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesattended = $this->Coursesattended->patchEntity($coursesattended, $this->request->getData());
            if ($this->Coursesattended->save($coursesattended)) {
                $this->Flash->success(__('The LECTURES/COURSES ATTENDED has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The LECTURES/COURSES ATTENDED could not be saved. Please, try again.'));
        }
        $this->set(compact('coursesattended'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coursesattended id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursesattended = $this->Coursesattended->get($id);
        if ($this->Coursesattended->delete($coursesattended)) {
            $this->Flash->success(__('The LECTURES/COURSES ATTENDED has been deleted.'));
        } else {
            $this->Flash->error(__('The LECTURES/COURSES ATTENDED could not be deleted. Please, try again.'));
        }

         return $this->redirect(['controller' => 'users',
            'action' => 'index']);
    }
	

	public function deleterow() {
	   
		   $this->autoRender = false;
		
		//$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) { 
 $blockid = $_POST['cat_val'];
 
 


        $optionalblockTable = TableRegistry::get('coursesattended');
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
