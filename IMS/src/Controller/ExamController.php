<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exam Controller
 *
 * @property \App\Model\Table\ExamTable $Exam
 *
 * @method \App\Model\Entity\Exam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Company']
        ];
        $exam = $this->paginate($this->Exam);

        $this->set(compact('exam'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exam = $this->Exam->get($id, [
            'contain' => ['Company', 'Examschedule']
        ]);

        $this->set('exam', $exam);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exam->newEntity();
        if ($this->request->is('post')) {
            $exam = $this->Exam->patchEntity($exam, $this->request->getData());
            if ($this->Exam->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $companies = $this->Exam->Company->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exam->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exam->patchEntity($exam, $this->request->getData());
            if ($this->Exam->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $companies = $this->Exam->Company->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exam->get($id);
        if ($this->Exam->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
