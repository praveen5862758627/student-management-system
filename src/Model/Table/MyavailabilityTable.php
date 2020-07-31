<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Myavailability Model
 *
 * @method \App\Model\Entity\Myavailability get($primaryKey, $options = [])
 * @method \App\Model\Entity\Myavailability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Myavailability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Myavailability|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Myavailability|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Myavailability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Myavailability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Myavailability findOrCreate($search, callable $callback = null, $options = [])
 */
class MyavailabilityTable extends Table
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

        $this->setTable('myavailability');
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
            ->scalar('availability')
            ->maxLength('availability', 250)
            ->allowEmptyString('availability');

        $validator
            ->scalar('available_as')
            ->maxLength('available_as', 250)
            ->allowEmptyString('available_as');

        $validator
            ->scalar('fromdate')
            ->maxLength('fromdate', 250)
            ->allowEmptyString('fromdate');

        $validator
            ->scalar('todate')
            ->maxLength('todate', 250)
            ->allowEmptyString('todate');

        $validator
            ->scalar('location')
            ->maxLength('location', 250)
            ->allowEmptyString('location');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        return $validator;
    }
}
