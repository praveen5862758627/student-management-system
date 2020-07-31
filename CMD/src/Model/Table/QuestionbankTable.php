<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionbank Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Topics
 * @property |\Cake\ORM\Association\BelongsTo $Levels
 * @property |\Cake\ORM\Association\BelongsTo $Targettypes
 * @property |\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\Questionbank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionbank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Questionbank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionbank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionbank|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionbank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionbank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionbank findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionbankTable extends Table
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

        $this->setTable('questionbank');
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
        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('author')
            ->maxLength('author', 200)
            ->requirePresence('author', 'create')
            ->allowEmptyString('author', false);

        $validator
            ->scalar('program')
            ->maxLength('program', 250)
            ->requirePresence('program', 'create')
            ->allowEmptyString('program', false);

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
        $rules->add($rules->existsIn(['status_id'], 'Status'));

        return $rules;
    }
}
