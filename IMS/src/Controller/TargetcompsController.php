<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Targetcomps Controller
 *
 * @property \App\Model\Table\TargetcompsTable $Targetcomps
 *
 * @method \App\Model\Entity\Targetcomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargetcompsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM targetcomps";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $targetcomp = $this->Targetcomps->get($id, [
            'contain' => ['Targets']
        ]);

        $this->set('targetcomp', $targetcomp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $targetcomp = $this->Targetcomps->newEntity();
        if ($this->request->is('post')) {
            $targetcomp = $this->Targetcomps->patchEntity($targetcomp, $this->request->getData());
            if ($this->Targetcomps->save($targetcomp)) {
                $this->Flash->success(__('The targetcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targetcomp could not be saved. Please, try again.'));
        }
        $targets = $this->Targetcomps->Target->find('list', ['limit' => 20000]);
        $this->set(compact('targetcomp', 'targets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $targetcomp = $this->Targetcomps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $targetcomp = $this->Targetcomps->patchEntity($targetcomp, $this->request->getData());
            if ($this->Targetcomps->save($targetcomp)) {
                $this->Flash->success(__('The targetcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targetcomp could not be saved. Please, try again.'));
        }
        $targets = $this->Targetcomps->Target->find('list', ['limit' => 20000]);
        $this->set(compact('targetcomp', 'targets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $targetcomp = $this->Targetcomps->get($id);
        if ($this->Targetcomps->delete($targetcomp)) {
            $this->Flash->success(__('The targetcomp has been deleted.'));
        } else {
            $this->Flash->error(__('The targetcomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
