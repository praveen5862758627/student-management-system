<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Quiz Controller
 *
 * @property \App\Model\Table\QuizTable $Quiz
 *
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
         $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM quiz";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quiz = $this->Quiz->get($id, [
            'contain' => ['Lesson', 'Level', 'Targettype']
        ]);

        $this->set('quiz', $quiz);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		
		if($id != null){
		
		 $lesson = $this->Quiz->Lesson->find('list',array(
    'conditions'=>array('Lesson.id' => $id)));
		
		}
		else {
			 $lesson = $this->Quiz->Lesson->find('list', ['limit' => 20000]);
		}
		
        $quiz = $this->Quiz->newEntity();
        if ($this->request->is('post')) {
            $quiz = $this->Quiz->patchEntity($quiz, $this->request->getData());
            if ($this->Quiz->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
       
        $level = $this->Quiz->Level->find('list', ['limit' => 200]);
        $targettype = $this->Quiz->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('quiz', 'lesson', 'level', 'targettype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiz = $this->Quiz->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quiz->patchEntity($quiz, $this->request->getData());
            if ($this->Quiz->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $lesson = $this->Quiz->Lesson->find('list', ['limit' => 200]);
        $level = $this->Quiz->Level->find('list', ['limit' => 200]);
        $targettype = $this->Quiz->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('quiz', 'lesson', 'level', 'targettype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quiz->get($id);
        if ($this->Quiz->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
