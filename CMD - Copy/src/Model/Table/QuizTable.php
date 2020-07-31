<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quiz Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Lessons
 * @property |\Cake\ORM\Association\BelongsTo $Levels
 * @property |\Cake\ORM\Association\BelongsTo $Targettypes
 *
 * @method \App\Model\Entity\Quiz get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quiz newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quiz[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quiz|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuizTable extends Table
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

        $this->setTable('quiz');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Lesson', [
            'foreignKey' => 'lesson_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Level', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Targettype', [
            'foreignKey' => 'targettype_id',
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
            ->scalar('code')
            ->maxLength('code', 100)
            ->requirePresence('code', 'create')
            ->allowEmptyString('code', false);

        $validator
            ->scalar('mcode')
            ->maxLength('mcode', 500)
            ->requirePresence('mcode', 'create')
            ->allowEmptyString('mcode', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('author')
            ->maxLength('author', 200)
            ->requirePresence('author', 'create')
            ->allowEmptyString('author', false);

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
        $rules->add($rules->existsIn(['lesson_id'], 'Lesson'));
        $rules->add($rules->existsIn(['level_id'], 'Level'));
        $rules->add($rules->existsIn(['targettype_id'], 'Targettype'));

        return $rules;
    }
}
