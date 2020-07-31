<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Semesters Controller
 *
 * @property \App\Model\Table\SemestersTable $Semesters
 *
 * @method \App\Model\Entity\Semester[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SemestersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM semesters";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semester = $this->Semesters->get($id, [
            'contain' => ['Semestercomps']
        ]);

        $this->set('semester', $semester);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semester = $this->Semesters->newEntity();
        if ($this->request->is('post')) {
            $semester = $this->Semesters->patchEntity($semester, $this->request->getData());
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('The semester has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The semester could not be saved. Please, try again.'));
        }
        $this->set(compact('semester'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semester = $this->Semesters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semester = $this->Semesters->patchEntity($semester, $this->request->getData());
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('The semester has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The semester could not be saved. Please, try again.'));
        }
        $this->set(compact('semester'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semester = $this->Semesters->get($id);
        if ($this->Semesters->delete($semester)) {
            $this->Flash->success(__('The semester has been deleted.'));
        } else {
            $this->Flash->error(__('The semester could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
