<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examcomps Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Examschdules
 *
 * @method \App\Model\Entity\Examcomp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examcomp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Examcomp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examcomp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examcomp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examcomp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examcomp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examcomp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamcompsTable extends Table
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

        $this->setTable('examcomps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

       $this->belongsTo('Examschedule', [
            'foreignKey' => 'examschedule_id',
            'joinType' => 'INNER'
        ]);
		
		/*  $this->belongsTo('Exam', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER'
        ]);*/
		
		  $this->hasMany('Examschedule', [
            'foreignKey' => 'exam_id'
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
            ->scalar('level')
            ->maxLength('level', 100)
            ->requirePresence('level', 'create')
            ->allowEmptyString('level', false);

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
    /*public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['examschedule_id'], 'Examschedule'));

        return $rules;
    }*/
}
