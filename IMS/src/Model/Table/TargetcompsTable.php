<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Targetcomps Model
 *
 * @property \App\Model\Table\TargetsTable|\Cake\ORM\Association\BelongsTo $Targets
 *
 * @method \App\Model\Entity\Targetcomp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Targetcomp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Targetcomp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Targetcomp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Targetcomp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Targetcomp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Targetcomp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Targetcomp findOrCreate($search, callable $callback = null, $options = [])
 */
class TargetcompsTable extends Table
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

        $this->setTable('targetcomps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Target', [
            'foreignKey' => 'target_id',
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
            ->scalar('targetcode')
            ->maxLength('targetcode', 50)
            ->requirePresence('targetcode', 'create')
            ->allowEmptyString('targetcode', false);

        $validator
            ->scalar('competency_code')
            ->maxLength('competency_code', 100)
            ->requirePresence('competency_code', 'create')
            ->allowEmptyString('competency_code', false);

        $validator
            ->scalar('level')
            ->maxLength('level', 100)
            ->requirePresence('level', 'create')
            ->allowEmptyString('level', false);

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
       /* $rules->add($rules->existsIn(['target_id'], 'Targets'));

        return $rules;*/
    }
}
