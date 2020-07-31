<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketUser Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TicketUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketUser findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketUserTable extends Table
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

        $this->setTable('ticket_user');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('ticket_number')
            ->requirePresence('ticket_number', 'create')
            ->allowEmptyString('ticket_number', false);

        $validator
            ->integer('sub_ticket_number')
            ->requirePresence('sub_ticket_number', 'create')
            ->allowEmptyString('sub_ticket_number', false);

        $validator
            ->scalar('content')
            ->maxLength('content', 2000)
            ->allowEmptyString('content');

        $validator
            ->scalar('file')
            ->maxLength('file', 191)
            ->allowEmptyFile('file');

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
