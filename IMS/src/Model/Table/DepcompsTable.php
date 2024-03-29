<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depcomps Model
 *
 * @property \App\Model\Table\DepsTable|\Cake\ORM\Association\BelongsTo $Deps
 *
 * @method \App\Model\Entity\Depcomp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Depcomp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Depcomp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Depcomp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depcomp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depcomp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Depcomp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Depcomp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepcompsTable extends Table
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

        $this->setTable('depcomps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Deps', [
            'foreignKey' => 'dep_id',
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
            ->scalar('topic_code')
            ->maxLength('topic_code', 100)
            ->requirePresence('topic_code', 'create')
            ->allowEmptyString('topic_code', false);

        $validator
            ->scalar('lesson_code')
            ->maxLength('lesson_code', 100)
            ->requirePresence('lesson_code', 'create')
            ->allowEmptyString('lesson_code', false);

        $validator
            ->scalar('level_code')
            ->maxLength('level_code', 100)
            ->requirePresence('level_code', 'create')
            ->allowEmptyString('level_code', false);

        $validator
            ->scalar('score')
            ->maxLength('score', 100)
            ->requirePresence('score', 'create')
            ->allowEmptyString('score', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
  /*  public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['dep_id'], 'Deps'));

        return $rules;
    }*/
}
