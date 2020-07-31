<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courselist Model
 *
 * @method \App\Model\Entity\Courselist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Courselist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Courselist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Courselist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Courselist|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Courselist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Courselist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Courselist findOrCreate($search, callable $callback = null, $options = [])
 */
class CourselistTable extends Table
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

        $this->setTable('courselist');
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
            ->maxLength('name', 500)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        return $validator;
    }
}
