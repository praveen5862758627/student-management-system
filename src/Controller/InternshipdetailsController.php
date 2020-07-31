<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Internshipdetails Controller
 *
 * @property \App\Model\Table\InternshipdetailsTable $Internshipdetails
 *
 * @method \App\Model\Entity\Internshipdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipdetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $internshipdetails = $this->paginate($this->Internshipdetails);

        $this->set(compact('internshipdetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Internshipdetail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internshipdetail = $this->Internshipdetails->get($id, [
            'contain' => []
        ]);

        $this->set('internshipdetail', $internshipdetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

 public function add()
    {
			 if ($this->request->is(array('ajax'))) { 
        $areaofinterest = $this->Internshipdetails->newEntity();
		
		$areaofinterest->userid = $this->request->data['userid']; 
		$areaofinterest->name = $this->request->data['name']; 
			$areaofinterest->description = $this->request->data['description']; 
       
            $areaofinterest = $this->Internshipdetails->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Internshipdetails->save($areaofinterest)) {
             
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
     * @param string|null $id Internshipdetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $internshipdetail = $this->Internshipdetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internshipdetail = $this->Internshipdetails->patchEntity($internshipdetail, $this->request->getData());
            if ($this->Internshipdetails->save($internshipdetail)) {
                $this->Flash->success(__('The INTERNSHIP DETAILS has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The INTERNSHIP DETAILS could not be saved. Please, try again.'));
        }
        $this->set(compact('internshipdetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internshipdetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internshipdetail = $this->Internshipdetails->get($id);
        if ($this->Internshipdetails->delete($internshipdetail)) {
            $this->Flash->success(__('The INTERNSHIP DETAILS has been deleted.'));
        } else {
            $this->Flash->error(__('The INTERNSHIP DETAILS could not be deleted. Please, try again.'));
        }

         return $this->redirect(['controller' => 'users',
            'action' => 'index']);
    }
		
	public function deleterow() {
	   
		   $this->autoRender = false;
		
		//$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) { 
 $blockid = $_POST['cat_val'];
 
 


        $optionalblockTable = TableRegistry::get('internshipdetails');
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
