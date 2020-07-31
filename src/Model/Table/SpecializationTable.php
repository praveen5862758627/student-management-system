<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialization Model
 *
 * @method \App\Model\Entity\Specialization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialization newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specialization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialization|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialization|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialization[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialization findOrCreate($search, callable $callback = null, $options = [])
 */
class SpecializationTable extends Table
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

        $this->setTable('specialization');
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
            ->integer('courseid')
            ->requirePresence('courseid', 'create')
            ->allowEmptyString('courseid', false);

        return $validator;
    }
}
