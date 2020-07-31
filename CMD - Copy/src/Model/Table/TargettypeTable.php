<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Targettype Model
 *
 * @property \App\Model\Table\ExampleTable|\Cake\ORM\Association\HasMany $Example
 * @property \App\Model\Table\LessonTable|\Cake\ORM\Association\HasMany $Lesson
 * @property \App\Model\Table\QuestionbankTable|\Cake\ORM\Association\HasMany $Questionbank
 * @property \App\Model\Table\QuizTable|\Cake\ORM\Association\HasMany $Quiz
 *
 * @method \App\Model\Entity\Targettype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Targettype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Targettype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Targettype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Targettype|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Targettype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Targettype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Targettype findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TargettypeTable extends Table
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

        $this->setTable('targettype');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Example', [
            'foreignKey' => 'targettype_id'
        ]);
        $this->hasMany('Lesson', [
            'foreignKey' => 'targettype_id'
        ]);
        $this->hasMany('Questionbank', [
            'foreignKey' => 'targettype_id'
        ]);
        $this->hasMany('Quiz', [
            'foreignKey' => 'targettype_id'
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        return $validator;
    }
}
