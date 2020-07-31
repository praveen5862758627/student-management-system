<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Userroles
 * @property |\Cake\ORM\Association\BelongsTo $Institutions
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('fname');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Userroles', [
            'foreignKey' => 'userroles_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institution', [
            'foreignKey' => 'institution_id',
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

      /*  $validator
            ->scalar('fname')
            ->maxLength('fname', 100)
            ->requirePresence('fname', 'create')
            ->allowEmptyString('fname', true);
			
        $validator
            ->scalar('lname')
            ->maxLength('lname', 100)
            ->requirePresence('lname', 'create')
            ->allowEmptyString('lname', true);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);
			
			$validator
            ->scalar('username')
			 ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', true);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 100)
            ->requirePresence('gender', 'create')
            ->allowEmptyString('gender', true);*/
         
		
		

      /*  $validator
            ->scalar('photoname')
            ->maxLength('photoname', 100)
            ->requirePresence('photoname', 'create')
            ->allowEmptyString('photoname', false);*/

        /*$validator
            ->scalar('phonenumber')
            ->maxLength('phonenumber', 50)
            ->allowEmptyString('phonenumber',true);*/

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
        $rules->add($rules->isUnique(['email']));
		 //$rules->add($rules->isUnique(['username']));
       // $rules->add($rules->existsIn(['userroles_id'], 'Userroles'));
        //$rules->add($rules->existsIn(['institution_id'], 'Institution'));

        return $rules;
    }
}
