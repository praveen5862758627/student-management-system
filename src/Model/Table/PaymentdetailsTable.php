<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymentdetails Model
 *
 * @property \App\Model\Table\RazorpayPaymentsTable|\Cake\ORM\Association\BelongsTo $RazorpayPayments
 * @property \App\Model\Table\RazorpayOrdersTable|\Cake\ORM\Association\BelongsTo $RazorpayOrders
 * @property \App\Model\Table\MerchantOrdersTable|\Cake\ORM\Association\BelongsTo $MerchantOrders
 *
 * @method \App\Model\Entity\Paymentdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paymentdetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paymentdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentdetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentdetail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentdetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentdetail findOrCreate($search, callable $callback = null, $options = [])
 */
class PaymentdetailsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('paymentdetails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

       /* $this->belongsTo('RazorpayPayments', [
            'foreignKey' => 'razorpay_payment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RazorpayOrders', [
            'foreignKey' => 'razorpay_order_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MerchantOrders', [
            'foreignKey' => 'merchant_order_id',
            'joinType' => 'INNER'
        ]);*/
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        $validator
            ->scalar('productcode')
            ->maxLength('productcode', 100)
            ->requirePresence('productcode', 'create')
            ->allowEmptyString('productcode', false);

        $validator
            ->scalar('productname')
            ->maxLength('productname', 200)
            ->requirePresence('productname', 'create')
            ->allowEmptyString('productname', false);

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('price')
            ->maxLength('price', 100)
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

        $validator
            ->scalar('datetime')
            ->maxLength('datetime', 100)
            ->requirePresence('datetime', 'create')
            ->allowEmptyString('datetime', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
}
