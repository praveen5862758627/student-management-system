<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examschedule Controller
 *
 * @property \App\Model\Table\ExamscheduleTable $Examschedule
 *
 * @method \App\Model\Entity\Examschedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamscheduleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exam']
        ];
        $examschedule = $this->paginate($this->Examschedule);

        $this->set(compact('examschedule'));
    }

    /**
     * View method
     *
     * @param string|null $id Examschedule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examschedule = $this->Examschedule->get($id, [
            'contain' => ['Exam']
        ]);

        $this->set('examschedule', $examschedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		if($id != null){
		
		 $exams = $this->Examschedule->Exam->find('list',array(
    'conditions'=>array('Exam.id' => $id)));
		
		}
		else {
			 $exams = $this->Examschedule->Exam->find('list', ['limit' => 200]);
		}
		
        $examschedule = $this->Examschedule->newEntity();
        if ($this->request->is('post')) {
            $examschedule = $this->Examschedule->patchEntity($examschedule, $this->request->getData());
            if ($this->Examschedule->save($examschedule)) {
                $this->Flash->success(__('The examschedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examschedule could not be saved. Please, try again.'));
        }
       
        $this->set(compact('examschedule', 'exams'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examschedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examschedule = $this->Examschedule->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examschedule = $this->Examschedule->patchEntity($examschedule, $this->request->getData());
            if ($this->Examschedule->save($examschedule)) {
                $this->Flash->success(__('The examschedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examschedule could not be saved. Please, try again.'));
        }
        $exams = $this->Examschedule->Exam->find('list', ['limit' => 200]);
        $this->set(compact('examschedule', 'exams'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examschedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examschedule = $this->Examschedule->get($id);
        if ($this->Examschedule->delete($examschedule)) {
            $this->Flash->success(__('The examschedule has been deleted.'));
        } else {
            $this->Flash->error(__('The examschedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
