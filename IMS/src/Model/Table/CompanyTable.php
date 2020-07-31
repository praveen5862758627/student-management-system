<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Company Model
 *
 * @property \App\Model\Table\IndustriesTable|\Cake\ORM\Association\BelongsTo $Industries
 * @property \App\Model\Table\ExamTable|\Cake\ORM\Association\HasMany $Exam
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompanyTable extends Table
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

        $this->setTable('company');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Industry', [
            'foreignKey' => 'industry_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Exam', [
            'foreignKey' => 'company_id'
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
            ->scalar('yearofincorporation')
            ->maxLength('yearofincorporation', 50)
            ->requirePresence('yearofincorporation', 'create')
            ->allowEmptyString('yearofincorporation', false);

        $validator
            ->integer('noofemployees')
            ->requirePresence('noofemployees', 'create')
            ->allowEmptyString('noofemployees', false);

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('headoffice')
            ->maxLength('headoffice', 200)
            ->requirePresence('headoffice', 'create')
            ->allowEmptyString('headoffice', false);

        $validator
            ->scalar('locations')
            ->maxLength('locations', 100)
            ->requirePresence('locations', 'create')
            ->allowEmptyString('locations', false);

        $validator
            ->scalar('turnover')
            ->maxLength('turnover', 100)
            ->requirePresence('turnover', 'create')
            ->allowEmptyString('turnover', false);

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
        $rules->add($rules->existsIn(['industry_id'], 'Industry'));

        return $rules;
    }
}
