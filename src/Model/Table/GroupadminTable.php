<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groupadmin Model
 *
 * @method \App\Model\Entity\Groupadmin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Groupadmin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Groupadmin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Groupadmin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Groupadmin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Groupadmin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Groupadmin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Groupadmin findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupadminTable extends Table
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

        $this->setTable('groupadmin');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('studentgroup')
            ->maxLength('studentgroup', 250)
            ->requirePresence('studentgroup', 'create')
            ->allowEmptyString('studentgroup', false);

        return $validator;
    }
}
