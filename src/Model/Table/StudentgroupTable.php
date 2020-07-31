<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Studentgroup Model
 *
 * @method \App\Model\Entity\Studentgroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Studentgroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Studentgroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Studentgroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Studentgroup|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Studentgroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Studentgroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Studentgroup findOrCreate($search, callable $callback = null, $options = [])
 */
class StudentgroupTable extends Table
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

        $this->setTable('studentgroup');
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
	
	 public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));
		

        return $rules;
    }
}
