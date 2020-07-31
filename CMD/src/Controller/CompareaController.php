<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Comparea Controller
 *
 * @property \App\Model\Table\CompareaTable $Comparea
 *
 * @method \App\Model\Entity\Comparea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompareaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM comparea";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Comparea id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comparea = $this->Comparea->get($id, [
            'contain' => ['Topic']
        ]);

        $this->set('comparea', $comparea);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comparea = $this->Comparea->newEntity();
        if ($this->request->is('post')) {
            $comparea = $this->Comparea->patchEntity($comparea, $this->request->getData());
            if ($this->Comparea->save($comparea)) {
                $this->Flash->success(__('The comparea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comparea could not be saved. Please, try again.'));
        }
        $this->set(compact('comparea'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comparea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comparea = $this->Comparea->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comparea = $this->Comparea->patchEntity($comparea, $this->request->getData());
            if ($this->Comparea->save($comparea)) {
                $this->Flash->success(__('The comparea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comparea could not be saved. Please, try again.'));
        }
        $this->set(compact('comparea'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comparea id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comparea = $this->Comparea->get($id);
        if ($this->Comparea->delete($comparea)) {
            $this->Flash->success(__('The comparea has been deleted.'));
        } else {
            $this->Flash->error(__('The comparea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
