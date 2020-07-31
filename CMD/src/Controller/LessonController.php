<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Lesson Controller
 *
 * @property \App\Model\Table\LessonTable $Lesson
 *
 * @method \App\Model\Entity\Lesson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LessonController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM lesson";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lesson = $this->Lesson->get($id, [
            'contain' => ['Topic', 'Level', 'Targettype', 'Example', 'Quiz']
        ]);

        $this->set('lesson', $lesson);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		
		if($id != null){
		
		 $topics = $this->Lesson->Topic->find('list',array(
    'conditions'=>array('Topic.id' => $id)));
		
		}
		else {
			$topics = $this->Lesson->Topic->find('list', ['limit' => 200]);
		}
		
        $lesson = $this->Lesson->newEntity();
        if ($this->request->is('post')) {
            $lesson = $this->Lesson->patchEntity($lesson, $this->request->getData());
            if ($this->Lesson->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
       // $topics = $this->Lesson->Topic->find('list', ['limit' => 200]);
        $levels = $this->Lesson->Level->find('list', ['limit' => 200]);
        $targettypes = $this->Lesson->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('lesson', 'topics', 'levels', 'targettypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lesson = $this->Lesson->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lesson->patchEntity($lesson, $this->request->getData());
            if ($this->Lesson->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $topics = $this->Lesson->Topic->find('list', ['limit' => 200]);
        $levels = $this->Lesson->Level->find('list', ['limit' => 200]);
        $targettypes = $this->Lesson->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('lesson', 'topics', 'levels', 'targettypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lesson = $this->Lesson->get($id);
        if ($this->Lesson->delete($lesson)) {
            $this->Flash->success(__('The lesson has been deleted.'));
        } else {
            $this->Flash->error(__('The lesson could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
