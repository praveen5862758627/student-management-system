<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comparea Model
 *
 * @property \App\Model\Table\TopicTable|\Cake\ORM\Association\HasMany $Topic
 *
 * @method \App\Model\Entity\Comparea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comparea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comparea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comparea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comparea|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comparea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comparea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comparea findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompareaTable extends Table
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

        $this->setTable('comparea');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Topic', [
            'foreignKey' => 'comparea_id'
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

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->allowEmptyString('subject', false);

        return $validator;
    }
	
	   public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['code']));

        return $rules;
    }
}
