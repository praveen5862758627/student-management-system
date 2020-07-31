<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ticket Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketTable extends Table
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

        $this->setTable('ticket');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->nonNegativeInteger('ticket_number')
            ->allowEmptyString('ticket_number');

        $validator
            ->boolean('unread')
            ->allowEmptyString('unread');

        $validator
            ->scalar('priority')
            ->maxLength('priority', 191)
            ->allowEmptyString('priority');

        $validator
            ->boolean('unread_staff')
            ->allowEmptyString('unread_staff');

        $validator
            ->scalar('title')
            ->maxLength('title', 191)
            ->allowEmptyString('title');

        $validator
            ->scalar('content')
            ->maxLength('content', 2000)
            ->allowEmptyString('content');

        $validator
            ->scalar('language')
            ->maxLength('language', 191)
            ->allowEmptyString('language');

        $validator
            ->scalar('file')
            ->maxLength('file', 191)
            ->allowEmptyFile('file');

        /*$validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');*/

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('user_email')
            ->maxLength('user_email', 191)
            ->allowEmptyString('user_email');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 191)
            ->allowEmptyString('user_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
