<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examschedule Model
 *
 * @property \App\Model\Table\ExamsTable|\Cake\ORM\Association\BelongsTo $Exams
 *
 * @method \App\Model\Entity\Examschedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examschedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Examschedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examschedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examschedule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examschedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examschedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examschedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamscheduleTable extends Table
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

        $this->setTable('examschedule');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Exam', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER'
        ]);
		
		 /* $this->hasMany('Exam', [
            'foreignKey' => 'exam_id'
        ]);*/
		
		$this->belongsTo('Examcomps', [
            'foreignKey' => 'examschedule_id',
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
            ->scalar('date')
            ->maxLength('date', 100)
            ->requirePresence('date', 'create')
            ->allowEmptyString('date', false);

        $validator
            ->scalar('location')
            ->maxLength('location', 200)
            ->requirePresence('location', 'create')
            ->allowEmptyString('location', false);

        $validator
            ->scalar('eligibility')
            ->requirePresence('eligibility', 'create')
            ->allowEmptyString('eligibility', false);

        $validator
            ->scalar('Selectionstages')
            ->requirePresence('Selectionstages', 'create')
            ->allowEmptyString('Selectionstages', false);

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
        $rules->add($rules->existsIn(['exam_id'], 'Exam'));

        return $rules;
    }
}
