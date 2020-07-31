<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapters Model
 *
 * @property \App\Model\Table\LessonsTable|\Cake\ORM\Association\BelongsTo $Lessons
 *
 * @method \App\Model\Entity\Chapter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chapter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chapter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chapter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chapter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chapter findOrCreate($search, callable $callback = null, $options = [])
 */
class ChaptersTable extends Table
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

        $this->setTable('chapters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lesson', [
            'foreignKey' => 'lesson_id',
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
            ->maxLength('code', 250)
            ->requirePresence('code', 'create')
            ->allowEmptyString('code', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('url')
            ->maxLength('url', 300)
            ->requirePresence('url', 'create')
            ->allowEmptyString('url', false);

        $validator
            ->integer('chapterorder')
            ->requirePresence('chapterorder', 'create')
            ->allowEmptyString('chapterorder', false);

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

        return $rules;
    }
}
