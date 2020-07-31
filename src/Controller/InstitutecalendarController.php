<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Cache\Cache;
use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Excelreader\PhpExcelReader;

/**
 * Institutecalendar Controller
 *
 * @property \App\Model\Table\InstitutecalendarTable $Institutecalendar
 *
 * @method \App\Model\Entity\Institutecalendar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstitutecalendarController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $institutecalendar = $this->paginate($this->Institutecalendar);

        $this->set(compact('institutecalendar'));
    }

    /**
     * View method
     *
     * @param string|null $id Institutecalendar id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institutecalendar = $this->Institutecalendar->get($id, [
            'contain' => []
        ]);

        $this->set('institutecalendar', $institutecalendar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institutecalendar = $this->Institutecalendar->newEntity();
        if ($this->request->is('post')) {
            $institutecalendar = $this->Institutecalendar->patchEntity($institutecalendar, $this->request->getData());
            if ($this->Institutecalendar->save($institutecalendar)) {
                $this->Flash->success(__('The Event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Event could not be saved. Please, try again.'));
        }
        $this->set(compact('institutecalendar'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Institutecalendar id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institutecalendar = $this->Institutecalendar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institutecalendar = $this->Institutecalendar->patchEntity($institutecalendar, $this->request->getData());
            if ($this->Institutecalendar->save($institutecalendar)) {
				
				
				$this->loadModel('Events');			
				
			
				
				
		
		$this->Events->updateAll(['title' => $_POST['title'],'start' => $_POST['start']],['inscalid' => $id]);
				
				
				
                $this->Flash->success(__('The Event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Event could not be saved. Please, try again.'));
        }
        $this->set(compact('institutecalendar'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Institutecalendar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institutecalendar = $this->Institutecalendar->get($id);
		
		
		 $this->loadModel('Events');
			
				
				
					$conn = ConnectionManager::get('default');
		
        $querytcomps = 'delete FROM events where  inscalid ="'.$id.'"';




        $stmt1 = $conn->execute($querytcomps);
		
		
        if ($this->Institutecalendar->delete($institutecalendar)) {
			
			
			
			
			
            $this->Flash->success(__('The Event has been deleted.'));
        } else {
            $this->Flash->error(__('The Event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
