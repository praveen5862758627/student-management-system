<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paymentdetails Controller
 *
 * @property \App\Model\Table\PaymentdetailsTable $Paymentdetails
 *
 * @method \App\Model\Entity\Paymentdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentdetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RazorpayPayments', 'RazorpayOrders', 'MerchantOrders']
        ];
        $paymentdetails = $this->paginate($this->Paymentdetails);

        $this->set(compact('paymentdetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Paymentdetail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentdetail = $this->Paymentdetails->get($id, [
            'contain' => ['RazorpayPayments', 'RazorpayOrders', 'MerchantOrders']
        ]);

        $this->set('paymentdetail', $paymentdetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentdetail = $this->Paymentdetails->newEntity();
        if ($this->request->is('post')) {
            $paymentdetail = $this->Paymentdetails->patchEntity($paymentdetail, $this->request->getData());
            if ($this->Paymentdetails->save($paymentdetail)) {
                $this->Flash->success(__('The paymentdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymentdetail could not be saved. Please, try again.'));
        }
        $razorpayPayments = $this->Paymentdetails->RazorpayPayments->find('list', ['limit' => 200]);
        $razorpayOrders = $this->Paymentdetails->RazorpayOrders->find('list', ['limit' => 200]);
        $merchantOrders = $this->Paymentdetails->MerchantOrders->find('list', ['limit' => 200]);
        $this->set(compact('paymentdetail', 'razorpayPayments', 'razorpayOrders', 'merchantOrders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paymentdetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentdetail = $this->Paymentdetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentdetail = $this->Paymentdetails->patchEntity($paymentdetail, $this->request->getData());
            if ($this->Paymentdetails->save($paymentdetail)) {
                $this->Flash->success(__('The paymentdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymentdetail could not be saved. Please, try again.'));
        }
        $razorpayPayments = $this->Paymentdetails->RazorpayPayments->find('list', ['limit' => 200]);
        $razorpayOrders = $this->Paymentdetails->RazorpayOrders->find('list', ['limit' => 200]);
        $merchantOrders = $this->Paymentdetails->MerchantOrders->find('list', ['limit' => 200]);
        $this->set(compact('paymentdetail', 'razorpayPayments', 'razorpayOrders', 'merchantOrders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paymentdetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentdetail = $this->Paymentdetails->get($id);
        if ($this->Paymentdetails->delete($paymentdetail)) {
            $this->Flash->success(__('The paymentdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The paymentdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
