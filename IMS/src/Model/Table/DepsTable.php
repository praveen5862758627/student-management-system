<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Deps Model
 *
 * @property \App\Model\Table\IndustriesTable|\Cake\ORM\Association\BelongsTo $Industries
 * @property \App\Model\Table\DepcompsTable|\Cake\ORM\Association\HasMany $Depcomps
 *
 * @method \App\Model\Entity\Dep get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dep|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dep findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepsTable extends Table
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

        $this->setTable('deps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Industry', [
            'foreignKey' => 'industry_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Depcomps', [
            'foreignKey' => 'dep_id'
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
            ->scalar('position')
            ->maxLength('position', 100)
            ->requirePresence('position', 'create')
            ->allowEmptyString('position', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
   /* public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['industry_id'], 'Industries'));

        return $rules;
    }*/
}
