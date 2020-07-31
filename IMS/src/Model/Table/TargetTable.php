<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Target Model
 *
 * @property \App\Model\Table\TargetcompsTable|\Cake\ORM\Association\HasMany $Targetcomps
 * @property \App\Model\Table\TargetcompsoptTable|\Cake\ORM\Association\HasMany $Targetcompsopt
 *
 * @method \App\Model\Entity\Target get($primaryKey, $options = [])
 * @method \App\Model\Entity\Target newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Target[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Target|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Target|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Target patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Target[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Target findOrCreate($search, callable $callback = null, $options = [])
 */
class TargetTable extends Table
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

        $this->setTable('target');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Targetcomps', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Targetcompsopt', [
            'foreignKey' => 'target_id'
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
            ->scalar('code')
            ->maxLength('code', 250)
            ->requirePresence('code', 'create')
            ->allowEmptyString('code', false)
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('companycode')
            ->maxLength('companycode', 250)
            ->requirePresence('companycode', 'create')
            ->allowEmptyString('companycode', false);

        $validator
            ->scalar('clustercode')
            ->maxLength('clustercode', 250)
            ->requirePresence('clustercode', 'create')
            ->allowEmptyString('clustercode', false);

        $validator
            ->scalar('careerpathcode')
            ->maxLength('careerpathcode', 250)
            ->requirePresence('careerpathcode', 'create')
            ->allowEmptyString('careerpathcode', false);

        $validator
            ->scalar('precondition')
            ->maxLength('precondition', 250)
            ->requirePresence('precondition', 'create')
            ->allowEmptyString('precondition', false);

        $validator
            ->scalar('cutoff')
            ->maxLength('cutoff', 250)
            ->requirePresence('cutoff', 'create')
            ->allowEmptyString('cutoff', false);

        $validator
            ->scalar('minage')
            ->maxLength('minage', 250)
            ->requirePresence('minage', 'create')
            ->allowEmptyString('minage', false);

        $validator
            ->scalar('maxage')
            ->maxLength('maxage', 250)
            ->requirePresence('maxage', 'create')
            ->allowEmptyString('maxage', false);

        $validator
            ->scalar('month_approximate')
            ->maxLength('month_approximate', 100)
            ->requirePresence('month_approximate', 'create')
            ->allowEmptyString('month_approximate', false);

        $validator
            ->scalar('year')
            ->maxLength('year', 100)
            ->requirePresence('year', 'create')
            ->allowEmptyString('year', false);

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
        $rules->add($rules->isUnique(['code']));

        return $rules;
    }
}
