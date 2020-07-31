<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scoretype Model
 *
 * @property \App\Model\Table\ScorecardTable|\Cake\ORM\Association\HasMany $Scorecard
 *
 * @method \App\Model\Entity\Scoretype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scoretype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Scoretype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scoretype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scoretype|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scoretype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scoretype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scoretype findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScoretypeTable extends Table
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

        $this->setTable('scoretype');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Scorecard', [
            'foreignKey' => 'scoretype_id'
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
