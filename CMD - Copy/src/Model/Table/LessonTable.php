<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lesson Model
 *
 * @property \App\Model\Table\TopicsTable|\Cake\ORM\Association\BelongsTo $Topics
 * @property \App\Model\Table\LevelsTable|\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\TargettypesTable|\Cake\ORM\Association\BelongsTo $Targettypes
 * @property \App\Model\Table\ExampleTable|\Cake\ORM\Association\HasMany $Example
 * @property \App\Model\Table\QuizTable|\Cake\ORM\Association\HasMany $Quiz
 *
 * @method \App\Model\Entity\Lesson get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lesson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lesson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lesson|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lesson|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lesson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lesson findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LessonTable extends Table
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

        $this->setTable('lesson');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Topic', [
            'foreignKey' => 'topic_id',
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
        $this->hasMany('Example', [
            'foreignKey' => 'lesson_id'
        ]);
        $this->hasMany('Quiz', [
            'foreignKey' => 'lesson_id'
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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        $validator
            ->scalar('author')
            ->maxLength('author', 250)
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
        $rules->add($rules->existsIn(['topic_id'], 'Topic'));
        $rules->add($rules->existsIn(['level_id'], 'Level'));
        $rules->add($rules->existsIn(['targettype_id'], 'Targettype'));

        return $rules;
    }
}
