<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Learningplan Model
 *
 * @property \App\Model\Table\TargetcompsTable|\Cake\ORM\Association\BelongsTo $Targetcomps
 *
 * @method \App\Model\Entity\Learningplan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Learningplan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Learningplan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Learningplan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learningplan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learningplan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Learningplan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Learningplan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LearningplanTable extends Table
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

        $this->setTable('learningplan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Targetcomps', [
            'foreignKey' => 'targetcomps_id',
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
            ->scalar('status')
            ->maxLength('status', 100)
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('date')
            ->maxLength('date', 100)
            ->requirePresence('date', 'create')
            ->allowEmptyString('date', false);

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
        $rules->add($rules->existsIn(['targetcomps_id'], 'Targetcomps'));

        return $rules;
    }
}
