<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Chapters Controller
 *
 * @property \App\Model\Table\ChaptersTable $Chapters
 *
 * @method \App\Model\Entity\Chapter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChaptersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM chapters";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chapter = $this->Chapters->get($id, [
            'contain' => ['Lessons']
        ]);

        $this->set('chapter', $chapter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		if($id != null){
		
		 $lessons = $this->Chapters->Lesson->find('list',array(
    'conditions'=>array('Lesson.id' => $id)));
		
		}
		else {
			 $lessons = $this->Chapters->Lesson->find('list', ['limit' => 20000]);
		}
		
        $chapter = $this->Chapters->newEntity();
        if ($this->request->is('post')) {
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
            if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
       // $lessons = $this->Chapters->Lesson->find('list', ['limit' => 200]);
        $this->set(compact('chapter', 'lessons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chapter = $this->Chapters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
            if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
        $lessons = $this->Chapters->Lesson->find('list', ['limit' => 200]);
        $this->set(compact('chapter', 'lessons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chapter = $this->Chapters->get($id);
        if ($this->Chapters->delete($chapter)) {
            $this->Flash->success(__('The chapter has been deleted.'));
        } else {
            $this->Flash->error(__('The chapter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
