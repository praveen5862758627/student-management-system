<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Preferencesquestion Controller
 *
 * @property \App\Model\Table\PreferencesquestionTable $Preferencesquestion
 *
 * @method \App\Model\Entity\Preferencesquestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreferencesquestionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $preferencesquestion = $this->paginate($this->Preferencesquestion);

        $this->set(compact('preferencesquestion'));
    }

    /**
     * View method
     *
     * @param string|null $id Preferencesquestion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preferencesquestion = $this->Preferencesquestion->get($id, [
            'contain' => []
        ]);

        $this->set('preferencesquestion', $preferencesquestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
         if ($this->request->is(array('ajax'))) { 
		 
		  $preferencesquestion = $this->Preferencesquestion->newEntity();

   $optionalblockTable = TableRegistry::get('preferencesquestion');
        $query = $optionalblockTable->query();
		$query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['userid' => $this->request->getSession()->read('sessionname')])
                ->execute();
			 
			 $this->request->data['userid'] =  $this->request->getSession()->read('sessionname');
			 
			 
			 $this->request->data['question1'] =  $this->request->data['question1']; 
			  $this->request->data['question2'] =  $this->request->data['question2']; 
			   $this->request->data['question3'] =  $this->request->data['question3']; 
			    $this->request->data['question4'] =  $this->request->data['question4']; 
				 $this->request->data['question5'] =  $this->request->data['question5']; 
				  $this->request->data['question6'] =  $this->request->data['question6']; 
				   $this->request->data['question7'] =  $this->request->data['question7']; 
				    /*$this->request->data['question8'] =  $this->request->data['question8']; */
					 $this->request->data['question9'] =  $this->request->data['question9']; 
					  $this->request->data['question10'] =  $this->request->data['question10']; 
					   $this->request->data['question11'] =  $this->request->data['question11']; 
					    $this->request->data['question12'] =  $this->request->data['question12']; 
						 $this->request->data['question13'] =  $this->request->data['question13']; 
			 
			 
			 
            $preferencesquestion = $this->Preferencesquestion->patchEntity($preferencesquestion, $this->request->getData());
            if ($this->Preferencesquestion->save($preferencesquestion)) {
               echo 'Changes has been saved.';
            }
            else
			{
				echo 'Changes could not be saved. Please, try again.';
			}
			exit;
        }
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Preferencesquestion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preferencesquestion = $this->Preferencesquestion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preferencesquestion = $this->Preferencesquestion->patchEntity($preferencesquestion, $this->request->getData());
            if ($this->Preferencesquestion->save($preferencesquestion)) {
                $this->Flash->success(__('The preferencesquestion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preferencesquestion could not be saved. Please, try again.'));
        }
        $this->set(compact('preferencesquestion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preferencesquestion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preferencesquestion = $this->Preferencesquestion->get($id);
        if ($this->Preferencesquestion->delete($preferencesquestion)) {
            $this->Flash->success(__('The preferencesquestion has been deleted.'));
        } else {
            $this->Flash->error(__('The preferencesquestion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
