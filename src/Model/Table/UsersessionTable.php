<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usersession Model
 *
 * @method \App\Model\Entity\Usersession get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usersession newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usersession[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usersession|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usersession|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usersession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usersession[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usersession findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersessionTable extends Table
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

        $this->setTable('usersession');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('uid')
            ->requirePresence('uid', 'create')
            ->allowEmptyString('uid', false);

        $validator
            ->dateTime('datetime')
            ->requirePresence('datetime', 'create')
            ->allowEmptyDateTime('datetime', false);

        return $validator;
    }
}
